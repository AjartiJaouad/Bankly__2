<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Clients</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 min-h-screen p-6">

    <div class="max-w-7xl mx-auto bg-white/20 backdrop-blur-xl rounded-2xl p-6 shadow-2xl">

        <h1 class="text-4xl font-extrabold text-white mb-8 text-center ">
            Gestion des Clients
        </h1>

        <div class="overflow-x-auto rounded-xl">
            <table class="min-w-full text-sm text-white border border-white/30">
                <thead>
                    <tr class="bg-black/40 uppercase text-xs r">
                        <th class="p-3 border">ID</th>
                        <th class="p-3 border">Nom</th>
                        <th class="p-3 border">Prénom</th>
                        <th class="p-3 border">CIN</th>
                        <th class="p-3 border">Téléphone</th>
                        <th class="p-3 border">Adresse</th>
                        <th class="p-3 border">Date</th>
                        <th class="p-3 border">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="text-center hover:bg-white/10 transition">
                        <td class="p-3 border">1</td>
                        <td class="p-3 border">Ajarti</td>
                        <td class="p-3 border">Jaouad</td>
                        <td class="p-3 border">CIN123456</td>
                        <td class="p-3 border">0612345678</td>
                        <td class="p-3 border">Temssmane</td>
                        <td class="p-3 border">2025-12-15</td>
                        <td class="p-3 border flex justify-center gap-2">
                            <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded-lg text-xs">
                                Supprimer
                            </button>
                            <button class="bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded-lg text-xs text-black">
                                Modifier
                            </button>
                        </td>
                    </tr>

                    <tr class="text-center hover:bg-white/10 transition">
                        <td class="p-3 border">2</td>
                        <td class="p-3 border">Alarar</td>
                        <td class="p-3 border">Amine</td>
                        <td class="p-3 border">CIN654321</td>
                        <td class="p-3 border">0678123456</td>
                        <td class="p-3 border">Mchraa Lksir</td>
                        <td class="p-3 border">2025-12-14</td>
                        <td class="p-3 border flex justify-center gap-2">
                            <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded-lg text-xs">
                                Supprimer
                            </button>
                            <button class="bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded-lg text-xs text-black">
                                Modifier
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>