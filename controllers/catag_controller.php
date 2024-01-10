<?php

$categories = $categorieO->getCategories();
//$categories = $categorieO->delete($categorie);
//$categories = $categorieO->edit();

$tags = $tagO->getTags();

if (isset($_POST['ctg-submit'])) {
    $categorie = $_POST['categorie'];

    $categorieO->create($categorie);
//    $categorieO->getCategories();


    header("Location: index.php?page=catag");
}

if (isset($_POST['edit-submit'])) {
    $catg_id = $_POST['edit-categorie-id'];
    $categorie = $_POST['edit-categorie'];

    $categorieO->edit($categorie_id, $catg_id);

    header("Location: index.php?page=catag");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérifier si les paramètres nécessaires sont présents
    if (isset($_POST['categoryId']) && !empty($_POST['categoryId'])) {
        $categorie_id = $_POST['categoryId'];

        // Supprimer la catégorie
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