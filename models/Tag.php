<?php

class Tag
{
    public $tag_id;
    public $tag;

    public function getTags(){
        global $db;
        $tags = $db->query('SELECT * FROM tags');
        return $tags->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($tag){
        global $db;
        $stmt = $db->prepare('INSERT INTO tags (tag) VALUES (:tag)');
        $stmt->bindValue(':tag', $tag, PDO::PARAM_STR);
        $stmt->execute();
    }
    function updateTag($tag_id, $tag)
    {
        global $db;
        $stmt = $db->prepare('UPDATE tags SET tag = :tag WHERE tag_id = :tag_id');
        $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);
        $stmt->bindParam(':tag_id', $tag_id, PDO::PARAM_INT);

        $success = $stmt->execute();

        return $success;
    }

    public function delete($tag_id){
        global $db;
        $stmt = $db->prepare('DELETE FROM tags WHERE tag_id = :tag_id');
        $stmt->bindValue(':tag_id', $tag_id);
        $stmt->execute();
    }

}
