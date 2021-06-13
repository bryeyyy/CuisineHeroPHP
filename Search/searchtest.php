	<?php
include '../DB/cred.php';

		$con = mysqli_connect($server,$username,$password,$dbname);
		if(isset($_POST['ingArray'])){
		$ingsArray=$_POST["ingArray"];
		$ing = array_merge(...$ingsArray);
		$ings = "'".implode("','", $ing)."'";
		//echo $ings;
		$sql=$con->query("SELECT * FROM food 
				LEFT OUTER JOIN veggies ON veggies.food_id = food.food_id
				LEFT OUTER JOIN meat ON meat.food_id = veggies.food_id
				LEFT OUTER JOIN condiments ON condiments.food_id = meat.food_id
				HAVING veggie_name IN ($ings) OR meat_name IN ($ings) OR condi_name IN ($ings)"); 
		

      	if($sql->num_rows > 0){
      	$prevID = false;
        	while($row=$sql->fetch_assoc()){	
        		$fID = $row["food_id"];
        		$fAuthor = $row["author"];
        		$fName = $row["food_name"];

            	if($prevID == $fID){
            		$fID = '';}
            	else{
					$queryname = "SELECT * FROM acc WHERE email='$fAuthor'";
					$result2 = $con->query($queryname);
					while ($row2 = $result2->fetch_array()){
					$firstname= $row2['firstname'];
					$lastname = $row2['lastname'];
					}
					echo '
					<div class="card">
					<a href="javascript:void(0)" class="link" var="'.$row['food_id'].'">
					<div class="imgcontainer">
						<img src="../Ingredients/Images/'.$row['food_img'].'">
					</div>
							<div class="card-body texts">
									<h3 class="card-title font-weight-bold">'.$row['food_name'].'</h3>
									<p class="card-text">'.$firstname.' '.$lastname.'</p>
									<p class="card-text">'.substr($row['regdate'],0,16).'</p> 
							</div>  
							</a>
					</div>
					<form method="post" action="../Profile/ingr-transfer.php"name="redirect" class="redirect">
					<input type="hidden" class="post" name="post" value="">
					<input type="submit" style="display: none;">
					</form>';
            	}$prevID = $row["food_id"];
            }
      	}
      	else{echo '<div class="text-center" style="position:relative; width:max-content; height:max-content; top:50px; left:150px;">
				<img style="width:auto; height:250px;" src="https://media.giphy.com/media/e1BaXMrzPgNjOgDXwG/giphy.gif">
				<p style="font-size:30px;"> No Recipes Found :( </p>
			</div>';}
		  echo'<script>
		  $(".link").click(function() {
		  var link = $(this).attr("var");
		  $(".post").attr("value",link);
		  $(".redirect").submit();
		  });
		  </script>';
	}
?>