<?php
/*
Plugin Name: BH Dashboard Menus Settings
Plugin URI: http://getmasum.net/plugins/bh-dashboard-menus-settings
Description: This is BH Dashboard Menus Settings plugin.It will be enable Option to change menus name on your dashboard.
Author: Masum Billah
Author URI: http://getmasum.net
Version: 1.0
*/


// Adding BH Custom preloader Menu
function bh_wordpress_dashboard_admin_menu_options()  
{  
	add_options_page('BH WordPress Dashboard Menus Options', 'BH WordPress Dashboard Menus Settings', 'manage_options', 'bh_wp_dashboard_menus_settings','bh_wordpress_dahboard__menus__settings');  
}  
add_action('admin_menu', 'bh_wordpress_dashboard_admin_menu_options');


// Default options values
$hb_wordpress_menus_name_default = array(
	'dashboard_name' => 'Dashboard',
	'home_name' => 'Home',
	'update_name' => 'Updates',
	'posts_name' => 'Posts',
	'allposts_name' => 'All Posts',
	'add_new_posts_name' => 'Add New',
	'categories_name' => 'Categories',
	'tags_name' => 'Tags',
	'media_name' => 'Media',
	'library_name' => 'Library',
	'add_new_media_name' => 'Add New',
	'links_name' => 'Links',
	'all_links_name' => 'All Links',
	'add_new_links_name' => 'Add New',
	'add_link_category_name' => 'Link Categories',
	'pages_name' => 'Pages',
	'all_pages_name' => 'All Pages',
	'add_new_page_name' => 'Add New',
	'comments_name' => 'Comments',
	'allcomments_name' => 'All Comments',
	'appearance_name' => 'Appearance',
	'themes_name' => 'Themes',
	'customize_name' => 'Customize',
	'widgets_name' => 'Widgets',
	'menus_name' => 'Menus',
	'theme_editor_name' => 'Editor',
	'plugins_name' => 'Plugins',
	'installed_plugins_name' => 'Installed Plugins',
	'add_new_plugins_name' => 'Add New',
	'plugins_editor_name' => 'Editor',
	'users_name' => 'Users',
	'allusers_name' => 'All Users',
	'add_newusers_name' => 'Add New',
	'your_profile_name' => 'Your Profile',
	'tools_name' => 'Tools',
	'available_tools_name' => 'Available Tools',
	'import_name' => 'Import',
	'export_name' => 'Export',
	'settings_name' => 'Settings',
	'general_name' => 'General',
	'writing_name' => 'Writing',
	'readng_name' => 'Reading',
	'discustion_name' => 'Discussion',
	'media_setting_name' => 'Media',
	'privacy_name' => 'Privacy',
	'permalinks_name' => 'Permalinks'

); 

if ( is_admin() ) : // Load only if we are viewing an admin page

function bh_wordpress_dashboard_menus_settings() {
	// Register settings and call sanitation functions
	register_setting( 'bh_wordpress_dashboard_menus_p_options', 'hb_wordpress_menus_name_default', 'bh_wordpress_dashboard_validate_options' );
}

add_action( 'admin_init', 'bh_wordpress_dashboard_menus_settings' );

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'bh_menu_add_action_links' );

function bh_menu_add_action_links ( $bh_menu_links ) {
 $bhmenulinks = array(
 '<a href="' . admin_url( 'options-general.php?page=bh_wp_dashboard_menus_settings' ) . '">Settings</a>',
 );
return array_merge( $bh_menu_links, $bhmenulinks );
}


// Function to generate options page
function bh_wordpress_dahboard__menus__settings() {

	global $hb_wordpress_menus_name_default;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted.		
?>
	<div class="wrap">
	
	<h2>BH WordPress Dashboard Menus Options</h2>

	<?php if ( false !== $_REQUEST['updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>

	<form method="post" action="options.php">

	<?php $settings = get_option( 'hb_wordpress_menus_name_default', $hb_wordpress_menus_name_default ); ?>
	
	<?php settings_fields( 'bh_wordpress_dashboard_menus_p_options' );
	/* This function outputs some hidden fields required by the form,
	including a nonce, a unique number used to ensure the form has been submitted from the admin page
	and not somewhere else, very important for security */ ?>

	
	<table class="form-table"><!-- Grab a hot cup of coffee, yes we're using tables! -->
	<h3>Change Your Dashboard Menus Name.</h3>

		<tr valign="top">
		
			<th scope="row"><label for="dashboard_name">Dashboard :</label></th>
			<td>
				<input id="dashboard_name" type="text" name="hb_wordpress_menus_name_default[dashboard_name]" value="<?php echo stripslashes($settings['dashboard_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			&nbsp;<th scope="row"><label for="home_name">&nbsp; &nbsp;&nbsp;Home :</label></th>
			<td>
				<input id="home_name" type="text" name="hb_wordpress_menus_name_default[home_name]" value="<?php echo stripslashes($settings['home_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		<tr valign="top">		
			<th scope="row"><label for="update_name">&nbsp; &nbsp;&nbsp;Updates :</label></th>
			<td>
				<input id="update_name" type="text" name="hb_wordpress_menus_name_default[update_name]" value="<?php echo stripslashes($settings['update_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		<tr valign="top">		
			<th scope="row"><label for="posts_name">Posts :</label></th>
			<td>
				<input id="posts_name" type="text" name="hb_wordpress_menus_name_default[posts_name]" value="<?php echo stripslashes($settings['posts_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>
		
		<tr valign="top">		
			<th scope="row"><label for="allposts_name">&nbsp; &nbsp;&nbsp;All Posts :</label></th>
			<td>
				<input id="allposts_name" type="text" name="hb_wordpress_menus_name_default[allposts_name]" value="<?php echo stripslashes($settings['allposts_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="add_new_posts_name">&nbsp; &nbsp;&nbsp;Add New :</label></th>
			<td>
				<input id="add_new_posts_name" type="text" name="hb_wordpress_menus_name_default[add_new_posts_name]" value="<?php echo stripslashes($settings['add_new_posts_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>
		
		<tr valign="top">		
			<th scope="row"><label for="categories_name">&nbsp; &nbsp;&nbsp;Categories :</label></th>
			<td>
				<input id="categories_name" type="text" name="hb_wordpress_menus_name_default[categories_name]" value="<?php echo stripslashes($settings['categories_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>				
		
		<tr valign="top">		
			<th scope="row"><label for="tags_name">&nbsp; &nbsp;&nbsp;Tags :</label></th>
			<td>
				<input id="tags_name" type="text" name="hb_wordpress_menus_name_default[tags_name]" value="<?php echo stripslashes($settings['tags_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>				
		
		<tr valign="top">		
			<th scope="row"><label for="media_name">Media :</label></th>
			<td>
				<input id="media_name" type="text" name="hb_wordpress_menus_name_default[media_name]" value="<?php echo stripslashes($settings['media_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="library_name">&nbsp; &nbsp;&nbsp;Library :</label></th>
			<td>
				<input id="library_name" type="text" name="hb_wordpress_menus_name_default[library_name]" value="<?php echo stripslashes($settings['library_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="add_new_media_name">&nbsp; &nbsp;&nbsp;Add New :</label></th>
			<td>
				<input id="add_new_media_name" type="text" name="hb_wordpress_menus_name_default[add_new_media_name]" value="<?php echo stripslashes($settings['add_new_media_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>					
		
		<tr valign="top">		
			<th scope="row"><label for="links_name">Links :</label></th>
			<td>
				<input id="links_name" type="text" name="hb_wordpress_menus_name_default[links_name]" value="<?php echo stripslashes($settings['links_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>				
		
		<tr valign="top">		
			<th scope="row"><label for="all_links_name">&nbsp; &nbsp;&nbsp;All Links :</label></th>
			<td>
				<input id="all_links_name" type="text" name="hb_wordpress_menus_name_default[all_links_name]" value="<?php echo stripslashes($settings['all_links_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>				
		
		<tr valign="top">		
			<th scope="row"><label for="add_new_links_name">&nbsp; &nbsp;&nbsp;Add New :</label></th>
			<td>
				<input id="add_new_links_name" type="text" name="hb_wordpress_menus_name_default[add_new_links_name]" value="<?php echo stripslashes($settings['add_new_links_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>				
		
		<tr valign="top">		
			<th scope="row"><label for="add_link_category_name">&nbsp; &nbsp;&nbsp;Link Categories :</label></th>
			<td>
				<input id="add_link_category_name" type="text" name="hb_wordpress_menus_name_default[add_link_category_name]" value="<?php echo stripslashes($settings['add_link_category_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="pages_name">Pages :</label></th>
			<td>
				<input id="pages_name" type="text" name="hb_wordpress_menus_name_default[pages_name]" value="<?php echo stripslashes($settings['pages_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>				
		
		<tr valign="top">		
			<th scope="row"><label for="all_pages_name">&nbsp; &nbsp;&nbsp;All Pages :</label></th>
			<td>
				<input id="all_pages_name" type="text" name="hb_wordpress_menus_name_default[all_pages_name]" value="<?php echo stripslashes($settings['all_pages_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="add_new_page_name">&nbsp; &nbsp;&nbsp;Add New :</label></th>
			<td>
				<input id="add_new_page_name" type="text" name="hb_wordpress_menus_name_default[add_new_page_name]" value="<?php echo stripslashes($settings['add_new_page_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>				
		
		<tr valign="top">		
			<th scope="row"><label for="comments_name">Comments :</label></th>
			<td>
				<input id="comments_name" type="text" name="hb_wordpress_menus_name_default[comments_name]" value="<?php echo stripslashes($settings['comments_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="allcomments_name">&nbsp; &nbsp;&nbsp;All Comments :</label></th>
			<td>
				<input id="allcomments_name" type="text" name="hb_wordpress_menus_name_default[allcomments_name]" value="<?php echo stripslashes($settings['allcomments_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>		
		
		<tr valign="top">		
			<th scope="row"><label for="appearance_name">Appearance :</label></th>
			<td>
				<input id="appearance_name" type="text" name="hb_wordpress_menus_name_default[appearance_name]" value="<?php echo stripslashes($settings['appearance_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="themes_name">&nbsp; &nbsp;&nbsp;Themes :</label></th>
			<td>
				<input id="themes_name" type="text" name="hb_wordpress_menus_name_default[themes_name]" value="<?php echo stripslashes($settings['themes_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="customize_name">&nbsp; &nbsp;&nbsp;Customize :</label></th>
			<td>
				<input id="customize_name" type="text" name="hb_wordpress_menus_name_default[customize_name]" value="<?php echo stripslashes($settings['customize_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="widgets_name">&nbsp; &nbsp;&nbsp;Widgets :</label></th>
			<td>
				<input id="widgets_name" type="text" name="hb_wordpress_menus_name_default[widgets_name]" value="<?php echo stripslashes($settings['widgets_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>						
		
		<tr valign="top">		
			<th scope="row"><label for="menus_name">&nbsp; &nbsp;&nbsp;Menus :</label></th>
			<td>
				<input id="menus_name" type="text" name="hb_wordpress_menus_name_default[menus_name]" value="<?php echo stripslashes($settings['menus_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="theme_editor_name">&nbsp; &nbsp;&nbsp;Editor :</label></th>
			<td>
				<input id="theme_editor_name" type="text" name="hb_wordpress_menus_name_default[theme_editor_name]" value="<?php echo stripslashes($settings['theme_editor_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>				
		
		<tr valign="top">		
			<th scope="row"><label for="plugins_name">Plugins :</label></th>
			<td>
				<input id="plugins_name" type="text" name="hb_wordpress_menus_name_default[plugins_name]" value="<?php echo stripslashes($settings['plugins_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="installed_plugins_name">&nbsp; &nbsp;&nbsp;Installed Plugins :</label></th>
			<td>
				<input id="installed_plugins_name" type="text" name="hb_wordpress_menus_name_default[installed_plugins_name]" value="<?php echo stripslashes($settings['installed_plugins_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>		
		
		<tr valign="top">		
			<th scope="row"><label for="add_new_plugins_name">&nbsp; &nbsp;&nbsp;Add New :</label></th>
			<td>
				<input id="add_new_plugins_name" type="text" name="hb_wordpress_menus_name_default[add_new_plugins_name]" value="<?php echo stripslashes($settings['add_new_plugins_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="plugins_editor_name">&nbsp; &nbsp;&nbsp;Editor :</label></th>
			<td>
				<input id="plugins_editor_name" type="text" name="hb_wordpress_menus_name_default[plugins_editor_name]" value="<?php echo stripslashes($settings['plugins_editor_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="users_name">Users :</label></th>
			<td>
				<input id="users_name" type="text" name="hb_wordpress_menus_name_default[users_name]" value="<?php echo stripslashes($settings['users_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>				
		
		<tr valign="top">		
			<th scope="row"><label for="allusers_name">&nbsp; &nbsp;&nbsp;All Users :</label></th>
			<td>
				<input id="allusers_name" type="text" name="hb_wordpress_menus_name_default[allusers_name]" value="<?php echo stripslashes($settings['allusers_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="add_newusers_name">&nbsp; &nbsp;&nbsp;Add New :</label></th>
			<td>
				<input id="add_newusers_name" type="text" name="hb_wordpress_menus_name_default[add_newusers_name]" value="<?php echo stripslashes($settings['add_newusers_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="your_profile_name">&nbsp; &nbsp;&nbsp;Your Profile :</label></th>
			<td>
				<input id="your_profile_name" type="text" name="hb_wordpress_menus_name_default[your_profile_name]" value="<?php echo stripslashes($settings['your_profile_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="tools_name">Tools :</label></th>
			<td>
				<input id="tools_name" type="text" name="hb_wordpress_menus_name_default[tools_name]" value="<?php echo stripslashes($settings['tools_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="available_tools_name">&nbsp; &nbsp;&nbsp;Available Tools :</label></th>
			<td>
				<input id="available_tools_name" type="text" name="hb_wordpress_menus_name_default[available_tools_name]" value="<?php echo stripslashes($settings['available_tools_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>		
		
		<tr valign="top">		
			<th scope="row"><label for="import_name">&nbsp; &nbsp;&nbsp;Import :</label></th>
			<td>
				<input id="import_name" type="text" name="hb_wordpress_menus_name_default[import_name]" value="<?php echo stripslashes($settings['import_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="export_name">&nbsp; &nbsp;&nbsp;Export :</label></th>
			<td>
				<input id="export_name" type="text" name="hb_wordpress_menus_name_default[export_name]" value="<?php echo stripslashes($settings['export_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="settings_name">Settings :</label></th>
			<td>
				<input id="settings_name" type="text" name="hb_wordpress_menus_name_default[settings_name]" value="<?php echo stripslashes($settings['settings_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="general_name">&nbsp; &nbsp;&nbsp;General :</label></th>
			<td>
				<input id="general_name" type="text" name="hb_wordpress_menus_name_default[general_name]" value="<?php echo stripslashes($settings['general_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="writing_name">&nbsp; &nbsp;&nbsp;Writing :</label></th>
			<td>
				<input id="writing_name" type="text" name="hb_wordpress_menus_name_default[writing_name]" value="<?php echo stripslashes($settings['writing_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>		
		
		<tr valign="top">		
			<th scope="row"><label for="readng_name">&nbsp; &nbsp;&nbsp;Reading :</label></th>
			<td>
				<input id="readng_name" type="text" name="hb_wordpress_menus_name_default[readng_name]" value="<?php echo stripslashes($settings['readng_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="discustion_name">&nbsp; &nbsp;&nbsp;Discussion :</label></th>
			<td>
				<input id="discustion_name" type="text" name="hb_wordpress_menus_name_default[discustion_name]" value="<?php echo stripslashes($settings['discustion_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>			
		
		<tr valign="top">		
			<th scope="row"><label for="media_setting_name">&nbsp; &nbsp;&nbsp;Media :</label></th>
			<td>
				<input id="media_setting_name" type="text" name="hb_wordpress_menus_name_default[media_setting_name]" value="<?php echo stripslashes($settings['media_setting_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>		
		
		<tr valign="top">		
			<th scope="row"><label for="privacy_name">&nbsp; &nbsp;&nbsp;Privacy :</label></th>
			<td>
				<input id="privacy_name" type="text" name="hb_wordpress_menus_name_default[privacy_name]" value="<?php echo stripslashes($settings['privacy_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>		
		
		<tr valign="top">		
			<th scope="row"><label for="permalinks_name">&nbsp; &nbsp;&nbsp;Permalinks :</label></th>
			<td>
				<input id="permalinks_name" type="text" name="hb_wordpress_menus_name_default[permalinks_name]" value="<?php echo stripslashes($settings['permalinks_name']); ?>" /><p class="description">Please put your desire name.</p>
			</td>
		</tr>				
						
	</table>

	<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>
	</form>

	</div>

	<?php

}

function bh_wordpress_dashboard_validate_options( $input ) {
	global $hb_wordpress_menus_name_default;

	$settings = get_option( 'hb_wordpress_menus_name_default', $hb_wordpress_menus_name_default );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS

	$input['dashboard_name'] = wp_filter_post_kses( $input['dashboard_name'] );
	$input['home_name'] = wp_filter_post_kses( $input['home_name'] );
	$input['update_name'] = wp_filter_post_kses( $input['update_name'] );
	$input['posts_name'] = wp_filter_post_kses( $input['posts_name'] );
	$input['allposts_name'] = wp_filter_post_kses( $input['allposts_name'] );
	$input['add_new_posts_name'] = wp_filter_post_kses( $input['add_new_posts_name'] );
	$input['categories_name'] = wp_filter_post_kses( $input['categories_name'] );
	$input['tags_name'] = wp_filter_post_kses( $input['tags_name'] );
	$input['media_name'] = wp_filter_post_kses( $input['media_name'] );
	$input['library_name'] = wp_filter_post_kses( $input['library_name'] );
	$input['add_new_media_name'] = wp_filter_post_kses( $input['add_new_media_name'] );
	$input['links_name'] = wp_filter_post_kses( $input['links_name'] );
	$input['all_links_name'] = wp_filter_post_kses( $input['all_links_name'] );
	$input['add_new_links_name'] = wp_filter_post_kses( $input['add_new_links_name'] );
	$input['add_link_category_name'] = wp_filter_post_kses( $input['add_link_category_name'] );
	$input['pages_name'] = wp_filter_post_kses( $input['pages_name'] );
	$input['all_pages_name'] = wp_filter_post_kses( $input['all_pages_name'] );
	$input['add_new_page_name'] = wp_filter_post_kses( $input['add_new_page_name'] );
	$input['comments_name'] = wp_filter_post_kses( $input['comments_name'] );
	$input['allcomments_name'] = wp_filter_post_kses( $input['allcomments_name'] );
	$input['appearance_name'] = wp_filter_post_kses( $input['appearance_name'] );
	$input['themes_name'] = wp_filter_post_kses( $input['themes_name'] );
	$input['customize_name'] = wp_filter_post_kses( $input['customize_name'] );
	$input['widgets_name'] = wp_filter_post_kses( $input['widgets_name'] );
	$input['menus_name'] = wp_filter_post_kses( $input['menus_name'] );
	$input['theme_editor_name'] = wp_filter_post_kses( $input['theme_editor_name'] );
	$input['plugins_name'] = wp_filter_post_kses( $input['plugins_name'] );
	$input['installed_plugins_name'] = wp_filter_post_kses( $input['installed_plugins_name'] );
	$input['add_new_plugins_name'] = wp_filter_post_kses( $input['add_new_plugins_name'] );
	$input['plugins_editor_name'] = wp_filter_post_kses( $input['plugins_editor_name'] );
	$input['users_name'] = wp_filter_post_kses( $input['users_name'] );
	$input['allusers_name'] = wp_filter_post_kses( $input['allusers_name'] );
	$input['add_newusers_name'] = wp_filter_post_kses( $input['add_newusers_name'] );
	$input['your_profile_name'] = wp_filter_post_kses( $input['your_profile_name'] );
	$input['tools_name'] = wp_filter_post_kses( $input['tools_name'] );
	$input['available_tools_name'] = wp_filter_post_kses( $input['available_tools_name'] );
	$input['import_name'] = wp_filter_post_kses( $input['import_name'] );
	$input['export_name'] = wp_filter_post_kses( $input['export_name'] );
	$input['settings_name'] = wp_filter_post_kses( $input['settings_name'] );
	$input['general_name'] = wp_filter_post_kses( $input['general_name'] );
	$input['writing_name'] = wp_filter_post_kses( $input['writing_name'] );
	$input['readng_name'] = wp_filter_post_kses( $input['readng_name'] );
	$input['discustion_name'] = wp_filter_post_kses( $input['discustion_name'] );
	$input['media_setting_name'] = wp_filter_post_kses( $input['media_setting_name'] );
	$input['privacy_name'] = wp_filter_post_kses( $input['privacy_name'] );
	$input['permalinks_name'] = wp_filter_post_kses( $input['permalinks_name'] );

		
	return $input;
}

endif;  // EndIf is_admin() 


echo $bh_bh_wordpress_dashboard_rename_settings;
// Adding WordPress dashboard options edit admin menus
function bh_wp_dashboard_edit_admin_menus(){ 
global $hb_wordpress_menus_name_default; $bh_bh_wordpress_dashboard_rename_settings = get_option( 'hb_wordpress_menus_name_default', $hb_wordpress_menus_name_default ); 		
global $menu;
global $submenu;

$menu[2][0] = $bh_bh_wordpress_dashboard_rename_settings['dashboard_name']; 
$submenu['index.php'][0][0] = $bh_bh_wordpress_dashboard_rename_settings['home_name']; 
$submenu['index.php'][10][0] = $bh_bh_wordpress_dashboard_rename_settings['update_name']; 
$menu[5][0] = $bh_bh_wordpress_dashboard_rename_settings['posts_name'];
$submenu['edit.php'][5][0] = $bh_bh_wordpress_dashboard_rename_settings['allposts_name']; 
$submenu['edit.php'][10][0] = $bh_bh_wordpress_dashboard_rename_settings['add_new_posts_name']; 
$submenu['edit.php'][15][0] = $bh_bh_wordpress_dashboard_rename_settings['categories_name']; 
$submenu['edit.php'][16][0] = $bh_bh_wordpress_dashboard_rename_settings['tags_name']; 
$menu[10][0] = $bh_bh_wordpress_dashboard_rename_settings['media_name'];
$submenu['upload.php'][5][0] = $bh_bh_wordpress_dashboard_rename_settings['library_name']; 
$submenu['upload.php'][10][0] = $bh_bh_wordpress_dashboard_rename_settings['add_new_media_name']; 
$menu[15][0] = $bh_bh_wordpress_dashboard_rename_settings['links_name'];
$submenu['link-manager.php'][5][0] = $bh_bh_wordpress_dashboard_rename_settings['all_links_name']; 
$submenu['link-manager.php'][10][0] = $bh_bh_wordpress_dashboard_rename_settings['add_new_links_name']; 
$submenu['link-manager.php'][15][0] = $bh_bh_wordpress_dashboard_rename_settings['add_link_category_name']; 
$menu[20][0] = $bh_bh_wordpress_dashboard_rename_settings['pages_name'];
$submenu['edit.php?post_type=page'][5][0] = $bh_bh_wordpress_dashboard_rename_settings['all_pages_name']; 
$submenu['edit.php?post_type=page'][10][0] = $bh_bh_wordpress_dashboard_rename_settings['add_new_page_name']; 
$menu[25][0] = $bh_bh_wordpress_dashboard_rename_settings['comments_name'];
$menu[60][0] = $bh_bh_wordpress_dashboard_rename_settings['appearance_name'];
$submenu['themes.php'][5][0] = $bh_bh_wordpress_dashboard_rename_settings['themes_name']; 
$submenu['themes.php'][6][0] = $bh_bh_wordpress_dashboard_rename_settings['customize_name']; 
$submenu['themes.php'][7][0] = $bh_bh_wordpress_dashboard_rename_settings['widgets_name']; 
$submenu['themes.php'][10][0] = $bh_bh_wordpress_dashboard_rename_settings['menus_name']; 
$menu[65][0] = $bh_bh_wordpress_dashboard_rename_settings['plugins_name'];
$submenu['plugins.php'][5][0] = $bh_bh_wordpress_dashboard_rename_settings['installed_plugins_name']; 
$submenu['plugins.php'][10][0] = $bh_bh_wordpress_dashboard_rename_settings['add_new_plugins_name']; 
$submenu['plugins.php'][15][0] = $bh_bh_wordpress_dashboard_rename_settings['plugins_editor_name']; 
$menu[70][0] = $bh_bh_wordpress_dashboard_rename_settings['users_name'];
$submenu['users.php'][5][0] = $bh_bh_wordpress_dashboard_rename_settings['allusers_name']; 
$submenu['users.php'][10][0] = $bh_bh_wordpress_dashboard_rename_settings['add_newusers_name']; 
$submenu['users.php'][15][0] = $bh_bh_wordpress_dashboard_rename_settings['your_profile_name']; 
$menu[75][0] = $bh_bh_wordpress_dashboard_rename_settings['tools_name'];
$submenu['tools.php'][5][0] = $bh_bh_wordpress_dashboard_rename_settings['available_tools_name']; 
$submenu['tools.php'][10][0] = $bh_bh_wordpress_dashboard_rename_settings['import_name']; 
$submenu['tools.php'][15][0] = $bh_bh_wordpress_dashboard_rename_settings['export_name']; 
$menu[80][0] = $bh_bh_wordpress_dashboard_rename_settings['settings_name'];
$submenu['options-general.php'][10][0] = $bh_bh_wordpress_dashboard_rename_settings['general_name']; 
$submenu['options-general.php'][15][0] = $bh_bh_wordpress_dashboard_rename_settings['writing_name']; 
$submenu['options-general.php'][20][0] = $bh_bh_wordpress_dashboard_rename_settings['readng_name']; 
$submenu['options-general.php'][25][0] = $bh_bh_wordpress_dashboard_rename_settings['discustion_name']; 
$submenu['options-general.php'][30][0] = $bh_bh_wordpress_dashboard_rename_settings['media_setting_name']; 
$submenu['options-general.php'][35][0] = $bh_bh_wordpress_dashboard_rename_settings['privacy_name']; 
$submenu['options-general.php'][40][0] = $bh_bh_wordpress_dashboard_rename_settings['permalinks_name']; 
}
add_action('admin_menu' , 'bh_wp_dashboard_edit_admin_menus');