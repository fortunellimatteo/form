<!doctype html>
<html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link href="/form/stylesheet/style.css" rel="stylesheet" type="text/css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <title>Form</title>
    </head>
    <body>
        <div class="title"><center><h2>Form</h2></center></div>
        <form id="formData" action="" method="POST">
          <div id="customerNameDiv" class="form-group">
            <label id="labelName" for="customerName">Customer name</label>
            <input id="block" type="customerName" class="form-control" name="customerName" 
            required aria-describedby="usernameHelp" placeholder="Customer name...">
          </div>
          <div id="badgeNumberDiv" class="form-group">
            <label id="labelBadge" for="badgeNumber">Badge number</label>
            <input type="badgeNumber" class="form-control" id="block2" 
            name="badgeNumber" placeholder="Badge number..." required>
          </div>

          <div id="btnData">
            <center>
              <input id="insertData" type="submit" class="btn btn-warning" value="Insert data">
            </center>
          </div>
          <center><h5 id="resultData"></h5></center>
        </form>
        <form id="form" action="" method="POST" enctype="multipart/form-data" id="image_upload">
          <div>
            <input type="file" name="images[]" multiple class="custom-file-input" id="image" />
            <label id="attachPhotoDiv" class="custom-file-label" for="image">Select one image to store...</label>
          </div>

          <div>
            <center>
                <input id="upload" type="submit" class="btn btn-info" value="upload">
            </center>
          </div>
          <center><h5 id="result"></h5></center>
        </form>
        <div id="nextPage">
          <button onclick="nextPage()" id="btnNextPage" disabled
            type="submit" class="btn btn-primary">Next page
          </button>
        </div>
    </body>
    <script type="text/javascript">
      $(document).ready(function (e) {
        $("#image").on("change", function() {
					var filename = $(this).val();
					$(".custom-file-label").html(filename);
				});

        $("#form").on('submit',(function(e) {
          e.preventDefault();
          $.ajax({
                url: "insertImage.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                  {
                    $("#result").html(data);
                    document.querySelector('#upload').disabled = true;
                  },
                error: function(e) 
                  {
                    alert(e);
                  }          
          });
        }));

        $("#formData").on('submit',(function(e) {
          e.preventDefault();
          $.ajax({
                url: "insertData.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                  {
                    $("#resultData").html(data);
                    document.querySelector('#insertData').disabled = true;
                    document.querySelector('#btnNextPage').disabled = false;
                  },
                error: function(e) 
                  {
                    alert(e);
                  }          
          });
        }));
      });
      function nextPage() {
				window.location.href = "indexBarCode_Signature.php";
			}
    </script>
</html>
