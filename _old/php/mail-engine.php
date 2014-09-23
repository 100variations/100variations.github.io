<?php

$EmailFrom = "do_not_reply@columbusdesignbiennial.org";
$EmailTo;
$Subject = "A request for an edition of 100 Variations | Jonathan Nesci";

switch(){
	case "A":
		$EmailTo = "john@3st.com";
		break;
		
	case "B":
		$EmailTo = "magda@3st.com";
		break;
		
	case "C":
		$EmailTo = "baozhen@3st.com";	
		break;
}


$Name = Trim(stripslashes($_POST['name'])); 
$Tel = Trim(stripslashes($_POST['telephone'])); 
$Email = Trim(stripslashes($_POST['email'])); 
$Message = Trim(stripslashes($_POST['comments'])); 
$Company = Trim(stripslashes($_POST['company'])); 	        

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Company: ";
$Body .= $Company;
$Body .= "\n";
$Body .= "Tel: ";
$Body .= $Tel;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
?>