<?php
$wiki = new Wiki();

if (isset($_GET["restore"])) {
    $wiki_id = $_GET["id"];
    $wiki->restoreWiki($wiki_id);
    echo "success";
    exit;
}
