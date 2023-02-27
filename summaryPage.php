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
        <div><center><h2>Summary form</h2></center></div>
        
        <center><div id="summaryForm"></div></center>

        <!--<form id="formEmail" action="sendEmail.php" method="POST">

            <div id="customerNameDiv" class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div id="btnData">
                <center>
                <input id="sendEmail" type="submit" class="btn btn-warning" value="Send email">
                </center>
            </div>

            <div id="result"></div>
        </form>-->

        <form id="formEmail" method="GET" action="sendEmail.php">
            <div id="customerNameDiv" class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div id="btnData">
                <center>
                <input id="sendEmail" type="submit" class="btn btn-warning" value="Send email">
                </center>
            </div>

            <center><h5 id="result"></h5></center>
        </form>

        <center><button onclick="finishForm()" type="submit" class="btn btn-link">Insert other customer</button></center>
    </body>
    <script type="text/javascript">

        $.ajax({
            url: 'selectSummary.php',
            type: 'get', 
            success: function(res)
            {
                $("#summaryForm").html(res);
            }
        });

        function finishForm() {
            window.location.href = "index.php";
        }
    </script>
</html>
