<?php echo view('resources/links'); ?>
<?php echo view('resources/css'); ?>
<?php echo view('resources/header');
echo view('partial/validations_js'); ?>

<div class="container page-title bg-white" style="margin-top: 40px;">
    <div class="">
        <div class="">
            <div class="">

                <h5 class=" mb-2  text-dark text-uppercase fonttype display-6 text-center">
                    Noticeboard

                </h5>

            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="card card-box mb-5">
        <div class="card-header text-dark">
            <div class="card-header--title">

                <div class="dropdown ">
                    <button class="btn btn-outline-secondary dropdown-toggle my-2 hovers" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-filter text-muted "></i> Filter
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" onclick="callPagination(3)">Show 3 posts per page</a>
                        <a class="dropdown-item" href="#" onclick="callPagination(6)">Show 6 posts per page</a>

                    </div>
                </div>
            </div>
            <div class="card-header--actions">

                <div class=" col-md-8 btn-group btn-group-sm">
                    <input type="search" class="formhovercolor form-control mr-2 py-0  " style="font-size: 0.7em;" placeholder="Search..." oninput="searchCards(this)">

                    <button class="btn btn-outline-secondary my-1 btnsizing"><i class="fas fa-search fa-md "> </i></button>

                </div>
                <a href="#" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#add_notice">

                    <i class="fas fa-plus"> </i> Add Notice
                </a>

            </div>

        </div>
        <div class="table-responsive">
            <table id="table_" class="table table-hover mb-3 mt-2">
                <thead>
                    <tr>

                    </tr>
                </thead>
                <tbody>
                    <td id="noticesFound" class="border-0 text-center .loadingText">Loading...</td>
                </tbody>
                <tfoot class="thead-light">
                    <tr>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


</div>
<div id="cardsDiv" class="containers">
    <div id="innerCardsDiv" class="card-contents" style="display:none">

    </div>
    <div class="_pagination">

    </div>
</div>
<!-- notice add -->
<div class="modal fade in" id="add_notice" role="dialog" tabindex="-1" aria-labelledby="add_notice" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark ">
                <span>Add New Notice</span>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">



                <div class="tab-content p-3 pb-0">
                    <div class="tab-pane active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="accordion mb-5" id="accordionExample1">
                            <div class="card card-box">


                                <div id="collapseOne1B" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample1">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <form id="noticeForm" onsubmit="add_notice(this);return false;" autocomplete="off">
                                                <div class="form-row">

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label>The Title:</label>
                                                        <input type="text" required maxlength="20" class="form-control" name="title" id="title">
                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label>Full Description</label>
                                                        <textarea required maxlength="100" class="form-control" id="description" name="description"></textarea>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label>1st Image</label>
                                                        <input type="file" class="form-control" name="firstImage" id="notice_img1" onblur=" pic_format('notice_img1')">

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red"></small>
                                                        <label>2nd Image<label class="text-muted ml-4">(Optional)</label></label>
                                                        <input type="file" class="form-control" name="secondImage" id="notice_img2" disabled onblur="pic_format('notice_img2')">

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red"></small>
                                                        <label>3rd Image<label class="text-muted ml-4">(Optional)</label></label>
                                                        <input type="file" class="form-control" name="thirdImage" id="notice_img3" disabled onblur="pic_format('notice_img3')">

                                                    </div>

                                                    <div class="form-group col-md-12 ">
                                                        <button type="submit" class="btn btn-primary ml-auto mt-5">Save</button>
                                                    </div>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>





                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade in" id="edit_notice" role="dialog" tabindex="-1" aria-labelledby="edit_notice" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>


                <div class=" mt-1 ">

                    <div id="collapseOne1B" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample1">
                        <div class="card-body">

                            <form id="noticeForm" onsubmit="edit_notice(this);return false;" autocomplete="off">
                                <input type="hidden" name="noticeID" id="noticeID" />
                                <div class="container">
                                    <div class="row">
                                        <div class=" col-xs-12 col-sm-12 col-md-6 col-lg-6 justify-content-center">

                                            <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
                                                <div class="carousel-indicators bg-secondary m-auto w-25">
                                                    <button id="firstIndicator" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active d-none" aria-current="true" aria-label="Slide 1"></button>
                                                    <button id="secondIndicator" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="d-none" aria-label="Slide 2"></button>
                                                    <button id="thirdIndicator" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="d-none" aria-label="Slide 3"></button>
                                                </div>
                                                <div id="wholeCarousel" class="carousel-inner">
                                                    <div id="firstCaouselImg" class="carousel-item active">
                                                    </div>
                                                    <div id="secondCaouselImg" class="carousel-item">
                                                    </div>
                                                    <div id="thirdCaouselImg" class="carousel-item">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                    <div class="bg-secondary  mb-3 ml-3 mr-4">
                                                        <span class="carousel-control-prev-icon mt-4 mb-3" aria-hidden="true"></span>
                                                    </div>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                    <div class="bg-secondary  mb-3 ml-3 mr-4">
                                                        <span class="carousel-control-next-icon mt-4 mb-3" aria-hidden="true"></span>
                                                    </div>
                                                    <span class="visually-hidden">Next</span>

                                                </button>
                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 d-flex aligns-items-center">
                                            <div class="" style="max-height: 400px;overflow-y:auto">

                                                <div class="form-group col-md-12">
                                                    <label class="form-label lead mark" for="edit_title">Title</label><label><i class="fa fa-pencil-square-o ml-3 text-dark editIcons d-none"></i></label>
                                                    <input type="text" required maxlength="20" class="form-control" name="title" id="edit_title">
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="edit_description" class="form-label lead mark">Description</label><label><i class="fa fa-pencil-square-o ml-3 text-dark editIcons d-none"></i></label>
                                                    <textarea required maxlength="100" class="form-control" id="edit_description" name="description" rows="4" cols="45"></textarea>
                                                </div>

                                                <div class="form-group col-md-12 editImages d-none">
                                                    <small style="color:red"></small>
                                                    <label class="form-label lead mark" for="inputEmail4">1st Image</label><label><i class="fa fa-pencil-square-o ml-3 text-dark editIcons d-none"></i></label>
                                                    <input type="file" class="form-control" name="firstImage" id="edit_firstImage" onblur="pic_format('edit_profilePhoto')" oninput="firstPic.src=window.URL.createObjectURL(this.files[0])">
                                                    <!-- <input type="hidden" name="filesid" id="filesid"> -->
                                                    <!-- <label class="mt-4" id="firstImageName">No image</label> -->
                                                    <div id="firstImagePath"></div>

                                                </div>

                                                <div class="form-group col-md-12 editImages d-none">
                                                    <small style="color:red"></small>
                                                    <label class="form-label lead mark" for="inputEmail4">2nd Image</label><label><i class="fa fa-pencil-square-o ml-3 text-dark editIcons d-none"></i></label>
                                                    <input type="file" class="form-control" name="secondImage" id="edit_secondImage" onblur="pic_format('edit_profilePhoto')" oninput="secondPic.src=window.URL.createObjectURL(this.files[0])">
                                                    <!-- <input type="hidden" name="filesid" id="filesid"> -->
                                                    <!-- <label class="mt-4" id="secondImageName">No image</label> -->
                                                    <div id="secondImagePath"></div>
                                                </div>

                                                <div class="form-group col-md-12 editImages d-none">
                                                    <small style="color:red"></small>
                                                    <label class="form-label lead mark" for="inputEmail4">3rd Image</label><label><i class="fa fa-pencil-square-o ml-3 text-dark editIcons d-none"></i></label>
                                                    <input type="file" class="form-control" name="thirdImage" id="edit_thirdImage" onblur="pic_format('edit_profilePhoto')" oninput="thirdPic.src=window.URL.createObjectURL(this.files[0])">
                                                    <!-- <input type="hidden" name="filesid" id="filesid"> -->
                                                    <!-- <label class="mt-4" id="thirdImageName">No image</label> -->
                                                    <div id="thirdImagePath"></div>
                                                </div>

                                                <div id="insideBtnsDiv" class="form-group col-md-12 ">
                                                    <button type="submit" class="btn btn-outline-success ml-auto mt-5 d-none">Update</button>
                                                    <button type="button" class="btn btn-outline-danger ml-auto mt-5 float-right" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Post" onclick="delete_notice(this)"> <i class="fa fa-trash"></i></button>
                                                    <button type="button" class="btn btn-outline-primary ml-auto mt-5 float-right mr-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Post" onclick="toggleEditInputs(this)"> <i class="fa fa-pencil-square-o"></i></button>
                                                </div>

                                            </div>
                                            <div id="outsideBtnsDiv" class="form-group col-md-11 position-absolute d-none" style="margin-top: 360px">
                                                <button type="submit" class="btn btn-outline-success ml-auto mt-5 ">Update</button>
                                                <button type="button" class="btn btn-outline-danger ml-auto mt-5 float-right" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Post" onclick="delete_notice(this)"> <i class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-outline-primary ml-auto mt-5 float-right mr-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Post" onclick="toggleEditInputs(this)"> <i class="fa fa-pencil-square-o"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                                        <div class="col-md-12">
                                                            Bottom Panel
                                                        </div>
                                                    </div> -->
                                </div>
                            </form>

                        </div>
                    </div>


                </div>

            </div>
            <!-- <div class="modal-footer">
            </div> -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#cardsDiv')[0].click();
        load_noticeboard();

        $('#notice_img1').change(function() {
            var file = document.getElementById('notice_img1');
            if (file.files.length == 0) {
                $('#notice_img2').prop("disabled", true).val("");
                $('#notice_img3').prop("disabled", true).val("");
            } else {
                $('#notice_img2').prop("disabled", false);
                $('#notice_img3').prop("disabled", false);
            }
        });
        $('#notice_img2').change(function() {
            var file = document.getElementById('notice_img2');
            if (file.files.length == 0) {
                $('#notice_img3').prop("disabled", true).val("");
            } else {
                $('#notice_img3').prop("disabled", false);
            }
        });


    });

    function searchCards(obj) {
        $('#innerCardsDiv').html("");
        var searchCards = "";
        var cards = [];
        var value = obj.value;
        var count = 0;
        var posts = $('#noticeID').data("cardsObj");


        posts.forEach(post => {
            var modifiedAt = post.modifiedAt;
            var createdAt = post.createdAt;


            var isVisible = post.title.includes(value) || post.description.includes(value);
            if (isVisible) {
                count++;

                searchCards += ' <div class="cards" id="cardID_' + post.noticeID + '"  data-noticeID="' + post.noticeID +
                    '" data-description="' + post.description +
                    '" data-title="' + post.title +
                    '" data-firstImage="' + post.firstImage +
                    '" data-secondImage="' + post.secondImage +
                    '" data-thirdImage="' + post.thirdImage +
                    '" style="cursor: pointer" onclick="showDetailed(this)"><div class ="card-images"><img class="card-img-top" src="<?php echo base_url() ?>/assets/uploads/noticeboard/' + post.firstImage +
                    '"alt = "Card image cap"> </div> <div class = " card-infos"><h3 class = ""> ' + post.title +
                    ' </h3> <p class = ""> ' + post.description +
                    ' </p>   <p class="card-text"><small class="text-muted">Last updated ' + timeString(modifiedAt, createdAt, '<?php echo date('Y-m-d H:i:s') ?>') + '</small></p></div></div>';
            }


        })
        $('#innerCardsDiv').html(searchCards);

        $('#noticesFound').html("<b>" + count + "</b> Posts Found ")
        if (count > 0) {
            callPagination();
        }

    }

    function timeString(modifiedAt, createdAt, phpDate) {
        var timestamp = modifiedAt ? modifiedAt : createdAt;
        var timestampYear = timestamp.substring(0, 4);
        var timestampMonth = timestamp.substring(5, 7);
        var timestampDay = timestamp.substring(8, 10);
        var timestampHour = timestamp.substring(11, 13);
        var timestampMin = timestamp.substring(14, 16);
        var timestampSec = timestamp.substring(17, 19);

        //php date Strings
        var Year = phpDate.substring(0, 4);
        var Month = phpDate.substring(5, 7);
        var Day = phpDate.substring(8, 10);
        var Hour = phpDate.substring(11, 13);
        var Min = phpDate.substring(14, 16);
        var Sec = phpDate.substring(17, 19);


        diffYear = (Year - timestampYear);
        diffMonth = (Month - timestampMonth);
        diffDay = (Day - timestampDay);

        diffHours = (Hour - timestampHour);
        diffMinutes = (Min - timestampMin);
        diffSeconds = (Sec - timestampSec);
        alert(timestamp + "time " + Year + "   " + Month + " " + Day + "  " + Hour + "   " + timestampMin + " " + timestampSec);

        timemsg = '';
        if (diffYear > 0) {
            timemsg = diffYear + ' year' + (diffYear > 1 ? "'s" : '');
        } else if (diffMonth > 0) {
            timemsg = diffMonth + ' month' + (diffMonth > 1 ? "'s" : '');
        } else if (diffDay > 0) {
            timemsg = diffDay + ' day' + (diffDay > 1 ? "'s" : '');
        } else if (diffHours > 0) {
            timemsg = diffHours + ' hour' + (diffHours > 1 ? "'s" : '');
        } else if (diffMinutes > 0) {
            timemsg = diffMinutes + ' minute' + (diffMinutes > 1 ? "'s" : '');
        } else if (diffSeconds > 0) {
            timemsg = diffSeconds + ' second' + (diffSeconds > 1 ? "'s" : '');
        }

        timemsg = timemsg + ' ago';
        return timemsg;
    }

    function toggleEditInputs() {
        $("#outsideBtnsDiv").toggleClass("d-none");
        $("#insideBtnsDiv").toggleClass("d-none");
        $(".editImages").toggleClass("d-none");
        $(".editIcons").toggleClass("d-none");
        if (!$(".editIcons").hasClass("d-none")) {
            $("#edit_title").focus();
            $('#edit_title').prop('readonly', false);
            $('#edit_description').prop('readonly', false);

        } else {
            $('#edit_title').val($('#edit_title').data("title"));
            $('#edit_description').val($('#edit_description').data("description"));
        }

    }

    function showDetailed(t) {
        $('#noticeID').val($(t).attr('data-noticeID'));
        $('#edit_title').data("title", $(t).attr('data-title'));
        $('#edit_description').data("description", $(t).attr('data-description'));
        $('#edit_firstImage').val("");
        $('#edit_secondImage').val("");
        $('#edit_thirdImage').val("");
        $('#firstImageName').html($(t).attr('data-firstImage'));
        $('#firstImagePath').html('<img id="firstPic" src = "<?php echo base_url(); ?>/assets/uploads/noticeboard/' + $(t).attr('data-firstImage') +
            '" width = "70px" height = "70px" onerror="this.onerror=null;this.src=\'<?php echo base_url(); ?>/assets/img/none.png \';">');

        $('#secondImageName').html($(t).attr('data-secondImage'));
        $('#secondImagePath').html('<img id="secondPic" src="<?php echo base_url(); ?>/assets/uploads/noticeboard/' + $(t).attr('data-secondImage') + '" width = "70px" height = "70px" onerror="this.onerror=null;this.src=\'<?php echo base_url(); ?>/assets/img/none.png \';">');

        $('#thirdImageName').html($(t).attr('data-thirdImage'));
        $('#thirdImagePath').html('<img id="thirdPic" src = "<?php echo base_url(); ?>/assets/uploads/noticeboard/' + $(t).attr('data-thirdImage') + '" width = "70px" height = "70px" onerror="this.onerror=null;this.src=\'<?php echo base_url(); ?>/assets/img/none.png \';">');

        $('#edit_title').val($(t).attr('data-title')).prop('readonly', true).css("background-color", 'white');
        $('#edit_description').val($(t).attr('data-description')).prop('readonly', true).css("background-color", 'white');

        $('#firstCaouselImg').html("");
        $('#secondCaouselImg').html("");
        $('#thirdCaouselImg').html("");

        $('#firstCaouselImg').addClass("active");
        $('#secondCaouselImg').removeClass('active');
        $('#thirdCaouselImg').removeClass('active');
        $('#firstIndicator').addClass('active');
        $('#secondIndicator').removeClass("active");
        $('#thirdIndicator').removeClass("active");
        $('#firstIndicator').addClass("d-none");
        $('#secondIndicator').addClass("d-none");
        $('#thirdIndicator').addClass("d-none");
        var carouselOne = '';
        var carouselTwo = '';
        var carouselThree = '';

        $('#carouselExampleIndicators').carousel('pause');

        if ($(t).attr('data-secondImage') != "" && $(t).attr('data-thirdImage') != "") {
            $('.carousel-control-prev').removeClass('d-none');
            $('.carousel-control-next').removeClass('d-none');
        } else {
            $('.carousel-control-prev').addClass('d-none');
            $('.carousel-control-next').addClass('d-none');
        }
        if ($(t).attr('data-firstImage') != "") {
            carouselOne = '<img src="<?php echo base_url(); ?>/assets/uploads/noticeboard/' + $(t).attr('data-firstImage') + '" width="500px" height="377px" class="d-block" alt="...">'
            $('#firstCaouselImg').html("");
            $('#firstCaouselImg').html(carouselOne);
            $('#firstIndicator').removeClass("d-none");
        }
        if ($(t).attr('data-secondImage') != "") {
            carouselTwo = '<img src="<?php echo base_url(); ?>/assets/uploads/noticeboard/' + $(t).attr('data-secondImage') + '" width="500px" height="377px" class="d-block" alt="...">'
            $('#secondCaouselImg').html("");
            $('#secondCaouselImg').html(carouselTwo);
            $('#secondIndicator').removeClass("d-none");
        }
        if ($(t).attr('data-thirdImage') != "") {
            carouselThree = '<img src="<?php echo base_url(); ?>/assets/uploads/noticeboard/' + $(t).attr('data-thirdImage') + '" width="500px" height="377px" class="d-block" alt="...">'
            $('#thirdCaouselImg').html("");
            $('#thirdCaouselImg').html(carouselThree);
            $('#thirdIndicator').removeClass("d-none");
        }
        $("#edit_notice").modal("show");

    }

    function load_noticeboard() {
        var cards = [];
        $.ajax({
            url: '<?php echo base_url('public/noticeboard/index'); ?>',

            processData: false,

            timeout: 0,
            contentType: false,
            cache: false,
            async: false,
            success: function(data) {

                if (data.error == false) {
                    cards = data.info.map(card => {
                        return {
                            notice: "cardID_" + card.noticeID,
                            title: card.title,
                            description: card.description,
                            noticeID: card.noticeID,
                            firstImage: card.firstImage,
                            secondImage: card.secondImage,
                            thirdImage: card.thirdImage,
                            modifiedAt: card.modifiedAt,
                            createdAt: card.createdAt

                        }
                    })
                    $('#noticeID').data("cardsObj", cards);
                    if (Number(data.recordsTotal) > 0) {

                        $('#noticesFound').html("");
                        $('#noticesFound').html("<b>" + data.recordsTotal + "</b> Posts Found ")
                    } else {
                        $('#noticesFound').html("");
                        $('#noticesFound').html(" No Posts Found ")

                    }

                    if (data.data) {

                        $('#innerCardsDiv').html("");
                        $('#innerCardsDiv').html(data.data)
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

    function add_notice(form) {


        $.ajax({
            url: '<?php echo base_url('public/noticeboard/create'); ?>',
            type: "post",
            data: new FormData(form),
            processData: false,

            timeout: 0,
            contentType: false,
            cache: false,
            async: false,
            success: function(data) {

                if (data.error == false) {



                    setTimeout(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Save successful',
                            text: data.message,
                        }).then(function() {
                            location.reload();
                        })
                    }, 300);

                    // $("#noticeForm").trigger("reset");
                    // load_noticeboard();
                    // callPagination();

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

    function edit_notice(form) {


        $.ajax({
            url: '<?php echo base_url('public/noticeboard/update'); ?>',
            type: "post",
            data: new FormData(form),
            processData: false,

            timeout: 0,
            contentType: false,
            cache: false,
            async: false,
            success: function(data) {

                if (data.error == false) {

                    setTimeout(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Update successful',
                            text: data.message,
                        }).then(function() {
                            location.reload();
                        });

                    }, 300);

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

    function delete_notice() {


        $.ajax({
            url: '<?php echo base_url('public/noticeboard/delete'); ?>',
            type: "post",
            data: {
                noticeID: $('#noticeID').val()
            },

            timeout: 0,

            cache: false,
            async: false,
            success: function(data) {

                if (data.error == false) {



                    setTimeout(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted successfully',
                            text: data.message,
                        }).then(function() {
                            $('#edit_notice').modal('hide');
                        });;

                    }, 300);
                    setTimeout(function() {

                    }, 500);
                    load_noticeboard();
                    callPagination();
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

    function getPageList(totalPages, page, maxLength) {
        function range(start, end) {
            return Array.from(Array(end - start + 1), (_, i) => i + start);
        }
        var sideWidth = maxLength < 9 ? 1 : 2;
        var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
        var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;

        if (totalPages <= maxLength) {
            return range(1, totalPages);
        }

        if (page <= maxLength - sideWidth - 1 - rightWidth) {
            return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
        }

        if (page >= totalPages - sideWidth - 1 - rightWidth) {
            return range(1, sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages))
        }
        return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages - sideWidth + 1, totalPages));
    }
    $(function() {
        var numberOfItems = $('.card-contents .cards').length;
        var limitPerPage = 3;
        var totalPages = Math.ceil(numberOfItems / limitPerPage);
        var paginationSize = 7;
        var currentPage;

        function showPage(whichPage) {
            if (whichPage < 1 || whichPage > totalPages) return false;

            currentPage = whichPage;

            $('.card-contents .cards').hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();

            $('._pagination li').slice(1, -1).remove();

            getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                $("<li>").addClass("_page-item").addClass(item ? "_current-page" : "_dots").toggleClass("_active", item === currentPage).append($("<a>").addClass("_page-link")
                    .attr({
                        href: "javascript:void(0)"
                    }).text(item || "...")).insertBefore("._next-page");
            });

            $("._previous-page").toggleClass("_disable", currentPage === 1);
            $("._next-page").toggleClass("_disable", currentPage === totalPages);
            return true;
        }

        $("._pagination").append(
            $("<li>").addClass("_page-item").addClass("_previous-page").append($("<a>").addClass("._page-link").attr({
                href: "javascript:void(0)"
            }).text("Previous")),

            $("<li>").addClass("_page-item").addClass("_next-page").append($("<a>").addClass("._page-link").attr({
                href: "javascript:void(0)"
            }).text("Next")),
        );

        $(".card-contents").show();
        showPage(1);

        $(document).on('click', "._pagination li._current-page:not(._active)", function() {
            return showPage(+$(this).text());
        })
        $("._next-page").on('click', function() {
            return showPage(currentPage + 1);
        })
        $("._previous-page").on('click', function() {
            return showPage(currentPage - 1);
        })
    })

    function callPagination(limit = 3) {
        event.preventDefault();
        var numberOfItems = $('.card-contents .cards').length;
        var limitPerPage = limit;
        var totalPages = Math.ceil(numberOfItems / limitPerPage);
        var paginationSize = 7;
        var currentPage;

        function showPage(whichPage) {
            if (whichPage < 1 || whichPage > totalPages) return false;

            currentPage = whichPage;

            $('.card-contents .cards').hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();

            $('._pagination li').slice(1, -1).remove();

            getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                $("<li>").addClass("_page-item").addClass(item ? "_current-page" : "_dots").toggleClass("_active", item === currentPage).append($("<a>").addClass("_page-link")
                    .attr({
                        href: "javascript:void(0)"
                    }).text(item || "...")).insertBefore("._next-page");
            });

            $("._previous-page").toggleClass("_disable", currentPage === 1);
            $("._next-page").toggleClass("_disable", currentPage === totalPages);
            return true;
        }

        $("._pagination").append(
            $("<li>").addClass("_page-item").addClass("_previous-page").append($("<a>").addClass("._page-link").attr({
                href: "javascript:void(0)"
            }).text("Previous")),

            $("<li>").addClass("_page-item").addClass("_next-page").append($("<a>").addClass("._page-link").attr({
                href: "javascript:void(0)"
            }).text("Next")),
        );

        $(".card-contents").show();
        showPage(1);

        $(document).on('click', "._pagination li._current-page:not(._active)", function() {
            return showPage(+$(this).text());
        })
        $("._next-page").on('click', function() {
            return showPage(currentPage + 1);
        })
        $("._previous-page").on('click', function() {
            return showPage(currentPage - 1);
        })
    }
</script>