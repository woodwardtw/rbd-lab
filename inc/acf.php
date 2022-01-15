<?php
/**
 * ACF Functions
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//home page
function rbd_home_project_text(){
    if(get_field('project_text')){
        $text = get_field('project_text');
        return $text;
    }
}



    //save acf json
        add_filter('acf/settings/save_json', 'rbd_lab_json_save_point');
         
        function rbd_lab_json_save_point( $path ) {
            
            // update path
            $path = get_stylesheet_directory() . '/acf-json'; //replace w get_stylesheet_directory() for theme
            
            
            // return
            return $path;
            
        }


        // load acf json
        add_filter('acf/settings/load_json', 'rbd_lab_json_load_point');

        function rbd_lab_json_load_point( $paths ) {
            
            // remove original path (optional)
            unset($paths[0]);
            
            
            // append path
            $paths[] = get_stylesheet_directory()  . '/acf-json';//replace w get_stylesheet_directory() for theme
            
            
            // return
            return $paths;
            
        }