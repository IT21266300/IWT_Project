<?php require_once './connect.php' ?>

<?php

    if(isset($_POST['login'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql= "SELECT * FROM useraccount WHERE Username = '$username' AND Apassword = '$password' ";
        
        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result) == 1){
            header('location:../html/home.html');
        }
        else{
            require_once './log-error.php';
        }
    }

?>


<?php $connection->close() ?>
