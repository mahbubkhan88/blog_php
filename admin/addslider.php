<h2>Add New Slider</h2>
<?php
    if(isset($_POST['submit'])){
        $obj->sliderInsert($_POST['title'],$_FILES['image']);
    }
?>
<div class="block">
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="form">
            <tr>
                <td>
                    <label>Title</label>
                </td>
                <td>
                    <input type="text" name="title" placeholder="Enter Slider Title..." required="" class="medium" />
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
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Add Slider" />
                </td>
            </tr>
        </table>
    </form>
</div>
</div>