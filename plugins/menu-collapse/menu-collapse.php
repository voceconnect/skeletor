<?php
/**
 * Add JS and CSS to more easily manage WP Nav Menu UI 
 */
if( !class_exists( 'Menu_Collapse' ) ) {

    class Menu_Collapse {

        public static function init() {
            add_action( 'admin_enqueue_scripts', array( __CLASS__, 'action_admin_enqueue_scripts' ) );
            add_action( 'admin_print_styles', array( __CLASS__, 'action_admin_print_styles' ) );
        }

        public static function action_admin_enqueue_scripts( $hook ) {
            if( 'nav-menus.php' == $hook )
                wp_enqueue_script( 'menu-collapse', get_template_directory_uri() . '/plugins/menu-collapse/menu-collapse.js' );
        }

        public static function action_admin_print_styles() {
            echo "<style>
                a.toggler { float: left;
                            display: block !important;
                            left: 0px;
                            position: absolute;
                            margin: -35px 0 0 415px;
                            cursor: pointer;
                            padding: 10px;
                            }
                </style>";
        }

    }

    Menu_Collapse::init();
}
