<?php
include("partials-front/menu-front.php");
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
            //gitting the search keyword
            $search=$_POST['search'];
            ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
             //gitting the search keyword
             $search=$_POST['search'];
             //search in database
             $sql="SELECT * FROM `foode` WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
             $Res=$con->query($sql);
             While($row=$Res->fetch()){
                $id=$row['id'];
                $title=$row['title'];
                $description=$row['description'];
                $price=$row['price'];
                $image_name=$row['image_name'];
                $category_id=$row['category_id'];
               ?>
                    <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title;?></h4>
                        <p class="food-price">$<?php echo $price; ?></p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="order.php?id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
               <?php


             }
            
            ?>

           

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php
 include("partials-front/footer-front.php");
?>