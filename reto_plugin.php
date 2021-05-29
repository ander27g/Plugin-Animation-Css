<?php
/*
Plugin Name: Css animation
Plugin URI:http://cssanimation.es
Description: This is a test plugin that contains a css animation
version: 0.01
*/

function activar(){  
       /*global $wpdb;  // utilizar funciones de la base de datos con funcion query

       $sql ="CREATE TABLE IF NOT EXISTS {$wpdb->prefix}Data_animation(
          `DataAnimationId` INT NOT NULL AUTO_INCREMENT,
          `Nombre` VARCHAR(45) NULL,
          `ShortCode`  VARCHAR(45) NULL,
          PRIMARY KEY ('DataAnimationId'));";
          

        $wpdb->query($sql);*/
}

function desactivar(){
    flush_rewrite_rules();
}


register_activation_hook(__FILE__,'activar');
register_deactivation_hook(__FILE__,'desactivar');

add_action('admin_menu','CrearMenu');

function CrearMenu(){
    add_menu_page(
        'Animation Css', //Titulo de la Pagina
        'Animation Css Menu',//Titulo del menu
        'manage_options',//Capability
        plugin_dir_path(__FILE__).'admin/funtion.php', //slug
        null,//Funcion del contenido
        plugin_dir_url(__FILE__).'admin/img/css.png', //icono
        '1'
    );

}

function MostrarContenido(){
    echo "<h1>Contenido de la pagina </h1>";
}

// Encolar Bootstrap

function EncolarBootstrapJS(){
    wp_enqueue_script('bootstrapjs', plugins_url('admin/bootstrap/js/bootstrap.min.js',__FILE__),array('jquery'));
}

add_action('admin_enqueue_scripts','EncolarBootstrapJS');