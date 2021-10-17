<?php
$seemail=$_SESSION['logemail'];
$sel=mysqli_query($conn,"select * from user_detail where Email='$seemail'  or Mob='$seemail'");
$arr=mysqli_fetch_assoc($sel);
$img33=$arr['Imagepath'];
?>
<div class="">
    
<img src="<?php echo $img33  ?>" class="helo" alt="" width="250px" height="250px" style="border-radius:50%">
</div>
<div class="h4 text-center m-auto row">
    
<div class='col border m-5  bg-dark text-warning p-3'> <i class="fas fa-chess-king"></i> <?php echo $arr['Fullname']; ?>  </div>
<div class='col border m-5  bg-dark text-warning p-3'> <i class="fas fa-envelope"></i> <?php echo $arr['Email']; ?>  </div>
<div class='col border m-5  bg-dark text-warning p-3'> <i class="fas fa-mobile-alt"></i> <?php echo $arr['Mob']; ?> </div>
<div class='col border m-5  bg-dark text-warning p-3'> <i class="fas fa-unlock-alt"></i> <?php echo $arr['Password']; ?> </div>
<div class='col border m-5  bg-dark text-warning p-3'> <i class="fas fa-child"></i> <?php echo $arr['Gender']; ?>  </div>
<div class='col border m-5  bg-dark text-warning p-3'> <i class="fas fa-birthday-cake"></i> <?php echo $arr['Age']; ?>  </div>
<div class='col border m-5  bg-dark text-warning p-3'> <i class="fas fa-city"></i> <?php echo $arr['City']; ?>  </div>


</div>