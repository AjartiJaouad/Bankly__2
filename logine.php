<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<body class="flex items-center justify-center h-screen bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">

    <div class="w-full max-w-xs bg-white/20 backdrop-blur-xl rounded-2xl p-6 shadow-xl">
        <header>
            <img class="w-16 mx-auto mb-5" src="banque.png" />
        </header>

        <form action="login.php" method="POST">
            <div>
                <label class="block mb-2 text-white font-semibold">Email</label>
                <input class="w-full p-2 mb-6 text-indigo-900 rounded-lg border border-white/50 outline-none focus:bg-white"
                    type="text" name="Email" required>
            </div>

            <div>
                <label class="block mb-2 text-white font-semibold">Password</label>
                <input class="w-full p-2 mb-6 text-indigo-900 rounded-lg border border-white/50 outline-none focus:bg-white"
                    type="password" name="password" required>
            </div>

            <div>
                <input class="w-full bg-indigo-700 hover:bg-indigo-900 text-white font-bold py-2 px-4 rounded-lg transition"
                    type="submit" value="Login">
            </div>
        </form>

    </div>

</body>

</html>