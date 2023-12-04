<?php
session_start();

$conn=mysqli_connect("localhost","root","","mydb") or die("connection not established");

?>
<html>
<head>
	<meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<title>Report</title>
    
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
 
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
  
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bigshot+One">
 
   <link rel="stylesheet" href="assets12/css/styles.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.body {margin:100px;
 padding: 10px;}

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

	<div class="icon-bar">	
  <a href="Loginstd.php"><i class="fa fa-power-off"></i></a>


  <div class="iconbar-right">

    <a href="#"><i onclick="history.back()"class="fa fa-arrow-left"></i></a>
    <a class="active" href="home.html"><i class="fa fa-home"></i></a>
  </div>
</div>        
<h1 class="text-uppercase text-center justify-content-center" style="background-size:auto;font-weight:bold;font-family:Alegreya, serif;margin-top:-46px;background-color:#8c0100;color:rgb(255,255,255);">REPORT</h1>
      

        <center>
            
            <table width="500" border="2" >

            <tr bgcolor="#8c0100" style="color:white;">
            <th>Name</th>
            <th>Roll No</th>
            <th>Department</th>
            <th>Year</th>
            <th>SUBJECT</th>
            <th>LABNO</th>
            <th>PCNO</th>
            <th>DATE</th>
            <th>TIME</th>
            
            </tr>

    
        <?php 
            $select="select * from student inner join data12 on student.Roll_No=data12.ROLL_NO";
            $run_s=mysqli_query($conn,$select);
            while ($row=mysqli_fetch_array($run_s)){
            ?>
                <tr bgcolor="#ef8b8b">
                    <td><?php echo $Name=$row['Name']; ?></td>
                    <td><?php echo $Roll_No=$row['Roll_No']; ?></td>
                    <td><?php echo $Department=$row['Department']; ?></td>
                    <td><?php echo $Year=$row['Year']; ?></td>
                    <td><?php echo $SUBJECT=$row['SUBJECT'];?></td>
                    <td><?php echo $LABNO=$row['LAB_NO']; ?></td>
                    <td><?php echo $PCNO=$row['PC_NO']; ?></td>
                    <td><?php echo $DATE=$row['Date']; ?></td>
                    <td><?php echo $TIME=$row['TIME']; ?></td>
                </tr>

        </table>
<?php
            }
?>

    </center>
</div>
</body>
</html>