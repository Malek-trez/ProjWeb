<?php

session_start();

//make connection
include_once ('connect.php');

// Define variables and initialize with empty values
$email =  $password  = $user = $id = "";
$email_err = $password_err  = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    }
    else {
        $email = trim($_POST["email"]);
        echo "$email";
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "Password must have at least 8 characters.";
    } else {
        $password = trim($_POST["password"]);
        echo "$password";
    }

    if (empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "SELECT password,first_name,User_ID FROM User WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $email);
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                // Check if the email exists
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Email exists, check if password is correct
                    mysqli_stmt_bind_result($stmt, $password_from_db,$user,$id);
                    mysqli_stmt_fetch($stmt);
                    if ($password == $password_from_db) {
                        // Password is correct, start session and redirect to home page
                        echo"$user";
                        $_SESSION['user'] = $user;
                        $_SESSION['user_id'] = $id;
                        header("location: index.php");
                    } else {
                        // Password is incorrect, show error message
                        $password_err = "The password you entered is incorrect.";
                    }
                } else {
                    // Email does not exist, show error message
                    $email_err = "No account found with that email.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close the statement
            mysqli_stmt_close($stmt);
        }

    }

}