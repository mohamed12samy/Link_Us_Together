<?php


$con=mysqli_connect("localhost","root","","link-us-together");



?>

<!DOCTYPE html>
<html>

    <head>
        <title>Admin home</title>
    </head>

    <body>
        <center><h6 style="color:red;  font-size:50px;">Welcome admooon</h6></center>
    
            
<?php
        echo '<center><h6 style="color:#000;  font-size:50px;">Users Table</h6></center>';
    $sel=mysqli_query($con,"select * from users");
        echo "<a href='admin/insertForm.php'>insert new user</a>";
    echo "<table width=100% border=2>";
    echo "<tr><th>id</th><th>name</th><th>View</th><th>Update</th><th>Delete</th></tr>";
    $counter=1;
    while($row=mysqli_fetch_array($sel))
    {
    $id=$row["id"];
    echo "<tr>";
    echo "<td>".$counter."</td>";
    echo "<td>".$row["name"]."</td>";
    echo "<td><a href='admin/view.php?id2=$id'>View</a></td>";
    echo "<td><a href='admin/updateform.php?id2=$id'>Update</a></td>";
    echo "<td><a href='admin/delete.php?id2=$id'>Delete</a></td>";
    echo "</tr>";
    $counter++;
    }

echo "</table>";
                echo '<center><h6 style="color:#000;  font-size:50px;">Post Table</h6></center>';

    echo "<br><br><br><br><br><br><br><br>";    
        
        $sel=mysqli_query($con,"select * from post");

    echo "<table width=100% border=2>";
    echo "<tr><th>id</th><th>name</th><th>View</th><th>Delete</th></tr>";
    $counter=1;
    while($row=mysqli_fetch_array($sel))
    {
    $id=$row["id"];
    echo "<tr>";
    echo "<td>".$counter."</td>";
    echo "<td>".$row["paragraph"]."</td>";
    echo "<td><a href='admin/viewP.php?id2=$id'>View</a></td>";
    echo "<td><a href='admin/deleteP.php?id2=$id'>Delete</a></td>";
    echo "</tr>";
    $counter++;
    }

echo "</table>";
        
    echo '<center><h6 style="color:#000;  font-size:50px;">Comment Table</h6></center>';

    echo "<br><br><br><br><br><br><br><br>";
        $sel=mysqli_query($con,"select * from comment");

    echo "<table width=100% border=2>";
    echo "<tr><th>id</th><th>name</th><th>View</th><th>Delete</th></tr>";
    $counter=1;
    while($row=mysqli_fetch_array($sel))
    {
    $id=$row["c_id"];
    echo "<tr>";
    echo "<td>".$counter."</td>";
    echo "<td>".$row["txt"]."</td>";
    echo "<td><a href='admin/viewC.php?id2=$id'>View</a></td>";
    echo "<td><a href='admin/deleteC.php?id2=$id'>Delete</a></td>";
    echo "</tr>";
    $counter++;
    }

echo "</table>";
            echo "<br><br><br><br><br><br><br><br>";

        ?>
    </body>

</html>