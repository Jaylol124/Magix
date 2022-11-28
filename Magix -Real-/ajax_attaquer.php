<?php
    require_once("action/AjaxActionAttaquer.php");

    $action = new AjaxActionAttaquer();
    $data = $action->execute();

    echo json_encode($data["result"]);