<?php
require 'config.php';

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT title, descriptions AS description, caption FROM contact");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['contact' => $data], JSON_PRETTY_PRINT);
}

$action = 'Null';

if ($action == 'create') {
    $sql = "INSERT INTO contact (title, description, caption) VALUES ('title', 'description', 'caption')";
    $pdo->exec($sql);
}

if ($action == 'delete') {
    $sql = "DELETE FROM contact WHERE id=1";
    $pdo->exec($sql);
}

if ($action == 'update') {
    $sql = "UPDATE contact SET title ='up title', description ='up desc', caption = 'up cap' WHERE id = 1";
    $pdo->exec($sql);
}
?>
