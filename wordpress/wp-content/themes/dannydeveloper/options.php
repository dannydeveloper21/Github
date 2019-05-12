<?php
$themename ="Danny Developer";
$shortname ="plt";
$options = array(
    array("name" => $themename." Options",
          "type" => "title"),          
    array("type" => "open"),    
    array("name" => "Logo URL",
          "desc" => "Enter the link to your logo image",
          "id" => $shortname."_logo",
          "type" => "text",
          "std" => ""),    
    array("name" => "Google Analytics Code",
          "id" => $shortname."_ga_code",
          "desc" => "Paste your Analytics or other tracking code in this box",
          "type" => "textarea",
          "std" => ""),    
    array("name" => "Linkedin Profile",
          "desc" => "Enter your Linkedin Profile here",
          "id" => $shortname."_feedburner",
          "type" => "text",
          "std" => get_bloginfo('rss2_url')),    
    array("name" => "Twitter ID",
          "desc" => "Enter your Twitter ID example: @username",
          "id" => $shortname."_twitterid",
          "type" => "text",
          "std" => ""),    
    array("name" => "Facebook Page",
          "desc" => "Enter your Facebook Page link, <strong>with http://</strong>",
          "id" => $shortname."_facebookid",
          "type" => "text",
          "std" => ""),
    array("name" => "Github Page",
          "desc" => "Enter your Github Page link, <strong>with http://</strong>",
          "id" => $shortname."_githubid",
          "type" => "text",
          "std" => ""),  
    array("type" => " close"));

     /**
	 * Creates the open and close table.
	 *
	 * @return void
	 */
		
	function create_open() { echo '<table width="100%" border="0" style="background-color:#F9F9F9; padding:10px;">'; }
    function create_close() { echo '</table><br/>'; }

	/**
	 * Creates the Section title.
	 *
	 * @param $value
	 * @return void
	 */
    function create_title($value) {	 
		echo '<table width="100%" border="0" style="background-color:#F9F9F9; padding:5px 10px;"><tr>
		<td colspan="2"><h3 style="font-family:Helvetica,arial,sans-serif;">'.$value['name'].'</h3></td>
		</tr>';
		
	 }

    /**
	 * Creates fields.
	 *
	 * @param $value
	 * @return void
	 */

	function create_text_field($value) { 
		echo '<tr><td width="20%" rowspan="2" valign="middle"><strong>'.$value['name'].'</strong></td>
		<td width="80%"><input style="width:400px;" type="'.$value['type'].'" id="'.$value['id'].'" value="'.$value['std'].'" name="'.$value['id'].'"/>
		</td></tr>
		<tr><td><small>'.$value['desc'].'</small></td></tr>
		<tr><td colspan="2" style="margin-bottom:5px; border-bottom:1px solid #ccc">&nbsp;</td></tr>';
	}
	
	function create_textarea_field($value) { 
		echo '<tr><td width="20%" rowspan="2" valign="middle"><strong>'.$value['name'].'</strong></td>
		<td width="80%"><textarea style="width:400px; height:200px;" type="'.$value['type'].'" id="'.$value['id'].'" name="'.$value['id'].'"/>
		</textarea>
		</td></tr>
		<tr><td><small>'.$value['desc'].'</small></td></tr>
		<tr><td colspan="2" style="margin-bottom:5px; border-bottom:1px solid #ccc">&nbsp;</td>
		</tr>';
	 }
	
	function create_select_field($value) { 
		echo '<tr><td width="20%" rowspan="2" valign="middle"><strong>'.$value['name'].'</strong></td>
		<td width="80%"><select style="width:240px;" type="'.$value['type'].'" id="'.$value['id'].'" name="'.$value['id'].'"/>
		</select>
		</td></tr>
		<tr><td><small>'.$value['desc'].'</small></td></tr>
		<tr><td colspan="2" style="margin-bottom:5px; border-bottom:1px solid #ccc">&nbsp;</td>
		</tr>';
	 }
	
    function dannydeveloper_add_admin(){
        global $themename, $shortname, $options;
        if ($_GET['page'] == basename(__FILE__)) {
            if ('save' == $_REQUEST['action']) {
                foreach ($options as $value) {
                    update_option($value['id'], $_REQUEST[$value['id']]);
                }

                foreach ($options as $value) {
                    if (isset($_REQUEST[$value['id']])) {
                        update_option($value['id'], $_REQUEST[$value['id']]);
                    }else{
                        delete_option($value['id']);                        
                    }
                }
                header("Location: themes.php?page=options.php&saved=true");
                die;
            }
            else if ('reset' == $_REQUEST['action']) {
                foreach ($options as $value) {
                    delete_option($value['id']);
                }
                header("Location: themes.php?page=options.php&reset=true");
                die;
            }
        }
        add_theme_page($themename." Options","Options", 'edit_themes', basename(__FILE__), 'dannydeveloper_admin');
	}
	
	
	function dannydeveloper_add_init(){
		$file_dir=get_bloginfo('template_directory');
		wp_enqueue_style("functions",$file_dir."/functions/functions.css",false,"1.0","all");
	}

    function dannydeveloper_admin() { 
        global $themename, $shortname, $options;
     
        if ($_REQUEST['saved']) {
            echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved for this page.</strong></p></div>';
        }
        if ($_REQUEST['reset']) {
            echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
        }
        ?>
    <div class="wrap">
        <h1><?php echo $themename; ?> Settings</h1>
        <div class="mnt-options">
			<form method="post">
			<?php foreach ($options as $value) {
				switch($value['type']){
					case 'open':
						create_open();
					break;
					case 'title':
						create_title($value);
					break;
					case 'text':
					create_text_field($value);
					break;
					case 'textarea':
					create_textarea_field($value);
					break;
					case 'close':
						create_close();
					break;
				}
			}?>
				<p class="submit">
					<input type="submit" value="Save changes" name="save" class="button button-primary"/>
					<input type="hidden" name="action" value="save"/>
				</p>
			</form>
			<form method="post">
				<p class="submit">
					<input type="submit" value="Reset all " name="reset" class="button"/>
					<input type="hidden" name="action" value="reset"/>
				</p>
			</form>
        </div><!-- mnt-options -->
    </div><!-- wrap -->
	<?php } // end function mynewtheme_admin()
	add_action('admin_menu', 'dannydeveloper_add_admin');   
	add_action('admin_init','dannydeveloper_add_init');
	echo $plt_feedburner;
	
    ?>