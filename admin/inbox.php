<div class="box round first grid">
    <h2>Inbox</h2>
<!--    --><?php
//    $msgseenid = mysqli_real_escape_string($db->link, $_GET['seenid']);
//    if(isset($msgseenid)){
//        $seenid = $msgseenid;
//        $query = "UPDATE tbl_contact SET status = '1' WHERE id = '$seenid'";
//        $updatecat = $db->update($query);
//        if($updatecat){
//            echo "<span class='success'>Message sent in the seen Box</span>";
//        } else {
//            echo "<span class='error'>Something Wrong !</span>";
//        }
//    }
//    ?>
    <div class="block">
        <table class="data display" id="example">
            <thead>
            <tr>
                <th width="5%">SL No.</th>
                <th width="15%">Name</th>
                <th width="15%">Email</th>
                <th width="30%">Message</th>
                <th width="18%">Date</th>
                <th width="17%">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_GET['deleteMsg'])){
                        $deleteMessage = $_GET['deleteMsg'];
                        $delMsg = $obj->messageDelete($deleteMessage);
                        if($delMsg){
                            echo "<span style='color:green; font-size: 18px;'>Message Deleted Successfully</span>";
                            echo "<script>window.location.href='?page=inbox.php'</script>";
                        } else {
                            echo "<span style='color:red; font-size: 18px;'>Message Not Deleted !</span>";
                            echo "<script>window.location.href='?page=inbox.php'</script>";
                        }
                    }

                $messageShow = $obj->messageShow();
                        while ($result = mysqli_fetch_array($messageShow)){
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $result['id']; ?></td>
                    <td><?php echo $result['firstname'].' '.$result['lastname']; ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo substr($result['body'],0,50) ?>....</td>
                    <td><?php echo $result['current_date']; ?></td>
                    <td>
                        <a href="?page=viewmsg.php&msgid=<?php echo $result['id']; ?>">View</a> ||
                        <a href="?page=replymsg.php&msgid=<?php echo $result['id']; ?>">Reply</a> ||
                        <a onclick="return confirm('Are you sure to Delete!');" href="?page=inbox.php&deleteMsg=<?php echo $result['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>