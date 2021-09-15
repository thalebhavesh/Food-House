<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); 
error_reporting(0);
session_start();

include_once 'product-action.php'; 

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Food House | Good Food for Good Moments</title>
    <meta name="description" content="Order food online from restaurants and get it delivered. Getting food delivered right at your doorstep anytime anywhere is easier than ever.
                                      Burger King, The Biryani House, Whatta Waffle, cake factory">
    <met name="keywords" conytent="restaurants, order food, order online, order food online, food, delivery, food delivery, home delivery, fast, hungry, quickly, offer, discount, takeaway, pizza, burger, biryani, dessert, juice,delhi, mumbai, chennai, pune, kolkata, lunch, dinner, snacks, restaurants near me">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
   
    <link href="css/style.css" rel="stylesheet"> 
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    
    <style>
.serif {
  font-family: "Times New Roman", Times, serif;
}
.btn-new{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

</style>
</head>

<body>
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">

    <header class="text-black font-medium bg-white">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center bg-white">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      
      <a href="index.php" class="text-3xl text-yellow-700 font-serif">Food House</a>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center ">
      <a  href="restaurants.php" class="text-gray-900">Restaurants &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      <?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<a href="registration.php" class="text-gray-900">Create Account &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
                                echo '<a href="login.php" class="text-gray-900">Login</a>';
							}
						else
							{
									
									
										echo  '<a href="your_orders.php" class="mr-5 hover:text-gray-900">My Orders &nbsp;&nbsp;&nbsp;&nbsp;</a>';
                                    echo  '<a href="logout.php" class="text-gray-900">Logout</a>';
                                    
							}

						?>
      
    </nav>
    
  </div>
</header>
        
        <br>
        <br>
            
			<?php $ress= mysqli_query($db,"select * from restaurant where rs_id='$_GET[res_id]'");
									     $rows=mysqli_fetch_array($ress);
										  
										  ?>
            <section class="bg-gray-900">
                <div class="profile">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                                <div class="image-wrap">
                                    <figure><?php echo '<img src="admin/Res_img/'.$rows['image'].'" alt="Restaurant logo">'; ?></figure>
                                </div>
                            </div>
							
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                                <div class="pull-left right-text text-white">
                                    <h6><a href="#" class="text-white"><?php echo $rows['title']; ?></a></h6>
                                    <p class="text-white"><?php echo $rows['address']; ?></p>
                                    <p class="text-white">Opening Time : <?php echo $rows['o_hr']; ?></p> 
                                    <p class="text-white">Closing Time : <?php echo $rows['c_hr']; ?></p>
                                    <ul class="nav nav-inline">
                                        <li class="nav-item"> <a class="nav-link active" href="#"><i class="fa fa-check"></i> Min ₹ 100,00</a> </li>
                                        <li class="nav-item"> <a class="nav-link">Delivery Time : 30 min</a> </li>
                                        <li class="nav-item ratings">
                                           
                                        </li>
                                    </ul>
                                </div>
                            </div>
							
							
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="breadcrumb">
                <div class="container">
                   
                </div>
            </div>
            <div class="container">
                <div class="row">
                                          
                      </div>

                    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-12">
                      
                       
                        <div class="menu-widget" id="2">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                              POPULAR ORDERS Delicious hot food! <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                              <i class="fa fa-angle-right pull-right"></i>
                              <i class="fa fa-angle-down pull-right"></i>
                              </a>
                           </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="collapse in" id="popular2">
						<?php  
									$stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) 
									{
									foreach($products as $product)
										{
						
													
													 
													 ?>
                                <div class="food-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
										<form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Res_img/dishes/'.$product['img'].'" alt="Food logo">'; ?></a>
                                            </div>
                                           
                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                <p> <?php echo $product['slogan']; ?></p>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> 
										<span class="price pull-left" >₹<?php echo $product['price']; ?></span>
										  <input class="b-r-0" type="text" name="quantity"  style="margin-left:30px;" value="1" size="2" />
										  <input type="submit" class="bg-green-500 hover:bg-green-700 text-white h-7 py-1 px-1 rounded-full" style="margin-left:46px;"  value="Add to cart" />
										</div>
										</form>
                                    </div>
                                   
                                </div>
                                
								
								<?php
									  }
									}
									
								?>
								
								
                              
                            </div>
                            
                        </div>
                        
                       
                    </div>
                   
                    
                </div>
               
            </div>
            <br>
            <br>
           
            <section class="">
               
            </section>
            
            <section class="text-gray-700 body-font bg-black">
  <div class="container px-5 py-16 mx-auto">
    <div class="flex flex-wrap md:text-left text-center order-first">
      <div class="lg:w-1/4 md:w-1/2 w-full px-3">
        <h2 class="title-font font-medium text-white tracking-widest text-lg mb-3">About Us</h2>
        <nav class="list-none mb-10">
          <li>
            <a href="#" class="text-white">About us</a>
          </li>
          <li>
            <a href="#" class="text-white">History</a>
          </li>
          <li>
            <a href="#" class="text-white">Our Team</a>
          </li>          
        </nav>
      </div>
      <div class="lg:w-1/4 md:w-1/2 w-full px-4">
        <h2 class="title-font font-medium text-white tracking-widest text-lg mb-3">How it Works</h2>        
        <nav class="list-none mb-10">
          <li>            
            <a href="#" class="text-white">Choose restaurant</a>
          </li>
          <li>
            <a href="#" class="text-white">Choose meal</a>
          </li>
          
        </nav>
      </div>
      <div class="lg:w-1/4 md:w-1/2 w-full px-4">
        <h2 class="title-font font-medium text-white tracking-widest text-lg mb-3">Popular locations</h2>
        <nav class="list-none mb-10">
          <li>
            <a href="#" class="text-white">Mumbai</a>
          </li>
          <li>
            <a href="#" class="text-white">Pune</a>
          </li>
          <li>
            <a href="#" class="text-white">Nashik</a>
          </li>
          
        </nav>
      </div>
      <div class="title-font font-medium text-white tracking-widest text-sm mb-3">
      <a  href="index.php" class="text-3xl text-yellow-700 font-serif">Food House</a>
                                        </div>
          <br>
          <br><br>
          <br>
          <br>
      <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
      <a href="https://www.facebook.com/" class="text-gray-500">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
          </svg>
        </a>
        <a href="https://twitter.com/" class="ml-3 text-gray-500">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
          </svg>
        </a>
        <a href="https://www.instagram.com/" class="ml-3 text-gray-500">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
          </svg>
        </a>
        <a href="https://www.linkedin.com/" class="ml-3 text-gray-500">
          <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
            <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
            <circle cx="4" cy="4" r="2" stroke="none"></circle>
          </svg>
        </a>
        </span>
        
        
      
      
    </div>
  </div>
  
                                        </section>
           
        </div>
        
    </div>
    
    
            </div>
        </div>
    </div>
   
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>
