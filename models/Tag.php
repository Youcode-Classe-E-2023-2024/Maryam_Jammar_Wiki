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

    static function wiki_tag ($tag, $wikiId) {
        global $db;
        $sql = "INSERT INTO wikitag (tag_id, wiki_id) VALUES (:tag_id, :wiki_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag_id', $tag);
        $stmt->bindParam(':wiki_id', $wikiId);
        $stmt->execute();
    }

    static function update_wiki_tag ($tag, $wikiId) {
        global $db;
        $sql = "UPDATE wiki_tag  SET tag_id = :tag_id WHERE wiki_id= :wiki_id ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag_id', $tag);
        $stmt->bindParam(':wiki_id', $wikiId);

        $stmt->execute();
    }

    static function display_wiki_tag ($wiki_id) {
        global $db;
        $sql = "SELECT tags.* FROM wiki_tag
                JOIN tags ON wikitag.tag_id = tags.tag_id
                WHERE wikitag.wiki_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$wiki_id]);
        return $stmt->fetchAll();
    }
}
