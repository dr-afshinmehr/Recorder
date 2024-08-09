<?php
function connection()
{
    $servername = "localhost";
    $username = "isamhrhz_asr";
    $password = ".5366REZA0215Asr.";
    $dbname = "isamhrhz_tasks_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
function connection_user()
{
    $servername = "localhost";
    $username = "isamhrhz_asr";
    $password = ".5366REZA0215Asr.";
    $dbname = "isamhrhz_users";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>