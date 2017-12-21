<h2>Update Profile</h2>
    <?php
    $userid   = $_SESSION['$userid'];
    $editUser = $obj->editUserForShow($userid);
    $result   = mysqli_fetch_array($editUser);
    ?>
    <?php
        if(isset($_POST['update'])){
            $obj->profileUpdate($userid,$_POST['name'],$_POST['username'],$_POST['email'],$_POST['details']);
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
                    <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Username</label>
                </td>
                <td>
                    <input type="text" name="username" value="<?php echo $result['username']; ?>" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Email</label>
                </td>
                <td>
                    <input type="text" name="email" value="<?php echo $result['email']; ?>" class="medium" />
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-top: 9px;">
                    <label>Details</label>
                </td>
                <td>
                    <textarea class="tinymce" name="details"><?php echo $result['details']; ?></textarea>
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