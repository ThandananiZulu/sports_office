<script>
    function validateEmail(mail) {
        var emailVal = mail.value;
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailVal)) {
            return (true)
        }
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: "You have entered an invalid email address",
        });
        return (false)
    }

    function validateCell(phone) {
        var fn = phone.value;

        var fnum = fn.substring(0, 1);

        if (fnum != 0) {

            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: "Phone number sholud start with Zero",
            });

            $(phone).val('');

        }

        var a = "0000000000";
        var b = "1111111111";
        var c = "3333333333";
        var d = "4444444444";
        var e = "5555555555";
        var f = "6666666666";
        var g = "7777777777";
        var h = "8888888888";
        var i = "9999999999";
        var j = "2222222222";
        if (fn.length < 10) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: "Phone Number is too short",
            });
            $(phone).val('');

        } else
        if (fn == a || fn == b || fn == c || fn == d || fn == e || fn == f || fn == g || fn == h || fn == i || fn == j) {

            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: "Phone Number badly formatted",
            })
            $(phone).val('');

        }
    }

    function pic_format(identifier) {
        var file = document.getElementById(identifier);

        file.onchange = function(e) {
            const fileSize = this.files[0].size / 1024 / 1024; // in MiB
            if (fileSize > 2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "File size exceeded 2 mb",
                });
                this.value = '';

            } else {
                var ext = this.value.match(/\.([^\.]+)$/)[1];
                switch (ext) {
                    case 'jpg':
                    case 'jpeg':
                    case 'JPG':
                    case 'JPEG':
                    case 'png':
                    case 'PNG':
                        // aleert{}
                        break;
                    default:
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: "Incorrect file format",
                        });
                        this.value = '';
                }
            }
        };
    }
</script>