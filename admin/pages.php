<style>
    .deletepage{margin-left: 10px;}
    .deletepage a{background: #f0f0f0 no-repeat scroll 0 0; border: 1px solid #ddd; color: #444; cursor: pointer; font-size: 20px; padding: 4px 10px; font-weight: normal; }
</style>
<h2>Update Page</h2>
<div class="block">
    <?php
        $id = $_GET['pageid'];
        $pageShow = $obj->editPageForShow($id);
            while($result = mysqli_fetch_array($pageShow)){
    ?>
    <?php
        if(isset($_POST['update'])){
            $obj->pageUpdate($id,$_POST['name'],$_POST['body']);
    }
    ?>
    <form action="" method="POST">
        <table class="form">
            <tr>
                <td>
                    <label>Name</label>
                </td>
                <td>
                    <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
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
                <td></td>
                <td>
                    <input type="submit" name="update" Value="Update Page" />
                    <span class="deletepage"><a onclick="return confirm ('Are you sure to Delete this Page!');" href="?page=deletepage.php&pageId=<?php echo $result['id']; ?>">Delete Page</a></span>
                </td>
            </tr>
        </table>
    </form>
    <?php } ?>
</div>