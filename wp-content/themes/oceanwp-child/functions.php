<?php

use PHPMailer\PHPMailer\PHPMailer;

//creation theme enfant et heritage deu theme parent qui est oceanwp
function oceanwp_child_enqueue_parent_style() {
// obtenir la version du theme parent, (browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	// ajout style css pour creer theme enfant
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );

//ajout d'un fichier css dans notre theme enfant
add_action( 'wp_enqueue_scripts', 'my_plugin_add_stylesheet' );
function my_plugin_add_stylesheet() {
    wp_enqueue_style( 'my-style', get_stylesheet_directory_uri() . '/formulaireContact.css', false, '1.0', 'all' );
   /* wp_enqueue_style( 'my-second-style', get_stylesheet_directory_uri() . '/assets/css/style.css',  array( 'oceanwp-style' ), '1.0');
    wp_enqueue_style( 'my-third-style', get_stylesheet_directory_uri() . '/assets/css/style.min.css',  array( 'oceanwp-style' ), '1.0');*/
}


//traiter le formulaire
    function traitement_formulaire(){

        if (isset( $_POST['formenvoi'] ) ) { 

            @$nom = sanitize_text_field( $_POST['nom'] );
            @$telephone = intval( $_POST['telephone'] );
            @$mail = sanitize_email( $_POST['mail'] );
            @$adresse = sanitize_text_field( $_POST['adresse'] );
            @$ville = sanitize_text_field( $_POST['ville'] );
            @$codepostal = intval( $_POST['codepostal'] );
            @$mess = sanitize_textarea_field( $_POST['message'] );
            @$file_name=$_FILES['file']['tmp_name'];
            @$file_type=$_FILES['file']['type'];
            $countfiles = count($file_name);
          
       
        #This variable will be used when declaring the "boundaries"
        #for the different sections of the email
        $boundary = md5(date('r', time()));
    
        #Initial Headers 
        $headers = "MIME-Version: 1.0\r\n"; // <- the "\r\n" indicate a carriage return and newline, respectively
        $headers .= "From: <dilipagarwal142kk@gmail.com>\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=" . $boundary . "\r\n"; 
        # This is saying the there will be more than one (a "mix") of Content Types in this email.
        # The "boundary" value will indicate when each content type will start
    
    #First Content Type
     
        $message = "\r\n\r\n--" . $boundary . "\r\n"; 
        # This indicates that I'm going to start
        # declaring headers specific to this section of the email. 
        # MAKE SURE there's only ONE(1) "\r\n" between the above boundry and the first header below (Content-Type)
        $message .= "Content-type: text/html; charset=\"iso-8859-1\"\r\n";
        # Here I'm saying this content should be plain text
        $message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    
        # Body of the email for the headers I just declared
        $txt = "<h1 style='color:red;font-size:18px;text-align:center;'>tu as recu un email de mr ou mme : <span style='color:blue;'>".$nom. "</span></h1><br>";
        $txt .= "<h3 style='text-decoration:underline;'>Infos concernant " .$nom. "</h3><br>";
        $txt .= "<ul style='list-style:none;'>";
        $txt .= " <li>ville : ".$ville. " </li>";
        $txt .= " <li> code postal : ".$codepostal. "</li>";
        $txt .= " <li> adresse : ".$adresse. "</li>";
        $txt .= " <li>telephone : " .$telephone. "</li>";
        $txt .= " <li>mail : ".$mail. "</li><br>";
        $txt .= " <h3 style='text-decoration:underline;'>son message : </h3><br>";
        $txt .= "<p style='font-style:italic;'>".$mess. "</p>";

        $message .= $txt."\r\n";
       
     
    
    #Second Content Type
    //besoin de boucler pour recuperer plusieurs fichiers si besoin
    for($i=0;$i< $countfiles;$i++){
        $message .= "\r\n\r\n--" . $boundary . "\r\n"; 
        # This idicates that I'm going to start 
        # declaring some more headers for the content beslow
        # MAKE SURE there's only ONE(1) "\r\n" between the above boundry and the first header below (Content-Type)
        

        $message .= "Content-type:".$_FILES['file']['type'][$i]."\r\n"; # <- Here I'm saying that this Content Type is for a JPEG image
        $message .= "Content-Transfer-Encoding: base64\r\n"; # <- this is saying that this section's content will be base64 Encoded
        $message .= "Content-Disposition: attachment; filename=".$_FILES['file']['tmp_name'][$i]."\r\n"; 
        # This is saying the content below should be an attachment and gives it a file name
    
        # The base64_encode below is necessary because this is a file. 
        $message .= base64_encode(file_get_contents($_FILES['file']['tmp_name'][$i])); 

    }
        $message .= "\r\n\r\n--" . $boundary . "--"; 
        # This indicates the end of the boundries. Notice the additional "--" after the boundry's value.
    
        $to = 'kevin.prevost69@gmail.com';
        $subject = 'contact glacever';
        
        if(mail($to, $subject, $message, $headers)){
            echo '<p id="success">Votre message a été envoyé avec succès</p>';
        }else{
            echo '<p id="echec">Echec d\'envoi, votre message n\'a pas été envoyé !!!</p>';
        }

    }

}
