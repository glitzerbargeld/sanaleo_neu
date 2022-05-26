<style>
	.woocommerce div.product form.cart .variations {
	display: none;
	}
	.wp-post-image{
clip-path: url("#zuschnitt");
}
</style>


<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

//the_post();
//global $post;
global $product;



function svgmask($product) {
	//global $product;
	$mask_array = [
		"Balsam" => '<svg width="0" height="0">
        <defs>
            <clipPath id="zuschnitt" clipPathUnits="objectBoundingBox" transform="scale(0.001,0.001)">
                <path class="set" d="M866.82,702.2l-2.34-150.93s-.88-147.61-1.76-152-4.18-5-4.18-5a6.66,6.66,0,0,0-1.82-6.77c-3.14-2.8-9.3-1.65-9.3-1.65C738,394,716.19,388.71,622,390.48c-150.83,6.4-146.63-2.19-153.63,2-10.9,8.58-27.09,48.71-27.09,48.71a80.82,80.82,0,0,0-3.55,7.68c-.33,1.41.58,7.85.58,7.85a5,5,0,0,0-4,4.95c-.17,4.29.93,49.93.93,49.93-235.81-7.05-275.64,28.51-275.64,28.51-6.85,5.86-6.48,8.17-6.48,12.22v103c-5.95,7.11-5.95,11.4-5.88,14.8-1.26.66-1.54,1.77-1.54,3.47,0,.45.18,12,.45,28.6H0V1000H1000V702.2Z" clip-rule="evenodd"></path>
            </clipPath>
        </defs>
    </svg>',
		"Massageoel" => '<svg width="0" height="0">
        <defs>
            <clipPath id="zuschnitt" clipPathUnits="objectBoundingBox" transform="scale(0.001,0.001)">
                <path class="set" d="M760.94,759l.95-118.3,1.16-152.86,2.39-218.62s1.16-97,1.12-99.16-2.8-3.31-2.8-3.31a3.54,3.54,0,0,1,.06-1.65c.22-1.26-1.38-1.87-1.38-1.87s.72-1.21-.61-3-12.22-3.35-21.85-4-43-1-43-1l-88-2.42s-92.91-1.45-102.36-1.45-20,.54-29.23,5.37-13.09,7-13.42,8.5a20,20,0,0,0-.37,3.18l.4,117.74-.93,180.22v39.74c-9.09-11.45-16-17.23-30.83-27.52S417.3,461.5,417.3,461.5c14-1.59,14.26-3.52,14.26-3.52l-.3-37.15c0-1.82-2.18-3.33-5.26-4.3,0,0-.87-61.11-.87-64.26s-.14-4-.66-4c0,0,.18-3.88.1-5.6s-2.72-1.45-3.85-1.76c0,0,.2-11.76.2-13.09s.17-2-.95-2.14c0,0-.29-27.79-.29-31s-5.2-4.62-6.15-4.62h-1.48s-.83-87.32-.83-90-.91-3.3-2.48-3.55-12.8-.91-18.7-1a24.12,24.12,0,0,0-10.24,2.19l-20-.33s-24.19-.33-32.28.16-16.52,7.1-16.68,12.88c-.5,14-2.56,78.58-2.56,78.58h-.39c-6.22,0-6.33,3.28-6.33,4.87a1.39,1.39,0,0,0-1,1.24v29.09a1.41,1.41,0,0,0-.91.72l-.11,15c-3.88.33-3.7,1.59-3.7,1.59l-.16,6.28c-.75.29-1,1.52-1,1.52l-.2,4.26L293.31,386l-1,29.32s-4.95,2.47-4.95,3.55l-.87,37.85c1.16,2.69,13.5,3.84,13.5,3.84-9,15.25-10.84,13.1-31.49,29.29-23,20.81-27.6,39.14-28.9,53.2a1.84,1.84,0,0,0-1.29,2c0,1.76-1,28.35-1,28.35V679.82L237,759H0v241H1000V759Z" clip-rule="evenodd"></path>
            </clipPath>
        </defs>
    </svg>',
		"Gesichtsoel" => '<svg width="0" height="0">
        <defs>
            <clipPath id="zuschnitt" clipPathUnits="objectBoundingBox" transform="scale(0.001,0.001)">
                <path class="set" d="M766,754.75l.21-207.62-.44-152,4.16-228.66s.37-14.46-.95-18.7c-.41-1-4.69-3.7-4.69-3.7a2.25,2.25,0,0,0,1.92-1.82c1.43-3.24-1.26-4.56-4.29-5s-13.6-.72-13.6-.72L662.64,134,535,132.22s-37.77-.22-39.86.44-20.92,6.72-24.33,9.36-6.33,3.52-6.33,12.11V491.78l-.11,9.08c-16-17.23-31.37-25.32-31.37-25.32,3-1.36,3.63-2.72,3.63-2.72V457.17c9.95-2,8.87-3.43,8.87-3.43s-.61-23.86-.61-24.77a1.29,1.29,0,0,0-.72-1.21l-.61-9-1.15-42.11-2-62.67s.16-4-1.24-5.78c-3.3-3.88-39.06-5.61-39.06-5.61a90.44,90.44,0,0,0-1.9-13.71c-1.81-9.33-2.67-35.2-2.67-35.2s-1-30.14-1-33.58-.18-16.66-2.94-24c-3.3-12.31-16.26-21.72-23.2-24.69s-16.35-5.89-29.73-2.2a41.84,41.84,0,0,0-23.5,16.32c-3.55,5.09-7.65,13.74-7.65,19.35s.6,64.62.6,77.42a118.9,118.9,0,0,1-1.57,20.81c-5.57,0-7.39,1.89-7.39,1.89-12.22,0-25.13,2.5-27.59,3.53s-4.13,1.88-4.13,6.83-.75,44.34-.75,44.34l-.35,68.67a2.63,2.63,0,0,0-.84,1.26v25.43c.53,2.36,9.41,3.76,9.41,3.76s.25,14.32.25,15.44,1.75,1.8,1.75,1.8c-11.44,6.47-24.1,15.64-30.44,25.19C233.55,520.62,233,536.48,233,549.41c-.63,0-2,.39-2,1.49s1.21,48.71,1.21,48.71L233.28,650,234,754.75H0V1000H1000V754.75Z" clip-rule="evenodd"></path>
            </clipPath>
        </defs>
    </svg>',
		"Gesichtsfluid" =>	'<svg width="0" height="0">
        <defs>
            <clipPath id="zuschnitt" clipPathUnits="objectBoundingBox" transform="scale(0.001,0.001)">
                <path class="set" d="M762,795.42V644.12l.66-109.32,1.15-113.62.5-87.52,5-136.41s1.21-41.78,1.21-47.5-4-6.66-4-6.66c.55.11,2.21-2.69.28-3.69-8.2-4.73-20-7.21-33.69-7.21s-51.92-.41-51.92-.41L648,131.24l-68-1-76.78-1.7c-14.12,1.33-26.34,9.16-28.24,10.24s-4.79,3.22-4.79,5.78-.41,29.89-.41,29.89l-1.07,63.33-.08,81.5-1,70.18-.37,88.8c-6.19-5.62-14.23-9.83-29.76-18s-14.4-17-14.4-17c12.06,0,18.9-3.35,18.9-3.35L440.9,400l-6.36-5.28-1.78-38.89s-1.64-31.12-1.77-32.58S431,306,431,306c0-1-2.91-2.8-11.28-2.8V279.68s.25-12.92-.49-14.47-6-1.74-6-1.74V213.68c2.39-3.71,4-27.33,3.39-28.51-.11-.94-1.57-2.29-1.57-2.29-1.56-5.44-3.71-10.2-32-7.78S330,186.55,322.27,189.63s-10.9,5.51-10.9,10.35.8,63.9.8,63.9c-2.61,0-6,.75-6,2.56v38c-9.08,0-10.46,1.55-10.79,2.54s-.05,12.77-.05,12.77L295,340.28l-.72,26.26-.74,27.63-7,7-.75,39.69c3.3,2.23,16.68,3.08,16.68,3.08-1,3.45-5,8.76-5,8.76-12.94,11.61-32.26,14-47.62,33.08-11.49,14.29-10.95,26.67-10.95,26.67s-1.16-.25-1.61.49c-1,1.9-.7,19.57-.7,19.57l.82,153.09-.56,109.82H0V1000H1000V795.42Z" clip-rule="evenodd"></path>
            </clipPath>
        </defs>
    </svg>',
		"Waermegel" => '<svg width="0" height="0">
        <defs>
            <clipPath id="zuschnitt" clipPathUnits="objectBoundingBox" transform="scale(0.001,0.001)">
                <path class="set" d="M767.1,800.51c.18-189,.62-653.23.62-656.83,0-4.52-5.16-7.52-5.16-7.52s2.32-.34,1.16-2.14-13.79-6.59-22.38-7-64.49-.17-64.49-.17l-107.67-.66-77.72-.52c-13,.58-21.48,6.82-25.16,8.86s-4.23,2.64-4.23,6.22v21.19l.55,116.7L463,385.87l.32,44c-16-12.9-23.9-18.32-28.52-21.9s-13.87-13.71-13.87-13.71c8.15-1.16,8.64-2.81,8.64-2.81l-1.07-34-6.11-5.75-1.24-27s-1.76-47.83-1.76-49.1-2.78-2.26-9-2.09c0,0-.49-28.9-.49-31.21s-3.11-2.31-6.11-2.31c0,0-.12-41.1,0-43s4.24-12.68,5.32-16.27,1-11.48,1.08-12.59-1.39-5.89-5.19-6c-19.27.28-40.93,4.42-49.46,6.42s-9.92,1.82-22.43,6-14.58,5.36-16.35,7.18-2.23,8.26-2.23,8.26l1.88,50.77s-4.74-.33-4.57,3.14.66,30,.66,30c-8.5,2.31-9.91,2.31-9.91,4.46l-1.32,74.45-5.7,5.69v33.83c.21,1.78,5.87,2.36,5.87,2.36-20.15,23.12-34.19,26.39-49.93,46.32S234.15,478.43,234,487s-.25,12.67-.25,12.67a5.37,5.37,0,0,0-2.15,5.2,4.26,4.26,0,0,0,1,2.32l.48,13.19,1.65,119.78L235,767.89l.24,32.62H0V1000H1000V800.51Z" clip-rule="evenodd"></path>
            </clipPath>
        </defs>
    </svg>',
	"Muttertag" => '<svg width="0" height="0">
        <defs>
            <clipPath id="zuschnitt" clipPathUnits="objectBoundingBox" transform="scale(0.001,0.001)">
                <path class="set" d="M157.34,174.43c9.28-5.45,23.71-11.43,51.04-18.73l37.6-4.26,13.77,3.4c5.07,4.74,5.54,6.93,5.81,9l-3.49,26.74-.19,52.32,1.94,2.52h4.26v42.25l12.21,.19c-.19,.78,3.68,89.14,3.68,89.14l5.62,7.17,.78,40.5c-1.16,2.28-6.01,3.76-19.96,3.29l.19,3.68,6.01,9.5,39.53,23.26,5.23-344.29,23.41-13.01,239.31,3.25,8.45,3.9,24.06,1.95,9.75,9.1-5.2,260.77,6.5,2.6,3.9,131.36-2.6,4.55-5.85,1.3v14.96l-2.6,4.55,18.68,11.65,9.12,9.82,2.53-3.51,.14-36.62,1.82-6.17,1.29-150.01-3.06-8.05v-116.41l3.72-8.26,10.73-5.78,16.51-6.19c89.73-.34,174.46-.58,245.92,5.36l1.76,1.76-.96,4.47,1.12,2.08h2.24l.85,681.17,4.89,36.98c-6.94,4.42-33.45,7.64-67.72,6.73l-1.84,2.27c-42.8,1.78-82.3,4.47-155.04,7.76-16.48,5.6-67.98,4.74-76.5,8.71-13.99,4.66-167.22,11.33-188.75-9.95l1.24-7.15c-5.44-3.45-8.66-14.92-11.95-26.17l-175.67,16.88-67.99,2.74c-35.83-.49-71.49-1.52-102.21-18.25l-1.37-5.93-7.76-8.67,.91-23.73-3.19-4.56,.46-362.47,1.24-33.56c2.21-24.59,10.19-47.72,60.28-60.28l5.59-13.05c-7.91,.4-15.76-.48-17.3-3.43l2.05-40.88,5.99-5.35,2.62-90.56,10.96-.24,.24-42.66,5.96-2.86-.71-68.64Z" clip-rule="evenodd"></path>
            </clipPath>
        </defs>
    </svg>'
	
	];


	if (is_single(70677)) {
		echo $mask_array["Massageoel"];
	} elseif (is_single("70675")) {
		echo $mask_array["Balsam"];
	} elseif (is_single("70674")) {
		echo $mask_array["Gesichtsoel"];
	} elseif (is_single("70673")) {
		echo $mask_array["Gesichtsfluid"];
	} elseif (is_single("70672")) {
		echo $mask_array["Waermegel"];
	} elseif (is_single("74962")) {
		echo $mask_array["Muttertag"];
	} 
}
add_filter("woocommerce_after_single_product_summary", "svgmask",90, 1);

//do_action('apply_svg_mask_hook');
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div class="<?php get_current_product_category();?>">
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	


	<div class="ast-row">
		<div class="ast-col-xl-5 ast-col-md-12 ast-col-xl-push-6 image-wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );

			?>
		</div>

		<div class="ast-col-xl-4 ast-col-md-12 ast-col-xl-pull-4" style="text-align: center">

			

			<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				
				add_action('woocommerce_product_thumbnails', 'woocommerce_template_single_excerpt');
				do_action( 'woocommerce_single_product_summary' );
				add_action( 'woocommerce_single_product_summary', 'woocommerce_total_product_price', 25 ); 
				if(get_field("analysezertifikat_1") != "" ){
                echo '<a class="az-link" href="'. get_field("analysezertifikat_1") . '"> <img src="https://sanaleo.com/wp-content/uploads/2022/03/Icon_zertifiziert.svg" width="40" alt="">Analysezertifikat</a>';
                }
				?>

		</div>
		


	</div>




	

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	

	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>



<script>
jQuery(function($){
	var price = <?php echo $product->get_price(); ?>,
		currency = '<?php echo get_woocommerce_currency_symbol(); ?>';

	$('[name=quantity]').change(function(){
		if (!(this.value < 1)) {

			var product_total = parseFloat(price * this.value);

			$('#product_total_price .price').html( currency + product_total.toFixed(0));

		}
	});
});
</script>
