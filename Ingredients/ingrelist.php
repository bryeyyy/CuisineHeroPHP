
<?php 
$server = "localhost";
$username = "root";
$password = "";
$dbname = "food";
$food_id = isset($_SESSION['food_id'])? $_SESSION['food_id'] : null;

$con = mysqli_connect($server,$username,$password,$dbname);
$queryf = "SELECT * FROM food WHERE food_id = '$food_id'";
$querym = "SELECT * FROM meat WHERE food_id = '$food_id'";
$queryv = "SELECT * FROM veggies WHERE food_id = '$food_id'";
$queryc = "SELECT * FROM condiments WHERE food_id = '$food_id'";

if ($result = $con->query($queryf)){ //Food Name
        $row = mysqli_fetch_array($result);
        echo '<div class="col-12 col-md-6 foodImg">';
        echo "<img id='foodImg'src='images/".$row['food_img']."'>";
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
  if($result->fetch_assoc() !== null)
    echo '<h4 class="col-12 Indention-Ing">Meats:</h4>';
    $result = $con->query($querym);
    while($row = $result->fetch_assoc()) {
      $meatname = $row["meat_name"];
      $meatamt = $row["meat_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$meatname.' '.$meatamt.' kg
      </div>';
    }
  }



if($result = $con->query($queryv)){
  if($result->fetch_assoc() !== null)
  echo '<h4 class="col-12 Indention-Ing">Vegetables:</h4>';
  $result = $con->query($queryv);
    while($row = $result->fetch_assoc()) {
      $vegname = $row["veggie_name"];
      $vegamt = $row["veggie_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$vegname.' '.$vegamt.' kg
      </div>';
    }
}
if($result = $con->query($queryc)){
  if($result->fetch_assoc() !== null)
  echo '<h4 class="col-12 Indention-Ing">Condiments:</h4>';
  $result = $con->query($queryc);
    while($row = $result->fetch_assoc()) {
      $condiname = $row["condi_name"];
      $condiamt = $row["condi_amt"];
      echo '<div class="col-12 Indention-Ing">
      - '.$condiname.' '.$condiamt.' tbsp
      </div>';
    }
  }
if($result = $con->query($queryf)){
while($row = $result->fetch_assoc()){
  $procedure = $row["proced"];
  $nutri_info = $row["nutri_info"];
  $vid_link = $row["video_link"];
  echo '<h2 class="col-12 Ingredient-Title">
        Procedures
        </h2><div class="col-12 Indention-Ing">
  - '.$procedure.'</div>';
  if($nutri_info!== null){
  echo '<h2 class="col-12 Ingredient-Title">
        Nutritional Information
        </h2><div class="col-12 Indention-Ing">
  - '.$nutri_info.'</div>';
  }
  echo '</div></div></div>
  <div class="container-fluid">
  <div class="row">
  <div class="col-1 d-none d-md-block"></div>';
  if(isset($vid_link))
  echo '<div class="col-md-6 col-12">'.$vid_link.'';
}
}
  echo '</div><div class="col-12 col-lg-5"><h2 class="Ingredient-Title">You might also like...</h2>
        <div class="container-fluid">
        <div class="row">';
  echo '<div class="col-12 col-md-3 card">
        <div class="card-body">Content</div>
        <div class="card-footer">Footer</div>
        </div></div></div></div></div></div>';//Dito ung suggested recipes
}
?>