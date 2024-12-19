<?php
require 'config.php';

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT title, descriptions AS description, caption, image FROM conseil");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['conseil' => $data], JSON_PRETTY_PRINT);
}

$action = 'Null';

if ($action == 'create') {
    $sql = "INSERT INTO conseil (title, description, caption, image) VALUES ('title', 'description', 'caption', 'image')";
    $pdo->exec($sql);
}

if ($action == 'delete') {
    $sql = "DELETE FROM conseil WHERE id=1";
    $pdo->exec($sql);
}

if ($action == 'update') {
    $sql = "UPDATE conseil SET title ='up title', description ='up desc', caption = 'up cap', image = 'up img' WHERE id = 1";
    $pdo->exec($sql);
}
?>
