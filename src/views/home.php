<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit;
}

$userId = $_SESSION['user_id'];
require_once __DIR__ . "/../config/database.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $statement = $conn->prepare("SELECT * FROM tasks WHERE user_id = ?");
    $statement->bindParam(1, $userId);
    $statement->execute();
    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST['_method']) && $_POST['_method'] === "DELETE") {
        $taskId = $_POST['taskId'];

        $statement = $conn->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
        $statement->bindParam(1, $taskId);
        $statement->bindParam(2, $userId);
        $statement->execute();

        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    }

    if (isset($_POST['_method']) && $_POST['_method'] === "TOGGLE") {
        $taskId = $_POST['taskId'];

        $stmt = $conn->prepare("SELECT is_completed FROM tasks WHERE id = ? AND user_id = ?");
        $stmt->execute([$taskId, $userId]);
        $task = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($task) {
            $newStatus = $task['is_completed'] ? 0 : 1;

            $update = $conn->prepare("UPDATE tasks SET is_completed = ? WHERE id = ? AND user_id = ?");
            $update->execute([$newStatus, $taskId, $userId]);
        }

        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    }

    $content = trim($_POST['content']);

    if (!empty($content)) {
        $statement = $conn->prepare("INSERT INTO tasks (content, user_id) VALUES (:content, :user_id)");
        $statement->bindParam(":content", $content);
        $statement->bindParam(":user_id", $userId);
        $statement->execute();
    }

    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
}


?>

<div class="min-h-[70vh] flex flex-col gap-10 items-center py-10 px-4">
    <!-- Add Todo Box -->
    <div class="container bg-white max-w-md mx-auto rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
            Add your todos here
        </h1>

        <form action="" method="POST" class="flex items-center gap-2">
            <input
                type="text"
                name="content"
                placeholder="Type your todo..."
                class="flex-1 px-4 py-3 rounded-lg border border-gray-300 outline-none" />
            <button
                type="submit"
                class="bg-[#d54390] hover:bg-[#92215c] text-white px-4 py-3 rounded-lg font-medium transition outline-none">
                Add
            </button>
        </form>
    </div>

    <!-- Todo List -->
    <div class="container w-full w-full flex flex-col gap-4">
        <!-- Todo Item (Not Completed) -->
        <?php foreach ($tasks as $task): ?>
            <div class="rounded-xl bg-white p-4 flex justify-between items-start gap-4 shadow-sm">
                <form action="" method="POST" class="flex gap-2 items-center">
                    <input type="hidden" name="_method" value="TOGGLE">
                    <input type="hidden" name="taskId" value="<?= $task['id'] ?>">
                    <input onchange="this.form.submit()"
                        <?= $task['is_completed'] ? 'checked' : '' ?> type="checkbox" class="h-4 w-4 cursor-pointer" />

                    <p class="text-gray-800 <?= $task['is_completed'] ? 'line-through' : '' ?>">
                        <?php echo $task['content']; ?>
                    </p>
                </form>
                <form action="" method="POST" class="flex flex-col gap-1 items-end">
                    <input type="hidden" name="_method" value="DELETE">
                    <button name="taskId" value="<?php echo $task['id']; ?>" type="submit" class="text-red-500 hover:text-red-700 cursor-pointer text-sm font-medium transition">
                        Delete
                    </button>
                </form>
            </div>
        <?php endforeach; ?>


    </div>
</div>