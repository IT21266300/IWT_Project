<?php require_once './connect.php' ?>

<?php
    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $cPassword = $_POST['cPassword'];

        session_start();

        $aNo = $_SESSION['accountNo'];

        if(!empty($username) && !empty($password) && !empty($cPassword)){
            
            $userCheck = ($connection -> query("SELECT * FROM useraccount WHERE Username = '$username'"));

            if(mysqli_num_rows($userCheck) > 0){
                $errorMessage = 'Username is Already taken! Try with another username';
                require_once './errorPage.php';
            }
            else{
                if($password == $cPassword){

                    if(!(strlen($cPassword) > 6)){
                        $errorMessage = 'Password is too short! Password must be have at least 6 characters';
                        require_once './errorPage.php';
                    }
                    else{
                        $encPassword = sha1($cPassword);

                        $sql =($connection->query("UPDATE  useraccount SET Username = '$username', Apassword = '$password' WHERE AccountNo = '$aNo'")); 

                        if($sql){
                            header("Location:../html/login.html");
                            // require_once '../html/login.html';
                        }
                        else{
                            $errorMessage = 'File Submission is Failed';
                            require_once './errorPage.php';
                        }
                    }
                }
                else{
                    $errorMessage = 'Passwords are not Matched! Try again';
                    require_once './errorPage.php';
                }

            }
        }
        else{
            $errorMessage = 'Input fields are empty!';
            require_once './errorPage.php';
        }

    }
    else{
        $errorMessage = 'Something wrong!';
        require_once './errorPage.php';
    }

?>


<?php $connection->close() ?>