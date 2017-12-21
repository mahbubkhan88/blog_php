<h2>Change Theme</h2>
<div class="block copyblock">

<!--    --><?php
//        if(isset($_POST['submit'])){
//            $obj->themeUpdate($_POST['default'],$_POST['green'],$_POST['blue']);
//        }
//        ?>
<!---->
<!--        --><?php
//            $theme = $obj->theme();
//                while($result = mysqli_fetch_array($theme)){
//            ?>
        <form action="" method="post">
            <table class="form">
                <tr>
                    <td>
                        <input <?php if($result['theme'] == 'default') {echo "checked";}?> type="radio" name="default" value="default"/>Default
                    </td>
                </tr>
                <tr>
                    <td>
                        <input <?php if($result['theme'] == 'green') {echo "checked";}?> type="radio" name="green" value="green"/>Green
                    </td>
                </tr>
                <tr>
                    <td>
                        <input <?php if($result['theme'] == 'blue') {echo "checked";}?> type="radio" name="blue" value="blue"/>Blue
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" Value="Change" />
                    </td>
                </tr>
            </table>
        </form>
<!--        --><?php //} ?>
</div>