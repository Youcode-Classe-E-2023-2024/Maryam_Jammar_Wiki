<?php
if (isset($_GET["id"])) {
    $wikiO = new Wiki();
    $singleWiki = $wikiO->wikiDetails($_GET["id"]);

} else header("Location: 404.html");