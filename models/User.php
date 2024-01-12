<?php
include_once 'Database.php';
class User extends Database
{
    public $user_id;
    public $picture;
    public $username;
    public $email;
    private $password;

    public function register($picture, $username, $email, $password){
        if($this->isEmailUnique($email)){
            $this->query('INSERT INTO users(username, picture, email, password, role) VALUES (:username, :picture, :email, :password, :role)');
            $this->bind(':username', $username);
            $this->bind(':picture', $picture);
            $this->bind(':email', $email);
            $this->bind(':password', $password);
            $this->bind(':role', 'Auteur');
            $this->execute();
        } else {
            throw new Exception('Email already exist !');
        }

    }

    public function login($email, $password){
        $this->query('SELECT * FROM users WHERE email = :email');
        $this->bind(':email', $email);
        $row = $this->single();

        if(!empty($row) && !is_null($row)){
            $hashedPassword = $row['password'];
            if (password_verify($password, $hashedPassword)){
                return $row;
            }else{
                throw new Exception('Password inccorect !');
            }
        }else {
            throw new Exception('Account not exist !');
        }
    }

    function isEmailUnique($email){
        $this->query('SELECT * FROM users WHERE email = :email');
        $this->bind(':email', $email);
        $row = $this->single();
        return $row;
    }

    public function getUsers(){
        $this->query("SELECT * FROM users");
        $users = $this->multiple();
        return $users;
    }

    public function edit($picture, $username, $email, $password, $user_id){
            $this->getUsers();
            foreach ($users as $user) {
                if($users['user_id'] === $_SESSION['user_id']){
                    $picture = $user['picture'];
                    $username = $user['username'];
                    $email = $user['email'];
                    $password = $user['password'];
                }
            }

            $this->query("UPDATE users 
                            SET picture = :picture, 
                                username = :username,
                                email = :email,
                                password = :passowrd
                            WHERE user_id = :user_id");
            $this->bind(':username', $username);
            $this->bind(':picture', $picture);
            $this->bind(':email', $email);
            $this->bind(':password', $password);
            $this->bind(':user_id', $user_id);

            $this->execute();
    }

    public function delete($user_id){
        $this->query("DELETE FROM users WHERE user_id = :user_id");
        $this->bind(':user_id', $user_id);

        $this->execute();
    }

    public function getLatestUsers($limit = 5){
        global $db;
        $sql = 'SELECT * FROM users ORDER BY user_id DESC LIMIT :limit';
        $users = $db->prepare($sql);
        $users->bindParam(':limit', $limit, PDO::PARAM_INT);
        $users->execute(); // Exécuter la requête préparée
        return $users->fetchAll(PDO::FETCH_ASSOC);
    }




}
$userO1 = new User();

