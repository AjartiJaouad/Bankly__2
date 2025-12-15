<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 h-screen">


    <header class="h-16 bg-white/20 backdrop-blur-xl text-white flex items-center justify-between px-6 text-xl font-semibold shadow">
        <span>Bankly Dashboard</span>
        <a href="login.php"logoutBtn" class="bg-red-500/80 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm transition">
            Logout
        </a>
    </header>

    <div class="flex h-[calc(100vh-4rem)]">


        <aside class="w-60 bg-white/20 backdrop-blur-xl text-white p-5 shadow-xl flex flex-col justify-between">
            <ul class="space-y-3 font-semibold">
                <li class="p-3 rounded-lg hover:bg-white/30 cursor-pointer transition">👤 Clients</li>
                <li class="p-3 rounded-lg hover:bg-white/30 cursor-pointer transition">🏦 Comptes</li>
                <li class="p-3 rounded-lg hover:bg-white/30 cursor-pointer transition">💸 Transactions</li>
                <li class="p-3 rounded-lg hover:bg-white/30 cursor-pointer transition">⚙️ Utilisateurs</li>
            </ul>
            <div class="mt-4">
                <img src="pa.png" alt="logo" class="w-40 mx-auto">
            </div>
        </aside>

        <main class="flex-1 flex flex-col p-6 overflow-auto">


            <div class="bg-white/20 backdrop-blur-xl rounded-2xl p-6 text-white shadow-xl text-center mb-6">
                <img src="admin.png" class="w-32 mx-auto mb-4 drop-shadow-xl" />
                <h1 class="text-2xl font-bold mb-2">Bienvenue Admin 👋</h1>
                <p class="opacity-80">
                    Bienvenu ! Ici tu peux ajouter, modifier ou supprimer des clients, gérer leurs comptes et suivre toutes les transactions.
                </p>

            </div>

            <div class="flex flex-wrap gap-6 justify-between">
                <div class="flex-1 min-w-[150px] bg-white/20 backdrop-blur-xl rounded-2xl p-5 text-white shadow-xl text-center">
                    <h3 class="font-bold text-lg">Clients</h3>
                    <p class="opacity-80 text-sm">100</p>
                </div>
                <div class="flex-1 min-w-[150px] bg-white/20 backdrop-blur-xl rounded-2xl p-5 text-white shadow-xl text-center">
                    <h3 class="font-bold text-lg">Comptes</h3>
                    <p class="opacity-80 text-sm">300</p>
                </div>
                <div class="flex-1 min-w-[150px] bg-white/20 backdrop-blur-xl rounded-2xl p-5 text-white shadow-xl text-center">
                    <h3 class="font-bold text-lg">Transactions</h3>
                    <p class="opacity-80 text-sm">600</p>
                </div>
                <div class="flex-1 min-w-[150px] bg-white/20 backdrop-blur-xl rounded-2xl p-5 text-white shadow-xl text-center">
                    <h3 class="font-bold text-lg">Utilisateurs</h3>
                    <p class="opacity-80 text-sm">3</p>
                </div>
            </div>

        </main>

    </div>

</body>

</html>