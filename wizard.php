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
</head>
<body>
<?php
    include('includes/dbConnection.php');
    if (isset($_POST['topGenre']))
        $topGenre = $_POST['topGenre'];
    else
        $topGenre = 'Metal';
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
    <main id="wizard">
        <article class="twothirdCol">
            <section>
                <h1>Start with choosing a body...</h1>
                <h4>Lorem ipsum dolor sit amet, consectetur adip scingelit.
                    Etiam sed dignissim odio.</h4>
                <div class="carouselA">
                <?php
                        $query = "SELECT * from tbl_guitarParts_208 where type = 1 order by topGenre='$topGenre' DESC";
                        $result = mysqli_query($connection, $query);
                        while ($row = $result->fetch_object()){
                            echo '<div>';
                            echo '<img src=' . $row->img . '>';
                            echo '<H2>' . $row->name . '</H2>';
                            echo '<p>' . $row->description . '</p>';
                            echo '</div>';
                        }
                    ?>
                </div>
                <div class="desc">
                    <h2>Loading...</h2>
                    <h5>Recomended For You!</h5>
                    <p>Please wait while the item is loading...</p>
                    <button class="next">SELECT THE PICKUP</button>
                </div>
            </section>
            <section>
                <h1>Start with choosing a body...</h1>
                <h4>Lorem ipsum dolor sit amet, consectetur adip scingelit.
                    Etiam sed dignissim odio.</h4>
                <div class="carouselB">
                    <?php
                        $query = "SELECT * from tbl_guitarParts_208 where type = 2 order by topGenre='$topGenre' DESC";
                        $result = mysqli_query($connection, $query);
                        while ($row = $result->fetch_object()){
                            echo '<div>';
                            echo '<img src=' . $row->img . '>';
                            echo '<H2>' . $row->name . '</H2>';
                            echo '<p>' . $row->description . '</p>';
                            echo '</div>';
                        }
                    ?>
                </div>
                <div class="desc">
                    <h2>Loading...</h2>
                    <h5>Recomended For You!</h5>
                    <p>Please wait while the item is loading...</p>
                    <button class="next">SELECT THE PICKUP</button>
                </div>
            </section>
            <section>
                <h1>Start with choosing a body...</h1>
                <h4>Lorem ipsum dolor sit amet, consectetur adip scingelit.
                    Etiam sed dignissim odio.</h4>
                <div class="carouselC">
                    <?php
                        $query = "SELECT * from tbl_guitarParts_208 where type = 3 order by topGenre='$topGenre' DESC";
                        $result = mysqli_query($connection, $query);
                        while ($row = $result->fetch_object()){
                            echo '<div>';
                            echo '<img src=' . $row->img . '>';
                            echo '<H2>' . $row->name . '</H2>';
                            echo '<p>' . $row->description . '</p>';
                            echo '</div>';
                        }
                    ?>
                </div>
                <div class="desc">
                    <h2>Loading...</h2>
                    <h5>Recomended For You!</h5>
                    <p>Please wait while the item is loading...</p>
                    <button class="next">SELECT THE PICKUP</button>
                </div>
            </section>
            <section>
                <h1>Start with choosing a body...</h1>
                <h4>Lorem ipsum dolor sit amet, consectetur adip scingelit.
                    Etiam sed dignissim odio.</h4>
                <div class="carouselD">
                    <?php
                        $query = "SELECT * from tbl_guitarParts_208 where type = 4 order by topGenre='$topGenre' DESC";
                        $result = mysqli_query($connection, $query);
                        while ($row = $result->fetch_object()){
                            echo '<div>';
                            echo '<img src=' . $row->img . '>';
                            echo '<H2>' . $row->name . '</H2>';
                            echo '<p>' . $row->description . '</p>';
                            echo '</div>';
                        }
                    ?>
                </div>
                <div class="desc">
                    <h2>Loading...</h2>
                    <h5>Recomended For You!</h5>
                    <p>Please wait while the item is loading...</p>
                    <button class="next">SELECT THE PICKUP</button>
                </div>
            </section>
            <section>
                <h1>NOW THATS <span id="sectitle">YOUR</span> GUITAR!</h1>
                <h3>Looks Awesome!<br>
                    But you can review it, and change parts if necessary by the creation menu</h3>
                <section id="guitar_pic">
                </section>
                <div class="desc">
                <button class="finish">FINISH GUITAR!</button>
                    <h5>*Picture for demonstration only</h5>
                </div>
                <div id="overlay" class="overlay"></div>
            </section>

        </article>
        <article class="thirdCol" id="builder">
            <ul id="progressbar">
                <li class="active">Pickup</li>
                <li>Body</li>
                <li>Neck</li>
                <li>Bridge</li>
                <li>FINISH</li>
            </ul>
            <section>
                <h3>Your Guitar:</h3>
                <div class="item">
                    <div class="item_thumb"></div>
                    <div class="item_title">Seymour Duncan S2995</div>
                    <div class="item_price">438$</div>
                </div>
            </section>
        </article>
        <div id="popup" class="popup">
            <span class="closePopup">X</span>
            <label>Name your guitar &nbsp;<input class="guitarName" type="text" name="guitarName" placeholder="Guitar name"></label>
            <img src="images/guitar.png">
            <label>public?<input class="public" type="checkbox" name="public"></label>
            <button class="submit">Finish</button>
        </div>
    </main>

</div>
<footer>
    <script src="includes/wizard.js"></script>
    <script src="includes/menu.js"></script>
    <script type="text/javascript" src="includes/slick/slick.min.js"></script>
    <script src="includes/jquery.easing.min.js"></script>
    <div class="container">
        <a href="#"><span>CONTACT US</span></a>
        <span>Copyright © 2017 Gady Ezra & Eldad Corem</span>
    </div>
</footer>
</body>
</html>
