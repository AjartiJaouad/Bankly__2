<?php

/**
 * Connexion à la base de données avec la metod mysqll*/
$conn = new mysqli("localhost", "root", "", "bankly_v2");
if ($conn->connect_error) die("Erreur connexion");

/**
 * Supprimer un client
 */
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM client WHERE id_client=$id");
    header("Location: clione.php");
    exit;
}

/** modifié 'un client */
$edit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = $conn->query("SELECT * FROM client WHERE id_client=$id")->fetch_assoc();
}

/**
 * Ajouter ou modifier un client
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];

    if ($_POST['id'] != "") {
        $stmt = $conn->prepare("UPDATE client SET nom=?, prenom=?, cin=?, email=?, telephone=?, adresse=? WHERE id_client=?");
        $stmt->bind_param("ssssssi", $nom, $prenom, $cin, $email, $tel, $adresse, $_POST['id']);
    } else {
        $stmt = $conn->prepare("INSERT INTO client (nom, prenom, cin, email, telephone, adresse) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nom, $prenom, $cin, $email, $tel, $adresse);
    }
    $stmt->execute();
    $stmt->close();
    header("Location: clione.php");
    exit;
}

/**recupere  la liste de tous les clients avec selcect*/
$result = $conn->query("SELECT * FROM client ORDER BY id_client DESC");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion Clients</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 min-h-screen p-6">

    <div class="max-w-7xl mx-auto bg-white/20 backdrop-blur-xl rounded-2xl p-6 shadow-2xl">

        <h1 class="text-4xl font-extrabold text-white mb-8 text-center tracking-wide">
            Gestion des Clients
        </h1>

        <a href="dashboard.php" class="fixed top-6 left-6 z-50 flex flex-col items-center">
            <img src="dashboard.png" alt="Dashboard" class="w-14 h-14 rounded-full shadow-lg hover:scale-110 transition">
            <p class="text-white text-xs mt-1 font-semibold">Dashboard</p>
        </a>

        <!-- Formulaire  -->
        <form method="POST" class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4 bg-white/30 p-4 rounded-lg">
            <input type="hidden" name="id" value="<?= $edit['id_client'] ?? '' ?>">

            <input type="text" name="nom" placeholder="Nom" value="<?= $edit['nom'] ?? '' ?>" required class="p-2 rounded w-full">
            <input type="text" name="prenom" placeholder="Prénom" value="<?= $edit['prenom'] ?? '' ?>" required class="p-2 rounded w-full">
            <input type="text" name="cin" placeholder="CIN" value="<?= $edit['cin'] ?? '' ?>" required class="p-2 rounded w-full">
            <input type="email" name="email" placeholder="Email" value="<?= $edit['email'] ?? '' ?>" required class="p-2 rounded w-full">
            <input type="text" name="tel" placeholder="Téléphone" value="<?= $edit['telephone'] ?? '' ?>" required class="p-2 rounded w-full">
            <input type="text" name="adresse" placeholder="Adresse" value="<?= $edit['adresse'] ?? '' ?>" required class="p-2 rounded w-full">

            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded col-span-1 md:col-span-3">
                <?= $edit ? "Modifier Client" : "Ajouter Client" ?>
            </button>
        </form>

        <!-- Liste des clients -->
        <div class="overflow-x-auto rounded-xl">
            <table class="min-w-full text-sm text-white border border-white/30">
                <thead>
                    <tr class="bg-black/40 uppercase text-xs tracking-wider">
                        <th class="p-3 border">ID</th>
                        <th class="p-3 border">Nom</th>
                        <th class="p-3 border">Prénom</th>
                        <th class="p-3 border">CIN</th>
                        <th class="p-3 border">Email</th>
                        <th class="p-3 border">Téléphone</th>
                        <th class="p-3 border">Adresse</th>
                        <th class="p-3 border">Date</th>
                        <th class="p-3 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='hover:bg-gray-100 text-black'>";
                            echo "<td class='p-2 border'>" . $row['id_client'] . "</td>";
                            echo "<td class='p-2 border'>" . $row['nom'] . "</td>";
                            echo "<td class='p-2 border'>" . $row['prenom'] . "</td>";
                            echo "<td class='p-2 border'>" . $row['cin'] . "</td>";
                            echo "<td class='p-2 border'>" . $row['email'] . "</td>";
                            echo "<td class='p-2 border'>" . $row['telephone'] . "</td>";
                            echo "<td class='p-2 border'>" . $row['adresse'] . "</td>";
                            echo "<td class='p-2 border'>" . $row['date_creation'] . "</td>";
                            echo "<td class='p-2 border text-center'>
                    <a href='clione.php?edit=" . $row['id_client'] . "' class='bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded text-xs mr-1'>Modifier</a>
                    <a href='supprimer_client.php?id=" . $row['id_client'] . "' onclick=\"return confirm('Supprimer ce client ?')\" class='bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs'>Supprimer</a>
                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center p-4 text-black'>Aucun client trouvé</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>