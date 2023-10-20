
    <?php
    
    $con = mysqli_connect("localhost","root","");
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_select_db($con, "db");
    $sql="INSERT INTO ptable (dis_name,
    tow_name, place,distance,briefin,opendays,contact) VALUES ('$_POST[dis]','$_POST[tow]', '$_POST[pla]','$_POST[ban]','$_POST[info]','$_POST[opend]','$_POST[phone]')";
    mysqli_query($con,$sql);
    mysqli_close($con);
    ?>
