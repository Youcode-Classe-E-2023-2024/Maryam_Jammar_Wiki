<?php

$categories = $categorieO->getCategories();

$tags = $tagO->getTags();


//add categorie
if (isset($_POST['ctg-submit'])) {
    $categorie = $_POST['categorie'];
    $categorieO->create($categorie);
//    $categorieO->getCategories();

    header("Location: index.php?page=catag");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['categorie_id']) && isset($_POST['categorie'])) {
        $categorie_id = $_POST['categorie_id'];
        $new_categorie = $_POST['categorie'];

        $success = $categorieO->updateCategory($categorie_id, $new_categorie);

        if ($success) {
            echo json_encode(['success' => true]);
            exit;
        } else {
            echo json_encode(['error' => 'Failed to update category']);
            exit;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['categoryId']) && !empty($_POST['categoryId'])) {
        $categorie_id = $_POST['categoryId'];

        $categorieO->delete($categorie_id);
        exit;
    }
}






if(isset($_POST['tag-submit'])){
    $tag = $_POST['tag'];

    $tagO->create($tag);

    header("Location: index.php?page=catag");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tagId']) && !empty($_POST['tagId'])) {
        $tag_id = $_POST['tagId'];

        $tagO->delete($tag_id);
        exit;
    }
}





//dd($tag->getTags());