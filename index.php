<?php include "includes/header.php"; ?>
    <h2>You Might also Like</h2>
    <div class="grid-view-container">
        <?php
            $albumQuery = mysqli_query($con,"select * from albums");
            while($row = mysqli_fetch_array($albumQuery)){
                echo $row['title'] . "<br>";
            }
        ?>
    </div>


<?php include "includes/footer.php"; ?>