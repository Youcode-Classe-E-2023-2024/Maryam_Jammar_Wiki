<?php
$wikiO = new Wiki();

$wikis = $wikiO->getAllWikis();
//$wikiModel = new Wiki();
if (isset($_POST["create_wiki"])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categorie_id = $_POST['categorie_id'];
    $tags = $_POST['tags'];

    $wikiModel = new Wiki();

    $date = date("Y-m-d H:i:s");
    $result = $wikiModel->createWiki($title, $content, $tags, $categorie_id, $_SESSION["user_id"], $date);

    if ($result) {
        echo "Wiki added successfully";

        exit;
    } else {
        echo "Failed to add Wiki";
        exit;
    }
}



if (isset($_POST['wiki_id'])) {
    $wiki_id = $_POST['wiki_id'];
    $new_title = $_POST['title'];
    $new_content = $_POST['content'];
    $new_categorie = $_POST['categorie'];
    $new_tags = $_POST['tags'];
    $success = $wikiO->updateWiki($wiki_id, $new_title, $new_content, $new_categorie, $new_tags);

    if ($success) {
        echo json_encode(['success' => true]);
        exit;
    } else {
        echo json_encode(['error' => 'Failed to update wiki']);
        exit;
    }
}


if (isset($_GET["delete"])) {
    $wiki_id = $_GET["id"];
    $wikiO->deleteWiki($wiki_id);
    echo "success";
    exit;
}

if (isset($_GET["archive"])) {
    $wiki_id = $_GET["id"];
    $wikiO->archiveWiki($wiki_id);
    echo "success";
    exit;
}

$tagModel = new Tag();
$tags = $tagModel->getTags();

