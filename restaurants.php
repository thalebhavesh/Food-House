<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
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
    <link href="css/new.css" rel="stylesheet">
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
      
      <a  href="index.php" class="text-3xl text-yellow-700 font-serif">Food House</a>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center ">
      <a href="restaurants.php" class="text-gray-900">Restaurants &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
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
        <p class="text-5xl font-serif text-lg text-orange-800 text-center">Restaurants <br></p>
            
          
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-7 col-md-6 col-lg-12">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">
								<?php $ress= mysqli_query($db,"select * from restaurant");
									      while($rows=mysqli_fetch_array($ress))
										  {
													
						
													 echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Food logo"></a>
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5><a href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].' 
																<ul class="list-inline">
																	<li class="list-inline-item"><i class="fa fa-check"></i> Min ₹ 100,00</li>
																	<li class="list-inline-item"><i class="fa fa-motorcycle"></i> 30 min</li>
																</ul>
															</div>
															<!-- end:Entry description -->
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		<div class="rating-block"> </i> </div>
																		<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>   <a href="dishes.php?res_id='.$rows['rs_id'].'" class="bg-green-500 hover:bg-green-700 text-white h-7 py-1 px-1 rounded-full">View Menu</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
										  }
						
						
						?>
                                    
                                </div>
                               
                            </div>
                         
                            
                                
                            </div>
                          
                          
                           
                        </div>
                    </div>
                </div>
            </section>
            <section class="app-section">
                
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