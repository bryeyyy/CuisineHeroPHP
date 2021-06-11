<?php
	if (isset($_POST['search'])) {
		$response = "<ul>No data found!</ul>";

		$connection = new mysqli('localhost', 'root', '', 'food');
		$q = $connection->real_escape_string($_POST['q']);

		$sql = $connection->query("SELECT * FROM ingredients_all
				WHERE ing_name LIKE '%$q%'");

		if ($sql->num_rows > 0) {
			$response = "<ul>";
			$prevIng = false;
			while ($data = $sql->fetch_assoc()){
				$ingName = $data['ing_name'];
				if($prevIng == $ingName){$ingName = ' ';}
            	else{$response .= "<li class='ing-list'>" .$ingName. "</li>";}
            	$prevIng = $data['ing_name'];
			}
			$response .= "</ul>";
		}

		exit($response);
	}
?>
<!DOCTYPE html>
<html lang="en">
<title>CuisineHero - Search</title>
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
<div class="container-fluid" id="bodycontainer">
<div class="row">
<div class="col-12 col-md-6" id="searchtoolspane" >
<h1 id="searchtitle">Search</h1>
<div class="row btnrow">
<div class="col-12 col-md-3 d-none d-lg-block" id="ingrbtn">
    <input type="button" class="btn ingr btn-outline-dark" value="Ingredients">
</div>
<div class="col-12 col-md-6 d-none d-lg-block"  id="recpbtn"> 
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
            <div class="container-fluid">   
            <div class="row  text-center" id="searchquery">
            <input type="text" id="searchBox" class="col-10" name="Search" placeholder="Type your ingredient">
            <a class="col-2" href="#" id="srchbtn"></a>
        </div>
    </div>
        <div id="response"></div>
    </div>
    <div class="col-12">
        <div class="container-fluid">
        <div class="row pantry">
        <h2 class="col-10" id="yrpantry">Your Pantry:</h2>
            <button class="btn d-lg-none dpdown1 col-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <img src="down-arrow.png">
            </button>
            <div id="collapseExample">
                <!--JQ + DB Here-->
                <div class="pantryitems">
                    <ul class="myIngs"><!--INGREDIENTS HERE-->
                    </ul>
                </div>
            </div>
    </div>
    </div>
    </div>
    <!--<div class="col-12" id="smartsugg">
        <h2>Smart Suggestions:</h2>
        <div class="smartitems">
            <div>
                <ul>
                    <--JQ + DB Here-- Drop muna to :V
                </ul>
            </div>
        </div>
    </div>-->
</div>
<div class="collapse recp1" data-parent="#accordion">
    <div class="col-12">

            <div class="container-fluid">   
            <div class="row">
            <input type="text" class="col-10" name="Search" id="" placeholder="Type the name of the Recipe">
            <a class="col-2" href="#" id="srchbtn"></a>
        </div></div>
        </form>
    </div>
</div>
</div>
</div>

    <div class="col-12 col-md-6 d-flex justify-content-center" id="resultspane">
        <div class="container-fluid">
            <h1 id="youcancook" class="font-weight-bold">You can cook:</h1>
                <div class="row" id="list">
            <!--Bali ung isang card i aappend nalang no need for conf-->
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>

<script>
$(document).on('click', 'button.delbtn', function() {
  $(this).closest('li').remove();
});
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
            $(document).ready(function () {
                $("#searchBox").keyup(function () {
                    var query = $("#searchBox").val();

                    if (query.length > 0) {
                        $.ajax(
                            {
                                url: 'search.php',
                                method: 'POST',
                                data: {
                                    search: 1,
                                    q: query
                                },
                                success: function (data) {
                                    $("#response").html(data);
                                },
                                dataType: 'text'
                            }
                        );
                    }
                    else{
                        $("#response").html("");
                    }
                });

                $(document).on('click', 'li.ing-list', function () {
                    var recipe = $(this).text();
                        $('.myIngs').append('<li><button type="button" class="btn delbtn">&#10006;</button><span>'+recipe+'</span></li>');

                });

                $("#srchbtn").click(function(){
                    var ingArray = [];
                    $("ul.myIngs li").each(function() {
                        var rowArray = [];
                        var tableData = $(this).find('span');
                        if (tableData.length > 0) {
                            tableData.each(function() { rowArray.push($(this).text()); });
                            ingArray.push(rowArray); 
                        }
                    });
                    $.ajax({ 
                        url: "searchtest.php", 
                        type: "POST",
                        data: { 'ingArray' : ingArray}, 
                        success: function(data) {   
                                $("#list").html(data);
                            } 
                    });
                }); 
            });
</script>