<?php
/*
Plugin Name: DietMeOnline
Plugin URI: https://github.com/EderlMarkus/WORDPRESS_DietMeOnline_Plugin
A Plugin we created for our Project for the University for Applied Sciences in Vienna
Version: 1.0.0
Text Domain: dietmeonline
 */

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

require_once 'kalorientabelle/index.php';
require_once 'API/rest.php';

function API_getUserId()
{
    $rest = new Rest;
    echo "UserID is: " . $rest->checkIfUserAdmin();
}
add_shortcode('API_getUserId', 'API_getUserId');

//Shows Kalorientabelle either for Users or Admins, depending on whos logged in
function showKalorientabelle()
{
    $rest = new Rest;
    $userAdmin = $rest->checkIfUserAdmin();
    $kalTable = new Kalorientabelle;
    if ($userAdmin) {
        $kalTable->showKalorientabelleForAdmins();
    } else {
        $kalTable->showKalorientabelleForUsers();
    }
}

add_shortcode('Show_Kalorientabelle', 'showKalorientabelle');
