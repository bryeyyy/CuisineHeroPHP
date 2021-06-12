<?php
    session_start();
    if(isset($_SESSION['firstname']) && isset($_SESSION['email'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food";
    $email = isset($_SESSION['email'])? $_SESSION['email'] : null;

    $con = mysqli_connect($server,$username,$password,$dbname);
    $query = "SELECT * FROM acc WHERE email = '$email'";
    if ($result = $con->query($query)){
        $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<title>Feed - CuisineHero</title>
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
                        <a class="nav-link" href="Search/search.php">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Profile/profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="DB/Logout.php">Logout</a>
                    </li>
                </ul> 
        </div>
        <p class="navbar-center d-none d-md-block d-lg-block d-xl-block" id="navtext">CuisineHero</p>
    </nav>
</header>
<body>
            <div class="container-fluid" id="hey">
                <div class="row">
                    <div class="col-12 text-center" id="buffer">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#feed">Feed</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#postform">Add Post</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="feed" class="container tab-pane active"><br>
                        <div class="row" id="sec2">
                            <div class="col-lg-3 d-none d-lg-block d-xl-block" id="firstsec">
                                <div class="profcard float-right">
                                    <div class="prf">
                                        <div class="prfimg">
                                            <?php echo "<img class='image-fluid' src='Profile/images/".$row['dispic']."'>";?>
                                             <!--profile picture-->
                                        </div>
                                        <div class="prfname">
                                            <?php echo '<h3>'.$row["firstname"].' '.$row["lastname"].'</h3>';?>
                                            <!--username-->
                                        </div>
                                        <div class="prfdata">
                                            <h5 class="buddycount">Following: <span><?php echo $row['followno'];?><!--bilang ng friends--></span> <br> <br>  Recipe:<span> <?php echo $row['recpno'];?><!--bilang ng friends--></span></h5> <!--bilang ng friends-->
                                        </div>
                                        <a href="Profile/profile.php" class="btn" role="button" id="profbtn"><span id="prftxt">Profile</span></a>
                                    </div>
                                </div>   
                            </div>
                            <div class="col-lg-6 d-sm-12 d-flex justify-content-center" id="mainsec">
                            <div class="container-fluid">
                            <div class="row d-flex justify-content-center">
                                <!--this is where the posts will go-->
                                <div class="posts">
                                    <?php include 'feed_files/Post.php'?>  
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 d-none d-lg-block d-xl-block text-center" id="thirdsec">
                                <div class="community">
                                    <div class="comcard ">
                                        <h3>Recommended Follows</h3>
                                        <?php include 'feed_files/reco-fol.php'?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="postform" class="container tab-pane fade"><br>
                      <div class="row" id="sec3">
                        <div class="col text-center" id="formcol">
                            <h1>Share your own recipes!</h1>
                            <form method="POST" action="feed_files/recipemake.php">
                                <label for="recimg"><span class="formlabel">Upload Recipe Picture</span></label><br>
                                <input type="file" id="recipeimg" name="filename">
                                <div class="form-group">
                                    <label for="prep"><span class="formlabel">Preparation Time:</span></label>
                                    <textarea class="form-control" rows="1" name="preptime"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cookt"><span class="formlabel">Cooking Time:</span></label>
                                    <textarea class="form-control" rows="1" name="cooktime"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="serv"><span class="formlabel">Serving:</span></label>
                                    <textarea class="form-control" rows="1" name="serve"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ingredients"><span class="formlabel">Ingredients:</span></label><br>
                                    <div class="container-fluid">
                                    <div class="row">
                                    <div class="col-md-6 col-12">
                                    <h5 id="Ing-categ"></h5>
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Categories <!--Dito ung Ingredients-->
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Meat</a>
                                        <a class="dropdown-item" href="#">Fish/Seafood</a>
                                        <a class="dropdown-item" href="#">Oil/Liquid</a>
                                        <a class="dropdown-item" href="#">Vegetables</a>
                                        <a class="dropdown-item" href="#">Fruits</a>
                                        <a class="dropdown-item" href="#">Spice/Seasonings/Sweeteners</a>
                                        <a class="dropdown-item" href="#">Dairy</a>
                                        <a class="dropdown-item" href="#">Dessert/Snacks</a>
                                        <a class="dropdown-item" href="#">Condiments</a>
                                        <a class="dropdown-item" href="#">Soup/Sauces</a>
                                        <a class="dropdown-item" href="#">Nuts/Legumes</a>
                                        <a class="dropdown-item" href="#">Baking & Grains</a>
                                    </div>
                                    </div>
                                    <input type="text" placeholder="Name of Ingredient" id="name-Ing"><br><br>
                                    <span>Example: 1 kg</span>
                                    <input type="text" placeholder="Amount" id="amt-Ing">
                                    <a id="add-Ing" href="#name-Ing">Add</a>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        List of Ingredients:
                                        <div class="container-fluid">
                                            <div class="row app-Ings"><!--Ingredients will go here-->
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="procedures"><span class="formlabel">Procedures:</span></label>
                                    <textarea class="form-control" rows="5" name="proce"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="nutri"><span class="formlabel">Nutritional Value:</span></label>
                                    <textarea class="form-control" rows="5" name="nutrval"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="nutri"><span class="formlabel">Youtube Link Tutorial: (Right-click video and choose "Copy embed code")</span></label>
                                    <textarea class="form-control" rows="1" name="ytlink"></textarea>
                                  </div>
                                <button type="submit" class="btn" id="postbtn"><span class="posttxt">Post your Recipe</span></button>
                              </form>
                        </div>
                        
                      </div>
                    </div>
                </div>
            </div>    
</body>
</html>
<script>
$(".link").click(function() {
var link = $(this).attr('var');
$('.post').attr("value",link);
$('.redirect').submit();
});
$(".link1").click(function() {
var link = $(this).attr('var');
$('.post1').attr("value",link);
$('.redirect1').submit();
});

$(document).on('click', 'a.dropdown-item', function () {
    var category = $(this).text();
    $('#Ing-categ').html(category);
});
$(document).on('click', 'a#add-Ing', function () {
    var category = $('h5#Ing-categ').text();
    var cl_categ;
    if(category.length == 4){
        cl_categ = 'meat';
    }
    else if(category.length == 12){
        if (category == 'Fish/Seafood'){
            cl_categ = 'fish';
        }
        else{
            cl_categ = 'nuts';
        }
    }
    else if (category.length == 10){
        if (category == 'Oil/Liquid'){
            cl_categ = 'oil';
        }
        else if (category == 'Vegetables'){
            cl_categ = 'veg';
        }
        else {
            cl_categ = 'condi';
        }
    }
    else if (category.length == 6){
        cl_categ ='fruit';
    }
    else if (category.length == 27){
        cl_categ ='spice';
    }
    else if (category.length == 5){
        cl_categ ='dairy';
    }
    else if (category.length == 14){
        cl_categ = 'dessert';
    }
    else if (category.length == 11){
        cl_categ = 'soup';
    }
    else if (category.length == 15){
        cl_categ = 'bake';
    }
    else{
        cl_categ = null;
        alert('Please pick a category');
    }
    var ing = $('#name-Ing').val();
    var ing_amt = $('#amt-Ing').val();
    if(ing.length>0 && ing_amt.length>0 && cl_categ.length>0){
        $('.app-Ings').append('<sayo><button type="button" class="btn delbtn col-12 col-md-1">&#10006;</button><span class ="col-md-4 col-12">'+category+'</span><span class ="categs col-md-3 col-12 '+cl_categ+'">'+ing+'</span><span class="col-md-3 col-12 amt-'+cl_categ+'">'+ing_amt+'</span></sayo>');
    }//Dito ung appending ingredients
    else {
        alert('Please fill-up the name of ingredient and the amount.');
    }
    $(document).on('click', 'button.delbtn', function() {
  $(this).closest('sayo').remove();
});
});
</script>

<?php
    }
    } 
else {
    header('location:index.php');
    exit();
}
?>
<!--</?php
if(isset($_SESSION['rel'])){
  echo "<script>
  $('#Comment').modal('show');
  </script>";
  unset($_SESSION['rel']);
}

?>
<script>
$('.like-btn').click(function(){
  if($('.like-btn').val() == 1){
    $('.like-btn').removeClass('liked');
    $('.like-btn').val(0);
    $.post('Ingredients/likebtn.php', {liked: '-1'});
  }
  else
  {
    $('.like-btn').addClass('liked');
    $('.like-btn').val(1);
    $.post('Ingredients/likebtn.php', {liked: '1'});
  }
});
</script>