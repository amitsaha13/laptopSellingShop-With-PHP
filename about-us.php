<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="about-us.css">

    <title>Advanced Electronics</title>
	
	
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
             <a class="navbar-brand" href="index.php">Advanced Electronics</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                  <span class="navbar-toggler-icon"></span>
              </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home </a>
						
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about-us.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Products</a>
                                         <div class="dropdown-menu">
                    <?php
                        $connection = mysqli_connect('localhost','root');
                        mysqli_select_db($connection,'Furniturebd');
                    
                        if($connection)
                        {
                            $query = "SELECT `name` FROM `product`";
                            $queryfire = mysqli_query($connection,$query);
                            $num = mysqli_num_rows($queryfire);
                            if($num>0)
                            {
                                while($product = mysqli_fetch_array($queryfire))
                                {
                                    ?>
                                    
                                              <a class="dropdown-item" href="item.php?name=<?php echo $product['name']; ?>"><?php echo $product['name']; ?></a>
                              
                                        
                                    <?php
                                
                                }
                            }
                        }
                    ?>
                    </div>
                    </li>
					 <li class="nav-item">
                        <a class="nav-link" href="login.php">Sign In</a>
                   </li>
                   
                   <li class="nav-item">
                  
                   </li>
                   <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                   </li>
				    <div class="btn-group">
                       
                       <a class="nav-link" href="cart.php">Cart</a>
					   <i class="fas fa-shopping-cart fa-2x " ></i>
                   </div>
				    <li class="nav-item">
                        <a class="nav-link" href="login.php">Admin</a>
						
                   </li>
				    
                </ul>
    
              </div>
         </div>
       
    </nav>
<div class="ct-pageWrapper" id="ct-js-wrapper">
  <section class="company-heading intro-type" id="parallax-one">
    <div class="container">
      <div class="row product-title-info">
        <div class="col-md-12">
          <h1>About OUR WEBSITE</h1>
        </div>
      </div>
    </div>
    <div class="parallax" id="parallax-cta" style="background-image:url(https://www.solodev.com/assets/hero/hero.jpg);"></div>
  </section>
  <section class="story-section company-sections ct-u-paddingBoth100 paddingBothHalf noTopMobilePadding" id="section">
    <div class="container text-center">
      <h2>Why Shop at this website?</h2>
      <h3>Advanced electronics computer selling website
</h3>
      <div class="col-md-8 col-md-offset-2">
        <div class="red-border"></div>
        <p class="ct-u-size22 ct-u-fontWeight300 marginTop40">Being an online service provider, Focusing mainly on electronics, more specifically computer. Our dymamic website is capable to meet diverse customer.
</p>
        <!-- <a class="ct-u-marginTop60 btn btn-solodev-red btn-fullWidth-sm ct-u-size19" href="#">Learn More</a> -->
      </div>
    </div>
  </section>
  <section class="culture-section company-sections ct-u-paddingBoth100 paddingBothHalf noTopMobilePadding">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2>Computer selling website</h2>
          <h3></h3>
          <p class="ct-u-size22 ct-u-fontWeight300 ct-u-marginBottom60">Being an online service provider, Focusing mainly on electronics, more specifically computer.
          our website will be updated time to time.Authorization will be maintained strictly.Meet customers demand.
.</p>
        </div>
      </div>
           <div class="row ct-u-paddingBoth20">
        <div class="col-xs-6 col-md-4">
          <div class="company-icons-white">
            <i class="fa fa-medkit" aria-hidden="true"></i>
            <p>LARGE SALE NETWORK</p>
            <p class="company-icons-subtext hidden-xs"></p>
          </div>
        </div>
        <div class="col-xs-6 col-md-4">
          <div class="company-icons-white">
            <i class="fa fa-money" aria-hidden="true"></i>
            <p>TRUSTED BRAND</p>
            <p class="company-icons-subtext hidden-xs"></p>
          </div>
        </div>
        <div class="col-xs-6 col-md-4">
          <div class="company-icons-white">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <p>HUGE COLLECTION</p>
            <p class="company-icons-subtext hidden-xs">.</p>
          </div>
        </div>
      </div>
      <div class="row ct-u-paddingBoth20">
        <div class="col-xs-6 col-md-4">
          <div class="company-icons-white">
            <i class="fa fa-coffee" aria-hidden="true"></i>
            <p>PRIORITIZE CLIENTS</p>
            <p class="company-icons-subtext hidden-xs">.</p>
          </div>
        </div>
        <div class="col-xs-6 col-md-4">
          <div class="company-icons-white">
            <i class="fa fa-gamepad" aria-hidden="true"></i>
            <p>TRAINED PERSONALS</p>
            <p class="company-icons-subtext hidden-xs"></p>
          </div>
        </div>
        <div class="col-xs-6 col-md-4">
          <div class="company-icons-white">
            <i class="fa fa-cutlery" aria-hidden="true"></i>
            <p>RELIABLE</p>
            <p class="company-icons-subtext hidden-xs"></p>
          </div>
        </div>
      </div>
      <a class="ct-u-marginTop60 btn btn-solodev-red-reversed btn-fullWidth-sm ct-u-size19" href="/careers/">Ready to Learn More?</a>
    </div>
  

  </section>
  <section class="customers-section company-sections ct-u-paddingBoth100 paddingBothHalf noTopMobilePadding">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2>CUSTOMERS</h2>
          <h3>Trusted by some of the world’s leading brands.</h3>
          <p class="ct-u-size22 ct-u-fontWeight300 ct-u-marginBottom60 marginTop40">We are very well known about our diverse customer and their choice.we like to maintain good relation with our clients.We always give priority their feedback.
        </div>
        <div class="clearfix">
      </div>
    </div>
  </section>
</div>

    <div class="container-fluid" id="3rd">
        <div class="row bg-dark">
            <div class="col-lg-4 col-md-12 cpl-sm-12 float-lg-left float-md-left mt-5">
               <div>
                   <h5 class = "font-weight-bold text-primary">Company</h5>
               </div>
                <div>
                    <a class="text-secondary" href="contact.php">Contuct us</a>
                </div>
                <div>
                    <a class="text-secondary" href="">Press Release</a>
                </div>
                <div>
                    <a class="text-secondary" href="">Investor Relation</a>
                </div>
                <div>
                    <a class="text-secondary" href="">Carrer Opportunities</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-12 cpl-sm-12 float-lg-left float-md-left mt-5">
               <div>
                   <h5 class = "font-weight-bold text-primary">Online Resources</h5>
               </div>
                <div>
                    <a class="text-secondary" href="">News</a>
                </div>
                <div>
                    <a class="text-secondary" href="">Offres</a>
                </div>
                <div>
                    <a class="text-secondary" href="">Terms &amp; Conditions</a>
                </div>
                <div>
                    <a class="text-secondary" href="">Pricacy  Policy</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-12 cpl-sm-12 float-lg-left float-md-left mt-5 mb-3">
               <div>
                   <h5 class = "font-weight-bold text-primary">Contuct us</h5>
               </div>
                <div>
                    <p class="text-secondary " >66 Progoti Shoroni, Baridhara</br>Dhaka-1212 , BanglaDesh<br/>Tel: +8801689 81 39 84</br>Email: info&#64;laptop_village.com</br>Hours : Sat - Friday</br>9.00 am - 8.00 pm</p>
                </div>
                
            </div>
            
        </div>
    </div>
    
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>