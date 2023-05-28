<?php

session_start();
include_once('connect.php');

function buyCar($brand, $model, $userId, $conn)
{
    $carId = getCarId($brand, $model, $conn);

    if ($carId) {
        $success = insertIntoBuyTable($userId, $carId, $conn);
        if ($success) {
            echo "success";
        } else {
            echo "Oops! Something went wrong while inserting into the 'buy' table.";
        }
    } else {
        echo "No car found.";
    }
}

function getCarId($brand, $model, $conn)
{
    $sql = "SELECT car_id FROM cars WHERE brand = ? AND model = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $brand, $model);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $carId);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);
                return $carId;
            }
        }
        mysqli_stmt_close($stmt);
    }

    return null;
}

function insertIntoBuyTable($userId, $carId, $conn)
{
    $sql = "INSERT INTO Buy (u_id, c_id) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ii", $userId, $carId);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $success;
    }

    return false;
}

if (isset($_SESSION['user'])) {
    if (isset($_POST['car'])) {
        $car = $_POST['car'];
        $parts = explode("|", $car);
        $brand = trim($parts[0]);
        $model = trim($parts[1]);

        buyCar($brand, $model, $_SESSION['user_id'], $conn);
    } else {
        echo "Invalid request";
        exit();
    }
} else {
    echo "Not_Logged";
    exit();
}

mysqli_close($conn);