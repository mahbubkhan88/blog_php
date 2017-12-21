<?php
    if(isset($_GET['deleteSlider'])){
        $deleteSlider = $_GET['deleteSlider'];
        $delSlider = $obj->sliderDelete($deleteSlider);
        if($delSlider){
            echo "<span style='color:green; font-size: 18px;'>Slider Deleted Successfully</span>";
            echo "<script>window.location.href='?page=sliderlist.php'</script>";
        } else {
            echo "<span style='color:red; font-size: 18px;'>Slider Not Deleted !</span>";
            echo "<script>window.location.href='?page=sliderlist.php'</script>";
        }
    }
    ?>