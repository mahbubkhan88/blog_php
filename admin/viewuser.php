    <?php
        $userid   = $_GET['userid'];
        if(!isset($userid) || $userid == NULL){
            echo"<script>window.location.href='?page=userlist.php'</script>";
        } else {
            $id = $userid;
        }
        $viewUser = $obj->viewUser($userid);
        $result   = mysqli_fetch_array($viewUser);
    ?>
<h2>User Details</h2>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo"<script>window.location.href='?page=userlist.php'</script>";
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
                    <input type="text" readonly value="<?php echo $result['name']; ?>" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Username</label>
                </td>
                <td>
                    <input type="text" readonly value="<?php echo $result['username']; ?>" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Email</label>
                </td>
                <td>
                    <input type="text" readonly value="<?php echo $result['email']; ?>" class="medium" />
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
                    <input type="submit" name="submit" Value="ok" />
                </td>
            </tr>
        </table>
    </form>
</div>