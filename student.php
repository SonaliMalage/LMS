
<!DOCTYPE html>
<?php
session_start();
$conn=mysqli_connect("localhost","root","","mydb") or die("connection not established");
?>
<html>

<head>
  
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>student signup</title>
 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
   
 <link rel="stylesheet" href="assets12/css/styles.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
.body {margin:0;}

.icon-bar {
  width: 100%;
  
  overflow: auto;
}

.icon-bar a {
  float: right;
  width: 5%;
  text-align: center;
  padding: 5px 0;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}
.iconbar-right a{
	float: left;
  width: 5%;
  text-align: center;
  padding: 5px 0;
  transition: all 0.3s ease;
  color: white;s
  font-size: 20px;


}

.icon-bar a:hover {
  background-color: #000;
}

.active {
  background-color: #8C0100;
}
</style>
</head>

<body>
 <div class="contact-clean" style ="background-image:url(&quot;assets/img/computer-lab-png-computer-lab-992.png&quot;);background-repeat:no-repeat;background-size:cover;">
 <div class="icon-bar">
   
  <a href="Loginstd.php" ><i  class="fa fa-power-off"></i></a>
  <div class="iconbar-right">
  	<a href="#"><i onclick="history.back()"class="fa fa-arrow-left"></i></a>
  	<a class="active" href="home.html"><i class="fa fa-home"></i></a>
  </div></div>





	 

<h1 class="text-uppercase text-center justify-content-center" style="background-size:auto;font-weight:bold;font-family:Alegreya, serif;margin-top:-48px;background-color:#8c0100;color:rgb(255,255,255);">STUDENT SIGN-UP</h1><br><br>
 

 
   
     
      
    <form action="student.php" style="background-color:#8c0100;"method="post">
           
    
                <div class="form-group">
                	<input class="form-control" type="text" name="Name" placeholder="Name" required >
                </div>
               <div class="form-group">
                	<input class="form-control" type="text" name="RollNo" placeholder="Roll No"required ></div>
                	<div class="form-group">
                	<input class="form-control" type="email" name="Email" placeholder="Email" required  ></div>
                	
                	              

 <select name="Department">
 	  	<option > DEPARTMENT</option>
  			<option value="CS">COMPUTER SCIENCE</option>
  			<option value="IT">INFORMATION TECHNOLOGY</option>
  			<option value="Extc">ELECTONICS & TELECOMMUNICATION</option>
  			<option value="ELECTRONICS">ELECTRONICS</option>
  			<option value="IS">INSTUMENTATION</option>
			</select>
			<br>
			<br>



  <select name="Year">
  	<option > YEAR</option>
  <option value="FE">FIRST YEAR</option>
  <option value="SE">SECOND YEAR</option>
  <option value="TE">THIRD YEAR</option>
  <option value="BE">FORTH YEAR</option>
  </select>
  <br>
  <br>
  					<div class="form-group">
                     <input class="form-control" type="text" name="UserName" placeholder="UserName"  required ></div>
<div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password"  required ></div>
                <div class="form-group">
                	<input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)" required></div><br>
                
                 <div class="form-group"><button class="btn btn-primary active btn-block btn-lg" role="button" href="Loginstd.html" name="SignUp">SignUp</button>
                 </div>
                 <a href="Loginstd.html" class="already">You already have an account? Login here.</a>
    </form> 
               <?php
	            if(isset( $_POST["SignUp"])){
	            	
					$Name=$_POST["Name"];
					 $Roll_No=$_POST["RollNo"];
					 $Department=$_POST["Department"];
					 $Year=$_POST["Year"];
					 $Username = $_POST['UserName'];
					 $Email=$_POST["Email"];
					 $password=$_POST["password"];
					 $password_repeat=$_POST["password-repeat"];
					// $password=md5(password);
					 //$password_repeat=md5(password-repeat);
					 
					  if($password_repeat!=$password){
					 	echo "<script>alert(' password does not match');</script>";
						echo "<script>window.location.href='./student.php';</script>";
					 }
					 else{

					
					/*if($_SESSION['Q']==1)
					{
						$_SESSION['Q'] = 0;
						echo $cid."<br>";
						$query = "update staff set Name='$Name',Roll_No='$Roll_No',Department='$Department',Email='$Email',password='$password',Year=$Year,password_repeat='password_repeat';";
					}
					else
					*/
					$sel_u="select * from student;";
					$run_u=mysqli_query($conn,$sel_u);
					while($row_u=mysqli_fetch_assoc($run_u)){
						if($Username==$row_u['Username']){
						echo "<script>alert('UserName already exist. Choose another Username ');</script>";
						echo "<script>window.location.href='./student.php';</script>";	
						}
						if($Roll_No==$row_u['Roll No']){
						echo "<script>alert(' Rollno already exist. Choose another  Rollno');</script>";
						echo "<script>window.location.href='./student.php';</script>";	
						}
					if($Email==$row_u['Email']){
						echo "<script>alert(' Email already exist. Choose another  Email');</script>";
						echo "<script>window.location.href='./student.php';</script>";	
						}

					}

					$query="insert into student values ('$Name','$Roll_No','$Email','$Department', '$Year','$Username','$password','$password_repeat');";
					echo $query."<br>";
					$run=mysqli_query($conn,$query);
					if(isset($run)){
						echo "<script>alert('successful');</script>";
						echo "<script>window.location.href='./student.php';</script>";	
					}	}

				
				} 
				
			    
			     
				
				?>
    
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>