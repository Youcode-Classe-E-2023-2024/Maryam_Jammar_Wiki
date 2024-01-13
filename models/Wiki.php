<?php

class Wiki
{
    public $wiki_id;
    public $title;
    public $content;
    public $tags;
    public $category;
    public $date_wiki;
    public $picture;
    public $creator;
    public $status;

    /****
     * @return array|false
     */
    public function getAllWikis(){
        global $db;
        $wiki = $db->query('SELECT * FROM wiki WHERE deleted = 0 ORDER BY wiki_id DESC');
        return $wiki->fetchAll(PDO::FETCH_ASSOC);
    }

    /****
     * @param $title
     * @param $content
     * @param $tags
     * @param $category
     * @param $creator
     * @param $date_wiki
     * @param $picture
     * @return bool
     */
    public function createWiki($title, $content, $tags, $categorie_id, $user_id, $date_wiki) {
        global $db;
        try {
            $sql = "INSERT INTO wiki (title, content, categorie_id, user_id, date_wiki, deleted) VALUES (:title, :content, :categorie_id, :user_id, :date_wiki, '0')";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':categorie_id', $categorie_id);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':date_wiki', $date_wiki);

            $stmt->execute();
            $wikiId = $db->lastInsertId();

            foreach ($tags as $tag) {
                Tag::wiki_tag($tag, $wikiId);
            }

            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs ici
            return false;
        }
    }

    /****
     * @param $wiki_id
     * @param $tags
     * @param $title
     * @param $content
     * @param $category
     * @param $creator
     * @param $updated_date
     * @param $picture
     * @return string
     */
    function updateWiki($wiki_id, $title, $content, $category, $tags) {
        global $db;


        $sql = "UPDATE wiki SET title = :title, content = :content, categorie_id = :category_id WHERE wiki_id = :wiki_id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':category_id', $category);
        $stmt->bindParam(':wiki_id', $wiki_id);

        $stmt->execute();

//        foreach ($tags as $tag) {
//            Tag::update_wiki_tag($tag, $wiki_id);
//        }

        return "success";
    }


    /***
     * @param $wiki_id
     * @return bool
     */
    function deleteWiki($wiki_id) {
        global $db;
        $sql = "DELETE FROM wiki WHERE wiki_id = :wiki_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':wiki_id', $wiki_id);
        $success= $stmt->execute();
        return $success;
    }

    /*****
     * @param $wikiId
     * @return bool
     */
    function archiveWiki($wikiId) {
        global $db;

        $sql = "UPDATE wiki SET deleted = '1' WHERE wiki_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $wikiId, PDO::PARAM_INT);
        $success= $stmt->execute();
        return $success;
    }

    /***
     * @param $wiki_id
     * @return mixed
     */
    function wikiDetails($wiki_id){
        global $db;
        $wiki = $db->prepare('SELECT GROUP_CONCAT(tags.tag) AS tags, wiki.*, users.username, users.picture, users.email, categories.categorie 
         FROM wiki
         JOIN users ON wiki.user_id = users.user_id
         JOIN wikitag ON wikitag.wiki_id = wiki.wiki_id
         JOIN tags ON tags.tag_id = wikitag.tag_id
         JOIN categories ON wiki.categorie_id = categories.categorie_id
         WHERE deleted = 0 AND wiki.wiki_id = ? ;');
        $wiki->execute([$wiki_id]);
        return $wiki->fetch(PDO::FETCH_ASSOC);
    }

    /****
     * @return mixed
     */
    public function totalWiki(){
        global $db;
        $wiki = $db->prepare("SELECT COUNT(*) as total_wiki FROM wiki");
        $wiki->execute();
        $result = $wiki->fetch(PDO::FETCH_ASSOC);
        return $result['total_wiki'];
    }

    public function totalWikiCategory($categorie_id){
        global $db;
        $wiki = $db->prepare("SELECT COUNT(*) as total_wiki FROM wiki WHERE categorie_id = :categorie_id");
        $wiki->bindParam(':categorie_id', $categorie_id, PDO::PARAM_INT);
        $wiki->execute();
        $result = $wiki->fetch(PDO::FETCH_ASSOC);
        return $result['total_wiki'];
    }


}
