<?php
require 'config.php';

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT coordPosition FROM otherinfo");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['otherinfo' => $data],JSON_PRETTY_PRINT);
}

$action = 'Null';

if ($action == 'create') {
    $sql = "INSERT INTO otherinfo (coordPosition) VALUES ('coordPosition')";
    $pdo->exec($sql);
}

if ($action == 'delete') {
    $sql = "DELETE FROM otherinfo WHERE id=1";
    $pdo->exec($sql);
}

if ($action == 'update') {
    $sql = "UPDATE otherinfo SET coordPosition ='up coord' WHERE id = 1";
    $pdo->exec($sql);
}
?>
