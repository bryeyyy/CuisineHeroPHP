	<?php
		$server = "localhost";
		$username = "root";
		$password = "";
		$dbname = "food";

		$con = mysqli_connect($server,$username,$password,$dbname);

		if(isset($_POST['btnSubmit'])){
		$ing=$_POST["txtIng"] ?? "";
		$sql=$con->query("SELECT * FROM food 
				LEFT OUTER JOIN veggies ON veggies.food_id = food.food_id
				LEFT OUTER JOIN meat ON meat.food_id = veggies.food_id
				LEFT OUTER JOIN condiments ON condiments.food_id = meat.food_id
				WHERE veggie_name = '$ing' OR meat_name = '$ing' OR condi_name = '$ing'
				ORDER BY food.food_id");
		
      	if($sql->num_rows > 0){
      	$prevFname = false; $prevID = false;
        	while($row=$sql->fetch_assoc()){	
        		$fID = $row["food_id"];
        		$fName = $row["food_name"];

            	if($prevFname == $fName || $prevID == $fID){
            		$fID = '';	$fName = '';}
            	else{
            		echo 'FOOD_ID = '.$fID.'
            		</br>Recipe:  '.$fName.'</br>';
            	}$prevFname = $row["food_name"];
            }
      	}
      	else{echo 'No recipe found with this ingredient!';}
	}
?>