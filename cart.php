<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location: login.php');
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $connection = mysqli_connect('localhost','root');
        mysqli_select_db($connection,'Furniturebd');
        $sql = "DELETE FROM `shopingcart`   WHERE cartId = '$id'";
        $queryfire = mysqli_query($connection,$sql);
    }
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <title>Cart</title>
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
				   <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                   </li>
                </ul>
    
              </div>
         </div>
       
    </nav>
  
   <div class="container">
       <div class="row">
            <table class="table">
              <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Update</th>
                   
                    
                </tr>
              </thead>
           <tbody>
             
                      <?php
                        $connection = mysqli_connect('localhost','root');
                        mysqli_select_db($connection,'Furniturebd');
                        $name = $_SESSION['username'];
                        $qry = "SELECT * FROM `registration` WHERE userID = '$name'";
                        $queryfire = mysqli_query($connection,$qry);
                        $num = mysqli_num_rows($queryfire);
						global $p;
                        if($num > 0)
                        {
                            while($product = mysqli_fetch_array($queryfire))
                            {
                                $p = $product['id'];                                  
                            }
                        }
                        $query = "SELECT * FROM `shopingcart` where id = '$p' AND status = 'ongoing'";
                        $queryfire = mysqli_query($connection,$query);
                        $num = mysqli_num_rows($queryfire);
                        $i = 0;
                        if($num > 0)
                        {
                            while($product = mysqli_fetch_array($queryfire))
                            {
                                
                                ?>
                                <tr>
                                    <from method = "post">
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?php echo $product['productName']; ?></td>
                                        <td><?php echo $product['qty']; ?></td>
                                        <td><?php echo $product['price']; ?></td>
                                        <td><a class="btn btn-danger" href="cart.php?id=<?php echo $product['cartId']; ?>">remove</a></td>
                                    </from>
                                </tr>
                                <?php
                                $i = $i + 1;
                            }
                        }
                      ?>
                      <?php
                            
                            $connection = mysqli_connect('localhost','root');
                            mysqli_select_db($connection,'Furniturebd');
                            $query = "SELECT sum(price) as 'total price' FROM `shopingcart` where id = '$p' AND status = 'ongoing'";
                            $queryfire = mysqli_query($connection,$query);
                            $num = mysqli_num_rows($queryfire);
            
                            if($num > 0)
                            {
                                while($product = mysqli_fetch_array($queryfire))
                                {
                                    $total = $product['total price'];                                  
                                }
                            }
							
                            
                      ?>
					  
                  
    
  </tbody>
</table>
       </div>
   </div>
                    <div class="container mb-3 ">
                         <div class="btn-group border border-danger">
                            <label  class = "text-danger">Total: </label>
                              <h6 class="ml-1" ><?php echo $total ?></h6>
                              <label for="">&#2547;</label>
                         </div>
						 <div class="btn-group mt-1" data-toggle="collapse" data-target=".multi-collapse" aria-controls="demo1 demo2 demo3 demo4"style="padding-left:700px;">
								<a  class="btn btn-warning " > Confirm Purchase</a> 
                         </div>
						 <div class="row" style="margin:10px; padding-top:50px;padding-bellow:60px;">
						 
						 <div id="demo1" class="collapse multi-collapse">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#visa">
								<img style="height: 100px; width:200px;"src="visa.jpg">
								
							</button> 
                         </div>
						 <div id="demo2" class="collapse multi-collapse" style="padding-left:50px;">
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#usa">
								<img style="height: 100px; width:200px;"src="americanextress.png">
								
							</button> 
                         </div>
						 <div id="demo3" class="collapse multi-collapse" style="padding-left:50px;">
							<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#master">
								<img style="height: 100px; width:200px;"src="mcard.png">
								
							</button> 
                         </div>
						 <div id="demo4" class="collapse multi-collapse" style="padding-left:50px;">
							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#dbbl">
								<img style="height: 100px; width:200px;"src="dbbl1.png">
								
							</button> 
                         </div>
                         </div>
                          
                      </div>
					  

						<!-- The Modal -->
						<div class="modal" id="visa">
						  <div class="modal-dialog">
							<div class="modal-content">

							  <!-- Modal Header -->
							  <div class="modal-header">
								<h4 class="modal-title">Pay with VISA CARD</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>

							  <!-- Modal body -->
							  <div class="modal-body">
								
									<form method="post" class="from-container from-container mt-3 mb-3" enctype="multipart/form-data">
										<div class="form-group">
											<div class="form-group">
												<label class="font-weight-bold">Card Number</label>
												<input name="number" type="text" class="form-control " id="exampleInputUserID" placeholder="Card Number">
												<label class="font-weight-bold">Card's Validity</label>
												<input name="validity" type="text" class="form-control" id="exampleInputPassword1" placeholder="MM/YYYY">
												<label class="font-weight-bold">Card Holder Name</label>
												<input name="name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Card holder name">
												<label class="font-weight-bold">Amount of money</label>
												<input name="money" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="in USD">
												
												<label class="font-weight-bold" for="dte">Transaction Date</label>
												<input name="date"type="date" class="form-control" id="date" >
											  </div>
												<div class="modal-footer border-top-0 d-flex justify-content-center">
											  <button type="submit"name="paynow" class="btn btn-success btn-lg btn-block">Pay Now</button>
											</div>
												
												
										  </div>
									
									  </div>
									</form>
							  <!-- Modal footer -->
						

							</div>
						  </div>
						</div>
						</div>
<!-- vISA CARD PHP CODE -->
						
<?php
   // session_start();
    $trabsactionid = '';
    $customername = $_SESSION['username'];
    $cardnumber = '';
    $cardvalidity = '';
    
    $holdername = '';
    $amount = '';
    $date = '';
    $error = '';
    $connection = mysqli_connect('localhost','root');
    mysqli_select_db($connection,'Furniturebd');
    if(isset($_POST["paynow"]))
    {
        if(empty($_POST["number"]))
        {
            $error = 'e';
        }
        else
        {
            $cardnumber = mysqli_real_escape_string($connection,$_POST["number"]);
        }
        if(empty($_POST["validity"]))
        {
            $error = 'e';
        }
        else
        {
            $cardvalidity = mysqli_real_escape_string($connection,$_POST["validity"]);
        }
        if(empty($_POST["name"])  )
        {
            $error = 'e';
           
        }
        else
        {
             $holdername = mysqli_real_escape_string($connection,$_POST["name"]);
        }
		if(empty($_POST["money"])  )
        {
            $error = 'e';
           
        }
        else
        {
             $amount = mysqli_real_escape_string($connection,$_POST["money"]);
        }
		if(empty($_POST["date"])  )
        {
            $error = 'e';
           
        }
        else
        {
             $date = mysqli_real_escape_string($connection,$_POST["date"]);
        }
        if($error == '')
        {
            $qry = "INSERT INTO `transaction` ( `customername`, `cardnumber`, `cardvalidity`, `holdername`, `amount`,`date`) VALUES ('$customername', '$cardnumber', '$cardvalidity', '$holdername', '$amount','$date')";
            $queryFire = mysqli_query($connection,$qry);
        }
        
        
    }
?>
						
						
						<div class="modal" id="usa">
						  <div class="modal-dialog">
							<div class="modal-content">

							  <!-- Modal Header -->
							  <div class="modal-header">
								<h4 class="modal-title">Pay with Americal Express</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>

							  <!-- Modal body -->
							  <div class="modal-body">
								<div class="container">
									 
									</div>
       									<form method="post" class="from-container from-container mt-3 mb-3" enctype="multipart/form-data">
										<div class="form-group">
											<div class="form-group">
											
												<label class="font-weight-bold">Card Number</label>
												<input name="number" type="text" class="form-control " id="exampleInputUserID" placeholder="Card Number">
												<label class="font-weight-bold">Card's Validity</label>
												<input name="validity" type="text" class="form-control" id="exampleInputPassword1" placeholder="MM/YYYY">
												<label class="font-weight-bold">Card Holder Name</label>
												<input name="name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Card holder name">
												<label class="font-weight-bold">Amount of money</label>
												<input name="money" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="in USD">
												
												<label class="font-weight-bold" for="dte">Transaction Date</label>
												<input name="date"type="date" class="form-control" id="date" >
											  </div>
												<div class="modal-footer border-top-0 d-flex justify-content-center">
											  <button type="submit"name="paynow" class="btn btn-success btn-lg btn-block">Pay Now</button>
											</div>
												
												
										  </div>
									
									  </div>
									</form>
							  <!-- Modal footer -->
							  

							</div>
						  </div>
						</div>
						</div>
						<div class="modal" id="master">
						  <div class="modal-dialog">
							<div class="modal-content">

							  <!-- Modal Header -->
							  <div class="modal-header">
								<h4 class="modal-title">Pay with MASTERCARD</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>

							  <!-- Modal body -->
							  <div class="modal-body">
								<div class="container">
									 
									</div>
       									<form method="post" class="from-container from-container mt-3 mb-3" enctype="multipart/form-data">
										<div class="form-group">
											<div class="form-group">
												<label class="font-weight-bold">Card Number</label>
												<input name="number" type="text" class="form-control " id="exampleInputUserID" placeholder="Card Number">
												<label class="font-weight-bold">Card's Validity</label>
												<input name="validity" type="text" class="form-control" id="exampleInputPassword1" placeholder="MM/YYYY">
												<label class="font-weight-bold">Card Holder Name</label>
												<input name="name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Card holder name">
												<label class="font-weight-bold">Amount of money</label>
												<input name="money" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="in USD">
												
												<label class="font-weight-bold" for="dte">Transaction Date</label>
												<input name="date"type="date" class="form-control" id="date" >
											  </div>
												<div class="modal-footer border-top-0 d-flex justify-content-center">
											  <button type="submit"name="paynow" class="btn btn-success btn-lg btn-block">Pay Now</button>
											</div>
												
												
										  </div>
									
									  </div>
									</form>
							  <!-- Modal footer -->
							  

							</div>
						  </div>
						</div>
						</div>
						<div class="modal" id="dbbl">
						  <div class="modal-dialog">
							<div class="modal-content">

							  <!-- Modal Header -->
							  <div class="modal-header">
								<h4 class="modal-title">Pay with DBBL NEXUS CARD</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>

							  <!-- Modal body -->
							  <div class="modal-body">
								<div class="container">
									 
									</div>
       									<form method="post" class="from-container from-container mt-3 mb-3" enctype="multipart/form-data">
										<div class="form-group">
											<div class="form-group">
												<label class="font-weight-bold">Card Number</label>
												<input name="number" type="text" class="form-control " id="exampleInputUserID" placeholder="Card Number">
												<label class="font-weight-bold">Card's Validity</label>
												<input name="validity" type="text" class="form-control" id="exampleInputPassword1" placeholder="MM/YYYY">
												<label class="font-weight-bold">Card Holder Name</label>
												<input name="name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Card holder name">
												<label class="font-weight-bold">Amount of money</label>
												<input name="money" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="in USD">
												
												<label class="font-weight-bold" for="dte">Transaction Date</label>
												<input name="date"type="date" class="form-control" id="date" >
											  </div>
												<div class="modal-footer border-top-0 d-flex justify-content-center">
											  <button type="submit"name="paynow" class="btn btn-success btn-lg btn-block">Pay Now</button>
											</div>
												
												
										  </div>
									
									  </div>
									</form>
							  <!-- Modal footer -->
							 

							</div>
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