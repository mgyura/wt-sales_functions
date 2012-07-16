<?php
    /**
     * Created by JetBrains PhpStorm.
     * User: mgyura
     * Date: 6/20/12
     * Taxonomies for WT Sales
     */

    /*-----------------------------------------------------------------------------------*/
    /* Custom Taxonomy for the Denomination */
    /*-----------------------------------------------------------------------------------*/
    function wtsales_denom_tax_init() {

        register_taxonomy(
            'tsales_denom_tax', 'wtsales_sales', array(
                                                      'hierarchical'        => true,
                                                      'labels'              => array(
                                                          'name'              => __( 'Denominations/Offices' ),
                                                          'singular_name'     => __( 'Denomination' ),
                                                          'search_items'      => __( 'Search PDenominations' ),
                                                          'all_items'         => __( 'All Denominations' ),
                                                          'parent_item'       => __( 'Parent Denomination' ),
                                                          'parent_item_colon' => __( 'Parent Denominations:' ),
                                                          'edit_item'         => __( 'Edit Denomination' ),
                                                          'update_item'       => __( 'Update Denomination' ),
                                                          'add_new_item'      => __( 'Add New Denomination' ),
                                                          'new_item_name'     => __( 'New Denomination Name' ),
                                                          'menu_name'         => __( 'Denominations/Offices' ),
                                                      ),
                                                      'sort'                => true,
                                                      'capabilities'        => array(
                                                          'manage_terms' => 'wtsales_manage_categories',
                                                          'edit_terms'   => 'wtsales_manage_categories',
                                                          'delete_terms' => 'wtsales_manage_categories',
                                                          'assign_terms' => 'wtsales_edit_posts'
                                                      ),
                                                      'args'                => array( 'orderby' => 'term_order' ),
                                                      'rewrite'             => array( 'slug' => 'denomination' ),
                                                      'query_var'           => true
                                                 )
        );
    }

    add_action( 'init', 'wtsales_denom_tax_init' );
