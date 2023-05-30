<?php
session_start();
require_once('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action=$_GET['action'];
    if ($action === 'getRentInfo') {
        // Call the getRentInfo function and encode the result as JSON
        $rentInfo = getRentInfo($conn);
        echo json_encode($rentInfo);
        exit;
    }else if ($action === 'getBuyInfo') {
        // Call the getBuyInfo function and encode the result as JSON
        $buyInfo = getBuyInfo($conn);
        echo json_encode($buyInfo);
        exit;
    } else if($action === 'getUserInfo') {
        // Call the getBuyInfo function and encode the result as JSON
        $userInfo = getUserinfo($conn);
        echo json_encode($userInfo);
        exit;
    }
}

function getUserinfo($conn)
{
    $userId=$_SESSION['user_id'];
    $f_name=$l_name=$email=$sexe =$balance ="";
    $sql = "SELECT First_name,Last_name,email,Sexe,Credits FROM user WHERE User_ID = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $userId);
        if ($stmt->execute()) {
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $stmt->bind_result($f_name,$l_name,$email,$sexe,$balance);
                $stmt->fetch();
                $stmt->close();
                return array($f_name,$l_name,$email,$sexe,$balance);
            }
        }
        $stmt->close();
    }

    return null;
}

function getBuyInfo($conn) {
    $userId = $_SESSION['user_id'];
    $sql = "SELECT * FROM Buy WHERE u_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if ($result->num_rows > 0) {
            $rentals = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $rentals[] = array(
                    'car' => getCarInfo($row['c_id'],$conn),
                );
            }

            mysqli_stmt_close($stmt);
            return $rentals;
        }

        mysqli_stmt_close($stmt);
    }

    return false;
}
function getRentInfo($conn) {
    $userId = $_SESSION['user_id'];
    $sql = "SELECT * FROM Rent WHERE u_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if ($result->num_rows > 0) {
            $rentals = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $rentals[] = array(
                    'car' => getCarInfo($row['c_id'],$conn),
                    'Date_Déb' => $row['Date_Déb'],
                    'Date_Fin' => $row['Date_Fin']
                );
            }

            mysqli_stmt_close($stmt);
            return $rentals;
        }

        mysqli_stmt_close($stmt);
    }

    return false;
}

function getCarInfo($c_id, $conn)
{
    $sql = "SELECT brand, model FROM cars WHERE car_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $c_id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $stmt->close();
                return $row['brand'] . ' ' . $row['model'];
            }
        }

        $stmt->close();
    }

    return null;
}


?>
