<?php
 
 session_start();
 require_once("functions.php");
 if(isset($_POST['update_info']))
 {
    $id=$_SESSION['id'];

	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$username = trim($_POST['username']);
	$new_password = trim($_POST['new_password']);
	$confirm = trim($_POST['confirm_password']);
    $select= "select * from player where id='$id'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id'];
    if($res === $id)
    {
   
       $update = "UPDATE player SET username='{$username}',email='{$email}',password='{$new_password}' WHERE id='{$id}'"
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           /*Successful*/
           header('location:profile-page.php');
       }
       else
       {
           /*sorry your profile is not update*/
           header('Location:index.html');
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('Location: login.php');
    }
 }
?>
