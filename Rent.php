<?php
session_start();
include_once('connect.php');

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    echo "Not_Logged";
    exit();
}

// Validate required fields
if (!isset($_POST['car'], $_POST['fromDate'], $_POST['toDate'])) {
    echo "Missing required fields.";
    exit();
}

// Sanitize and validate input
$car = $_POST['car'];
$parts = explode("|", $car);
$brand = trim($parts[0]);
$model = trim($parts[1]);
$startDate = $_POST['fromDate'];
$endDate = $_POST['toDate'];
$userId = $_SESSION['user_id'];

// Validate input data
if (empty($brand) || empty($model) || empty($startDate) || empty($endDate)) {
    echo "Missing required fields.";
    exit();
}

// Retrieve car's purchase price
list($carId, $rentPrice) = getCarInfo($brand, $model, $conn);
if (!$carId) {
    echo "Invalid car selected.";
    exit();
}

if (strtotime($endDate) < strtotime($startDate)) {
    echo "Dates are in the wrong order.";
    exit();
}

// Check if the car is available for rent
if (!checkCarAvailability($carId, $startDate, $endDate, $conn)) {
    echo "The car is not available for the selected dates.";
    exit();
}

// Perform the rental operation
if (rentCar($userId, $carId,$rentPrice, $startDate, $endDate, $conn)) {
    echo "success";
} else {
    echo "Oops! Something went wrong while renting the car.";
}

mysqli_close($conn);

function checkCarAvailability($carId, $startDate, $endDate, $conn) {
    $sql = "SELECT id FROM Rent WHERE c_id = ? AND (Date_Déb <= ? AND Date_Fin >= ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iss", $carId, $endDate, $startDate);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);
            mysqli_stmt_close($stmt);
            return $rowCount === 0; // Return true if no conflicting rental exists
        }
        mysqli_stmt_close($stmt);
    }
    return false; // Return false in case of any errors
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
function getCarInfo($brand, $model, $conn)
{
    $carId = $price =0 ;
    $sql = "SELECT car_id, rental_price FROM cars WHERE brand = ? AND model = ?";
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

function rentCar($userId, $carId,$rentPrice, $startDate, $endDate, $conn) {
    $sql = "INSERT INTO Rent (u_id, c_id, Date_Déb, Date_Fin) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iiss", $userId, $carId, $startDate, $endDate);

        // Retrieve user's balance
        $userBalance = getUserBalance($userId, $conn);

        // Calculate the number of days
        $numberOfDays = ceil((strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24));

        if ($userBalance >= ($rentPrice*$numberOfDays)) {
            // User's balance is sufficient, proceed with the rental operation
            $success = mysqli_stmt_execute($stmt);
            $newBalance = $userBalance - ($rentPrice*$numberOfDays);
            updateBalance($userId, $newBalance, $conn);
            $conn->commit();
            mysqli_stmt_close($stmt);
            return $success;
        } else {
            echo "Insufficient balance.";
            mysqli_stmt_close($stmt);
            return false;
        }
    }
    return false;
}