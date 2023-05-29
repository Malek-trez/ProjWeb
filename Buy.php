<?php
session_start();
require_once('connect.php');

function buyCar($brand, $model, $userId, $conn)
{
    $carInfo = getCarInfo($brand, $model, $conn);

    if ($carInfo) {
        $carId = $carInfo[0];
        $carPrice = $carInfo[1];

        $userBalance = getUserBalance($userId, $conn);

        if ($userBalance !== null && $userBalance >= $carPrice) {
            try {
                $conn->begin_transaction();

                $success = insertIntoBuyTable($userId, $carId, $carPrice, $conn);
                if ($success) {
                    $newBalance = $userBalance - $carPrice;
                    updateBalance($userId, $newBalance, $conn);

                    $conn->commit();
                    echo "success";
                } else {
                    echo "Oops! Something went wrong while inserting into the 'buy' table.";
                }
            } catch (Exception $e) {
                $conn->rollback();
                echo "Oops! An error occurred during the transaction.";
            }
        } else {
            echo "Insufficient balance.";
        }
    } else {
        echo "No car found.";
    }
}

function getUserBalance($userId, $conn)
{
    $sql = "SELECT Credits FROM user WHERE User_ID = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $userId);
        if ($stmt->execute()) {
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $stmt->bind_result($balance);
                $stmt->fetch();
                $stmt->close();
                return $balance;
            }
        }
        $stmt->close();
    }

    return null;
}

function getCarInfo($brand, $model, $conn)
{
    $sql = "SELECT car_id, purchase_price FROM cars WHERE brand = ? AND model = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $brand, $model);
        if ($stmt->execute()) {
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $stmt->bind_result($carId, $price);
                $stmt->fetch();
                $stmt->close();
                return array($carId, $price);
            }
        }
        $stmt->close();
    }

    return null;
}

function insertIntoBuyTable($userId, $carId, $carPrice, $conn)
{
    $sql = "INSERT INTO Buy (u_id, c_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ii", $userId, $carId);
        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

    return false;
}

function updateBalance($userId, $newBalance, $conn)
{
    $sql = "UPDATE user SET Credits = ? WHERE User_ID = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ds", $newBalance, $userId);
        $success = $stmt->execute();
        $stmt->close();

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

$conn->close();
?>
