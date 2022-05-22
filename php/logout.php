<?php require_once './connect.php' ?>
<?php
    session_start();

    if(session_destroy()){
        header("Location:../html/login.html");
    }

?>  

<?php $connection->close();