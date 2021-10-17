<?php
if (isset($_POST['ImageEdit']))
{
    $seemail=$_SESSION['logemail'];
    $sel=mysqli_query($conn,"select * from user_detail where Email='$seemail'  or Mob='$seemail'");
    $arr=mysqli_fetch_assoc($sel);
    $temp=$_FILES['Image']['tmp_name'];
    $fname=$_FILES['Image']['name'];
    
    $preImage=$arr['Imagepath'];

    if(file_exists($preImage))
    {
        unlink("$preImage");
        move_uploaded_file($temp,"users/$seemail/".$fname);
        $newImage="users/$seemail/".$fname;
        // echo $newImage;
        mysqli_query($conn,"update user_detail set Imagepath='$newImage' where Email='$seemail'  or Mob='$seemail' ");

        echo "  <script type=\"text/javascript\">
        location.replace('dashboard.php');
          </script>
          ";

    }
}

?>
<form class="col-7 m-auto" method="POST" novalidate enctype="multipart/form-data">
    <br>
    <?php
    if (!empty($error)) {
    ?>
        <div class="alert-danger alert" role="alert"> <?php echo $error ?> </div>
    <?php  }
    ?>

    <div class="form-group row">
        <div class="col-2 h1"><i class="fas fa-camera"></i></div>
        <div class="col-6">
            <input type="file" class="form-control" placeholder="Image" name="Image">
        </div>
    
    
        <div class="col-4 m-auto">
              <input type="submit" value="Change Profile photo" class="btn btn-lg btn-success mb-3" name="ImageEdit">
        </div>
    </div>

</form>