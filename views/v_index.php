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
            <!-- Partie gauche -->
            <div class="col-md-3 col-xs-12" style="background-color: #2a2b2b; color: white; height: 800px;">
                <div class="col-md-12 col-xs-12" style="background-color: #1b2021; color: white; height: 760px; margin-top: 20px;">
                    <h1 style="text-align: center;">TOP 10</h1>
                    <hr>
                    <table class="table" id="tableBestPlayer">
                        <thead>
                        <th class="col-xs-1">Username</th>
                        <th class="col-xs-3">Balance in §</th>
                        <?php if (isset($_SESSION['pseudo'])) { ?><th class="col-xs-1">Edition</th><?php } ?>
                        </thead>
                        <?php while ($donnees = $usersList->fetch()) { ?>
                            <tr>
                                <td class="col-xs-6"><?php echo $donnees['username'] ?></td>
                                <td class="col-xs-6"><?php echo $donnees['balance'] ?></td>
                            </tr>
                            <?php
                        }
                        $usersList->closeCursor(); // Termine le traitement de la requête
                        ?>
                    </table>
                    
                    <!--<div class="col-md-12 col-xs-12" style="background-color: #1b2021; color: white; height: 600px; margin-top: 20px;">
                    </div>
                    <form class="form-inline" style="margin-bottom: 25px;">
                      <div class="form-group mx-sm-3 mb-3">
                        <input type="text" class="form-control" id="message" placeholder="Your message">
                      </div>
                      <button type="submit" class="btn btn-primary mb-2">
                        <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                      </button>
                    </form>-->
                </div>
            </div>

            <!-- Partie droite -->
            <div class="col-md-9 col-xs-12" style="background-color: #2a2b2b; color: white; height: 800px;">

                <div class="col-md-12 col-xs-12" style="background-color: #1b2021; color: white; height: 560px; margin-top: 20px;">
                    <?php if ($_SESSION["logue"]) { ?>
                        <canvas id="game" class="col-md-12 col-xs-12" style="margin-top : 15px; height: 530px;"></canvas><br>
                    <?php } else { ?>
                        <h2>How to play...</h2>
                        <video class="col-md-10 col-xs-12 col-md-offset-1" autoplay loop>
                            <source src="./assets/videos/shifoumi.webm" type="video/webm">
                        </video>
                    <?php } ?>

                </div>
                <div class="col-md-12 col-xs-12" style="background-color: #1b2021; margin-top: 20px; min-height: 180px;">
                    <!--                    <ul class="nav nav-pills">
                                            <li><a data-toggle="pill" href="#onePointBet" style="color: white; text-decoration: none;" onmouseover="this.style.color = 'white'; this.style.background = '#419222';" onmouseout="this.style.color = 'white'; this.style.background = 'none'">One point bet</a></li>
                                            <li><a data-toggle="pill" href="#gameBet" style="color: white; text-decoration: none;" onmouseover="this.style.color = 'white'; this.style.background = '#419222';" onmouseout="this.style.color = 'white'; this.style.background = 'none'">Game bet</a></li>
                                        </ul>-->
                    <div class="tab-content">
                        <?php if ($_SESSION["logue"]) { ?>


                            <div id="onePointBet" class="tab-pane fade in active">
                                <form action="index.php" method="POST">
                                    <fieldset>
                                        <legend style="color:white;">One point bet</legend>
                                        <div class="col-md-3 col-xs-12">

                                            <button id="btnleft" name="btnLeft" type="submit" style="background-color: #970a08; border: none; width:200px; height: 50px; font-size: 30px; border-radius: 5px;">Bet !</button>

                                        </div>

                                        <div class="col-md-3 col-xs-12" style="text-align: center;">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button id="minus" type="button" class="btn btn-default btn-number" data-type="minus" data-field="amount">
                                                        <span class="glyphicon glyphicon-minus"></span>
                                                    </button>
                                                </span>
                                                <input type="text" id="amount" name="amount" class="form-control input-number" value="50" min="50" max="1000">
                                                <span class="input-group-btn">
                                                    <button id="plus" type="button" class="btn btn-default btn-number" data-type="plus" data-field="amount">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                </span>
                                            </div>
                                            <!--<br><br>
                                            <label for="rock">Rock</label>
                                            <input type="radio" name="choice" id="rock">
                                            <label for="paper">Paper</label>
                                            <input type="radio" name="choice" id="paper">
                                            <label for="scissors">Scissors</label>
                                            <input type="radio" name="choice" id="scissors">-->
                                        </div>
                                        <div class="col-md-3 col-xs-12" style="text-align: center;">
                                            <h1 id="benefit">Benefit : 100</h1>
                                        </div>

                                        <div class="col-md-3 col-xs-12">

                                            <button id="btnright" name="btnRight" type="submit" style="background-color: #419222; border: none; float: right; width:200px; height: 50px; font-size: 30px; border-radius: 5px;">Bet !</button>

                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <!--<div id="gameBet" class="tab-pane fade">
                                <form method="post">
                                    <fieldset>
                                        <legend style="color:white;">Game bet</legend>
                                        <div class="col-md-3 col-xs-3">
                                            <input id="submit" name="submitL" type="submit" class="btn btn-primary" value="Bet !" style="background-color: #970a08; border: none; float: left; width: 200px; height: 50px; font-size: 30px;">
                                        </div>
                                        <div class="col-md-3 col-xs-3" style="text-align: center;">
                                            <button type="submit" class="btn btn-primary mb-2" style="background-color: #970a08; border: none;">
                                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                            </button>
                                            <input type="text" style="text-align: center; color: black;" name="amount" id="amount" readonly>
                                            <button type="submit" class="btn btn-primary mb-2" style="background-color: #419222; border: none;">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-xs-3" style="text-align: center;">
                                            <h1>Benefit : X</h1>
                                        </div>
                                        <div class="col-md-3 col-xs-3">
                                            <input id="submit" name="submitR" type="submit" class="btn btn-primary" value="Bet !" style="background-color: #419222; border: none; float: right; width:200px; height: 50px; font-size: 30px;">
                                        </div>
                                    </fieldset>
                                </form>
                            </div>-->
                        <?php } else { ?>
                            <h1 class="col-md-6 col-xs-12 col-md-offset-3 vcenter">You must be logged to play !</h1>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/scriptAnim.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="Bootstrap/js/bootstrap.min.js"></script>
        <?= $script ?>
    </body>

</html>
