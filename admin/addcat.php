<h2>Add New Category</h2>
    <?php
        if(isset($_POST['Submit'])){
            $obj->categoryInsert($_POST['categoryName']);
        }
    ?>
<div class="block copyblock">
    <form action="" method="post">
        <table class="form">
            <tr>
                <td>
                    <label>Category Option</label>
                </td>
                <td>
                    <input type="text" name="categoryName" placeholder="Enter Category Name..." required="" class="medium" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="Submit" Value="Submit" />
                </td>
            </tr>
        </table>
    </form>
</div>