<?php echo view('resources/links'); ?>
<?php echo view('resources/css'); ?>
<?php echo view('resources/header'); ?>
<?php $sports = get_sports(); ?>

<div class="container page-title bg-white" style="margin-top: 40px;">
    <div class="">
        <div class="">
            <div class="">

                <h5 class=" mb-2  text-dark text-uppercase fonttype display-6 text-center">
                    Add Staff

                </h5>

            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="card card-box mb-5">
        <div class="card-header text-dark">
            <div class="card-header--title">
                <small>Staff</small>
                <b>List</b>
            </div>
            <div class="card-header--actions">
                <a href="#" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#add_staff">

                    <i class="fas fa-plus"> </i> Add Staff
                </a>

            </div>

        </div>
        <div class="table-responsive">
            <table id="table_" class="table table-hover ">
                <thead>
                    <tr>
                        <th>StaffNumber</th>

                        <th>Firstname</th>

                        <th>Surname</th>

                        <th>Role</th>

                        <th> Email</th>

                        <th>Phone Number</th>

                        <th>Profile Photo</th>

                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot class="thead-light">
                    <tr>
                        <th>StaffNumber</th>

                        <th>Firstname</th>

                        <th>Surname</th>

                        <th>Role</th>

                        <th> Email</th>

                        <th>Phone Number</th>

                        <th>Profile Photo</th>

                        <th>Edit</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


</div>


<div class="modal fade in" id="add_staff" role="dialog" tabindex="-1" aria-labelledby="add_staff" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark ">
                <span>Add Staff</span>
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
                                            <form onsubmit="add_staff(this);return false;" autocomplete="off">
                                                <div class="form-row">

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Staff Number</label>
                                                        <input type="number" onKeyPress="if(this.value.length==8) return false;" autocomplete="off" name="staffNumber" class="form-control">

                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Staff Role</label>
                                                        <input type="text" required maxlength="50" class="form-control" name="staffRole">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Firstname</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="staffFirstname">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Surname</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="staffSurname">
                                                    </div>



                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Gender</label>
                                                        <select class="form-control" name="staffGender" required>
                                                            <option value="" selected hidden>Select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Date Of Birth</label>
                                                        <input type="date" max="<?php echo date('Y-m-d', strtotime('-10 years')); ?>" required class="form-control" name="staffDob">
                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Address</label>
                                                        <textarea required maxlength="100" class="form-control" name="staffAddress"></textarea>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail4">Email</label>
                                                        <input type="email" maxlength="100" class="form-control" name="staffEmail" onchange="validateEmail(this)">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Cellphone Number</label>
                                                        <input type="number" onKeyPress="if(this.value.length==10) return false;" required class="form-control" name="staffCell" id="staffCell" onchange="validateCell(this)">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red"></small>
                                                        <label for="inputEmail4">Profile Photo</label>
                                                        <input type="file" class="form-control" name="profilePhoto" id="profilePhoto" onblur="pic_format(this.id)">
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

<!-- Edit Staff -->

<div class="modal fade in" id="edit_staff" role="dialog" tabindex="-1" aria-labelledby="edit_staff" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark ">
                <span>Edit Staff</span>
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
                                            <form onsubmit="edit_staff(this);return false;" autocomplete="off">
                                                <div class="form-row">




                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Staff Number</label>
                                                        <input type="number" onKeyPress="if(this.value.length==8) return false;" autocomplete="off" name="staffNumber" class="form-control" id="edit_staffNumber">
                                                        <input type="hidden" id="staffID" name="staffID">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Staff Role</label>
                                                        <input type="text" required maxlength="50" class="form-control" name="staffRole" id="edit_staffRole">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Firstname</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="staffFirstname" id="edit_staffFirstname">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Surname</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="staffSurname" id="edit_staffSurname">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Gender</label>
                                                        <select class="form-control" name="staffGender" id="edit_staffGender" required>
                                                            <option value="" selected hidden>Select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Date Of Birth</label>
                                                        <input type="date" max="<?php echo date('Y-m-d', strtotime('-10 years')); ?>" required class="form-control" name="staffDob" id="edit_staffDob">
                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Address Or Residence</label>
                                                        <textarea required maxlength="100" class="form-control" id="edit_staffAddress" name="staffAddress"></textarea>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail4">Email</label>
                                                        <input type="email" maxlength="100" class="form-control" name="staffEmail" id="edit_staffEmail" onchange="validateEmail(this)">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Cellphone Number</label>
                                                        <input type="number" onKeyPress="if(this.value.length==10) return false;" required class="form-control" name="staffCell" id="edit_staffCell" onchange="validateCell(this)">
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

    function add_staff(form) {
        $('#submitBtn').attr('disabled', 'true');

        $.ajax({
            url: '<?php echo base_url('public/staff'); ?>',
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

    function edit_staff(form) {
        $('#submitBtnEdit').attr('disabled', 'true');

        $.ajax({
            url: '<?php echo base_url('public/staff/update'); ?>',
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

    function view_staff(t) {

        $('#filesid').val($(t).attr('data-filesid'));
        $('#staffID').val($(t).attr('data-staffID'));
        $('#edit_staffRole').val($(t).attr('data-staffRole'));
        $('#edit_staffFirstname').val($(t).attr('data-staffFirstname'));
        $('#edit_staffSurname').val($(t).attr('data-staffSurname'));
        $('#edit_staffNumber').val($(t).attr('data-staffNumber'));
        $('#edit_staffCell').val($(t).attr('data-staffCell'));
        $('#edit_staffGender').val($(t).attr('data-staffGender'));
        $('#edit_staffEmail').val($(t).attr('data-staffEmail'));
        $('#edit_staffAddress').val($(t).attr('data-staffAddress'));
        $('#edit_staffDob').val($(t).attr('data-staffDob'));
        $('#getPicName').html($(t).attr('data-picname'));
        $('#getPicPath').html('<img id="pic" src = "<?php echo base_url(); ?>/assets/uploads/staff/' + $(t).attr('data-picname') + '" width = "70px" height = "70px" >');
        $('#edit_staff').modal('show');
    }

    function load_table() {
        $('#table_').dataTable().fnClearTable();
        $('#table_').dataTable().fnDestroy();

        $('#table_').DataTable({

            "ajax": {

                "url": "<?php echo base_url("public/staff"); ?>",

            },
            'ordering': false,
            "columns": [{
                    'data': "staffNumber"
                },
                {
                    'data': "staffFirstname"
                },
                {
                    'data': "staffSurname"
                },
                {
                    'data': "staffRole",

                },
                {
                    'data': "staffEmail"
                },
                {
                    'data': "staffCell"
                },

                {
                    "data": "picname",
                    render: function(data, type, row, meta) {

                        // $('[data-bs-toggle="popover"]').popover();
                        $('#pic_' + row['staffID']).popover({
                            placement: 'top',
                            trigger: 'hover',
                            html: true,
                            content: function() {
                                var result = "";

                                result += (('<div id="picDiv" class="media" style="pointer-events: none;"><img src="<?php echo base_url(); ?>/assets/uploads/staff/' + row['picname'] + '" width = "140px" height = "140px" class="mr-3" alt="No Image"><div class="media-body"></div></div>'));

                                return result;
                            }

                        });
                        var pic = ' <span id="pic_' + row['staffID'] + '" data-bs-toggle="popover"> <img src = "<?php echo base_url(); ?>/assets/uploads/staff/' + row['picname'] + '" width = "30px" height = "30px" > ';

                        return pic;
                    }
                }, {
                    "data": "",
                    render: function(data, type, row, meta) {

                        var view = '<button onclick="view_staff(this)" data-staffID="' + row['staffID'] + '"  data-staffFirstname="' + row['staffFirstname'] + '"  data-staffSurname="' + row['staffSurname'] + '"  data-staffNumber="' + row['staffNumber'] + '"  data-staffCell="' + row['staffCell'] + '"  data-staffGender="' + row['staffGender'] + '"  data-staffEmail="' + row['staffEmail'] + '" data-staffAddress="' + row['staffAddress'] + '" data-staffDob="' + row['staffDob'] + '" data-filesid="' + row['filesid'] + '" data-picname="' + row['picname'] + '" data-staffRole="' + row['staffRole'] + '" class="btn btn-info text-white pl-2 pr-2 btn-sm ml-1 mr-1" data-bs-toggle="tooltip" title="Edit Staff" >' +
                            '<i class="fas fa-book-open"></i>' +
                            '</button>';

                        return view;
                    }
                },
            ]
        });


    }
</script>