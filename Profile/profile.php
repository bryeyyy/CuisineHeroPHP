<?php
    session_start();
    if(isset($_SESSION['firstname']) && isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">
<title>CuisineHero - Profile</title>
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
                      <a class="nav-link d-block d-sm-block d-md-none" href="../feed.php">CuisineHero</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link" href="../Search/search.php">Search</a>
                    </li>
                  <li class="nav-item">
                      <a class="nav-link" id="Feed" href="../feed.php">Feed</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="../about.html">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="../DB/Logout.php">Logout</a>
                  </li>
              </ul> 
      </div>
      <p class="navbar-center d-none d-md-block d-lg-block d-xl-block" id="navtext">CuisineHero</p>
  </nav>
</header><br><br><br><br>

<body>
  <?php include 'prof1.php'?>
  <div class="row">
<div class="col-12 Editbtn">
    <button type="button" class="btn" data-toggle="modal" data-target="#EditProf"id="Edit"><div>Edit Profile</div></button>
</div></div>
<div class="container-fluid spacing" id="hey">
                <div class="row">
                    <div class="col-12 text-center" id="buffer">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item tab1 d-none d-md-block">
                              <a class="nav-link active" data-toggle="tab" href="#recp">Recipes</a>
                            </li>
                            <li class="nav-item tab1 d-none d-md-block">
                              <a class="nav-link" data-toggle="tab" href="#fav">Favorites</a>
                            </li>
                            <li class="nav-item tab1 d-none d-md-block">
                              <a class="nav-link" data-toggle="tab" href="#fol">Following</a>
                            </li></ul>
                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item tab1 d-md-none">
                              <a class="nav-link active" data-toggle="tab" href="#recp"><img width="25px" src="icons/chef-hat.png"></a>
                            </li>
                            <li class="nav-item tab1 d-md-none">
                              <a class="nav-link" data-toggle="tab" href="#fav"><img width="25px" src="icons/like.png"></a>
                            </li>
                            <li class="nav-item tab1 d-md-none">
                              <a class="nav-link" data-toggle="tab" href="#fol"><img width="25px" src="icons/friends.png"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="recp" class="container-fluid tab-pane active">
                      <div class="row">
                          <?php include 'recipe.php'?>
                      </div>
                    </div>
                    <div id="fav" class="container-fluid tab-pane fade">
                        <div class="row">
                        <?php include 'fav.php'?>
                        </div>
                    </div>
                    <div id="fol" class="container tab-pane fade">
                        <div class="row">
                            <?php include 'following.php'?>
                        </div>
                    </div>
                </div>
</div></div></div>
</body>
<div class="modal fade" id="EditProf">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" id="Editmodal">
            <div class="modal-content">
                <div class="modal-header text-center">
                <h1 class="font-weight-bold">Profile Settings</h1>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-center">
                <div class="container">
        <h2 class="font-weight-bold">Change Profile Picture</h2>
        <div class="row">
            <div class="col-12 text-center ">
                <div id="croppie-demo"></div>
              </div>
              <div class="col-12 d-flex justify-items-center" id="croppie-container">
                <strong class="options">Select Image:</strong>
                <input class="options" type="file" id="croppie-input">
                <button class="btn options croppie-upload" id="imgupload">Upload Image</button><br>
                <div id="croppie-view"></div>
              </div>
                
        </div>
        <h2 class="font-weight-bold">Change Profile Banner</h2>
        <div class="row">
            <div class="col-12 text-center">
              <div id="croppie-demo1"></div>
              <div class="col-12 options1 d-flex justify-items-center" id="croppie-container">
                <strong class="options">Select Image:</strong>
                <input class="options" type="file" id="croppie-input1">
                <button class="btn options croppie-upload1" id="imgupload">Upload Image</button><br>
                <div id="croppie-view1"></div>
              </div>
        </div>
        </div>
        <form action="bio.php" method="POST">
        <div class="form-group">
            <label for="bio"><span class="formlabel">Biography</span></label>
            <textarea class="form-control char-len" rows="3" name="bio" maxlength="55"></textarea>
            55 Maximum Characters
        </div>
        <input type="submit" value="Confirm Biography">
        </form>
        <h1 class="font-weight-bold">Account Settings</h1><br>
        <div class="row">
          <div class="col-12">
        <form action="ChangePass.php" method="POST">
          <input id="pw1" type="password" required name="changepassword" placeholder="New Password"><br>
            <input id="pw2" type="password" required placeholder="Confirm Password"><br>
          <input id="block"type="submit" value="Confirm Change Password">
        </form>
        <div id="match"></div>
        </div></div>
        <br>
        <div class="row">
            <div class="col-12">
                <h3>Delete Account</h3>
                <form action="del-acc.php" method="POST">
                    <input type="text" name="del-acc" id="del-acc" placeholder="Type CONFIRM to delete your account." required>
                    <input id="block1" type="submit" value="Confirm Delete Account">
                </form>
            </div>
        </div>
            </div>
    </div></div></div></div>
</html>
<script type="text/javascript">
        $('#EditProf').on('hidden.bs.modal', function () {
         location.reload();
        })
        var croppieDemo = $('#croppie-demo').croppie({
            enableOrientation: true,
            viewport: {
                width: 150,
                height: 150,
                type:'circle'
            },
            boundary: {
                width: 300,
                height: 300
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
                size: 'viewport'
            }).then(function (image) {
                var ext = $('#croppie-input').val().split('.').pop().toLowerCase();
                if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                alert('invalid extension!');
                }
                else{
                $.ajax({
                    url: "uploaddp.php",
                    type: "POST",
                    data: {
                        "image" : image
                    },
                    success: function (data) {
                        $("#croppie-view").html("Profile Picture updated successfully!");
                    }
                });
            }
            });
        });
        var croppieDemo1 = $('#croppie-demo1').croppie({
            enableOrientation: true,
            viewport: {
                width: 500,
                height: 125,
            },
            boundary: {
            }
        });

        $('#croppie-input1').on('change', function () { 
            var reader1 = new FileReader();
            reader1.onload = function (e) {
                croppieDemo1.croppie('bind', {
                    url: e.target.result
                });
            }
            reader1.readAsDataURL(this.files[0]);
        });

        $('.croppie-upload1').on('click', function (ev) {
            croppieDemo1.croppie('result', {
                type: 'canvas',
                size: {width:1000, height:250}
            }).then(function (image) {
                var ext1 = $('#croppie-input1').val().split('.').pop().toLowerCase();
                if($.inArray(ext1, ['gif','png','jpg','jpeg']) == -1) {
                alert('invalid extension!');
                }
                else{
                $.ajax({
                    url: "uploadbn.php",
                    type: "POST",
                    data: {
                        "image" : image
                    },
                    success: function (data) {
                        $("#croppie-view1").html("Profile Banner updated successfully!");
                    }
                });
            }
            });
        });
        $('#block').prop('disabled', true);
        $('#pw1, #pw2').on('keyup', function () {
        if ($('#pw1').val() == $('#pw2').val() && $('#pw1').val().length > 0){
                $('#match').html('Password matched').css('color', 'green');
                $('#block').prop('disabled', false);
        }
        else{
               $('#match').html('Not Matching').css('color', 'red');
                $('#block').prop('disabled', true);
       }})
       $('#block1').prop('disabled', true);
        $('#del-acc').on('keyup', function () {
        if ($('#del-acc').val() == "CONFIRM" && $('#del-acc').val().length > 0){
                $('#block1').prop('disabled', false);
        }
        else{
                $('#block1').prop('disabled', true);
       }})
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