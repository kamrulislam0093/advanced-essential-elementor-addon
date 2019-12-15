<?php 
namespace elementor;


add_action( 'elementor/elements/categories_registered', function ( $elements_manager ) {
    $elements_manager->add_category(
        'ele_addon',
        [
            'title' => 'Elementor Advanced Addon',
            'icon' => 'fa fa-plug',
        ]
    );
});


require_once ACF_DIR_PATH . 'elementor/element/comparision-product.php';
require_once ACF_DIR_PATH . 'elementor/element/st-slider.php';
require_once ACF_DIR_PATH . 'elementor/element/st-recent-product.php';
require_once ACF_DIR_PATH . 'elementor/element/st-category-product.php';


