<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(empty($_SESSION['user_id']))  
{
	header('location:login.php');
}
else
{
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
<style type="text/css" rel="stylesheet">


.indent-small {
  margin-left: 5px;
}
.form-group.internal {
  margin-bottom: 0;
}
.dialog-panel {
  margin: 10px;
}
.datepicker-dropdown {
  z-index: 200 !important;
}
.panel-body {
  background: #e5e5e5;
  
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
 
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
}


table { 
	width: 750px; 
	border-collapse: collapse; 
	margin: auto;
	
	}


tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #ff3300; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	
	}


@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		
		position: absolute;
		
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}



.serif {
  font-family: "Times New Roman", Times, serif;
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
    <nav class="md:ml-auto flex flex-wrap items-center text-base">
      <a  href="restaurants.php" class="mr-5 hover:text-gray-900">Restaurants &nbsp;&nbsp;&nbsp;&nbsp;</a>
      <?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<a href="registration.php" class="text-gray-900">Create Account</a>
                                <a href="login.php" class="mr-5 hover:text-gray-900">Login</a>';
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

        
        <div class="page-wrapper">
            
            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">
                       <br>
                       </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        
                        <div class="widget widget-cart">
                               <div class="widget-heading">
                                   <h3 class="widget-title text-dark mt-8">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 Your Shopping Cart
                             </h3>
                                               
                             
                                   <div class="clearfix"></div>
                               </div>
                               <div class="order-row bg-white">
                                   <div class="widget-body">
                                   
                                   
                                   <?php

$item_total = 0;

foreach ($_SESSION["cart_item"] as $item) 
{
?>									
									
                                        <div class="title-row">
										<?php echo $item["title"]; ?><a href="cart.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
										<i class="fa fa-trash pull-right"></i></a>
										</div>
										
                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                 <input type="text" class="form-control b-r-0" value=<?php echo "₹" .$item["price"]; ?> readonly id="exampleSelect1">
                                                   
                                            </div>
                                            <div class="col-xs-4">
                                               <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>
                                        
									  </div>
                                     
   <?php
$item_total += ($item["price"]*$item["quantity"]); 
}
?>								  
                                     
                                     
                                     
                                   </div>
                               </div>
                              
                              
                            
                               <div class="widget-body">
                                   <div class="price-wrap text-xs-center">
                                       <p class="font-semibold">Item Total</p>
                                       <h3 class="text-2xl"><strong><?php echo "₹".$item_total; ?></strong></h3>
                                       <p class="font-semibold">Free Shipping</p><br>
                                       <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="bg-green-500 hover:bg-green-700 text-white h-7 py-1 px-1 rounded-full font-semibold" value="">Checkout</a>
                                   </div>
                                   
                               </div>
                               
                       
                               
                               
                           </div>
                   </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 ">
                            <div class="">
                                <div class="row">
								
							<table >
						  <thead>
							<tr>
							
							  <th class="bg-gray-800 text-sm">Item Name</th>
							  <th class="bg-gray-800 text-sm">Quantity</th>
							  <th class="bg-gray-800 text-sm">Price</th>
							   <th class="bg-gray-800 text-sm">Status</th>
							     <th class="bg-gray-800 text-sm">Date</th>
								   <th class="bg-gray-800 text-sm">Action</th>
							  
							</tr>
						  </thead>
						  <tbody>
						  
						  
							<?php 
						
						$query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
												if(!mysqli_num_rows($query_res) > 0 )
														{
															echo '<td  colspan="6"><center>You have No orders Placed yet. </center></td>';
														}
													else
														{			      
										  
										  while($row=mysqli_fetch_array($query_res))
										  {
						
							?>
												<tr>	
														 <td data-column="Item"> <?php echo $row['title']; ?></td>
														  <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
														  <td data-column="price">₹<?php echo $row['price']; ?></td>
														   <td data-column="status"> 
														   <?php 
																			$status=$row['status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
																			<button type="button" class="btn btn-info" style="font-weight:bold;">Dispatch</button>
																		   <?php 
																			  }
																			   if($status=="in process")
																			 { ?>
																				<button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span>On a Way!</button>
																			<?php
																				}
																			if($status=="closed")
																				{
																			?>
																			 <button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true">Delivered</button> 
																			<?php 
																			} 
																			?>
																			<?php
																			if($status=="rejected")
																				{
																			?>
																			 <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>cancelled</button>
																			<?php 
																			} 
																			?>
														   
														   
														   
														   
														   
														   
														   </td>
														  <td data-column="Date"> <?php echo $row['date']; ?></td>
														   <td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
															</td>
														 
												</tr>
												
											
														<?php }} ?>					
							
							
										
						
						  </tbody>
					</table>
						
					
                                    
                                </div>
                                
                            </div>
                         
                            
                                
                            </div>
                          
                          
                           
                        </div>
                    </div>
                </div>
            </section>
            <section  class="">
                
            </section>
            
            <br>
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
<?php
}
?>