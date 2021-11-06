<?php

$servername = "localhost";
$username = "root";
$password = ""; //nghia26102003
$database = "nghiapham1026_db"; //nghiapham1026_db
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
}

function getAllUsers()
{

    global $conn;
    $sql = "SELECT * FROM USERS";

    try {
        $result = mysqli_query($conn, $sql);
    } catch (Exception $ex) {
        echo "Something is wrong";
    }
    return $result;
}

function getUser($username, $password)
{

    global $conn;
    $sql = "SELECT * FROM USERS WHERE username='" . $username . "' AND password='" . $password . "'";

    try {
        $result = mysqli_query($conn, $sql);
    } catch (Exception $ex) {
        echo "Something is wrong";
    }
    return mysqli_fetch_array($result);
}

function setUser($username, $email, $password)
{

    global $conn;
    $sql = "INSERT INTO USERS(Username, Email, Password) VALUES('{$username}', '{$email}', '{$password}' )";

    try {
        $result = mysqli_query($conn, $sql);
    } catch (Exception $ex) {
        echo "Something is wrong";
    }

    return $result;
}
///////////////////////////////////////////////////////

function getAllCars()
{

    global $conn;
    $sql = "SELECT * FROM CARS";

    try {
        $result = mysqli_query($conn, $sql);
    } catch (Exception $ex) {
        echo "Something is wrong";
    }
    return $result;
}
function getCar($id)
{

    global $conn;
    $sql = "SELECT * FROM CARS WHERE ID='" . $id . "'";

    try {
        $result = mysqli_query($conn, $sql);
    } catch (Exception $ex) {
        echo "Something is wrong";
    }
    return mysqli_fetch_array($result);
}
function deleteCar($id)
{

    global $conn;
    $sql = "DELETE FROM CARS WHERE ID='{$id}'";

    try {
        $result = mysqli_query($conn, $sql);
    } catch (Exception $ex) {
        echo "Something is wrong";
    }
    return $result;
}
function setCar($manufacturer, $model, $color)
{

    global $conn;
    $sql = "INSERT INTO CARS(Manufacturer, Model, Color) VALUES('{$manufacturer}', '{$model}', '{$color}' )";

    try {
        $result = mysqli_query($conn, $sql);
    } catch (Exception $ex) {
        echo "Something is wrong";
    }

    return $result;
}
function updateCar($id, $manufacturer, $model, $color)
{

    global $conn;
    $sql = "UPDATE CARS SET Manufacturer = '{$manufacturer}' , Model = '{$model}', Color = '{$color}'  WHERE id = {$id}";

    try {
        $result = mysqli_query($conn, $sql);
    } catch (Exception $ex) {
        echo "Something is wrong";
    }

    return $result;
}
