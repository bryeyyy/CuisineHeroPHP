<?php
	if (isset($_POST['search'])) {
		$response = "<ul>No data found!</ul>";

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
        <title>Searching - Ing</title>
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

            .column {
             float: left;
             width: 50%;
             padding: 10px;
            }

            .row:after {
            content: "";
            display: table;
            clear: both;
            }
        </style>
    </head>
    <body>
    <div class="row">
        <div class="column">
    	<!--<form action="search.php" method="post">-->
    		<input type="text" name ="txtIng" placeholder="Search ingredients..." id="searchBox" autocomplete="off">
    		<div id="response" style="position: absolute; background-color:white;"></div>
        </div>

        <div class="column">
            <table id="myIngs" border=1>
                <tr><th>My ingredients</th></tr>
            </table>
            <p></p>
             <input type="submit" id="btnRec" value="Submit">
        </div>
        <div id="list"></div>
        <!--</form>-->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#searchBox").keyup(function () {
                    var query = $("#searchBox").val();

                    if (query.length > 0) {
                        $.ajax(
                            {
                                url: 'indextest.php',
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
                    else{
                        $("#response").html("");
                    }
                });
                $(document).on('click', 'li', function () {
                    var recipe = $(this).text();
                    $('#myIngs').append('<tr><td>'+recipe+'</td></tr>');
                });

                $("#btnRec").click(function(){
                    var ingArray = [];
                    $("table#myIngs tr").each(function() {
                        var rowArray = [];
                        var tableData = $(this).find('td');
                        if (tableData.length > 0) {
                            tableData.each(function() { rowArray.push($(this).text()); });
                            ingArray.push(rowArray); 
                        }
                    });
                    $.ajax({ 
                        url: "searchtest.php", 
                        type: "POST", 
                        data: { 'ingArray' : ingArray}, 
                        success: function(data) {   
                                $("#list").html(data);
                            } 
                    });
                }); 
            });
        </script>
    </body>
</html>

