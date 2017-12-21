<h2>Update Category</h2>
<?php
    $catid = $_GET['catid'];
    $editCategory = $obj->editCatForShow($catid);
    $result = mysqli_fetch_array($editCategory);
?>
<?php
    if(isset($_POST['Submit'])){
        $obj->categoryUpdate($catid,$_POST['categoryName']);
    }
?>
<div class="block copyblock">
    <form action="" method="post">
        <table class="form">
            <tr>
                <td>
                    <input type="text" name="categoryName" value="<?php echo $result['name']; ?>" required="" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="Submit" Value="Update" />
                </td>
            </tr>
        </table>
    </form>
</div>