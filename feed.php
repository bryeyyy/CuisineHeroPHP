<!DOCTYPE html>
<html lang="en">
<title>CuisineHero</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <link rel="shortcut icon" href="images/logo white.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css files\feedstyle.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Krub' rel='stylesheet'>
</head>
<header>
    <nav class="navbar navbar-expand-md" id="banner">
        <div class="container-fluid" id="banner1">
            <a class="navbar-brand" href="C:\Users\User\Documents\GitHub\CuisineHero\index.html"><img src="Images\logo white.png"></a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <img src="Images\burjer.png" width="30" height="20">
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link d-block d-sm-block d-md-none" href="index.html">CuisineHero</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Feed" href="#" data-toggle="modal" data-target="#Login">Feed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Profile/profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="DB/Logout.php">Logout</a>
                    </li>
                </ul> 
        </div>
        <p class="navbar-center d-none d-md-block d-lg-block d-xl-block" id="navtext">CuisineHero</p>
    </nav>
<body>
    <div class="container-fluid" id="hey">
        <div class="row">
            <div class="col-12 text-center" id="buffer">
                <h1 class="feedtxt font-weight-bold">
                    Your Feed
                </h1>
            </div>
        </div>
        <div class="row" id="sec2">
            <div class="col-lg-3 d-none d-lg-block d-xl-block" id="firstsec">
                <div class="profcard float-right">
                    <div class="prf">
                        <div class="prfimg">
                            <img class = "img-fluid" src="Images\sample pic.jpg"> <!--profile picture-->
                        </div>
                        <div class="prfname">
                            <h3>Lisbeth Noel</h3> <!--username-->
                        </div>
                        <div class="prfdata">
                            <h5 class="buddycount">Buddies: 13</h5> <!--bilang ng friends-->
                        </div>
                        <a href="#" class="btn" role="button" id="profbtn"><span id="prftxt">Profile</span></a>
                    </div>
                </div>   
            </div>
            <div class="col-lg-6 d-sm-12 d-flex justify-content-center" id="mainsec">
                <!--this is where the posts will go-->
                <div class="posts">
                    <div class="card onclick="location.href='#';" style="cursor: pointer;">
                        <div class="dp"> <!--profile picture-->
                            <img src="Images/sample pic.jpg">
                        </div> 
                        <div class="usrnm"> <!--username-->
                            <p>Username</p>
                        </div>
                        <div class="foodpic">
                            <img class="img-fluid" src="Images/sample pic.jpg">
                        </div>
                        <div class="foodlabel">
                            <h2>Food Stuff</h2>
                        </div>
                    </div>
                    <div class="card onclick="location.href='# <!--link to the recipe post--></div>';" style="cursor: pointer;">
                        <div class="dp"> <!--profile picture-->
                            <img src="Images/sample pic.jpg">
                        </div> 
                        <div class="usrnm"> <!--username-->
                            <p>Username</p>
                        </div>
                        <div class="foodpic"> <!--picture ng pagkain-->
                            <img src="Images/sample pic.jpg">
                        </div>
                        <div class="foodlabel"> <!--label ng pagkain-->
                            <h2>Food Stuff</h2> 
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-3 d-none d-lg-block d-xl-block text-center" id="thirdsec">
                <div class="community justify-content-center">
                    <div class="comcard">
                        <h3>Recommended Buddies</h3>
                        <div class="personcard justify-content-center onclick="location.href='#';" style="cursor: pointer;""> <!--per user ito na recommended-->
                            
                            <div class="dp2">
                                <img src="Images/sample pic.jpg">
                            </div>
                            <div class="usrnm2">
                                <p>Username</p>
                            </div>
                        </div>
                        <div class="personcard onclick="location.href='#';" style="cursor: pointer;""> <!--per user ito na recommended-->
                            <div class="dp2">
                                <img src="Images/sample pic.jpg">
                            </div>
                            <div class="usrnm2">
                                <p>Username</p>
                            </div>
                        </div>
                        <div class="personcard onclick="location.href='#';" style="cursor: pointer;""> <!--per user ito na recommended-->
                            
                            <div class="dp2">
                                <img src="Images/sample pic.jpg">
                            </div>
                            <div class="usrnm2">
                                <p>Username</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
