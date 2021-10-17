<?php

 $seemail=$_SESSION['logemail'];
 $sel=mysqli_query($conn,"select * from user_detail where Email='$seemail'  or Mob='$seemail'");
 $arr=mysqli_fetch_assoc($sel);

 $email=$arr['Email'];
 $mob  =$arr['Mob'];
 $pass =$arr['Password'];
 $name =$arr['Fullname'];
 $city =$arr['City'];
 $gen  =$arr['Gender'];
 $age  =$arr['Age'];
$id=$arr['ID'];

    if(isset($_POST['EditProfile']))
    {       
        $nemail= trim($_POST['email']);
        $nmob= $_POST['Mob'];
        $npass= $_POST['password'];
        $nname= $_POST['Fullname12'];
        $ncity= $_POST['city'];
        $ngen= $_POST['Gender'];
        $nage= $_POST['Age'];
        
        echo $nemail.$nmob.$npass.$nname.$ncity.$ngen.$nage;

        if(mysqli_query($conn,"update user_detail set 
        Email='$nemail',
        Mob=$nmob,
        Password='$npass',
        City='$ncity',
        Age='$nage',
        Gender='$ngen',
        Fullname='$nname' 

        where id=$id"))
{
        echo "SUCESSS:";
}
        else
{            echo "<br><br>ERRRRRO";

}   
    
    
        echo "  <script type=\"text/javascript\">
        location.replace('logout.php');
          </script>
          ";
    } 
   
?>


<main class=" row  text-center">
    <!-- <div class="m-auto h1 col-12 text-secondary" >Edit Profile</div> -->
    <form  class="col-7 m-auto" method="POST" novalidate enctype="multipart/form-data">
        <br>
        <?php
        if (!empty($error)) {
        ?>
            <div class="alert-danger alert" role="alert"> <?php echo $error ?> </div>
        <?php  }
        ?>

        <div class="form-group row">
        <div class="col-1 h3"><i class="fas fa-envelope"></i></div>
        <div class="col-11"><input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>"></div>
        </div>


        <div class="form-group row">
            <div class="col-1 h3"><i class="fas fa-mobile-alt"></i></div>
            <div class="col-11"><input type="number" class="form-control" placeholder="Mobile" value="<?php echo $mob; ?>" name="Mob"></div>
        </div>



        <div class="form-group row">
           <div class="col-1 h3"> <i class="fas fa-unlock-alt"></i></div>
           <div class="col-11"> <input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $pass; ?>"></div>
        </div>



        <div class="form-group row">
           <div class="col-1 h3"> <i class="fas fa-chess-king"></i></div>
           <div class="col-11"> <input type="text" class="form-control" placeholder="Full Name" name="Fullname12" value="<?php echo $name; ?>"></div>
        </div>



        <div class="form-group row">
            <div class="col-1 h3"><i class="fas fa-city"></i></div>
            <div class="col-11"><input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $city; ?>"></div>
        </div>



        <div class="row">
            <div class="col-1 h3"><i class="fas fa-child"></i></div>
          
            <div class="col-5">
                <input type="radio" name="Gender" <?php if($gen=="Male") {echo "checked";}?>  value="Male"> Male 
                <input type="radio" name="Gender" <?php if($gen=="Female") {echo "checked";}?>  value="Female"> Female
            </div>


           <div class="col h3"><i class="fas fa-birthday-cake"></i></div>
           <div class="col-4">
                <input type="number" class="form-control" placeholder="Age" name="Age" value="<?php echo $age; ?>">
            </div>
         

       
        </div>
        <br>
        <div class="row">

            <div class="col-sm-4 m-auto">
                <input type="submit" value="Edit Profile" class="btn btn-lg btn-success mb-3" name="EditProfile">
            </div>

        </div>
        <br>
    </form>
</main>


