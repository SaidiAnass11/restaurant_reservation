<?php
include("partials-front/menu-front.php");
?>
<?php
$category_id=$_GET['id'];
$sql="SELECT * FROM `category` WHERE id = $category_id";
$res=$con->query($sql);
$row=$res->fetch();
$title=$row['title'];

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $title;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            $sql = "SELECT `id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active` FROM `foode` WHERE category_id = $category_id";
            $res=$con->query($sql);
            while($row=$res->fetch()){
               $id=$row['id'] ;
               $title = $row['title'];
               $description=$row['description'];
               $price=$row['price'];
               $image_name=$row['image_name'];
              ?>
              <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">$<?php echo $price;?></p>
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