<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
     $name=$_POST['name'];
     $email=$_POST['email'];
    $mobile=$_POST['mobile'];
   $emailsubject=$_POST['emailsubject'];
    $comment=$_POST['comment'];
    
   //submit to database
$servername="localhost";
$username="root";
$password="";
$database="contactus";
//create a connection
$conn=mysqli_connect($servername,$username,$password,$database);
// echo "connection was successful";
if(!$conn){
     die("sorry we failed to connect:".mysqli_connect_error());

}
else{
     echo "connection was successful<br>";

//submit to the database
//sql query to be executed
$sql="INSERT INTO `manikatb` (`name`, `email`, `mobile`,`emailsubject`,`comment`, `dt`) 
VALUES ('$name', '$email', '$mobile','$emailsubject','$comment', current_timestamp())";
$result=mysqli_query($conn,$sql); 
if($result){
     echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong>success</strong> your entry has been submitted successfully!
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
}

else{
     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>success</strong> your entry has not been submitted successfully!we regret the inconvenient!
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
     mysqli_error($conn);

}
}
}
header('location:index.php');
?>