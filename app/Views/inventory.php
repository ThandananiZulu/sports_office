<?php echo view('resources/links'); ?>
<?php echo view('resources/css'); ?>
<?php echo view('resources/header'); ?>
<?php $sports = get_sports(); ?>

<div class="container page-title bg-white" style="margin-top: 40px;">
    <div class="">
        <div class="">
            <div class="">

                <h5 class=" mb-2  text-dark text-uppercase fonttype display-6 text-center">
                    Add Inventory

                </h5>

            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="card card-box mb-5">
        <div class="card-header text-dark">
            <div class="card-header--title">
                <small>Inventory</small>
                <b>List</b>
            </div>
            <div class="card-header--actions">
                <a href="#" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#add_item">

                    <i class="fas fa-plus"> </i> Add Inventory
                </a>


            </div>

        </div>
        <div class="table-responsive">
            <table id="table_" class="table table-hover">
                <thead>
                    <tr>

                        <th>Item Name</th>

                        <th>Item Code</th>

                        <th>Item Quantity</th>

                        <th>Item Price</th>

                        <th>Comments </th>

                        <th>Last Update</th>

                        <th>Item Image</th>

                        <th>Add / Remove Item</th>

                        <th>Delete Item</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot class="thead-light">
                    <tr>
                        <th>Item Name</th>

                        <th>Item Code</th>

                        <th>Item Quantity</th>

                        <th>Item Price</th>

                        <th>Comments </th>

                        <th>Last Update</th>

                        <th>Item Image</th>

                        <th>Add / Remove Item</th>

                        <th>Delete Item</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


</div>


<div class="modal fade in" id="add_item" role="dialog" tabindex="-1" aria-labelledby="add_item" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark ">
                <span>Add Item</span>
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
                                            <form onsubmit="add_item(this);return false;" autocomplete="off">
                                                <div class="form-row">


                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Item Name</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="stockName">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Item Code</label>
                                                        <input type="text" required maxlength="100" onkeypress="return /[a-z ]/i.test(event.key)" class="form-control" name="stockCode">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Item Quantity</label>
                                                        <input type="number" onKeyPress="if(this.value.length==5) return false;" autocomplete="off" name="stockQuantity" class="form-control">

                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Item Price</label>
                                                        <input type="number" onKeyPress="if(this.value.length==10) return false;" autocomplete="off" name="stockPrice" class="form-control">

                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <small style="color:red">*</small>
                                                        <label for="inputEmail4">Comments</label>
                                                        <textarea autocomplete="off" maxlength="150" name="comments" class="form-control"></textarea>

                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <small style="color:red"></small>
                                                        <label for="inputEmail4">Item Image</label>
                                                        <input type="file" class="form-control" name="stockImage" id="stockImage" onblur="pic_format('stockImage')">
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

    function add_item(form) {
        $('#submitBtn').attr('disabled', 'true');

        $.ajax({
            url: '<?php echo base_url('public/inventory/create'); ?>',
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
                    $(form).trigger("reset");

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

                "url": "<?php echo base_url("public/inventory/index"); ?>",

            },
            'ordering': false,
            "columns": [{
                    'data': "stockName"
                },
                {
                    'data': "stockCode"
                },
                {
                    'data': "stockQuantity"
                },
                {
                    'data': "stockPrice"
                },
                {
                    'data': "comments",

                },
                {
                    'data': "createdAt"
                },
                {
                    'data': "stockImage",
                    render: function(data, type, row, meta) {

                        // $('[data-bs-toggle="popover"]').popover();
                        $('#item_' + row['stockID']).popover({
                            placement: 'top',
                            trigger: 'hover',
                            html: true,
                            content: function() {
                                var result = "";

                                result += (('<div id="itemDiv" class="media" style="pointer-events: none;"><img src="<?php echo base_url(); ?>/assets/uploads/inventory/' + row['stockImage'] + '" width = "140px" height = "140px" class="mr-3" alt="No Image Available"><div class="media-body"></div></div>'));

                                return result;
                            }

                        });
                        var pic = ' <span id="item_' + row['stockID'] + '" data-bs-toggle="popover"> <img src = "<?php echo base_url(); ?>/assets/uploads/inventory/' + row['stockImage'] + '" width = "30px" height = "30px" onerror="this.onerror=null;this.src=\'<?php echo base_url(); ?>/assets/img/none.png \';"> ';

                        return pic;
                    }
                },
                {
                    "data": "",
                    render: function(data, type, row, meta) {

                        var view = ' <div id="hiddenContent" class="hidden"></div><div id="hiddenContentTwo" class="hidden"></div><div class="input-group"> <span class="input-group-prepend">' +
                            '<button type="button" id="btnminus_' + row["stockID"] + '" class="btn btn-outline-secondary btn-sm" onclick="minusItem(this)">' +
                            '<span class="fa fa-minus" > </span> </button></span>' +
                            ' <input id="plusminusinput" type="text" class="form-control " value="0" min="0" max="100000">' +
                            '<span class="input-group-append">' +
                            '<button type="button" id="btnplus_' + row["stockID"] + '" class="btn btn-outline-secondary btn-sm mr-2" data-stockName="' + row["stockName"] + '" onclick="plusItem(this)">' +
                            '<span class="fa fa-plus" > </span> </button> </span> ' +
                            '</div> ';

                        return view;
                    }
                },
                {
                    "data": "",
                    render: function(data, type, row, meta) {
                        var deletes = '<button type="button" class="btn btn-outline-danger " data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Post" onclick=""> <i class="fa fa-trash"></i></button>';

                        return deletes;
                    }
                },
            ]
        });


    }

    function swal(stockName) {
        var itemCount = $('#plusminusinput').val();
        var item = Number(itemCount) > 1 ? "items" : "item"

        Swal.fire({
            title: stockName,
            text: "Would you like to add " + itemCount + " " + item + "? ",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: 'info',
            confirmButtonText: 'Yes, Add it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Added!',
                    'Your item has been added.',
                    'success'
                )
            }
        })
    }

    function plusItem(btn) {
        $('#plusminusinput').val(Number($('#plusminusinput').val()) + 1);

        const $hidden = document.getElementById('hiddenContent');
        var $myButton = document.getElementById(btn.id);
        let intervalId;

        const restartTimer = () => {
            $hidden.classList.add('hidden');
            intervalId = setInterval(() => {
                $hidden.classList.remove('hidden');
                if (!$hidden.classList.contains('hidden')) {
                    clearInterval(intervalId);
                    swal($(btn).attr('data-stockName'), )
                }
            }, 1500)

        };

        var cancelTimer = () => {

            clearInterval(intervalId);
            restartTimer();

        };

        $(btn).on('click', function() {
            cancelTimer();
        });
        // $myButton.addEventListener('click', cancelTimer);
        restartTimer();


    }

    function minusItem(btn) {
        alert('minus item' + $('#plusminusinput').val());
        if (Number($('#plusminusinput').val()) == 1) {
            return false
        }
        if (Number($('#plusminusinput').val()) > 1) {
            $('#plusminusinput').val(Number($('#plusminusinput').val()) - 1);

            const $hidden = document.getElementById('hiddenContentTwo');
            var $myButton = document.getElementById(btn.id);
            let intervalId;

            const restartTimer = () => {
                $hidden.classList.add('hidden');
                intervalId = setInterval(() => {
                    $hidden.classList.remove('hidden');
                    if (!$hidden.classList.contains('hidden')) {
                        clearInterval(intervalId);
                        swal($(btn).attr('data-stockName'), )
                    }
                }, 1500)

            };

            var cancelTimer = () => {

                clearInterval(intervalId);
                restartTimer();

            };

            $(btn).on('click', function() {
                cancelTimer();
            });

            restartTimer();

        }
    }
</script>