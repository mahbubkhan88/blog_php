<h2>Add New Page</h2>
    <?php
        if(isset($_POST['submit'])){
            $obj->insertPage($_POST['name'],$_POST['body']);
    }
?>
<div class="block">
    <form action="" method="POST">
        <table class="form">
            <tr>
                <td>
                    <label>Name</label>
                </td>
                <td>
                    <input type="text" name="name" placeholder="Enter Post Title..." required="" class="medium" />
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
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Create Page" />
                </td>
            </tr>
        </table>
    </form>
</div>