<?php
	require_once("action/LobbyAction.php");

	$action = new LobbyAction();
	$data = $action->execute();
	

	$pageTitle = "Lobby";
?>
<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>CVMAQUA</title>
        <link href="css/global.css" rel="stylesheet" media="screen" />
		<link href="css/lobby.css" rel="stylesheet" media="screen" />
		<script src="js/lesModifs.js"></script>
		
        
    </head>
    <body >
       
		<div class="site-container">
		    <div class="page-container" >
		    	<div class="site-header">
                    <a href="#default" class="logo">Magix</a>
                    <a href="#default" class="nowPage"><?= $pageTitle ?></a>
                    
                    
                    
		    		<div class="menu-section">
		    				
                        <?php
                            if ($data["isConnected"] ) {
                                ?>
                                <a href="images.php">Changer les cartes</a>
                                <a href="stats.php">Statistiques</a>
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
                                    <a href="?logout=true" name="logout">Déconnexion</a>
                                <?php
                            }
                        ?>
						<script>
            
							if ("<?= $pageTitle ?>" ==  "Lobby") 
							{
								document.body.style.backgroundImage = "url('images/backcartejeu.jpg')";
							}

        				</script>
		    		</div>
		    		<div class="clear"></div>
		    	</div>
		    	
			</div>
			<form action="lobby.php" method="post">
				<div class="lobby_page" >
					<div class="les-options">
						
						<div class= "jouer">
							<button  name="TRAINING" type="submit">TRAINING</button>
							
						</div>
						<div class= "les-cartes">
							<button  name="PVP" type="submit">PVP</button>
						</div>
					</div>	
					<div class= "chat">
						<iframe class = "chatIframe"style="width:1300px;height:400px;" onload="applyStyles(this)" 
							src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>/large">
						</iframe>
					</div>
				</div>
			</form>
			
<?php
	require_once("partial/footer.php");
