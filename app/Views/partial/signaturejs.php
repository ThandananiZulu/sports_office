<!-- Signature -->

<script>
    SignaturePad.prototype.toDataURLAndRemoveBlanks = function() {
        var canvas = this._ctx.canvas;
        // First duplicate the canvas to not alter the original
        var croppedCanvas = document.createElement('canvas'),
            croppedCtx = croppedCanvas.getContext('2d');

        croppedCanvas.width = canvas.width;
        croppedCanvas.height = canvas.height;
        croppedCtx.drawImage(canvas, 0, 0);

        // Next do the actual cropping
        var w = croppedCanvas.width,
            h = croppedCanvas.height,
            pix = {
                x: [],
                y: []
            },
            imageData = croppedCtx.getImageData(0, 0, croppedCanvas.width, croppedCanvas.height),
            x, y, index;

        for (y = 0; y < h; y++) {
            for (x = 0; x < w; x++) {
                index = (y * w + x) * 4;
                if (imageData.data[index + 3] > 0) {
                    pix.x.push(x);
                    pix.y.push(y);

                }
            }
        }
        pix.x.sort(function(a, b) {
            return a - b
        });
        pix.y.sort(function(a, b) {
            return a - b
        });
        var n = pix.x.length - 1;

        w = pix.x[n] - pix.x[0];
        h = pix.y[n] - pix.y[0];
        var cut = croppedCtx.getImageData(pix.x[0], pix.y[0], w, h);

        croppedCanvas.width = w;
        croppedCanvas.height = h;
        croppedCtx.putImageData(cut, 0, 0);

        return croppedCanvas.toDataURL();
    };


    var signaturePad1;
    var signaturePad2;
    var signaturePad3;
    var signaturePad4;

    function signaturePadChanged(position) {

        var input = document.getElementById('signatureInput' + position);
        var $signatureLabel = $('#signatureLabel' + position);
        $signatureLabel.removeClass('text-danger');

        if (signaturePad.isEmpty()) {
            $signatureLabel.addClass('text-danger');
            input.value = '';
            return false;
        }

        $('#signatureInput-error').remove();
        var partBase64 = signaturePad.toDataURLAndRemoveBlanks();
        partBase64 = partBase64.split(',')[1];
        input.value = partBase64;
    }




    $('#policy-sign-form').submit(function() {

        if ($('#signType' + position).val() == 1) {

        } else {
            signaturePadChanged(position, signaturePad);
        }
    });


    function openSignBtn(va, position) {

        var canvas = document.getElementById('signature' + position);
        var identityFormSubmit = document.getElementById('policy-sign-form' + position);

        signaturePad = new SignaturePad(canvas, {
            maxWidth: 2,
            onEnd: function() {
                signaturePadChanged(position);
            }
        });


        if (va == 1) {
            $('.digitalSign' + position).show();
            $('.mouseSign' + position).hide();
            $('#signType' + position).val(1);
            StartSign();
        } else {

            $('.digitalSign' + position).hide();
            $('.mouseSign' + position).show();
            $('.mouseSign' + position).css('border', '1px solid');
            $('#signType' + position).val(0);
        }


    }




    var imgWidth;
    var imgHeight;

    function StartSign() {
        var isInstalled = document.documentElement.getAttribute('SigPlusExtLiteExtension-installed');

        if (!isInstalled) {
            alert("SigPlusExtLite extension is either not installed or disabled. Please install or enable extension.");
            return;
        }

        var identityFormSubmit = document.getElementById('policy-sign-form');
        var canvasObj = document.getElementById('cnv');
        canvasObj.getContext('2d').clearRect(0, 0, canvasObj.width, canvasObj.height);

        identityFormSubmit.signature.value = "";
        imgWidth = canvasObj.width;
        imgHeight = canvasObj.height;
        var message = {
            "firstName": "",
            "lastName": "",
            "eMail": "",
            "location": "",
            "imageFormat": 1,
            "imageX": imgWidth,
            "imageY": imgHeight,
            "imageTransparency": false,
            "imageScaling": false,
            "maxUpScalePercent": 0.0,
            "rawDataFormat": "ENC",
            "minSigPoints": 25
        };

        top.document.addEventListener('SignResponse', SignResponse, false);
        var messageData = JSON.stringify(message);
        var element = document.createElement("MyExtensionDataElement");
        element.setAttribute("messageAttribute", messageData);
        document.documentElement.appendChild(element);
        var evt = document.createEvent("Events");
        evt.initEvent("SignStartEvent", true, false);


        element.dispatchEvent(evt);
    }

    function SignResponse(event) {
        var str = event.target.getAttribute("msgAttribute");
        var obj = JSON.parse(str);
        SetValues(obj, imgWidth, imgHeight);
    }

    function SetValues(objResponse, imageWidth, imageHeight) {
        var obj = null;
        if (typeof(objResponse) === 'string') {
            obj = JSON.parse(objResponse);
        } else {
            obj = JSON.parse(JSON.stringify(objResponse));
        }

        var ctx = document.getElementById('cnv').getContext('2d');

        if (obj.errorMsg != null && obj.errorMsg != "" && obj.errorMsg != "undefined") {
            alert(obj.errorMsg);
        } else {
            if (obj.isSigned) {
                var identityFormSubmit = document.getElementById('contract-sign-form');
                identityFormSubmit.signature.value += obj.imageData;
                var img = new Image();
                img.onload = function() {
                    ctx.drawImage(img, 0, 0, imageWidth, imageHeight);
                }
                img.src = "data:image/png;base64," + obj.imageData;
            }
        }
    }

    function ClearFormData(position) {
        //  var identityFormSubmit = document.getElementById('contract-sign-form');
        //      identityFormSubmit.signature.value = "";
        //      document.getElementById('SignBtn').disabled = false;

        signaturePad.clear();
        signaturePadChanged(position);
    }

    function new_signiture(type) {
        $('#new_signiture').modal();
    }
</script>