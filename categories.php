<?php
include("partials-front/menu-front.php");
?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
             $sql="SELECT * FROM `category` WHERE  active='Yes'";
             $res=$con->query($sql);
           
             while( $row=$res->fetch()){
                $id = $row['id'];
                $title=$row['title'];
                $image_name=$row['image_name'];
                ?>

                <a href="category-foods.php">
                <div class="box-3 float-container">
                <img src="images/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php echo $title;?></h3>
                </div>
                </a>
                <?php
             }
            ?>

         


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


<?php
 include("partials-front/footer-front.php");
?>