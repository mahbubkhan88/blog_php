<?php session_start(); ?>
<?php
//    $log = $_SESSION['login'];
//        if($log=='login'){
//    ?>
<?php
    include_once "../Blog_Classe.php";
    $obj = new Blog_Classe();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/table/demo_page.css" />
    <link rel="stylesheet" type="text/css" href="css/fancy-button/fancy-button.css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.progressbar.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- jQuery dialog related-->
    <script src="js/jquery-ui/jquery.effects.blind.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.explode.min.js" type="text/javascript"></script>
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
            setSidebarHeight();
        });
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
    <style type="text/css">
        #tinymce{font-size:15px !important;}
    </style>
</head>
<body>
<div class="container_12">
    <div class="grid_12 header-repeat">
        <div id="branding">
            <div class="floatleft logo">
                <img src="img/livelogo.png" alt="Logo" />
            </div>
            <div class="floatleft middle">
                <h1>Khan Tutorials</h1>
                <p>www.khantutorials.com</p>
            </div>
            <div class="floatright">
                <div class="floatleft">
                    <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                <div class="floatleft marginleft10">
                    <ul class="inline-ul floatleft">
                        <li>Hello Admin</li>
<!--                        --><?php
//                            if(isset($_SESSION['user_name'])) {
//                                echo $_SESSION['user_name'];
//                            }
//                        ?>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
    <div class="clear">
    </div>
    <div class="grid_12">
        <ul class="nav main">
            <li class="ic-dashboard"><a href="home.php"><span>Dashboard</span></a> </li>
            <li class="ic-form-style"><a href="?page=theme.php"><span>Theme</span></a></li>
            <li class="ic-typography"><a href="?page=changepassword.php"><span>Change Password</span></a></li>
            <li class="ic-grid-tables"><a href="?page=inbox.php"><span>Inbox</span></a></li>
            <li class="ic-charts"><a href="?page=adduser.php"><span>Add User</span></a></li>
            <li class="ic-form-style"><a href="?page=profile.php"><span>User Profile</span></a></li>
            <li class="ic-charts"><a href="?page=userlist.php"><span>User List</span></a></li>
        </ul>
    </div>
    <div class="clear">
    </div>
    <div class="grid_2">
        <div class="box sidemenu">
            <div class="block" id="section-menu">
                <ul class="section menu">
                    <li><a class="menuitem">Site Option</a>
                        <ul class="submenu">
                            <li><a href="?page=titleslogan.php">Title & Slogan</a></li>
                            <li><a href="?page=social.php">Social Media</a></li>
                            <li><a href="?page=copyright.php">Copyright</a></li>

                        </ul>
                    </li>

                    <li><a class="menuitem">Page Option</a>
                        <ul class="submenu">
                            <li><a href="?page=addpage.php">Add New Page</a> </li>
                            <?php
                                $titlesloganShow = $obj->pageShow();
                                    while($result = mysqli_fetch_array($titlesloganShow)){
                            ?>
                            <li><a href="?page=pages.php&pageid=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li><a class="menuitem">Category Option</a>
                        <ul class="submenu">
                            <li><a href="?page=addcat.php">Add Category</a> </li>
                            <li><a href="?page=catlist.php">Category List</a> </li>
                        </ul>
                    </li>
                    <li><a class="menuitem">Slider Option</a>
                        <ul class="submenu">
                            <li><a href="?page=addslider.php">Add Slider</a> </li>
                            <li><a href="?page=sliderlist.php">Slider List</a> </li>
                        </ul>
                    </li>
                    <li><a class="menuitem">Post Option</a>
                        <ul class="submenu">
                            <li><a href="?page=addpost.php">Add Post</a> </li>
                            <li><a href="?page=postlist.php">Post List</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="grid_10">

        <div class="box round first grid">
            <?php
            if(!empty($_GET['page'])){
                include_once $_GET['page'];
            }else{
                include_once "home.php";
            }
            ?>
        </div>
    </div>
    <div class="clear">
    </div>
</div>
<div class="clear">
</div>
<div id="site_info">
    <p>
        &copy; Copyright <a href="">KhanTutorials</a>. All Rights Reserved.
    </p>
</div>
</body>
</html>
<?php
//    }else{
//        session_destroy();
//        echo"<script>window.location.href='index.php'</script>";
//    }
//?>
