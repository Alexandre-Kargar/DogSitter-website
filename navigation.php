<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">
                <img src="../assets/images/png-transparent-bird-of-prey-logo-beak-desktop-bird-animals-computer-logo-min-zarx-biz-12-50.png"
                alt="" width="50px" height="50px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    

                    <?php
                        if(!isset($_SESSION['user_name'])){
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="../pages/login.php">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../pages/register.php">Register</a>
                                </li>
                            <?php
                        }else{
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="../pages/userProfile.php">User Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../processes/logoutProcess.php">Logout</a>
                                </li>
                            <?php
                        }
                    ?>

                    


                </ul>
            </div>
        </nav>