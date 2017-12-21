<h2>Add New Post</h2>
    <?php
        if(isset($_POST['Submit'])){
            $obj->insertPost($_POST['cat'],$_POST['title'],$_FILES['image'],$_POST['body'],$_POST['tags'],$_POST['author']);
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
                    <input type="text" name="title" placeholder="Enter Post Title..." required="" class="medium" />
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
                                while ($result = mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Upload Image</label>
                </td>
                <td>
                    <input type="file" name="image" required="" />
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-top: 9px;">
                    <label>Content</label>
                </td>
                <td>
                    <textarea class="tinymce" name="body"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Tags</label>
                </td>
                <td>
                    <input type="text" name="tags" placeholder="Enter Post Tags..." required="" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Author</label>
                </td>
                <td>
                    <input type="text" name="author" placeholder="Enter Post Author..." required="" class="medium" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="Submit" Value="Submit" />
                </td>
            </tr>
        </table>
    </form>
</div>