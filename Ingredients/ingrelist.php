<html>
<body>
<?php 
include '../DB/cred.php';
$food_id = isset($_SESSION['food_id'])? $_SESSION['food_id'] : null;

$con = mysqli_connect($server,$username,$password,$dbname);
$queryf = "SELECT * FROM food WHERE food_id = '$food_id'";
$querym = "SELECT * FROM meat WHERE food_id = '$food_id'";
$queryv = "SELECT * FROM veggies WHERE food_id = '$food_id'";
$queryc = "SELECT * FROM condi WHERE food_id = '$food_id'";
$queryfh = "SELECT * FROM fish WHERE food_id = '$food_id'";
$queryo = "SELECT * FROM oil WHERE food_id = '$food_id'";
$queryft = "SELECT * FROM fruit WHERE food_id = '$food_id'";
$queryss = "SELECT * FROM spice WHERE food_id = '$food_id'";
$queryd = "SELECT * FROM dairy WHERE food_id = '$food_id'";
$queryds = "SELECT * FROM dessert WHERE food_id = '$food_id'";
$querysc = "SELECT * FROM soup WHERE food_id = '$food_id'";
$queryn = "SELECT * FROM nuts WHERE food_id = '$food_id'";
$queryb = "SELECT * FROM bake WHERE food_id = '$food_id'";

if ($result = $con->query($queryf)){ //Food Name
        $row = mysqli_fetch_array($result);
        echo '<div class="col-12 col-md-6 foodImg">';
        $queryImg = "SELECT * FROM recipe_images WHERE food_id='$food_id'";
        $resultImg = $con->query($queryImg);
        $rowImg = $resultImg -> fetch_assoc();
        echo "<img id='foodImg'src='images/".$rowImg['food_img']."'>";
        echo'
        </div>
        <div class="col-12 col-md-5 adjust">
        <div class="container-fluid">
        <div class="row">
        <h1 class="col-12 col-md-6 Recipe-Name">';
        $result = $con->query($queryf);
        $row = $result->fetch_assoc();
        $foodname = $row["food_name"];
        echo $foodname;
        $result = $con->query($queryf);
        while($row = mysqli_fetch_assoc($result)){
        echo '</h1><h6 class="col-12">'.$row['likes'].' Like(s)</h6>
        <div class="col-12 Indention-Ing">
        Preparation Time: <span>'.$row['prep_time'].'</span>
        </div>
        <div class="col-12 Indention-Ing">
        Cooking Time: <span>'.$row['cook_time'].'</span>
        </div>
        <div class="col-12 Indention-Ing">
        Servings: <span>'.$row['servings'].'</span>
        </div>
        <h2 class="col-12 Ingredient-Title">
        Ingredients
        </h2>';
        }

if ($result = $con->query($querym)){

    $row=$result->fetch_assoc();
    $check = $row['meat_name'];
      if(strlen($check)>0){
    echo '<h4 class="col-12 Indention-Ing">Meats:</h4>';
    $result = $con->query($querym);
    while($row = $result->fetch_assoc()) {
      $meatname = $row["meat_name"];
      $meatamt = $row["meat_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$meatname.' '.$meatamt.'
      </div>';
    }
  }

}
if ($result = $con->query($queryfh)){
    $row=$result->fetch_assoc();
    $check = $row['fish_name'];
      if(strlen($check)>0){
    echo '<h4 class="col-12 Indention-Ing">Fish/Seafood:</h4>';
    $result = $con->query($queryfh);
    while($row = $result->fetch_assoc()) {
      $meatname = $row["fish_name"];
      $meatamt = $row["fish_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$meatname.' '.$meatamt.'
      </div>';
    }
  }
}
if ($result = $con->query($queryo)){
    $row=$result->fetch_assoc();
    $check = $row['oil_name'];
      if(strlen($check)>0){
    echo '<h4 class="col-12 Indention-Ing">Oil/Liquid:</h4>';
    $result = $con->query($queryo);
    while($row = $result->fetch_assoc()) {
      $meatname = $row["oil_name"];
      $meatamt = $row["oil_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$meatname.' '.$meatamt.'
      </div>';
    }
  }
}


if($result = $con->query($queryv)){
    $row=$result->fetch_assoc();
    $check = $row['veggies_name'];
      if(strlen($check)>0){
  echo '<h4 class="col-12 Indention-Ing">Vegetables:</h4>';
  $result = $con->query($queryv);
    while($row = $result->fetch_assoc()) {
      $vegname = $row["veggies_name"];
      $vegamt = $row["veggies_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$vegname.' '.$vegamt.'
      </div>';
    }
  }
}
if ($result = $con->query($queryft)){
    $row=$result->fetch_assoc();
    $check = $row['fruit_name'];
      if(strlen($check)>0){
    echo '<h4 class="col-12 Indention-Ing">Fruits:</h4>';
    $result = $con->query($queryft);
    while($row = $result->fetch_assoc()) {
      $meatname = $row["fruit_name"];
      $meatamt = $row["fruit_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$meatname.' '.$meatamt.'
      </div>';
    }
  }
}
if ($result = $con->query($queryss)){
    $row=$result->fetch_assoc();
    $check = $row['spice_name'];
      if(strlen($check)>0){
    echo '<h4 class="col-12 Indention-Ing">Spices/Seasonings/Sweeteners:</h4>';
    $result = $con->query($queryss);
    while($row = $result->fetch_assoc()) {
      $meatname = $row["spice_name"];
      $meatamt = $row["spice_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$meatname.' '.$meatamt.'
      </div>';
    }
  }
}
if ($result = $con->query($queryd)){
  $row=$result->fetch_assoc();
  $check = $row['dairy_name'];
    if(strlen($check)>0){
    echo '<h4 class="col-12 Indention-Ing">Dairy:</h4>';
    $result = $con->query($queryd);
    while($row = $result->fetch_assoc()) {
      $meatname = $row["dairy_name"];
      $meatamt = $row["dairy_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$meatname.' '.$meatamt.'
      </div>';
    }
  }
}
if($result = $con->query($queryc)){
  $row=$result->fetch_assoc();
  $check = $row['condi_name'];
    if(strlen($check)>0){
  echo '<h4 class="col-12 Indention-Ing">Condiments:</h4>';
  $result = $con->query($queryc);
    while($row = $result->fetch_assoc()) {
      $condiname = $row["condi_name"];
      $condiamt = $row["condi_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$condiname.' '.$condiamt.'
      </div>';
    }
}
  }
  if ($result = $con->query($querysc)){
    $row=$result->fetch_assoc();
    $check = $row['soup_name'];
      if(strlen($check)>0){
      echo '<h4 class="col-12 Indention-Ing">Soup/Sauces:</h4>';
      $result = $con->query($querysc);
      while($row = $result->fetch_assoc()) {
        $meatname = $row["soup_name"];
        $meatamt = $row["soup_amt"];
        echo '<div class="col-12 Indention-Ing">
        - '.$meatname.' '.$meatamt.'
        </div>';
      }
    }
  }
  if ($result = $con->query($queryds)){
    $row=$result->fetch_assoc();
    $check = $row['dessert_name'];
      if(strlen($check)>0){
      echo '<h4 class="col-12 Indention-Ing">Dessert/Snacks:</h4>';
      $result = $con->query($queryds);
      while($row = $result->fetch_assoc()) {
        $meatname = $row["dessert_name"];
        $meatamt = $row["dessert_amt"];
        echo '<div class="col-12 Indention-Ing">
        - '.$meatname.' '.$meatamt.'
        </div>';
      }
    }
  }
  if ($result = $con->query($queryn)){
    $row=$result->fetch_assoc();
    $check = $row['nuts_name'];
      if(strlen($check)>0){
      echo '<h4 class="col-12 Indention-Ing">Nuts/Legumes:</h4>';
      $result = $con->query($queryn);
      while($row = $result->fetch_assoc()) {
        $meatname = $row["nuts_name"];
        $meatamt = $row["nuts_amt"];
        echo '<div class="col-12 Indention-Ing">
        - '.$meatname.' '.$meatamt.'
        </div>';
      }
    }
  }
  if ($result = $con->query($queryb)){
    $row=$result->fetch_assoc();
    $check = $row['bake_name'];
      if(strlen($check)>0){
      echo '<h4 class="col-12 Indention-Ing">Baking & Grains:</h4>';
      $result = $con->query($queryb);
      while($row = $result->fetch_assoc()) {
        $meatname = $row["bake_name"];
        $meatamt = $row["bake_amt"];
        echo '<div class="col-12 Indention-Ing">
        - '.$meatname.' '.$meatamt.'
        </div>';
      }
    }
  }
  
  echo '<h2 class="col-12 Ingredient-Title">
        Procedures
        </h2>';
  $result = $con->query($queryf);
  $row = $result->fetch_assoc();
  $procedure = $row["proced"];
  echo '<div class="col-12 Indention-Ing">
  - '.$procedure.'
  </div>';
  echo '<h2 class="col-12 Ingredient-Title">
        Nutritional Information
        </h2>';
  $result = $con->query($queryf);
  $row = $result->fetch_assoc();
  $nutri_info = $row["nutri_info"];
  echo '<div class="col-12 Indention-Ing">
  - '.$nutri_info.'
  </div>';
  echo '</div></div></div>
  <div class="container-fluid spacing">
  <div class="row">
  <div class="col-1 d-none d-md-block"></div>
  <div class="col-md-6 col-12">';
  $result = $con->query($queryf);
  $row = $result->fetch_assoc();
  $vid_link = $row["video_link"];
  echo $vid_link;
  echo '</div><div class="col-12 col-lg-5"><h2 class="Ingredient-Title">You might also like...</h2>
        <div class="container-fluid">
        <div class="row">';
  echo '<div class="col-12 col-md-3 card">
        <div class="card-body">Content</div>
        <div class="card-footer">Footer</div>
        </div></div></div></div></div></div>';//Dito ung suggested recipes
}
?>
</body>
</html>