<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php todo</title>
    
    <style>
        <?php include "style.css" ?>
    </style>
</head>
<body>
    <?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $sid = "000";

    session_start();
    $page_name = 'login';

    if (isset($_SESSION['username']) && 
        isset($_SESSION['password']) && 
        $_SESSION['username'] === 'andersons' && 
        $_SESSION['password'] === '123'
    ) {
        if (isset($_GET['page']) && $_GET['page'] === "logout") {
            $page_name = "logout";
        } else {
            $page_name = "todo";
        }
        
    }
    elseif (isset($_GET['sid']) && $_GET['sid'] === $sid) {
        if (isset($_GET['username']) && isset($_GET['password'])) {
            if ($_GET['username'] == "andersons" && $_GET['password'] == "123") {
                $_SESSION['username'] = $_GET['username'];
                $_SESSION['password'] = $_GET['password'];
                $page_name = "todo";
            } 
        } 
        else {
            $page_name = "page404";
        }
    }

    include "../bootcamp_app/pages/" . $page_name . ".php";

    ?>
    
</body>
</html> 


