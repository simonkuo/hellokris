<html>
<body>

<h1>Password Hash</h1>
<br>
<br>

<?php
 //phpinfo();
// hash length 13 to 123
// salt length 22

if( isset($_POST['username'] ) )
{ // process

$username = $_POST['username'];
$password = $_POST['password'];
$input = $username . "_" .$password;

$salt_char_set = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./');

$salt = "";
for($i=0; $i < 22; $i++) 
{ 
  $salt .= $salt_char_set[array_rand($salt_char_set)];
}
$hash = crypt($input, '$2a$08$' . $salt);
   
echo "user name: " . $username;
echo "<br>password: " . $password;
echo "<br>hash: " . $hash;

/*
echo "<br><br>hash test:" . '$2a$08$JuLIbC2OzqXMFKl5W6vVeOzodCoOU.g7w0QCdtENk7lhZzzDOSikS';
echo "<br>salt:" . $salt;
echo "<br>Blowfish: " . CRYPT_BLOWFISH;
echo "<br>SHA256: " . CRYPT_SHA256;
echo "<br>SHA512: " . CRYPT_SHA512;

echo "<br>";
if (CRYPT_STD_DES == 1) {
    echo '<br>Standard DES: ' . crypt('rasmuslerdorf', 'rl') . "\n";
}

if (CRYPT_EXT_DES == 1) {
    echo '<br>Extended DES: ' . crypt('rasmuslerdorf', '_J9..rasm') . "\n";
}

if (CRYPT_MD5 == 1) {
    echo '<br>MD5:          ' . crypt('rasmuslerdorf', '$1$rasmusle$') . "\n";
}

if (CRYPT_BLOWFISH == 1) {
    echo '<br>Blowfish:     ' . crypt('rasmuslerdorf', '$2a$07$usesomesillystringforsalt$') . "\n";
}

if (CRYPT_SHA256 == 1) {
    echo '<br>SHA-256:      ' . crypt('rasmuslerdorf', '$5$rounds=5000$usesomesillystringforsalt$') . "\n";
}

if (CRYPT_SHA512 == 1) {
    echo '<br>SHA-512:      ' . crypt('rasmuslerdorf', '$6$rounds=5000$usesomesillystringforsalt$') . "\n";
}
*/
}
?>
<form method="post" action="hash.php">
User Name:&nbsp;&nbsp;<input type="text" name="username" />
<br><br>Password:&nbsp;&nbsp;<input type="text" name="password" />
<br><br><input type="submit" />
</form>

</body>
</html>