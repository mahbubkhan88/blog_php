<h2>Add New User</h2>
<div class="block copyblock">
    <?php
        if(isset($_POST['submit'])){
            $obj->insertUser($_POST['username'],$_POST['password'],$_POST['role']);
        }
    ?>
    <form action="" method="post">
        <table class="form">
            <tr>
                <td>
                    <label>Username</label>
                </td>
                <td>
                    <input type="text" name="username" placeholder="Enter Username..." class="medium" requierd />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Password</label>
                </td>
                <td>
                    <input type="text" name="password" placeholder="Enter Password..." class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>User Role</label>
                </td>
                <td>
                    <select id="select" name="role">
                        <option>Select Your User Role</option>
                        <option value="0">Admin</option>
                        <option value="1">Author</option>
                        <option value="2">Editor</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Create" />
                </td>
            </tr>
        </table>
    </form>
</div>