<?php
include("partials-front/menu-front.php");
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
            $sql="SELECT * FROM `category` WHERE featured='Yes' AND active='Yes' LIMIT 3";
            $res=$con->query($sql);
           
            while( $row=$res->fetch()){
                $id = $row['id'];
                $title=$row['title'];
                $image_name=$row['image_name'];
                ?>
                   <a href="category-foods.php?id=<?php echo $id;?>">
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

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            $sql="SELECT `id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active` FROM `foode` WHERE `featured`='Yes' AND `active`='Yes' LIMIT 6";
            $res=$con->query($sql);
           
            while( $row=$res->fetch()){
                $id = $row['id'];
                $title=$row['title'];
                $description=$row['description'];
                $price=$row['price'];
                $image_name=$row['image_name'];
                $category_id=$row['category_id'];
                $featured=$row['featured'];
                $active=$row['active'];
                ?>
                <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="food-price">$<?php echo $price;?></p>
                    <p class="food-detail">
                     <?php echo $description;?>
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

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php
 include("partials-front/footer-front.php");
?>

   