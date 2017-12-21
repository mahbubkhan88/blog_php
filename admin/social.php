<h2>Update Social Media</h2>
<div class="block">
    <?php
    $showSociall = $obj->sociadlShow();
    while($resultl = mysqli_fetch_array($showSociall)){
        ?>

        <?php
        if(isset($_POST['update'])){
            $obj->socialUpdate($_POST['facebook'],$_POST['twitter'],$_POST['linkedin'],$_POST['google']);
            }
        ?>
        <form action="" method="POST">
        <table class="form">
            <tr>
                <td>
                    <label>Facebook</label>
                </td>
                <td>
                    <input type="text" name="facebook" value="<?php echo $resultl['facebook']; ?>" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Twitter</label>
                </td>
                <td>
                    <input type="text" name="twitter" value="<?php echo $resultl['twitter']; ?>" class="medium" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>LinkedIn</label>
                </td>
                <td>
                    <input type="text" name="linkedin" value="<?php echo $resultl['linkedin']; ?>" class="medium" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>Google</label>
                </td>
                <td>
                    <input type="text" name="google" value="<?php echo $resultl['google']; ?>" class="medium" />
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
    <?php } ?>
</div>