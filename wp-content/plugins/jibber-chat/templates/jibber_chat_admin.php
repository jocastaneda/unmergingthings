<div class="wrap">
    <h1>Jibber Chat Settings</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
		
		<?php
			settings_fields( 'jibberchat_options_group' );

            // Post the slug of the page
			do_settings_sections( 'jibber_chat' );
			?>
			<h4>INSTRUCTIONS</h4>
			<div class="intro">To link your Jibber Chat account to your Wordpress site, please enter the Company ID found in your registration e-mail and press "Save Changes".</div>
			<div>If you don't have a Company ID feel free to register for a 14-day trial period at the <a href="https://jibber.social/">Jibber</a> homepage.</div> 
			<br>
			<h4>Not registered yet? <a href="https://jibber.social/">Sign up for FREE!</a></h4>
			<div>Please read the <a href="https://jibber.social/terms"><b>Terms and Conditions</b></a> before using the Jibber Chat service.</div>
			
			<br>
			<div><b>P.S</b> Take a sneak peak by testing our demo chat. Just enter <b>"29"</b> as Company ID.</div>
			<?php
			submit_button();
        ?>
	</form>
</div>