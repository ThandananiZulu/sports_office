<?php echo view('resources/links'); ?>
<?php echo view('resources/css'); ?>
<?php echo view('resources/header'); ?>
<?php $sports = get_sports(); ?>

<div class="container page-title bg-white" style="margin-top: 40px;">
    <div class="">
        <div class="">
            <div class="">

                <h5 class=" mb-2  text-dark text-uppercase fonttype display-6 text-center">
                    Add Coach

                </h5>

            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="card card-box mb-5">
        <div class="card-header text-dark">
            <div class="card-header--title">
                <small>Coachs</small>
                <b>List</b>
            </div>
            <div class="card-header--actions">
                <a href="#" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#add_coach">

                    <i class="fas fa-plus"> </i> Add Coach
                </a>


            </div>

        </div>
        <div class="table-responsive">
            <table id="table_" class="table table-hover ">
                <thead>
                    <tr>
                        <th>Coach Number</th>

                        <th>Coach Name</th>

                        <th>Coach Surname</th>

                        <th>Sport Name</th>

                        <th>Coach Email</th>

                        <th>Coach Phone Number</th>

                        <th>Profile Photo</th>

                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot class="thead-light">
                    <tr>
                        <th>Coach Number</th>

                        <th>Coach Name</th>

                        <th>Coach Surname</th>

                        <th>Sport Name</th>

                        <th>Coach Email</th>

                        <th>Coach Phone Number</th>

                        <th>Profile Photo</th>

                        <th>Edit</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


</div>


<div class="modal fade in" id="add_coach" role="dialog" tabindex="-1" aria-labelledby="add_coach" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark ">
                <span>Add Coach</span>
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
                                            <form onsubmit="add_coach(this);return false;" autocomplete="off">
                                                <div class="form-row">

                                                    <div id="chooseDiv" class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Sport</label>
                                                        <select class="form-control" name="coachSport" onchange="">
                                                            <option value="" selected hidden>Select</option>
                                                            <?php if (isset($sports)) {
                                                                foreach ($sports as $r) { ?>
                                                                    <option value="<?php echo $r['sportID']; ?>"><?php echo $r['sportName']; ?></option>


                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Coach Number</label>
                                                        <input type="number" onKeyPress="if(this.value.length==8) return false;" autocomplete="off" name="coachNumber" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Coach Firstname</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="coachFirstname">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Coach Surname</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="coachSurname">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Gender</label>
                                                        <select class="form-control" name="coachGender" required>
                                                            <option value="" selected hidden>Select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Date Of Birth</label>
                                                        <input type="date" max="<?php echo date('Y-m-d', strtotime('-10 years')); ?>" required class="form-control" name="coachDob">
                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Address Or Residence</label>
                                                        <textarea required maxlength="100" class="form-control" name="coachAddress"></textarea>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail4">Email</label>
                                                        <input type="email" maxlength="100" class="form-control" name="coachEmail" onchange="validateEmail(this)">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Cellphone Number</label>
                                                        <input type="number" onKeyPress="if(this.value.length==10) return false;" required class="form-control" name="coachCell" id="coachCell" onchange="validateCell(this)">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red"></small>
                                                        <label for="inputEmail4">Profile Photo</label>
                                                        <input type="file" class="form-control" name="profilePhoto" id="profilePhoto" onblur="pic_format('profilePhoto')">
                                                    </div>


                                                    <div class="form-group col-md-12 ">
                                                        <button type="submit" id="submitBtn" class="btn btn-primary ml-auto">Save</button>
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

<!-- Edit coach -->

<div class="modal fade in" id="edit_coach" role="dialog" tabindex="-1" aria-labelledby="edit_coach" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark ">
                <span>Edit Coach</span>
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
                                            <form onsubmit="edit_coach(this);return false;" autocomplete="off">
                                                <div class="form-row">

                                                    <div id="chooseDiv" class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Sport</label>
                                                        <select class="form-control" id="edit_coachSport" name="coachSport">
                                                            <option value="" selected hidden>Select</option>
                                                            <?php if (isset($sports)) {
                                                                foreach ($sports as $r) { ?>
                                                                    <option value="<?php echo $r['sportID']; ?>"><?php echo $r['sportName']; ?></option>


                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Coach Number</label>
                                                        <input type="number" onKeyPress="if(this.value.length==8) return false;" autocomplete="off" name="coachNumber" class="form-control" id="edit_coachNumber">
                                                        <input type="hidden" id="coachID" name="coachID">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Coach Firstname</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="coachFirstname" id="edit_coachFirstname">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Coach Surname</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="coachSurname" id="edit_coachSurname">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Gender</label>
                                                        <select class="form-control" name="coachGender" id="edit_coachGender" required>
                                                            <option value="" selected hidden>Select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Date Of Birth</label>
                                                        <input type="date" max="<?php echo date('Y-m-d', strtotime('-10 years')); ?>" required class="form-control" name="coachDob" id="edit_coachDob">
                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Address Or Residence</label>
                                                        <textarea required maxlength="100" class="form-control" id="edit_coachAddress" name="coachAddress"></textarea>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail4">Email</label>
                                                        <input type="email" maxlength="100" class="form-control" name="coachEmail" id="edit_coachEmail" onchange="validateEmail(this)">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Cellphone Number</label>
                                                        <input type="number" onKeyPress="if(this.value.length==10) return false;" required class="form-control" name="coachCell" id="edit_coachCell" onchange="validateCell(this)">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red"></small>
                                                        <label for="inputEmail4">Profile Photo</label>
                                                        <input type="file" class="form-control" name="profilePhoto" id="edit_profilePhoto" onblur="pic_format('edit_profilePhoto')" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                                        <input type="hidden" name="filesid" id="filesid">
                                                        <label class="mt-4" id="getPicName">No image</label>
                                                        <div id="getPicPath"></div>

                                                    </div>


                                                    <div class="form-group col-md-12 ">
                                                        <button type="submit" id="submitBtnEdit" class="btn btn-primary ml-auto mt-5">Save</button>
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

<?php


echo view('resources/data_table_js');
echo view('partial/validations_js');
?>

<script>
    $(document).ready(function() {

        $('bnam').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        load_table();
        $(document).on("#edit_profilePhoto input", "input:file", function(e) {
            let fileName = e.target.files[0].name;
            $('#getPicName').html(fileName);
        });
    });

    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }

    function add_coach(form) {
        $('#submitBtn').attr('disabled', 'true');

        $.ajax({
            url: '<?php echo base_url('public/coach'); ?>',
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
                            title: 'Saved successful, continue',
                            text: data.message,
                        })
                    }, 300);
                    $('#submitBtn').removeAttr('disabled');

                    load_table();
                } else {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Could not add',
                        text: data.message,
                    })
                    $('#submitBtn').removeAttr('disabled');
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
                $('#submitBtn').removeAttr('disabled');
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: text,
                })

            }
        });

    }

    function edit_coach(form) {
        $('#submitBtnEdit').attr('disabled', 'true');

        $.ajax({
            url: '<?php echo base_url('public/coach/update'); ?>',
            type: "post",
            data: new FormData(form),
            processData: false,

            timeout: 0,
            contentType: false,
            cache: false,
            async: false,
            success: function(data) {
                console.log(data);
                if (data.error == false) {



                    // load_table();

                    setTimeout(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Saved successful, continue',
                            text: data.message,
                        })
                    }, 300);
                    $('#submitBtnEdit').removeAttr('disabled');

                    load_table();
                } else {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Could not add',
                        text: data.message,
                    })
                    $('#submitBtnEdit').removeAttr('disabled');
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
                $('#submitBtnEdit').removeAttr('disabled');
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: text,
                })

            }
        });

    }

    function view_coach(t) {

        $('#filesid').val($(t).attr('data-filesid'));
        $('#coachID').val($(t).attr('data-coachID'));
        $('#edit_coachSport').val($(t).attr('data-sportID'));
        $('#edit_coachFirstname').val($(t).attr('data-coachFirstname'));
        $('#edit_coachSurname').val($(t).attr('data-coachSurname'));
        $('#edit_coachNumber').val($(t).attr('data-coachNumber'));
        $('#edit_coachCell').val($(t).attr('data-coachCell'));
        $('#edit_coachGender').val($(t).attr('data-coachGender'));
        $('#edit_coachEmail').val($(t).attr('data-coachEmail'));
        $('#edit_coachAddress').val($(t).attr('data-coachAddress'));
        $('#edit_coachDob').val($(t).attr('data-coachDob'));
        $('#getPicName').html($(t).attr('data-picname'));
        $('#getPicPath').html('<img id="pic" src = "<?php echo base_url(); ?>/assets/uploads/coach/' + $(t).attr('data-picname') + '" width = "70px" height = "70px" >')
        $('#edit_coach').modal('show');
    }

    function load_table() {
        $('#table_').dataTable().fnClearTable();
        $('#table_').dataTable().fnDestroy();

        $('#table_').DataTable({

            "ajax": {

                "url": "<?php echo base_url("public/coach"); ?>",

            },
            'ordering': false,
            
            "columns": [{
                    'data': "coachNumber"
                },
                {
                    'data': "coachFirstname"
                },
                {
                    'data': "coachSurname"
                },
                {
                    'data': "sportName",

                },
                {
                    'data': "coachEmail"
                },
                {
                    'data': "coachCell"
                },

                {
                    "data": "picname",
                    render: function(data, type, row, meta) {

                        // $('[data-bs-toggle="popover"]').popover();
                        $('#pic_' + row['coachID']).popover({
                            placement: 'top',
                            trigger: 'hover',
                            html: true,
                            content: function() {
                                var result = "";

                                result += (('<div id="picDiv" class="media" style="pointer-events: none;"><img src="<?php echo base_url(); ?>/assets/uploads/coach/' + row['picname'] + '" width = "140px" height = "140px" class="mr-3" alt="No Image"><div class="media-body"></div></div>'));

                                return result;
                            }

                        });
                        var pic = ' <span id="pic_' + row['coachID'] + '" data-bs-toggle="popover"> <img src = "<?php echo base_url(); ?>/assets/uploads/coach/' + row['picname'] + '" width = "30px" height = "30px" onerror="this.onerror=null;this.src=\'<?php echo base_url(); ?>/assets/img/none.png \';"> ';

                        return pic;
                    }
                }, {
                    "data": "",
                    render: function(data, type, row, meta) {

                        var view = '<button onclick="view_coach(this)" data-coachID="' + row['coachID'] + '" data-sportID="' + row['sportID'] + '"  data-coachFirstname="' + row['coachFirstname'] + '"  data-coachSurname="' + row['coachSurname'] + '"  data-coachNumber="' + row['coachNumber'] + '"  data-coachCell="' + row['coachCell'] + '"  data-coachGender="' + row['coachGender'] + '"  data-coachEmail="' + row['coachEmail'] + '" data-coachAddress="' + row['coachAddress'] + '" data-coachDob="' + row['coachDob'] + '" data-filesid="' + row['filesid'] + '" data-picname="' + row['picname'] + '" class="btn btn-info text-white pl-2 pr-2 btn-sm ml-1 mr-1" title="Edit coach" >' +
                            '<i class="fas fa-book-open"></i>' +
                            '</button>';

                        return view;
                    }
                },
            ]
        });


    }
</script>