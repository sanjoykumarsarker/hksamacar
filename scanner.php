<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scanner.js demo: Scan to Local Disk</title>
    <meta charset='utf-8'>
    <script src="https://asprise.azureedge.net/scannerjs/scanner.js" type="text/javascript"></script>

    <script>
        //
        // Please read scanner.js developer's guide at: http://asprise.com/document-scan-upload-image-browser/ie-chrome-firefox-scanner-docs.html
        //

        /** Initiates a scan */
        function scanToLocalDisk() {
            scanner.scan(displayResponseOnPage,
                {
                    "output_settings": [
                        {
                            "type": "save",
                            "format": "pdf",
                            "save_path": "${TMP}\\${TMS}${EXT}"
                        }
                    ]
                }
            );
        }

        function displayResponseOnPage(successful, mesg, response) {
            if(!successful) { // On error
                document.getElementById('response').innerHTML = 'Failed: ' + mesg;
                return;
            }

            if(successful && mesg != null && mesg.toLowerCase().indexOf('user cancel') >= 0) { // User cancelled.
                document.getElementById('response').innerHTML = 'User cancelled';
                return;
            }

            document.getElementById('response').innerHTML = scanner.getSaveResponse(response);
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

    <h2>Scanner.js: Scan to Local Disk</h2>

    <button type="button" onclick="scanToLocalDisk();">Scan</button>

    <div id="response"></div>

    <!-- HELP_LINKS_START help links at the bottom -->
    <style>
        .asprise-footer, .asprise-footer a:visited { font-family: Arial, Helvetica, sans-serif; color: #999; font-size: 13px; }
        .asprise-footer a {  text-decoration: none; color: #999; }
        .asprise-footer a:hover {  padding-bottom: 2px; border-bottom: solid 1px #9cd; color: #06c; }
    </style>
    <div class="asprise-footer" style="margin-top: 48px;">
        <a href="http://asprise.com/document-scan-upload-image-browser/direct-to-server-php-asp.net-overview.html" target="_blank" title="Opens in new tab">Scanner.js Homepage</a> |
        <a href="http://asprise.com/scan/scannerjs/docs/html/scannerjs-javascript-guide.html" target="_blank" title="Opens in new tab">Developer's Guide to ScannerJs</a> |
    <script src="//asprise.azureedge.net/scannerjs/scanner.js" type="text/javascript"></script>
    </div>
    <!-- HELP_LINKS_END -->
</body>
</html>