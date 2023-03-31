<?php
session_start();
require_once("baglan.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST['username']);
	$password = validate($_POST['password']);
    if(empty($username) && empty($password)){
        header("Location:login.php?error=Kullanıcı adı veya şifreyi giriniz !!");
        exit();
    }
    else{
        $db = new database();
        $loginQuery = $db->getRows("SELECT userName,passwordd FROM users");
        foreach($loginQuery as $items){
            if($items->userName==$username && $items->passwordd==$password){
                $_SESSION['userName'] = $items->userName;
                $_SESSION['NameLastname'] = $items->NameLastname;
                header("Location:index.php");
                exit();
            }
            else{
                header("Location:login.php?error=Kullanıcı Adı veya Parola Hatalı!!");
                exit();
            }
        }


    }

}
else{
    header("Location:login.php");
    exit();
}


?>
