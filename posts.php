<?php
if(!isset($_GET['categoryid']) || $_GET['categoryid'] == NULL){
    echo"<script>window.location.href='?page=404.php'</script>";
}else{
    $id = $_GET['categoryid'];
}
?>

<?php
$IDWiseCatShow = $obj->IDWiseCatShow($id);
while($result = mysqli_fetch_array($IDWiseCatShow)){
    ?>
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
<?php } ?>

<!--<h1 style="font-size: 30px; text-align: center; color: red;">No Post Available in this Category.</h1>-->
