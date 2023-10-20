<html>

<head>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="visit.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
       
        #map {
            height: 500px;
            width: 100%;
        }
        
    </style>
</head>

<body>
    <div class="header">
        <ul class="hefirst">
            <li class="hefirst"> <a href="login.html" class="hi">Login</a></li>
            <li class="hefirst"><a href="contact.html" class="hi">Contact</a></li>
            <li class="hefirst"><a href="visit.php" class="hi">Destinations</a></li>
            <li class="hefirst"><a href="Home.html" class="hi">Home</a></li>
        </ul>
    </div>
    <div class="form">
        <form method="post" action="" name="form">
            <input type="text" id="imageName" class="inp" name="in">
            <!--<button onclick="changeImage()" class="inp1">Change Image</button>-->
            <input type="submit"  class="inp1">
        </form>        
        <input type="submit" onclick="changeImage()" value="Load Images" class="inp1" class="imglo">

    </div>
    <div class="content">

        <img id="myImage" src="location/kandy.jpg" alt="Image" class="main">

        <script>

            function changeImage() {
                var imageName = document.getElementById("imageName").value;
                var basePath = "location/";
                var imageUrl = basePath + imageName + ".jpg";
                var image = document.getElementById("myImage");
                image.src = imageUrl;
                image.alt = "Image: " + imageName;
            }             
        </script>
        <br>
        <br>

        <div class="informa">
         <?php
                $con = mysqli_connect("localhost","root","");
                if (!$con)
                {
                die('Could not connect: ' . mysqli_error($con));
                }
                mysqli_select_db($con ,"db");
               
                $result = mysqli_query($con, "SELECT * FROM ptable where place='$_POST[in]'");
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
        </div>
        <br> 
        <div id="search" style="clear: both;">
        <!--<input type="text" id="search-box" placeholder="Search for a place" />-->
        <button onclick="searchPlace()" class="searchb">Search</button>
    </div>
    <br>
    <br>
        <div id="map"></div>

    
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker;

        // Function to search for a place
        function searchPlace() {
            var searchTerm = document.getElementById("imageName").value;
            
            // Use Nominatim for geocoding (searching for places)
            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${searchTerm}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        var lat = data[0].lat;
                        var lon = data[0].lon;
                        
                        // Clear previous marker (if any)
                        if (marker) {
                            map.removeLayer(marker);
                        }
                        
                        // Add a new marker for the search result
                        marker = L.marker([lat, lon]).addTo(map);
                        map.setView([lat, lon], 13);
                    } else {
                        alert("Place not found!");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
                            
    </div>
    <footer>
        <p class="expl">ExploreEra</p>
        <p class="call">Call Us Today:0778784564</p>
    </footer>
</body>

</html>