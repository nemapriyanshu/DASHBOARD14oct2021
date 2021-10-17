<?php
include("connection.php");
    session_start();
    $seemail=$_SESSION['logemail'];
    $sel=mysqli_query($conn,"select * from user_detail where Email='$seemail'  or Mob='$seemail'");
    $arr=mysqli_fetch_assoc($sel);

    // echo $arr['Imagepath'];
    
    if (empty($seemail)) 
    {
        header("location:index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Index </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style> .helo{margin-left: 400px;}</style>


</head>

<body>
    <?php include("nav.php"); ?>
    <div class="row">
        <div class="col-3 border">
            <img src="<?php echo $arr['Imagepath'] ?>" width="200px" height="200px" class="ml-5 mt-3 " style="border-radius:50%;">
            <div class="row">
                <div class="col">
                    <a href="?show=2">Change image</a>
                </div>
                <div class="col">
                    <a href="?show=3">Edit profile</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">

                <li class="list-group-item text-center h3">
                        <a href="?show=1" class="text-secondary ">Show Details</a>
                    </li>

                    <li class="list-group-item text-center h3">
                        <a href="?show=1" class="text-secondary">Products</a>
                    </li>

                    <li class="list-group-item text-center h3">
                        <a href="?show=1" class="text-secondary">Orders</a>
                    </li>

                    <li class="list-group-item text-center h3">
                        <a href="?show=1" class="text-secondary">Feed Back</a>
                    </li>

                </ul>
            </div>
        </div>




        <div class="col-9 border border-warning m-auto">
        <?php
        if(!empty($_GET['show']))
        {
            $p = $_GET['show'];
            switch ($p) {
                case 1:
                    include("showprofile.php");
                    break;

                case 2:
                    include("changeimg.php");
                    break;
                case 3:
                    include("editprofil.php");
                    break;
            }
        }
            ?>

        </div>
    </div>
</body>
</html>
