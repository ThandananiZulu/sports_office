<?php echo view('resources/links'); ?>
<?php echo view('resources/css'); ?>
<?php echo view('resources/header'); ?>
<?php $sports = get_sports_result(); ?>

<div class="container page-title bg-white" style="margin-top: 40px;">
    <div class="">
        <div class="">
            <div class="">

                <h5 class=" mb-2  text-dark text-uppercase fonttype display-6 text-center">
                    Requisitions

                </h5>

            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="card card-box mb-5">
        <div class="card-header text-dark">
            <div class="card-header--title">
                <small>Requisitions</small>
                <b>List</b>
            </div>
            <div class="card-header--actions">
                <a href="#" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#add_req">

                    <i class="fas fa-plus"> </i> Add Requisition
                </a>


            </div>

        </div>
        <div class="table-responsive">
            <table id="table_" class="table table-hover ">
                <thead>
                    <tr>
                        <th>Requisition Number</th>
                        <th>Date</th>
                        <th>Sport & Code</th>
                        <th>Amount(R)</th>

                        <th>Status</th>

                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot class="thead-light">
                    <tr>
                        <th>Requisition Number</th>
                        <th>Date</th>
                        <th>Sport & Code</th>
                        <th>Amount(R)</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


</div>


<div class="modal fade in" id="add_req" role="dialog" tabindex="-1" aria-labelledby="add_req" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark ">
                <span></span>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="req-body">
                <div class="req-img">
                    <img src="<?php echo base_url(); ?>/assets/img/newMut.jpg" width="270px" height="140px" alt="">
                </div>
                <div class="text-dark req-title fw-bold mb-4">
                    <small>SPORT UNION REQUISITION FOR PAYMENT</small>
                </div>

                <div class="accordion mb-5" id="accordionExample1">

                    <div id="collapseOne1B" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample1">
                        <div class="card-body">
                            <div class="col-md-12">
                                <form onsubmit="add_req(this);return false;" autocomplete="off">
                                    <div class="form-row">

                                        <div class="col-auto ml-auto mb-5">
                                            <div class="form-inline" style="display: flex; justify-content: flex-end">

                                                <label>Date:</label>


                                                <input type="date" max="<?php echo date('Y-m-d', strtotime('-10 years')); ?>" required class="form-control border-0 border-bottom border-secondary border-2 rounded-0" name="reqDate">

                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Payee:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="payee" placeholder="Payee Name">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Address:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Amount:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="amount" placeholder="Amount">
                                            </div>
                                        </div>
                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Amount in words:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="amountInWords" placeholder="Amount in words">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm w-25">name and code of sport:</label>
                                            <div class="col-sm-10 w-75">
                                                <select class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="sportNameAndCode" required>
                                                    <option value="" selected hidden>Select</option>

                                                    <?php if (isset($sports)) {
                                                        foreach ($sports as $r) { ?>
                                                            <option value="<?php echo $r->sportCode; ?>"><?php echo $r->sportName . ":  " . $r->sportCode; ?> </option>

                                                    <?php }
                                                    } ?>
                                                </select>
                                                <!-- <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="" placeholder="Name and code"> -->
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">vote:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="firstVote" placeholder="Vote">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Available balance:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="availableBalance" placeholder="Available balance">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Confirmation:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="confirmation" placeholder="Confirmation">
                                            </div>
                                        </div>

                                        <div class="row mb-5 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Details of request</label>
                                            <div class="col-sm-10 mb-5">
                                                <textarea type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" rows="3" name="detailsOfRequest" placeholder="Details of request"></textarea>
                                            </div>
                                        </div>

                                        <div class="text-dark fw-bold mb-3 mt-5 ml-auto row col-md-12">
                                            <small><u>UNDERTAKING OF PAYMENT BY APPLICANTS</u></small>
                                        </div>
                                        <div class="text-dark   ml-auto row col-md-12">
                                            <P>We undertake to return all unused cash to submit all cash invoices failing which the cost</br>
                                                involved shall be paid back to the students (SRC)fund by charging our fees accounts,
                                            </P>
                                        </div>

                                        <div class="table-responsive ml-auto row col-md-12 mt-4">
                                            <table id="reqtable_" class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th>Full names of Applicants</th>

                                                        <th>Student number</th>

                                                        <th>Capacity Eg. Treasurer</th>

                                                        <th>Signature</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="firstApplicantName" placeholder="Name.."></td>
                                                        <td><input type="text" class="form-control" name="firstStudentNumber" placeholder="St no.."></td>
                                                        <td><input type="text" class="form-control" name="firstCapacity" placeholder="Capacity.."></td>
                                                        <td>
                                                            <div class="form-group" style="margin-top: -5px">
                                                                <div class="signature-pad--body">


                                                                    <canvas id="signature9" style="display: none" style="border:solid 2px;" class="mouseSign9" height="130" width="350"></canvas>
                                                                    <canvas id="firstSignature" style="display: none" style="border:1px solid;" class="digitalSign3" name="cnv3" height="130" width="350"></canvas>

                                                                </div>
                                                                <input type="text" style="width:1px; height:1px; border:2px;" tabindex="-1" name="firstSignature" id="signatureInput9">
                                                                <input type="text" style="width:1px; height:1px; border:2px;" tabindex="-1" id="signType3">



                                                                <div class="dispay-block">
                                                                    <button type="button" class="btn btn-xs btn-secondary clear" onclick="openSignBtn(0,9)">Sign With Mouse</button>

                                                                </div>

                                                                <div class="dispay-block digitalSign9" id="digitalSign9" style="display: none">
                                                                    <!-- <button type="button"  class="btn btn-default btn-xs clear" tabindex="-1" onclick="StartSign()">Sign</button> -->


                                                                </div>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="secondApplicantName" placeholder="Name.."></td>
                                                        <td><input type="text" class="form-control" name="secondStudentNumber" placeholder="St no.."></td>
                                                        <td><input type="text" class="form-control" name="secondCapacity" placeholder="Capacity.."></td>
                                                        <td>
                                                            <div class="form-group" style="margin-top: -5px">

                                                                <div class="signature-pad--body">
                                                                    <!-- <canvas id="cnv" name="cnv" height="130" width="550"></canvas> -->

                                                                    <canvas id="signature8" style="display: none" style="border:solid 2px;" class="mouseSign8" height="130" width="350"></canvas>
                                                                    <canvas id="secondSignature" style="display: none" style="border:1px solid;" class="digitalSign3" name="cnv3" height="130" width="350"></canvas>

                                                                </div>
                                                                <input type="text" style="width:1px; height:1px; border:2px;" tabindex="-1" name="secondSignature" id="signatureInput8">
                                                                <input type="text" style="width:1px; height:1px; border:2px;" tabindex="-1" id="signType3">



                                                                <div class="dispay-block">
                                                                    <button type="button" class="btn btn-xs btn-secondary clear" onclick="openSignBtn(0,8)">Sign With Mouse</button>

                                                                </div>

                                                                <div class="dispay-block digitalSign8" id="digitalSign8" style="display: none">
                                                                    <!-- <button type="button"  class="btn btn-default btn-xs clear" tabindex="-1" onclick="StartSign()">Sign</button> -->


                                                                </div>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="thead-light">
                                                    <tr>
                                                        <th>Full names of Applicants</th>

                                                        <th>Student number</th>

                                                        <th>Capacity Eg. Treasurer</th>

                                                        <th>Signature</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto mt-5">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm w-50">Sport union approval(if funds are available)</label>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Sport union treasure:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="sportUnoinTreasure" placeholder="Sport union treasure">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Date:</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="sportUnoinTreasureDate" placeholder="sport Union Treasure Date">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Sport union president:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="sportUnionPresident" placeholder="Sport union president">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Date:</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="sportUnoinPresidentDate" placeholder="sport Unoin President Date">
                                            </div>
                                        </div>
                                        <!-- //approval -->
                                        <div class="row mb-3 col-md-12 ml-auto mt-5">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm w-50">SRC approval(if funds are available)</label>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">SRC TREASURER:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="srcTreasure" placeholder="src Treasure">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Date:</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="srcTreasureDate" placeholder="src Treasure Date">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">SRC PRESIDENT:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="srcPresident" placeholder="src President">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Date:</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="srcPresidentDate" placeholder="src President Date">
                                            </div>
                                        </div>

                                        <div class="text-dark fw-bold mb-3 mt-5 ml-auto row col-md-12">
                                            <small>SPORT ADMINISTRATION</small>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">CERTIFIED CORRECT:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="certifiedCorrect" placeholder="certified Correct">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Date:</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="certifiedDate" placeholder="certified Date">
                                            </div>
                                        </div>

                                        <div class="text-dark  mt-5 ml-auto row col-md-12" style="font-size: 12px">
                                            <P>To: Finance</br>
                                                NB Please issue cheque if funds are still available</br>
                                                If there is no balance left, please return to me.
                                            </p>
                                        </div>


                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">AMOUNT:(R)</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="financeAmount" placeholder="Amount">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Vote:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="financeVote" placeholder="Vote">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Approved:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="financeApproved" placeholder="Approved">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Date:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="financeDate" placeholder="Date">
                                            </div>
                                        </div>

                                        <div class="text-dark fw-bold mb-3 mt-5 ml-auto row col-md-12">
                                            <small>SPORT CODES</small>
                                        </div>
                                        <div class="table-responsive ml-auto row col-md-12 mt-4">
                                            <table id="sportcodes_" class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th>Code</th>

                                                        <th>Sport</th>

                                                        <th>Code</th>

                                                        <th>Sport</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><small>SP05</small></td>
                                                        <td><small>Athletic</small></td>
                                                        <td><small>SP06</small></td>
                                                        <td>
                                                            <small>Aerobic</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP07</small></td>
                                                        <td><small>BADMINTON</small></td>
                                                        <td><small>SP08</small></td>
                                                        <td>
                                                            <small>BASKETBALL</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP09</small></td>
                                                        <td><small>BOXING</small></td>
                                                        <td><small>SP10</small></td>
                                                        <td>
                                                            <small>CHESS</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP11</small></td>
                                                        <td><small>CRICKET</small></td>
                                                        <td><small>SP12</small></td>
                                                        <td>
                                                            <small>DANCE</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP13</small></td>
                                                        <td><small>DARTS</small></td>
                                                        <td><small>SP14</small></td>
                                                        <td>
                                                            <small>GOLF</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP15</small></td>
                                                        <td><small>INDOOR SOCCER</small></td>
                                                        <td><small>SP16</small></td>
                                                        <td>
                                                            <small>KARATE</small>
                                                        </td>
                                                    <tr>
                                                        <td><small>SP17</small></td>
                                                        <td><small>NETBALL</small></td>
                                                        <td><small>SP18</small></td>
                                                        <td>
                                                            <small>RUGBY</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP19</small></td>
                                                        <td><small>SCRABBLE</small></td>
                                                        <td><small>SP20</small></td>
                                                        <td>
                                                            <small>SOCCER</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP21</small></td>
                                                        <td><small>SOFT BALL</small></td>
                                                        <td><small>SP22</small></td>
                                                        <td>
                                                            <small>TABLE TENNIS</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP23</small></td>
                                                        <td><small>TENNIS</small></td>
                                                        <td><small>SP24</small></td>
                                                        <td>
                                                            <small>VOLLEYBALL</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP25</small></td>
                                                        <td><small>WEIGHTLIFTING</small></td>
                                                        <td><small>SP26</small></td>
                                                        <td>
                                                            <small>SNOOKER</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP27</small></td>
                                                        <td><small>SWIMMING</small></td>
                                                        <td><small>SP28</small></td>
                                                        <td>
                                                            <small>JOINT SPORT</small>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="thead-light">
                                                    <tr>
                                                        <th>Code</th>

                                                        <th>Sport</th>

                                                        <th>Code</th>

                                                        <th>Sport</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <div class="form-group col-md-12 ">
                                                <button type="submit" class="btn btn-primary ml-auto mt-5">Save</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
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

<!-- Edit Requisition -->

<div class="modal fade in" id="edit_req" role="dialog" tabindex="-1" aria-labelledby="edit_req" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark ">
                <span></span>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="req-body">
                <div class="req-img">
                    <img src="<?php echo base_url(); ?>/assets/img/newMut.jpg" width="270px" height="140px" alt="">
                </div>
                <div class="text-dark req-title fw-bold mb-4">
                    <small>SPORT UNION REQUISITION FOR PAYMENT</small>
                </div>

                <div class="accordion mb-5" id="accordionExample2">

                    <div id="collapseOne1B" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample2">
                        <div class="card-body">
                            <div class="col-md-12">
                                <form onsubmit="edit_req(this);return false;" autocomplete="off">
                                    <div class="form-row">

                                        <div class="col-auto ml-auto mb-5">
                                            <div class="form-inline" style="display: flex; justify-content: flex-end">

                                                <label>Date:</label>


                                                <input type="date" max="<?php echo date('Y-m-d', strtotime('-10 years')); ?>" required class="form-control border-0 border-bottom border-secondary border-2 rounded-0" name="reqDate">

                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Payee:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="payee" placeholder="Payee Name">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Address:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Amount:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="amount" placeholder="Amount">
                                            </div>
                                        </div>
                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Amount in words:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="amountInWords" placeholder="Amount in words">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm w-25">name and code of sport:</label>
                                            <div class="col-sm-10 w-75">
                                                <select class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="sportNameAndCode" required>
                                                    <option value="" selected hidden>Select</option>

                                                    <?php if (isset($sports)) {
                                                        foreach ($sports as $r) { ?>
                                                            <option value="<?php echo $r->sportCode; ?>"><?php echo $r->sportName . ":  " . $r->sportCode; ?> </option>

                                                    <?php }
                                                    } ?>
                                                </select>
                                                <!-- <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="" placeholder="Name and code"> -->
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">vote:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="firstVote" placeholder="Vote">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Available balance:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="availableBalance" placeholder="Available balance">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Confirmation:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="confirmation" placeholder="Confirmation">
                                            </div>
                                        </div>

                                        <div class="row mb-5 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Details of request</label>
                                            <div class="col-sm-10 mb-5">
                                                <textarea type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" rows="3" name="detailsOfRequest" placeholder="Details of request"></textarea>
                                            </div>
                                        </div>

                                        <div class="text-dark fw-bold mb-3 mt-5 ml-auto row col-md-12">
                                            <small><u>UNDERTAKING OF PAYMENT BY APPLICANTS</u></small>
                                        </div>
                                        <div class="text-dark   ml-auto row col-md-12">
                                            <P>We undertake to return all unused cash to submit all cash invoices failing which the cost</br>
                                                involved shall be paid back to the students (SRC)fund by charging our fees accounts,
                                            </P>
                                        </div>

                                        <div class="table-responsive ml-auto row col-md-12 mt-4">
                                            <table id="reqtable_" class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th>Full names of Applicants</th>

                                                        <th>Student number</th>

                                                        <th>Capacity Eg. Treasurer</th>

                                                        <th>Signature</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="firstApplicantName" placeholder="Name.."></td>
                                                        <td><input type="text" class="form-control" name="firstStudentNumber" placeholder="St no.."></td>
                                                        <td><input type="text" class="form-control" name="firstCapacity" placeholder="Capacity.."></td>
                                                        <td>
                                                            <div id="firstSignatureDiv" class="form-group" style="margin-top: -5px" style="display: none">
                                                                <div class="signature-pad--body">


                                                                    <canvas id="signature6" style="display: none" style="border:solid 2px;" class="mouseSign6" height="130" width="350"></canvas>
                                                                    <canvas id="firstSignature" style="display: none" style="border:1px solid;" class="digitalSign3" name="cnv3" height="130" width="350"></canvas>

                                                                </div>
                                                                <input type="text" style="width:1px; height:1px; border:2px;" tabindex="-1" name="firstSignature" id="signatureInput6">
                                                                <input type="text" style="width:1px; height:1px; border:2px;" tabindex="-1" id="signType3">



                                                                <div class="dispay-block">
                                                                    <button type="button" class="btn btn-xs btn-secondary clear" onclick="openSignBtn(0,6)">Sign With Mouse</button>

                                                                </div>

                                                                <div class="dispay-block digitalSign6" id="digitalSign6" style="display: none">
                                                                    <!-- <button type="button"  class="btn btn-default btn-xs clear" tabindex="-1" onclick="StartSign()">Sign</button> -->


                                                                </div>


                                                            </div>
                                                            <div id="firstSignatureImg" class="form-group" style="display: none">
                                                                <img src="" id="secondsignaturepic" style="width: 55%; height: 50%" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="secondApplicantName" placeholder="Name.."></td>
                                                        <td><input type="text" class="form-control" name="secondStudentNumber" placeholder="St no.."></td>
                                                        <td><input type="text" class="form-control" name="secondCapacity" placeholder="Capacity.."></td>
                                                        <td>
                                                            <div id="secondSignatureDiv" class="form-group" style="margin-top: -5px" style="display: none">

                                                                <div class="signature-pad--body">
                                                                    <!-- <canvas id="cnv" name="cnv" height="130" width="550"></canvas> -->

                                                                    <canvas id="signature7" style="display: none" style="border:solid 2px;" class="mouseSign7" height="130" width="350"></canvas>
                                                                    <canvas id="secondSignature" style="display: none" style="border:1px solid;" class="digitalSign3" name="cnv3" height="130" width="350"></canvas>

                                                                </div>
                                                                <input type="text" style="width:1px; height:1px; border:2px;" tabindex="-1" name="secondSignature" id="signatureInput7">
                                                                <input type="text" style="width:1px; height:1px; border:2px;" tabindex="-1" id="signType3">



                                                                <div class="dispay-block">
                                                                    <button type="button" class="btn btn-xs btn-secondary clear" onclick="openSignBtn(0,7)">Sign With Mouse</button>

                                                                </div>

                                                                <div class="dispay-block digitalSign7" id="digitalSign7" style="display: none">
                                                                    <!-- <button type="button"  class="btn btn-default btn-xs clear" tabindex="-1" onclick="StartSign()">Sign</button> -->


                                                                </div>


                                                            </div>
                                                            <div id="secondSignatureImg" class="form-group" style="display: none">
                                                                <img src="" id="firstsignaturepic" style="width: 55%; height: 50%" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="thead-light">
                                                    <tr>
                                                        <th>Full names of Applicants</th>

                                                        <th>Student number</th>

                                                        <th>Capacity Eg. Treasurer</th>

                                                        <th>Signature</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto mt-5">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm w-50">Sport union approval(if funds are available)</label>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Sport union treasure:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="sportUnoinTreasure" placeholder="Sport union treasure">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Date:</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="sportUnoinTreasureDate" placeholder="sport Union Treasure Date">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Sport union president:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="sportUnionPresident" placeholder="Sport union president">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Date:</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="sportUnoinPresidentDate" placeholder="sport Unoin President Date">
                                            </div>
                                        </div>
                                        <!-- //approval -->
                                        <div class="row mb-3 col-md-12 ml-auto mt-5">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm w-50">SRC approval(if funds are available)</label>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">SRC TREASURER:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="srcTreasure" placeholder="src Treasure">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Date:</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="srcTreasureDate" placeholder="src Treasure Date">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">SRC PRESIDENT:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="srcPresident" placeholder="src President">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Date:</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="srcPresidentDate" placeholder="src President Date">
                                            </div>
                                        </div>

                                        <div class="text-dark fw-bold mb-3 mt-5 ml-auto row col-md-12">
                                            <small>SPORT ADMINISTRATION</small>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">CERTIFIED CORRECT:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="certifiedCorrect" placeholder="certified Correct">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Date:</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="certifiedDate" placeholder="certified Date">
                                            </div>
                                        </div>

                                        <div class="text-dark  mt-5 ml-auto row col-md-12" style="font-size: 12px">
                                            <P>To: Finance</br>
                                                NB Please issue cheque if funds are still available</br>
                                                If there is no balance left, please return to me.
                                            </p>
                                        </div>


                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">AMOUNT:(R)</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="financeAmount" placeholder="Amount">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Vote:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="financeVote" placeholder="Vote">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Approved:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="financeApproved" placeholder="Approved">
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12 ml-auto">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Date:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 form-control-sm" name="financeDate" placeholder="Date">
                                            </div>
                                        </div>

                                        <div class="text-dark fw-bold mb-3 mt-5 ml-auto row col-md-12">
                                            <small>SPORT CODES</small>
                                        </div>
                                        <div class="table-responsive ml-auto row col-md-12 mt-4">
                                            <table id="sportcodes_" class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th>Code</th>

                                                        <th>Sport</th>

                                                        <th>Code</th>

                                                        <th>Sport</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><small>SP05</small></td>
                                                        <td><small>Athletic</small></td>
                                                        <td><small>SP06</small></td>
                                                        <td>
                                                            <small>Aerobic</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP07</small></td>
                                                        <td><small>BADMINTON</small></td>
                                                        <td><small>SP08</small></td>
                                                        <td>
                                                            <small>BASKETBALL</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP09</small></td>
                                                        <td><small>BOXING</small></td>
                                                        <td><small>SP10</small></td>
                                                        <td>
                                                            <small>CHESS</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP11</small></td>
                                                        <td><small>CRICKET</small></td>
                                                        <td><small>SP12</small></td>
                                                        <td>
                                                            <small>DANCE</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP13</small></td>
                                                        <td><small>DARTS</small></td>
                                                        <td><small>SP14</small></td>
                                                        <td>
                                                            <small>GOLF</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP15</small></td>
                                                        <td><small>INDOOR SOCCER</small></td>
                                                        <td><small>SP16</small></td>
                                                        <td>
                                                            <small>KARATE</small>
                                                        </td>
                                                    <tr>
                                                        <td><small>SP17</small></td>
                                                        <td><small>NETBALL</small></td>
                                                        <td><small>SP18</small></td>
                                                        <td>
                                                            <small>RUGBY</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP19</small></td>
                                                        <td><small>SCRABBLE</small></td>
                                                        <td><small>SP20</small></td>
                                                        <td>
                                                            <small>SOCCER</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP21</small></td>
                                                        <td><small>SOFT BALL</small></td>
                                                        <td><small>SP22</small></td>
                                                        <td>
                                                            <small>TABLE TENNIS</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP23</small></td>
                                                        <td><small>TENNIS</small></td>
                                                        <td><small>SP24</small></td>
                                                        <td>
                                                            <small>VOLLEYBALL</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP25</small></td>
                                                        <td><small>WEIGHTLIFTING</small></td>
                                                        <td><small>SP26</small></td>
                                                        <td>
                                                            <small>SNOOKER</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>SP27</small></td>
                                                        <td><small>SWIMMING</small></td>
                                                        <td><small>SP28</small></td>
                                                        <td>
                                                            <small>JOINT SPORT</small>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="thead-light">
                                                    <tr>
                                                        <th>Code</th>

                                                        <th>Sport</th>

                                                        <th>Code</th>

                                                        <th>Sport</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <div class="form-group col-md-12 ">
                                                <button type="submit" class="btn btn-primary ml-auto mt-5">Update</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
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
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
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

    function add_req(form) {

        $.ajax({
            url: '<?php echo base_url('public/requisition/create'); ?>',
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


                    load_table();
                } else {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Could not add',
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

    function edit_req(form) {

        $.ajax({
            url: '<?php echo base_url('public/requisition/update'); ?>',
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





                    setTimeout(function() {
                        Swal.fire({
                            icon: 'info',
                            title: 'Updated successful, continue',
                            text: data.message,
                        })
                    }, 300);

                    load_table();
                } else {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Could not add',
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
                $('#submitBtnEdit').removeAttr('disabled');
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: text,
                })

            }
        });

    }

    function view_req(t) {
        var input = '<input type="hidden" name="reqID">';
        $('#edit_req .form-row').append(input);


        $('#edit_req [name="reqID"]').val($(t).attr('data-reqID'));
        $('#edit_req [name="reqDate"]').val($(t).attr('data-reqDate')).prop('readonly', true);

        $('#edit_req [name="payee"]').val($(t).attr('data-payee'));
        $('#edit_req [name="address"]').val($(t).attr('data-address'));
        $('#edit_req [name="amount"]').val($(t).attr('data-amount'));
        $('#edit_req [name="amountInWords"]').val($(t).attr('data-amountInWords'));
        $('#edit_req [name="sportNameAndCode"]').val($(t).attr('data-sportNameAndCode'));
        $('#edit_req [name="firstVote"]').val($(t).attr('data-firstVote'));
        $('#edit_req [name="availableBalance"]').val($(t).attr('data-availableBalance'));
        $('#edit_req [name="confirmation"]').val($(t).attr('data-confirmation'));
        $('#edit_req [name="detailsOfRequest"]').val($(t).attr('data-detailsOfRequest'));
        $('#edit_req [name="firstApplicantName"]').val($(t).attr('data-firstApplicantName'));
        $('#edit_req [name="firstStudentNumber"]').val($(t).attr('data-firstStudentNumber'));
        $('#edit_req [name="firstCapacity"]').val($(t).attr('data-firstCapacity'));
        $('#edit_req [name="secondApplicantName"]').val($(t).attr('data-secondApplicantName'));
        $('#edit_req [name="secondStudentNumber"]').val($(t).attr('data-secondStudentNumber'));
        $('#edit_req [name="secondCapacity"]').val($(t).attr('data-secondCapacity'));

        if ($(t).attr('data-firstSignature')) {
            $('#firstSignatureDiv').css('display', 'none');
            $('#firstSignatureImg').css('display', 'block');
            $('#firstsignaturepic').attr('src', 'data:image/png;base64,' + $(t).attr('data-firstSignature'));

        }
        if ($(t).attr('data-secondSignature')) {
            $('#secondSignatureDiv').css('display', 'none');
            $('#secondSignatureImg').css('display', 'block');
            $('#secondsignaturepic').attr('src', 'data:image/png;base64,' + $(t).attr('data-secondSignature'));

        }

        $('#edit_req [name="sportUnoinTreasure"]').val($(t).attr('data-sportUnoinTreasure'));
        $('#edit_req [name="sportUnoinTreasureDate"]').val($(t).attr('data-sportUnoinTreasureDate'));
        $('#edit_req [name="sportUnionPresident"]').val($(t).attr('data-sportUnionPresident'));
        $('#edit_req [name="sportUnoinPresidentDate"]').val($(t).attr('data-sportUnoinPresidentDate'));
        $('#edit_req [name="srcTreasure"]').val($(t).attr('data-srcTreasure'));
        $('#edit_req [name="srcTreasureDate"]').val($(t).attr('data-srcTreasureDate'));
        $('#edit_req [name="srcPresident"]').val($(t).attr('data-srcPresident'));
        $('#edit_req [name="srcPresidentDate"]').val($(t).attr('data-srcPresidentDate'));
        $('#edit_req [name="certifiedCorrect"]').val($(t).attr('data-certifiedCorrect'));
        $('#edit_req [name="certifiedDate"]').val($(t).attr('data-certifiedDate'));
        $('#edit_req [name="financeAmount"]').val($(t).attr('data-financeAmount'));
        $('#edit_req [name="financeVote"]').val($(t).attr('data-financeVote'));
        $('#edit_req [name="financeApproved"]').val($(t).attr('data-financeApproved'));
        $('#edit_req [name="financeDate"]').val($(t).attr('data-financeDate'));


        $('#edit_studentSport').val($(t).attr('data-sportID'));
        $('#edit_studentFirstname').val($(t).attr('data-studentFirstname'));
        $('#edit_studentSurname').val($(t).attr('data-studentSurname'));
        $('#edit_studentNumber').val($(t).attr('data-studentNumber'));
        $('#edit_studentCell').val($(t).attr('data-studentCell'));
        $('#edit_studentGender').val($(t).attr('data-studentGender'));
        $('#edit_studentEmail').val($(t).attr('data-studentEmail'));
        $('#edit_studentAddress').val($(t).attr('data-studentAddress'));
        $('#edit_studentDob').val($(t).attr('data-studentDob'));
        $('#edit_req').modal('show');
    }



    function load_table() {
        $('#table_').dataTable().fnClearTable();
        $('#table_').dataTable().fnDestroy();

        $('#table_').DataTable({

            "ajax": {

                "url": "<?php echo base_url("public/requisition/index"); ?>",

            },
            'ordering': false,
            "columns": [{
                    'data': "reqID"
                },
                {
                    'data': "reqDate"
                },
                {
                    'data': "sportNameAndCode"
                },
                {
                    'data': "amount",
                    render: function(data, type, row, meta) {
                        var amountWithR = 'R ' + data;

                        return amountWithR;
                    }

                },
                {
                    'data': "approvedStatus"
                },
                {
                    "data": "",
                    render: function(data, type, row, meta) {
                        var include = 'data-reqID="' + row['reqID'] + '" data-reqDate="' + row['reqDate'] + '"  data-payee="' + row['payee'] + '" data-address="' + row['address'] + '" data-amount="' + row['amount'] + '" data-amountInWords="' + row['amountInWords'] + '" data-sportNameAndCode="' + row['sportNameAndCode'] + '" data-firstVote="' + row['firstVote'] + '" data-availableBalance="' + row['availableBalance'] + '" data-confirmation="' + row['confirmation'] + '" data-detailsOfRequest="' + row['detailsOfRequest'] + '" data-firstApplicantName="' + row['firstApplicantName'] + '" data-firstStudentNumber="' + row['firstStudentNumber'] + '" data-firstCapacity="' + row['firstCapacity'] + '" data-firstSignature="' + row['firstSignature'] + '" data-secondApplicantName="' + row['secondApplicantName'] + '" data-secondStudentNumber="' + row['secondStudentNumber'] + '" data-secondCapacity="' + row['secondCapacity'] + '" data-secondSignature="' + row['secondSignature'] + '" data-sportUnoinTreasure="' + row['sportUnoinTreasure'] + '" data-sportUnoinTreasureDate="' + row['sportUnoinTreasureDate'] + '" data-sportUnionPresident="' + row['sportUnionPresident'] + '" data-sportUnoinPresidentDate="' + row['sportUnoinPresidentDate'] + '" data-srcTreasure="' + row['srcTreasure'] + '" data-srcTreasureDate="' + row['srcTreasureDate'] + '" data-srcPresident="' + row['srcPresident'] + '" data-srcPresidentDate="' + row['srcPresidentDate'] + '" data-certifiedCorrect="' + row['certifiedCorrect'] + '" data-certifiedDate="' + row['certifiedDate'] + '"  data-financeAmount="' + row['financeAmount'] + '"  data-financeVote="' + row['financeVote'] + '"  data-financeApproved="' + row['financeApproved'] + '" data-financeDate="' + row['financeDate'] + '" data-status="' + row['status'] + '"';
                        var view = '<button onclick="view_req(this)" ' + include + '  class="btn btn-info text-white pl-2 pr-2 btn-sm ml-1 mr-1" title="Edit Requisition" >' +
                            '<i class="fas fa-book-open"></i>' +
                            '</button>';
                        var deletes = '<button type="button"  onclick="swalDelete(this)" ' + include + '  class="btn btn-danger btn-sm text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Request" onclick=""> <i class="fa fa-trash"></i></button>';

                        return view + deletes;
                    }
                },
            ]
        });


    }

    function delete_req(reqID) {
        $.ajax({
            url: '<?php echo base_url('public/requisition/delete'); ?>',
            type: "post",
            data: {
                reqID: reqID
            },

            timeout: 0,

            cache: false,
            async: false,
            success: function(data) {

                if (data.error == false) {



                    setTimeout(function() {
                        Swal.fire({
                            icon: 'info',
                            title: 'Deleted successfully',
                            text: data.message,
                        })
                    }, 300);
                    load_table();
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

    function swalDelete(val) {

        Swal.fire({
            title: "Requisition No: " + $(val).attr('data-reqID'),
            text: "Are you sure about deleting this request?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: 'warning',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                delete_req($(val).attr('data-reqID'))
            }
        })
    }
</script>
<?php echo view('partial/signaturejs.php'); ?>