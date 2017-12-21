<?php
    include_once'Blog_Classe.php';
    $obj = new Blog_Classe();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Basic Website</title>
    <meta name="language" content="English">
    <meta name="description" content="It is a website about education">
    <meta name="keywords" content="blog,cms blog">
    <meta name="author" content="Delowar">
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider({
                effect:'random',
                slices:10,
                animSpeed:500,
                pauseTime:5000,
                startSlide:0, //Set starting Slide (0 index)
                directionNav:false,
                directionNavHide:false, //Only show on hover
                controlNav:false, //1,2,3...
                controlNavThumbs:false, //Use thumbnails for Control Nav
                pauseOnHover:true, //Stop animation while hovering
                manualAdvance:false, //Force manual transitions
                captionOpacity:0.8, //Universal caption opacity
                beforeChange: function(){},
                afterChange: function(){},
                slideshowEnd: function(){} //Triggers after all slides have been shown
            });
        });
    </script>
</head>

<body>
<div class="headersection templete clear">
    <a href="index.php">
        <div class="logo">
        <?php
            $titlesloganShow = $obj->titlesloganShow();
                while($result = mysqli_fetch_array($titlesloganShow)){
        ?>
            <img src="images/<?php echo $result['logo']; ?>" alt="Logo"/>
            <h2><?php echo $result['title']; ?></h2>
            <p><?php echo $result['slogan']; ?></p>
        <?php } ?>
        </div>
    </a>
    <div class="social clear">
        <div class="icon clear">
    <?php
        $showSocial = $obj->homeSocialShow();
            while($result = mysqli_fetch_array($showSocial)){
    ?>
    <a href="<?php echo $result['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
    <a href="<?php echo $result['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
    <a href="<?php echo $result['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
    <a href="<?php echo $result['google']; ?>" target="_blank"><i class="fa fa-google"></i></a>
                <?php } ?>
        </div>
        <div class="searchbtn clear">
            <form action="?page=search.php" method="get">
                <input type="text" name="search" placeholder="Search keyword..."/>
                <input type="submit" name="submit" value="Search"/>
            </form>
        </div>
    </div>
</div>
<div class="navsection templete">
    <?php
    $path = $_SERVER['SCRIPT_FILENAME'];
    $currentpage = basename($path, '.php');
    ?>
    <ul>
        <li><a
            <?php if ($currentpage == 'index'){ echo 'id="active"'; } ?>
            href="index.php">Home</a></li>
        <?php
         $menuShow = $obj->menuShow();
        while($menu = mysqli_fetch_array($menuShow)){
        ?>
        <li><a
               <?php
                if(isset($_GET['pageid']) && $_GET['pageid'] == $menu['id']){
                    echo 'id="active"';
                }
                ?>
                href="?page=pages.php&pageid=<?php echo $menu['id']; ?>"><?php echo $menu['name']; ?></a>
        </li>
            <?php } ?>
        <li><a
            <?php if ($currentpage == 'contact'){ echo 'id="active"'; } ?>
            <a href="?page=contact.php">Contact</a>
        </li>
    </ul>
</div>
<div class="contentsection contemplete clear">

    <?php
    if(!$_GET['page']){
        include_once'slider.php';
    }
    ?>
    <div class="maincontent clear">
   <?php
    if(!empty($_GET['page'])){
        include_once $_GET['page'];
    }else{
        include_once "home.php";
    }
    ?>
    </div>
    <div class="sidebar clear">
        <div class="samesidebar clear">
            <h2>Categories</h2>
            <ul>
            <?php
                $blogShow = $obj->sideCategoryShow();
                while($result = mysqli_fetch_array($blogShow)){
            ?>
                <li><a href="?page=posts.php&categoryid=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
            <?php } ?>
            </ul>
        </div>

        <div class="samesidebar clear">
            <h2>Latest Articles</h2>
            <?php
                $sideBlogShow = $obj->sideBlogShow();
                while($result = mysqli_fetch_array($sideBlogShow)){
            ?>
            <div class="popular clear">
                <h3><a href="?page=post.php&id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h3>
                <a href="?page=post.php&id=<?php echo $result['id']; ?>"><img src="admin/upload/<?php echo $result['image']; ?>" alt=""/></a>
                <?php echo substr($result['body'],0,100) ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="footersection templete clear">
    <div class="footermenu clear">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Privacy</a></li>
        </ul>
    </div>
    <?php
        $showCopyright = $obj->footerCopyrightShow();
        while($result = mysqli_fetch_array($showCopyright)){
    ?>
    <p>Copyright &copy; <?php echo $result['note']; ?> <?php echo date('Y'); ?></p>
    <?php } ?>
</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>