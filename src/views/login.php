<?php
// Initialize
$error = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once __DIR__ . "/../config/database.php";

    // Prepare and execute query
    $statement = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $statement->bindParam(1, $email);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {

        if ($password == $user['password']) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            header("Location: /profile");
            exit;
        } else {
            $error = "Invalid credentials.";
        }
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<div class="flex justify-center min-h-[70vh] py-20 px-4">
    <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8 space-y-6">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800">Welcome Back</h2>
            <p class="text-sm text-gray-500">Please sign in to your account</p>
        </div>

        <!-- Error message -->
        <?php if (isset($error)): ?>
            <div class="text-sm text-red-600 text-center font-medium mb-2">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <!-- Login form -->
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="example@abc.com"
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                    required
                    class="w-full px-4 py-2 mt-1 border border-[#d54390] rounded-lg bg-gray-50 text-gray-900 focus:border-[#d54390] focus:ring-2 focus:ring-[#d54390] focus:outline-none" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Enter your password"
                    required
                    class="w-full px-4 py-2 mt-1 border border-[#d54390] rounded-lg bg-gray-50 text-gray-900 focus:border-[#d54390] focus:ring-2 focus:ring-[#d54390] focus:outline-none" />
            </div>

            <button
                type="submit"
                class="w-full mt-8 bg-[#d54390] cursor-pointer hover:bg-[#92215c] text-white py-2 px-4 rounded-lg transition duration-200">
                Login
            </button>
        </form>

        <p class="text-sm text-center text-gray-500">
            Don&apos;t have an account?
            <a href="/register" class="text-[#d54390] hover:underline">Register here</a>
        </p>
    </div>
</div>