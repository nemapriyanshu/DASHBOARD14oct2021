<?php
// include("connection.php");
    $error="";
    if(isset($_POST['submit']))
    {
    $email= $_POST['email'];
    $mob= $_POST['Mob'];
    $pass= $_POST['password'];
    $name= $_POST['Name'];
    $city = $_POST['city'];
    $gender= @$_POST['gender'];
    $age= $_POST['Age'];
    // print_r($_FILES['Images']);
    $temp=$_FILES['Images']['tmp_name'];
    $fname=$_FILES['Images']['name'];

    $ext = pathinfo($fname, PATHINFO_EXTENSION); //check Extention of file
    // $fn = "attach" . rand() . "_" . time() . ".$ext"; //create randome name of file


    // move_uploaded_file($temp,"users/".$fname);
    
    if(!empty($email)&&!empty($mob)&&!empty($pass)&&!empty($name)&&!empty($city)&&!empty($gender)&&!empty($age)&&!empty($temp))
    {
        if($ext=='jpeg' or $ext=='png' or $ext=='jpg')
        {
            echo "$email\n$mob\n$pass\n$name\n$city\n$gender\n$age";
                $imgadd="users/$email/".$fname;
               
            if(mysqli_query($conn,"insert into user_detail (Email,Mob,Password,Fullname,City,Gender,Age,Imagepath)
            values('$email','$mob','$pass','$name','$city','$gender','$age','$imgadd')"))
            {
                echo "Details Added";
                if(!(file_exists("users/$email"))){
                    mkdir("users/$email");
                    move_uploaded_file($temp,"users/$email/".$fname);            
            
                }
            }
            else
            {
                $error="User Already Exist";
            }
           
        }
        else
        {
            $error="Choose Correct File";
        }
    }
    else
    {
        $error='Fill All Field';
    }



    }
?>

<?php include("cal.php"); ?>

<main class="container row">
    <div class="h1 m-auto">Sign Up</div>
    <form  class="container mt-4" style="width:700px;" method="POST" novalidate enctype="multipart/form-data">
        <br>
        <?php
        if (!empty($error)) {
        ?>
            <div class="alert-danger alert" role="alert"> <?php echo $error ?> </div>
        <?php  }
        ?>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Email" name="email">
        </div>

        <div class="form-group">
            <input type="number" class="form-control" placeholder="Mobile" name="Mob">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Password" name="password">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Full Name" name="Name">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="City" name="city">
        </div>

        <div class="row">
            <div class="col-4">
                <input type="radio" name="gender" value="Male"> Male <br>
                <input type="radio" name="gender" value="Female"> Female
            </div>

            <div class="col-sm-3">
                <input type="number" class="form-control" placeholder="Age" name="Age">
            </div>

            <div class="col-sm-5">
                <input type="file" class="form-control" placeholder="FILE Upload" name="Images">
            </div>

        </div>
        <br>
        <div class="row">

            <div class="col-sm-3">
                <label class="h4"><?php echo $pat; ?></label> <br>
            </div>

            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="CAPTCHA" name="cap">
                <input type="hidden" name="capsum" value="<?php echo $sum; ?>">
            </div>

            <div class="col-sm-4 text-center">
                <input type="submit" name='submit' value="Sign-up" class="btn btn-success mb-3" name="submmit">
            </div>

        </div>
        <br>
    </form>
</main>


