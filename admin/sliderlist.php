<h2>Slider List</h2>
<div class="block">
    <table class="data display" id="example">
        <thead>
        <tr>
            <th>SL No</th>
            <th>Slider Title</th>
            <th>Slider Image</th>
            <th>Action</th>
        </tr>
        </thead>
    <?php
        $sliderShow = $obj->sliderShow();
            while ($result = mysqli_fetch_array($sliderShow)){
    ?>
        <tbody>
            <tr class="odd gradeX">
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['title']; ?></a></td>
                <td><img src="slider/<?php echo $result['image']; ?>" height="130px" width="250px"/></td>
                <td>
                    <a href="?page=editslider.php&sliderid=<?php echo $result['id']; ?>">Edit</a> ||
                    <a onclick="return confirm('Are you sure to Delete!');" href="?page=deleteslider.php&deleteSlider=<?php echo $result['id']; ?>">Delete</a>
                </td>
            </tr>
        </tbody>
                <?php } ?>
    </table>

</div>