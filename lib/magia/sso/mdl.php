<?php
header('Access-Control-Allow-Origin: http://localhost');
header('Access-Control-Allow-Credentials: true');

require_once 'GibberishAES.class.php';

$p    = 'c12392fc4d36c739a684aa6247b62f3a';
$user = $_POST['old'];
$pass = $_POST['new'];

$user = GibberishAES::dec($user, $p);
$pass = GibberishAES::dec($pass, $p);

if(!$user || !$pass)
{
  header('HTTP/1.1 401 Unauthorized', true, 401);
  die("error...");
}
?>
Cargando...
<form id="patova" method="post" action="/moodle/login/index.php">
  <input type='hidden' name='username' value='<?php echo $user;?>'/>
  <input type='hidden' name='password' value='<?php echo $pass;?>'/>
  <input type='hidden' name='rememberusername' value=''/>
</form>
<script>
  document.getElementById('patova').submit();
</script>
