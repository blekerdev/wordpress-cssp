<?php
/*
Plugin Name: Contact / Social Slider 
Plugin URI: http://develop.bleker.org/
Description: Plugin by Develop.Bleker (Written by Adrian Berisha)
Version: 1.0
Author: Adrian Berisha
Author URI: http://bleker.org/
Update Server: http://develop.bleker.org/wordpress/updates/
Min WP Version: 1.5
Max WP Version: 4.4.1
*/


add_action('wp_head', 'hello_world');

function hello_world() {
?>
	
<!-- Contact Social Slider Plugin # Start -->	
	<aside class="site-social">
		<ul class="list-unstyled">
			<?php if(esc_attr(get_option('facebook-Show')) == "true"){?>
			<li><a href="<?php echo esc_attr(get_option('facebook-Link')); ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
			<?php } ?>
			<?php if(esc_attr(get_option('youtube-Show')) == "true"){?>
			<li><a href="<?php echo esc_attr(get_option('youtube-Link')); ?>" target="_blank"><i class="fa fa-youtube-square"></i></a></li>
			<?php } ?>

		</ul>
	</aside>
	<aside class="site-service">
		<ul class="list-unstyled">
			<?php if(esc_attr(get_option('Pannenhilfe-Show')) == "true"){?>
			<li>
				<a href="phone:<?php echo esc_attr(get_option('Pannenhilfe-Number')); ?>">
					<img src="wp-content/plugins/cssp-plugin/images/service-1.png" class="service-icon" alt="Pannenhilfe">

					<div class="service-text">
						<h4>Pannenhilfe-Notruf</h4>

						<p><?php echo esc_attr(get_option('Pannenhilfe-Number')); ?></p>
					</div>
				</a>
			</li>
			<?php } ?>
			<?php if(esc_attr(get_option('Werkstatt-Show')) == "true"){?>
			<li>
				<a href="<?php echo esc_attr(get_option('Werkstatt-Link')); ?>">
					<img src="wp-content/plugins/cssp-plugin/images/service-2.png" class="service-icon" alt="Werkstatt">

					<div class="service-text">
						<h4>Werkstatt-Termin</h4>

						<p>hier vereinbaren</p>
					</div>
				</a>
			</li>
			<?php } ?>
			<?php if(esc_attr(get_option('Probefahrt-Show')) == "true"){?>
			<li>
				<a href="<?php echo esc_attr(get_option('Probefahrt-Number')); ?>">
					<img src="wp-content/plugins/cssp-plugin/images/service-3.png" class="service-icon" alt="Probefahrt">

					<div class="service-text">
						<h4>Probefahrt</h4>

						<p>hier vereinbaren</p>
					</div>
				</a>
			</li>
			<?php } ?>
			<?php if(esc_attr(get_option('Broschueren-Show')) == "true"){?>
			<li>
				<a href="<?php echo esc_attr(get_option('Broschueren-Number')); ?>">
					<img src="wp-content/plugins/cssp-plugin/images/service-4.png" class="service-icon" alt="Broschüren">

					<div class="service-text">
						<h4>Broschüren</h4>

						<p>hier anfordern</p>
					</div>
				</a>
			</li>
			<?php } ?>
		</ul>
	</aside>
<!-- Contact Social Slider Plugin # Ende -->	

<?php
}


// create custom plugin settings menu
add_action('admin_menu', 'my_cool_plugin_create_menu');

function my_cool_plugin_create_menu() {

	//create new top-level menu
	add_menu_page('Contact / Social Slider Plugin', 'CSSP Einstellungen', 'administrator', __FILE__, 'my_cool_plugin_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_my_cool_plugin_settings' );
}


function register_my_cool_plugin_settings() {
	//register our settings
	register_setting( 'my-cool-plugin-settings-group', 'Pannenhilfe-Number' );
	register_setting( 'my-cool-plugin-settings-group', 'Werkstatt-Link' );
	register_setting( 'my-cool-plugin-settings-group', 'Probefahrt-Link' );
	register_setting( 'my-cool-plugin-settings-group', 'Broschueren-Link' );
	
	register_setting( 'my-cool-plugin-settings-group', 'Pannenhilfe-Show' );
	register_setting( 'my-cool-plugin-settings-group', 'Werkstatt-Show' );
	register_setting( 'my-cool-plugin-settings-group', 'Probefahrt-Show' );
	register_setting( 'my-cool-plugin-settings-group', 'Broschueren-Show' );
	
	register_setting( 'my-cool-plugin-settings-group', 'facebook-Link' );
	register_setting( 'my-cool-plugin-settings-group', 'facebook-Show' );
	register_setting( 'my-cool-plugin-settings-group', 'youtube-Link' );
	register_setting( 'my-cool-plugin-settings-group', 'youtube-Show' );
}

function my_cool_plugin_settings_page() {
?>
<link href="../wp-content/plugins/cssp-plugin/style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://holdirbootstrap.de/dist/js/bootstrap.min.js"></script>
<div class="wrap">
<h2>Contact / Social Slider Plugin</h2>

<hr>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#Pannenhilfe" aria-controls="home" role="tab" data-toggle="tab">Pannenhilfe-Notruf</a></li>
    <li role="presentation"><a href="#Werkstatt" aria-controls="profile" role="tab" data-toggle="tab">Werkstatt-Termin</a></li>
    <li role="presentation"><a href="#Probefahrt" aria-controls="messages" role="tab" data-toggle="tab">Probefahrt-Termin</a></li>
    <li role="presentation"><a href="#Broschueren" aria-controls="settings" role="tab" data-toggle="tab">Broschüren-Anfordern</a></li>
	      <li role="presentation"><a href="#Social" aria-controls="messages" role="tab" data-toggle="tab">Social Media</a></li>
  </ul>
	
<form method="post" action="options.php">
    <?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>	
<div class="panel panel-default">
  <div class="panel-body">
    <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="Pannenhilfe">
		
    <table class="form-table" width="100%">
		<h2><img src="../wp-content/plugins/cssp-plugin/images/service-1.png">Pannenhilfe-Notruf</h2>
        <tr valign="top">
        <th scope="row">Nummer</th>
        <td><input type="text" name="Pannenhilfe-Number" class="form-control" value="<?php echo esc_attr( get_option('Pannenhilfe-Number') ); ?>" /></td>
        </tr>
		 <tr valign="top">
		
        <th scope="row">Auf Desktop Anzeigen</th>
        <td>
			
						
			<? if(esc_attr( get_option('Pannenhilfe-Show') ) == "true"){
					echo'	<select class="form-control" name="Pannenhilfe-Show">
							  <option value="true">Anzeigen</option>
							 <option value="false">Ausbleden</option>
								</select>
							
						';
				}else{
	
					echo'<select class="form-control" name="Pannenhilfe-Show">
								<option value="false">Ausbleden</option>
							  <option value="true">Anzeigen</option>
							 
								</select>
						';
				} ?>
		</td>
        </tr>
    </table>
	
	</div>
    <div role="tabpanel" class="tab-pane" id="Werkstatt">
		<table class="form-table">
		<h2><img src="../wp-content/plugins/cssp-plugin/images/service-2.png">Werkstatt-Termin</h2>
        <tr valign="top">
        <th scope="row">Link</th>
        <td><input type="text" class="form-control" name="Werkstatt-Link" value="<?php echo esc_attr( get_option('Werkstatt-Link') ); ?>" /></td>
        </tr>
		 <tr valign="top">
		
        <th scope="row">Auf Desktop Anzeigen</th>
        <td>
			  			
			<? if(esc_attr( get_option('Werkstatt-Show') ) == "true"){
					echo'	<select class="form-control" name="Werkstatt-Show">
							  <option value="true">Anzeigen</option>
							 <option value="false">Ausbleden</option>
								</select>
							
						';
				}else{
	
					echo'<select class="form-control" name="Werkstatt-Show">
								<option value="false">Ausbleden</option>
							  <option value="true">Anzeigen</option>
							 
								</select>
						';
				} ?>
		</td>
        </tr>
    </table>
	
	</div>
    <div role="tabpanel" class="tab-pane" id="Probefahrt">
	<table class="form-table">
		<h2><img src="../wp-content/plugins/cssp-plugin/images/service-3.png">Probefahrt-Termin</h2>
        <tr valign="top">
        <th scope="row">Link</th>
        <td><input type="text" class="form-control" name="Probefahrt-Link" value="<?php echo esc_attr( get_option('Probefahrt-Link') ); ?>" /></td>
        </tr>
		 <tr valign="top">
		
        <th scope="row">Auf Desktop Anzeigen</th>
        <td>
			  			
			<? if(esc_attr( get_option('Probefahrt-Show') ) == "true"){
					echo'	<select class="form-control" name="Probefahrt-Show">
							  <option value="true">Anzeigen</option>
							 <option value="false">Ausbleden</option>
								</select>
							
						';
				}else{
	
					echo'<select class="form-control" name="Probefahrt-Show">
								<option value="false">Ausbleden</option>
							  <option value="true">Anzeigen</option>
							 
								</select>
						';
				} ?>
		</td>
        </tr>
    </table>
		
	</div>
    <div role="tabpanel" class="tab-pane" id="Broschueren">
	<table class="form-table">
		<h2><img src="../wp-content/plugins/cssp-plugin/images/service-4.png">Broschüren-Anfordern</h2>
        <tr valign="top">
        <th scope="row">Link</th>
        <td><input type="text" class="form-control" name="Broschueren-Link" value="<?php echo esc_attr( get_option('Broschueren-Link') ); ?>" /></td>
        </tr>
		 <tr valign="top">
		
        <th scope="row">Auf Desktop Anzeigen</th>
        <td>
			  			
			<? if(esc_attr( get_option('Broschueren-Show') ) == "true"){
					echo'	<select class="form-control" name="Broschueren-Show">
							  <option value="true">Anzeigen</option>
							 <option value="false">Ausbleden</option>
								</select>
							
						';
				}else{
	
					echo'<select class="form-control" name="Broschueren-Show">
								<option value="false">Ausbleden</option>
							  <option value="true">Anzeigen</option>
							 
								</select>
						';
				} ?>
		</td>
        </tr>
    </table>
    
	</div>
	<div role="tabpanel" class="tab-pane" id="Social">
	<table class="form-table">
		<h2><img src="../wp-content/plugins/cssp-plugin/images/facebook.png" height="50px">Facebook</h2>
        <tr valign="top">
        <th scope="row">Link</th>
        <td><input type="text" class="form-control" name="facebook-Link" value="<?php echo esc_attr( get_option('facebook-Link') ); ?>" />
			 <p class="help-block">Kompletter Facebook-Link z.B: https://www.facebook.com/unternehmensgruppebleker/</p></td>
        </tr>
		 <tr valign="top">
		
        <th scope="row">Auf Desktop Anzeigen</th>
        <td>
			  			
			<? if(esc_attr( get_option('facebook-Show') ) == "true"){
					echo'	<select class="form-control" name="facebook-Show">
							  <option value="true">Anzeigen</option>
							 <option value="false">Ausbleden</option>
								</select>
							
						';
				}else{
	
					echo'<select class="form-control" name="facebook-Show">
								<option value="false">Ausbleden</option>
							  <option value="true">Anzeigen</option>
							 
								</select>
						';
				} ?>
		</td>
        </tr>
    </table><hr>
		
		<table class="form-table">
		<h2><img src="../wp-content/plugins/cssp-plugin/images/youtube.png" height="50px">Youtube</h2>
        <tr valign="top">
        <th scope="row">Link</th>
        <td><input type="text" class="form-control" name="youtube-Link" value="<?php echo esc_attr( get_option('youtube-Link') ); ?>" />
			 <p class="help-block">Kompletter Youtbe-Link z.B: https://www.yotube.com/channel/bleker</p></td>
        </tr>
		 <tr valign="top">
		
        <th scope="row">Auf Desktop Anzeigen</th>
        <td>
			  			
			<? if(esc_attr( get_option('youtube-Show') ) == "true"){
					echo'	<select class="form-control" name="youtube-Show">
							  <option value="true">Anzeigen</option>
							 <option value="false">Ausbleden</option>
								</select>
							
						';
				}else{
	
					echo'<select class="form-control" name="youtube-Show">
								<option value="false">Ausbleden</option>
							  <option value="true">Anzeigen</option>
							 
								</select>
						';
				} ?>
		</td>
        </tr>
    </table>
	</div>
  </div>
  </div>
</div>

    <?php submit_button(); ?>

</form>
</div>
<?php } ?>