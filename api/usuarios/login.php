<?php
$db = "agrow";
$dbuser = "root";
$dbpassword = "";
$dbhost = "localhost";

$return["error"] = false;
$return["message"] = "";
$return["success"] = false;

$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $db);

if (isset($_POST["email"]) && isset($_POST["senha"])) {

    $username = $_POST["email"];
    $password = $_POST["senha"];

    $username = mysqli_real_escape_string($link, $username);

    $sql = "SELECT * FROM users WHERE email = '$username'";

    $res = mysqli_query($link, $sql);
    $numrows = mysqli_num_rows($res);

    if ($numrows > 0) {

        $obj = mysqli_fetch_object($res);

        if (($password) == $obj->senha) {
            $return["success"] = true;
        } else {
            $return["error"] = true;
            $return["message"] = "Senha Incorreta.";
        }
    } else {
        $return["error"] = true;
        $return["message"] = 'Email não encontrado';
    }
} else {
    $return["error"] = true;
    $return["message"] = 'Preencha os campos';
}

mysqli_close($link);

header('Content-Type: application/json');
echo json_encode($return);
