<?php
if (file_exists("models/User.php"))
    include_once "models/User.php";

//$user = new User();


if (isset($_POST["req"]) && $_POST["req"] == "signin") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $userObj = new User;
    $userChecker = $userObj->isEmailUnique($email);

    if (!$userChecker) {
        echo json_encode(["error" => "User does not exist."]);
    } elseif (!password_verify($password, $userChecker["password"])) {
        echo json_encode(["error" => "Password is incorrect."]);
    } else {
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $userChecker["user_id"];
        $_SESSION['username'] = $userChecker["username"];
        $_SESSION['picture'] = $userChecker["picture"];
        if ($userChecker["role"] == "Admin") {
            $access = "dashboard";
            $_SESSION['Admin'] = true;
        }
        else
            $access = "home";
        echo json_encode(["success" => $access]);
    }

    exit;
}