<?php

    if(isset($_POST["add"])){
        $rating =floatval($_POST["rating"]);
        $review = $_POST["review"];

        //Karena tabelnya user, order dan produk tidak ada jadinya user_id, order_id, product_id di set default

        $id = 1;

        $insertList = $conn->prepare("INSERT INTO user_review (order_id, product_id, rating, review, user_id) VALUES (:oid, :pid, :rating, :review, :uid)");
        $insertList->bindParam(":oid",$id);
        $insertList->bindParam(":pid",$id);
        $insertList->bindParam(":rating",$rating);
        $insertList->bindParam(":review",$review);
        $insertList->bindParam(":uid",$id);
        $insertList->execute();
        
        header("location: index.php");
        
    }elseif(isset($_GET["method"])){
        if($_GET["method"] == "delete" && isset($_GET["id"])){
            if($_GET["id"] == ""){
                $id = "0";
            }else{
                $id = $_GET["id"];
            }

            $deleteContent = $conn->prepare("DELETE FROM user_review WHERE id = :id");
            $deleteContent->bindParam(":id",$id);
            $deleteContent->execute();
            
            header("location: index.php?page=review");
            exit();
        }

    }elseif(isset($_POST["submitEdit"])){
        $rating =floatval($_POST["ratingedit"]);
        $review = $_POST["reviewedit"];
        $updateid = $_POST["idnum"];
        $updateContent = $conn->prepare("UPDATE user_review SET rating = :rating , review = :review WHERE id = :upId");
        $updateContent->bindParam(":upId",$updateid);
        $updateContent->bindParam(":rating",$rating);
        $updateContent->bindParam(":review",$review);
        if(empty($updateContent->errorInfo())){
            $updateContent->execute();
        }
        
        header("location: index.php?page=review");
    }
        $getContent = $conn->prepare("SELECT * FROM user_review");
        $getContent ->execute();

        $contents = $getContent->fetchAll();
    
?>