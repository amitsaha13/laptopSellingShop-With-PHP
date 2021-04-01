<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Show contact</title>
  </head>
  <body>
           <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
             <a class="navbar-brand" href="#">Advanced Electronics</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                  <span class="navbar-toggler-icon"></span>
              </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
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
                        <a class="nav-link" href="registration.php">Registration</a>
                   </li>
                   <li class="nav-item">
                   <div class="btn-group">
                       <i class="fas fa-shopping-cart fa-2x "></i>
                       <a class="nav-link" href="cart.php">Cart</a>
                   </div>
                   </li>
                   <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                   </li>
                </ul>
    
              </div>
         </div>
       
    </nav>
    
       <div class="container mb-3">
       <div class="row">
            <table class="table">
              <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">UserId</th>
                    <th scope="col">User Name</th>
                    <th scope="col">About</th>
                
                </tr>
              </thead>
           <tbody>
             
                      <?php
                        $connection = mysqli_connect('localhost','root');
                        mysqli_select_db($connection,'Furniturebd');
                        $query = "Select * from contact";
                        $queryfire = mysqli_query($connection,$query);
                        $rowCount = mysqli_num_rows($queryfire);
                        $i = 0;
                        if($rowCount > 0)
                        {
                            while($product = mysqli_fetch_array($queryfire))
                            {
                                ?>
                                <from method = "post">
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?php echo $product['userID']; ?></td>
                                        <td><?php echo $product['name']; ?></td>
                                        <td><?php echo $product['about']; ?></td>
                               </from>
                                
                                <?php
                                $i = $i + 1;
                            }
                        }
               ?>
                       
                     
                  
    
          </tbody>
</table>
       </div>
	   
	   <div style="padding-left:0px;">
	   <div class="btn-group" style="padding-bottom:60px;">
                   
                   
                    <a href="checkOrder.php" class="btn btn-primary ml-2" >
                        Check Order
                    </a>
                    <a href="showcontact.php" class="btn btn-primary ml-2" >
                        Show contact
                    </a> 
					<a href="transaction.php" class="btn btn-primary ml-2" >
                        Check Transaction
                    </a> 
					<a href="logout.php" class="btn btn-primary ml-2" >
                        Log out
                    </a>
               </div>
			   </div>
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