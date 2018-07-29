<?php
/* Template Name: Kontakt */
get_header();?>
<div id="primary">
<div id="content" role="main">
<font color="#FF0000">
<?php
if (isset($_POST['submit'])) {
    $flag = 1;
    if ($_POST['kontaktName'] == '') {
        $flag = 0;
        echo "Please Enter Your Name<br>";
    } else if (!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/', $_POST['kontaktName'])) {
        $flag = 0;
        echo "Please Enter Valid Name<br>";
    }
    if ($_POST['email'] == '') {
        $flag = 0;
        echo "Please Enter E-mail<br>";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $flag = 0;
        echo "Please enter a valid email address";
    }

    if ($_POST['message'] == '') {
        $flag = 0;
        echo "Please Enter Message";
    }
    if (empty($_POST)) {
        print 'Sorry, your nonce did not verify.';
        exit;
    } else {
        if ($flag == 1) {
            $name = sanitize_text_field($_POST["kontaktName"]);
            $email = sanitize_email($_POST["email"]);
            $message = esc_textarea($_POST["message"]);

            wp_mail(get_option("admin_email"), $name . " sent you a message from " . get_option("blogname"), $message, "From: " . $email . " <" . $email . ">rnReply-To:" . $email);
            echo "<p style='color:green;'>Mail Successfully Sent</p>";
            echo "<a href ='".get_site_url()."'>Back to Home</a>";
        }
        
    }
}
?>
</font>
<form method="post" id="contactus_form">
Your Name:<input type="text" name="kontaktName" id="kontaktName" rows="1" value="" />
<br /><br />
Your Email:<input type="text" name="email" id="email" rows="1" value="" />
<br /><br />

Leave a Message:<textarea name="message" id="message" ></textarea>
<br /><br />
<input type="submit" name="submit" id="submit" value="Send"/>
</form>
</div><!-- #content --></div><!-- #primary -->
<?php get_footer();?>