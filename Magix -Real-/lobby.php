<?php
	require_once("action/LobbyAction.php");

	$action = new LobbyAction();
	$data = $action->execute();

	$pageTitle = "Page-Choix";
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
        
    </head>
    <body >
        <!-- style="background-Image: url('images/index.jpg')" -->
		<div class="site-container">
		    <div class="page-container" >
		    	<div class="site-header">
                    <a href="#default" class="logo">Magix</a>
                    <a href="#default" class="nowPage"><?= $pageTitle ?></a>
                    
                    
                    
		    		<div class="menu-section">
		    				
                        <?php
                            if ($data["isConnected"] ) {
                                ?>
                                <a href="index.php">Accueil</a>
                                <a href="images.php">Galerie photos</a>
                                <a href="contact.php">Contactez-nous</a>
                                <?php
                                
                                
                            }
                            
                        ?>
                        <?php
                            if (!$data["isConnected"]) {
                                ?>
                                <a href="login.php">Connexion</a>
                                
                                <?php
                            }
                            else {
                                ?>
                                <a href="admin-index.php">Administration</a>
                                <a href="?logout=true">Déconnexion</a>
                                <?php
                            }
                        ?>
						<script>
            
							if ("<?= $pageTitle ?>" ==  "Page-Choix") 
							{

								document.body.style.backgroundImage = "url('images/backcartejeu.jpg')";
									
									
							}

        				</script>
		    			
		    		</div>
		    		<div class="clear"></div>
		    	</div>
		    	
			</div>
			<!-- <div class="line-ones" >
				
			</div> -->
			<div class="les-options">
				<form action="lobby.php" method="post">
					<div class= "jouer">
						<!-- <a href="pagejeu.php">Jouer</a> -->
						<button name="play" type="submit"> jouer</button>
					</div>
					<div class= "les-cartes">
						<a href="?logout=true">Cartes de jeux</a>
					</div>
				</form>
			</div>
			<div class= "chat">
				<iframe class = "chatIframe"style="width:700px;height:400px;" onload="applyStyles(this)" 
					src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>/large">
				</iframe>
			</div>
<?php
	require_once("partial/footer.php");
