<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) )
 {
	exit;
}

//
$product_id_my = get_the_ID();
$product_my = wc_get_product( $product_id_my );
$price_my=$product_my->get_price();


//
$mysqli=new mysqli('localhost','root','','chat');
$mysqli->set_charset();
$sql="SELECT * FROM `wocomerce_relatetd_custom` WHERE `id_w_r_c`=1";
$result=$mysqli->query($sql);
$po=$result->fetch_assoc();

$counter=1;

if ( $related_products ) : ?>

<link rel="stylesheet" href="/wp-content/plugins/woocommerce/assetsCustom/css/bootstrap.css">
	<section class="related products">

		<h2><?php esc_html_e( 'C этим товаром покупают еще и...', 'woocommerce' ); ?></h2>

		<?php woocommerce_product_loop_start(); ?>
	
		<?php 
		//
		if($po['status']==1)
		{
			$related_product_my=[];

			?>
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			<?php
			foreach ( $related_products as $related_product ) : 


			//	
			if(abs($related_product->price-$price_my)<=$po['price'])
			{
				$post_object = get_post( $related_product->get_id() );
				$image=get_the_post_thumbnail_url($related_product->get_id());
				$slug=$post_object->post_name;
				$title=$post_object->post_title;
				$price_product=$related_product->price;
				array_push($related_product_my,['image'=>$image,'slug'=>$slug,'title'=>$title,'price_product'=>$price_product]);
			}	

			//setup_postdata( $GLOBALS['post'] =& $post_object );

			//wc_get_template_part( 'content', 'product' ); 

			endforeach;
					?>
				<div class="carousel-item active">
					<div class="row">
						<div class="col-lg-4">
							<a href="http://chat/product/<?php echo $related_product_my[0]['slug'] ?>">
								<div style="background-image: url('<?php echo $related_product_my[0]['image']; ?>'); width: 100%;height: 300px;background-size: cover;background-repeat: no-repeat;">
									
								</div>
							</a>
							<div class="carousel-caption d-none d-md-block" style="background-color: white;border-radius: 25px;">
						    <h5 style="color: #333"><?php echo $related_product_my[0]['title'] ?></h5>
						    <p style="color: #333"><?php echo $related_product_my[0]['price_product'] ?></p>
						  </div>
						</div>
						<div class="col-lg-4">
							<a href="http://chat/product/<?php echo $related_product_my[1]['slug'] ?>">
								<div style="background-image: url('<?php echo $related_product_my[1]['image']; ?>'); width: 100%;height: 300px;background-size: cover;background-repeat: no-repeat;">
									
								</div>
							</a>
							<div class="carousel-caption d-none d-md-block" style="background-color: white;border-radius: 25px;">
						    <h5 style="color: #333"><?php echo $related_product_my[1]['title'] ?></h5>
						    <p style="color: #333"><?php echo $related_product_my[1]['price_product'] ?></p>
						  </div>
						</div>
						<div class="col-lg-4">
							<a href="http://chat/product/<?php echo $related_product_my[2]['slug'] ?>">
								<div style="background-image: url('<?php echo $related_product_my[2]['image']; ?>'); width: 100%;height: 300px;background-size: cover;background-repeat: no-repeat;">
									
								</div>
							</a>
							<div class="carousel-caption d-none d-md-block" style="background-color: white;border-radius: 25px;">
						    <h5 style="color: #333"><?php echo $related_product_my[2]['title'] ?></h5>
						    <p style="color: #333"><?php echo $related_product_my[2]['price_product'] ?></p>
						  </div>
						</div>
					</div>
		   		</div>
				<div class="carousel-item">
		      		<div class="row">
						<div class="col-lg-4">
							<a href="http://chat/product/<?php echo $related_product_my[3]['slug'] ?>">
								<div style="background-image: url('<?php echo $related_product_my[3]['image']; ?>'); width: 100%;height: 300px;background-size: cover;background-repeat: no-repeat;">
									
								</div>
							</a>
							<div class="carousel-caption d-none d-md-block" style="background-color: white;border-radius: 25px;">
						    <h5 style="color: #333"><?php echo $related_product_my[3]['title'] ?></h5>
						    <p style="color: #333"><?php echo $related_product_my[3]['price_product'] ?></p>
						  </div>
						</div>
						<div class="col-lg-4">
							<a href="http://chat/product/<?php echo $related_product_my[4]['slug'] ?>">
								<div style="background-image: url('<?php echo $related_product_my[4]['image']; ?>'); width: 100%;height: 300px;background-size: cover;background-repeat: no-repeat;">
									
								</div>
							</a>
							<div class="carousel-caption d-none d-md-block" style="background-color: white;border-radius: 25px;">
						    <h5 style="color: #333"><?php echo $related_product_my[4]['title'] ?></h5>
						    <p style="color: #333"><?php echo $related_product_my[4]['price_product'] ?></p>
						  </div>
						</div>
					</div>
		   		</div>
<?php
		
?>
		 </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
			<?php
		}
		else
		{
			foreach ( $related_products as $related_product ) : 
				
			$post_object = get_post( $related_product->get_id() );

			setup_postdata( $GLOBALS['post'] =& $post_object );

			wc_get_template_part( 'content', 'product' ); 

			endforeach;
		} 
		 ?>	

		<?php woocommerce_product_loop_end(); ?>

	</section>
<script src="/wp-content/plugins/woocommerce/assetsCustom/js/jquery-3.3.1.js"></script>
<script src="/wp-content/plugins/woocommerce/assetsCustom/js/bootstrap.js"></script>
<script src="/wp-content/plugins/woocommerce/assetsCustom/js/popover.js"></script>
<?php endif;

wp_reset_postdata();
