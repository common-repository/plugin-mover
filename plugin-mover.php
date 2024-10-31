<?php
/**
Plugin Name: Plugin Mover
Description: A Plugin Mover.
Version: 1.1
Author: emojized
Author URI: https://emojized.com
Requires at least: 4.7
Tested up to: 5.6.1
Text Domain:   plugin-mover
Domain Path:   /

This Plugin is licensed under GPL

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.


Special use case if you need to move plugins to a different folder from the WordPress backend.

Ressources and help came from
http://stackoverflow.com/questions/23541269/how-to-add-custom-bulk-actions-in-wordpress-list-tables
http://stackoverflow.com/questions/8446247/how-to-move-one-directory-to-another-directory-in-php
http://twitter.com/der_kronn




*/
/**
* Class and Function List:
* Function list:
* - add_plugin_move_page()
* - e_plugin_mover()
* - e_plugin_mover_action_handler()
* - e_plugin_mover_action_notices()
* Classes list:
*/
include ("plugin-mover-admin-page.php");

add_filter('bulk_actions-plugins', 'e_plugin_mover');
add_action('admin_menu', 'add_plugin_move_page');
add_filter('handle_bulk_actions-plugins', 'e_plugin_mover_action_handler', 10, 3);
add_action('admin_notices', 'e_plugin_mover_action_notices');

function add_plugin_move_page()
{
    add_management_page(__("Plugin Mover", "plugin-mover") , __("Plugin Mover", "plugin-mover") , 'manage_options', 'pluginmove', 'plugin_move_page');
}

function e_plugin_mover($bulk_array)
{

    $plugin_mover_dir = get_option("plugin_mover_directory");
    $bulk_array['plugin_mover']                  = __("Move to ", "plugin-move") . $plugin_mover_dir;;
    return $bulk_array;

}

function e_plugin_mover_action_handler($redirect, $doaction, $object_ids)
{

    // let's remove query args first
    $redirect         = remove_query_arg(array(
        'plugin_mover'
    ) , $redirect);

    // do something for "Set price to $1000" bulk action
    if ($doaction == 'plugin_mover')
    {

        $checked          = $_POST['checked'];

        foreach ($checked as $thisPlugin)
        {
            $plugin_mover_dir = get_option("plugin_mover_directory");
            $url              = get_home_path() . "wp-content/";
            $plugin_directory = explode("/", $thisPlugin);
            $old_folder_name  = $plugin_directory[0];
            $new_folder_name  = $plugin_directory[0];

            $oldfolderpath    = $url . "/plugins/" . $old_folder_name;
            $newfolderpath    = $url . "/" . $plugin_mover_dir . "/" . $new_folder_name;

            rename($oldfolderpath, $newfolderpath);

            $redirect = add_query_arg('plugins_moved', $object_ids, $redirect);
        }

    }

    return $redirect;

}

function e_plugin_mover_action_notices()
{

    if (!empty($_REQUEST['plugins_moved']))
    {

        echo '<div id="message" class="updated notice is-dismissible"><p>';
        echo '<b>Plugins moved:</b><br>';
        foreach ($_REQUEST['plugins_moved'] as $plugin)
        {
            echo $plugin . '<br>';
        }
        echo '</p></div>';

    }

}

?>