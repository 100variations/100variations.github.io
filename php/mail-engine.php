<?php

$GalleryID = Trim(stripslashes($_POST['gallery']));

$EmailFrom = "do_not_reply@columbusdesignbiennial.org";
$EmailTo   = "";
$Subject = "A request for an edition of 100 Variations | Jonathan Nesci";

switch($GalleryID){
	case "A":
		$EmailTo = "john@3st.com";
		break;
		
	case "B":
		$EmailTo = "john@3st.com,magda@3st.com";
		break;
		
	case "C":
		$EmailTo = "john@3st.com,baozhen@3st.com";	
		break;
}


$Name = Trim(stripslashes($_POST['name'])); 
$Tel = Trim(stripslashes($_POST['tel'])); 
$Email = Trim(stripslashes($_POST['email'])); 
$Message = Trim(stripslashes($_POST['message'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "No Validation.";
  exit;
}

// prepare email body text
$Body = "A visitor to our website is writing to request more information about the 100 Variations edition by artist Jonathan Nesci. This is an automated note from columbusbiennial.org";
$Body .= "\n\n";
$Body .= "-----\n\n";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Tel: ";
$Body .= $Tel;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 
if ($EmailTo != ""){
	$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

	// redirect to success page 
	if ($success){
	  print "<meta http-equiv=\"refresh\" content=\"0;URL=/confirmation.html\">";
	}
	else{
	  print "Error.";
	}

} else {
	print "No Email Specified.";
}


?>