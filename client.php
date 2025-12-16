<?php
$conn = new mysqli("localhost", "root", "", "bankly_v2");
if ($conn->connect_error) {
    die("Erreur connexion : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];

   
    $stmt = $conn->prepare("INSERT INTO client (nom, prenom, cin, email, telephone, adresse) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nom, $prenom, $cin, $email, $tel, $adresse);
    $stmt->execute();
    $stmt->close();

    header("Location: clione.php");
    exit;
}


$sql = "SELECT id_client, nom, prenom, cin, email, telephone, adresse, date_creation FROM client ORDER BY id_client DESC";
$result = $conn->query($sql);
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


    <form method="POST" class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4 bg-white/30 p-4 rounded-lg">
        <input type="text" name="nom" placeholder="Nom" required class="p-2 rounded w-full">
        <input type="text" name="prenom" placeholder="Prénom" required class="p-2 rounded w-full">
        <input type="text" name="cin" placeholder="CIN" required class="p-2 rounded w-full">
        <input type="email" name="email" placeholder="Email" required class="p-2 rounded w-full">
        <input type="text" name="tel" placeholder="Téléphone" required class="p-2 rounded w-full">
        <input type="text" name="adresse" placeholder="Adresse" required class="p-2 rounded w-full">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded col-span-1 md:col-span-3">
            Ajouter Client
        </button>
    </form>

  
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
                        <a href='supprimer_client.php?id=" . $row['id_client'] . "' class='bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs'>Supprimer</a>
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
