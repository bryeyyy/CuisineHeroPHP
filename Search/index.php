<?php
	if (isset($_POST['search'])) {
		$response = "<ul><li>No data found!</li></ul>";

		$connection = new mysqli('localhost', 'root', '', 'food');
		$q = $connection->real_escape_string($_POST['q']);

		$sql = $connection->query("SELECT * FROM ingredients_all
				WHERE ing_name LIKE '%$q%'");

		if ($sql->num_rows > 0) {
			$response = "<ul>";
			$prevIng = false;
			while ($data = $sql->fetch_assoc()){
				$ingName = $data['ing_name'];
				if($prevIng == $ingName){$ingName = ' ';}
            	else{$response .= "<li>" .$ingName. "</li>";}
            	$prevIng = $data['ing_name'];
			}
			$response .= "</ul>";
		}


		exit($response);
	}
?>
<html>
    <head>
        <title>CuisineHero| Search</title>
        <style type="text/css">
            ul {
                float: left;
                list-style: none;
                padding: 0px;
                border: 1px solid black;
                margin-top: 0px;
            }

            input, ul {
                width: 250px;
            }

            li:hover {
                color: silver;
                background: #0088cc;
            }
        </style>
    </head>
    <body>
    	<form action="search1.php" method="post">
    		<input type="text" name ="txtIng" placeholder="Search ingredients..." id="searchBox" autocomplete="off"><input type="submit" name="btnSubmit" value="Submit">
    		<div id="response"></div>
    	</form>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#searchBox").keyup(function () {
                    var query = $("#searchBox").val();

                    if (query.length > 0) {
                        $.ajax(
                            {
                                url: 'index.php',
                                method: 'POST',
                                data: {
                                    search: 1,
                                    q: query
                                },
                                success: function (data) {
                                    $("#response").html(data);
                                },
                                dataType: 'text'
                            }
                        );
                    }
                });

                $(document).on('click', 'li', function () {
                    var ingr = $(this).text();
                    $("#searchBox").val(ingr);
                    $("#response").html("");
                });
            });
        </script>
    </body>
</html>