<?php
	require_once("action/StatsAction.php");

	$action = new StatsAction();
	$data = $action->execute();
	

	$pageTitle = "Statistiques";
	// require_once("partial/header.php");
?>
<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>CVMAQUA</title>
        <link href="css/global.css" rel="stylesheet" media="screen" />
		<link href="css/lobby.css" rel="stylesheet" media="screen" />
        <link href="css/Stats.css" rel="stylesheet" media="screen" />
        <!-- <link href="css/jquery.lightbox-0.5.css" rel="stylesheet" media="screen" /> -->
        <script src="js/jquery-1.4.2.min.js"></script>
        <!-- <script src="js/jquery.lightbox-0.5.min.js"></script> -->
		<script src="js/lesModifs.js"></script>
		<!-- <script defer src="js/lobby.js"></script> -->
        
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
                                <a href="lobby.php">Lobby</a>
                                <a href="images.php">Changer les cartes</a>
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
            
							if ("<?= $pageTitle ?>" ==  "Page-Choix") 
							{
								document.body.style.backgroundImage = "url('images/backcartejeu.jpg')";
							}

        				</script>
		    			
		    		</div>
		    		<div class="clear"></div>
		    	</div>
		    	
			</div>
            <form action="stats" method="post">
                <div= class="stats_container">
                    <div class="stats_page" >
                        <div class="titre">
                            <h1> LES STATS</h1>
                        </div>
                        <div class="poucentage_carte">
                            <?php
                                foreach ($data["total"] as $totals)
                                {
                                    foreach ($data["listeandcont"] as $id) {
                                        ?>
                                        <div class="resultat">LE ID DE LA CARTE <?= $id["idcard"]?> =====> <?= $id["occurence"] ?> =====> <?= round($id["occurence"]/ $totals["total"] * 100,1)  ?>%</div>                            
                                        <?php
                                    }
                                }
                                
                            ?>
                        </div>
                        <div class="button">
                            <button name="supp" type="submit"> Effacer </button>
                        </div>
                        
                    </div>
                </div>
            </form>
            
			
			
<?php
	require_once("partial/footer.php");
