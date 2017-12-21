<style>
    .leftside{float: left; width: 70%}
    .rightside{float: left; width: 20%}
    .rightside img{height: 160px; width: 170px;}
</style>
<h2>Update Site Title and Description</h2>
    <?php
        $titlesloganShow = $obj->titleloganShow();
            while($result = mysqli_fetch_array($titlesloganShow)){
    ?>

    <?php
//        if(isset($message)){
//        echo $message;
//    }
    if(isset($_POST['submit'])){
        $obj->titleloganUpdate($_POST['title'],$_POST['slogan'],$_FILES['logo']);
    }
    ?>
<div class="block sloginblock">
    <div class="leftside">
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Website Title</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['title']; ?>"  name="title" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Website Slogan</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['slogan']; ?>" name="slogan" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Logo</label>
                    </td>
                    <td>
                        <input type="file" name="logo" />
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="rightside">
        <img src="../images/<?php echo $result['logo']; ?>" alt="logo" height="60px" width="100px"/>
    </div>
</div>
<?php } ?>






