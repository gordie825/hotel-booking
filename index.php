<?php
ob_start();
include ('user.php');
include('connection.php');
include 'inc/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootsrap link -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- custom css -->
    <link href="css/gallery.css" rel="stylesheet" type="text/css">
    <title>Hotels</title>
</head>
<body>
<!-- table start for details of the hotels -->
            <table class="table table-hover table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Hotel Name</th>
                    <th scope="col">Daily Rate</th>
                </tr>
                <?php
                // this wehre we select all the neccessary columns in the database
                $sql = "SELECT id, name, daily_rate FROM hotels";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<tr><td><a href='gallery.php' class='clickable'>" . $row["id"]. "</a></td><td><a href='gallery.php' class='clickable'>" . $row["name"] . "</a></td><td>
                <a href='gallery.php' class='clickable'>"
                . $row["daily_rate"]. "</a></td></tr>";
                }
                echo "</table>";
                } else { echo "0 results"; }
                $conn->close();
                ?>
            </table>
<!-- table end for details of the hotels -->

<!-- Gallery section start -->
<div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Gallery</h1>
        </div>
        <!-- filter buttons start -->
        <div class="filters">
            <button class="btn btn-default filter-button" data-filter="all">All</button>
            <button class="btn btn-default filter-button" data-filter="signature">Signature Lux Hotel</button>
            <button class="btn btn-default filter-button" data-filter="glen">The Glen Boutique Hotel</button>
            <button class="btn btn-default filter-button" data-filter="taj">Taj Cape Town</button>
            <button class="btn btn-default filter-button" data-filter="vineyard">Vineyard</button>
            <button class="btn btn-default filter-button" data-filter="stock">Stock Exchange Apartment</button>
        </div>
        <!-- filter buttons end -->
        <br/>

                <!-- section start for the pictures -->
        <section class="pictures">
            <div class="lookbook">
                 <div class="container">
                 <!-- glen hotels pictures -->
                    <div class="glen gallery_product filter glen">
                            <div class="row">
                                <div class="column">
                                    <p id="pics"><img src="images/glen/glen1.jpeg">
                                    </p>
                                </div>
                                <div class="column">
                                    <p id="pics"> <img src="images/glen/glen2.jpeg"></p>
                                </div>
                                <div class="column">
                                    <p id="pics"><img src="images/glen/glen3.jpg"></p>
                                </div>
                                <div class="column">
                                    <p id="pics"> <img src="images/glen/glen4.jpg"></p>
                                </div>
                            </div>
                    </div>
                <!-- glen hotels pictures end-->    
    
    <!-- signature hotels pictures -->
    <div class="signature gallery_product filter signature">
            <div class="row">
                <div class="column">
                    <p id="pics"><img src="images/signature/signature1.jpg"></p>
                </div>
                <div class="column">
                    <p id="pics"> <img src="images/signature/signature2.jpg"></p>
                </div>
                <div class="column">
                    <p id="pics"><img src="images/signature/signature3.jpg"></p>
                </div>
                <div class="column">
                    <p id="pics"> <img src="images/signature/signature4.jpg"></p>
                </div>
            </div>
    </div>
<!-- signature hotels pictures end -->

<!-- stock hotels pictures -->
    <div class="stock gallery_product filter stock">
            <div class="row">
                <div class="column">
                    <p id="pics"><img src="images/stock/stock1.jpg" class="img-responsive"></p>
                </div>
                <div class="column">
                    <p id="pics"> <img src="images/stock/stock2.jpg" class="img-responsive"></p>
                </div>
                <div class="column">
                    <p id="pics"><img src="images/stock/stock3.jpg" class="img-responsive"></p>
                </div>
                <div class="column">
                    <p id="pics"> <img src="images/stock/stock4.jpg" class="img-responsive"></p>
                </div>
            </div>
    </div>
<!-- stock hotels pictures end -->

<!-- taj hotels pictures -->
    <div class="taj gallery_product filter taj">
            <div class="row">
                <div class="column">
                    <p id="pics"><img src="images/taj/taj1.jpg" class="img-responsive"></p>
                </div>
                <div class="column">
                    <p id="pics"> <img src="images/taj/taj2.png" class="img-responsive"></p>
                </div>
                <div class="column">
                    <p id="pics"><img src="images/taj/taj3.jpg" class="img-responsive"></p>
                </div>
                <div class="column">
                    <p id="pics"> <img src="images/taj/taj4.jpg" class="img-responsive"></p>
                </div>
            </div>
    </div>
<!-- taj hotels pictures end -->

<!-- vineyard hotels pictures -->
    <div class="vineyard gallery_product filter vineyard">
            <div class="row">
                <div class="column">
                    <p id="pics"><img src="images/vineyard/vineyard1.jpg" class="img-responsive"></p>
                </div>
                <div class="column">
                    <p id="pics"> <img src="images/vineyard/vineyard2.jpeg" class="img-responsive"></p>
                </div>
                <div class="column">
                    <p id="pics"><img src="images/vineyard/vineyard3.jpg" class="img-responsive"></p>
                </div>
                <div class="column">
                    <p id="pics"> <img src="images/vineyard/vineyard4.jpg" class="img-responsive"></p>
                </div>
            </div>
    </div>
<!-- vineyard hotels pictures end -->
        </div>
        </div>
    </div>
    </div>
</section>
<!-- Gallery section end -->

<!-- custom js -->
<script src="js/main.js"></script>
</body>
</html>