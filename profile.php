<?php



session_start();
require_once 'components/navbar.php';
//check if user is logged in
if(!isset($_SESSION['email'])){
    session_destroy();
    header('refresh:0 index.php');
}

//log out
if(isset($_POST['submit'])){
    session_destroy();
    header('refresh:0,index.php');
}

$user_id=$_SESSION['email'];

require_once 'components/connect.php';




// create post
if(isset($_POST['create'])){

$title=$_POST['title'];
$discription=$_POST['discription'];
if($title&&$discription!=null){

    $sql="INSERT INTO posts (user_id,title,discription) VALUES(?,?,?)";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("sss", $user_id,$title,$discription);
   
    
    
    if(mysqli_stmt_execute($stmt)){
        echo '
        
        <div class="alert alert-success" role="alert">
        Post created succesfully!
        </div>'; 
    $stmt->close();
    }
}else{
    echo '<div class="alert alert-danger" role="alert">
    Empty fields!
  </div>';
}
}

?>
<!-- input form -->
<div class="container">
<h1><?php echo "hello ".$_SESSION['email'];?> </h1>

<form action="" method="POST">


</form>

</div>
<div class="container">
<br>
<br>
<br>
<form  action="" method="POST">
        <div class="mb-3">
        <label  class="form-label">Post title</label>
        <input type="text" class="form-control" id="exampleInputEmail1"  name="title" value="">
        
    </div>
    <div class="mb-3">
    <label  class="form-label">Discription</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="discription" value="">
    </div>
  
    <button type="submit" class="btn btn-primary" name="create">Create</button>
    
    
    
    
    
    
    <?php 
    
    // edit 
    if (isset($_POST['change'])) {
    
        echo '<form  action="" method="POST">
    <div class="mb-3">
    <label  class="form-label">Post title</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  name="up_title" value="">
    
    </div>
    <div class="mb-3">
    <label  class="form-label">Discription</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="up_discription" value="">
    
    </div>
    
    <input type="hidden" name="user_id" value="'. $_POST['user_id'] . '"/>
    <button type="submit" class="btn btn-primary" name="update" value="'.$_POST['change_rec'].'">update</button>';
    


    // update 
    }
     if(isset($_POST['update'])){
    $user_up=$_POST['user_id'];
    $id=$_POST['update'];  
   
    $title_update=$_POST['up_title'];
    $discription_update=$_POST['up_discription'];
    if($title_update&&$discription_update!=null){ 
    $update="UPDATE posts SET title=?, discription=? WHERE user_id=? AND id=? ";    
    $stmt=$conn->prepare($update);
    $stmt->bind_param("sssi",$title_update,$discription_update,$user_id,$id);
    
        if($stmt->execute()&&$user_id==$user_up)
        {
            echo '
        
            <div class="alert alert-success" role="alert">
            Post updated succesfully!
            </div>'; 

        $stmt->close();
    }
}else{
    echo '<div class="alert alert-danger" role="alert">
    Empty fields!
  </div>';
}


}

?>
    
</div>

<div class="container">
<h1>Posts</h1>
<?php

require_once 'components/connect.php';


//delete
if(isset($_POST['delete'])){
    $id =$_POST['delete_rec_id'];
    $user_del=$_POST['user_id'];
   
    $delete="DELETE FROM posts WHERE user_id=? AND id=?";
    $stmt=$conn->prepare($delete);
    $stmt->bind_param("si",$user_id,$id); 
    if($stmt->execute()&&$user_id==$user_del){
        
        echo '<div class="alert alert-danger" role="alert">
        Post with id '.$id.' deleted!
      </div>';
    $stmt->close();
    }else{
        echo '<div class="alert alert-danger" role="alert">
    This is not your post!
  </div>';
    }
    
    
}



//showing posts

$result = mysqli_query($conn, "SELECT * FROM posts");

if(mysqli_num_rows($result)){
    

    while($row=$result->fetch_assoc()){
        
        
        
        
        echo"id: ".$row['id']. "<br>";
        echo"user id: ".$row['user_id']. "<br>";
        echo"Title: ".$row['title']. "<br>";
        echo"Discription: ".$row['discription']. "<br>";
        echo"Created_at: ".$row['created_at']. "<br>";
        
        echo '<form action="" method="post">
        <input type="submit" class="btn btn-secondary" name="delete" value="Delete!"/>
        <input type="hidden" name="delete_rec_id" value="'.$row['id'] . '"/>
        <input type="hidden" name="user_id" value="'. $row['user_id'] . '"/>
        </form>';
        echo '<form action="" method="post">
        <input type="submit" class="btn btn-primary" name="change" value="edit"/>
        <input type="hidden" name="change_rec" value="'. $row['id'] . '"/>
        <input type="hidden" name="user_id" value="'. $row['user_id'] . '"/>
        </form>';
    
        
    }   
        
}else{
    echo"no data";
}


$conn->close();

require_once 'components/footer.php';

?>





