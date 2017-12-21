<?php
$pageId =  $_GET['pageid'];
if(!isset($pageId) || $pageId == NULL){
    echo"<script>window.location.href='?page=404.php'</script>";
} else {
    $id = $pageId;
}
?>

    <?php
        $PagesShow = $obj->PagesShow($pageId);
            while($result = mysqli_fetch_array($PagesShow)){
        ?>
    <div class="about">
        <h2><?php echo $result['name']; ?></h2>
        <?php echo $result['body']; ?>
    </div>
    <?php } ?>