<?php
    session_start();
    $qty = '';
    $name = '';
    $price = '';
    $id = '';
    $status = 'ongoing';
    $index = '0';
    $customerName = '';
    $pp = '';
    $connection = mysqli_connect('localhost','root');
    mysqli_select_db($connection,'Furniturebd');
    if(isset($_POST["add"]))
    {
        if(!isset($_SESSION['username']))
        {
            header('location : login.php');
        }
        if(empty($_POST["qty"]))
        {
            
        }
        else
        {
            $qty = $_POST["qty"];
            $name = $_POST["hidenName"];
            $price = $_POST["hidenPrice"];
            $id = $_POST["hidenid"];
            $customerName = $_SESSION['username'];
            $query = "SELECT * FROM `registration` where userID = '$customerName'";
            $queryfire = mysqli_query($connection,$query);
            $num = mysqli_num_rows($queryfire);
            $pp = intval($price) * intval($qty);
            if($num>0)
            {
                while($product = mysqli_fetch_array($queryfire))
                {
                    $p = $product['id'];
                }
            }
            $qry = "INSERT INTO `shopingcart` (`cartId`, `id`, `productName`, `qty`, `price`, `status`, `indexID`) VALUES (NULL, '$p', '$name', '$qty', '$pp', '$status', '$index')";
            $qf = mysqli_query($connection,$qry);
            
        }
    }
    //$p = intval($price) * intval($qty);

    
    
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

    <title>Advanced Electronics</title>
  </head>
  <body>
  <!-- database connection code -->
    <div class="text-center bg-dark text-white">
        <?php
        if(isset($_SESSION['username']))
            echo $_SESSION['username'];
        else
            echo "login please";
        ?>
    </div>

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
    <?php
        $connection = mysqli_connect('localhost','root');
        mysqli_select_db($connection,'Furniturebd');
      
        $getName = $_GET['name'];
        $query = "SELECT productId FROM `product` where name = '$getName' ";
        $queryfire = mysqli_query($connection,$query);
        $num = mysqli_num_rows($queryfire);
        if($num>0)
        {
            while($product = mysqli_fetch_array($queryfire))
            {
                $p = $product['productId'];
            }
         }
      $queryForProducts = "SELECT * FROM `productdetails` WHERE productId='$p'";    
                        
        $queryfire = mysqli_query($connection,$queryForProducts);
        $rowCount = mysqli_num_rows($queryfire);
        
        if($rowCount > 0)
        {
             while($product = mysqli_fetch_array($queryfire))
            {
                 
            }
        }
      
      ?>
    <!-- new line -->
        <div class="container">
        <div class="row">
            <?php
                $connection = mysqli_connect('localhost','root');
                mysqli_select_db($connection,'Furniturebd');
               
                
                    if($connection)
                    {
                        $getName = $_GET['name'];
                        $query = "SELECT productId FROM `product` where name = '$getName' ";
                        $queryfire = mysqli_query($connection,$query);
                        $num = mysqli_num_rows($queryfire);
                        if($num>0)
                        {
                            while($product = mysqli_fetch_array($queryfire))
                            {
                                $p = $product['productId'];
                            }
                        }
                        $queryForProducts = "SELECT * FROM `productdetails` WHERE productId='$p'";       
                        
                        $queryfire = mysqli_query($connection,$queryForProducts);
                        $rowCount = mysqli_num_rows($queryfire);
                        if($rowCount > 0)
                        {
                            while($product = mysqli_fetch_array($queryfire))
                            {
                            ?>
                                  <div class="col-lg-3 col-md-6 col-sm-12 ">
                                      <form method="post" action="">
                                        
                                          <div class="card mb-3 mt-3 ">
                                              <div class="card-body">
                                                 <h6 class="text-center"> <?php echo $product['name'] ?></h6>
                                                  <img class="img-fluid" src="<?php echo $product['image']; ?>" alt="image not found :( ">
                                                  <h6 class="text-center"> &#2547;<?php echo $product['price'] ?></h6>
                                                  <div>
                                                      <input type="text" name="qty" class="from-control text-center col-12 mb-1" placeholder="Quantity">
                                                      <input type="hidden" name="hidenName" value="<?php echo $product['name'] ?>">
                                                      <input type="hidden" name="hidenPrice" value="<?php echo $product['price'] ?>">
                                                      <input type="hidden" name="hidenid" value="<?php echo $product['id'] ?>">
                                                  </div>
                                                  <div>
                                                      <input type="submit" name="add" value="Add to Cart" class="btn btn-primary btn-block">
                                                      
                                                  </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                               <?php
                            }
                         
                        }
              
                    }
          
                
                ?>
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

    