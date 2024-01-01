<?php
include("partials-front/menu-front.php");
<link rel="stylesheet" type="text/css" href="E:\DEV\PROFIL\My Projet\PFE23 (reservation restau)\web\css\order.css">
?>
<?php
$id = $_GET['id'];
$sql="SELECT `id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active` FROM `foode` WHERE id=$id";
$res=$con->query($sql);
$row=$res->fetch();
$id=$row['id'];
$title=$row['title'];
$price=$row['price'];
$image_name = $row['image_name'];


?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="images/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <p class="food-price">$<?php echo $price;?></p>
                        <input type="hidden" name="title" value="<?php echo $title;?>" >
                        <input type="hidden" name="price" value="<?php echo $price;?>" >

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="E.g. Chaima Asbayti" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@chaimaAsbayti.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
    
            </form>
 
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
<?php
 include("partials-front/footer-front.php");
?>
           <?php
                if(isset($_POST['submit'])){
                    $food = $_POST['title'];
                    $price = $_POST['price'];
                    $qt=$_POST['qty'];
                    $tot=$price*$qt;
                    $or_dat=date("Y-m-d h:i:s");
                    $status ="ordedred";
                    $full_name=$_POST['full_name'];
                    $contact = $_POST['contact'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $sql="INSERT INTO `order`(`food`, `price`, `qte`, `total`,`order_date`,`status`,`customer_name`,`customer_contact`,`customer_email`,`customer_adress`) VALUES ('$food','$price ','$qt','$tot','$or_dat','$status','$full_name','$contact','$email','$address')";
                    $con->exec($sql);
                    header("location:index.php");
                }
                
                
                
                ?>
