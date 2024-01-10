<?php
class Categorie
{
    public $categorie_id;
    public $categorie;


    public function __construct()
    {

    }

    public function getCategories(){
        global $db;
        $categories = $db->query('SELECT * FROM categories');
        return $categories->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($categorie){
        global $db;
        $stmt = $db->prepare('INSERT INTO categories (categorie) VALUES (:categorie)');
        $stmt->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function edit($categorie_id, $categorie){
        global $db;
        $stmt->getCategories();
        foreach ($categorie as $categorie) {
            $categorie = $categorie['categorie'];
        }

        $stmt = $db->prepare('UPDATE categories 
                            SET categorie = :categorie, 
                            WHERE categorie_id = :categorie_id');
        $stmt->bind(':categorie', categorie);
        $stmt->bind(':categorie_id', categorie_id, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function delete($categorie_id){
        global $db;
        $stmt = $db->prepare('DELETE FROM categories WHERE categorie_id = :categorie_id');
        $stmt->bindValue(':categorie_id', $categorie_id);
        $stmt->execute();
    }

}

