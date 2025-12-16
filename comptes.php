<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion des Comptes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 min-h-screen">

    <header class="h-16 bg-white/20 backdrop-blur-xl text-white flex items-center justify-between px-6 text-xl font-semibold shadow">
        <span>Bankly Dashboard</span>
        <a href="login.php" class="bg-red-500/80 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm transition">Logout</a>
    </header>

    <div class="flex">
        <!-- SIDEBAR -->
        <aside class="w-60 bg-white/20 backdrop-blur-xl text-white p-5 shadow-xl flex flex-col justify-between min-h-screen">
            <ul class="space-y-3 font-semibold">
                <a href="client.php">
                    <li class="p-3 rounded-lg hover:bg-white/30 cursor-pointer transition">👤 Clients</li>
                </a>
                <a href="compte.php">
                    <li class="p-3 rounded-lg hover:bg-white/30 cursor-pointer transition bg-white/30">🏦 Comptes</li>
                </a>
                <a href="#">
                    <li class="p-3 rounded-lg hover:bg-white/30 cursor-pointer transition">💸 Transactions</li>
                </a>
                <a href="#">
                    <li class="p-3 rounded-lg hover:bg-white/30 cursor-pointer transition">⚙️ Utilisateurs</li>
                </a>
            </ul>
            <div class="mt-4">
                <img src="pa.png" alt="logo" class="w-40 mx-auto">
            </div>
        </aside>

        <main class="flex flex-col lg:flex-row p-6 gap-6 overflow-auto">
            <!-- FORMULAIRE -->
            <div class="flex-1 lg:max-w-sm bg-white/20 backdrop-blur-xl rounded-2xl p-6 text-white shadow-xl">
                <h2 class="text-xl font-bold mb-4">Créer un compte</h2>
                <form method="post">
                    <label class="block mb-1">Client</label>
                    <select name="client_id" class="w-full border border-white/50 p-2 mb-3 rounded bg-white/10 text-white">
                    </select>

                    <label class="block mb-1">Numéro de compte</label>
                    <input type="text" name="numero" placeholder="ACC123456" class="w-full border border-white/50 p-2 mb-3 rounded bg-white/10 text-white" required>

                    <label class="block mb-1">Type de compte</label>
                    <select name="type" class="w-full border border-white/50 p-2 mb-3 rounded bg-white/10 text-white">
                        <option>Courant</option>
                        <option>Épargne</option>
                    </select>

                    <label class="block mb-1">Solde initial</label>
                    <input type="number" name="solde" placeholder="0" class="w-full border border-white/50 p-2 mb-3 rounded bg-white/10 text-white" required>

                    <button type="submit" name="create" class="w-full bg-blue-600 hover:bg-blue-700 py-2 rounded transition">Créer</button>
                </form>
            </div>

            <!-- TABLEAU COMPTES -->
            <div class="flex-[2.5] bg-white/20 backdrop-blur-xl rounded-2xl p-6 text-white shadow-xl overflow-auto">
                <h2 class="text-xl font-bold mb-4">Liste des comptes</h2>
                <table class="w-full text-center border border-white/50">
                    <thead>
                        <tr class="bg-white/30">
                            <th class="border p-2">ID</th>
                            <th class="border p-2">Client</th>
                            <th class="border p-2">Numéro</th>
                            <th class="border p-2">Type</th>
                            <th class="border p-2">Solde</th>
                            <th class="border p-2">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Les lignes seront générées dynamiquement -->
                    </tbody>
                </table>
            </div>
        </main>


    </div>

</body>

</html>