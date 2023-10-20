<?php
                $con = mysqli_connect("localhost","root","");
                if (!$con)
                {
                die('Could not connect: ' . mysqli_error($con));
                }
                mysqli_select_db($con ,"db");
               
                $result = mysqli_query($con, "SELECT * FROM ptable where dis_name='$_POST[in]'");
                echo "<dl>";
                
                while($row = mysqli_fetch_array($result))
                {
                echo "<dt>District Name:</dt>";
                echo "<dd>" . $row['dis_name'] . "</dd>";
                echo "<dt>Town Name:</dt>";
                echo "<dd>" . $row['tow_name'] . "</dd>";
                echo "<dt>Place :</dt>";
                echo "<dd>" . $row['place'] . "</dd>";
                echo "<dt>Distance from Bandaranaike international Airport (Km):</dt>";
                echo "<dd>" . $row['distance'] . "</dd>";
                echo "<dt>Brief information about the place:</dt>";
                echo "<dd>" . $row['briefin'] . "</dd>";
                
                
                }
                echo "</dl>";
                mysqli_close($con);
                ?>  