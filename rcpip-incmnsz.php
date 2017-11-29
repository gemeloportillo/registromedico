<?php require_once('connections/rcpip.php'); 
require_once('delight.php');

// enable error reporting
//\error_reporting(\E_ALL);
//\ini_set('display_errors', 'stdout');

// enable assertions
//\ini_set('assert.active', 1);
//@\ini_set('zend.assertions', 1);
//\ini_set('assert.exception', 1);
/*
\header('Content-type: text/html; charset=utf-8');
require __DIR__.'/vendor/autoload.php';
$db = new \PDO('mysql:dbname=rcpip;host=localhost;charset=utf8mb4', $dbuser_rcpip, $dbpass_rcpip);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);*/
// or
// $db = new \PDO('sqlite:../Databases/php_auth.sqlite');

$auth = new \Delight\Auth\Auth($db);
$result = \processRequestData($auth);

\showGeneralForm();
//\showDebugData($auth, $result);

if ($auth->check()) {
  \showAuthenticatedUserForm($auth);
  \showViewChanges();
  \showMedicosForm();
    
  \showProtocolosForm();

  \showPacientesForm();
    echo '
    </div>
      ';
  //writePeopleDatos();
 

  //\header("Location: ". "rcpip-incmnsz.php" );
}
else {
  \showGuestUserForm();
}

if ($auth->hasAnyRole(\Delight\Auth\Role::DEVELOPER, \Delight\Auth\Role::MANAGER)) {
    // the user is either a developer, or a manager, or both
  //\showDebugData($auth, $result);
  //\showAdminUserForm($auth);
}

try {
  /*
  writeProtocoloTable();
  writeProtocoloDatos();
  echo '<b>Total de registros: </b>';
  writeProtocoloTotalRegistros();
  echo '<br><br>';
  */

} catch(PDOException $ex) {
    echo "An Error occured my friend!"; //user friendly message
   //handle me.
}

?>

  <!-- Footer -->
  <div class="footer w3-black w3-center w3-padding-24">
    Derechos Reservados 2017 &copy; INCMNSZ
    <a href="http://www.innsz.mx/" title="Nutrición" target="_blank" class="w3-hover-opacity"></a>
  </div>
  <!-- End page content -->
  <script>
    // Script to open and close sidebar
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }
    
    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }
  </script>
</body>
</html>
