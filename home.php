<?php
    //All Post Show in Home Page
    $blogShow = $obj->blogShow();
        while($result = mysqli_fetch_array($blogShow)){
?>
        <!--Start pagination-->
<!--        --><?php
//            $per_page = 5;
//            if(isset($_GET["page"])){
//                $page = $_GET["page"];
//            }else{
//                $page=1;
//            }
//            $start_form = ($page-1) * $per_page;
//            ?>
        <!--end pagination-->
<div class="samepost clear">
    <h2><a href="?page=post.php&id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
    <h4><?php echo $result['current_date']; ?> PM By, <a href="#"> <?php echo $result['author']; ?></a></h4>
    <a href="#"><img src="admin/upload/<?php echo $result['image']; ?>" alt="post image"/></a>
    <p>
        <?php echo substr($result['body'],0,200) ?>.....
    </p>
    <div class="readmore clear">
        <a href="?page=post.php&id=<?php echo $result['id']; ?>">Read More</a>
    </div>
</div>
    <?php  } ?>

    <!--Start pagination-->
<!--    --><?php
//    $paginationShow = $obj->paginationShow();
//    while($result = mysqli_fetch_array($paginationShow)){
//    $total_rows = mysqli_num_rows($result);
//    $total_page = ceil($total_rows/$per_page);
//
//    echo "<span class='pagination'><a href='index.php?page=1'>".'Prev'."</a>";
//    for ($i=1; $i<=$total_page; $i++){
//        echo "<a href='?page=index.php&page=".$i."'>".$i."</a>";
//    }
//    echo "<a href='?page=index.php&page=$total_page'>".'Next'."</a></span>" ?>
<!--    --><?php //} ?>
    <!--end pagination-->