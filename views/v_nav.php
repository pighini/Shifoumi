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
            <a class="navbar-left" href="index.php" style="margin-top: 10px;"><img src="images/logos/logoShifoumi.png" style="height: 30px; width: 30px; margin-right: 20px;" alt=""></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" style="color: white;">
            <ul class="nav navbar-nav">
                <li><a href="index.php" style="color : white; text-align:center;" onmouseover="this.style.color = 'white'; this.style.background = '#419222';" onmouseout="this.style.color = 'white'; this.style.background = 'none'">Home</a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <?php if ($_SESSION["logue"]) { ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="c_showAccount.php" style="color : white; text-align:center;" onmouseover="this.style.color = 'white'; this.style.background = '#419222';" onmouseout="this.style.color = 'white'; this.style.background = 'none'">My account</a></li>
                    <li><a href="c_logout.php" style="color : white; text-align:center;" onmouseover="this.style.color = 'white'; this.style.background = '#419222';" onmouseout="this.style.color = 'white'; this.style.background = 'none'">Logout</a></li>
                    <li><a style="color : white; text-align:center; font-weight: bold;">Balance : <?php echo $_SESSION['balance'];?> §</a></li>
                </ul>
            <?php } else { ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="c_showLogin.php?new=&amp;login=in active" style="color : white; text-align:center;" onmouseover="this.style.color = 'white'; this.style.background = '#419222';" onmouseout="this.style.color = 'white'; this.style.background = 'none'">Login</a></li>
                    <li><a href="c_showLogin.php?new=in active&amp;login=" style="color : white; text-align:center;" onmouseover="this.style.color = 'white'; this.style.background = '#419222';" onmouseout="this.style.color = 'white'; this.style.background = 'none'">Create Account</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>
