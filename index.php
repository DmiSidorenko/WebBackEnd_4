<?php

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $messages = array();
  if (!empty($_COOKIE['save'])) {
    setcookie('save', '', 100000);
    $messages[] = 'Спасибо, результаты сохранены.';
  }

       $errors = array();
       $errors['fio'] = !empty($_COOKIE['fio_error']);
       $errors['email'] = !empty($_COOKIE['email_error']);
       $errors['date'] = !empty($_COOKIE['date_error']);
       $errors['sex'] = !empty($_COOKIE['sex_error']);
       $errors['superpowers'] = !empty($_COOKIE['superpowers_error']);
       $errors['limbs'] = !empty($_COOKIE['limbs_error']);

       if ($errors['fio']) {
           setcookie('fio_error', '', 100000);
           $messages[] = '<div class="error">Заполните имя.</div>';
       }
       if ($errors['email']) {
           setcookie('email_error', '', 100000);
           $messages[] = '<div class="error">Заполните email.</div>';
       }
       if ($errors['date']) {
           setcookie('date_error', '', 100000);
           $messages[] = '<div class="error">Заполните дату рождения.</div>';
       }
       if ($errors['sex']) {
           setcookie('sex_error', '', 100000);
           $messages[] = '<div class="error">Укажите пол.</div>';
       }
       if ($errors['superpowers']) {
           setcookie('superpowers_error', '', 100000);
           $messages[] = '<div class="error">Укажите суперспособности.</div>';
       }
       if ($errors['limbs']) {
           setcookie('limbs_error', '', 100000);
           $messages[] = '<div class="error">Укажите количество конечностей.</div>';
       }


   $values = array();
    $values['fio'] = empty($_COOKIE['fio_value']) ? '' : $_COOKIE['fio_value'];
    $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
    $values['date'] = empty($_COOKIE['date_value']) ? '' : $_COOKIE['date_value'];
    $values['sex'] = empty($_COOKIE['sex_value']) ? '' : $_COOKIE['sex_value'];
    $values['superpowers'] = empty($_COOKIE['superpowers_value']) ? '' : $_COOKIE['superpowers_value'];
    $values['limbs'] = empty($_COOKIE['limbs_value']) ? '' : $_COOKIE['limbs_value'];
    $values['bio'] = empty($_COOKIE['bio_value']) ? '' : $_COOKIE['bio_value'];
   if(empty($_COOKIE['superpowers_value']))
    $values['superpowers'] = array();
   else
    $values['superpowers'] = json_decode($_COOKIE['superpowers_value'], true);

   include('form.php');
}
else {
    $errors = FALSE;
    if (empty($_POST['fio'])) {
      setcookie('fio_error', '1');
      $errors = TRUE;
    }
    else {
      setcookie('fio_value', $_POST['fio']);
    }

    if (empty($_POST['email'])) {
      setcookie('email_error', '1');
      $errors = TRUE;
    }
    else {
      setcookie('email_value', $_POST['email']);
    }

    if (empty($_POST['date'])) {
      setcookie('date_error', '1');
      $errors = TRUE;
    }
    else {
      setcookie('date_value', $_POST['date']);
    }

    if (empty($_POST['sex'])) {
      setcookie('sex_error', '1');
      $errors = TRUE;
    }
    else {
      setcookie('sex_value', $_POST['sex']);
    }

    if(!empty($_POST['superpowers'])){
      $json = json_encode($_POST['superpowers']);
      setcookie('superpowers_value', $json);
    }

    if (empty($_POST['limbs'])) {
      setcookie('limbs_error', '1');
      $errors = TRUE;
    }
    else {
      setcookie('limbs_value', $_POST['limbs']);
    }

   if(!empty($_POST['bio'])) {
      setcookie ('bio_value', $_POST['bio']);
   }

    if ($errors) {
    header('Location: index.php');
    exit();
  }
   else {
          setcookie('fio_error', '', 100000);
          setcookie('email_error', '', 100000);
          setcookie('date_error', '', 100000);
          setcookie('limbs_error', '', 100000);
          setcookie('superpowers_error', '', 100000);
          setcookie('sex_error', '', 100000);
    }

    $user = 'u41123';
    $pass = '1452343';
    $db = new PDO('mysql:host=localhost;dbname=u41123', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

    try {
      $stmt = $db->prepare("INSERT INTO humans SET name = ?, email = ?, date = ? ,gender = ?, limbs = ?, bio = ?");
      $stmt -> execute(array($_POST['fio'],$_POST['email'],$_POST['date'],$_POST['sex'],$_POST['limbs'],$_POST['bio']));
      $res = $db->query("SELECT max(id) FROM humans");
          $row = $res->fetch();
          $count = (int) $row[0];

          $ability = $_POST['superpowers'];

          foreach($ability as $item) {
            $stmt = $db->prepare("INSERT INTO abilities SET humans_id = ?, ability = ?");
            $stmt -> execute([$count, $item]);
          }
    }
    catch(PDOException $e){
     print('Error : ' . $e->getMessage());
     exit();
    }

    setcookie('save', '1');

    header('Location: index.php');
}
?>