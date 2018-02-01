<!DOCTYPE html>
<html>
    <head>
        <title>Shifumi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css" href="./css/shifumi.css" >
        <link rel="icon" href="" />
    </head>
    <body class='container col-md-12 col-xs-12'>
        <noscript><p>Please enable javascript for this site to work properly</p><style>
            div {
                display: none;
            }
        </style></noscript>
        <div class="col-md-12 col-xs-12">
            <?php include 'views/v_nav.php'; ?>

            <ul class="nav nav-pills" >
                <li><a data-toggle="pill" href="#login" style="color: white; text-decoration: none;" onmouseover="this.style.color='white'; this.style.background='#419222';" onmouseout="this.style.color='white'; this.style.background='none'">Login</a></li>
                <li><a data-toggle="pill" href="#create" style="color: white; text-decoration: none;" onmouseover="this.style.color='white'; this.style.background='#419222';" onmouseout="this.style.color='white'; this.style.background='none'">Create account</a></li>
            </ul>

            <div class="tab-content">
                <div id="login" class="tab-pane fade in active">
                    <form class="form-horizontal" method="POST" style="margin-top: 20px;">
                        <fieldset>
                            <!-- Form Name -->
                            <legend style="color: white;">Login</legend>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username" style="color: white;">Username</label>  
                                <div class="col-md-4">
                                    <input id="nom" name="username" type="text" placeholder="Your username" class="form-control" required="">
                                </div>
                            </div>
                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="pwd" style="color: white;">Password</label>
                                <div class="col-md-4">
                                    <input id="mdp" name="pwd" type="password" placeholder="Your password" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="submit"></label>
                                <div class="col-md-8">
                                    <input id="submit" name="submit" type="submit" class="btn btn-primary" value="Login" style="background-color: #419222; border: none;">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <?php if (!empty($msgErreur)) { ?>
                        <div class="alert alert-danger" style="text-align: center;">
                            <strong><?php echo $msgErreur ?></strong>
                        </div>
                    <?php } ?>
                </div>
                <div id="create" class="tab-pane fade">
                    <form class="form-horizontal" method="POST" style="margin-top: 20px;">
                        <fieldset>
                            <!-- Form Name -->
                            <legend style="color: white;">Create account</legend>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username" style="color: white;">Username</label>  
                                <div class="col-md-6">
                                    <input id="nom" name="username" type="text" placeholder="Your username" class="form-control input-md" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email" style="color: white;">Email</label>  
                                <div class="col-md-6">
                                    <input id="email" name="email" type="email" placeholder="Your email" class="form-control input-md" required="">
                                </div>
                            </div>
                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="pwd" style="color: white;">Password</label>
                                <div class="col-md-6">
                                    <input id="mdp" name="pwd" type="password" placeholder="Your password" class="form-control input-md" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="rePwd" style="color: white;">Repeat password</label>
                                <div class="col-md-6">
                                    <input id="reMdp" name="rePwd" type="password" placeholder="Your password" class="form-control input-md" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="submit"></label>
                                <div class="col-md-8">
                                    <input id="submit" name="submit" type="submit" class="btn btn-primary" value="Create account" style="background-color: #419222; border: none;">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <?php if (!empty($msgErreur)) { ?>
                        <div class="alert alert-danger" style="text-align: center;">
                            <strong><?php echo $msgErreur ?></strong>
                        </div>
                    <?php } ?>
                </div>
            </div>


        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="Bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>


