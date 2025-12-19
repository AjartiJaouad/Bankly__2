<?php
session_start();


$conn = new mysqli("localhost", "root", "", "bankly_v2");
if ($conn->connect_error) {
    die("Erreur connexion : " . $conn->connect_error);
}

$message = "";

$comptes = $conn->query("
    SELECT id_account, account_number, balance
    FROM comptes
");
if (!$comptes) {
    die("Erreur comptes : " . $conn->error);
}

if (isset($_POST['submit'])) {

    $compte_id   = (int)$_POST['compte_id'];
    $type        = $_POST['type'];
    $montant     = (float)$_POST['montant'];
    $description = $_POST['description'];

 
    $res = $conn->query("
        SELECT balance FROM comptes WHERE id_account = $compte_id
    ");
    if (!$res) die($conn->error);

    $row = $res->fetch_assoc();
    $solde_actuel = $row['balance'];

   
    if ($type === "Retrait" && $montant > $solde_actuel) {
        $message = "Solde insuffisant";
    } else {

        $nouveau_solde = ($type === "Dépôt")
            ? $solde_actuel + $montant
            : $solde_actuel - $montant;

        $stmt = $conn->prepare("
            UPDATE comptes SET balance=? WHERE id_account=?
        ");
        $stmt->bind_param("di", $nouveau_solde, $compte_id);
        if (!$stmt->execute()) die($stmt->error);

        // Insert transaction
        $stmt = $conn->prepare("
            INSERT INTO `transaction` (account_id, type, montant, description)
            VALUES (?,?,?,?)
        ");
        $stmt->bind_param("isds", $compte_id, $type, $montant, $description);
        if (!$stmt->execute()) die($stmt->error);

        $message = "Transaction effectuée avec succès";
    }
}


$trs = $conn->query("
    SELECT t.account_id, t.type, t.montant, t.description, c.account_number
    FROM `transaction` t
    JOIN comptes c ON c.id_account = t.account_id
");
if (!$trs) {
    die("Erreur transactions : " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion des Transactions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 min-h-screen p-6 text-white">

    <h1 class="text-4xl font-bold text-center mb-8">Gestion des Transactions</h1>
    <a href="dashboard.php" class="fixed top-6 left-6 z-50 flex flex-col items-center">
        <img src="dashboard.png" alt="Dashboard" class="w-14 h-14 rounded-full shadow-lg hover:scale-110 transition">
        <p class="text-white text-xs mt-1 font-semibold">Dashboard</p>
    </a>

    <?php if ($message): ?>
        <div class="bg-black/40 p-3 rounded mb-6 text-center font-semibold">
            <?= $message ?>
        </div>
    <?php endif; ?>

  
    <form method="POST" class="max-w-xl mx-auto bg-black/30 p-6 rounded space-y-4">

        <label>Compte</label>
        <select name="compte_id" class="w-full p-2 rounded text-black" required>
            <?php while ($c = $comptes->fetch_assoc()): ?>
                <option value="<?= $c['id_account'] ?>">
                    <?= $c['account_number'] ?> | <?= $c['balance'] ?> MAD
                </option>
            <?php endwhile; ?>
        </select>

        <label>Type</label>
        <select name="type" class="w-full p-2 rounded text-black">
            <option>Dépôt</option>
            <option>Retrait</option>
        </select>

        <label>Montant</label>
        <input type="number" name="montant" step="0.01" required
            class="w-full p-2 rounded text-black">

        <label>Description</label>
        <input type="text" name="description"
            class="w-full p-2 rounded text-black">

        <button type="submit" name="submit"
            class="w-full bg-green-600 hover:bg-green-700 p-2 rounded font-bold">
            Effectuer Transaction
        </button>
    </form>

   
    <div class="max-w-4xl mx-auto mt-10 bg-black/30 p-6 rounded">
        <h2 class="text-2xl font-bold mb-4 text-center">Historique des Transactions</h2>

        <table class="w-full border border-white/30 text-center">
            <thead class="bg-black/40">
                <tr>
                    <th class="border p-2">Compte</th>
                    <th class="border p-2">Type</th>
                    <th class="border p-2">Montant</th>
                    <th class="border p-2">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($t = $trs->fetch_assoc()): ?>
                    <tr>
                        <td class="border p-2"><?= $t['account_number'] ?></td>
                        <td class="border p-2"><?= $t['type'] ?></td>
                        <td class="border p-2"><?= $t['montant'] ?> MAD</td>
                        <td class="border p-2"><?= $t['description'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>