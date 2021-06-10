<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<title>CuisineHero |Ingredient</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
  <link rel="shortcut icon" href="../Images/logo white.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Krub' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  
</head>
<header>
  <nav class="navbar navbar-expand-md" id="banner">
      <div class="container-fluid" id="banner1">
          <a class="navbar-brand" href="#"><img src="../Images\logo white.png"></a>
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
                      <a class="nav-link" href="#">About</a>
                  </li>
              </ul> 
      </div>
      <p class="navbar-center d-none d-md-block d-lg-block d-xl-block" id="navtext">CuisineHero</p>
  </nav>
</header><br><br><br>

<body>
    <div></div>
    <div class="container-fluid">
        <div class="row">
          <div class="col-1 d-none d-md-block">
            <div class="container-fluid position-fixed icons">
              <div class="row">
                <div class="col-12"><?php include 'qlike.php'?></div>
                <div class="col-12"><button type="submit" class="btn"><img src="share.png"></button></div>
                <div class="col-12"><button type="submit" class="btn" data-toggle="modal" data-target="#Comment"><img src="comment.png"></button></div>
            </div></div>
          </div><br><br>
          <?php include 'ingrelist.php'?>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <div class="container-fluid position-fixed more d-md-none">
        <div class="btn-group dropup">
        <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="more.png"></button>
          <div class="dropdown-menu">
              <?php include 'qlikemobile.php'?>
              <button href="" class="dropdown-item dpup">Share</button>
              <button href="" class="dropdown-item dpup" data-toggle="modal" data-target="#Comment">Comment</button>
          </div>
      </div>
    </div>
</body> <br><br><br><br>
<div class="modal fade" id="Comment">
        <div class="modal-dialog modal-dialog-centered modal-md  modal-dialog-scrollable">
            <div class="modal-content" id="modal2">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body"><form action="comment.php" method="POST">
                    <textarea class="form-control comments" rows="2" name="comment" placeholder="Write a comment here..." required></textarea>
                    <button class="comment-btn">Submit</button>
                    </form>
                    <?php include 'disp-cmnt.php'?>
                </div>
                <div class="modal-footer justify-content-center" >
                </div>
        </div>
    </div>
</div>
<footer>
    mga detalye natin
</footer>
</html>
<?php
if(isset($_SESSION['rel'])){
  echo "<script>
  $('#Comment').modal('show');
  </script>";
  unset($_SESSION['rel']);
}
if (isset($email)){echo"
<script>
  $('.like-btn').click(function(){
    if($('.like-btn').val() == 1){
      $('.like-btn').removeClass('liked');
      $('.like-btn').val(0);
      $.post('likebtn.php', {liked: '-1'});
    }
    else
    {
      $('.like-btn').addClass('liked');
      $('.like-btn').val(1);
      $.post('likebtn.php', {liked: '1'});
    }
  });
</script>";
}else{echo"
  <script>
    $('.like-btn').click(function(){
    alert('Login first to like the recipe.')
    });
  </script>";
}?>