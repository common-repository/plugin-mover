<?php
/**
 * Class and Function List:
 * Function list:
 * - plugin_move_page()
 * Classes list:
 */
function plugin_move_page()
{

    if (isset($_POST['change_folder']))
    {

        update_option("plugin_mover_directory", $_POST['folder_name']);
        $plugin_mover_dir = get_option("plugin_mover_directory");

?>
	<div id="message" class="updated">
	<p><?php echo __("Folder changed to ", "plugin-mover");
        echo $plugin_mover_dir; ?>.</p></div>
	<?php
    }
    else if (isset($_POST['create_folder']))
    {
        $url        = get_home_path() . "wp-content/";
        $create_dir = mkdir($url . $_POST['folder_name']);
        update_option("plugin_mover_directory", $_POST['folder_name']);
        $plugin_mover_dir = get_option("plugin_mover_directory");

?>
	<div id="message" class="updated">
	<p><?php echo __("Folder ", "plugin-mover");
        echo $plugin_mover_dir;
        echo __(" created", "plugin-mover"); ?>.</p></div>
	<?php
    }
    else
    {

        $plugin_mover_dir = get_option("plugin_mover_directory");
        if ($plugin_mover_dir == "")
        {
            $plugin_mover_dir = "plugins2";
        }
    }

?>




<div class="wrap">
<h2><?php _e("Plugin Mover", "plugin-mover"); ?></h2>
<form method="post">
<style type="text/css">
    .divTable
    {
        display:  table;
        width:auto;
        background-color:#eee;
        border-spacing:5px;/*cellspacing:poor IE support for  this*/
       /* border-collapse:separate;*/
    }

    .divRow
    {
       display:table-row;
       width:auto;
    }

    .divCell
    {
        float:left;/*fix for  buggy browsers*/
        display:table-column;
        width:50px;
    }
    
    #folder {
    /*color:orange;*/
    }
</style>
<?php //var_dump($_POST);
    
?>

<?php _e("Dear WordPress user,", "plugin-mover"); ?><br />
<?php _e("I write you this letter, to show what this plugin is doing.", "plugin-mover"); ?><br />
<?php _e("During work I often come across one special issue:", "plugin-mover"); ?><br />
<?php _e("I have to much plugins and lose the overview.", "plugin-mover"); ?><br />
<?php _e("After installing"); ?> 
<a href="https://wordpress.org/plugins/label-plugins/" target="_NEW">Label Plugins</a> 
<?php _e("it helped a little but now", "plugin-mover"); ?><br />
<?php _e("I want to move the unused plugins to another directory without deleting them.", "plugin-mover"); ?><br />
<?php _e("Of course I could do this with FTP but in this case I don't know wherever a plugin is active or not.", "plugin-mover"); ?><br />
<?php _e("This is where this plugin comes in place.", "plugin-mover"); ?><br />
<br />
<?php _e("This graphic should show the logic:", "plugin-mover"); ?><br />

  <div class="divTable">
             <div class="divRow">
				<div class="divCell" align="center"><div class="dashicons dashicons-redo"></div></div>
                <div  class="divCell"><div style="font-size:25px;" class="dashicons dashicons-arrow-right-alt"></div></div>
                <div  class="divCell"><div style="font-size:25px;" class="dashicons dashicons-category"></div></div>
                <div class="divCell" align="center">wp-content/plugins</div>
             </div>
             
            <div class="divRow">
            	
				<div class="divCell"><div style="font-size:25px;" class="dashicons dashicons-admin-plugins"></div></div>
                <div class="divCell"><div style="font-size:25px;" class="dashicons dashicons-arrow-right-alt"></div></div>
                <div class="divCell"><div style="font-size:25px;" class="dashicons dashicons-category"></div></div>
            	<div class="divCell" align="center">wp-content/plugins2</div>
            </div>
            
      </div>

<br />
<?php _e("Here are the steps", "plugin-mover"); ?><br />
<div class="dashicons dashicons-arrow-right"></div> <?php _e("So all you need to do now, is creating a new folder here.", "plugin-mover"); ?><br />
<span style="color:red;" ><div style="font-size:20px;" class="dashicons dashicons-info"></div>
Be careful, if no folder is present you will delete your plugins!</span><br />
<input id="folder" type="submit" name="create_folder" class="button-primary" value="<?php _e("New folder", "plugin-mover"); ?>" />
<?php _e("with name ", "plugin-mover"); ?>
<input type="text" name="folder_name" value="<?php echo $plugin_mover_dir; ?>" />
<input type='submit' name="change_folder" value='<?php _e("Change folder", "plugin-mover"); ?>' class='button-secondary' />
 <br>

<div class="dashicons dashicons-arrow-right"></div>
<?php _e("Go to the plugins section, select one and choose 'Move to your folder' in Bulk Actions ", "plugin-mover"); ?><br />
<div class="dashicons dashicons-arrow-right"></div>
<?php _e("Find your moved plugins in the new folder by FTP!", "plugin-mover"); ?><br />
</div>
</form>
<?php
}
?>