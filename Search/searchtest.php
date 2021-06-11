	<?php
		$server = "localhost";
		$username = "root";
		$password = "";
		$dbname = "food";

		$con = mysqli_connect($server,$username,$password,$dbname);

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
            		echo '</br>Recipe:  '.$fName.' by <b>'.$fAuthor.'</b></br>';
            	}$prevID = $row["food_id"];
            }
      	}
      	else{echo 'No recipe found with this ingredient!';}
?>