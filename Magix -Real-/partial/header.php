<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>CVMAQUA</title>
        <link href="css/global.css" rel="stylesheet" media="screen" />
        <link href="css/jquery.lightbox-0.5.css" rel="stylesheet" media="screen" />
        <script src="js/jquery-1.4.2.min.js"></script>
        <script src="js/jquery.lightbox-0.5.min.js"></script>
    </head>
    <body>
		<div class="site-container">
		    <div class="page-container">
		    	<div class="site-header">
		    		<!-- <div class="page-title-section">
			    		<h1>Magix</h1>
			    		<h2>?= $pageTitle ?></h2>
		    		</div> -->
                    <a href="#default" class="logo">Magix</a>
                    <a href="#default" class="logo"><?= $pageTitle ?></a>
                    
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
		    			
		    		</div>
		    		<div class="clear"></div>
		    	</div>
		    	<div class="page-content">