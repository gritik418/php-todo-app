<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_id'])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}

?>

<nav class="bg-[#92215c]">
    <div class="flex mx-auto py-4 items-center text-white container justify-between">
        <a href="/">
            <h1 class="text-2xl">TODO</h1>
        </a>

        <ul class="flex gap-4 items-center">
            <a href="/">
                <li class="cursor-pointer">Home</li>
            </a>

            <?php if ($isLoggedIn): ?>
                <a href="/profile">
                    <li class="cursor-pointer">Profile</li>
                </a>
            <?php else: ?>
                <a href="/login">
                    <li class="cursor-pointer">Login</li>
                </a>

                <a href="/register" class="bg-pink-50 text-[#92215c] p-1 px-2 rounded-md">
                    <li class="cursor-pointer">Register</li>
                </a>
            <?php endif; ?>
        </ul>
    </div>
</nav>