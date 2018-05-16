<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Doctor Database</title>
        <link href="site.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        // put your code here
        $servername = "/*put server name here*/";
        $username = "/*put account username here*/";
        $password = "/*put password here*/";
        $dbname = "/*put database name here*/";

        // connect to Database server
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("connection fail: " . $conn->connect_error);
        } else echo "Database connected";?>
        
        <br>
        <br>
        <li><a href="hospital.php">Hospital Data</a></li>
        <li class="active"><a href="#">Doc Data</a></li>
        <li><a href="medrecord.php">Medical Record Data</a></li>
        <li><a href="patientrecord.php">Patient Data</a></li>
        
        <h2>Doctor Database </h2>
        
        <form name="form1" method="get" action="index.php">
            Please enter Doctor ID:
            <input type="text" name="docId" mexlength="6" size="8"><br>
            
            <input type="submit" value="Search">
            <button type="reset" value="Reset">Clear</button>
            
            
        </form>
        
        
        
        <?php 
        
        
        @$inputId = $_GET['docId'];
        
        if($inputId != null){
            $sql = "SELECT * FROM heroku_fe27e80f5c08c1a.doctor where docID = $inputId";
            
        }else{
            
            $sql = "SELECT * FROM heroku_fe27e80f5c08c1a.doctor";
        }
        
        
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["docID"]. " - Name: " . $row["docName"]. " " . $row["specialization"]. "<br>";
            }
        } else {
            echo "0 result";
        }
        //$conn->close();
        ?>
        
        
        <br>
        <form name="form1" method="get" action="index.php">
            Please enter Salary from 100,000 to 600,000 without ',':
            <input type="text" name="salary" mexlength="6" size="8"><br>
            
            <input type="submit" value="Search">
            <button type="reset" value="Reset">Clear</button>
            
            
        </form>
        
        
        
        <?php 
        
        
        @$inputId = $_GET['salary'];
        
        if($inputId != null){
            //$sql = "SELECT * FROM heroku_fe27e80f5c08c1a.doctor where docID = $inputId";
            $sql = "SELECT D.docName, D.salary FROM Doctor D GROUP BY D.docName HAVING D.salary > $inputId";
            
        }else{
            
            $sql = "SELECT * FROM heroku_fe27e80f5c08c1a.doctor";
        }
        
        
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data
            while($row = $result->fetch_assoc()) {
                echo "Doctor Name: " . $row["docName"]. " Salary: " . $row["salary"]. "<br>";
            }
        } else {
            echo "0 result";
        }
        //$conn->close();
        ?>
        
        
        
        
        
    </body>
</html>
