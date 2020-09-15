<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}
?>
<html>
<head>
	<title>Products</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="
	sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oq12jhcu+A56Ebc!zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php">MobiStore</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="products.php">Products</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">Checkout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i>
        	<span id="cart-item" class="badge badge-danger"></span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
	<div id="message"></div>
	<div class="row mt-2 pb-3">
		<?php
		include'confi.php';
		$stmt = $conn->prepare("SELECT * FROM product");
		$stmt->execute();
		$result = $stmt->get_result();
		while($row = $result->fetch_assoc()):
		?>
		<div class="col-sm-6 col-md-3 col-lg-4 mb-2">
			<div class="card-deck">
				<div class="card p-2 border-secondary mb-2">
					<img src="<?= $row['product_image']?>" class="card-img-top" height="250">
					<div class="card-body p-1">
						<h4 class="card-title text-center text-info"><?= $row['product_name']?></h4>
						<h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i><?=
						 number_format($row['product_price'],2)?>/-
							
						</h5>
					</div>
					<div class="card-footer p-1">

						<form action="" class="form-submit">
							<input type="hidden" class="pid" value="<?= $row['id'] ?>">
							<input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
							<input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
							<input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
							<input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
							<button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to Cart</button>
							
						</form>
						
						
					</div>
				</div>
				
			</div>
			
		</div>
	<?php endwhile;
	?>
	</div>
	
</div>
<footer>
                <div class="container">
                    <center>
                        <p>
                             Copyright © Lifestyle Store. All Rights Reserved and Contact Us: +91 90000 00000
                        </p>
                    </center>
                </div>
                
            </footer>



 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".addItemBtn").click(function(e){
			e.preventDefault();
			var $form = $(this).closest(".form-submit");
			var pid = $form.find(".pid").val();
			var pname = $form.find(".pname").val();
			var pprice = $form.find(".pprice").val();
			var pimage = $form.find(".pimage").val();
			var pcode = $form.find(".pcode").val();

			$.ajax({
				url: 'action.php',
				method: 'post',
				data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
				success:function(response){
					$("#message").html(response);
                    load_cart_item_number();
				}
				});
			

			});
		load_cart_item_number();
           function load_cart_item_number(){
           	$.ajax({
           		url:'action.php',
           		method: 'get',
           		data: {cartItem:"cart_item"},
           		success:function(response){
           			$("#cart-item").html(response);
           			
           		}
           		});
           	
           }
		});
	
	
</script>
</body>
</html>