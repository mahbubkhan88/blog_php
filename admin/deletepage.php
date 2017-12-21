<?php
    if(isset($_GET['pageId'])){
        $deletePage = $_GET['pageId'];
        $delPage = $obj->pageDelete($deletePage);
        if($delPage){
            echo "<span style='color:green; font-size: 18px;'>Page Deleted Successfully</span>";
            echo "<script>window.location.href='?page=addpage.php'</script>";
        } else {
            echo "<span style='color:red; font-size: 18px;'>Page Not Deleted !</span>";
            echo "<script>window.location.href='?page=addpage.php'</script>";
        }
    }
    ?>