<?php

//add theme support
add_theme_support( 'post-thumbnails' );
    
    function my_theme_scripts() {
        // Anexar la hoja de estilos principal
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        // Anexar todas las hojas de estilo restantes
        wp_enqueue_style( 'plugins', get_template_directory_uri().'/assets/css/plugins.min.css');
        wp_enqueue_style( 'template', get_template_directory_uri().'/assets/css/template.css');
        wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
        // Anexar los ficheros de JS
        wp_register_script( 'plugins-js', get_template_directory_uri().'/assets/js/plugins.min.js', null, null, true );
        wp_enqueue_script( 'plugins-js' );
        
        wp_register_script( 'custom-js', get_template_directory_uri().'/assets/js/custom.min.js', null, null, true);
        wp_enqueue_script( 'custom-js' ); 
        
        wp_register_script( 'jquery-js', get_template_directory_uri().'/assets/js/jquery.min.js', null, null, false);
        wp_enqueue_script( 'jquery-js' ); 
        
        wp_register_script( 'bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', null, null, true);
        wp_enqueue_script( 'bootstrap-js' ); 
        
        wp_register_script( 'popper-js', get_template_directory_uri().'/assets/js/popper.min.js', array( 'jquery-js' ), null, true);
        wp_enqueue_script( 'popper-js' ); 
    }
    add_action('wp_enqueue_scripts', 'my_theme_scripts');

    /**
    * Retrieve a page object giving its title
    * @param $title    String  Page title
    * @return $page    object  Page object
    */

    function get_page_object( $title ){

        $args = array(
            'title' => $title,       // Page title
            'post_type' => 'page',   // Only pages type post
            'post_per_page' => 1,    // Only one tupla
            'post-status' => 'publish', // Only the published pages
        );

        $query = new WP_Query( $args );

        if ( !empty($query->post) ) {
            $page = $query->post;
        } else {
            $page = null;
        }

        return $page;
    }

    /*
    *Limit the excerpt length depending on template
    * @return custom number of words
    */

    function custom_excerpt(){
        if (is_front_page()){
            return 20;
        }

        return 30;

}
    add_filter('excerpt_length', 'custom_excerpt');

    /*
    *  Register the widget area in sidebar
    */

    function my_theme_widget_area(){
        $args = array(
            'name' => 'Sidebar Widget' ,
            'id' => 'sidebar-widget', /* valor del atributo id de la caja que crea wp para el widget*/
            'description' => 'Widget area for the sidebar',
            'before_widget' => '<article class="widget">',
            'after_widget' => '</article>',
        );
        register_sidebar( $args );

    }
    add_action('widgets_init' , 'my_theme_widget_area');

    /**
    * Devuelve la URL de una pagina a partir del nombre de su plantilla
    * (RECIPES, NEWS, ARCHIVES, CONTACT) o, si no, de su titulo.
    * Si no existe la pagina, devuelve la home para no romper el menu.
    * @param $name  String  Nombre de plantilla / titulo de la pagina
    * @return       String  URL
    */

    function barracuda_page_link( $name ){

        $templates = array(
            'RECIPES'  => 'recipes.php',
            'NEWS'     => 'news.php',
            'ARCHIVES' => 'archives.php',
            'CONTACT'  => 'contact.php',
        );

        // 1) Buscar por plantilla asignada
        if ( isset( $templates[ $name ] ) ) {
            $pages = get_posts( array(
                'post_type'      => 'page',
                'post_status'    => 'publish',
                'posts_per_page' => 1,
                'meta_key'       => '_wp_page_template',
                'meta_value'     => $templates[ $name ],
            ) );
            if ( ! empty( $pages ) ) {
                return get_permalink( $pages[0]->ID );
            }
        }

        // 2) Buscar por titulo
        $by_title = get_posts( array(
            'post_type'      => 'page',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
            'title'          => $name,
        ) );
        if ( ! empty( $by_title ) ) {
            return get_permalink( $by_title[0]->ID );
        }

        // 3) Fallback
        return home_url( '/' );
    }