<?php
require 'config.php';

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT title, descriptions AS description, caption, image FROM about");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['about' => $data]);
}

$action = 'Null';

if ($action == 'create') {
    $sql = "INSERT INTO about (title, descriptions, caption, image) VALUES ('title', 'descriptions', 'caption', 'image')";
    $pdo -> exec($sql);
}

if ($action == 'delete') {
    $sql = "DELETE FROM about WHERE id=1";
    $pdo -> exec($sql);
}

if ($action == 'update') {
    $sql = "UPDATE about SET title ='up title', descriptions ='up desc', caption = 'up cap', image = 'up img' WHERE id = 1";
    $pdo -> exec($sql);
}


?>
