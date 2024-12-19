<?php
require 'config.php';

if ($method === 'GET') {
    $stmt = $pdo->query("SELECT id, category FROM especes");
    $especes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($especes as &$espece) {
        $detailsStmt = $pdo->prepare("SELECT type_especes AS type, titleFr, titleAr, titleSt, descriptions AS description, caption, image FROM especes_details WHERE especes_id = ?");
        $detailsStmt->execute([$espece['id']]);
        $espece['details'] = $detailsStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    echo json_encode(['especes' => $especes], JSON_PRETTY_PRINT);
}

$action = 'Null';

if ($action == 'create') {
    $sql = "INSERT INTO especes (category) VALUES ('category')";
    $pdo->exec($sql);
    $especes_id = $pdo->lastInsertId(); 

    $sql = "INSERT INTO especes_details (especes_id, type_especes, titleFr, titleAr, titleSt, descriptions, caption, image) 
            VALUES (".$especes_id.", 'type', 'titleFr', 'titleAr', 'titleSt', 'description', 'caption', 'image')";
    $pdo->exec($sql);
}

if ($action == 'delete') {
    $sql = "DELETE FROM especes WHERE id=1";
    $pdo->exec($sql);
}

if ($action == 'update') {
    $sql = "UPDATE especes SET category ='up category' WHERE id = 1";
    $pdo->exec($sql);


    $sql = "UPDATE especes_details SET type_especes ='up type', titleFr ='up titleFr', titleAr ='up titleAr', 
            titleSt ='up titleSt', description ='up desc', caption = 'up cap', image = 'up img' 
            WHERE especes_id = 1";
    $pdo->exec($sql);
}
?>
