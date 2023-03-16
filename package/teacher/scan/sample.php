<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document | Scanner</title>
    <meta charset='utf-8'>
    <script src="https://cdn.asprise.com/scannerjs/scanner.js" type="text/javascript"></script>

    <script>
        /** Initiates a scan */
        function scanToJpg() {
            scanner.scan(displayImagesOnPage,
                    {
                        "output_settings": [
                            {
                                "type": "return-base64",
                                "format": "jpg"
                            }
                        ]
                    }
            );
        }

        /** Processes the scan result */
        function displayImagesOnPage(successful, mesg, response) {
            if(!successful) { // On error
                console.error('Failed: ' + mesg);
                return;
            }

            if(successful && mesg != null && mesg.toLowerCase().indexOf('user cancel') >= 0) { // User cancelled.
                console.info('User cancelled');
                return;
            }

            var scannedImages = scanner.getScannedImages(response, true, false); // returns an array of ScannedImage
            for(var i = 0; (scannedImages instanceof Array) && i < scannedImages.length; i++) {
                var scannedImage = scannedImages[i];
                processScannedImage(scannedImage);
            }
        }

        /** Images scanned so far. */
        var imagesScanned = [];

        /** Processes a ScannedImage */
        function processScannedImage(scannedImage) {
            imagesScanned.push(scannedImage);
            var elementImg = scanner.createDomElementFromModel( {
                'name': 'img',
                'attributes': {
                    'class': 'scanned',
                    'src': scannedImage.src
                }
            });
            document.getElementById('images').appendChild(elementImg);
        }

        /** Upload scanned images by submitting the form */
        function submitFormWithScannedImages() {
            if (scanner.submitFormWithImages('form1', imagesScanned, function (xhr) {
                if (xhr.readyState == 4) { // 4: request finished and response is ready
                    document.getElementById('server_response').innerHTML = "<h2>Upload successfully... </h2>" + xhr.responseText;
                    document.getElementById('images').innerHTML = ''; 
                    imagesScanned = [];
					window.location.reload();
                }
            })) {
                document.getElementById('server_response').innerHTML = "Submitting, please stand by ...";
            } else {
                document.getElementById('server_response').innerHTML = "Form submission cancelled. Please scan first.";
            }
        }

    </script>

    <style>
        img.scanned {
            height: 200px; /** Sets the display size */
            margin-right: 12px;
        }

        div#images {
            margin-top: 20px;
        }
    </style>
</head>
<body>


<div class="small-box">
	<div class="container-fluid">
		<div class="card-header"><center><h2>Scan File</h2></center></div>

		<div class="row">
			<div class="col">
				<center>
					<div id="images"></div>
					<div id="server_response"></div>
				</center>
			</div>
			<div class="row m-2">
				<div class="col">
					<button class="btn btn-primary" type="button" onclick="scanToJpg();">Scan</button>
				</div>
				<div class="col">
					<form id="form1" action="scan/db_Scanner.php?action=dump" method="POST" enctype="multipart/form-data" target="_blank" >
						<input type="hidden" id="sample-field" name="sample-field" value="Test scan"/>
						<input class="btn btn-primary" type="button" value="Upload" onclick="submitFormWithScannedImages();">
					</form>
				</div>
			</div>
		</div>

	</div>
</div>
</body>
</html>