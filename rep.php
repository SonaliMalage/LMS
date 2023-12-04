<?php
session_start();

$conn=mysqli_connect("localhost","root","","mydb") or die("connection not established");

?>
<html>
<head>
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
    color:white;
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
            <a class="active" href="Loginstd.php" ><i  class="fa fa-power-off"></i></a>
        <div class="iconbar-right">
            <a class="active" href="#"><i onclick="history.back()"class="fa fa-arrow-left"></i></a>
            <a class="active" href="home.html"><i class="fa fa-home"></i></a>
        </div>
        </div>
        <center>
                <h2><b>REPORT</b></h2>
                <input type="text" name="searchvalue" placeholder="">
                <input type="submit" name="submit" placeholder="search here">
        </center>
<?php 
   if (isset($_POST['submit'])) 
   {
    	  			$valuetosearch=$_POST['searchvalue'];
    	  			$conn=mysqli_connect("localhost","root","","mydb") or die("connection not established");
    	  			$query="select * from student inner join data12 on student.RollNo=data12.ROLL_NO 
                            where concat('Name','RollNo', 'Department','Year', 'SUBJECT',  'DATE', 'TIME', LABNO, PCNO)='".$valuetosearch."';";
    	  			$mysqli_result=mysqli_query($conn,$query);
                    $row=mysqli_fetch_array($mysqli_result);
    	  			    while($row) 
                        {
    	  			    ?>
                        <table>
    	  				<tr>
    	  				<td><?php echo $Name=$row['Name']; ?></td>
    	  				<td><?php echo $RollNo=$row['RollNo']; ?></td>
                    	<td><?php echo $Department=$row['Department']; ?></td>
                   		<td><?php echo $Year=$row['Year']; ?></td>     
                   	  	<td><?php echo $SUBJECT=$row["SUBJECT"];?></td>   
                     	<td><?php echo $LABNO=$row['LABNO']; ?></td>
                     	<td><?php echo $PCNO=$row['PCNO']; ?></td>
                     	<td><?php echo $PCNO=$row['DATE']; ?></td>
                     	<td><?php echo $PCNO=$row['TIME']; ?></td>
           				</tr>
             			</table>
                        <?php  
                    	}
    }
    else {
                         ?>
         <form method="post" action="rep.php">
         <center>

         
         <table  id="myTable" width="500" border="2" >
         <tr class="header">
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
                $select="select * from student inner join data12 on student.RollNo=data12.ROLL_NO;";
                $run_s=mysqli_query($conn,$select);
                while ($row=mysqli_fetch_assoc($run_s)){
            ?>
            <tr bgcolor="#ef8b8b">
                    <td><?php echo $Name=$row['Name']; ?></td>
                    <td><?php echo $RollNo=$row['RollNo']; ?></td>
                    <td><?php echo $Department=$row['Department']; ?></td>
                    <td><?php echo $Year=$row['Year']; ?></td>
                     <td><?php echo $SUBJECT=$row["SUBJECT"];?></td>   
                     <td><?php echo $LABNO=$row['LABNO']; ?></td>
                     <td><?php echo $PCNO=$row['PCNO']; ?></td>
                     <td><?php echo $PCNO=$row['DATE']; ?></td>
                     <td><?php echo $PCNO=$row['TIME']; ?></td>
            </tr>

            <?php
            } 
            ?>
        </table>
        </center>
        </form>

<?php
}                      
?>
</body>
</html>