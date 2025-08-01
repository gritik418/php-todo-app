<?php
require_once __DIR__ . "/../config/database.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    session_destroy();
    header("Location: /login");
    exit;
}

if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit;
}


$userId =  $_SESSION['user_id'];

$statement = $conn->prepare("SELECT * FROM users where id = ?");
$statement->bindParam(1, $userId);
$statement->execute();

$user = $statement->fetch();

if (!$user || !$user['id']) {
    header("Location: /login");
    exit;
}

?>

<div class="min-h-screen flex items-center justify-center px-4">
    <div class=" max-w-md w-full bg-white rounded-xl p-6 shadow-[0_4px_20px_rgba(9,81,139,0.1)]">
        <!-- Profile Image -->
        <div class="flex flex-col items-center mb-6">
            <img
                src="/images/default-profile.png"
                alt="Profile Picture"
                class="w-24 h-24 rounded-full object-cover mb-4" />
            <h2 class="text-xl font-semibold text-gray-800"><?php echo $user['name']; ?></h2>
            <p class="text-sm text-gray-500"><?php echo $user['email']; ?></p>
        </div>

        <!-- Profile Info -->
        <div class="space-y-4 text-gray-700">
            <div class="flex justify-between">
                <span class="font-medium">Username:</span>
                <span>@<?php echo $user['username']; ?></span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium">Joined:</span>
                <span><?php echo date('l, j F Y', strtotime($user['created_at'])) ?></span>
            </div>
        </div>

        <!-- Action Button -->
        <form action="" method="POST" class="mt-6 text-center">
            <button type="submit"
                class="px-6 cursor-pointer py-2 bg-[#bc2a77] hover:bg-[#d54390] text-white rounded-lg transition">
                Logout
            </button>
        </form>
    </div>
</div>