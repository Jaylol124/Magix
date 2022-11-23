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
    <body >
        <!-- style="background-Image: url('images/index.jpg')" -->
		<div class="site-container">
		    <div class="page-containerJeu" >
                <script>
                    document.body.style.backgroundImage = "url('images/bigback.jpg')";
                </script>

		    	<div class="opponent-place">
                    <div class="opponent-card" >
                        <div class="op-card">
                            <img class = "back" src="../Magix -Real-/images/carteFace.png" alt="">
                        </div>
                        <div class="op-card">
                            <img class = "back" src="../Magix -Real-/images/carteFace.png" alt="">
                        </div>
                        <div class="op-card">
                            <img class = "back" src="../Magix -Real-/images/carteFace.png" alt="">
                        </div>

                        
                    </div>

                    <div class="opponent-image" >
                        <div class="op-life">
                            <p>0</p>
                        </div>
                        <div class="op-banner">
                            <img class = "img-op" src="../Magix -Real-/images/opponent.png" alt="">
                        </div>
                        <div class="op-mana">
                            <p>0</p>
                        </div>
                    </div>

                    <div class="opponent-total-Card" >
                        
                        <div class="op-cardLeft">
                            <P>0</P>
                        </div>
                        
                    </div>
                    
		    	</div>

                <div class="air-jeu">
                    <div class="op-playCard" >
                        <div class="card">
                            
                        </div>
                        <div class="card">
                            
                        </div>
                        <div class="card">
                            
                        </div>
                    </div>

                    <div class="my-playCard" >
                        <div class="card">
                            
                        </div>
                        <div class="card">
                            
                        </div>
                        <div class="card">
                            
                        </div>

                        
                    </div>
		    	</div>

                <div class="my-player">
                    
                    <div class="my-stats" >
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

                    <div class="my-hand" >
                        <div class="card">
                            
                        </div>
                        <div class="card">
                            
                        </div>
                        <div class="card">
                            
                        </div>


                        
                    </div>

                    <div class="my-choice" >
                        
                        <div class="my-power">
                            <P>0</P>
                        </div>

                        <div class="my-endTurn">
                            <P>0</P>
                        </div>

                        <div class="my-chat">
                            <P>0</P>
                        </div>
                        
                    </div>
                    
                </div>
			</div>
 
        </body>
</html>