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







if(isset($_POST['tag-submit'])){
    $tag = $_POST['tag'];

    $tagO->create($tag);

    header("Location: index.php?page=catag");
}





//dd($tag->getTags());