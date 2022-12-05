<?php
	require_once("action/LoginAction.php");

	$action = new LoginAction();
	$data = $action->execute();

	$pageTitle = "Connexion";
?>

<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>CVMAQUA</title>
        <link href="css/global.css" rel="stylesheet" media="screen" />
        <script>
            if ("<?= $pageTitle ?>" ==  "Page-Choix") 
            {
                document.querySelector("body").style.backgroundImage = "url('images/index.jpg')";   
            }
        </script>
    </head>
    <body >
		<div class="site-container">
		    <div class="page-container" >
		    	<div class="site-header">
                    <a href="#default" class="logo">Magix</a>
                    <a href="#default" class="nowPage"><?= $pageTitle ?></a>

		    		<div class="menu-section">
                        <?php
                            if (!$data["isConnected"]) {
                                ?>
                                <a href="login.php">Connexion</a>
                                
                                <?php
                            }
                        ?>
		    		</div>
		    		<div class="clear"></div>
		    	</div>
		    	<div class="page-content">
	<div class="Title">
		<h1>MAGIX</h1>
	</div>
	<div class="login-form-frame">
		<form action="login.php" method="post">
			<?php
				if ($data["hasConnectionError"]) {
					?>
					<div class="error-div"><strong>Erreur : </strong>Connexion erronée</div>
					<?php
				}
			?>
			<div class="info">
				<div class="form-label">
					<label for="username">Nom d'usager : </label>
				</div>
				<div class="form-input">
					<input type="text" name="username" id="username" />
				</div>
				<div class="form-separator"></div>

				<div class="form-label">
					<label for="password">Mot de passe : </label>
				</div>
				<div class="form-input">
					<input type="password" name="pwd" id="password" />
				</div>
				<div class="form-separator"></div>

				<div class="form-label">
					&nbsp;
				</div>
				<div class="form-input">
					<button type="submit">Connexion</button>
				</div>
				<div class="form-separator"></div>
			</div>
		</form>
	</div>
<?php
	require_once("partial/footer.php");
