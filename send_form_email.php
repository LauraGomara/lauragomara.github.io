<?php
if((isset($_POST['email'])) && (empty($_POST['your_fax']))){

 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "lauragomarapanadero@gmail.com";
    
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
       
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $message = $_POST['message']; // required
   
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($message) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Mensaje de formulario web:\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    
    $email_message .= "First Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n"; 
   
 
// create email headers
$headers = 'De: '.$email_from."\r\n".
'Contestar a: '.$email_from."\r\n\n\n" .
'Mensaje: '.$message."\r\n\n\n" .
'Bicho PHP que te lo entrega: ' . phpversion();


mail($email_to, $email_message, $headers);  


?>
 





<!-- include your own success html here -->
 

<html>
	<head>
		<title>Laura Gomara</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<meta name="description" content="Laura Gomara">
  		<meta name="keywords" content="Laura Gomara, novela negra, escritura, escritura creativa, libros, cursos escritura, premios escritores">
  		<meta name="author" content="Laura Gomara">
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel=”canonical” href=”http://www.lauragomara.com"/>

	</head>
	
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">
					<div class="container">

						<!-- Logo -->
							<h1 id="logo"><a href="index.html">Laura Gomara</a></h1>
							<p>Escritora y profesora de escritura creativa.</p>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									
									<li>
										<a href="index.html" class="icon fa-home"><span>Quién soy</span></a>	
									</li>
									<li><a class="icon fa-book" href="novelas.html"><span>Novelas </span></a>
										<ul>
											<li><a href="#">Vienen mal dadas</a></li>
										</ul>
										</li>
									<li><a class="icon fa-graduation-cap" href="cursos.html"><span>Cursos</span></a></li>
									<li><a class="icon fa-pencil" href="reescritura.html"><span>Reescritura</span></a></li>
									<li><a class="icon fa-bolt" href="mecenazgo.html"><span>Mecenazgo</span></a></li>
									<li><a class="icon fa-envelope" href="contacto.html"><span>Contacto</span></a></li>
									<li class="icon fa-twitter" href="https://twitter.com/lauraromea"> </li>
									<li class="icon fa-instagram" href="https://twitter.com/lauraromea"> </li>
									<li class="icon fa-facebook" href="https://twitter.com/lauraromea"> </li>
								</ul>
							</nav>

					</div>
				</section>

			<!-- Main -->
							

				<section id="gracias">
					

					<div class="row aln-center">
						<header>
							<h2>Mesaje enviado</h2>
							<h1>Gracias</h1>
						</header>
					</div>	


				
				</section>

			<!-- Footer -->
				<section id="footer">
					
					<div id="copyright" class="container">
						<ul class="links">
							<li>&copy; Laura Gomara 2019. Todos los derechos reservados.</li><li>Template: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				</section>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html> 
<?php
 
}
?>