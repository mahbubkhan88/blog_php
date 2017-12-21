<h2>Update Copyright Text</h2>
<div class="block copyblock">
    <?php
        $copyrightShow = $obj->copyrightShow();
            while($result = mysqli_fetch_array($copyrightShow)){
    ?>
    <?php
        if(isset($_POST['submit'])){
            $obj->copyrightUpdate($_POST['copyright']);
        }
    ?>
    <form action="" method="post">
        <table class="form">
            <tr>
                <td>
                    <label>Copyright Option</label>
                </td>
                <td>
                    <input type="text" value="<?php echo $result['note']; ?>" name="copyright" required="" class="large" />
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
    <?php } ?>
</div>