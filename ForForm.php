<?php
header('Content-Type: text/html; charset=UTF-8');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['save'])) {
        print('Спасибо, форма сохранена.');
    }
    include('form.html');
    exit();
}
};

$power=implode(',',$_POST['Superpowers'];
$user = 'u41123';
$pass = '1452343';
$db = new PDO('mysql:host=localhost;dbname=u41123', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

try {
    $stmt = $db->prepare("INSERT INTO application SET fio = ?, email = ?, birth_date = ? ,gender = ?, limb = ?, bio = ?");
    $stmt -> execute(array($_POST['FIO'],$_POST['email'],$_POST['date'],$_POST['sex'],$_POST['limbs'],$_POST['Biography']));
    $stmt = $db->prepare("INSERT INTO application SET fio = ?, email = ?, ,ability =?");
    $stmt -> execute(array($_POST['FIO'],$_POST['email'],$power));
}
catch(PDOException $e){
    print('Error : ' . $e->getMessage());
    exit();
}

header('Location: ?save=1');
?>
