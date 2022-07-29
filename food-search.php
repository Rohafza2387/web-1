
    <?php include('partials-front/menu.php'); ?>

            <?php 
                $search = $_POST['search'];
            ?>


    <h2><a href="#" class="text-white">Foods on Your Search "<?php echo $search; ?>"</a></h2>

    <section class="food-menu">
        <div class="container">
               
        <?php 
            $search = $_POST['search'];

?>
            <h2><a href="#" class="text-center">Foods on Your Search "<?php echo $search; ?>"</a></h2>
    

            <?php 
                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' ";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {

                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php 

                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">$<?php echo $price; ?></p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Food not found.</div>";
                }
            
            ?>

            <div class="clearfix"></div>     

        </div>

    </section>

    
