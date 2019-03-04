<?php
$users = 'pages/users.txt';

function err_log($text, $is_error){
    $color = $is_error?'red':'green';
    echo "<h3><span style='color: $color'>$text</span></h3>";
    return $is_error?false:'';
}

function register($login, $password, $email)
{
    $login = trim(htmlspecialchars($login));
    $password = trim(htmlspecialchars($password));
    $email = trim(htmlspecialchars($email));

    if ($login == '' || $password == '' || $email == '') {
        return err_log('Fuck you', true);
    }
    global $users;
    $file = fopen($users, 'a+');
    while ($line = fgets($file)) {
        #tom:23456sadfsdfhfdas:tom@tom.tom
        $readname = substr($line, 0, strpos($line,':'));
        if ($login == $readname) {
            return err_log('Fuck you', true);
        }
    }
    $password = md5($password);
    $line = "$login:$password:$email\n";
    fputs($file, $line);
    fclose($file);
    return true;
}

function login($login, $password)
{
    $login = trim(htmlspecialchars($login));
    $password = trim(htmlspecialchars($password));

    if ($login == '' || $password == '') {
        return err_log('Fuck you', true);
    }
    global $users;
    $password = md5($password);
    $file = fopen($users, 'a+');
    while ($line = fgets($file)) {
        #tom:23456sadfsdfhfdas:tom@tom.tom
        $readname = substr($line, 0, strpos($line,':'));
        $readpass = explode( ":",$line);
        $readpass = $readpass[1];


        if ($login == $readname && $password == $readpass) {
            session_start();
            echo "Ok";
            $_SESSION['is_login'] = true;
            $_SESSION['login'] = $login;
            return true;
        }
    }
    fclose($file);
    return false;
}