<?php
    /**
     * Created by JetBrains PhpStorm.
     * User: mgyura
     * Date: 6/17/12
     */


    /*-----------------------------------------------------------------------------------*/
    /* Filter the Authors title to read "sales person" */
    /*-----------------------------------------------------------------------------------*/

    add_action( 'add_meta_boxes', 'change_meta_box_titles' );
    function change_meta_box_titles() {
        if ( current_user_can( 'edit_others_wt_sales' ) ) {
            global $wp_meta_boxes;
            $wp_meta_boxes[ 'wtsales_sales' ][ 'normal' ][ 'core' ][ 'authordiv' ][ 'title' ] = 'Assign to Sales Person';
        }
    }


    /*-----------------------------------------------------------------------------------*/
    /* Save a custom title for the sales data */
    /*-----------------------------------------------------------------------------------*/
    function wtsales_filter_title( $my_post_title ) {
        global $prefix, $_POST;

        if ( 'wtsales_sales' == get_post_type() ) :
            $new_title     = $_POST[ $prefix . "sales_minname" ] . ' - ' . $_POST[ $prefix . "sales_mincity" ] . ', ' . $_POST[ $prefix . "sales_minstate" ];
            $my_post_title = $new_title;
        endif;
        return $my_post_title;
    }

    add_filter( 'title_save_pre', 'wtsales_filter_title' );


    /*-----------------------------------------------------------------------------------*/
    /* Filter the columns that show */
    /*-----------------------------------------------------------------------------------*/
    function wtsales_edit_columns( $columns ) {
        $columns = array(
            "cb"         => "<input type=\"checkbox\" />",
            "title"      => "Ministry",
            "author"     => "Author",
            "newdate"    => "Last Edited",
            "followup"   => "Follow up Date",
            "results"    => "Lastest Results"
        );
        return $columns;
    }

    add_filter( "manage_edit-wtsales_sales_columns", "wtsales_edit_columns" );

    function wtsales_custom_columns( $column ) {
        global $prefix, $post;


        $results_one   = get_post_meta( $post->ID, $prefix . 'sales_first_results', $single = true );
        $results_two   = get_post_meta( $post->ID, $prefix . 'sales_second_results', $single = true );
        $results_three = get_post_meta( $post->ID, $prefix . 'sales_third_results', $single = true );
        $followup      = get_post_meta( $post->ID, $prefix . 'sales_next_date', $single = true );

        if ( $results_three != null ) {
            $results = $results_three;
        }
        elseif ( $results_two != null ) {
            $results = $results_two;
        }
        elseif ( $results_one != null ) {
            $results = $results_one;
        }


        switch ( $column ) {
            case "newdate":
                echo the_modified_date();
                break;
            case "results":
                echo $results;
                break;
            case "followup":
                echo $followup;
                break;
        }
    }

    add_action( "manage_wtsales_sales_posts_custom_column", "wtsales_custom_columns" );


    /*-----------------------------------------------------------------------------------*/
    /* Make these columns sortable */
    /*-----------------------------------------------------------------------------------*/

    function wtsales_sortable_columns( $columns ) {

        $columns[ 'title' ]    = 'title';
        $columns[ 'author' ]   = 'author';
        $columns[ 'newdate' ]  = 'newdate';
        $columns[ 'followup' ] = 'followup';
        $columns[ 'results' ]  = 'results';

        return $columns;

    }

    add_filter( "manage_edit-wtsales_sales_sortable_columns", "wtsales_sortable_columns" );


    /*-----------------------------------------------------------------------------------*/
    /* Add Custom Filter For Contact Results.  Filter by "State," "Quality," "Next Steps"  */
    /*-----------------------------------------------------------------------------------*/

    add_action( 'restrict_manage_posts', 'wtsales_filter_state' );

    function wtsales_filter_state() {
        global $post, $prefix;

        $type = 'wtsales_sales';
        if ( isset( $_GET[ 'post_type' ] ) ) {
            $type = $_GET[ 'post_type' ];
        }


        if ( 'wtsales_sales' == $type ) {

            //state values
            $statevalues = array();
            query_posts(
                array(
                     'post_type' => 'wtsales_sales',
                     'showposts' => 1000
                )
            );
            while ( have_posts() ) : the_post();
                $state                 = get_post_meta( $post->ID, $prefix . 'sales_minstate', $single = true );
                $statevalues[ $state ] = $state;
            endwhile;


            //quality values
            $qualityvalues = array(
                'Good, dont bother contacting'     => 'good',
                'Ok, but could use some work'      => 'ok',
                'Help, they desperately need work' => 'help',
                'No website listed'                => 'none',
            );


            //next values
            $nextvalues = array(
                'No Contact'                     => 'none',
                'Waiting For Reply'              => 'waiting',
                'Waiting For Customer To Buy'    => 'tobuy',
                'I Will Follow Up'               => 'iwillfollow',
                'Salesperson Needs To Follow Up' => 'salesperson',
                'Manager Needs To Follow Up'     => 'manager',
                'None, Customer Has Purchased'   => 'purchased',
                'None, Customer Not Interested'  => 'notinterested',
            );

            ?>

        <select name="ADMIN_FILTER_NEXT_VALUE">
                    <option value=""><?php _e( 'Filter By Next Steps ', 'wtsales' ); ?></option>
            <?php
            $current_next = isset( $_GET[ 'ADMIN_FILTER_NEXT_VALUE' ] ) ? $_GET[ 'ADMIN_FILTER_NEXT_VALUE' ] : '';
            foreach ( $nextvalues as $nextlabel => $nextvalue ) {
                printf(
                    '<option value="%s"%s>%s</option>', $nextvalue, $nextvalue == $current_next ? ' selected="selected"' : '', $nextlabel
                );
            }
            ?>
                </select>


        <select name="ADMIN_FILTER_QUALITY_VALUE">
            <option value=""><?php _e( 'Filter By Website Quality ', 'wtsales' ); ?></option>
            <?php
            $current_quality = isset( $_GET[ 'ADMIN_FILTER_QUALITY_VALUE' ] ) ? $_GET[ 'ADMIN_FILTER_QUALITY_VALUE' ] : '';
            foreach ( $qualityvalues as $qualitylabel => $qualityvalue ) {
                printf(
                    '<option value="%s"%s>%s</option>', $qualityvalue, $qualityvalue == $current_quality ? ' selected="selected"' : '', $qualitylabel
                );
            }
            ?>
        </select>

        <select name="ADMIN_FILTER_STATE_VALUE">
                    <option value=""><?php _e( 'Filter By State  ', 'wtsales' ); ?></option>
            <?php
            $current_state = isset( $_GET[ 'ADMIN_FILTER_STATE_VALUE' ] ) ? $_GET[ 'ADMIN_FILTER_STATE_VALUE' ] : '';
            foreach ( $statevalues as $statelable => $statevalue ) {
                printf(
                    '<option value="%s"%s>%s</option>', $statevalue, $statevalue == $current_state ? ' selected="selected"' : '', $statelable
                );
            }
            ?>
                </select>

        <?php
        }
    }

    /*-----------------------------------------------------------------------------------*/
    /* Add Custom Filter to send the results to the query  */
    /*-----------------------------------------------------------------------------------*/


    function wtsales_search_filters( $query ) {
        global $pagenow;
        $type = 'wtsales_sales';
        if ( isset( $_GET[ 'post_type' ] ) ) {
            $type = $_GET[ 'post_type' ];
        }
        if ( 'wtsales_sales' == $type && is_admin() && $pagenow == 'edit.php' ) {

            $filters_a = array();

            if ( !empty( $_GET[ 'ADMIN_FILTER_NEXT_VALUE' ] ) ) {
                $filters_a[ ] = array(
                    'key'   => '_wtsales_sales_next_step',
                    'value' => $_GET[ 'ADMIN_FILTER_NEXT_VALUE' ]
                );
            }

            if ( !empty( $_GET[ 'ADMIN_FILTER_QUALITY_VALUE' ] ) ) {
                $filters_a[ ] = array(
                    'key'   => '_wtsales_sales_minrate',
                    'value' => $_GET[ 'ADMIN_FILTER_QUALITY_VALUE' ]
                );
            }

            if ( !empty( $_GET[ 'ADMIN_FILTER_STATE_VALUE' ] ) ) {
                $filters_a[ ] = array(
                    'key'   => '_wtsales_sales_minstate',
                    'value' => $_GET[ 'ADMIN_FILTER_STATE_VALUE' ]
                );
            }

            if ( !empty( $filters_a ) ) {
                $query->set( 'meta_query', $filters_a );
            }
        }

        return $query;
    }

    add_filter( 'pre_get_posts', 'wtsales_search_filters' );


    /*-----------------------------------------------------------------------------------*/
    /* Filter to send email whenever the "contact manager" metabox field is checked  */
    /*-----------------------------------------------------------------------------------*/


    //add_action( 'save_post', 'wtsales_manager_updated_email' );

    function wtsales_manager_updated_email( $post_id ) {

        if ( !wp_is_post_revision( $post_id ) ) {

            $post_title = get_the_title( $post_id );
            $post_url   = get_permalink( $post_id );
            $subject    = 'A post has been updated';

            $headers = 'From: Michael Gyura <admin@wtsales.org>' . "\r\n";
            $message = 'A post has been updated';

            wp_mail( 'michaelgyura@gmail.com', $subject, $message );


        }

    }