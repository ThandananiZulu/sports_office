<?php echo view('resources/links'); ?>
<?php echo view('resources/css'); ?>
<?php echo view('resources/header'); ?>
<?php $sports = get_sports(); ?>

<div class="container page-title bg-white" style="margin-top: 40px;">
    <div class="">
        <div class="">
            <div class="">

                <h5 class=" mb-2  text-dark text-uppercase fonttype display-6 text-center">
                    Add Student

                </h5>

            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="card card-box mb-5">
        <div class="card-header text-dark">
            <div class="card-header--title">
                <small>Students</small>
                <b>List</b>
            </div>
            <div class="card-header--actions">
                <a href="#" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#add_student">

                    <i class="fas fa-plus"> </i> Add Student
                </a>


            </div>

        </div>
        <div class="table-responsive">
            <table id="table_" class="table table-hover ">
                <thead>
                    <tr>
                        <th>Student Number</th>

                        <th>Student Name</th>

                        <th>Student Surname</th>

                        <th>Sport Name</th>

                        <th>Student Email</th>

                        <th>Student Phone Number</th>

                        <th>Profile Photo</th>

                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot class="thead-light">
                    <tr>
                        <th>Student Number</th>

                        <th>Student Name</th>

                        <th>Student Surname</th>

                        <th>Sport Name</th>

                        <th>Student Email</th>

                        <th>Student Phone Number</th>

                        <th>Profile Photo</th>

                        <th>Edit</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


</div>


<div class="" id="add_student" role="dialog" tabindex="-1" aria-labelledby="add_student" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark ">
                <span>Add Student</span>
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
                                            <form onsubmit="add_student(this);return false;" autocomplete="off">
                                                <div class="form-row">

                                                    <div id="chooseDiv" class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Sport</label>
                                                        <select class="form-control" name="studentSport" onchange="">
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
                                                        <label for="inputEmail4">Student Number</label>
                                                        <input type="number" onKeyPress="if(this.value.length==8) return false;" autocomplete="off" name="studentNumber" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Student Firstname</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="studentFirstname">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Student Surname</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="studentSurname">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Gender</label>
                                                        <select class="form-control" name="studentGender" required>
                                                            <option value="" selected hidden>Select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Date Of Birth</label>
                                                        <input type="date" max="<?php echo date('Y-m-d', strtotime('-10 years')); ?>" required class="form-control" name="studentDob">
                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Address Or Residence</label>
                                                        <textarea required maxlength="100" class="form-control" name="studentAddress"></textarea>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail4">Email</label>
                                                        <input type="email" maxlength="100" class="form-control" name="studentEmail" onchange="validateEmail(this)">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Cellphone Number</label>
                                                        <input type="number" onKeyPress="if(this.value.length==10) return false;" required class="form-control" name="studentCell" id="studentCell" onchange="validateCell(this)">
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

<!-- Edit Student -->

<div class="modal fade in" id="edit_student" role="dialog" tabindex="-1" aria-labelledby="edit_student" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark ">
                <span>Edit Student</span>
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
                                            <form onsubmit="edit_student(this);return false;" autocomplete="off">
                                                <div class="form-row">

                                                    <div id="chooseDiv" class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Sport</label>
                                                        <select class="form-control" id="edit_studentSport" name="studentSport">
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
                                                        <label for="inputEmail4">Student Number</label>
                                                        <input type="number" onKeyPress="if(this.value.length==8) return false;" autocomplete="off" name="studentNumber" class="form-control" id="edit_studentNumber">
                                                        <input type="hidden" id="studentID" name="studentID">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Student Firstname</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="studentFirstname" id="edit_studentFirstname">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Student Surname</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="studentSurname" id="edit_studentSurname">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Gender</label>
                                                        <select class="form-control" name="studentGender" id="edit_studentGender" required>
                                                            <option value="" selected hidden>Select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Date Of Birth</label>
                                                        <input type="date" max="<?php echo date('Y-m-d', strtotime('-10 years')); ?>" required class="form-control" name="studentDob" id="edit_studentDob">
                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Address Or Residence</label>
                                                        <textarea required maxlength="100" class="form-control" id="edit_studentAddress" name="studentAddress"></textarea>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail4">Email</label>
                                                        <input type="email" maxlength="100" class="form-control" name="studentEmail" id="edit_studentEmail" onchange="validateEmail(this)">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Cellphone Number</label>
                                                        <input type="number" onKeyPress="if(this.value.length==10) return false;" required class="form-control" name="studentCell" id="edit_studentCell" onchange="validateCell(this)">
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

    function add_student(form) {
        $('#submitBtn').attr('disabled', 'true');

        $.ajax({
            url: '<?php echo base_url('public/student'); ?>',
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

    function edit_student(form) {
        $('#submitBtnEdit').attr('disabled', 'true');

        $.ajax({
            url: '<?php echo base_url('public/student/update'); ?>',
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

    function view_student(t) {

        $('#filesid').val($(t).attr('data-filesid'));
        $('#studentID').val($(t).attr('data-studentID'));
        $('#edit_studentSport').val($(t).attr('data-sportID'));
        $('#edit_studentFirstname').val($(t).attr('data-studentFirstname'));
        $('#edit_studentSurname').val($(t).attr('data-studentSurname'));
        $('#edit_studentNumber').val($(t).attr('data-studentNumber'));
        $('#edit_studentCell').val($(t).attr('data-studentCell'));
        $('#edit_studentGender').val($(t).attr('data-studentGender'));
        $('#edit_studentEmail').val($(t).attr('data-studentEmail'));
        $('#edit_studentAddress').val($(t).attr('data-studentAddress'));
        $('#edit_studentDob').val($(t).attr('data-studentDob'));
        $('#getPicName').html($(t).attr('data-picname'));
        $('#getPicPath').html('<img id="pic" src = "<?php echo base_url(); ?>/assets/uploads/student/' + $(t).attr('data-picname') + '" width = "70px" height = "70px" >')
        $('#edit_student').modal('show');
    }

    function load_table() {
        $('#table_').dataTable().fnClearTable();
        $('#table_').dataTable().fnDestroy();

        $('#table_').DataTable({

            "ajax": {

                "url": "<?php echo base_url("public/student"); ?>",

            },
            'ordering': false,
            "columns": [{
                    'data': "studentNumber"
                },
                {
                    'data': "studentFirstname"
                },
                {
                    'data': "studentSurname"
                },
                {
                    'data': "sportName",

                },
                {
                    'data': "studentEmail"
                },
                {
                    'data': "studentCell"
                },

                {
                    "data": "picname",
                    render: function(data, type, row, meta) {

                        // $('[data-bs-toggle="popover"]').popover();
                        $('#pic_' + row['studentID']).popover({
                            placement: 'top',
                            trigger: 'hover',
                            html: true,
                            content: function() {
                                var result = "";

                                result += (('<div id="picDiv" class="media" style="pointer-events: none;"><img src="<?php echo base_url(); ?>/assets/uploads/student/' + row['picname'] + '" width = "140px" height = "140px" class="mr-3" alt="No Image"><div class="media-body"></div></div>'));

                                return result;
                            }

                        });
                        var pic = ' <span id="pic_' + row['studentID'] + '" data-bs-toggle="popover"> <img src = "<?php echo base_url(); ?>/assets/uploads/student/' + row['picname'] + '" width = "30px" height = "30px" onerror="this.onerror=null;this.src=\'<?php echo base_url(); ?>/assets/img/none.png \';"> ';

                        return pic;
                    }
                }, {
                    "data": "",
                    render: function(data, type, row, meta) {

                        var view = '<button onclick="view_student(this)" data-studentID="' + row['studentID'] + '" data-sportID="' + row['sportID'] + '"  data-studentFirstname="' + row['studentFirstname'] + '"  data-studentSurname="' + row['studentSurname'] + '"  data-studentNumber="' + row['studentNumber'] + '"  data-studentCell="' + row['studentCell'] + '"  data-studentGender="' + row['studentGender'] + '"  data-studentEmail="' + row['studentEmail'] + '" data-studentAddress="' + row['studentAddress'] + '" data-studentDob="' + row['studentDob'] + '" data-filesid="' + row['filesid'] + '" data-picname="' + row['picname'] + '" class="btn btn-info text-white pl-2 pr-2 btn-sm ml-1 mr-1" title="Edit Student" >' +
                            '<i class="fas fa-book-open"></i>' +
                            '</button>';

                        return view;
                    }
                },
            ]
        });


    }
</script>