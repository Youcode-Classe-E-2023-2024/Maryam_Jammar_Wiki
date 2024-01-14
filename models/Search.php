<?php

class Search
{
    static function searchForTitles($title)
    {
        global $db;
        $title = "%" . "$title" . "%";
        $sql = "SELECT wiki.*, categories.*, users.username
                FROM wiki
                JOIN users ON wiki.user_id = users.user_id
                JOIN categories ON wiki.categorie_id = categories.categorie_id
                WHERE title LIKE :title AND deleted = 0";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    static function searchForTags($tag)
    {
        global $db;
        $tag = "%" . "$tag" . "%";
        $sql = "SELECT DISTINCT wiki.*, categories.*, users.username
                FROM wikitag
                         JOIN wiki ON wiki_tag.wiki_id = wiki.wiki_id
                        JOIN users ON wiki.creator = users.user_id
                         JOIN tags ON wikitag.tag_id = tags.tag_id
                         JOIN categories ON wiki.categorie_id = categories.categorie_id
                WHERE tags.tag LIKE :tag AND deleted = 0";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":tag", $tag, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    static function searchForCategory($category)
    {
        global $db;
        $category = "%" . "$category" . "%";
        $sql = "SELECT categories.*, wiki.*, users.username FROM wiki
                JOIN users ON wiki.user_id = users.user_id
                JOIN categories ON wiki.categorie_id = categories.categorie_id
                WHERE categories.categorie LIKE :categorie AND deleted=0";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":categorie", $category, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }
}