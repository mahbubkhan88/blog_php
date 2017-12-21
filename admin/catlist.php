<h2>Category List</h2>
<div class="block">
    <table class="data display" id="example">
        <thead>
        <tr>
            <th>Serial No</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
        </thead>
    <?php
    if(isset($_GET['deleteCat'])){
        $deleteCat = $_GET['deleteCat'];
        $delCat = $obj->categoryDelete($deleteCat);
        if($delCat){
            echo "<span style='color:green; font-size: 18px;'>Category Deleted Successfully</span>";
            echo "<script>window.location.href='?page=catlist.php'</script>";
        } else {
            echo "<span style='color:red; font-size: 18px;'>Category Not Deleted !</span>";
            echo "<script>window.location.href='?page=catlist.php'</script>";
        }
    }

        $catShow = $obj->categoryShow();
        $i=1;
            while ($result = mysqli_fetch_array($catShow)){
    ?>
        <tbody>
            <?php if( $i%2!=0){  ?>
                      <tr class="odd gradeX">
               <?php  } else{ ?>
                       <tr class="odd gradeC">
            <?php }?>

            <td><?php echo $result['id']; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td>
                <a href="?page=editcat.php&catid=<?php echo $result['id']; ?>">Edit</a> ||
                <a onclick="return confirm('Are you sure to Delete!');" href="?page=catlist.php&deleteCat=<?php echo $result['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php $i++; } ?>
        </tbody>
    </table>
</div>