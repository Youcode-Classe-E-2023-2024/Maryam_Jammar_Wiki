<?php
class Categorie
{
    public $categorie_id;
    public $categorie;

    /***
     * @return array|false
     */
    public function getCategories(){
        global $db;
        $categories = $db->query('SELECT * FROM categories');
        return $categories->fetchAll(PDO::FETCH_ASSOC);
    }

    /***
     * @param $categorie
     * @return void
     */
    public function create($categorie){
        global $db;
        $stmt = $db->prepare('INSERT INTO categories (categorie) VALUES (:categorie)');
        $stmt->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $stmt->execute();
    }

    /***
     * @param $categorie_id
     * @param $categorie
     * @return bool
     */
    function updateCategory($categorie_id, $categorie)
    {
        global $db;
        $stmt = $db->prepare('UPDATE categories SET categorie = :categorie WHERE categorie_id = :categorie_id');
        $stmt->bindParam(':categorie', $categorie, PDO::PARAM_STR);
        $stmt->bindParam(':categorie_id', $categorie_id, PDO::PARAM_INT);

        $success = $stmt->execute();

        return $success;
    }


    /***
     * @param $categorie_id
     * @return void
     */
    public function delete($categorie_id){
        global $db;
        $stmt = $db->prepare('DELETE FROM categories WHERE categorie_id = :categorie_id');
        $stmt->bindValue(':categorie_id', $categorie_id);
        $stmt->execute();
    }

    /***
     * @param $limit
     * @return array|false
     */
    public function getLatestCategories($limit = 7){
        global $db;
        $sql = 'SELECT * FROM categories ORDER BY categorie_id DESC LIMIT :limit';
        $categories = $db->prepare($sql);
        $categories->bindParam(':limit', $limit, PDO::PARAM_INT);
        $categories->execute(); // N'oubliez pas d'exécuter la requête
        return $categories->fetchAll(PDO::FETCH_ASSOC);
    }


    /***
     * @return mixed
     */
    public function totalCategory(){
        global $db;
        $category = $db->prepare("SELECT COUNT(*) as total_categorie FROM categories");
        $category->execute();
        $result = $category->fetch(PDO::FETCH_ASSOC);
        return $result['total_categorie'];
    }



}
$categorieO = new Categorie();

$categories = $categorieO->getCategories();

