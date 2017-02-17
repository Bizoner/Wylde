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
    <script src="includes/explore.js"></script>
    <style>
        #explore {margin-top:3%;}
        .exploreCarousel img {height:350px;}
        .status {float:left;}
        .dot {
            float: left;
            width: 10px;
            height: 10px;
            background: green;
            border-radius: 20px;
            margin: 4px 6px 0px 0px;
            border: white solid 1px;}
        .plusIcon {float: right;
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
        .exploreCarousel{margin-top:20px;}
        .exploreCarousel h3, .exploreCarousel p {margin-bottom:0; padding:10px; text-align:center;}
        #explore .slick-dots {bottom:-50px;}
        #lightbox {
            display:none;
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            z-index: 999999;
            background: rgba(8, 10, 12, 0.85);
            text-align: center;
        }

        #lightbox h3{margin : 5px;}
        #lightbox img{transform: rotate(90deg); height : 100px;}
        #lightbox .right{position : relative; float : right; width : 50%;}
        #lightbox .left{position : relative; float : left; width : 50%;}

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
    if (isset($_POST['topGenre']))
        $topGenre = $_POST['topGenre'];
    else
        $topGenre = 'Metal';
    $email = "yossit@gmail.com";
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
        <div class="exploreCarousel">
            <?php
                $query = "SELECT * from tbl_guitars_208 where creator = '$email' OR private=0 order by creator='$email' DESC";
                $result = mysqli_query($connection, $query);
                while ($row = $result->fetch_object()){
                    echo '<div>
                         <article>
                    <section class="guitar_top">
                    <div class="plusIcon">+</div>
                    </section>';
                    echo '<img src=' . $row->img . '>';
                    echo '<h3>' . $row->guitarName . '</h3>';
                    echo '<p>' . $row->created . '</p>';
                    echo '</article>
                          </div>';
                }
            ?>
           
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

            $('.exploreCarousel').slick({
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
<?php
    if ($result!=null)
        mysqli_free_result($result);
    mysqli_close($connection);
?>
</html>
