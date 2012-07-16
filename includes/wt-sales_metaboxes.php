<?php
    /**
     * Created by JetBrains PhpStorm.
     * User: mgyura
     * Date: 6/17/12
     */

    $prefix = '_wtsales_';
    add_filter( 'cmb_meta_boxes', 'wt_sales_metaboxes' );

    function wt_sales_metaboxes( $meta_boxes ) {
        global $prefix;

        $meta_boxes[ ] = array(
            'id'         => 'wt_sales_next',
            'title'      => 'Next Steps',
            'pages'      => array( 'wtsales_sales' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,

            'fields'     => array(
                array(
                    'name'    => 'Next Steps',
                    'desc'    => 'What needs to happen next with this contact',
                    'id'      => $prefix . 'sales_next_step',
                    'type'    => 'radio',
                    'std'     => 'none',
                    'options' => array(
                        array(
                            'name'  => 'No Contact',
                            'value' => 'none',
                        ),
                        array(
                            'name'  => 'Waiting For Reply',
                            'value' => 'waiting',
                        ),
                        array(
                            'name'  => 'Waiting For Customer To Buy',
                            'value' => 'tobuy',
                        ),
                        array(
                            'name'  => 'I Will Follow Up',
                            'value' => 'iwillfollow',
                        ),
                        array(
                            'name'  => 'Salesperson Needs To Follow Up',
                            'value' => 'salesperson',
                        ),
                        array(
                            'name'  => 'Manager Needs To Follow Up',
                            'value' => 'manager',
                        ),
                        array(
                            'name'  => 'None, Customer Has Purchased',
                            'value' => 'purchased',
                        ),
                        array(
                            'name'  => 'None, Customer Not Interested',
                            'value' => 'notinterested',
                        ),

                    ),
                ),
                array(
                    'name' => 'Complete Next Step On',
                    'desc' => 'The date that the next step should be completed on.',
                    'id'   => $prefix . 'sales_next_date',
                    'type' => 'text_date',
                )
            )
        );

        $meta_boxes[ ] = array(
            'id'         => 'wt_sales_meta',
            'title'      => 'Ministry Info',
            'pages'      => array( 'wtsales_sales' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
            'fields'     => array(
                array(
                    'name' => 'Ministry Name',
                    'desc' => 'The name of the Ministry',
                    'id'   => $prefix . 'sales_minname',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => 'Ministry Phone',
                    'desc' => 'The phone number of the Ministry',
                    'id'   => $prefix . 'sales_minphone',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => 'Ministry Email',
                    'desc' => 'The email of the Ministry',
                    'id'   => $prefix . 'sales_minemail',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => 'Ministry Website',
                    'desc' => 'The website of the Ministry',
                    'id'   => $prefix . 'sales_minweb',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => 'Ministry Street',
                    'desc' => 'The Street of the Ministry',
                    'id'   => $prefix . 'sales_minstreet',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Ministry City',
                    'desc' => 'The City of the Ministry',
                    'id'   => $prefix . 'sales_mincity',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => 'Ministry State',
                    'desc' => 'The State abbreviation of the Ministry',
                    'id'   => $prefix . 'sales_minstate',
                    'type' => 'text_small',
                ),
                array(
                    'name' => 'Ministry Zip',
                    'desc' => 'The Zip of the Ministry',
                    'id'   => $prefix . 'sales_minzip',
                    'type' => 'text_small',
                ),
                array(
                    'name'    => 'Rate Current Website',
                    'desc'    => 'Rate the appearance and function of the current website',
                    'id'      => $prefix . 'sales_minrate',
                    'type'    => 'radio',
                    'options' => array(
                        array(
                            'name'  => 'Good, dont bother contacting',
                            'value' => 'good',
                        ),
                        array(
                            'name'  => 'Ok, but could use some work',
                            'value' => 'ok',
                        ),
                        array(
                            'name'  => 'Help, they desperately need work',
                            'value' => 'help',
                        ),
                        array(
                            'name'  => 'No website listed',
                            'value' => 'none',
                        ),
                    ),
                ),
                array(
                    'name'    => 'Ministry Size',
                    'desc'    => 'If possible, list the amount of members',
                    'id'      => $prefix . 'sales_minsize',
                    'type'    => 'select',
                    'options' => array(
                        array(
                            'name'  => 'Select the Ministry Size',
                            'value' => 'not known',
                        ),
                        array(
                            'name'  => '01-50',
                            'value' => '01-50',
                        ),
                        array(
                            'name'  => '51-100',
                            'value' => '51-100',
                        ),
                        array(
                            'name'  => '101-300',
                            'value' => '101-300',
                        ),
                        array(
                            'name'  => '301-500',
                            'value' => '301-500',
                        ),
                        array(
                            'name'  => '501-1000',
                            'value' => '501-1000',
                        ),
                        array(
                            'name'  => '1001-2000',
                            'value' => '1001-2000',
                        ),
                        array(
                            'name'  => '2001 plus',
                            'value' => '2001 plus',
                        ),
                    ),
                ),
                array(
                    'name'    => 'Ministry Notes',
                    'desc'    => 'Is there anything about the website or church that should be noted for out salesperson?',
                    'id'      => $prefix . 'sales_notes',
                    'type'    => 'wysiwyg',
                    'options' => array( 'textarea_rows' => 5, ),
                ),
            )
        );


        $meta_boxes[ ] = array(
            'id'         => 'wt_sales_firstcontact',
            'title'      => 'First Contact',
            'pages'      => array( 'wtsales_sales' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
            'fields'     => array(
                array(
                    'name'    => 'Contact Method',
                    'desc'    => 'How did you contact the ministry',
                    'id'      => $prefix . 'sales_first_method',
                    'type'    => 'radio',
                    'options' => array(
                        array(
                            'name'  => 'Phone Call With Person',
                            'value' => 'phonePerson',
                        ),
                        array(
                            'name'  => 'Phone Call Message',
                            'value' => 'phoneMessage',
                        ),
                        array(
                            'name'  => 'Email',
                            'value' => 'email',
                        ),
                        array(
                            'name'  => 'In Person',
                            'value' => 'inPerson',
                        ),
                    ),
                ),
                array(
                    'name' => 'Name of Person',
                    'desc' => 'The name of the person you connected with',
                    'id'   => $prefix . 'sales_first_spoke',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => 'Phone or email used',
                    'desc' => 'If different from above',
                    'id'   => $prefix . 'sales_first_pore',
                    'type' => 'text_medium',
                ),
                array(
                    'name'    => 'Contact Results',
                    'desc'    => 'What were the results of your contact',
                    'id'      => $prefix . 'sales_first_results',
                    'type'    => 'radio',
                    'options' => array(
                        array(
                            'name'  => 'Message Left',
                            'value' => 'Message Left',
                        ),
                        array(
                            'name'  => 'Interested and Will Research More',
                            'value' => 'Interested and Will Research More',
                        ),
                        array(
                            'name'  => 'Interested But Needs Approval',
                            'value' => 'Interested But Needs Approval',
                        ),
                        array(
                            'name'  => 'Interested and Will Buy On their Own',
                            'value' => 'Interested and Will Buy On their Own',
                        ),
                        array(
                            'name'  => 'Interested and Wants Call Back From Me',
                            'value' => 'Interested and Wants Call Back From Me',
                        ),
                        array(
                            'name'  => 'Interested and Wants Call Back From Manager',
                            'value' => 'Interested and Wants Call Back From Manager',
                        ),
                        array(
                            'name'  => 'Not Interested',
                            'value' => 'Not Interested',
                        ),
                        array(
                            'name'  => 'Do Not Contact Again',
                            'value' => 'Do Not Contact Again',
                        ),
                        array(
                            'name'  => 'Incorrect Contact Data',
                            'value' => 'Incorrect Contact Data',
                        ),
                    ),
                ),
                array(
                    'name' => 'Date of Contact',
                    'desc' => 'Select the date you contacted this ministry',
                    'id'   => $prefix . 'sales_first_date',
                    'type' => 'text_date',
                ),
                array(
                    'name' => 'Salespersons Last Name',
                    'desc' => 'Write your last name verifying that you made the contact',
                    'id'   => $prefix . 'test_first_sales',
                    'type' => 'text_medium',
                ),
                array(
                    'name'    => 'First Contact Notes',
                    'desc'    => 'Any additional information or notes from the first contact',
                    'id'      => $prefix . 'sales_first_notes',
                    'type'    => 'wysiwyg',
                    'options' => array( 'textarea_rows' => 5, ),
                ),
            )
        );


        $meta_boxes[ ] = array(
            'id'         => 'wt_sales_secondcontact',
            'title'      => 'Second Contact',
            'pages'      => array( 'wtsales_sales' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
            'fields'     => array(
                array(
                    'name'    => 'Contact Method',
                    'desc'    => 'How did you contact the ministry',
                    'id'      => $prefix . 'sales_second_method',
                    'type'    => 'radio',
                    'options' => array(
                        array(
                            'name'  => 'Phone Call With Person',
                            'value' => 'phonePerson',
                        ),
                        array(
                            'name'  => 'Phone Call Message',
                            'value' => 'phoneMessage',
                        ),
                        array(
                            'name'  => 'Email',
                            'value' => 'email',
                        ),
                        array(
                            'name'  => 'In Person',
                            'value' => 'inPerson',
                        ),
                    ),
                ),
                array(
                    'name' => 'Name of Person',
                    'desc' => 'The name of the person you connected with',
                    'id'   => $prefix . 'sales_second_spoke',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => 'Phone or email used',
                    'desc' => 'If different from above',
                    'id'   => $prefix . 'sales_second_pore',
                    'type' => 'text_medium',
                ),
                array(
                    'name'    => 'Contact Results',
                    'desc'    => 'What were the results of your contact',
                    'id'      => $prefix . 'sales_second_results',
                    'type'    => 'radio',
                    'options' => array(
                        array(
                            'name'  => 'Message Left',
                            'value' => 'Message Left',
                        ),
                        array(
                            'name'  => 'Interested and Will Research More',
                            'value' => 'Interested and Will Research More',
                        ),
                        array(
                            'name'  => 'Interested But Needs Approval',
                            'value' => 'Interested But Needs Approval',
                        ),
                        array(
                            'name'  => 'Interested and Will Buy On their Own',
                            'value' => 'Interested and Will Buy On their Own',
                        ),
                        array(
                            'name'  => 'Interested and Wants Call Back From Me',
                            'value' => 'Interested and Wants Call Back From Me',
                        ),
                        array(
                            'name'  => 'Interested and Wants Call Back From Manager',
                            'value' => 'Interested and Wants Call Back From Manager',
                        ),
                        array(
                            'name'  => 'Not Interested',
                            'value' => 'Not Interested',
                        ),
                        array(
                            'name'  => 'Do Not Contact Again',
                            'value' => 'Do Not Contact Again',
                        ),
                    ),
                ),
                array(
                    'name' => 'Date of Contact',
                    'desc' => 'Select the date you contacted this ministry',
                    'id'   => $prefix . 'sales_second_date',
                    'type' => 'text_date',
                ),
                array(
                    'name' => 'Salespersons Last Name',
                    'desc' => 'Write your last name verifying that you made the contact',
                    'id'   => $prefix . 'test_second_sales',
                    'type' => 'text_medium',
                ),
                array(
                    'name'    => 'First Contact Notes',
                    'desc'    => 'Any additional information or notes from the first contact',
                    'id'      => $prefix . 'sales_second_notes',
                    'type'    => 'wysiwyg',
                    'options' => array( 'textarea_rows' => 5, ),
                ),
            )
        );

        $meta_boxes[ ] = array(
            'id'         => 'wt_sales_thirdcontact',
            'title'      => 'Third Contact',
            'pages'      => array( 'wtsales_sales' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
            'fields'     => array(
                array(
                    'name'    => 'Contact Method',
                    'desc'    => 'How did you contact the ministry',
                    'id'      => $prefix . 'sales_third_method',
                    'type'    => 'radio',
                    'options' => array(
                        array(
                            'name'  => 'Phone Call With Person',
                            'value' => 'phonePerson',
                        ),
                        array(
                            'name'  => 'Phone Call Message',
                            'value' => 'phoneMessage',
                        ),
                        array(
                            'name'  => 'Email',
                            'value' => 'email',
                        ),
                        array(
                            'name'  => 'In Person',
                            'value' => 'inPerson',
                        ),
                    ),
                ),
                array(
                    'name' => 'Name of Person',
                    'desc' => 'The name of the person you connected with',
                    'id'   => $prefix . 'sales_third_spoke',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => 'Phone or email used',
                    'desc' => 'If different from above',
                    'id'   => $prefix . 'sales_third_pore',
                    'type' => 'text_medium',
                ),
                array(
                    'name'    => 'Contact Results',
                    'desc'    => 'What were the results of your contact',
                    'id'      => $prefix . 'sales_third_results',
                    'type'    => 'radio',
                    'options' => array(
                        array(
                            'name'  => 'Message Left',
                            'value' => 'Message Left',
                        ),
                        array(
                            'name'  => 'Interested and Will Research More',
                            'value' => 'Interested and Will Research More',
                        ),
                        array(
                            'name'  => 'Interested But Needs Approval',
                            'value' => 'Interested But Needs Approval',
                        ),
                        array(
                            'name'  => 'Interested and Will Buy On their Own',
                            'value' => 'Interested and Will Buy On their Own',
                        ),
                        array(
                            'name'  => 'Interested and Wants Call Back From Me',
                            'value' => 'Interested and Wants Call Back From Me',
                        ),
                        array(
                            'name'  => 'Interested and Wants Call Back From Manager',
                            'value' => 'Interested and Wants Call Back From Manager',
                        ),
                        array(
                            'name'  => 'Not Interested',
                            'value' => 'Not Interested',
                        ),
                        array(
                            'name'  => 'Do Not Contact Again',
                            'value' => 'Do Not Contact Again',
                        ),
                    ),
                ),
                array(
                    'name' => 'Date of Contact',
                    'desc' => 'Select the date you contacted this ministry',
                    'id'   => $prefix . 'sales_third_date',
                    'type' => 'text_date',
                ),
                array(
                    'name' => 'Salespersons Last Name',
                    'desc' => 'Write your last name verifying that you made the contact',
                    'id'   => $prefix . 'test_third_sales',
                    'type' => 'text_medium',
                ),
                array(
                    'name'    => 'First Contact Notes',
                    'desc'    => 'Any additional information or notes from the first contact',
                    'id'      => $prefix . 'sales_third_notes',
                    'type'    => 'wysiwyg',
                    'options' => array( 'textarea_rows' => 5, ),
                ),
            )
        );

        $meta_boxes[ ] = array(
            'id'         => 'wt_sales_additionalcontact',
            'title'      => 'Additional Contact Times',
            'pages'      => array( 'wtsales_sales' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true,
            'fields'     => array(
                array(
                    'name' => 'Number of Contacts',
                    'desc' => 'How many times has this ministry been contacted',
                    'id'   => $prefix . 'sales_add_additional',
                    'type' => 'text_small',
                ),
                array(
                    'name'    => 'Contact Method',
                    'desc'    => 'How did you contact the ministry',
                    'id'      => $prefix . 'sales_add_method',
                    'type'    => 'radio',
                    'options' => array(
                        array(
                            'name'  => 'Phone Call With Person',
                            'value' => 'phonePerson',
                        ),
                        array(
                            'name'  => 'Phone Call Message',
                            'value' => 'phoneMessage',
                        ),
                        array(
                            'name'  => 'Email',
                            'value' => 'email',
                        ),
                        array(
                            'name'  => 'In Person',
                            'value' => 'inPerson',
                        ),
                    ),
                ),
                array(
                    'name' => 'Name of Person',
                    'desc' => 'The name of the person you connected with',
                    'id'   => $prefix . 'sales_add_spoke',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => 'Phone or email used',
                    'desc' => 'If different from above',
                    'id'   => $prefix . 'sales_add_pore',
                    'type' => 'text_medium',
                ),
                array(
                    'name'    => 'Contact Results',
                    'desc'    => 'What were the results of your contact',
                    'id'      => $prefix . 'sales_add_results',
                    'type'    => 'radio',
                    'options' => array(
                        array(
                            'name'  => 'Message Left',
                            'value' => 'Message Left',
                        ),
                        array(
                            'name'  => 'Interested and Will Research More',
                            'value' => 'Interested and Will Research More',
                        ),
                        array(
                            'name'  => 'Interested But Needs Approval',
                            'value' => 'Interested But Needs Approval',
                        ),
                        array(
                            'name'  => 'Interested and Will Buy On their Own',
                            'value' => 'Interested and Will Buy On their Own',
                        ),
                        array(
                            'name'  => 'Interested and Wants Call Back From Me',
                            'value' => 'Interested and Wants Call Back From Me',
                        ),
                        array(
                            'name'  => 'Interested and Wants Call Back From Manager',
                            'value' => 'Interested and Wants Call Back From Manager',
                        ),
                        array(
                            'name'  => 'Not Interested',
                            'value' => 'Not Interested',
                        ),
                        array(
                            'name'  => 'Do Not Contact Again',
                            'value' => 'Do Not Contact Again',
                        ),
                    ),
                ),
                array(
                    'name' => 'Date of Contact',
                    'desc' => 'Select the date you contacted this ministry',
                    'id'   => $prefix . 'sales_add_date',
                    'type' => 'text_date',
                ),
                array(
                    'name' => 'Salespersons Last Name',
                    'desc' => 'Write your last name verifying that you made the contact',
                    'id'   => $prefix . 'test_add_sales',
                    'type' => 'text_medium',
                ),
                array(
                    'name'    => 'First Contact Notes',
                    'desc'    => 'Any additional information or notes from the first contact',
                    'id'      => $prefix . 'sales_add_notes',
                    'type'    => 'wysiwyg',
                    'options' => array( 'textarea_rows' => 5, ),
                ),
            )
        );

        return $meta_boxes;
    }

    // Initialize the metabox class
    add_action( 'init', 'wtsales_cmb_meta_boxes', 9999 );

    function wtsales_cmb_meta_boxes() {
        if ( !class_exists( 'cmb_Meta_Box' ) ) {
            require_once( 'lib/metabox/init.php' );
        }
    }