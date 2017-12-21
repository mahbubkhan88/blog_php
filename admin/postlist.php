<h2>Post List</h2>
<div class="block">
    <table class="data display" id="example">
        <thead>
        <tr>
            <th width="5%">SL No</th>
            <th width="15%">Post Title</th>
            <th width="15%">Description</th>
            <th width="10%">Category</th>
            <th width="10%">Image</th>
            <th width="10%">Author</th>
            <th width="10%">Tags</th>
            <th width="10%">Date</th>
            <th width="15%">Action</th>
        </tr>
        </thead>
    <?php
    if(isset($_GET['deletePost'])){
        $deletePost = $_GET['deletePost'];
        $delPost = $obj->postDelete($deletePost);
        if($delPost){
            echo "<span style='color:green; font-size: 18px;'>Post Deleted Successfully</span>";
            echo "<script>window.location.href='?page=postlist.php'</script>";
        } else {
            echo "<span style='color:red; font-size: 18px;'>Post Not Deleted !</span>";
            echo "<script>window.location.href='?page=postlist.php'</script>";
        }
    }

        $postListShow = $obj->postListShow();
            while ($result = mysqli_fetch_array($postListShow)){
        ?>
        <tbody>
        <tr class="odd gradeX">
            <td><?php echo $result['id']; ?></td>
            <td><?php echo $result['title']; ?></td>
            <td><?php echo substr($result['body'],0,60) ?>....</td>
            <td><?php echo $result['name']; ?></td>
            <td><img src="../admin/upload/<?php echo $result['image']; ?>" height="60px" width="100px"/></td>
            <td><?php echo $result['author']; ?></td>
            <td><?php echo $result['tags']; ?></td>
            <td><?php echo $result['current_date']; ?></td>
            <td>
                <a href="?page=editpost.php&postid=<?php echo $result['id']; ?>">Edit</a> ||
                <a onclick="return confirm('Are you sure to Delete!');" href="?page=postlist.php&deletePost=<?php echo $result['id']; ?>">Delete</a>
            </td>
        </tr>
        </tbody>
         <?php } ?>
    </table>
</div>