<?php 
//Collection of Walker classes

    /*
        wp_nav_menu()
        <div class="menu-container">
            <ul> //start_lvl() - the function name of walker class that manages opening tag of ul

                <li><a>Link<span> //start_el
                
                Desc</a></span></li> //end_el()
            </ul> //end_lvl()
        </div>


    //Walker means we can access these and customise markup
    */

class Walker_Nav_Primary extends Walker_Nav_menu {

    function start_lvl( &$output, $depth = 0, $args = Array()){ //ul - the & is to stop rewriting/clearing output of Walker_Nav_menu
        $indent = str_repeat("\t",$depth); // indent generated HTML - \t creates tab character 
        $submenu = ($depth > 0) ? ' sub-menu' : ''; //generate sub-menu class if depth is more than 0
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">n"; //the . merges the two elements, this is adding dropdown-menu to the WP submenu default markup
    }

    // function start_el(){ //li, a, span 


    // }

    // We're not gonna use these rn
    // function end_el(){ //close li, a, span


    // }

    // function end_lvl(){ //close ul



    // }
}