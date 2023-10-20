<?php
    $con = mysqli_connect("localhost","root","");
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_select_db($con , "db");
    $result = mysqli_query($con, "SELECT pass FROM login
    WHERE usern='$_POST[uname]'");
    while($row = mysqli_fetch_array($result))
    {
    $passw= $row['pass'];
    }
    
    $pa= htmlspecialchars($_POST['pass']);

    if($pa==$passw){
        header("Location: places.html");
    }
    else{  
        echo '<script>alert("Wrong password and username!");</script>';
    }
    
   
    mysqli_close($con);
    
?>