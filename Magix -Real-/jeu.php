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
    <link href="css/jeu.css" rel="stylesheet" media="screen" />
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
                document.body.style.backgroundImage = "url('images/GodsYU.jpg')";
            </script>

            <div class="opponent-place">
                <div class="opponent-card">
                    <div class="op-card">

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

                        <p>0</p>

                    </div>
                    <div class="op-banner">
                        
                        <img class="img-op" src="../Magix -Real-/images/opponent.png" alt="">
                        <p>bot</p>
                    </div>
                    <div class="op-mana">

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

                <div class="chat-ingame" id="reduire-chat">
                    <iframe class = "Iframe"style="width:100%;height:100px;" onload="applyStyles(this)" 
                        src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>/large">
                    </iframe>
                </div>
            </div>

            <div class="my-player">

                <div class="my-stats">
                    <div class="my-life">

                        <p>0</p>
                    </div>
                    <div class="my-card">

                        <p>0</p>
                    </div>
                    <div class="my-mana">

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

                        <div class="card_img" id="image-carte"></div>
                        <div class="card_type">0</div>
                        <div class="card_desc">Je suis une carte</div>
                    </div>

                </div>



                <div class="my-choice">
                    <div class="tmp">
                        <div class="millieu-tmp">
                        </div>

                        <div class="le-contour" id="aiguille">
                            <div class="le-baton">
                                <div class="baton">
                                </div>
                            </div>
                        </div>
                        <div class="turn">
                            <p>0</p>
                        </div>
                        <div class="time">
                            <p>0</p>
                        </div>

                    </div>
                    <div class="choix-but">
                        <div class="my-power">
                            <button onclick="power()" type="button">HERO POWER</button>
                        </div>

                        <div class="my-endTurn">
                            <button onclick="end_turn()" type="button">END TURN</button>
                        </div>

                        <div class="my-chat">
                            <button onclick="chat()" type="button">OPEN CHAT</button>
                        </div>

                        <div class="surrender">
                            <button onclick="surrender()" type="button">SURRENDER</button>
                        </div>
                    </div>
                     
                </div>



            </div>

            <div class="card-viewer">
                <div class="card-big">
                    <div class="top_info_big">
                        <div class="card_atk_big">10</div>
                        <div class="card_cost_big">10</div>
                        <div class="card_hp_big">0</div>
                    </div>

                    <div class="card_img_big"></div>
                    <div class="card_type_big">taunt</div>
                    <div class="card_desc_big">Je suis une carte avec une des bizzare l;ajg;gj;jag</div>
                </div>
            </div>

            
        </div>

</body>

</html>