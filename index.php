<?php include "includes/header.php"; ?>
    <h2 class="page-header">You Might also Like</h2>
    <div class="grid-view-container">
        <?php
            $albumQuery = mysqli_query($con,"select * from albums order  by rand() limit 10");
            while($row = mysqli_fetch_array($albumQuery)){

                echo "<div class='grid-view-item'>
                            <a href='album.php?id=" . $row['id'] . "' />
                                <img src='" .$row['artworkPath'] ."' />
                                <div class='grid-view-info'>"
                                    . $row['title'] .
                                "</div>
                       </div>";

            }
        ?>
    </div>


<?php include "includes/footer.php"; ?>