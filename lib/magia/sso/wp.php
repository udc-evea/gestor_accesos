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
<form id="patova" method="post" action="/wordpress/wp-login.php">
  <input type='hidden' name='log' value='<?php echo $user;?>'/>
  <input type='hidden' name='pwd' value='<?php echo $pass;?>'/>
  <input type='hidden' name='rememberme' value=''/>
   	<input type='hidden' name='redirect_to' value='/wordpress'/>
</form>
<script>
  document.getElementById('patova').submit();
</script>
