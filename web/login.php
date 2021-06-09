<!DOCTYPE html>
<html>

<?php 

$host="localhost";
$user="root";
$password="";
$db="demo";


$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);

//Code For starting our session to preserve our login
session_start();

$_SESSION['login'] = false;

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from loginform where User='".$uname."'AND Password='".$password."'";

    
    $result=mysqli_query($con,$sql);

    $rows = mysqli_num_rows($result);


    if($rows==1){

        
        echo '<script>alert("You Have Successfully Logged in");
        window.location.href="index.html"</script>';
        $_SESSION['login'] = true;
        $_SESSION['uname'] = $uname;
        // header("Location: index.html"); 
        exit();

    }
    else{
        echo '<script>alert("You Have Entered Incorrect Password")</script';
        $_SESSION['login'] = false;
    }

        
}
?>

<head>
	<title> Login Form in HTML5 and CSS3</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<link rel="stylesheet" a href="login.css">


	<!-- <link rel="stylesheet" a href="css\font-awesome.min.css"> -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
       <a class="navbar-brand" href="index.html">Mobile shopee</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarNav">
       
   
       </a>
       </form>
       </div>
       </nav>

	<div class="container">
	<!-- <img src="image/login.png"/> -->
		<form method="Post" action="#">
			<div class="form-input">
				<input type="text" name="username" placeholder="Enter the User Name"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password"/>
			</div>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>