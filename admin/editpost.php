<h2>Update Post</h2>
<?php
    $postid = $_GET['postid'];
    $editPost = $obj->editPostForShow($postid);
    $result = mysqli_fetch_array($editPost);
?>
<?php
if(isset($_POST['update'])){
    $obj->postUpdate($postid,$_POST['cat'],$_POST['title'],$_POST['body'],$_FILES['image'],$_POST['tags'],$_POST['author']);
}
?>
<div class="block">
    <form action="" method="post" enctype="multipart/form-data">
        <table class="form">
            <tr>
                <td>
                    <label>Title</label>
                </td>
                <td>
                    <input type="text" name="title" value="<?php echo $result['title']; ?>" required="" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Category</label>
                </td>
                <td>
                    <select id="select" name="cat" required="" />
                        <option>Select Category</option>
                        <?php
                            $query = $obj->showAllCategory();
                                while ($row = mysqli_fetch_array($query)){
                        ?>

                        <option
                            <?php
                            if($result['cat'] == $row['id']){ ?>
                                selected="selected"
                                <?php } ?>
                            value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Upload Image</label>
                </td>
                <td>
                    <img src="../admin/upload/<?php echo $result['image']; ?>" height="80px" width="200px"/><br/>
                    <input type="file" name="image" />
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-top: 9px;">
                    <label>Content</label>
                </td>
                <td>
                    <textarea class="tinymce" name="body"><?php echo $result['body']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Tags</label>
                </td>
                <td>
                    <input type="text" name="tags" value="<?php echo $result['tags']; ?>" required="" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Author</label>
                </td>
                <td>
                    <input type="text" name="author" value="<?php echo $result['author']; ?>" required="" class="medium" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="update" Value="Update" />
                </td>
            </tr>
        </table>
    </form>
</div>