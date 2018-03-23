<?php

    include __DIR__ . "/config/db.php";

    if(isset($_GET["page"])){
        $pageWhitelist = ["review","edit"];
        if(!in_array($_GET["page"], $pageWhitelist)){
            echo "Halaman tidak ditemukan";
        }else{
            include __DIR__ . "/view/" . $_GET["page"] . ".php";
        }
    }elseif(isset($_GET["action"])){
        $actionWhitelist = ["review"];
        if(!in_array($_GET["action"], $actionWhitelist)){
            echo "Aksi tidak ditemukan";
        }else{
            include __DIR__ . "/controller/" . $_GET["action"] . ".php";
        }
    }else{
            include __DIR__ . "/view/review.php";
    }

?>