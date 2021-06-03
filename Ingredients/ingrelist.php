<html>
<body>
<?php 
$server = "localhost";
$username = "root";
$password = "";
$dbname = "food";

$con = mysqli_connect($server,$username,$password,$dbname);
$queryf = "SELECT * FROM food WHERE food_id = 1";
$querym = "SELECT * FROM meat WHERE food_id = 1";
$queryv = "SELECT * FROM veggies WHERE food_id = 1";
$queryc = "SELECT * FROM condiments WHERE food_id = 1";

$_SESSION['food_id']=1;

if ($result = $con->query($queryf)){ //Food Name
        $row = mysqli_fetch_array($result);
        echo '<div class="col-12 col-md-5 foodImg">';
        echo "<img id='foodImg'src='images/".$row['food_img']."'>";
        echo'
        </div>
        <div class="col-12 col-md-6 adjust">
        <div class="container-fluid">
        <h1 class="col-12 col-md-6 Recipe-Name">';
        $result = $con->query($queryf);
        $row = $result->fetch_assoc();
        $foodname = $row["food_name"];
        echo $foodname;
        $result = $con->query($queryf);
        $row = mysqli_fetch_assoc($result);
        echo '</h1><h6 class="col-12 col-md-6">'.$row['likes'].' Like(s)</h6>
        <div class="col-12 Indention-Ing">
        Preparation Time: <span>wala pa</span>
        </div>
        <div class="col-12 Indention-Ing">
        Cooking Time: <span>wala pa</span>
        </div>
        <div class="col-12 Indention-Ing">
        Total Time: <span>wala pa</span>
        </div>
        <div class="col-12 Indention-Ing">
        Servings: <span>wala pa</span>
        </div>
        <h2 class="col-12 Ingredient-Title">
        Ingredients
        </h2>';

if ($result = $con->query($querym)){
    echo '<h4 class="col-12 Indention-Ing">Meats:</h4>';
    while($row = $result->fetch_assoc()) {
      $meatname = $row["meat_name"];
      $meatamt = $row["meat_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$meatname.' '.$meatamt.' kg
      </div>';
    }
  }



if($result = $con->query($queryv)){
  echo '<h4 class="col-12 Indention-Ing">Vegetables:</h4>';
    while($row = $result->fetch_assoc()) {
      $vegname = $row["veggie_name"];
      $vegamt = $row["veggie_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$vegname.' '.$vegamt.' kg
      </div>';
    }
}
if($result = $con->query($queryc)){
  echo '<h4 class="col-12 Indention-Ing">Condiments:</h4>';
    while($row = $result->fetch_assoc()) {
      $condiname = $row["condi_name"];
      $condiamt = $row["condi_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$condiname.' '.$condiamt.' tbsp
      </div>';
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
  <div class="row">
  <div class="col-1 d-none d-md-block"></div>
  <div class="col-md-5 col-12">';
  $result = $con->query($queryf);
  $row = $result->fetch_assoc();
  $vid_link = $row["video_link"];
  echo $vid_link;
  echo '</div><div class="col-lg-12 col-12 col-xl-6"><h2 class="Ingredient-Title">You might also like...</h2>
        <div class="container-fluid">
        <div class="row">';
  echo '<div class="col-3 card">
        <div class="card-body">Content</div>
        <div class="card-footer">Footer</div>
        </div>';//Dito ung suggested recipes
}
?>
</body>
</html>