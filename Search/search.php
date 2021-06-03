<!DOCTYPE html>
<html lang="en">
<title>CuisineHero |Search</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <link rel="shortcut icon" href="../Images/logo white.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Krub' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <nav class="navbar navbar-expand-md" id="banner">
        <div class="container-fluid" id="banner1">
            <a class="navbar-brand" href="../feed.php"><img src="../Images\logo white.png"></a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <img src="../Images\burjer.png" width="30" height="20">
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link d-block d-sm-block d-md-none" href="#">CuisineHero</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Feed" href="../feed.php">Feed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Profile/profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.html">About</a>
                    </li>
                </ul> 
        </div>
        <p class="navbar-center d-none d-md-block d-lg-block d-xl-block" id="navtext">CuisineHero</p>
    </nav>
</header>
<!--Need pala ng 2 case dito, pag logged in or not sa feed and Profile pala?-->
<br><br><br>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-12 col-md-6">
<h1>Search</h1>
<div class="row">
<div class="col-12 col-md-3 d-none d-lg-block">
    <input type="button" class="btn ingr btn-outline-dark" value="Ingredients">
</div>
<div class="col-12 col-md-6 d-none d-lg-block"> 
    <input type="button" class="btn recp btn-outline-dark" value="Recipe Name">
</div>
</div><br>
<div class="col-12 d-lg-none">
    <div class="row">
    <div class="dropdown col-1">
        <a class="btn dropdown-toggle dpdown" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item ingr" href="#">Ingredients</a>
            <a class="dropdown-item recp" href="#">Recipe Name</a>
        </div>
    </div>
    <h1 class="col-9 select"></h1>
</div>
</div>
<div class="row" id="accordion">
<div class="collapse ingre1 show" data-parent="#accordion">
    <div class="col-12">
        <form action="" method="get" id="form">
            <div class="container-fluid">   
            <div class="row">
            <input type="text" class="col-10" name="Search" id="" placeholder="Type your ingredient">
            <a class="col-2" href="#" onclick="document.getElementById('form').submit()"> <img class="searchbtn" src="search.png"></a>
        </div></div>
        </form>
    </div>
    <div class="col-12">
        <div class="container-fluid">
        <div class="row pantry">
        <h2 class="col-10">Your Pantry:</h2>
            <button class="btn d-lg-none dpdown1 col-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <img src="down-arrow.png">
            </button>
            <div class="collapse d-lg-none" id="collapseExample">
                test1<!--JQ + DB Here-->
            </div>
        <!--JQ + DB Here-->
    </div>
    </div>
    </div>
    <div class="col-12">
        <h2>Smart Suggestions</h2>
        <!--JQ + DB Here-->
    </div>
</div>
<div class="collapse recp1" data-parent="#accordion">
    <div class="col-12">
        <form action="" method="get" id="form">
            <div class="container-fluid">   
            <div class="row">
            <input type="text" class="col-10" name="Search" id="" placeholder="Type the name of the Recipe">
            <a class="col-2" href="#" onclick="document.getElementById('form').submit()"> <img class="searchbtn" src="search.png"></a>
        </div></div>
        </form>
    </div>
</div>
</div>
</div>

<div class="col-12 col-md-6">
    <div class="container-fluid">
    <h1>You can cook:</h1>
    <div class="row">
    <div class="card col-12 col-md-4">
        <div class="card-body">Content</div>
        <div class="card-footer">Footer</div>
    </div>
    <div class="card col-12 col-md-4">
        <div class="card-body">Content</div>
        <div class="card-footer">Footer</div>
    </div>
    <div class="card col-12 col-md-4">
        <div class="card-body">Content</div>
        <div class="card-footer">Footer</div>
    </div>
    <div class="card col-12 col-md-4">
        <div class="card-body">Content</div>
        <div class="card-footer">Footer</div>
    </div>
    <div class="card col-12 col-md-4">
        <div class="card-body">Content</div>
        <div class="card-footer">Footer</div>
    </div>
    <!--Bali ung isang card i aappend nalang no need for conf-->
</div>
</div>
</div>
</div></div>
</body>
</html>
<script>
    $(document).ready(function(){
    $(".select").html('Ingredients');
});
$(document).ready(function(){
  $(".ingr").click(function(){
    $(".ingre1").collapse('show');
  });
});
$(document).ready(function(){
  $(".opt").click(function(){
    $(".opt1").collapse('show');
  });
});
$(document).ready(function(){
  $(".recp").click(function(){
    $(".recp1").collapse('show');
  });
});
$(document).ready(function(){
  $(".ingr").click(function(){
    $(".select").html('Ingredients');
  });
});
$(document).ready(function(){
  $(".recp").click(function(){
    $(".select").html('Recipe Name');
  });
});
$(".dpdown1").click(function(){
  $(".dpdown1").toggleClass("downarrow");
});
</script>