<?php
    /**
     * Created by JetBrains PhpStorm.
     * User: mgyura
     * Date: 6/17/12
     */

    function wtsales_sales_post_types() {
        register_post_type(
            'wtsales_sales', array(
                                  'labels'              => array(
                                      'name'               => __( 'WT Sales' ),
                                      'singular_name'      => __( 'WT Sale' ),
                                      'add_new'            => __( 'Add WT Sale' ),
                                      'add_new_item'       => __( 'Add WT Sale' ),
                                      'edit'               => __( 'Edit WT Sales' ),
                                      'edit_item'          => __( 'Edit WT Sale' ),
                                      'new_item'           => __( 'New WT Sale' ),
                                      'view'               => __( 'View WT Sales' ),
                                      'view_item'          => __( 'View WT Sale' ),
                                      'search_items'       => __( 'Search WT Sales' ),
                                      'not_found'          => __( 'No WT Sale found' ),
                                      'not_found_in_trash' => __( 'No WT Sale found in Trash' ),
                                      'parent'             => __( 'Parent WT Sale' ),
                                  ),
                                  'public'              => true,
                                  'has_archive'         => true,
                                  'show_ui'             => true,
                                  'show_in_menu'        => true,
                                  'show_in_nav_menus'   => true,
                                  'publicly_queryable'  => true,
                                  'exclude_from_search' => false,
                                  'description'         => __( 'Worship Times Sales Portal' ),
                                  'menu_position'       => 0,
                                  'menu_icon'           => plugins_url( '/images/logoSquare_15.png', __file__ ),
                                  'hierarchical'        => true,
                                  'query_var'           => true,
                                  'supports'            => array( 'author' ),
                                  'rewrite'             => array(
                                      'slug'       => 'wt-sales',
                                      'with_front' => false
                                  ),
                                  //'taxonomies' => array( 'post_tag', 'category'),
                                  'can_export'          => true,
                                  'capabilities'        => array(
                                      'edit_post'          => 'edit_wt_sale',
                                      'edit_posts'         => 'edit_wt_sales',
                                      'edit_others_posts'  => 'edit_others_wt_sales',
                                      'publish_posts'      => 'publish_wt_sales',
                                      'read_post'          => 'read_wt_sale',
                                      'read_private_posts' => 'read_private_wt_sales',
                                      'delete_post'        => 'delete_wt_sale',
                                  ),
                                  //'register_meta_box_cb' => 'different_types', //create a custom callback function that is called when the meta boxes for the post form are set up
                                  //'permalink_epmask' => EP_PERMALINK, //define a custom permalink endpoint masks for your post type
                             )
        );
    }

    add_action( 'init', 'wtsales_sales_post_types' );