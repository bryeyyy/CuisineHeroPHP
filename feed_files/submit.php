	<?php
	session_start();
		$server = "localhost";
		$username = "root";
		$password = "";
		$dbname = "food";
		$con = mysqli_connect($server,$username,$password,$dbname);
		
		$query1 = "SELECT MAX(food_id) AS 'food_id' FROM food";
		$sql1 = mysqli_query($con, $query1);
		$row2 = mysqli_fetch_assoc($sql1);
		$fID = intval($row2['food_id'])+1;

		$ingsArray=$_POST["ingArray"];
		$ing = array_merge(...$ingsArray);
		$ings = implode("','", $ing);

		$ingsAmt=$_POST["ingAmt"];
		$amt = array_merge(...$ingsAmt);
		$amts = implode("','", $amt);

		$categ=$_POST["categ"];

		/*$sql="SELECT * FROM food 
				LEFT OUTER JOIN veggies ON veggies.food_id = food.food_id
				LEFT OUTER JOIN meat ON meat.food_id = veggies.food_id
				LEFT OUTER JOIN condiments ON condiments.food_id = meat.food_id
				HAVING veggies_name IN ($ings) OR meat_name IN ($ings) OR condi_name IN ($ings)";*/

		$sql="INSERT INTO ".$categ."(".$categ."_name, ".$categ."_amt, food_id) 
                    VALUES ('$ings', '$amts', '$fID')";
		
		$result = mysqli_query($con,$sql);
      	/*if($sql->num_rows > 0){
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
      	else{echo 'No recipe found with this ingredient!';}*/
?>