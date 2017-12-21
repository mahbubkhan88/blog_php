<h2>User List</h2>
<div class="block">
    <table class="data display" id="example">
        <thead>
        <tr>
            <th>SL No</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Details</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php
        if(isset($_GET['deleteUser'])){
            $deleteUser = $_GET['deleteUser'];
            $delUser = $obj->userDelete($deleteUser);
            if($delUser){
                echo "<span style='color:green; font-size: 18px;'>User Deleted Successfully</span>";
                echo "<script>window.location.href='?page=userlist.php'</script>";
            } else {
                echo "<span style='color:red; font-size: 18px;'>User Not Deleted !</span>";
                echo "<script>window.location.href='?page=userlist.php'</script>";
            }
        }

        $userListShow = $obj->userListShow();
        while ($result = mysqli_fetch_array($userListShow)){
            ?>
        <tbody>
            <tr class="odd gradeX">
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['name']; ?></td>
                <td><?php echo $result['username']; ?></td>
                <td><?php echo $result['email']; ?></td>
                <td><?php echo substr($result['details'],0,50); ?>...</td>
                <td>
                    <?php
                    if($result['role'] == '0'){
                        echo "Admin";
                    }elseif ($result['role'] == '1'){
                        echo "Author";
                    }elseif ($result['role'] == '2'){
                        echo "Editor";
                    }
                    ?>
                </td>
                <td>
                    <a href="?page=viewuser.php&userid=<?php echo $result['id']; ?>">View</a> ||
                    <a onclick="return confirm('Are you sure to Delete!');" href="?page=userlist.php&deleteUser=<?php echo $result['id']; ?>">Delete</a>
                </td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
</div>