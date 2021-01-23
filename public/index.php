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
    elseif (isset($_GET['page']) && $_GET['page'] === "authenticate") {
        include "../bootcamp_app/actions/authenticate.php";
    } 
    else {
        // $page_name = "access_denied";
    }

    include "../bootcamp_app/pages/" . $page_name . ".php";

    ?>
    
</body>
</html> 


