<!DOCTYPE html>
<html>
    <head>
        <title>Shifoumi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css" >
        <link rel="icon" href="" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="./assets/css/shifumi.css" >
    </head>
    <body class='container col-md-12 col-xs-12'>
        <noscript><p>Please enable javascript for this site to work properly</p><style>
            div {
                display: none;
            }
        </style></noscript>
        <div class="col-md-12 col-xs-12">
            <?php include 'views/v_nav.php'; ?>
            <div class="col-md-12 col-xs-12" style="background-color: #2a2b2b; color: white; min-height: 800px;">
                <ul class="nav nav-pills" >
                    <li><a data-toggle="pill" href="#edit" style="color: white; text-decoration: none;" onmouseover="this.style.color = 'white'; this.style.background = '#419222';" onmouseout="this.style.color = 'white'; this.style.background = 'none'">Edit account</a></li>
                    <li><a data-toggle="pill" href="#history" style="color: white; text-decoration: none;" onmouseover="this.style.color = 'white'; this.style.background = '#419222';" onmouseout="this.style.color = 'white'; this.style.background = 'none'">Bets history</a></li>
                </ul>

                <div class="tab-content">
                    <div id="edit" class="tab-pane fade in active">
                        <div class="col-md-12 col-xs-12" style="margin-top: 20px;">
                            <form class="form-horizontal" method="POST">
                                <fieldset>
                                    <!-- Form Name -->
                                    <legend style="color: white;">Edit account</legend>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="username" style="color: white;">Username</label>
                                        <div class="col-md-6">
                                            <input id="username" name="username" type="text" placeholder="Your username" class="form-control input-md" required="" value="<?php echo $_SESSION["username"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="email" style="color: white;">Email</label>
                                        <div class="col-md-6">
                                            <input id="email" name="email" type="email" placeholder="Your email" class="form-control input-md" required="" value="<?php echo $_SESSION["email"]; ?>">
                                        </div>
                                    </div>

                                    <legend style="color: white;">Change password</legend>

                                    <!-- Password input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="Npwd" style="color: white;">New password</label>
                                        <div class="col-md-6">
                                            <input id="Npwd" name="Npwd" type="password" placeholder="Your new password" class="form-control input-md">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="NrePwd" style="color: white;">Repeat new password</label>
                                        <div class="col-md-6">
                                            <input id="NrePwd" name="NrePwd" type="password" placeholder="Your new password" class="form-control input-md">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="pwd" style="color: white;">Enter your password to save your changes</label>
                                        <div class="col-md-6">
                                            <input id="pwd" name="pwd" type="password" placeholder="Your password" class="form-control input-md" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="submit"></label>
                                        <div class="col-md-8">
                                            <input id="submit" name="submit" type="submit" class="btn btn-primary" value="Save changes" style="background-color: #419222; border: none;">
                                        </div>
                                    </div>
                                    <?php if (!(empty($message))) { ?>
                                    <div class="alert alert-<?php echo $type; ?> alert-dismissable">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong><?php echo $message; ?></strong>
                                        </div>
                                    <?php } ?>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div id="history" class="tab-pane fade">
                        <div class="col-md-12 col-xs-12" style="margin-top: 20px;">
                            <legend style="color: white;">Bets history</legend>
                            <table class="table" id="tableBestPlayer">
                                <thead>
                                <th class="col-xs-1">Amount bet</th>
                                <th class="col-xs-3">Moment of bet</th>
                                <?php
                                while ($data = $betsHistory->fetch()) {
                                    if ($data['isWon'] == 0) {
                                        $color = "red";
                                    } elseif ($data['isWon'] == 1) {
                                        $color = "lime";
                                    } else {
                                        $color = "white";
                                    }
                                    ?>
                                <tr style="color: <?php echo $color; ?>">
                                        <td class="col-xs-6"><?php echo $data['amount'] ?></td>
                                        <td class="col-xs-6"><?php echo $data['dateBet'] ?></td>
                                    </tr>
                                    <?php
                                }
                                $betsHistory->closeCursor(); // Termine le traitement de la requête
                                ?>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/scriptAnim.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="Bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>

</html>
