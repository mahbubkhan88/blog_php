<?php
    $msgid = $_GET['msgid'];
        if(!isset($msgid) || $msgid == NULL){
            echo"<script>window.location.href='?page=inbox.php'</script>";
        } else {
            $id =$msgid;
        }
        $viewMessage = $obj->viewMessage($msgid);
        $result = mysqli_fetch_array($viewMessage);
    ?>
<h2>View Message</h2>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo"<script>window.location.href='?page=inbox.php'</script>";
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
                    <input type="text" readonly value="<?php echo $result['firstname'].' '.$result['lastname']; ?>" class="medium" />
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
                <td>
                    <label>Date</label>
                </td>
                <td>
                    <input type="text" readonly value="<?php echo $result['current_date']; ?>" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Message</label>
                </td>
                <td>
                    <textarea class="tinymce" name="body"><?php echo $result['body']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Back" />
                </td>
            </tr>
        </table>
    </form>
</div>