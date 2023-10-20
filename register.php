
<?php
    
    $con = mysqli_connect("localhost","root","");
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_select_db($con, "db");
    $sql="INSERT INTO login (usern,pass) VALUES ('$_POST[uname]','$_POST[pass]')";
    mysqli_query($con,$sql);
    mysqli_close($con);
    header("Location: login.html");
    ?>
