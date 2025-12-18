<?php 
session_start();
$conn = new mysqli("localhost","root","","bankly_v2");
if($conn->connect_error) die("Erreur connexion"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion des Transactions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 min-h-screen">


    <h1 class="text-4xl font-extrabold text-white mb-8 text-center tracking-wide">
        Gestion des Transactions
    </h1>

    <a href="dashboard.php" class="fixed top-6 left-6 z-50 flex flex-col items-center">
        <img src="dashboard.png" alt="Dashboard" class="w-14 h-14 rounded-full shadow-lg hover:scale-110 transition">
        <p class="text-white text-xs mt-1 font-semibold">Dashboard</p>
    </a>


    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8 m-4 overflow-auto">

        <!-- Formulaire Transactions -->
        <div class="flex flex-col lg:flex-row gap-6 mb-6">
            <div class="flex-1 bg-white/20 backdrop-blur-xl rounded-2xl p-6 text-white shadow-xl">
                <h2 class="text-xl font-bold mb-4">Effectuer une Transaction</h2>
                <form class="grid grid-cols-1 gap-4">
                    <label class="font-semibold">Compte</label>
                    <select class="p-2 rounded w-full bg-white/10 text-white border border-white/50">
                        <option>a16848862 - hamazza done</option>
                        <option>b1454243 - jamal bouhdoz</option>
                    </select>

                    <label class="font-semibold">Type de transaction</label>
                    <select class="p-2 rounded w-full bg-white/10 text-white border border-white/50">
                        <option>Dépôt</option>
                        <option>Retrait</option>
                    </select>

                    <label class="font-semibold">Montant</label>
                    <input type="number" placeholder="0" class="p-2 rounded w-full bg-white/10 text-white border border-white/50">

                    <label class="font-semibold">Description</label>
                    <input type="text" placeholder="Ex: Salaire" class="p-2 rounded w-full bg-white/10 text-white border border-white/50">

                    <button type="submit" class="bg-green-600 hover:bg-green-700 py-2 rounded mt-2 transition">
                        Effectuer Transaction
                    </button>
                </form>
            </div>

            <!-- Historique des transactions -->
            <div class="flex-[2.5] bg-white/20 backdrop-blur-xl rounded-2xl p-6 text-white shadow-xl overflow-auto">
                <h2 class="text-xl font-bold mb-4">Historique des Transactions</h2>
                <table class="w-full text-center border border-white/50">
                    <thead>
                        <tr class="bg-white/30">
                            <th class="border p-2">ID</th>
                            <th class="border p-2">Compte</th>
                            <th class="border p-2">Type</th>
                            <th class="border p-2">Montant</th>
                            <th class="border p-2">Date</th>
                            <th class="border p-2">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-100 text-black">
                            <td class="p-2 border">1</td>
                            <td class="p-2 border">a16848862 - hamazza done</td>
                            <td class="p-2 border">Dépôt</td>
                            <td class="p-2 border">5000 MAD</td>
                            <td class="p-2 border">2025-12-17</td>
                            <td class="p-2 border">Salaire</td>
                        </tr>
                        <tr class="hover:bg-gray-100 text-black">
                            <td class="p-2 border">2</td>
                            <td class="p-2 border">b1454243 - jamal bouhdoz</td>
                            <td class="p-2 border">Retrait</td>
                            <td class="p-2 border">1500 MAD</td>
                            <td class="p-2 border">2025-12-16</td>
                            <td class="p-2 border">Facture intrenet</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    </div>

</body>

</html>