<?php 

add_theme_support( 'woocommerce' );

/**
* Remove Description and Reviews from bottom of page
*
* @since 1.0
* @author Rose
*/

// Removes tabs from their original loaction 
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// Inserts tabs under the main right product content 
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 5 );

/**
* Change the content within Data Tabs
*
* @since 1.0
* @author Rose
*/

// Remove the current tab settings
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
function woo_remove_product_tabs( $tabs ) {
 
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
 
    return $tabs;
 
}

// Rename Tabs
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {
 
	$tabs['description']['title'] = __( 'Features' );		// Rename the description tab
 
	return $tabs;
 
}

// Customize Tab
add_filter( 'woocommerce_product_tabs', 'woo_features_tab' );
function woo_features_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['feature_tab'] = array(
		'title' 	=> __( 'Description', 'woocommerce' ),
		'priority' 	=> 10,
		'callback' 	=> 'woo_new_features_content'
	);
 
	return $tabs;
 
}
function woo_new_features_content() {
 
	// The new tab content
	wc_get_template( 'single-product/short-description.php' );
	
}

/**
* Move the Star Rating
*
* @since 1.0
* @author Rose
*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 40 );


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

/**
* Add Review Tab
*
* @since 1.0
* @author Rose
*/

//add_action('woocommerce_after_single_product_summary', create_function( '$args', 'call_user_func(\'comments_template\');'), 14);
// function custom_review_tab(){

// 	wc_get_template( 'single-product/tabs/reviews.php' );

// } // limit_purchase_button
// add_action('woocommerce_after_main_content', 'custom_review_tab', 10 ); 

