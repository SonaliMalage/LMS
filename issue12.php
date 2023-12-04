<?php
session_start();
$conn=mysqli_connect("localhost","root","","mydb") or die("connection not established");
?>

<!DOCTYPE html>
<html>

<head>
  
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<title>project</title>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
 
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bigshot+One">
 
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
  color: white;
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





<h1 class="text-uppercase text-center justify-content-center" style="background-size:auto;font-weight:bold;font-family:Alegreya, serif;margin-top:-46px;background-color:#8c0100;color:rgb(255,255,255);">ISSUE</h1>
      
  <br><br>
  <form method="post" style="background-color:#8c0100; action="issue12.php">
            
         
   <div class="form-group">
<input class="form-control" type="text" maxlength="4" name="LABNO" placeholder="LAB NO" required></div>
 <div class="form-group">
<input class="form-control" type="number" maxlength="4" name="PCNO" placeholder="PC NO" required></div>
 <div class="form-group">
<b>DATE:<input class="form-control" type="date"  name="DATE" required></div>


       <select>
        <option > TIME SLOT</option>
        <option value="8.30-10.30">8.30-10.30</option>
        <option value="10.30-12.30">10.30-12.30</option>
        <option value="12.30-2.30">12.30-2.30</option>
        <option value="2.30-4.30">2.30-4.30</option>
        <option value="4.30-6.30">4.30-6.30</option>
      </select>

      <br>
 <label>


<br>
<div class="form-group">
<select name="Issue" style="width:400px;height:42px;" class="form-control" required>

  <option value="">CATEGORIES</option>

  <option value="SOFTWARE">SOFTWARE</option>

  <option value="HARDWARE">HARDWARE</option>
</select>
</div>
            <div class="form-group">
      <textarea class="form-control" rows="16" name="COMMENT" placeholder="COMMENT" required></textarea></div>
   
 <div class="form-group"><button class="btn btn-primary" type="submit" style="margin-left:140PX;" name="SUBMIT" >SUBMIT</button></div>
 
   </form>
  <?php
	            if(isset( $_POST["SUBMIT"])){
	            	
					
					 $LAB_NO=$_POST["LABNO"];
					 $PC_NO=$_POST["PCNO"];
			         $DATE=$_POST["DATE"];
					 $TIME=$_POST["TIME"];
					   $Issue=$_POST["Issue"];
					 $COMMENT=$_POST["COMMENT"];
					
				



					/*if($_SESSION['Q']==1)
					{
						$_SESSION['Q'] = 0;
						echo $cid."<br>";
						$query = "update staff set Name='$Name',Roll_No='$Roll_No',Department='$Department',Email='$Email',password='$password',Year=$Year,password_repeat='password_repeat';";
					}
					else
					*/
					
					$query="insert into issue12 values ('$LAB_NO','$PC_NO','$DATE','$TIME','$Issue','$COMMENT');";
					echo $query."<br>";
					$run=mysqli_query($conn,$query);
					if(isset($run)){
						echo "<script>alert('successful');
						</script>";
						echo "<script>window.location.href='./issue12.php';</script>";	
					 }
				}
				?>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>

