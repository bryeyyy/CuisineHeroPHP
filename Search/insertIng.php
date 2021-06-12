<?php
		$server = "localhost";
		$username = "root";
		$password = "";
		$dbname = "food";

		$con = mysqli_connect($server,$username,$password,$dbname);
 //FAKE UNG MULTI INSERT :V
        ,('Tomatoes')
        ,('Salt')
        ,('Pepper')
        ,('Paprika')
        ,('Soy Sauce')
        ,('Fish Sauce')
        ,('Vinegar')
        ,('Dried Basil')
        ,('Garlic')
        ,('Onion')
        ,('Ginger')
        ,('Pepper')
        ,('Pork')
        ,('Beef')
        ,('Chicken')
        ,('Tofu')
        ,('Shrimp')";
        mysqli_multi_query($con, $sq);
          $con->close();

?>