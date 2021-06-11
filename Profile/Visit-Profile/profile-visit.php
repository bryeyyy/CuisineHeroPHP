<?php
    session_start();
    if($_SESSION['email']==$_SESSION['author']){
      header('location:../profile.php');
      exit();
    }
    else if(isset($_SESSION['firstname']) && isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">
<title>CuisineHero |Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="shortcut icon" href="../../Images/logo white.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Krub' rel='stylesheet'>
  <link rel="stylesheet" href="../style.css">
</head>
<header>
  <nav class="navbar navbar-expand-md" id="banner">
      <div class="container-fluid" id="banner1">
          <a class="navbar-brand" href="#"><img src="../../Images\logo white.png"></a>
          <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <img src="../../Images\burjer.png" width="30" height="20">
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link d-block d-sm-block d-md-none" href="../feed.php">CuisineHero</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link" href="../../Search/search.php">Search</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="Feed" href="../profile.php">Profile</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="Feed" href="../../feed.php">Feed</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="../../about.html">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="../../DB/Logout.php">Logout</a>
                  </li>
              </ul> 
      </div>
      <p class="navbar-center d-none d-md-block d-lg-block d-xl-block" id="navtext">CuisineHero</p>
  </nav>
</header><br><br><br><br>

<body>
  <?php include 'prof2.php'?>
  <div class="row">
<div class="col-12 Editbtn">
      <?php include 'qfollow.php'?>
    <!--<button type="button" class="btn follow-btn"><div>Follow</div></button>-->
</div></div>
<div class="container-fluid spacing" id="hey">
                <div class="row">
                    <div class="col-12 text-center" id="buffer">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item tab1 d-none d-md-block">
                              <a class="nav-link active" data-toggle="tab" href="#recp">Recipe</a>
                            </li>
                            <li class="nav-item tab1 d-none d-md-block">
                              <a class="nav-link" data-toggle="tab" href="#fav">Favorites</a>
                            </li>
                            <li class="nav-item tab1 d-none d-md-block">
                              <a class="nav-link" data-toggle="tab" href="#fol">Following</a>
                            </li></ul>
                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item tab1 d-md-none">
                              <a class="nav-link active" data-toggle="tab" href="#recp"><img width="25px" src="../icons/chef-hat.png"></a>
                            </li>
                            <li class="nav-item tab1 d-md-none">
                              <a class="nav-link" data-toggle="tab" href="#fav"><img width="25px" src="../icons/like.png"></a>
                            </li>
                            <li class="nav-item tab1 d-md-none">
                              <a class="nav-link" data-toggle="tab" href="#fol"><img width="25px" src="../icons/friends.png"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="recp" class="container-fluid tab-pane active">
                      <div class="row">
                          <?php include 'recipe2.php'?>
                      </div>
                    </div>
                    <div id="fav" class="container-fluid tab-pane fade">
                        <div class="row">
                        <?php include 'fav2.php'?>
                        </div>
                    </div>
                    <div id="fol" class="container tab-pane fade">
                        <div class="row">
                          <?php include 'following-visit.php'?>
                        </div>
                    </div>
                </div>
</div></div></div>
</body>
</html>
<script>
  $('.follow-btn').click(function(){
    if($('.follow-btn').val() == 1){
      $('.follow-btn').removeClass('followed');
      $('.follow-btn div').html('Follow');
      $('.follow-btn').val(0);
      $.post('followbtn.php', {followed: '-1'});
    }
    else
    {
      $('.follow-btn').addClass('followed');
      $('.follow-btn div').html('Followed');
      $('.follow-btn').val(1);
      $.post('followbtn.php', {followed: '1'});
    }
  });
        $(".link").click(function() {
        var link = $(this).attr('var');
        $('.post').attr("value",link);
        $('.redirect').submit();
        });
        $(".link1").click(function() {
        var link1 = $(this).attr('var');
        $('.post1').attr("value",link1);
        $('.redirect1').submit();
        });
</script>
<?php 
    }
    else{
        header('location:../index.php');
        exit();
    }
?>