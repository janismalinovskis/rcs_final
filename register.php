<?php



// var for alerts
$succses="";
$failed="";

//post email password
if(isset($_POST['submit'])){
  require_once 'components/connect.php';
  $email=$_POST['email'];
  $password=$_POST['password'];
  //check if email used
  $q="SELECT id FROM users WHERE email=?";
  $stmt = $conn->prepare($q); 
  $stmt->bind_param("s", $email);
  $stmt->execute();
 $r=$stmt->get_result();
  if(mysqli_num_rows($r)!=0){
    echo '<div class="alert alert-danger" role="alert">
    Email used!
  </div>';
  $stmt->close();

}else{
  //check if email or password not empty
  if($email&&$password!=null){
  //password hashing
  $hash=password_hash($password,PASSWORD_DEFAULT);
//inserting values in db
  $sql="INSERT INTO users (email, password) VALUES(?,?)";
   $stmt=$conn->prepare($sql);
   $stmt->bind_param("ss",$email,$hash);
   
  
  
  //check if insert ok
  if(mysqli_stmt_execute($stmt)){
      $succses='<div class="alert alert-success" role="alert">
      User registered succesfully
    </div>
    ';
   
      header('refresh:0,index.php');
      $stmt->close();
      $conn->close();
    }


}else{
  $failed='<div class="alert alert-danger" role="alert">
  Empty fields!
</div>';
}
}
}


?>


<!--input form-->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href="./css/style.css" rel="stylesheet">
<div class="container">
<div class="wrapper">

<h1>Register</h1>
<?php echo $failed ?>
<?php echo $succses ?>
<form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
    </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  
  <button type="submit" class="btn btn-secondary" name="submit" >Register</button>
  <a class="btn btn-primary" href="./index.php">Login</a>
</form>
</div>


</div>
<?php
require_once 'components/footer.php';
?>