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
    if(isset($_POST['btnPost'])){
        $recName = $_POST['recname'];
        $timePrep = $_POST['preptime'];
        $timeCook = $_POST['cooktime'];
        $serveSize = $_POST['serve'];
        $procedure = $_POST['proce'];
        $nutriValue = $_POST['nutrval'];

        $query1 = "SELECT MAX(food_id) AS 'food_id' FROM food";
        $sql1 = mysqli_query($con, $query1);
        $row2 = mysqli_fetch_assoc($sql1);
        $fID = intval($row2['food_id'])+1;

        $insert="INSERT INTO food(food_id, food_name, author, prep_time, cook_time, servings, proced, nutri_info, likes) 
                    VALUES ('$fID','$recName' ,'$email', '$timePrep', '$timeCook', '$serveSize', '$procedure', '$nutriValue', '0')";

        mysqli_query($con, $insert);
        header("location: feed.php");
    }
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
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
                            <form method="POST" action="feed.php" id="recp-form">
                                <div id="croppie-demo"></div>
                                <label for="recimg"><span class="formlabel">Upload Recipe Picture</span></label><br>
                                <input type="file" id="croppie-input" name="filename" class="text-center" required>
                                <div class="form-group">
                                    <label for="rec"><span class="formlabel">Recipe Name:</span></label>
                                    <textarea class="form-control" rows="1" name="recname" id="recname" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="prep"><span class="formlabel">Preparation Time:</span></label>
                                    <textarea class="form-control" rows="1" name="preptime" id="preptime" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cookt"><span class="formlabel">Cooking Time:</span></label>
                                    <textarea class="form-control" rows="1" name="cooktime" id="cooktime" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="serv"><span class="formlabel">Serving:</span></label>
                                    <textarea class="form-control" rows="1" name="serve" id="serve" required></textarea>
                                </div>
                                <div class="form-group" id="ingrform">
                                    <label for="ingredients"><span class="formlabel">Ingredients:</span></label><br>
                                    <div class="container-fluid">
                                    <div class="row">
                                    <div class="col-md-6 col-12 ingcateg">
                                    <h5 id="Ing-categ"></h5>
                                    <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Categories <!--Dito ung Ingredients-->
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#category-btn">Meat</a>
                                        <a class="dropdown-item" href="#category-btn">Fish/Seafood</a>
                                        <a class="dropdown-item" href="#category-btn">Oil/Liquid</a>
                                        <a class="dropdown-item" href="#category-btn">Vegetables</a>
                                        <a class="dropdown-item" href="#category-btn">Fruits</a>
                                        <a class="dropdown-item" href="#category-btn">Spice/Seasonings/Sweeteners</a>
                                        <a class="dropdown-item" href="#category-btn">Dairy</a>
                                        <a class="dropdown-item" href="#category-btn">Dessert/Snacks</a>
                                        <a class="dropdown-item" href="#category-btn">Condiments</a>
                                        <a class="dropdown-item" href="#category-btn">Soup/Sauces</a>
                                        <a class="dropdown-item" href="#category-btn">Nuts/Legumes</a>
                                        <a class="dropdown-item" href="#category-btn">Baking & Grains</a>
                                    </div>
                                    </div>
                                    <input type="text" placeholder="Name of Ingredient" id="name-Ing"><br><br>
                                    <span class="ex">Example: 1 kg</span>
                                    <input type="text" placeholder="Amount" id="amt-Ing">
                                    <a id="add-Ing" href="#category-btn">Add</a>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <span class="sayoheading">List of Ingredients:</span>
                                        <div class="container-fluid">
                                            <div class="row app-Ings d-flex justify-content-center"><!--Ingredients will go here-->
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="procedures"><span class="formlabel">Procedures:</span></label>
                                    <textarea class="form-control" rows="5" name="proce" id="proce" required></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="nutri"><span class="formlabel">Nutritional Value (Optional):</span></label>
                                    <textarea class="form-control" rows="5" name="nutrval"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="ytlink"><span class="formlabel">Youtube Link Tutorial (Optional): (Right-click video and choose "Copy embed code")</span></label>
                                    <textarea class="form-control" rows="1" name="ytlink"></textarea>
                                  </div>
                                <button type="submit" class="btn croppie-upload" id="postbtn" name="btnPost"><span class="posttxt">Post your Recipe</span></button>
                              </form>
                        </div>
                        
                      </div>
                    </div>
                </div>
            </div>    
</body>
</html>
<script>
var cl_categ;
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
        $('.app-Ings').append('<sayo class="ingrds"><button type="button" class="btn delbtn">Remove</button><span class ="col-md-4 col-12">'+category+'</span><span class ="categs col-md-3 col-12 '+cl_categ+'">'+ing+'</span><span class="col-md-3 col-12 amt-'+cl_categ+'">'+ing_amt+'</span></sayo>');
    }//Dito ung appending ingredients
    else {
        alert('Please fill-up the name of ingredient and the amount.');
    }
  $(document).on('click', 'button.delbtn', function() {
  $(this).closest('sayo').remove();
});

});

$("#postbtn").click(function(){
    var meatArray = [];var meatAmt = [];
    var seaArray = [];var seaAmt = [];
    var oilArray = [];var oilAmt = [];
    var vegArray = [];var vegAmt = [];
    var fruitArray = [];var fruitAmt = [];
    var spiceArray = [];var spiceAmt = [];
    var dairyArray = [];var dairyAmt = [];
    var desArray = [];var desAmt = [];
    var condiArray = [];var condiAmt = [];
    var soupArray = [];var soupAmt = [];
    var nutArray = [];var nutAmt = [];
    var bakeArray = [];var bakeAmt = [];

    $("sayo.ingrds").each(function() {
        var ingredients = [];
        var amounts = [];
        var ingData = $(this).find('span.meat');
        var amtData = $(this).find('span.amt-meat');
        if (ingData.length > 0 && amtData.length > 0) {
             ingData.each(function() { ingredients.push($(this).text()); });
             amtData.each(function() { amounts.push($(this).text()); });
             meatArray.push(ingredients);
             meatAmt.push(amounts);
        }
     });

     $.ajax({ 
        url: "feed_files/submit.php", 
        type: "POST", 
        data: { 'ingArray' : meatArray, 'categ' : "meat", 'ingAmt' : meatAmt}, 
        success: function(data) {   
            //alert(data);
        }    
     });

    $("sayo.ingrds").each(function() {
        var ingredients = [];
        var amounts = [];
        var ingData = $(this).find('span.fish');
        var amtData = $(this).find('span.amt-fish');
        if (ingData.length > 0 && amtData.length > 0) {
             ingData.each(function() { ingredients.push($(this).text()); });
             amtData.each(function() { amounts.push($(this).text()); });
             seaArray.push(ingredients);
             seaAmt.push(amounts);
        }
     });
    
    $.ajax({ 
        url: "feed_files/submit.php", 
        type: "POST", 
        data: { 'ingArray' : seaArray, 'categ':"fish", 'ingAmt' : seaAmt}, 
        success: function(data) {   
            //alert(data);
        }    
     });

    $("sayo.ingrds").each(function() {
        var ingredients = [];
        var amounts = [];
        var ingData = $(this).find('span.oil');
        var amtData = $(this).find('span.amt-oil');
        if (ingData.length > 0 && amtData.length > 0) {
             ingData.each(function() { ingredients.push($(this).text()); });
             amtData.each(function() { amounts.push($(this).text()); });
             oilArray.push(ingredients);
             oilAmt.push(amounts);
        }
     });
    
    $.ajax({ 
        url: "feed_files/submit.php", 
        type: "POST", 
        data: { 'ingArray' : oilArray, 'categ':"oil", 'ingAmt' : oilAmt}, 
        success: function(data) {   
            //alert(data);
        }    
     });

    $("sayo.ingrds").each(function() {
        var ingredients = [];
        var amounts = [];
        var ingData = $(this).find('span.veg');
        var amtData = $(this).find('span.amt-veg');
        if (ingData.length > 0 && amtData.length > 0) {
             ingData.each(function() { ingredients.push($(this).text()); });
             amtData.each(function() { amounts.push($(this).text()); });
             vegArray.push(ingredients);
             vegAmt.push(amounts);
        }
     });
    
    $.ajax({ 
        url: "feed_files/submit.php", 
        type: "POST", 
        data: { 'ingArray' : vegArray, 'categ':"veggies", 'ingAmt' : vegAmt}, 
        success: function(data) {   
            //alert(data);
        }    
     });

    $("sayo.ingrds").each(function() {
        var ingredients = [];
        var amounts = [];
        var ingData = $(this).find('span.fruit');
        var amtData = $(this).find('span.amt-fruit');
        if (ingData.length > 0 && amtData.length > 0) {
             ingData.each(function() { ingredients.push($(this).text()); });
             amtData.each(function() { amounts.push($(this).text()); });
             fruitArray.push(ingredients);
             fruitAmt.push(amounts);
        }
     });
    
    $.ajax({ 
        url: "feed_files/submit.php", 
        type: "POST", 
        data: { 'ingArray' : fruitArray, 'categ':"fruit", 'ingAmt' : fruitAmt}, 
        success: function(data) {   
            //alert(data);
        }    
     });

    $("sayo.ingrds").each(function() {
        var ingredients = [];
        var amounts = [];
        var ingData = $(this).find('span.spice');
        var amtData = $(this).find('span.amt-spice');
        if (ingData.length > 0 && amtData.length > 0) {
             ingData.each(function() { ingredients.push($(this).text()); });
             amtData.each(function() { amounts.push($(this).text()); });
             spiceArray.push(ingredients);
             spiceAmt.push(amounts);
        }
     });
    
    $.ajax({ 
        url: "feed_files/submit.php", 
        type: "POST", 
        data: { 'ingArray' : spiceArray, 'categ':"spice", 'ingAmt' : spiceAmt}, 
        success: function(data) {   
            //alert(data);
        }    
     });

    $("sayo.ingrds").each(function() {
        var ingredients = [];
        var amounts = [];
        var ingData = $(this).find('span.dairy');
        var amtData = $(this).find('span.amt-dairy');
        if (ingData.length > 0 && amtData.length > 0) {
             ingData.each(function() { ingredients.push($(this).text()); });
             amtData.each(function() { amounts.push($(this).text()); });
             dairyArray.push(ingredients);
             dairyAmt.push(amounts);
        }
     });
    
    $.ajax({ 
        url: "feed_files/submit.php", 
        type: "POST", 
        data: { 'ingArray' : dairyArray, 'categ':"dairy", 'ingAmt' : dairyAmt}, 
        success: function(data) {   
            //alert(data);
        }    
     });

    $("sayo.ingrds").each(function() {
        var ingredients = [];
        var amounts = [];
        var ingData = $(this).find('span.dessert');
        var amtData = $(this).find('span.amt-dessert');
        if (ingData.length > 0 && amtData.length > 0) {
             ingData.each(function() { ingredients.push($(this).text()); });
             amtData.each(function() { amounts.push($(this).text()); });
             desArray.push(ingredients);
             desAmt.push(amounts);
        }
     });
    
    $.ajax({ 
        url: "feed_files/submit.php", 
        type: "POST", 
        data: { 'ingArray' : desArray, 'categ':"dessert", 'ingAmt' : desAmt}, 
        success: function(data) {   
            //alert(data);
        }    
     });

    $("sayo.ingrds").each(function() {
        var ingredients = [];
        var amounts = [];
        var ingData = $(this).find('span.condi');
        var amtData = $(this).find('span.amt-condi');
        if (ingData.length > 0 && amtData.length > 0) {
             ingData.each(function() { ingredients.push($(this).text()); });
             amtData.each(function() { amounts.push($(this).text()); });
             condiArray.push(ingredients);
             condiAmt.push(amounts);
        }
     });
    
    $.ajax({ 
        url: "feed_files/submit.php", 
        type: "POST", 
        data: { 'ingArray' : condiArray, 'categ':"condi", 'ingAmt' : condiAmt}, 
        success: function(data) {   
            //alert(data);
        }    
     });   

    $("sayo.ingrds").each(function() {
        var ingredients = [];
        var amounts = [];
        var ingData = $(this).find('span.soup');
        var amtData = $(this).find('span.amt-soup');
        if (ingData.length > 0 && amtData.length > 0) {
             ingData.each(function() { ingredients.push($(this).text()); });
             amtData.each(function() { amounts.push($(this).text()); });
             soupArray.push(ingredients);
             soupAmt.push(amounts);
        }
     });
    
    $.ajax({ 
        url: "feed_files/submit.php", 
        type: "POST", 
        data: { 'ingArray' : soupArray, 'categ':"soup", 'ingAmt' : soupAmt}, 
        success: function(data) {   
            //alert(data);
        }    
     });

    $("sayo.ingrds").each(function() {
        var ingredients = [];
        var amounts = [];
        var ingData = $(this).find('span.nuts');
        var amtData = $(this).find('span.amt-nuts');
        if (ingData.length > 0 && amtData.length > 0) {
             ingData.each(function() { ingredients.push($(this).text()); });
             amtData.each(function() { amounts.push($(this).text()); });
             nutArray.push(ingredients);
             nutAmt.push(amounts);
        }
     });
    
    $.ajax({ 
        url: "feed_files/submit.php", 
        type: "POST", 
        data: { 'ingArray' : nutArray, 'categ':"nuts", 'ingAmt' : nutAmt}, 
        success: function(data) {   
            //alert(data);
        }    
     });    

    $("sayo.ingrds").each(function() {
        var ingredients = [];
        var amounts = [];
        var ingData = $(this).find('span.bake');
        var amtData = $(this).find('span.amt-bake');
        if (ingData.length > 0 && amtData.length > 0) {
             ingData.each(function() { ingredients.push($(this).text()); });
             amtData.each(function() { amounts.push($(this).text()); });
             bakeArray.push(ingredients);
             bakeAmt.push(amounts);
        }
     });
    
    $.ajax({ 
        url: "feed_files/submit.php", 
        type: "POST", 
        data: { 'ingArray' : bakeArray, 'categ':"bake", 'ingAmt' : bakeAmt}, 
        success: function(data) {   
            //alert(data);
        }    
     });
 }); 
 var croppieDemo = $('#croppie-demo').croppie({
            enableOrientation: true,
            viewport: {
                width: 266.7,
                height: 366.7,
            },
            boundary: {
                width: 300,
                height: 400
            }
        });

        $('#croppie-input').on('change', function () { 
            var reader = new FileReader();
            reader.onload = function (e) {
                croppieDemo.croppie('bind', {
                    url: e.target.result
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.croppie-upload').on('click', function (ev) {
            croppieDemo.croppie('result', {
                type: 'canvas',
                size: {width: 400,height: 550,}
            }).then(function (image) {
                var ext = $('#croppie-input').val().split('.').pop().toLowerCase();
                if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                alert('Invalid form input!');
                }
                $.ajax({
                    url: "feed_files/upload.php",
                    type: "POST",
                    data: {
                        "image" : image
                    },
                });
            });
        });
        $('button#postbtn').prop('disabled', true);
        $('textarea').keyup(function(){
        if ($('#recname').val().length>0 && $('#cooktime').val().length>0 && $('#preptime').val().length>0 && $('#serve').val().length>0 && $('#proce').val().length>0){
            $('button#postbtn').prop('disabled', false);
        }
        else{
            $('button#postbtn').prop('disabled', true);
        }
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