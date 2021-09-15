<!DOCTYPE html>
<html lang="en">
<?php

session_start(); 
error_reporting(0); 
include("connection/connect.php"); 
if(isset($_POST['submit'] )) 
{
     if(empty($_POST['firstname']) ||  
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']))
		{
			$message = "All fields must be Required!";
		}
	else
	{
		
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){  
       	$message = "Password not match";
    }
	elseif(strlen($_POST['password']) < 1)  
	{
		$message = "Password Must be >=6";
	}
	elseif(strlen($_POST['phone']) < 10) 
	{
		$message = "invalid phone number!";
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
       	$message = "Invalid email address please type a valid email!";
    }
	elseif(mysqli_num_rows($check_username) > 0)  
     {
    	$message = 'username Already exists!';
     }
	elseif(mysqli_num_rows($check_email) > 0) 
     {
    	$message = 'Email Already exists!';
     }
	else{
       

	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
		$success = "Account Created successfully! <p>You will be redirected in <span id='counter'>5</span> second(s).</p>
														<script type='text/javascript'>
														function countdown() {
															var i = document.getElementById('counter');
															if (parseInt(i.innerHTML)<=0) {
																location.href = 'login.php';
															}
															i.innerHTML = parseInt(i.innerHTML)-1;
														}
														setInterval(function(){ countdown(); },1000);
														</script>'";
		
		
		
		
		 header("refresh:5;url=login.php"); 
    }
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
     <header class="text-black font-medium bg-white">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center bg-white">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      
      <a href="index.php" class="text-3xl text-yellow-700 font-serif">Food House</a>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center ">
      <a  href="restaurants.php" class="text-gray-900">Restaurants &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      <?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<a href="registration.php" class="text-gray-900">Create Account &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
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
             
         <br>
         <br>
            
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">
					  <span style="color:red;"><?php echo $message; ?></span>
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					   
					</a></li>
                    
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                              
							  <form action="" method="post">
                                 <div class="row">
								  <div class="form-group col-sm-12">
                          <h4 class="text-xl"><b>Sign Up Account</b></h4><br>
                                       <label for="exampleInputEmail1">UserName</label>
                                       <input class="form-control" type="text" name="username" id="example-text-input" placeholder="UserName"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">First Name</label>
                                       <input class="form-control" type="text" name="firstname" id="example-text-input" placeholder="First Name"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Last Name</label>
                                       <input class="form-control" type="text" name="lastname" id="example-text-input-2" placeholder="Last Name"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Email address</label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Phone number</label>
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3" placeholder="Phone"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Password</label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Confirm password</label>
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Password"> 
                                    </div>
									 <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Delivery Address</label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                   
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <input type="submit" value="Sign Up" name="submit" class="bg-orange-600 text-white h-7 py-1 px-1 rounded font-bold "> </p>
                                    </div>
                                 </div>
                              </form>
                           
						   </div>
                           
                        </div>
                        
                     </div>
                     
                     <div class="col-md-4">
                        <p class="font-serif text-xl">Eat to Live, Not Live to Eat!</p>
                        
                        <hr>
                        <img src="images/img/show.jpg" alt="" class="img-fluid">
                        <h4><b>Latest Articles</b></h4>
                        
                        <div class="panel">
                           <div class="panel-heading">
                              <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq1" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Add more fruit and vegetables to your diet</a></h4>
                           </div>
                           <div class="panel-collapse collapse" id="faq1" aria-expanded="false" role="article" style="height: 0px;">
                              <div class="panel-body"> Fruit and veggies are low in energy and nutrient dense, which capacity they are packed with vitamins, minerals, antioxidants, and fiber. Focus on ingesting the encouraged each day quantity of at least 5 servings of fruit and veggies and it will naturally fill you up and assist you reduce again on unhealthy foods. A serving is half of a cup of uncooked fruit or veg or a small apple or banana, for example. Most of us want to double the quantity we presently eat.</div>
                           </div>
                        </div>
                       
                        <div class="panel">
                           <div class="panel-heading">
                              <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2" aria-expanded="true"><i class="ti-info-alt" aria-hidden="true"></i>How to make vegetables tasty</a></h4>
                           </div>
                           <div class="panel-collapse collapse" id="faq2" aria-expanded="true" role="article">
                              <div class="panel-body"> While undeniable salads and steamed veggies can shortly grow to be bland, there are lots of approaches to add style to your vegetable dishes.<br><li> Add color </li><li>Liven up salad greens </li> <li> Satisfy your sweet tooth </li><li> Cook green beans, broccoli, Brussels sprouts, and asparagus in new ways </li>  </div>
                           </div>
                        </div>
                        
                        <p class="font-serif text-lg">Contact Customer Support</p>
                        <p class="font-serif text-lg"> If you"re looking for more help or have a question to ask, please </p><br>
                        <p> <a href="contact.html" class="bg-blue-600 text-white h-7 py-1 px-1 rounded font-bold ">Contact Us</a> </p>
                     </div>
                     
                  </div>
               </div>
            </section>
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