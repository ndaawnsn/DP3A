<div class="container-fluid" style="background-color: black;">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-tranparent p-4">
            <a class="navbar-brand mr-5 font-weight-bold" href="index.php">5TECH</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav m-auto" >
                    <li class="nav-item" style="margin: 0 20px">
                        <a class="nav-link font-weight-bold" href="index.php">Home</a>
                    </li>
                    <li class="nav-item" style="margin: 0 20px">
                        <a class="nav-link font-weight-bold" href="gaming.php">Gaming</a>
                    </li>
                    <li class="nav-item" style="margin: 0 20px">
                        <a class="nav-link font-weight-bold" href="student.php">Student</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="mycart.php"> <i class="fa fa-shopping-cart"></i> My Cart</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link"> | </a>
                    </li>

                    <?php if (strlen(isset($_SESSION['login']) == 0)){ ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="login.php">Sign In</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Hi, <?php echo $_SESSION['login'] ?></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="logout.php"><b>Logout</b></a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </nav>
    </div>
</div>