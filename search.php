<?php
$searchid = $_GET['search'];
if(!isset($searchid) || $searchid == NULL){
    echo"<script>window.location.href='?page=404.php'</script>";
}else{
    $search = $searchid;
}
?>
    <?php
    $SearchPost = $obj->SearchPost();
        while($result = mysqli_fetch_array($SearchPost)){
        ?>

        <h2><a href="?page=post.php&id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
        <h4><?php echo $result['current_date']; ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
        <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>

        <?php echo $result['body']; ?>

        <div class="readmore clear">
            <a href="?page=post.php&id=<?php echo $result['id']; ?>">Read More</a>
        </div>
    <?php } ?>
<!--            <p>Your Search Not Found !!</p>-->