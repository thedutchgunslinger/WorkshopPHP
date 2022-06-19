
<?php

// Een "leeg" $pdo variabele aanmaken
$pdo = null;

// Starten van een DB connectie
function startConnection()
{
    global $pdo;
// Open de database connectie en ODBC driver
    try {
        $pdo = new PDO("odbc:odbc2sqlserver");
        $pdo->query("USE bloggerDB");
    } catch (PDOException $e) {
        echo "<h1>Database error:</h1>";
        echo $e->getMessage();
        die();
    }
}

// Uitvoeren van een query
function executeQuery($sql)
{
    global $pdo;
// Uitvoeren van een SQl query
    try {
// Query uitvoeren
        $result = $pdo->query($sql);
        return $result;
    } catch (PDOException $e) {
        echo 'Er is een probleem met ophalen van jokes: ' . $e->getMessage();
        die();
    }
}

// Uitvoeren van een query
function executeInsertQuery($sql)
{
    global $pdo;
// Uitvoeren van een SQl query
    try {
// Query uitvoeren
        $result = $pdo->exec($sql);
        return $result;
    } catch (PDOException $e) {
        echo 'Er is een probleem met ophalen van jokes: ' . $e->getMessage();
        die();
    }
}
?>