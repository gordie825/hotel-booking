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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="css/gallery.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Gallery</h1>
        </div>

        <div class="filters">
            <button class="btn btn-default filter-button" data-filter="all">All</button>
            <button class="btn btn-default filter-button" data-filter="signature">Signature Lux Hotel</button>
            <button class="btn btn-default filter-button" data-filter="glen">The Glen Boutique Hotel</button>
            <button class="btn btn-default filter-button" data-filter="taj">Taj Cape Town</button>
            <button class="btn btn-default filter-button" data-filter="vineyard">Vineyard</button>
            <button class="btn btn-default filter-button" data-filter="stock">Stock Exchange Apartment</button>
        </div>
        <br/>


        <section class="pictures">
<div class="lookbook">
<div class="container">
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
        </div>
        </div>
    </div>
    </div>
</section>

<script src="js/main.js"></script>
</body>
</html>