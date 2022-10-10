<?php
    require_once("action/AdminIndexAction.php");

    $action = new AdminIndexAction();
    $data = $action->execute();

    $pageTitle = "Accueil";
    require_once("partial/header.php");
?>
<div id="page-admin-index">
    <?php 
        if ($data["savedSuccessfully"]) {
            ?>
            <div class="success-div"><strong>Succès : </strong>Sauvegarde effectuée</div>
            <?php
        }
    ?>

    <form action="admin-index.php" method="post">
        <textarea name="ecrireText" id="mod" rows= "10" cols="100"> <?= $data["indexText"] ?> </textarea>
        <button>save</button>
    </form>
    
</div>

<?php
    require_once("partial/footer.php");