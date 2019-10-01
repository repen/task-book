<?php
include 'functions.php';
include 'config.php';

// var_dump($_POST);
//var
if ($_POST["command"] == "load_data") {
    save_json("temp.json", $_POST);
    header('Location: /?message=[Successful] task added');
    exit;
}
if ($_POST["command"] == "login") {
    if ($_POST["username"] != "admin" or $_POST["password"] != "123") {
        header('Location: /login.php?message=[Error] login or password');
        exit;
    } else {
        $_SESSION["access"] = 1;
        header('Location: /');
        exit;
    }
}

if ($_POST["command"] == "edit_task") {
	update_json("temp.json", $_POST, (int)$_POST["id_task"]);
	header('Location: /');
}


