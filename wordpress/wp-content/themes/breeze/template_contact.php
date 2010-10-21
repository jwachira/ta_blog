<?php 
/*
Template Name: Contact Page
*/

global $unisphere_options;

//If the form is submitted
if(isset($_POST['submitted'])) {

	$name = trim($_POST['contact_name']);
	$email = trim($_POST['contact_email']);
	$subject = trim($_POST['contact_subject']);

	if(function_exists('stripslashes')) {
		$message = stripslashes(trim($_POST['contact_message']));
	} else {
		$message = trim($_POST['contact_message']);
	}

	$emailTo = $unisphere_options['destination_email'];

	$subject_email = sprintf( __( 'Contact Form Submission from %s', 'unisphere' ), $name );
	
	$body = __( 'Name' , 'unisphere' ) . ": " . $name . "\n\n" . __( 'Email' , 'unisphere' ) . ": " . $email . "\n\n" . __( 'Subject' , 'unisphere' ) . ": " . $subject . "\n\n" . __( 'Message' , 'unisphere' ) . ": " . $message;
	$headers = 'From: '.$email . "\r\n" . 'Reply-To: ' . $email;
	
	mail($emailTo, $subject_email, $body, $headers);

} else {

get_header(); ?>

	<?php
	 // Get the sub-header from sub-header.php
	 get_template_part( 'sub-header' );
	?>

	<!--BEGIN #container-->
	<div id="container">

		<?php
		 // Get the sub-header footer from sub-header_footer.php
		 get_template_part( 'sub-header_footer' );
		?>

		<!--BEGIN #content-->
		<div id="content" class="page clearfix">

            <!--BEGIN #primary-->
			<div id="primary">
            
            	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>
				
                    <p class="success-sending-message"><?php echo wpml_t( 'unisphere', 'Contact Form Success Message', $unisphere_options['email_success'] ); ?></p>
                    <p class="error-sending-message"><?php echo wpml_t( 'unisphere', 'Contact Form Error Message', $unisphere_options['email_error'] ); ?></p>
    
                    <div id="contact-form">
    
                        <form action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" id="contactForm" method="post">
    
                            <div class="form-section">
                                <p><input type="text" tabindex="3" id="contact_name" name="contact_name" value="<?php if(isset($_POST['contact_name'])) echo $_POST['contact_name'];?>" class="requiredField" /></p>
                                <label for="contact_name"><?php _e( 'Name' , 'unisphere' ) ?></label>
                            </div>
    
                            <div class="form-section">
                                <p><input type="text" tabindex="4" id="contact_email" name="contact_email" value="<?php if(isset($_POST['contact_email']))  echo $_POST['contact_email'];?>" class="requiredField email" /></p>
                                <label for="contact_email"><?php _e( 'Email' , 'unisphere' ) ?></label>                                
                            </div>
    
                            <div class="form-section">
                                <p><input type="text" tabindex="5" id="contact_subject" name="contact_subject" value="<?php if(isset($_POST['contact_subject'])) echo $_POST['contact_subject'];?>" class="requiredField" /></p>
                                <label for="contact_subject"><?php _e( 'Subject' , 'unisphere' ) ?></label>
                            </div>
    
                            <div class="form-section">
                                <p><textarea cols="65" rows="9" tabindex="6" id="contact_message" name="contact_message" class="requiredField"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea></p>
                                <label for="contact_subject" style="display: none;"><?php _e( 'Message' , 'unisphere' ) ?></label>
                            </div>
    
                            <div class="form-section">
                                <button tabindex="7" type="submit" id="unisphere-submit" name="unisphere-submit"><?php _e( 'Send Message' , 'unisphere' ) ?></button>
                                <input type="hidden" name="submitted" id="submitted" value="true" />
                                <span class="sending-message"><?php _e( 'Sending your message...' , 'unisphere' ) ?></span>
                            </div>
    
                        </form>
    
                    </div>
                
				<?php endwhile; ?>

			<!--END #primary-->
			</div>
            
            <?php get_sidebar(); ?>

		<!--END #content-->
		</div>

	<!--END #container-->
	</div>

<?php get_footer(); 
} ?>