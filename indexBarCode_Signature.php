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
        <!-- include the library -->
        <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
        <!-- Signature lib -->
        <script src="/form/libs/html2canvas.js"></script>

        <title>Form</title>

    </head>
    <body>
        <form id="formBarcode" method="GET" action="">
            <div><center><h2>Form</h2></center></div>
            <div id="qr-reader" class="qrReader"></div>
            <div>
                <center>
                    <input id="insertBarCodeData" type="submit" class="btn btn-info" value="Insert barcode data">
                </center>

                <center><h5 id="result"></h5></center>
            </div>
        </form>

        <div class="flex-row">
            <div class="wrapper">
                <div id="textSignature"><p>Signature inside the box...</p></div>
                <center><canvas id="signature-pad"></canvas></center>
            </div>
            <div>
                <center>
                    <button id="clear" type="button" class="btn btn-success">Clear board</button>
                    <button id="saveImgSig" type="button" class="btn btn-warning">Save/upload signature</button>
                    <button id="idFinishForm" onclick="finishForm()" disabled type="submit" class="btn btn-danger">Finish form</button>
                </center>
            </div>
            <center><h5 id="resultSig"></h5></center>
        </div>
    </body>
    <script type="text/javascript">
        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Code scanned = ${decodedText}`, decodedResult);
            $resultQrCode = decodedText;
            $url = 'insertBarCode.php?qrcodelink=' + $resultQrCode;
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);

        $("#formBarcode").on('submit',(function(e) {
            
            e.preventDefault();
            $.ajax({
                    url: $url,
                    type: 'GET',
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                    {
                        $("#result").html(data);
                    },
                    error: function(e) 
                    {
                        alert(e);
                    }          
            });
        }));
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.5/signature_pad.min.js" 
    integrity="sha512-kw/nRM/BMR2XGArXnOoxKOO5VBHLdITAW00aG8qK4zBzcLVZ4nzg7/oYCaoiwc8U9zrnsO9UHqpyljJ8+iqYiQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var canvas = document.getElementById("signature-pad");

        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
        }
        window.onresize = resizeCanvas;
        resizeCanvas();

        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(245,245,245)'
        });

        document.getElementById("clear").addEventListener('click', function() {
            signaturePad.clear();
        });

        document.getElementById("saveImgSig").addEventListener('click', function() {
            html2canvas(document.getElementById("signature-pad")).then(function (canvas){
                canvas.toDataURL("image/jpeg", 0.9);

                var ajax = new XMLHttpRequest();
                ajax.open("POST", "insertSignature.php", true);
                ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

                ajax.onreadystatechange = function() {
                    if(this.readyState==4 && this.status==200) {
                        $("#resultSig").html(this.responseText);
                        document.querySelector('#saveImgSig').disabled = true;
                        document.querySelector('#clear').disabled = true;
                        document.querySelector('#idFinishForm').disabled = false;
                    }
                };
            });
        });

        function finishForm() {
            window.location.href = "summaryPage.php";
        }
    </script>
</html>
