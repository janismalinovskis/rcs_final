<?php
session_start();

$succses="";
$failed="";
//login
if(isset($_POST['submit'])){
    require_once 'components/connect.php';
    $logemail=$_POST['logemail'];
    $logpassword=$_POST['logpassword'];
//sql query
    $sql="SELECT password,email FROM users WHERE email=? ";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("s",$logemail);
    $stmt->execute();
    $result=$stmt->get_result();
// check if user in db
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        
          
        if(password_verify($logpassword,$row['password'])){
            $_SESSION['email']=$row['email'];
            $succses='<div class="alert alert-success" role="alert">
      You are logged in
    </div>
    ';
    $_SESSION['loggedin'] = true;
          
    header('refresh:2,profile.php');

          }else{
            $failed='<div class="alert alert-danger" role="alert">
            wrong password and/or email! 
          </div>';
          }
        
          
    }else{
    
        $failed='<div class="alert alert-danger" role="alert">
        wrong password and/or email!
      </div>';
    
    }


    $stmt->close();
    $conn->close();
}



?>

<!--input form-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href="./css/style.css" rel="stylesheet">
<div class="container">
    <div class="wrapper">

    <h1>Login</h1>
    <?php echo $failed ?>
        <?php echo $succses ?>
        <form action="" method="POST">
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="logemail">
        <div id="emailHelp" class="form-text">

        </div>
    </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="logpassword">
    </div>
  
    <button type="submit" class="btn btn-primary" name="submit">Login</button>
    <a class="btn btn-secondary" href="./register.php">Register</a>

    </form>
    </div>
</div>

<?php

require_once 'components/footer.php';

?>
