<?php 

add_theme_support( 'woocommerce' );

/**
* Remove Category, Price, excerpt, related products
*
* @since 1.0
* @author Rose
*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);



/**
* Change the content within Data Tabs
*
* @since 1.0
* @author Rose
*/

function wpclass_featuresdescriptiontabs( $tabs ) { 

	function wpclass_featuresdescriptiontabs_filter( $tabs ){
	 	 
	 	unset( $tabs['description'] ); 					// Remove the reviews tab 
		unset( $tabs['reviews'] ); 					// Remove the reviews tab
		unset( $tabs['additional_information'] );  	// Remove the additional information tab
		 
		// Rename Tabs
		//$tabs['description']['title'] = __( 'Features' );		// Rename the description tab

		// Customize Tab	
		// Adds the new tab
			
		$tabs['description_tab'] = array(
			'title' 	=> __( 'Description', 'woocommerce' ),
			'priority' 	=> 5,
			'callback' 	=> 'wpclass_description_content'
		);

		$tabs['feature_tab'] = array(
			'title' 	=> __( 'Features', 'woocommerce' ),
			'priority' 	=> 10,
			'callback' 	=> 'wpclass_features_content'
		);
			 
		function wpclass_description_content() {
		 
			// The new tab content
			wc_get_template( 'single-product/short-description.php' );
			
		}

		function wpclass_features_content() {
		 
			// The new tab content
			wc_get_template( 'single-product/tabs/description.php' );
			
		}

		return $tabs;
	}

	add_filter( 'woocommerce_product_tabs', 'wpclass_featuresdescriptiontabs_filter' );
	wc_get_template('single-product/tabs/tabs.php');
	remove_filter( 'woocommerce_product_tabs', 'wpclass_featuresdescriptiontabs_filter' );
}



function wpclass_reviewtab( $tabs ) { 
	 	 
	 	unset( $tabs['description'] ); 

		unset( $tabs['additional_information'] );  	// Remove the additional information tab
		 
		return $tabs;
}


add_action('woocommerce_single_product_summary', 'wpclass_featuresdescriptiontabs', 7);
add_filter('woocommerce_product_tabs', 'wpclass_reviewtab', 10);

/**
* Randomize Reviews
*
* @since 1.0
* @author Rose
*/








/**
* Move the Star Rating
*
* @since 1.0
* @author Rose
*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 40 );


