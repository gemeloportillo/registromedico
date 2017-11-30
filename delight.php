<?php require_once('dbqueries.php');
/*
 * PHP-Auth (https://github.com/delight-im/PHP-Auth)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */
/*mysql_select_db($dbname_rcpip, $rcpip);
$query_getEnfermera = sprintf("SELECT nombre, siglas FROM Enfermeras WHERE siglas = %s", GetSQLValueString($colname_getEnfermera, "text"));
$getEnfermera = mysql_query($query_getEnfermera, $xoxo) or die(mysql_error());
$row_getEnfermera = mysql_fetch_assoc($getEnfermera);
$totalRows_getEnfermera = mysql_num_rows($getEnfermera);*/


function showDebugData(\Delight\Auth\Auth $auth, $result) {
	echo '<pre>';

	echo 'Last operation' . "\t\t\t\t";
	\var_dump($result);
	echo 'Session ID' . "\t\t\t\t";
	\var_dump(\session_id());
	echo "\n";

	echo '$auth->isLoggedIn()' . "\t\t\t";
	\var_dump($auth->isLoggedIn());
	echo '$auth->check()' . "\t\t\t\t";
	\var_dump($auth->check());
	echo "\n";

	echo '$auth->getUserId()' . "\t\t\t";
	\var_dump($auth->getUserId());
	echo '$auth->id()' . "\t\t\t\t";
	\var_dump($auth->id());
	echo "\n";

	echo '$auth->getEmail()' . "\t\t\t";
	\var_dump($auth->getEmail());
	echo '$auth->getUsername()' . "\t\t\t";
	\var_dump($auth->getUsername());

	echo '$auth->getStatus()' . "\t\t\t";
	echo \convertStatusToText($auth);
	echo ' / ';
	\var_dump($auth->getStatus());

	echo "\n";

	echo 'Roles (super moderator)' . "\t\t\t";
	\var_dump($auth->hasRole(\Delight\Auth\Role::SUPER_MODERATOR));

	echo 'Roles (developer *or* manager)' . "\t\t";
	\var_dump($auth->hasAnyRole(\Delight\Auth\Role::DEVELOPER, \Delight\Auth\Role::MANAGER));

	echo 'Roles (developer *and* manager)' . "\t\t";
	\var_dump($auth->hasAllRoles(\Delight\Auth\Role::DEVELOPER, \Delight\Auth\Role::MANAGER));

	echo "\n";

	echo '$auth->isRemembered()' . "\t\t\t";
	\var_dump($auth->isRemembered());
	echo '$auth->getIpAddress()' . "\t\t\t";
	\var_dump($auth->getIpAddress());
	echo "\n";

	echo 'Session name' . "\t\t\t\t";
	\var_dump(\session_name());
	echo 'Auth::createRememberCookieName()' . "\t";
	\var_dump(\Delight\Auth\Auth::createRememberCookieName());
	echo "\n";

	echo 'Auth::createCookieName(\'session\')' . "\t";
	\var_dump(\Delight\Auth\Auth::createCookieName('session'));
	echo 'Auth::createRandomString()' . "\t\t";
	\var_dump(\Delight\Auth\Auth::createRandomString());
	echo 'Auth::createUuid()' . "\t\t\t";
	\var_dump(\Delight\Auth\Auth::createUuid());

	echo '</pre>';
}

function convertStatusToText(\Delight\Auth\Auth $auth) {
	if ($auth->isLoggedIn() === true) {
		if ($auth->getStatus() === \Delight\Auth\Status::NORMAL && $auth->isNormal()) {
			return 'normal';
		}
		elseif ($auth->getStatus() === \Delight\Auth\Status::ARCHIVED && $auth->isArchived()) {
			return 'archived';
		}
		elseif ($auth->getStatus() === \Delight\Auth\Status::BANNED && $auth->isBanned()) {
			return 'banned';
		}
		elseif ($auth->getStatus() === \Delight\Auth\Status::LOCKED && $auth->isLocked()) {
			return 'locked';
		}
		elseif ($auth->getStatus() === \Delight\Auth\Status::PENDING_REVIEW && $auth->isPendingReview()) {
			return 'pending review';
		}
		elseif ($auth->getStatus() === \Delight\Auth\Status::SUSPENDED && $auth->isSuspended()) {
			return 'suspended';
		}
	}
	elseif ($auth->isLoggedIn() === false) {
		if ($auth->getStatus() === null) {
			return 'none';
		}
	}

	throw new Exception('Invalid status `' . $auth->getStatus() . '`');
}

function showGeneralForm() {
    //echo '<meta charset="utf-8">';
    echo '<html>
    <head>
    	<meta http-equiv="content-type" content="text/html>
    	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/custom.css">
	</head>
	<body id="page" class=" w3-light-grey w3-content">


	';

 //    echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 //    <meta name="description" content="">
 //    <meta name="author" content="">
 //    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
 //    <title>Ingreso al sistema RCPIP</title>
 //    <!-- Bootstrap core CSS -->
 //    <link href="bootstrap/bootstrap2.css" rel="stylesheet">
 //    <!-- Custom styles for this template -->
 //    <link href="bootstrap/signin.css" rel="stylesheet">
 //  </head>';
 //  	echo '<div class="container">';
 //  	echo "\n";
 //  	echo '<form class="form-signin" action="" method="post" accept-charset="utf-8">';
	// echo '<h2 class="form-signin-heading">Bienvenido al sitio</h2>';
	// echo '<input type="hidden" name="action" value="login" />';
	// echo '<input type="hidden" name="remember" value="0" />';
	// echo '<label for="inputEmail" class="sr-only">Correo electrónico</label>';
	// echo '<input type="text" class="form-control" name="email" placeholder="Dirección de correo-e" /> ';
	// echo '<label for="inputPassword" class="sr-only">Contraseña</label>';
	// echo '<input type="password" class="form-control" name="password" placeholder="Contraseña" /> ';
	// echo '<select name="remember" size="1">';
	// echo '<option value="0">Recordarme (dentro del sitio)? — No</option>';
	// echo '<option value="1">Recordarme (dentro del sitio)? — Sí</option>';
	// echo '</select> ';
 //    echo '<div class="checkbox">
 //          <label>
 //            <input default:0 checked value="1" name="remember" type="checkbox"> Recordarme
 //          </label>
 //        </div>';
	// echo '<button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>';
	// echo '</form>';

	//echo '<form class="form-signin" action="" method="get" accept-charset="utf-8">';
	//echo '<button class="btn btn-lg btn-primary btn-block" type="submit">Recargar página</button>';
	//echo '</form>';
	//echo '</div>';
}

function showAuthenticatedUserForm(\Delight\Auth\Auth $auth) {
	echo '
	<!-- Sidebar/menu -->
  	<nav class="w3-sidebar w3-collapse w3-animate-left" id="mySidebar"><br>
		<div class="w3-container">
			<a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
			  <i class="fa fa-remove"></i>
			</a>
			<a href="rcpip-incmnsz.html">
			  <img src="imgs/doctor.png " style="width:45%;" class="w3-round"><br><br>
			</a>
			<h4>
			  <b>Unidad de Investigacion</b>
			</h4>
			<p class="w3-text-grey">en enfermedades metabolicas</p>
		</div>
		<div class="w3-bar-block">
			<form accept-charset="utf-8" method="post" action="">
			  <a class="w3-bar-item w3-button w3-padding w3-text-teal" onclick="w3_close()" href="#portfolio">
			    <i class="fa fa-th-large fa-fw w3-margin-right"></i>Datos Generales</a> 
			  <a class="w3-bar-item w3-button w3-padding" onclick="w3_close()" href="#about">
			    <i class="fa fa-user-md fa-fw w3-margin-right"></i>Antecedentes médicos</a> 
			  <a class="w3-bar-item w3-button w3-padding" onclick="w3_close()" href="#contact">
			    <i class="fa fa-heart fa-fw w3-margin-right"></i>Hábitos de vida</a>
			  <a class="w3-bar-item w3-button w3-padding" onclick="w3_close()" href="#contact">
			    <i class="fa fa-calendar fa-fw w3-margin-right"></i>Recordatorio de 24 hrs</a>
			  <a class="w3-bar-item w3-button w3-padding" onclick="w3_close()" href="#contact">
			    <i class="fa fa-hand-peace-o fa-fw w3-margin-right"></i>Consentimiento Informado</a>
			  <a class="w3-bar-item w3-button w3-padding" onclick="w3_close()" href="#contact">
			    <i class="fa fa-sign-out fa-fw w3-margin-right"></i>
			    <input type="hidden" value="logOut" name="action">
			    <button type="submit">Salir</button></a>
			</form>
		</div>
	</nav>
	<!-- Overlay effect when opening sidebar on small screens -->
	<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay">
	</div>
	<!-- !PAGE CONTENT! -->
	<div class=" w3-main" style="margin-left:300px">
	';
	/*
	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="reconfirmPassword" />';
	echo '<input type="text" name="password" placeholder="Password" /> ';
	echo '<button type="submit">Reconfirm password</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="changePassword" />';
	echo '<input type="text" name="oldPassword" placeholder="Old password" /> ';
	echo '<input type="text" name="newPassword" placeholder="New password" /> ';
	echo '<button type="submit">Change password</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="changePasswordWithoutOldPassword" />';
	echo '<input type="text" name="newPassword" placeholder="New password" /> ';
	echo '<button type="submit">Change password without old password</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="changeEmail" />';
	echo '<input type="text" name="newEmail" placeholder="New email address" /> ';
	echo '<button type="submit">Change email address</button>';
	echo '</form>';

	\showConfirmEmailForm();

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="setPasswordResetEnabled" />';
	echo '<select name="enabled" size="1">';
	echo '<option value="0"' . ($auth->isPasswordResetEnabled() ? '' : ' selected="selected"') . '>Disabled</option>';
	echo '<option value="1"' . ($auth->isPasswordResetEnabled() ? ' selected="selected"' : '') . '>Enabled</option>';
	echo '</select> ';
	echo '<button type="submit">Control password resets</button>';
	echo '</form>';
	*/
	/*
	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="logOutAndDestroySession" />';
	echo '<button type="submit">Log out and destroy session</button>';
	echo '</form>';
	*/

	echo '
	';

	echo '
	
		<!-- Header -->
		<header id="portfolio">
			
			<span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
			<div class="w3-container">
				<h1 class="titulo"><b>Registro clínico para proyectos de investigación y protocolos</b></h1>
				<div class=" w3-section w3-bottombar w3-padding-16">
				  <span class="w3-margin-right"></span> 
				  <button class="w3-button w3-green">Ingresos</button>
				  <div class="menuDinamico">
					  <button id="link1" data-page="page1" class="w3-button w3-orange"><i class="fa fa-stethoscope   w3-margin-right"></i>Médicos</button>
					  <button id="link2" data-page="page2" class="w3-button w3-purple w3-hide-small"><i class="fa fa-user-o w3-margin-right"></i>Usuarios</button>
					  <button id="link3" data-page="page3" class="w3-button w3-blue w3-hide-small"><i class="fa fa-file-text-o w3-margin-right"></i>Protocolos</button>
				  </div>
				</div>
			</div>
		</header>
		';
}

function showMedicosForm() {
	echo '
		<div id="page1" class="tarjeta w3-container w3-padding-large" style="margin-bottom:32px">
			<div id="tarjetaMedicos">
				<h4>Registro de medicos</h4>
				<div class="w3-container w3-whitegray">
					<h2>Ingresar medico</h2>
					<div class="w3-row-padding" style="margin:8 -16px">
						<form action="" method="post" accept-charset="utf-8">
							<div class="w3-third w3-margin-bottom">
								<label for="doctorName">Nombre del medico</label>
								<input type="text" id="dname" name="doctorName" placeholder="Su nombre completo..">    
							</div>
							<div class="w3-third w3-margin-bottom">
								<label for="especialidad">Especialidad</label>
								<input type="text" id="darea" name="especialidad" placeholder="Su area de especialidad..">   
							</div>
							<div class="w3-third">
								<label for="celular">Celular</label>
								<input type="text" id="dcel" name="celular" placeholder="Su telefono de celular..">
							</div>
							<input type="hidden" name="action" value="addMedicos" />
							<input class="w3-button w3-teal w3-padding-large w3-hover-black" type="submit" value="Registro nuevo">
						</form>
					</div>
				</div>	
				<div class="lista">		
				<h4> Médicos registrados:</h4>	';
				writeMedicosTable();
				echo '
				</div>
			</div>
		</div>';

}

function showMedicosUpdateForm() {
	global $nameErr, $emailErr, $especialErr, $celularErr, $doctorName, $doctorEmail, $especialidad, $celular;
	//$nameErr = $emailErr = $especialErr = $celularErr = "";
	//$doctorName = $email = $especialidad = $celular = "";

	// Actualiza la información de los médicos
	echo '
		<div class="w3-row-padding" style="margin:8 -16px">
			<form id="updateMedicos" action="'. htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post" accept-charset="utf-8">
				<div class="w3-third w3-margin-bottom">
					<label for="doctorName">Nombre del médico</label>
					<input type="text" id="dname" name="doctorName" placeholder="Su nombre completo.." value="'.$doctorName.'"><span class="error"> * '.$nameErr.'</span>
				</div>
				<div class="w3-third w3-margin-bottom">
					<label for="especialidad">Especialidad</label>
					<input type="text" id="darea" name="especialidad" placeholder="Su área de especialidad.." value="'.$especialidad.'">
				</div>
				<div class="w3-third">
					<label for="doctorCel">Celular</label>
					<input type="text" id="doctorCel" name="celular" placeholder="Su teléfono de celular.." value="'.$celular.'"><span class="error"> * '.$celularErr.'</span>
				</div>
				<div class="w3-third">
					<label for="doctorEmail">Correo electrónico</label>
					<input type="text" id="doctorEmail" name="doctorEmail" placeholder="Su correo electrónico.." value="'.$doctorEmail.'"><span class="error"> * '.$emailErr.'</span>
				</div>
					<!--<input type="hidden" name="action" value="updateMedico" />-->
					<input class="w3-button w3-teal w3-padding-large w3-hover-black" type="submit" value="Actualizar" name="submit">
			</form>
		</div>';
}

function showProtocolosForm() {
	echo '
		<div id="page3" class="tarjeta w3-container w3-padding-large" style="margin-bottom:32px">
			<div id="tarjetaProtocolos">
				<h4>Protocolos de investigacion</h4>
				<div class="w3-container w3-whitegray">
					<h2>Registro de protocolos</h2>
					<div class="w3-row-padding" style="margin:8 -16px">
						<form action="/action_page.php">
							<div class="w3-third">
								<label for="protocoloName">Nombre del protocolo</label>
								<input type="text" id="fname" name="firstname" placeholder="Nombre del protocolo..">
							</div>
							<div class="w3-row-padding" style="margin:8 -16px">    
								<input class="w3-button w3-teal w3-padding-large w3-hover-black" type="submit" value="Registrar protocolo">
							</div>
						</form>	
					</div>
				</div>
				<div class="lista">	
				<h4>Protocolos registrados:</h4>	';
				writeProtocoloTable();
				echo '
				</div>			
			</div>	
		</div>';
}

function showPacientesForm() {
	echo '
		<div id="page2" class="tarjeta w3-container w3-padding-large" style="margin-bottom:32px">
			<div id="tarjetaPacientes">	
			  	<h4>Ingreso de pacientes</h4>
				<div class="w3-container w3-whitegray">
					<h2>Ingresar usuario</h2>
					<form action="/action_page.php">
						<div class="w3-third w3-margin-bottom">
					  <label for="doctorNombre">Nombre del usuario</label>
					  <input type="text" id="dname" name="doctorNombre" placeholder="Su nombre completo">
						</div>
						<div class="w3-third w3-margin-bottom"> 
					  <label for="doctorArea">Sexo</label>
					  <input type="text" id="darea" name="doctorArea" placeholder="Sexo">
						</div>
						<div class="w3-third w3-margin-bottom">
					  <label for="doctorCel">Ocupacion</label>
					  <input type="text" id="dcel" name="doctorCel" placeholder="Ocupacion">
						</div>
						<div class="w3-third w3-margin-bottom">
					  <label for="doctorNombre">Domicilio</label>
					  <input type="text" id="dname" name="doctorNombre" placeholder="Domicilio completo">
						</div>
						<div class="w3-third w3-margin-bottom">  
					  <label for="doctorArea">Lugar de nacimiento</label>
					  <input type="text" id="darea" name="doctorArea" placeholder="Estado y localidad">
						</div>
						<div class="w3-third w3-margin-bottom">
					  <label for="doctorCel">Fecha de nacimiento</label>
					  <input type="text" id="dcel" name="doctorCel" placeholder="Su fecha de nacimiento">
						</div>
						<div class="w3-third w3-margin-bottom">
					  <label for="doctorNombre">Estado civil</label>
					  <input type="text" id="dname" name="doctorNombre" placeholder="Su estado civil">
						</div>
						<div class="w3-third w3-margin-bottom">
					  <label for="doctorArea">Escolaridad</label>
					  <input type="text" id="darea" name="doctorArea" placeholder="Nivel terminado">
						</div>
						<div class="w3-third w3-margin-bottom">
					  <label for="doctorCel">Edad</label>
					  <input type="text" id="dcel" name="doctorCel" placeholder="Su edad en anos">
						</div>
						<div class="w3-third w3-margin-bottom">
					  <label for="doctorNombre">Telefono de casa</label>
					  <input type="text" id="dname" name="doctorNombre" placeholder="Incluyendo lada">
						</div>
						<div class="w3-third w3-margin-bottom">
					  <label for="doctorArea">Celular</label>
					  <input type="text" id="darea" name="doctorArea" placeholder="Su telefono de celular">
						</div>
						<div class="w3-third w3-margin-bottom">
					  <label for="doctorCel">Telefono del trabajo</label>
					  <input type="text" id="dcel" name="doctorCel" placeholder="Telefono del trabajo (extension)">
						</div>
						<div class="w3-third w3-margin-bottom">
					  <label for="doctorNombre">Correo electronico</label>
					  <input type="text" id="dname" name="doctorNombre" placeholder="Su e-mail">
						</div>
						<div class="w3-third w3-margin-bottom">
					  <label for="doctorArea">FolioID</label>
					  <input type="text" id="darea" name="doctorArea" placeholder="Folio ID">
						</div>
						<div class="w3-third">
					  <label for="doctorCel">IDUIEM</label>
					  <input type="text" id="dcel" name="doctorCel" placeholder="IDUIEM">
						</div>
						<input class="w3-button w3-teal w3-padding-large w3-hover-black" type="submit" value="Registro nuevo  ">
					</form>
				</div>
				<div class="lista">
				<h4>Usuarios registrados:</h4>	';
				writePeopleTable();
				echo '
				</div>				
			</div>	
		</div>';
}

function showGuestUserForm() {
    echo '
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
    <title>Ingreso al sistema RCPIP</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/bootstrap2.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap/signin.css" rel="stylesheet">
  	</head>
  	<body id="page" class="w3-light-grey w3-content" style="max-width:1600px">
  		<div class="container">
  		<div id="logo">
  			<img src="imgs/incmnsz.png">
  		</div>
  			<form class="form-signin" action="" method="post" accept-charset="utf-8">
  			  <h2 class="form-signin-heading">Bienvenido</h2>
  				<input type="hidden" name="action" value="login" />
  				<input type="hidden" name="remember" value="0" />
  				<label for="inputEmail" class="sr-only">Correo electrónico</label>
  				<input type="text" class="form-control" name="email" placeholder="Dirección de correo-e" />
  				<label for="inputPassword" class="sr-only">Contraseña</label>
  				<input type="password" class="form-control" name="password" placeholder="Contraseña" />
  				<div class="checkbox">
					<label>
						<input default:0 checked value="1" name="remember" type="checkbox"> Recordarme
					</label>
        		</div>
        		<button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
        	</form>
        </div>';
	/*	echo '<h1>Public</h1>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="login" />';
	echo '<input type="text" name="email" placeholder="Email address" /> ';
	echo '<input type="text" name="password" placeholder="Password" /> ';
	echo '<select name="remember" size="1">';
	echo '<option value="0">Remember (keep logged in)? — No</option>';
	echo '<option value="1">Remember (keep logged in)? — Yes</option>';
	echo '</select> ';
	echo '<button type="submit">Log in with email address</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="login" />';
	echo '<input type="text" name="username" placeholder="Username" /> ';
	echo '<input type="text" name="password" placeholder="Password" /> ';
	echo '<select name="remember" size="1">';
	echo '<option value="0">Remember (keep logged in)? — No</option>';
	echo '<option value="1">Remember (keep logged in)? — Yes</option>';
	echo '</select> ';
	echo '<button type="submit">Log in with username</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="register" />';
	echo '<input type="text" name="email" placeholder="Email address" /> ';
	echo '<input type="text" name="password" placeholder="Password" /> ';
	echo '<input type="text" name="username" placeholder="Username (optional)" /> ';
	echo '<select name="require_verification" size="1">';
	echo '<option value="0">Require email confirmation? — No</option>';
	echo '<option value="1">Require email confirmation? — Yes</option>';
	echo '</select> ';
	echo '<select name="require_unique_username" size="1">';
	echo '<option value="0">Username — Any</option>';
	echo '<option value="1">Username — Unique</option>';
	echo '</select> ';
	echo '<button type="submit">Register</button>';
	echo '</form>';

	\showConfirmEmailForm();

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="forgotPassword" />';
	echo '<input type="text" name="email" placeholder="Email address" /> ';
	echo '<button type="submit">Forgot password</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="resetPassword" />';
	echo '<input type="text" name="selector" placeholder="Selector" /> ';
	echo '<input type="text" name="token" placeholder="Token" /> ';
	echo '<input type="text" name="password" placeholder="New password" /> ';
	echo '<button type="submit">Reset password</button>';
	echo '</form>';
	*/
}

function showAdminUserForm() {
	echo '<h1>Administration</h1>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.createUser" />';
	echo '<input type="text" name="email" placeholder="Email address" /> ';
	echo '<input type="text" name="password" placeholder="Password" /> ';
	echo '<input type="text" name="username" placeholder="Username (optional)" /> ';
	echo '<select name="require_unique_username" size="1">';
	echo '<option value="0">Username — Any</option>';
	echo '<option value="1">Username — Unique</option>';
	echo '</select> ';
	echo '<button type="submit">Create user</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.deleteUser" />';
	echo '<input type="text" name="id" placeholder="ID" /> ';
	echo '<button type="submit">Delete user by ID</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.deleteUser" />';
	echo '<input type="text" name="email" placeholder="Email address" /> ';
	echo '<button type="submit">Delete user by email</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.deleteUser" />';
	echo '<input type="text" name="username" placeholder="Username" /> ';
	echo '<button type="submit">Delete user by username</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.addRole" />';
	echo '<input type="text" name="id" placeholder="ID" /> ';
	echo '<select name="role">' . \createRolesOptions() . '</select>';
	echo '<button type="submit">Add role for user by ID</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.addRole" />';
	echo '<input type="text" name="email" placeholder="Email address" /> ';
	echo '<select name="role">' . \createRolesOptions() . '</select>';
	echo '<button type="submit">Add role for user by email</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.addRole" />';
	echo '<input type="text" name="username" placeholder="Username" /> ';
	echo '<select name="role">' . \createRolesOptions() . '</select>';
	echo '<button type="submit">Add role for user by username</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.removeRole" />';
	echo '<input type="text" name="id" placeholder="ID" /> ';
	echo '<select name="role">' . \createRolesOptions() . '</select>';
	echo '<button type="submit">Remove role for user by ID</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.removeRole" />';
	echo '<input type="text" name="email" placeholder="Email address" /> ';
	echo '<select name="role">' . \createRolesOptions() . '</select>';
	echo '<button type="submit">Remove role for user by email</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.removeRole" />';
	echo '<input type="text" name="username" placeholder="Username" /> ';
	echo '<select name="role">' . \createRolesOptions() . '</select>';
	echo '<button type="submit">Remove role for user by username</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.hasRole" />';
	echo '<input type="text" name="id" placeholder="ID" /> ';
	echo '<select name="role">' . \createRolesOptions() . '</select>';
	echo '<button type="submit">Does user have role?</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.logInAsUserById" />';
	echo '<input type="text" name="id" placeholder="ID" /> ';
	echo '<button type="submit">Log in as user by ID</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.logInAsUserByEmail" />';
	echo '<input type="text" name="email" placeholder="Email address" /> ';
	echo '<button type="submit">Log in as user by email address</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="admin.logInAsUserByUsername" />';
	echo '<input type="text" name="username" placeholder="Username" /> ';
	echo '<button type="submit">Log in as user by username</button>';
	echo '</form>';
}

function showConfirmEmailForm() {
	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="confirmEmail" />';
	echo '<input type="text" name="selector" placeholder="Selector" /> ';
	echo '<input type="text" name="token" placeholder="Token" /> ';
	echo '<select name="login" size="1">';
	echo '<option value="0">Sign in automatically? — No</option>';
	echo '<option value="1">Sign in automatically? — Yes</option>';
	echo '<option value="2">Sign in automatically? — Yes (and remember)</option>';
	echo '</select> ';
	echo '<button type="submit">Confirm email</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="resendConfirmationForEmail" />';
	echo '<input type="text" name="email" placeholder="Email address" /> ';
	echo '<button type="submit">Re-send confirmation</button>';
	echo '</form>';

	echo '<form action="" method="post" accept-charset="utf-8">';
	echo '<input type="hidden" name="action" value="resendConfirmationForUserId" />';
	echo '<input type="text" name="userId" placeholder="User ID" /> ';
	echo '<button type="submit">Re-send confirmation</button>';
	echo '</form>';
}

function createRolesOptions() {
	$roleReflection = new ReflectionClass(\Delight\Auth\Role::class);

	$out = '';

	foreach ($roleReflection->getConstants() as $roleName => $roleValue) {
		$out .= '<option value="' . $roleValue . '">' . $roleName . '</option>';
	}

	return $out;
}

/* Funciones para el Formateo de los datos y Tablas de la Base de Datos
************************************************************************/
// Protocolo
function writeProtocoloDatos() {
	$datos = getDataProtocolo();
	foreach($datos as $row) {
    	echo $row['ProtocoloID'].'  &emsp;'.$row['Protocolo'].'<br>'; //etc...
  	}
}

function writeProtocoloTable() {
	// Escribe la Tabla de Protocolo
	$datos = getDataProtocolo();
	echo '
		<table id="Protocolo">';
	foreach($datos as $row) {
		echo '
			<tr>
				<td>'.$row['ProtocoloID'].'</td>
				<td>'.$row['Protocolo'].'</td>
				<td><a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a></td>
			</tr>';
  	}
	echo '
		</table>';
}

function writeProtocoloTotalRegistros() {
	global $datosProtocolo;
	echo $datosProtocolo->rowCount();
}

// Medicos
function editarMedico($medicoID) {
	global $nameErr, $emailErr, $especialErr, $celularErr, $doctorName, $doctorEmail, $especialidad, $celular, $medicoID;
	$data = getDataMedicos($medicoID);
	foreach($data as $row) {
    	$doctorName = $row['Nombre_medico'];
    	$doctorEmail = $row['Email_medico'];
    	$especialidad = $row['Especialidad'];
    	$celular = $row['Cel_medico'];
  	}
}

function writeMedicosDatos() {
	$datos = getDataMedicos();
	foreach($datosProtocolo as $row) {
    	echo $row['ProtocoloID'].'  &emsp;'.$row['Protocolo'].'<br>'; //etc...
  	}
}

function writeMedicosTable() {
	// Escribe la Tabla de Médicos
	global $medicoID;
	$datos = getDataMedicos($medicoID);
	echo '
		<table id="Medicos">';
	foreach($datos as $row) {
		echo '
			<tr>
				<td>'.$row['MedicosID'].'</td>
				<td>'.$row['Nombre_medico'].'</td>
				<td>'.$row['Especialidad'].'</td>
				<td>'.$row['Cel_medico'].'</td>
				<td>'.$row['Email_medico'].'</td>
				<td><a href="'.editarMedico($medicoID).'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a></td>
			</tr>';
  	}
	echo '
		</table>';
}

/*
// People
function writePeopleDatos {
	$datos = getDataPeople();
	foreach($datos as $row) {
      echo $row['Nombre'].' &emsp;'.$row['Sexo'].' &emsp;'.$row['Ocupacion'].' &emsp;'.$row['Domicilio'].' &emsp;'.$row['Lugar_nacimiento'].' &emsp;'.$row['Fecha_nacimiento'].' &emsp;'.$row['Estado_civil'].' &emsp;'.$row['Escolaridad'].$row['Edad'].' &emsp;'.$row['Tel_casa'].' &emsp;'.$row['Celular'].' &emsp;'.$row['Tel_trabajo'].' &emsp;'.$row['Email'].' &emsp;'.$row['rol'].' &emsp;'.$row['FolioID'].' &emsp;'.$row['IDUIEM'].' &emsp;'; //etc...
  	}
}
*/
function writePeopleTable() {
	// Escribe la Tabla de Protocolo
	$datos = getDataPeople();
	echo '
		<table id="People">';
	foreach($datos as $row) {
		echo '
			<tr>
				<td>'.$row['Nombre'].'</td>
				<td>'.$row['Sexo'].'</td>
				<td>'.$row['Ocupacion'].'</td>
				<td>'.$row['Domicilio'].'</td>
				<td>'.$row['Lugar_nacimiento'].'</td>
				<td>'.$row['Fecha_nacimiento'].'</td>
				<td>'.$row['Estado_civil'].'</td>
				<td>'.$row['Escolaridad'].'</td>
				<td>'.$row['Edad'].'</td>
				<td>'.$row['Tel_casa'].'</td>
				<td>'.$row['Celular'].'</td>
				<td>'.$row['Tel_trabajo'].'</td>
				<td>'.$row['Email'].'</td>
				<td>'.$row['rol'].'</td>
				<td>'.$row['FolioID'].'</td>
				<td>'.$row['IDUIEM'].'</td>
				<td><a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a></td>
			</tr>';
  	}
	echo '
		</table>
		';
}

//Agrega el estilo (authenticated) al body para manipular la vista cuando esta authenticado
//Crea el menu dinamico (hide/show) segun se seleccione
function showViewChanges(){
	echo '
	<script>
	var bodyClasses = document.querySelector("body").className;
	var myClass = new RegExp("authenticated");
	var trueOrFalse = myClass.test( bodyClasses );

	if (trueOrFalse == false) {
		var elemento = document.getElementById("page");
		elemento.className += " authenticated";
	} 


	$(function() {
    var curPage="";
    $(".menuDinamico button").click(function() {
	        if (curPage.length) { 
	            $("#"+curPage).hide();
	        }
	        curPage=$(this).data("page");
	        $("#"+curPage).show();
	    });
	});
	</script>';
}
/*
// R24hrs
function writeR24hrsTable() {
	// Escribe la Tabla de Protocolo
	$datos = getDataR24hrs();
	echo '
		<table id="R24hrs">';
	foreach($datos as $row) {
		echo '
			<tr>
				<td>'.$row['R24hrsID'].'</td>
				<td>'.$row['PeopleID'].'</td>
				<td>'.$row['A1'].'</td>
				<td>'.$row['A1_lugar'].'</td>
				<td>'.$row['A1_prep'].'</td>
				<td>'.$row['C1'].'</td>
				<td>'.$row['C1_lugar'].'</td>
				<td>'.$row['C1_prep'].'</td>
				<td>'.$row['A2'].'</td>
				<td>'.$row['A2_lugar'].'</td>
				<td>'.$row['A2_prep'].'</td>
				<td>'.$row['C2'].'</td>
				<td>'.$row['C2_lugar'].'</td>
				<td>'.$row['C2_prep'].'</td>
				<td>'.$row['A3'].'</td>
				<td>'.$row['A3_lugar'].'</td>
				<td>'.$row['A3_prep'].'</td>
				<td><a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a></td>
			</tr>';
  	}
	echo '
		</table>';
}*/


?>