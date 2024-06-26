<!DOCTYPE html>
<html lang="en">
<title>CuisineHero</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <link rel="shortcut icon" href="Images/logo white.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css files\landingpage.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Krub' rel='stylesheet'>
</head>
<header>
    <nav class="navbar navbar-expand-md" id="banner">
        <div class="container-fluid" id="banner1">
            <a class="navbar-brand" href="index.php"><img src="Images\logo white.png"></a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <img src="Images\burjer.png" width="30" height="20">
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link d-block d-sm-block d-md-none" href="#">CuisineHero</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Feed" href="#" data-toggle="modal" data-target="#Login">Feed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#AdminLogin">Admin</a>
                    </li>
                </ul>
            </div>
            <p class="navbar-center d-none d-md-block d-lg-block d-xl-block" id="navtext">CuisineHero</p>
    </nav>
</header>

<body>
    <div class="video-container">
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="videos/video.mp4" type="video/mp4">
        </video>
        <div class="container-fluid h-100" id="landingtop">
            <div class="row" id="buffertop">
                <div class="col-mid-auto col-sm-3"></div>
            </div>
            <div class="row d-flex justify-content-center" id="top">
                <div class="col-lg-12 text-center col-sm-12" id="brandname">
                    <h1 class="font-weight-bold" id="tagline">Your #1 Kitchen Buddy!</h1>
                    <p id="desc">View delicious recipes and plan your meals smartly with with CuisineHero.</p>
                </div>
            </div>
            <div class="row" id="bottom">
                <div class="col-lg-12 text-center col-sm-12">
                    <form action="Search/search.php">
                        <button type="submit" class="btn" id="searchbtn">
                            <span id="srch">Search Now</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--malawak na scroll down ng features-->
    <div class="container-fluid" id="landingbot">
        <div class="row" id="buffertop">
            <div class="col-mid-auto col-sm-3"></div>
        </div>
        <div class="row d-flex">
            <div class="col-lg-8 col-sm-12 justify-content-center" id="botpic">
                <div class="images">
                    <div id="img1">
                        <img id="laptop" src="Images/laptop feed.png">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12" id="bottext">
                <div class="textbot">
                    <h1 class="font-weight-bold">Share your recipes with the Community.</h1>
                    <p>With the Recipe Feed, you can post your own recipes, and view recipes from your community.</p>
                </div>
                <div class="text-center">
                    <button type="button" class="btn" data-toggle="modal" data-target="#Sign-Up" id="Sign"><span id="signup">Go to your Feed</span></button>
                    <!--pasabi nalang if babaguhin to :V-->
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="Sign-Up">
        <div class="modal-dialog modal-dialog-centered modal-lg text-center">
            <div class="modal-content" id="signupmod">
                <div class="modal-header">
                    <p class="font-weight-bold">Sign-Up</p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="DB/SignUp.php" method="post" class="form-horizontal">
                        <div class="form-group control-label">
                            <input type="text" name="firstname" placeholder="First Name" autocomplete="false" required>
                        </div>
                        <div class="form-group control-label">
                            <input type="text" name="lastname" placeholder="Last Name" autocomplete="false" required>
                        </div>
                        <div class="form-group control-label">
                            <input type="email" name="email" placeholder="E-mail" autocomplete="false" required>
                        </div>
                        <div class="form-group control-label">
                            <input type="password" name="password" id="pw1" placeholder="Password" autocomplete="false" required>
                        </div>
                        <div class="form-group control-label">
                            <input type="password" id="pw2" placeholder="Confirm Password" autocomplete="false">
                            <br><span id="match"></span><br>
                        </div>
                        <div id="tnctext">By Signing Up, You are agreeing with the site's <a href="#" data-toggle="modal" data-target="#TNC">Terms and Conditions</a></div>
                        <input type="submit" value="Sign-Up" id="block">
                    </form>

                </div>
                <div class="modal-footer justify-content-center">
                    <span class="dialouge">Already have an account?</span><button type="button" class="btn loginbtn" data-toggle="modal" data-target="#Login" data-dismiss="modal"><span id="log">Login</span></button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Login">
        <div class="modal-dialog modal-dialog-centered modal-lg  text-center">
            <div class="modal-content" id="modal2">
                <div class="modal-header">
                    <div id="LogFirst" class="font-weight-bold"></div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="DB/Login.php" method="POST">
                        <div class="form-group control-label">
                            <input type="email" name="LogEmail" placeholder="E-mail" autocomplete="false">
                        </div>
                        <div class="form-group control-label">
                            <input type="password" name="LogPassword" placeholder="Password" autocomplete="false">
                        </div>
                        <input type="submit" value="Login" id="block2">
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <span class="dialouge">Create an account?</span><button type="button" class="btn signinbtn" data-dismiss="modal" data-toggle="modal" data-target="#Sign-Up"><span class="signbtntxt">Sign-Up</span></button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Login">
        <div class="modal-dialog modal-dialog-centered modal-lg  text-center">
            <div class="modal-content" id="modal2">
                <div class="modal-header">
                    <div id="LogFirst" class="font-weight-bold"></div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="DB/Login.php" method="POST">
                        <div class="form-group control-label">
                            <input type="email" name="LogEmail" placeholder="E-mail" autocomplete="false">
                        </div>
                        <div class="form-group control-label">
                            <input type="password" name="LogPassword" placeholder="Password" autocomplete="false">
                        </div>
                        <input type="submit" value="Login" id="block2">
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <span class="dialouge">Create an account?</span><button type="button" class="btn signinbtn" data-dismiss="modal" data-toggle="modal" data-target="#Sign-Up"><span class="signbtntxt">Sign-Up</span></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Login Modal -->
    <div class="modal fade" id="AdminLogin">
        <div class="modal-dialog modal-dialog-centered modal-lg text-center">
            <div class="modal-content" id="modal2">
                <div class="modal-header">
                    <div id="LogFirst" class="font-weight-bold">Admin Login</div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="DB/login_admin.php" method="POST">
                        <div class="form-group control-label">
                            <input type="email" name="LogEmail" placeholder="E-mail" autocomplete="false">
                        </div>
                        <div class="form-group control-label">
                            <input type="password" name="LogPassword" placeholder="Password" autocomplete="false">
                        </div>
                        <input type="submit" value="Login" id="block2">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="TNC">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable text-center">
            <div class="modal-content" id="modal2">
                <div class="modal-header">
                    <p class="font-weight-bold">Terms and Conditions</p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <iframe src="DB/TnC-Priv.php" frameborder="2" width="700px"></iframe>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <div class="footer col-12">
        <div class="row">
            <div class="col-lg-4 col-sm-12 column">
                <div class="footbrnd text-center">
                    <h1>CuisineHero</h1>
                    <p class="fdesc">Developed and Designed by Team chailes <br> March 2024</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 justify-content-center column">
                <div class="socials">
                    <h1 class="colh1">Socials</h1>
                    <ul>
                        <li><a href="facebook.com"><img class="socicon" src="Images\facebook.png"></a></li>
                        <li><a href="instagram.com"><img class="socicon" src="Images\instagram.png"></a></li>
                        <li><a href="twitter.com"><img class="socicon" src="Images\twitter.png"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12  column">
                <div class="contacts">
                    <h1 class="colh1">Contact Us</h1>
                    <ul>
                        <li>Pulilan, Bulacan</li>
                        <li>09123456789</li>
                        <li>contactus@cuisinehero.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

</html>
<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("banner").style.top = "0";
        } else {
            document.getElementById("banner").style.top = "-110px";
        }
        prevScrollpos = currentScrollPos;
    }
</script>
<script>
    $('#Sign').click(function() {
        $("#LogFirst").html("Login");
    });
    $("#Feed").click(function() {
        $("#LogFirst").html("You need to login first to continue.");
    });
    $('#block').prop('disabled', true);
    $('#pw1, #pw2').on('keyup', function() {
        if ($('#pw1').val() == $('#pw2').val() && $('#pw1').val().length > 0) {
            $('#match').html('Password matched').css('color', 'green');
            $('#block').prop('disabled', false).css('border', 'solid yellow 2px');
        } else {
            $('#match').html('Not Matching').css('color', 'red');
            $('#block').prop('disabled', true).css('border', 'solid red 2px');
        }
    });
</script>