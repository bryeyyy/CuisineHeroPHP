<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
	</head>
	<body>
    <div class="container">
        <h2>Croppie</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <div id="croppie-demo"></div>
              </div>
              <div class="col-md-4" id="croppie-container">
                <strong>Select Image:</strong>
                <br/>
                <input type="file" id="croppie-input">
                <br/>
                <button class="btn btn-success croppie-upload">Upload Image</button>
              </div>
              <div class="col-md-4" style="">
                <div id="croppie-view"></div>
              </div>
        </div>
    </div>
    <script type="text/javascript">
        var croppieDemo = $('#croppie-demo').croppie({
            enableOrientation: true,
            viewport: {
                width: 1000,
                height: 250,
            },
            boundary: {
                width: 1300,
                height: 400
            }
        });

        $('#croppie-input').on('change', function () { 
            var reader = new FileReader();
            reader.onload = function (e) {
                croppieDemo.croppie('bind', {
                    url: e.target.result
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.croppie-upload').on('click', function (ev) {
            croppieDemo.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (image) {
                $.ajax({
                    url: "uploadbn.php",
                    type: "POST",
                    data: {
                        "image" : image
                    },
                    success: function (data) {
                        html = '<img src="' + image + '" />';
                        $("#croppie-view").html(html);
                    }
                });
            });
        });
    </script>
</body>
</html>