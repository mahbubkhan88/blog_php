<?php
class Blog_Classe{
    public $localhost = "localhost";
    public $username  = "root";
    public $password  = "";
    public $dbname    = "db_tutorial";
    public $connect_db;

    public function __construct(){
        $this->connect_db = new mysqli($this->localhost,$this->username,$this->password,$this->dbname);
            if($this->connect_db->connect_error){
                echo mysqli_connect_error()."Database is not connectes !";
            } else {
                //echo "Database is connected";
            }
    }

    //Admin Login Query
    public function adminLogin($username,$password){
        $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($this->connect_db,$query);
        return $result;
    }

    //Category Insert Query in Admin Panel
    public function categoryInsert($name){
        $insert = "INSERT INTO tbl_category (name) VALUES ('$name')";
        if(!mysqli_query($this->connect_db, $insert)){
            echo "<span style='color:red; font-size: 18px;'>Category Not Inserted !</span>";
        } else {
            echo "<span style='color:green; font-size: 18px;'>Category Inserted Successfully</span>";
        }
    }

    //Category Show Query in Admin Panel
    public function categoryShow(){
        $Show = "SELECT * FROM tbl_category ORDER BY id ASC";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Category Edit for Show Querty in Admin Panel
    public function editCatForShow($id){
        $Show = "SELECT * FROM tbl_category where id = '$id'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Category Update Query in Admin Panel
    public function categoryUpdate($id,$name){
        $update = "UPDATE tbl_category SET name='$name' WHERE id='$id'";
        if(!mysqli_query($this->connect_db,$update)){
            echo "<span style='color:red; font-size: 18px;'>Category Not Updated !</span>";
        }else{
            echo "<span style='color:green; font-size: 18px;'>Category Updated Successfully</span>";
            echo "<script>window.location.href='?page=catlist.php'</script>";
        }
    }

    //Category Delete Query in Admin Panel
    public function categoryDelete($id){
        $delete = "DELETE FROM tbl_category WHERE id = '$id'";
        $res = mysqli_query($this->connect_db,$delete);
        return $res;
    }

    //Post Insert Query in Admin Panel
    public function insertPost($cat,$title,$image,$body,$tags,$author){
        $imagesource = $image["tmp_name"];
        $image = $image["name"];
        $insert = "INSERT INTO tbl_post (cat,title,image,body,tags,author) VALUES ('$cat', '$title', '$image', '$body', '$tags', '$author')";
        if(!mysqli_query($this->connect_db,$insert)){
            echo "<span style='color:red; font-size: 18px;'>Post Not Inserted !</span>";
        } else {
            move_uploaded_file($imagesource, "../admin/upload/" . $image);
            echo "<span style='color:green; font-size: 18px;'>Post Inserted Successfully</span>";
        }
    }

    //Show Cateogory in Admin Panel Query When Insert Post
    public function showAllCategory(){
        $query = "SELECT * FROM tbl_category";
        $result = mysqli_query($this->connect_db,$query);
        return $result;
    }

    //Post Show Query in Admin Panel
    public function postListShow(){
        $query = "SELECT tbl_post.*, tbl_category.name FROM tbl_post
                        INNER JOIN tbl_category
                        ON tbl_post.cat = tbl_category.id
                        ORDER BY tbl_post.id DESC";
        $query = mysqli_query($this->connect_db,$query);
        return $query;
    }

    //Post Edit for Show Query in Admin Panel
    public function editPostForShow($id){
        $Show = "SELECT * FROM tbl_post where id = '$id'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Post Update Query in Admin Panel
    public function postUpdate($id,$cat,$title,$body,$image,$tags,$author){
        $imagesource = $image["tmp_name"];
        $image = $image["name"];

        $Update = "UPDATE tbl_post SET cat='$cat', title='$title', body='$body', image='$image', tags='$tags', author='$author' WHERE id='$id'";
        if(!mysqli_query($this->connect_db,$Update)){
            echo "<span style='color:red; font-size: 18px;'>Post Not Updated !</span>";
            echo "<script>window.location.href='?page=postlist.php'</script>";
        }else{
            move_uploaded_file($imagesource, "../admin/upload/" . $image);
            echo "<span style='color:green; font-size: 18px;'>Post Updated Successfully</span>";
            echo "<script>window.location.href='?page=postlist.php'</script>";
        }
    }

    //Post Delete Query in Admin Panel
    public function postDelete($id){
        $query = "DELETE FROM tbl_post WHERE id = '$id'";
        $result = mysqli_query($this->connect_db,$query);
        return $result;
    }

    //Slider Insert Query in Admin Panel
    public function sliderInsert($title,$image){
        $imagesource = $image["tmp_name"];
        $image = $image["name"];
        $insert = "INSERT INTO tbl_slider (title,image) VALUES ('$title', '$image')";
        if(!mysqli_query($this->connect_db,$insert)){
            echo "<span style='color:red; font-size: 18px;'>Slider Not Inserted !</span>";
        } else {
            move_uploaded_file($imagesource, "../admin/slider/" . $image);
            echo "<span style='color:green; font-size: 18px;'>Slider Inserted Successfully</span>";
        }
    }

    //Slider Show Query in Admin Panel
    public function sliderShow(){
        $Show = "SELECT * FROM tbl_slider ORDER BY id ASC";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Slider Edit for Show Query in Admin Panel
    public function editSliderForShow($id){
        $Show = "SELECT * FROM tbl_slider where id = '$id'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Slider Update Query in Admin Panel
    public function sliderUpdate($id,$title,$image){
        $imagesource = $image["tmp_name"];
        $image = $image["name"];

        $Update = "UPDATE tbl_slider SET title='$title', image='$image' WHERE id='$id'";
        if(!mysqli_query($this->connect_db,$Update)){
            echo "<span style='color:red; font-size: 18px;'>Slider Not Updated !</span>";
            echo "<script>window.location.href='?page=sliderlist.php'</script>";
        }else{
            move_uploaded_file($imagesource, "slider/" . $image);
            echo "<span style='color:green; font-size: 18px;'>Slider Updated Successfully</span>";
            echo "<script>window.location.href='?page=sliderlist.php'</script>";
        }
    }

    //Slider Delete Query in Admin Panel
    public function sliderDelete($id){
        $query = "DELETE FROM tbl_slider WHERE id = '$id'";
        $result = mysqli_query($this->connect_db,$query);
        return $result;
    }

    //Copyright Show Query in Admin Panel
    public function copyrightShow(){
        $Show = "SELECT * FROM tbl_copyright WHERE id='1'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Copyright Update Query in Admin Panel
    public function copyrightUpdate($note){
        $update = "UPDATE tbl_copyright SET note='$note' WHERE id='1'";
        if(!mysqli_query($this->connect_db,$update)){
            echo "<span style='color:red; font-size: 18px;'>Copyright Not Updated !</span>";
        }else{
            echo "<span style='color:green; font-size: 18px;'>Copyright Updated Successfully</span>";
            echo "<script>window.location.href='?page=copyright.php'</script>";
        }
    }

    //Social Network Show Query in Admin Panel
    public function sociadlShow(){
        $Show = "SELECT * FROM tbl_socialnetwork WHERE id='1'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Social Network Update Query in Admin Panel
    public function socialUpdate($facebook,$twitter,$linkedin,$google){
        $update = "UPDATE tbl_socialnetwork SET facebook='$facebook', twitter='$twitter', linkedin='$linkedin', google='$google' WHERE id='1'";
        if(!mysqli_query($this->connect_db,$update)){
            echo "<span style='color:red; font-size: 18px;'>Social Network Not Updated !</span>";
        }else{
            echo "<span style='color:green; font-size: 18px;'>Social Network Updated Successfully</span>";
            echo "<script>window.location.href='?page=social.php'</script>";
        }
    }

    //Title Slogan Show Query in Admin Panel
    public function titleloganShow(){
        $Show = "SELECT * FROM tbl_titleslogan WHERE id='1'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Title Slogan Update Query in Admin Panel
    public function titleloganUpdate($title,$slogan,$image){
        $imagesource = $image["tmp_name"];
        $image = $image["name"];

        $update = "UPDATE tbl_titleslogan SET title='$title', slogan='$slogan', logo='$image' WHERE id='1'";
        if(!mysqli_query($this->connect_db,$update)){
            echo "<span style='color:red; font-size: 18px;'>Title and Slogan Not Updated !</span>";
        }else{
            move_uploaded_file($imagesource, "../images/" . $image);
            //$message =  "<span style='color:green; font-size: 18px;'>Title and Slogan Updated Successfully</span>";
            echo "<span style='color:green; font-size: 18px;'>Title and Slogan Updated Successfully</span>";
            echo "<script>window.location.href='?page=titleslogan.php'</script>";
        }
    }

    //Page Insert Query in Admin Panel
    public function insertPage($name,$body){
        $insert = "INSERT INTO tbl_page (name, body) VALUES ('$name', '$body')";
        if(!mysqli_query($this->connect_db, $insert)){
            echo "<span style='color:red; font-size: 18px;'>Page Not Inserted !</span>";
        } else {
            echo "<span style='color:green; font-size: 18px;'>Page Inserted Successfully</span>";
        }
    }

    //Page Show Query in Admin Panel
    public function pageShow(){
        $Show = "SELECT * FROM tbl_page";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Page Edit for Show Query in Admin Panel
    public function editPageForShow($id){
        $Show = "SELECT * FROM tbl_page WHERE id='$id'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Category Update Query in Admin Panel
    public function pageUpdate($id,$name,$body){
        $update = "UPDATE tbl_page SET name='$name', body='$body' WHERE id='$id'";
        if(!mysqli_query($this->connect_db,$update)){
            echo "<span style='color:red; font-size: 18px;'>Page Not Updated !</span>";
        }else{
            echo "<span style='color:green; font-size: 18px;'>Page Updated Successfully</span>";
            echo "<script>window.location.href='?page=home.php'</script>";
        }
    }

    //Page Delete Query in Admin Panel
    public function pageDelete($id){
        $delete = "DELETE FROM tbl_page WHERE id = '$id'";
        $res = mysqli_query($this->connect_db,$delete);
        return $res;
    }

    //User Insert Query in Admin Panel
    public function insertUser($username,$password,$role){
        $insert = "INSERT INTO tbl_user (username, password, role) VALUES ('$username', '$password', '$role')";
        if(!mysqli_query($this->connect_db, $insert)){
            echo "<span style='color:red; font-size: 18px;'>User Not Inserted !</span>";
        } else {
            echo "<span style='color:green; font-size: 18px;'>User Inserted Successfully</span>";
        }
    }

    //Show User/ Profilelist Query in Admin Panel
    public function userListShow(){
        $query = "SELECT * FROM tbl_user ORDER BY id ASC";
        $result = mysqli_query($this->connect_db,$query);
        return $result;
    }

    //Profile View for Show Querty in Admin Panel
    public function viewUser($id){
        $Show = "SELECT * FROM tbl_user where id = '$id'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Profile View for Show Querty in Admin Panel
    public function editUserForShow($id){
        $Show = "SELECT * FROM tbl_user where id = '$id'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //User/ Profile Update Query in Admin Panel
    public function profileUpdate($id,$name,$username,$email,$details){
        $update = "UPDATE tbl_user SET name='$name', username='$username', email='$email', details='$details' WHERE id='$id'";
        if(!mysqli_query($this->connect_db,$update)){
            echo "<span style='color:red; font-size: 18px;'>Profile Not Updated !</span>";
        }else{
            echo "<span style='color:green; font-size: 18px;'>Profile Updated Successfully</span>";
            echo "<script>window.location.href='?page=userlist.php'</script>";
        }
    }

    //User/ Profile Delete Query in Admin Panel
    public function userDelete($id){
        $query = "DELETE FROM tbl_user WHERE id = '$id'";
        $result = mysqli_query($this->connect_db,$query);
        return $result;
    }

    //Message Show Query in Admin Panel
    public function messageShow(){
        $Show = "SELECT * FROM tbl_contact ORDER BY id DESC";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Password Update Query in Admin Panel
    public function passwordUpdate($id,$oldpassword,$newpassworde){
        $update = "UPDATE tbl_user SET oldpassword='$oldpassword', newpassworde='$newpassworde' WHERE id='$id'";
        if(!mysqli_query($this->connect_db,$update)){
            echo "<span style='color:red; font-size: 18px;'>Password Not Updated !</span>";
        }else{
            echo "<span style='color:green; font-size: 18px;'>Password Updated Successfully</span>";
            echo "<script>window.location.href='?page=home.php'</script>";
        }
    }

    //Message View for Show Querty in Admin Panel
    public function viewMessage($id){
        $Show = "SELECT * FROM tbl_contact where id = '$id'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Message Reply for Show Querty in Admin Panel
    public function replyMessage($id){
        $Show = "SELECT * FROM tbl_contact where id = '$id'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Message Delete Query in Admin Panel
    public function messageDelete($id){
        $query = "DELETE FROM tbl_contact WHERE id = '$id'";
        $result = mysqli_query($this->connect_db,$query);
        return $result;
    }

    //Theme Show Query in Admin Panel
    public function theme(){
        $Show = "SELECT * FROM tbl_theme WHERE id='1'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Theme Update Query in Admin Panel
    public function themeUpdate($theme){
        $update = "UPDATE tbl_theme SET theme = '$theme' WHERE id = '1'";
        if(!mysqli_query($this->connect_db,$update)){
            echo "<span style='color:red; font-size: 18px;'>Theme Not Updated !</span>";
        }else{
            echo "<span style='color:green; font-size: 18px;'>Theme Updated Successfully</span>";
            echo "<script>window.location.href='?page=theme.php'</script>";
        }
    }











    //Post Show Query in Home Page (All)
    public function blogShow(){
        $query = "SELECT tbl_post.*, tbl_category.name FROM tbl_post
                        INNER JOIN tbl_category
                        ON tbl_post.cat = tbl_category.id
                        ORDER BY tbl_post.id DESC LIMIT 7";
        $query = mysqli_query($this->connect_db,$query);
        return $query;
    }

    //Post Show Query in Home Page (Single)
    public function singleBlogShow($id){
        $query = "SELECT * FROM tbl_post WHERE id = '$id'";
        $query = mysqli_query($this->connect_db,$query);
        return $query;
    }

    //ID Wise Category Show Query in Home Page (All Category)
    public function IDWiseCatShow($id){
        $query = "SELECT * FROM tbl_post WHERE cat = '$id'";
        $query = mysqli_query($this->connect_db,$query);
        return $query;
    }

    //Category Show Query in Home Page (Sidebar)
    public function sideCategoryShow(){
        $Show = "SELECT * FROM tbl_category ORDER BY id ASC";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Post Show Query in Home Page (Sidebar)
    public function sideBlogShow(){
        $Show = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 10";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Post Show Query in Home Page (Related Articles)
    public function relatedPostShow($id){
        $Show = "SELECT * FROM tbl_post where cat = '$id' LIMIT 6";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Slider Show Query in Home Page (Slider)
    public function homeSliderShow(){
        $Show = "SELECT * FROM tbl_slider ORDER BY id ASC LIMIT 6";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Copyright Show Query in Home Page (Footer)
    public function footerCopyrightShow(){
        $Show = "SELECT * FROM tbl_copyright WHERE id='1'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Social Network Show Query in Home Page (Header)
    public function homeSocialShow(){
        $Show = "SELECT * FROM tbl_socialnetwork WHERE id='1'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Menu Bar Show Query in Home Page (Menu Bar)
    public function menuShow(){
        $Show = "SELECT * FROM tbl_page";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Pages Show Query in Home Page (Menu Bar)
    public function PagesShow($id){
        $Show = "SELECT * FROM tbl_page where id = '$id'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Title Slogan Show Query in Home Page (Header)
    public function titlesloganShow(){
        $Show = "SELECT * FROM tbl_titleslogan WHERE id='1'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Category Show Query in Home Page (Sidebar)
    public function paginationShow(){
        $Show = "SELECT * FROM tbl_post";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Message Insert Query in Home Page (Contact)
    public function insertMessage($firstname,$lastname,$email,$body){
        $insert = "INSERT INTO tbl_contact (firstname, lastname, email, body) VALUES('$firstname', '$lastname', '$email', '$body')";
        if(!mysqli_query($this->connect_db, $insert)){
            echo "<span style='color:red; font-size: 18px;'>Message Not Inserted !</span>";
        } else {
            echo "<span style='color:green; font-size: 18px;'>Message Inserted Successfully</span>";
        }
    }

    //Title Slogan Show Query in Admin Panel
    public function SearchPost(){
        $Show = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }

    //Theme Show Query in Admin Panel
    public function themeChange(){
        $Show = "SELECT * FROM tbl_theme WHERE id = '1'";
        $query = mysqli_query($this->connect_db,$Show);
        return $query;
    }
}