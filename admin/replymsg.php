    <?php
        $msgid = $_GET['msgid'];
            if(!isset($msgid) || $msgid == NULL){
                echo"<script>window.location.href='?page=inbox.php'</script>";
            } else {
                $id = $msgid;
        }
            $replyMessage = $obj->replyMessage($msgid);
            $result = mysqli_fetch_array($replyMessage);
    ?>
<h2>Reply Message</h2>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $to      = $_POST['toEmail'];
        $from    = $_POST['fromEmail'];
        $subject = $_POST['subject'];
        $message =  $_POST['message'];

        $sendmail = mail($to, $from, $subject, $message);
        if($sendmail){
            echo "<span style='color:green; font-size: 18px;'>Message Sent Successfully</span>";
        } else {
            echo "<span style='color:red; font-size: 18px;'>Message Not Sent !</span>";
        }
    }
    ?>
<div class="block">
    <form action="" method="POST">
        <table class="form">
            <tr>
                <td>
                    <label>To</label>
                </td>
                <td>
                    <input type="text" readonly name="toEmail" value="<?php echo $result['email']; ?>" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>From</label>
                </td>
                <td>
                    <input type="text" name="fromEmail" placeholder="Please enter your email address" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Subject</label>
                </td>
                <td>
                    <input type="text" name="subject" placeholder="Please enter subject" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Message</label>
                </td>
                <td>
                    <textarea class="tinymce" name="message"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Send" />
                </td>
            </tr>
        </table>
    </form>
</div>