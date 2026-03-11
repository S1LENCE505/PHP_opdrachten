<?php
// ============================================================
// TODO 1: Verbinding maken met de database
// Vul de variabelen in en maak een PDO verbinding.
// Gebruik try/catch om een foutmelding te tonen als het mislukt.
// ============================================================

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "fruitmand_db";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $fout) {
    echo "Verbinding mislukt: " . $fout->getMessage();
    exit;
}

if (empty($_GET['naam'])) {
    $stmt = $pdo->prepare("SELECT * FROM fruitmand");
    $stmt->execute();
} else {
    $stmt = $pdo->prepare("SELECT * FROM     WHERE naam = ?");
    $stmt->execute([$_GET['naam']]);
}

$fruit = $stmt->fetchAll(PDO::FETCH_ASSOC);


// ============================================================
// TODO 2: Fruit toevoegen als het formulier verstuurd is
// Controleer of de methode POST is, vang dan naam en kleur op
// en voer een INSERT query uit met $pdo->exec().
// ============================================================

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naam  = $_POST["naam"];
    $kleur = $_POST["kleur"];
    $stmt = $pdo->prepare("INSERT INTO fruitmand (naam, kleur) VALUES (?, ?)");
    $stmt->execute([$naam, $kleur]);
    header("Location: fruitmandje.php");
    exit;
}


// ============================================================
// TODO 3: Alle fruit ophalen uit de database
// Gebruik $pdo->query() en fetchAll() om alle rijen op te halen.
// Sla het resultaat op in $fruit.
// ============================================================

// $fruit = $pdo->query("...")->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Fruitmandje</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 500px;
            margin: 40px auto;
            background: #f9f9f9;
            color: #222;
        }
        h1 { color: #333; }
        form {
            display: flex;
            gap: 8px;
            margin-bottom: 24px;
        }
        input {
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            flex: 1;
        }
        button {
            padding: 8px 16px;
            background: #4ade80;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover { background: #22c55e; }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            padding: 10px 14px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>

    <h1>Fruitmandje</h1>

    <form method="POST">
        <input type="text" name="naam"  placeholder="Naam (bijv. Appel)"  required>
        <input type="text" name="kleur" placeholder="Kleur (bijv. rood)"  required>
        <button type="submit">Toevoegen</button>
    </form>

    <h2>In het mandje:</h2>
    <ul>
        <?php foreach ($fruit as $stuk): ?>
            <li><?= $stuk["naam"] ?> &mdash; <?= $stuk["kleur"] ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
