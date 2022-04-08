<?php
header('Content-Type: text/html; charset=UTF-8');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['save'])) {
        print('Спасибо, форма сохранена.');
    }
    include('form.html');
    exit();
}

switch($_POST['sex']) {
    case 'male': {
        $sex='m';
        break;
    }
    case 'female':{
        $sex='f';
        break;
    }
};

switch($_POST['limbs']) {
    case '1': {
        $limbs='1';
        break;
    }
    case '2':{
        $limbs='2';
        break;
    }
    case '3':{
        $limbs='3';
        break;
    }
    case '4':{
        $limbs='4';
        break;
    }
};

$power=implode(',',$_POST['Superpowers'];
$user = 'u41123';
$pass = '1452343';
$db = new PDO('mysql:host=localhost;dbname=u41123', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

try {
    $stmt = $db->prepare("INSERT INTO application SET fio = ?, email = ?, birth_date = ? ,gender = ?, limb = ?,ability =?, bio = ?");
    $stmt -> execute(array($_POST['FIO'],$_POST['email'],$_POST['date'],$_POST['sex'],$_POST['limbs'],$power,$_POST['Biography']));
}
catch(PDOException $e){
    print('Error : ' . $e->getMessage());
    exit();
}

header('Location: ?save=1');
?>
