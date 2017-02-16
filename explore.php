<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="includes/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet">
    <script src="includes/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="includes/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="includes/slick/slick-theme.css"/>
    <script type="text/javascript" src="includes/slick/slick.min.js"></script>
    <script src="includes/jquery.easing.min.js"></script>
    <style>
        #explore {margin-top:3%;}
        .explorecarousel img {height:350px;}
        .status {float:left;}
        .dot {
            float: left;
            width: 10px;
            height: 10px;
            background: green;
            border-radius: 20px;
            margin: 4px 6px 0px 0px;
            border: white solid 1px;}
        .plusicon {float: right;
            color: #2c3241;
            font-size: 20px;
            font-weight: 400;
            background: rgba(255, 255, 255, 0.33);
            /* height: 20px; */
            width: 23px;
            border-radius: 100%;
        }
        .guitar_top{height:30px; padding:10px;}
        article {width: 80%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.14);
            border-radius: 15px;}
        .explorecarousel{margin-top:20px;}
        .explorecarousel h3, .explorecarousel p {margin-bottom:0; padding:10px; text-align:center;}
        #explore .slick-dots {bottom:-50px;}
        #lightbox {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            z-index: 999999;
            background: rgba(8, 10, 12, 0.85);
        }
        .lbcontent {
            background: #282d3c;
            width: 40%;
            height: 450px;
            margin: auto;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            border-radius:20px;
        }
    </style>
</head>
<body>
<?php
include('includes/dbConnection.php');
?>
<div class="container">
    <header>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.html">Home</a>
            <a href="wizard.html">Build a Guitar</a>
            <a href="#">Explore</a>
            <a href="#">Contact Us</a>
            <a href="#">My Profile</a>
            <a href="#">Logout</a>
        </div>
        <a href="#" id="menuicon" onclick="openNav()"></a>
        <section id="headright">
            <a href="#" id="profileName"></a>
            <a href="#" id="profilePic"></a>
        </section>
        <a href="index.html" id="logo"></a>
    </header>
    <main id="explore">
                <h1>Explore our catalog...</h1>
                <h4>Lorem ipsum dolor sit amet, consectetur adip scingelit.
                    Etiam sed dignissim odio.</h4>
                <div class="explorecarousel">
                    <div>
                        <article>
                        <section class="guitar_top">
                            <div class="dot"></div>
                            <div class="status">Shipped</div>
                            <div class="plusicon">+</div>
                            </section>
                            <img src="images/guitarup.png">
                                <h3>Wylder</h3>
                                <p>03/05/17</p>
                            <article>
                    </div>
                    <div>
                        <article>
                            <section class="guitar_top">
                                <div class="status">Shipped</div>
                                <div class="plusicon">+</div>
                            </section>
                            <img src="images/guitarup.png">
                            <h3>Wylder</h3>
                            <p>03/05/17</p>
                            <article>
                    </div>
                    <div>
                        <article>
                            <section class="guitar_top">
                                <div class="status">Shipped</div>
                                <div class="plusicon">+</div>
                            </section>
                            <img src="images/guitarup.png">
                            <h3>Wylder</h3>
                            <p>03/05/17</p>
                            <article>
                    </div>
                    <div>
                        <article>
                            <section class="guitar_top">
                                <div class="status">Shipped</div>
                                <div class="plusicon">+</div>
                            </section>
                            <img src="images/guitarup.png">
                            <h3>Wylder</h3>
                            <p>03/05/17</p>
                            <article>
                    </div>
                    <div>
                        <article>
                            <section class="guitar_top">
                                <div class="status">Shipped</div>
                                <div class="plusicon">+</div>
                            </section>
                            <img src="images/guitarup.png">
                            <h3>Wylder</h3>
                            <p>03/05/17</p>
                            <article>
                    </div>
                    <div>
                        <article>
                            <section class="guitar_top">
                                <div class="status">Shipped</div>
                                <div class="plusicon">+</div>
                            </section>
                            <img src="images/guitarup.png">
                            <h3>Wylder</h3>
                            <p>03/05/17</p>
                            <article>
                    </div>
                    <div>
                        <article>
                            <section class="guitar_top">
                                <div class="status">Shipped</div>
                                <div class="plusicon">+</div>
                            </section>
                            <img src="images/guitarup.png">
                            <h3>Wylder</h3>
                            <p>03/05/17</p>
                            <article>
                    </div>
                </div>
        <div id="lightbox">
            <div class="lbcontent">

            </div>
        </div>
    </main>

</div>
<footer>
    <script src="includes/menu.js"></script>
    <div class="container">
        <a href="#"><span>CONTACT US</span></a>
        <span>Copyright © 2017 Gady Ezra & Eldad Corem</span>
    </div>
    <script>
        $(document).ready(function () {

        $('.explorecarousel').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 3000,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
        });
    </script>
</footer>
</body>
</html>
