<?php
session_start();

$conn=mysqli_connect("localhost","root","","mydb") or die("connection not established");

?>
<html>
<head>

     <meta charset="utf-8">
  <title>Data Entry Report</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bigshot+One">
  <link rel="stylesheet" href="assets12/css/styles.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>


    .body {margin:0;}
    @page{size:auto;}
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
    @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
</head>
<body>
        <h1 class="text-uppercase text-center justify-content-center" style="background-size:auto;font-weight:bold;font-family:Alegreya, serif;font-size:40px;margin-top:20px;background-color:#8c0100;color:rgb(255,255,255);">DATA ENTRY REPORT</h1>
        <div class="icon-bar hidden-print">
     <a href="logoutstf.php" ><i class="fa fa-power-off"></i></a>
    <div class="iconbar-right">
    <a href=""><i onclick="history.back()"class="fa fa-arrow-left "></i></a>
      <a href="home.html"><i class="fa fa-home "></i></a>
       </div></div>

        
              <!--<h2 class="text-uppercase text-center justify-content-center" style="background-size: auto; font-size: 40px; " ><b>REPORT</b></h2>
              <div class="icon-bar"> 
            <a class="active" href="#" ><i  class="fa fa-power-off"></i></a>
        <div class="iconbar-right">
            <a class="active" href="#"><i onclick="history.back()"class="fa fa-arrow-left"></i></a>
            <a class="active" href="#"><i class="fa fa-home"></i></a>
        </div>
        </div>-->

<form method="post" action="r.php">
    <div class="no-print">
    <button class="btn btn-primary" style="float:right;" onclick="window.print()">
              <span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Print</button>
    </div>
    <center>
      
            
                <select name="dept">
                    <option value="0"> select DEPARTMENT</option>
                    <option value="CE">COMPUTER ENGINEERING</option>
                    <option value="IT">INFORMATION TECHNOLOGY</option>
                    <option value="Extc">ELECTONICS & TELECOMMUNICATION</option>
                    <option value="ELECTRONICS">ELECTRONICS</option>
                    <option value="IS">INSTUMENTATION</option>
                </select>  
                <SELECT name="year">
                    <OPTION value="0">select YEAR</OPTION>
                    <option value="FE">FIRST YEAR</option>
                    <option value="SE">SECOND YEAR</option>
                    <option value="TE">THIRD YEAR</option>
                    <option value="BE">FORTH YEAR</option>
                 </SELECT>  <br><br>
                 <input type="submit" name="search" value="search">
        
         
    </center>
</form>
        
                    
               <?php
						
											
                     if (isset($_POST['search'])) {
                        
                        $search1=$_POST['dept'];
                        $search2=$_POST['year'];
						$query="select * from student join data12 on student.RollNo=data12.ROLL_NO where Department='$search1' and Year='$search2' ;";
					      
                         $mysqli_result=filterTable($query);
                        }
                        else{
                            $query="select * from student join data12 on student.RollNo=data12.ROLL_NO;";
                            $mysqli_result=filterTable($query); 
                            } 
					
                    function filterTable($query){
                        $conn=mysqli_connect("localhost","root","","mydb") or die("connection not established");
                        $filter_Result=mysqli_query($conn,$query);
                        return $filter_Result;
                    }
					
                echo "<center>";
                echo " <table  width=500, border=1> ";
                echo    "<tr  bgcolor=#8c0100>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Department</th>
                            <th>Year</th>
                            <th>SUBJECT</th>
                            <th>LABNO</th>
                            <th>PCNO</th>
                            <th>DATE</th>
                            <th>TIME</th>            
                        </tr>";     
                         
                    while ($row=mysqli_fetch_assoc($mysqli_result)){ 
                        echo "<tr>";
                        echo   " <td>".$row['Name']. "</td>";
                        echo  "<td>".$row['RollNo']."</td>";
                        echo  "<td>".$row['Department']."</td>";
                        echo  "<td>".$row['Year']."</td>";                     
                        echo "<td>".$row["SUBJECT"]."</td>";
                        echo "<td>".$row['LABNO']."</td>";
                        echo "<td>".$row['PCNO']."</td>";
                        echo"<td>".$row['DATE']."</td>";
                        echo"<td>".$row['TIME']."</td>";
                        //}
                        echo"</tr>";
                      
				  }  
                
                echo"</table>";   
                echo "</center>";
        ?>

</body>
</html>