<div class="about">
    <?php
        if(!isset($_GET['id']) || $_GET['id'] == NULL){
            echo"<script>window.location.href='404.php'</script>";
        } else {
            $id  = $_GET['id'];
            $singleBlogShow = $obj->singleBlogShow($id);
            while ($result = mysqli_fetch_array($singleBlogShow)){
    ?>
    <h2><?php echo $result['title']; ?></h2>
    <h4><?php echo $result['current_date']; ?> PM By, <a href="#"> <?php echo $result['author']; ?></a></h4>
    <img src="admin/upload/<?php echo $result['image']; ?>" alt=""/>
    <p><?php echo $result['body']; ?></p>
     <?php } } ?>


    <div class="relatedpost clear">
        <h2>Related Articles</h2>
    <?php
        $singleBlogShow = $obj->singleBlogShow($id);
        $rel_id = mysqli_fetch_array($singleBlogShow);
         $cat_id =  $rel_id['cat'];

        $blogShow = $obj->relatedPostShow($cat_id);
        while($result = mysqli_fetch_array($blogShow)){
    ?>
        <a href="?page=post.php&id=<?php echo $result['id']; ?>"><img src="admin/upload/<?php echo $result['image']; ?>" alt=""/></a>
    <?php } ?>
    </div>
</div>