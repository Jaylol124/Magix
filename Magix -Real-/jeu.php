<?php
    require_once("action/LobbyAction.php");

    $action = new LobbyAction();
    $data = $action->execute();

    $pageTitle = "Jeu";
    // require_once("partial/header.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CVMAQUA</title>
    <link href="css/global.css" rel="stylesheet" media="screen" />
    <!-- <link href="css/jquery.lightbox-0.5.css" rel="stylesheet" media="screen" /> -->
    <script src="js/jquery-1.4.2.min.js"></script>
    <!-- <script src="js/jquery.lightbox-0.5.min.js"></script> -->
    <script src="js/lesModifs.js"></script>
    <script defer src="js/game.js"></script>

</head>

<body>
    <!-- style="background-Image: url('images/index.jpg')" -->
    <div class="site-container">
        <div class="page-containerJeu">
            <script>
                document.body.style.backgroundImage = "url('images/bigback.jpg')";
            </script>

            <div class="opponent-place">
                <div class="opponent-card">
                    <div class="op-card">
                        <img class="back" src="../Magix -Real-/images/carteFace.png" alt="">
                    </div>
                    <div class="op-card">
                        <img class="back" src="../Magix -Real-/images/carteFace.png" alt="">
                    </div>
                    <div class="op-card">
                        <img class="back" src="../Magix -Real-/images/carteFace.png" alt="">
                    </div>


                </div>

                <div class="opponent-image">
                    <div class="op-life">

                        <img class="img-vie" src="../Magix -Real-/images/vie.png" alt="">
                        <p>0</p>
                        
                    </div>
                    <div class="op-banner">
                        <img class="img-op" src="../Magix -Real-/images/opponent.png" alt="">
                    </div>
                    <div class="op-mana">
                        <img class="img-mana" src="../Magix -Real-/images/mana.png" alt="">
                        <p>0</p>
                        
                    </div>
                </div>

                <div class="opponent-total-Card">

                    <div class="op-cardLeft">
                        <img class="back" src="../Magix -Real-/images/carteFace.png" alt="">
                        <P>0</P>
                    </div>

                </div>

            </div>

            <div class="air-jeu">
                
                
                <div class="op-playCard">
                    <div class="card">
                    </div>


                </div>

                <div class="erreur">
                    <p></p>
                </div>

                <div class="my-playCard">
                    <div class="card">

                    </div>



                </div>
                
                
            </div>

            <div class="my-player">

                <div class="my-stats">
                    <div class="my-life">
                        <img class="img-vie" src="../Magix -Real-/images/vie.png" alt="">
                        <p>0</p>
                    </div>
                    <div class="my-card">
                        <img class="back" src="../Magix -Real-/images/carteFace.png" alt="">
                        <p>0</p>
                    </div>
                    <div class="my-mana">
                        <img class="img-mana" src="../Magix -Real-/images/mana.png" alt="">
                        <p>0</p>
                    </div>
                </div>

                <div class="my-hand">
                    <div class="card">
                        <div class="top_info">
                            <div class="card_atk">0</div>
                            <div class="card_cost">0</div>
                            <div class="card_hp">0</div>
                        </div>

                        <div class="card_img"></div>
                        <div class="card_type">0</div>
                        <div class="card_desc">Je suis une carte</div>
                    </div>

                </div>



                <div class="my-choice">
                    <div class="tmp">
                        <p>0</p>
                    </div>
                    <form action="jeu.php" method="post">
                        <div class="my-power">
                            <button onclick="power()" type="button">HERO POWER</button>
                        </div>

                        <div class="my-endTurn">
                            <button onclick="end_turn()" type="button">END TURN</button>
                        </div>

                        <div class="my-chat">
                            <button onclick="chat()"name="chat" type="button">OPEN CHAT</button>
                        </div>

                    </form>

                    
                </div>

            </div>
        </div>

</body>

</html>