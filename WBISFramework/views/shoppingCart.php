<?php

use app\core\Application;
var_dump($_SESSION['cart']);
$suma = 0;
$tax = 0.2;
?>

<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<th class="image">Item:</th>
							<th class="description">Description:</th>
							<th class="price">Price:</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($_SESSION['cart'] as $item) {	$suma+=(double)$item[3];
						?>
						<tr>
							<td class="cart_product">
								<img src="<?php echo $item[0];?>">
							</td>
							<td class="cart_description">
								<h4 style="color: #a0b1c5;"><?php echo $item[1];?></h4>
								<p>Code ID: <?php echo $item[2];?></p>
							</td>
							<td class="cart_price">
								<p><?php echo $item[3] . " $";?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="/deleteCart?code_id=<?php echo $item[2] ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
    </section>
    
    <section id="do_action">
		<div class="container">
			<div class="row" id="cart-flex">		
				<div class="col-sm-6" id="cart-checkout">
					<div class="total_area" style="width: 100%;">
						<ul>
							<li>Cart Sub Total <span><?php echo $suma . " $"; ?></span></li>
							<li>Tax <span><?php echo $tax*100 . " %"; ?></span></li>
							<li>Total <span><?php echo $suma*$tax + $suma . " $"; ?></span></li>
						</ul>
							<a class="btn btn-default update" href="">Buy Now</a>
					</div>
				</div>
			</div>
		</div>
	</section>