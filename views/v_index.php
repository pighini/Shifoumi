<!DOCTYPE html>
<html>
    <head>
        <title>Shifumi</title>
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
            <div class="col-md-3 col-xs-3" style="background-color: #2a2b2b; color: white; height: 800px;">
                <div class="col-md-12 col-xs-12" style="background-color: #1b2021; color: white; height: 760px; margin-top: 20px;">
                  <div class="col-md-12 col-xs-12" style="background-color: #1b2021; color: white; height: 600px; margin-top: 20px;">

                  </div>
                  <form class="form-inline" style="margin-bottom: 25px;">
                    <div class="form-group mx-sm-3 mb-3">
                      <input type="text" class="form-control" id="message" placeholder="Your message">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                      <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                    </button>
                  </form>
               </div>
            </div>

            <!-- Partie droite -->
            <div class="col-md-9 col-xs-9" style="background-color: #2a2b2b; color: white; height: 800px;">
              <button onclick="Anim('leaf','scissor');">Click Me</button>
                <div class="col-md-12 col-xs-12" style="background-color: #1b2021; color: black; height: 560px; margin-top: 20px;">
                    <canvas id="game" class="col-md-12 col-xs-12" style="background-color: #419222; margin-top : 15px; height: 530px;"></canvas><br>
                </div>
                <div class="col-md-12 col-xs-12" style="background-color: #1b2021; margin-top: 20px; height: 180px;">
                    <ul class="nav nav-pills">
                        <li><a data-toggle="pill" href="#onePointBet" style="color: white; text-decoration: none;" onmouseover="this.style.color = 'white'; this.style.background = '#419222';" onmouseout="this.style.color = 'white'; this.style.background = 'none'">One point bet</a></li>
                        <li><a data-toggle="pill" href="#gameBet" style="color: white; text-decoration: none;" onmouseover="this.style.color = 'white'; this.style.background = '#419222';" onmouseout="this.style.color = 'white'; this.style.background = 'none'">Game bet</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="onePointBet" class="tab-pane fade in active">
                            <form method="post">
                                <fieldset>
                                    <legend style="color:white;">One point bet</legend>
                                    <div class="col-md-3 col-xs-3">
                                      <input id="submit" name="submitL" type="submit" class="btn btn-primary" value="Bet !" style="background-color: #970a08; border: none; float: left; width: 200px; height: 50px; font-size: 30px;">
                                    </div>
                                      <div class="col-md-3 col-xs-3" style="text-align: center;">
                                        <label for="amount">Amount</label>
                                        <input type="number" style="text-align: center; color: black;" name="amount" id="amount">
                                        <br><br>
                                        <label for="rock">Rock</label>
                                        <input type="radio" name="choice" id="rock">
                                        <label for="paper">Paper</label>
                                        <input type="radio" name="choice" id="paper">
                                        <label for="scissors">Scissors</label>
                                        <input type="radio" name="choice" id="scissors">
                                      </div>
                                      <div class="col-md-3 col-xs-3" style="text-align: center;">
                                        <h1>Benefit : X</h1>
                                      </div>
                                    <div class="col-md-3 col-xs-3">
                                      <input id="submit" name="submitR" type="submit" class="btn btn-primary" value="Bet !" style="background-color: #419222; border: none; float: right; width:200px; height: 50px; font-size: 30px;">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div id="gameBet" class="tab-pane fade">
                          <form method="post">
                              <fieldset>
                                  <legend style="color:white;">Game bet</legend>
                                  <div class="col-md-3 col-xs-3">
                                    <input id="submit" name="submitL" type="submit" class="btn btn-primary" value="Bet !" style="background-color: #970a08; border: none; float: left; width: 200px; height: 50px; font-size: 30px;">
                                  </div>
                                    <div class="col-md-3 col-xs-3" style="text-align: center;">
                                      <label for="amount">Amount</label>
                                      <input type="number" style="text-align: center; color: black;" name="amount" id="amount">
                                    </div>
                                    <div class="col-md-3 col-xs-3" style="text-align: center;">
                                      <h1>Benefit : X</h1>
                                    </div>
                                  <div class="col-md-3 col-xs-3">
                                    <input id="submit" name="submitR" type="submit" class="btn btn-primary" value="Bet !" style="background-color: #419222; border: none; float: right; width:200px; height: 50px; font-size: 30px;">
                                  </div>
                              </fieldset>
                          </form>
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
