<h2>Change Password</h2>
    <?php
        if(isset($_POST['submit'])){
            $obj->passwordUpdate($_POST['oldpassword'],$_POST['newpassword']);
        }
    ?>
<div class="block">
    <form action="" method="post">
        <table class="form">
            <tr>
                <td>
                    <label>Old Password</label>
                </td>
                <td>
                    <input type="password" placeholder="Enter Old Password..."  name="oldpassword" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>New Password</label>
                </td>
                <td>
                    <input type="password" placeholder="Enter New Password..." name="newpassword" class="medium" />
                </td>
            </tr>


            <tr>
                <td>
                </td>
                <td>
                    <input type="submit" name="submit" Value="Update" />
                </td>
            </tr>
        </table>
    </form>
</div>