<?php helper(['database', 'url']); ?>

<nav class="navbar navbar-dark bg-white fixed-top border">

    <div class="container-fluid">

        <button class="navbar-toggler text-secondary border border-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" onclick="containerWidthResize()">
            <span class=""><i class="fa-solid fa-bars"></i></span>
        </button>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>


        <div class="offcanvas offcanvas-start border-right" style="margin-top:58px;background-color:white;max-width:300px" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header " style="margin-left:42px">
                <div class="app-sidebar--header ">

                    <h3 class=" text-dark lead fonttype"> SPORTS OFFICE </h3>
                </div>

            </div>

            <div>


                <ul id="style-10" class="sidebar-menu scroll">
                    <li><span class="nav-section-title"></span></li>
                    <li aria-expanded="true" class=" have-children"><a href="#"><span class="fa fa-university text-dark"></span>Add Member</a>
                        <ul>
                            <li class="mm-active"><a href="<?php echo base_url('public/addstaff'); ?>">Add Staff</a>
                            </li>
                            <li class="mm-active"><a href="<?php echo base_url('public/addstudent'); ?>">Add Student</a>
                            </li>
                            <li class="mm-active"><a href="<?php echo base_url('public/addcoach'); ?>">Add Coach</a>
                            </li>
                        </ul>
                    </li>
                    <li class="have-children"><a href="#"><span class="fa fa-tags"></span>Noticeboard</a>
                        <ul>
                            <li class="mm-active"><a href="<?php echo base_url('public/noticeboard'); ?>">View Noticeboard</a>

                        </ul>
                    </li>
                    <li class="have-children"><a href="#"><span class="fa fa-trophy"></span>Inventory</a>
                        <ul>
                            <li class="mm-active"><a href="<?php echo base_url('public/inventory'); ?>">View inventory</a>

                        </ul>
                    </li>
                    <li class="have-children"><a href="#"><span class="fa fa-gavel"></span>Requisition</a>
                        <ul>
                            <li><a href="<?php echo base_url('public/requisition'); ?>">View Requisition</a></li>
                        </ul>
                    </li>
                    <li class="have-children"><a href="#"><span class="fa fa-gavel"></span>Chat</a>
                        <ul>
                            <li><a href="<?php echo base_url('public/chat'); ?>">View Chats</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="fa fa-picture-o"></span>Gallery</a></li>
                    <li class="have-children"><a href="#"><span class="fa fa-flag"></span>Reports</a>
                        <ul>
                            <li><a href="#">View Judging points</a></li>
                            <li><a href="#">Create Acceptances List</a></li>
                            <li><a href="#">Create Awarded List</a></li>
                            <li><a href="#">View Candidates for Awards</a></li>
                            <li><a href="responsive_table.html">Send Report Cards</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="fa fa-envelope-o"></span>Messages</a></li>
                    <li><a href="#"><span class="fa fa-gear"></span>Configuration</a></li>
                    <div class="app-sidebar--footer d-block text-center py-3">
                        <a href="<?php echo base_url('public/logout'); ?>" class="btn btn-warning btn-sm font-weight-bold" title="">
                            Logout
                        </a>
                    </div>
                </ul>


            </div>
        </div>
</nav>

<script>
    function containerWidthResize() {
        if ($('.container').hasClass("page-wrap") && $('.container').hasClass("sections")) {
            $('.container').removeClass("page-wrap");
            $('.container').removeClass("sections");
            $('.container').addClass("sectionsUndo");
        } else {
            $('.container').addClass("page-wrap");
            $('.container').addClass("sections");
            $('.container').removeClass("sectionsUndo");

        }
    }
</script>
<?php echo view('partial/sidebarjs'); ?>