<?php
    require_once 'csrfToken.php';

    if(!isset($_COOKIE['sessionId'])) {
        // if session is not available redirect to the login page.
        header("Location: login.php");
    }
    if(!isset($_POST["token"])) {
        // user has manually entered to this page..
        header("Location: home.php");
    }
    $csrfToken = $_POST["token"];

    if(isset($_POST['content'])){
        if(strcmp($csrfToken, $_COOKIE['CSRFToken']) == 0) {
            echo ("Hi ". $_POST['content'] . ", your token is Verified!");
        }
        else {
            echo ("Hi ". $_POST['content'] . ", you have been caught for cross site forgery."
                . " Please ensure  you are using the correct website");
        }
    }
?>