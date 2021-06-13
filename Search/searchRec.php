	<?php
include '../DB/cred.php';

		$con = mysqli_connect($server,$username,$password,$dbname);

		$rec=$_POST["txtRecipe"] ?? "";
		$sql=$con->query("SELECT * FROM food
				WHERE food_name = '$rec'
				ORDER BY food.food_id ");
		

      	if($sql->num_rows > 0){
      	$prevID = false;
        	while($row=$sql->fetch_assoc()){	
        		$fID = $row["food_id"];
        		$fName = $row["food_name"];
        		$fAuthor = $row["author"];
				$queryname = "SELECT * FROM acc WHERE email='$fAuthor'";
				$result2 = $con->query($queryname);
				while ($row2 = $result2->fetch_array()){
				$firstname= $row2['firstname'];
				$lastname = $row2['lastname'];
				}

            	//echo $fID.') Recipe:  '.$fName.' by <b>'.$fAuthor.'</b></br>';
				echo '
				<div class="card">
				<a href="javascript:void(0)" class="link" var="'.$fID.'">
				<div class="imgcontainer">';
				$queryImg = "SELECT * FROM recipe_images WHERE food_id='$fID'";
				$resultImg = $con->query($queryImg);
				$rowImg = $resultImg -> fetch_assoc();
				echo	'<img src="../Ingredients/Images/'.$rowImg['food_img'].'">
				</div>
						<div class="card-body texts">
								<h3 class="card-title font-weight-bold">'.$fName.'</h3>
								<p class="card-text">'.$firstname.' '.$lastname.'</p>
								<p class="card-text">'.substr($row['regdate'],0,16).'</p> 
						</div>  
						</a>
				</div>
				<form method="post" action="../Profile/ingr-transfer.php"name="redirect" class="redirect">
				<input type="hidden" class="post" name="post" value="">
				<input type="submit" style="display: none;">
				</form>';
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
?>