<h2>Update Post</h2>
    <?php
        $sliderid = $_GET['sliderid'];
        $editSlider = $obj->editSliderForShow($sliderid);
        $result = mysqli_fetch_array($editSlider);
    ?>
    <?php
        if(isset($_POST['submit'])){
            $obj->sliderUpdate($sliderid,$_POST['title'],$_FILES['image']);
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
                        <input type="text" name="title" value="<?php echo $result['title']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>New Image</label>
                    </td>
                    <td>
                        <img src="slider/<?php echo $result['image']; ?>" height="80px" width="200px"/><br/>
                        <input type="file" name="image" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
        </form>
</div>