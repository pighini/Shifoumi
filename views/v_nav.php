<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<nav class="navbar navbar-default" style="background-color: #2a2b2b; border: none;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-left" href="index.php" style="margin-top: 10px;"><img src="images/icon.ico" style="height: 30px; width: 30px; margin-right: 20px;" alt=""></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <?php //if ($_SESSION[""]) { ?>
                </ul> 
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">My account</a></li>
                    <li><a href="">Logout</a></li>
                </ul>
            <?php //} else { ?> 
                </ul> 
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="c_showLogin.php#create">Create Account</a></li>
                    <li><a href="c_showLogin.php#login">Login</a></li>
                </ul>
            <?php //} ?>
        </div>
    </div>
</nav>