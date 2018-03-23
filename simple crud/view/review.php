<?php

    include __DIR__ . "/master/header.php";
    include __DIR__ . "/../controller/review.php";
?>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <br>
                <div class="card-panel white">
                    <h4>Review Kami!</h4> 
                    <form action="index.php?action=review" method="POST">
                        <p>Rating</p>
                        <input type="range" name="rating" min="1" max="5" step="0.01" value="2.50" oninput="ratingOut.value = rating.value">
                        <output name="ratingOutput" id="ratingOut">2.50</output>
                        <input type="text" name="review" placeholder="Your thought">
                        <button type="submit" name="add" class="btn waves-effect waves-light red"><i class="left material-icons">add</i>Add List</button>                    
                    </form>
                    <?php foreach($contents as $data): ?>
                        <?php echo "<p> Rating :".$data['rating']."  </p>";
                        if($data['created_at']==$data['updated_at']){
                            echo "<p><small>".$data['created_at']."</small></p>";
                        }else{
                            echo "<p><small> <i>Recently updated -</i>".$data['updated_at']."</small></p>";
                        }
                         echo "<p>>> ".$data['review']." <<  <a href='index.php?action=review&method=delete&id=".$data['id']."'>DELETE</a> OR  <a href='index.php?page=edit'>EDIT</a>";?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php
    include __DIR__ . "/master/footer.php";
?>