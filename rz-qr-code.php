<?php
/*
 * Plugin Name:       RZ QR Code Plugin
 * Description:       This is a basic Plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Razel Ahmed
 * Author URI:        https://razelahmed.com
 */

 class Rz_Qr_Code {
    public function __construct() {
        add_action("init", array( $this,"initialize") );
    }

    function initialize(){
        add_filter("the_content", array( $this,"display_qr_code") );
    }

    function display_qr_code($myCont){
        $current_post_url = get_permalink();
        $my_qr_code_url_img = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=".$current_post_url;
        $newCont = $myCont."<p><img src='{$my_qr_code_url_img}'></p>";
        return $newCont;
    }

 }

 new Rz_Qr_Code();