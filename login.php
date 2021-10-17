<?php
// // // include("connection.php");
// $sel=mysqli_query($conn,"select * from user_detail");
// $arr=mysqli_fetch_assoc($sel);

// echo $arr['Email'];

if(isset($_POST['logsubmit']))
{
    $lemail=$_POST['logemail'];
    $lpass=$_POST['logpassword'];

    $sel=mysqli_query($conn,"select * from user_detail where Email='$lemail' or Mob='$lemail'");
    $arr=mysqli_fetch_assoc($sel);

    if(!empty($lemail) && !empty($lpass))
    {
       if($arr['Email']==$lemail || $arr['Mob']==$lemail)
       {
           if($arr['Password']==$lpass)
           {
                session_start();
                $_SESSION['logemail']=$lemail;
                if(isset($_POST['remember']))
                 {
                     setcookie("coemail",trim($lemail),time()+3600*24*30);
                     setcookie("copassword",$lpass,time()+3600*24*30);
                }
                header("Location:Dashboard.php");
           }
           else
           {
               $error="Password not matched";
           }
       }
       else
       {
           $error="User Not Found Go to register";
       }
    }
    else
    {
        $error="Fill All Field";
    }


}

?>



<script type="text/javascript">
        function myFunction()
        {
            if("<?php echo $_COOKIE['coemail'];?>" !== undefined){
          
               if(document.getElementById("mailid").value=="<?php echo $_COOKIE['coemail'] ;?>"){
                  
                   document.getElementById("passwordid").value="<?php echo $_COOKIE['copassword'] ;?>";
               }
               else{
                   document.getElementById("passwordid").value='';
               }
           }
        }
    </script>


<main class="container row">
    <div class="h1 m-auto">Login</div>
    <form class="mt-5" style="width:700px;" method="POST" enctype="multipart/form-data">
        <?php
        if (!empty($error)) {
        ?>
            <div class="alert-danger alert" role="alert"> <?php echo $error ?> </div>
        <?php  }
        ?>

        <div class="form-group">
            <input type="text" name="logemail" class="form-control" placeholder="EMAIL or Mobile Number" id='mailid' onblur="return myFunction()">
        </div>

        <div class="form-group">
            <input type="text" class="form-control col-12" placeholder="Password" name="logpassword" id='passwordid'>
        </div>

        <div class="">
            <input type="checkbox" name="remember">
            <label>Remember Password</label> <br>
            <div class="text-center">
                <input type="submit" class="btn btn-success mb-5" value="Login" name="logsubmit">
            </div>
        </div>
    </form>
</main>