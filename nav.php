<head>
    <style>
        .apnilink:hover {
            color: #d5ff80;
        }
        .navcolor{
            background-color: #000033;
            color: wheat;
        }
        .innerlink {font-family: 'Times New Roman', Times, serif;
            font-weight: bold;}

        .innerlink:hover {
            color: yellow;
            text-decoration: none;
            border-bottom: blueviolet solid 2px;
            left: 0;
            transition: .1s;
            
        }
        .innerlink:active {
            color: yellow;           
        }

    </style>
</head>

<nav class="navbar navbar-expand-lg navcolor ">

<?php  if(!empty($seemail)) { ?>

    <h3>Welcome :</h3>
    <a class="navbar nav-link apnilink h3" href="#"><?php echo $seemail ; ?></a>

    <?php } else {?>


    <a class="navbar nav-link apnilink h3" href="#">Priyanshu</a>

<?php } ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">

        <?php  if(empty($seemail)) { ?>

            <li class="nav-item">
                <a class="h4 innerlink" href="index.php">Login</a>
            </li>

        <?php } ?>


        
        <?php  if(!empty($seemail)) { ?>

<li class="nav-item">
    <a class="h4 innerlink" href="logout.php">Logout</a>
</li>

<?php } ?>







        


            <li class="nav-item">
                <a class="h4 innerlink ml-5" href="Dashboard.php">DashBoard</a>
            </li>


        </ul>
    </div>
</nav>