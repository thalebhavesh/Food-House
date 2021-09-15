<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{

										  
												foreach ($_SESSION["cart_item"] as $item)
												{
											
												$item_total += ($item["price"]*$item["quantity"]);
												
													if($_POST['submit'])
													{
						
													$SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
						
														mysqli_query($db,$SQL);
														
                                              
                            $success = "Thankyou! Your Order Placed successfully!";
                            
														
														
													}
												}
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
</style>
     </head>
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">

    <div class="site-wrapper">

    <header class="text-black font-medium bg-white">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center bg-white">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      
      <a href="index.php" class="text-3xl text-yellow-700 font-serif">Food House</a>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center ">
      <a  href="restaurants.php" class="text-gray-900">Restaurants  &nbsp;&nbsp;</a>
      <?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<a href="registration.php" class="text-gray-900">Create Account &nbsp;&nbsp;</a>';
                                echo '<a href="login.php" class="text-gray-900">Login</a>';
							}
						else
							{
									
									
										echo  '<a href="your_orders.php" class="mr-5 hover:text-gray-900">My Orders</a>';
                                    echo  '<a href="logout.php" class="text-gray-900">Logout</a>';
                                    
							}

						?>
      
    </nav>
    
  </div>
</header>
        
      
			
<div class="container">
                 
                 <span style="color:green;">
                    <?php echo $success; ?>
                        </span>
              
                    </div>
            
			
			
				  
            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4 class="font-semibold">Bill Details</h4> </div>
                                        <div class="cart-totals-fields">
										
                                            <table class="table">
											<tbody>
                                          
												 
											   
                                                    <tr>
                                                        <td class="font-semibold">Item Total</td>
                                                        <td> <?php echo "₹".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-semibold">Delivery Fee</td>
                                                        <td class="font-semibold">Free Shipping</td>
                                                        </tr>
                                                        <tr>
                                                        <td class="font-semibold">Taxes and Charges</td>
                                                        <td class="font-semibold">₹0</td>
                                                        <td>
                                                        </tr>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>TO PAY</strong></td>
                                                        <td class="text-color font-semibold"><strong> <?php echo "₹".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
												
												
												
												
                                            </table>
                                        </div>
                                    </div>
                                    
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                        <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Cash on delivery</span>
                                                    <br> 
                                                    </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" value="paypal"  class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Credit/Debit Cards <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                            
                                            
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit"  onclick="return confirm('Are you sure?');" name="submit"  class="btn btn-outline-success btn-block" value="Order now"> </p>
                                    </div>
									</form>
                  
                 
					  
			
              
                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
            </div>
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

<?php
}
?>