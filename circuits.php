<?php
require 'config.php';

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT type, title, description, caption, coordPosition, image FROM circuits");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['circuits' => $data], JSON_PRETTY_PRINT);
}

$action = 'Null';

if ($action == 'create') {
    $sql = "INSERT INTO circuits (type, title, description, caption, coordPosition, image) VALUES ('polygon', 'title', 'description', 'caption', 'coordPosition', 'image')";
    $pdo->exec($sql);
}

if ($action == 'delete') {
    $sql = "DELETE FROM circuits WHERE id=1";
    $pdo->exec($sql);
}

if ($action == 'update') {
    $sql = "UPDATE circuits SET type ='line', title ='up title', description ='up desc', caption = 'up cap', coordPosition = 'up coord', image = 'up img' WHERE id = 1";
    $pdo->exec($sql);
}
?>
