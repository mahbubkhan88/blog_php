<div class="about">
    <?php
        if(isset($_POST['submit'])){
            $obj->insertMessage($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['body']);
        }
    ?>
    <h2>Contact us</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td>Your First Name:</td>
                <td>
                    <input type="text" name="firstname" placeholder="Enter first name" required="1"/>
                </td>
            </tr>
            <tr>
                <td>Your Last Name:</td>
                <td>
                    <input type="text" name="lastname" placeholder="Enter Last name" required="1"/>
                </td>
            </tr>

            <tr>
                <td>Your Email Address:</td>
                <td>
                    <input type="email" name="email" placeholder="Enter Email Address" required="1"/>
                </td>
            </tr>
            <tr>
                <td>Your Message:</td>
                <td>
                    <textarea name="body"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Submit"/>
                </td>
            </tr>
        </table>
    <form>
</div>

