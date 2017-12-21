<div class="slidersection templete clear">
    <div id="slider">
    <?php
        $sliderShow = $obj->homeSliderShow();
            while($result = mysqli_fetch_array($sliderShow)){
    ?>
                <a href="#"><img src="admin/slider/<?php echo $result['image']; ?>" alt="<?php echo $result['title']; ?>" title="<?php echo $result['title']; ?>" /></a>
    <?php } ?>
    </div>
</div>