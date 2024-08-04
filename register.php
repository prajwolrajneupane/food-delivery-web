<?php 
include 'connect.php';

if(isset($_POST['submit'])){
    $name = $_POST['jname'];
    $height = $_POST['jheight'];
    $weight = $_POST['jweight'];
    $gender = $_POST['gender'];
    $email = $_POST['jemail'];
    $password = md5($_POST['jpassword']);

    // Check if the email already exists
    $checkEmail = "SELECT * FROM Join_tbl WHERE memberemail='$email'";
    $result = $conn->query($checkEmail);

    if($result->num_rows > 0){
        echo "Email address already exists";
    } else {
        // Insert the new user into the database
        $insertsql = "INSERT INTO Join_tbl (membername, memberheight, memberweight, membergender, memberemail, memberpassword) 
                      VALUES ('$name', '$height', '$weight', '$gender', '$email', '$password')";

        if($conn->query($insertsql) === TRUE){
            // Start session and store email
            session_start();
            $_SESSION['jemail'] = $email;

            // Redirect to welcome page
            header("Location: homepage.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
