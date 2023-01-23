<?php echo view('resources/links'); ?>
<?php echo view('resources/css'); ?>
<?php echo view('resources/header'); ?>

<!-- ///////////////////////////////////////////////////////////////////////////// -->
<style>
    body {
        font-family: helvetica;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .chat {
        width: 545px;
        border: solid 1px #EEE;
        display: flex;
        flex-direction: column;
        padding: 10px;
    }

    .messages {
        margin-top: 30px;
        display: flex;
        flex-direction: column;
    }

    .message {
        border-radius: 20px;
        padding: 8px 15px;
        margin-top: 5px;
        margin-bottom: 5px;
        display: inline-block;
    }

    .removeMargin {
        padding-top: -45px;
    }

    .yours {
        align-items: flex-start;
    }

    .yours .message {
        margin-right: 25%;
        background-color: lightslategrey;
        position: relative;
    }

    .yours .message.last:before {
        content: "";
        position: absolute;
        z-index: 0;
        bottom: 0;
        left: -7px;
        height: 20px;
        width: 20px;
        background: lightslategrey;
        border-bottom-right-radius: 15px;
    }

    .yours .message.last:after {
        content: "";
        position: absolute;
        z-index: 1;
        bottom: 0;
        left: -10px;
        width: 10px;
        height: 20px;
        background: white;
        border-bottom-right-radius: 10px;
    }

    .mine {
        align-items: flex-end;
    }

    .mine .message {
        color: white;
        margin-left: 25%;
        background: linear-gradient(to bottom, #00D0EA 0%, #0085D1 100%);
        background-attachment: fixed;
        position: relative;
    }

    .mine .message.last:before {
        content: "";
        position: absolute;
        z-index: 0;
        bottom: 0;
        right: -8px;
        height: 20px;
        width: 20px;
        background: linear-gradient(to bottom, #00D0EA 0%, #0085D1 100%);
        background-attachment: fixed;
        border-bottom-left-radius: 15px;
    }

    .mine .message.last:after {
        content: "";
        position: absolute;
        z-index: 1;
        bottom: 0;
        right: -10px;
        width: 10px;
        height: 20px;
        background: white;
        border-bottom-left-radius: 10px;
    }

    .smallFont {
        font-size: 10px;
    }
</style>

<!-- //////////////////////////////////////////////////////////////////////////////////////// -->
<div class="container page-title bg-white" style="margin-top: 40px;">
    <div class="">
        <div class="">
            <div class="">

                <h5 class=" mb-2  text-dark text-uppercase fonttype display-6 text-center">
                    Chat Room

                </h5>

            </div>
        </div>

    </div>
</div>

<div class="container ">
    <div class="card card-box mb-5 row">
        <div class="card-header text-dark">
            <div class="card-header--title">
                <div id="getPicPathFirst" style="cursor: pointer" onclick="adminDetails()">

                </div>

            </div>
            <div class="card-header--actions">

                <div class=" col-md-8 btn-group btn-group-sm">
                    <input type="search" class="formhovercolor form-control mr-2 py-0  " style="font-size: 0.7em;" placeholder="Search..." oninput="searchCards(this)">

                    <button type="button" class="btn btn-outline-secondary my-1 btnsizing" onclick="messageMo()"></button>

                </div>


            </div>

        </div>
        <div class=" container" style="height:80vh">
            <div class="row" style="height:80vh">
                <div class="col-sm-3" style="height:80vh; overflow-y: auto">
                    <ol id="usersDiv" class="list-group list-group-flush" style="margin-left:-12px;margin-right:-12px">



                    </ol>
                </div>
                <div id="noMessagesDiv" class="col-sm-6 row-fluid text-center" style="height:80vh; margin-top: 150px">
                    <div class="btn btn-lg btn-outline-primary mt-1 span2">
                        <i class="fas fa-comments fa-5x"></i>
                    </div>
                    <div class="span2">
                        <span class="text-dark fw-bold">No New Messages</span>
                    </div>
                </div>
                <div id="sentMessagesDiv" class="col-sm-6 row-fluid d-none" style="height:80vh">

                    <div id="specificMessagesDiv" class="chat span2" style="height:70vh; overflow-y: auto">
                        <!-- <div class="mine messages">
                            <div class="message last">
                                <h6>
                                    <div class="text-white smallFont removeMargin float-right mt-2 ml-2">10:30</div>Dude
                                </h6>

                            </div>

                        </div>
                        <div class="mine messages">
                            <div class="message last">
                                <h6>
                                    <div class="text-white smallFont removeMargin float-right mt-2 ml-2">10:30</div>Dude
                                </h6>

                            </div>

                        </div>
                        <div class="mine messages">
                            <div class="message last">
                                <h6>
                                    <div class="text-white smallFont removeMargin float-right mt-2 ml-2">10:30</div>Dude
                                </h6>

                            </div>

                        </div>
                        <div class="yours messages">
                            <div class="message">
                                <h6>
                                    <div class="text-white smallFont removeMargin float-right mt-2 ml-2">10:30</div>hey
                                </h6>
                            </div>
                            <div class="message">
                                <h6>
                                    <div class="text-white smallFont removeMargin float-right mt-2 ml-2">10:30</div>you there
                                </h6>
                            </div>
                            <div class="message last">
                                <h6>
                                    <div class="text-white smallFont removeMargin float-right mt-2 ml-2">10:30</div>hey hows it going
                                </h6>
                            </div>
                        </div>
                        <div class="mine messages">
                            <div class="message">
                                <h6>
                                    <div class="text-white smallFont removeMargin float-right mt-2 ml-2">10:30</div>great thanks
                                </h6>
                            </div>
                            <div class="message last">
                                <h6>
                                    <div class="text-white smallFont removeMargin float-right mt-2 ml-2">10:30</div>What about you
                                </h6>
                            </div>
                        </div> -->
                    </div>

                    <form id="messageForm" class="span2 row" autocomplete="off">
                        <div class="col-md-10" style="padding-top: 5px;padding-right: 5px">
                            <textarea title="Shift+Enter for send" style="max-height: 50px;" id="messageBox" type="text" name="message" class="form-control" placeholder="Your message....."></textarea>
                        </div>
                        <div class="col-md-2">
                            <button id="sendMessageBtn" type="button" onclick="sendMessage();" class="btn btn-lg btn-outline-primary mt-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Post">
                                <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>

                </div>
                <div class="col-sm-3" style="height:80vh; overflow-y: auto">
                    <!-- this is for single user -->
                    <div id="singleUserDiv" class="mt-4 d-none" style="margin-left:-12px;margin-right:-12px">
                        <div id="getPicPath" class="profileImages">

                        </div>

                        <div class="form-group col-md-12 mt-3 text-center">
                            <label class="form-label lead mark" for="edit_title">Full Name:</label><label><i class="fa fa-pencil-square-o ml-3 text-dark editIcons d-none"></i></label>
                            <input type="text" readonly required maxlength="20" class="form-control text-center" name="fullname" id="fullname">
                        </div>

                        <div class="form-group col-md-12 mt-3 text-center">
                            <label class="form-label lead mark" for="edit_title">Username:</label><label><i class="fa fa-pencil-square-o ml-3 text-dark editIcons d-none"></i></label>
                            <input type="number" readonly required maxlength="20" class="form-control text-center" name="staffnumber" id="staffnumber">
                        </div>

                        <div class="form-group col-md-12 mt-3 text-center">
                            <label class="form-label lead mark" for="edit_title">Occupation:</label><label><i class="fa fa-pencil-square-o ml-3 text-dark editIcons d-none"></i></label>
                            <input type="text" readonly required maxlength="20" class="form-control text-center" name="occupation" id="occupation">
                        </div>
                    </div>

                    <!-- this is for groups -->
                    <!-- <div class="mt-4" style="margin-left:-12px;margin-right:-12px">
                        <div class="profileImages">
                            <img src="<?php echo base_url(); ?>/assets/img/spider.jpg" alt="">
                        </div>

                        <div class="form-group col-md-12 mt-3 text-center">
                            <label class="form-label lead mark" for="edit_title">Group Name:</label><label><i class="fa fa-pencil-square-o ml-3 text-dark editIcons d-none"></i></label>
                            <input type="text" required maxlength="20" class="form-control text-center" name="title" id="edit_title">
                        </div>
                        <div class="form-group col-md-12  text-center">
                            <h6 class="form-label mark text-dark">participants:</h6>
                            <h6><i class="fa fa-pencil-square-o ml-3 text-dark editIcons d-none"></i></h6>
                        </div>
                        <ol class="list-group" style="max-height: 178px;overflow-y:auto">
                            <li class="list-group-item ">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="<?php echo base_url(); ?>/assets/img/spider.jpg" class="rounded-circle" width="40px" height="40px" alt="" style="margin-top:1px" />
                                    </div>
                                    <div class="col-md-10">
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Subheading</div>

                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <small>0890066687</small>

                                        </div>
                                    </div>
                                </div>

                            </li>
                      
                            
                        </ol>
                    </div> -->
                </div>

            </div>
        </div>


    </div>
    <script src="https://cdn.socket.io/4.5.4/socket.io.min.js" integrity="sha384-/KNQL8Nu5gCHLqwqfQjA689Hhoqgi2S84SNUxC3roTe4EhJ9AfLkp8QiQcU8AMzI" crossorigin="anonymous"></script>

    <script>
        const socket = io("http://localhost:3000");
        socket.on("message", (message, sender) => {
            saveMessageToDb(message, sender);

        });



        $(document).ready(function() {

            socket.disconnect();
            socket.connect();


            var userID = <?php $session = session();
                            $staff = $session->get('staff');
                            echo $staff->staffNumber; ?>;

            socket.emit('connected', userID);

            personalDetails();

        });


        function saveMessageToDb(message, sender) {
            var reciever = <?php $session = session();
                            $staff = $session->get('staff');
                            echo $staff->staffNumber; ?>;
            $.ajax({
                url: '<?php echo base_url('public/chat/create'); ?>',

                type: "post",
                data: {
                    message: message,
                    sender: sender,
                    reciever: reciever
                },
                // processData: false,
                // timeout: 0,
                // contentType: false,
                // cache: false,
                // async: false,
                success: function(data) {

                    if (data.error == false) {
                        // alert(message + sender);
                        if ($('#specificMessagesDiv').is(':visible')) {
                            displayYourMessage(message)
                        }
                    } else {

                        Swal.fire({
                            icon: 'warning',
                            title: 'Something went wrong',
                            text: data.message,
                        })

                    }

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);

                    data = JSON.parse(XMLHttpRequest.responseText);
                    var text = '';
                    var person = data.messages;
                    for (x in person) {
                        text += person[x];
                    }

                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: text,
                    })

                }
            });
        }

        function displayMessage(message) {

            mine = '<div class="mine messages"><div class="message last"><h6><div class="text-white smallFont removeMargin float-right mt-2 ml-2">10: 30 </div>' + message + '</h6></div></div>';

            $('#specificMessagesDiv').append(mine);
            $('#sentMessagesDiv').removeClass('d-none');
        }

        function displayYourMessage(message) {

            yours = '<div class="yours messages"><div class="message last"><h6><div class="text-white smallFont removeMargin float-right mt-2 ml-2">10: 30 </div>' + message + '</h6></div></div>';

            $('#specificMessagesDiv').append(yours);
            $('#sentMessagesDiv').removeClass('d-none');
        }

        function sendMessage() {
            var sender = <?php $session = session();
                            $staff = $session->get('staff');
                            echo $staff->staffNumber; ?>;
            var message = $('#messageBox').val();
            var event = $('#sendMessageBtn').data("staffnumber");
            socket.emit('sendEvent', event, message, sender);
            displayMessage(message);



        }





        function adminDetails() {
            $('#singleUserDiv').removeClass('d-none');
            $('#sentMessagesDiv').addClass('d-none');
            $('#noMessagesDiv').removeClass('d-none');

        }

        function showChats(staffnumber) {

            $('#sentMessagesDiv').removeClass('d-none');
            $('#noMessagesDiv').addClass('d-none');
            $('#singleUserDiv').addClass('d-none');

            loadChats(staffnumber);

        }

        function personalDetails() {

            $.ajax({
                url: '<?php echo base_url('public/chat/fetchAllUsers'); ?>',

                processData: false,

                timeout: 0,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {

                    if (data.error == false) {

                        // $('#fullname').val("");
                        // $('#phonenumber').val("");
                        // $('#occupation').val("");
                        // // $('#getPicPath').html('');
                        // // $('#getPicPathFirst').html('');

                        // $('#fullname').val(data.data.fullname);
                        // $('#staffnumber').val(data.data.staffnumber);
                        // var username = data.data.staffnumber;
                        // $('#occupation').val(data.data.role);

                        // $('#getPicPathFirst').html('<img src="<?php echo base_url(); ?>/assets/uploads/staff/' + data.data.imagename + '" class="rounded-circle" width="40px" height="40px" alt="" style="margin-top:1px">');

                        // $('#getPicPath').html('<img src="<?php echo base_url(); ?>/assets/uploads/staff/' + data.data.imagename + '" >');
                        $('#usersDiv').html("");
                        $('#usersDiv').html(data.data);

                    } else {

                        Swal.fire({
                            icon: 'info',
                            title: 'Update',
                            text: data.message,
                        })
                        $('#specificMessagesDiv').show();
                    }

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);

                    data = JSON.parse(XMLHttpRequest.responseText);
                    var text = '';
                    var person = data.messages;
                    for (x in person) {
                        text += person[x];
                    }

                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: text,
                    })

                }
            });
        }

        function loadChats(staffnumber) {

            $.ajax({
                url: '<?php echo base_url('public/chat/index?reciever='); ?>' + staffnumber,

                processData: false,

                timeout: 0,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {

                    if (data.error == false) {
                        if (data.data) {

                            $('#specificMessagesDiv').html("");
                            $('#specificMessagesDiv').html(data.data);
                            $('#sendMessageBtn').data("staffnumber", staffnumber);
                        }

                    } else {

                        // Swal.fire({
                        //     icon: 'info',
                        //     title: 'Update',
                        //     text: data.message,
                        // })
                        $('#sendMessageBtn').data("staffnumber", staffnumber);
                        $('#specificMessagesDiv').html("");
                        // $('#noMessagesDiv').html();
                        $('#specificMessagesDiv').show();

                    }

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);

                    data = JSON.parse(XMLHttpRequest.responseText);
                    var text = '';
                    var person = data.messages;
                    for (x in person) {
                        text += person[x];
                    }

                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: text,
                    })

                }
            });
        }
    </script>