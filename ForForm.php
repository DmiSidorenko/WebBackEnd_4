<?php
header('Content-Type: text/html; charset=UTF-8');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
     $messages = array();
    if (!empty($_COOKIE['save'])) {
        // Удаляем куку, указывая время устаревания в прошлом.
        setcookie('save', '', 100000);
        // Если есть параметр save, то выводим сообщение пользователю.
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
      $values['biography'] = empty($_COOKIE['biography_value']) ? '' : $_COOKIE['biography_value'];
    include('form.html');
    exit();
}

else {
  $errors = FALSE;
  if (empty($_POST['fio'])) {
    setcookie('fio_error', '1');
    $errors = TRUE;
  }
  else {
    setcookie('fio_value', $_POST['FIO']);

  if (empty($_POST['email'])) {
    setcookie('email_error', '1');
    $errors = TRUE;
  }
  else {
    setcookie('email_value', $_POST['email']);

  if (empty($_POST['date'])) {
    setcookie('date_error', '1');
    $errors = TRUE;
  }
  else {
    setcookie('date_value', $_POST['date']);

  if (empty($_POST['sex'])) {
    setcookie('sex_error', '1');
    $errors = TRUE;
  }
  else {
    setcookie('sex_value', $_POST['sex']);

  if (empty($_POST['superpowers[]'])) {
    setcookie('superpowers_error', '1');
    $errors = TRUE;
  }
  else {
    setcookie('superpowers_value', $_POST['superpowers[]']);

  if (empty($_POST['limbs'])) {
    setcookie('limbs_error', '1');
    $errors = TRUE;
  }
  else {
    setcookie('limbs_value', $_POST['limbs']);

 if(!empty($_POST['bio'])){
    setcookie ('biography_value', $_POST['bio']

 if ($errors) {
    header('Location: form.php');
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

  $power=implode(',',$_POST['Superpowers'];
  $user = 'u41123';
  $pass = '1452343';
  $db = new PDO('mysql:host=localhost;dbname=u41123', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

  try {
      $stmt = $db->prepare("INSERT INTO application SET fio = ?, email = ?, birth_date = ? ,gender = ?, limb = ?, bio = ?");
      $stmt -> execute(array($_POST['FIO'],$_POST['email'],$_POST['date'],$_POST['sex'],$_POST['limbs'],$_POST['Biography']));
      $stmt = $db->prepare("INSERT INTO abilities SET fio = ?, email = ?, ,ability =?");
      $stmt -> execute(array($_POST['FIO'],$_POST['email'],$power));
  }
  catch(PDOException $e){
      print('Error : ' . $e->getMessage());
      exit();
  }

  setcookie('save', '1');

  header('Location: ForForm.php');
}
};

/*if (isset($_POST['fio']))
    setcookie("FIO", $_POST['fio']);
if (isset($_POST['mail']))
    setcookie("mail", $_POST['mail']);
if (isset($_POST['date']))
    setcookie("birth_date", $_POST['date']);
if (isset($_POST['sex']))
    setcookie("sex", $_POST['sex']);
if (isset($_POST['Superpowers']))
    setcookie("superpowers", $_POST['Superpowers']);
if (isset($_POST['limbs']))
    setcookie("limbs", $_POST['limbs']);
if (isset($_POST['Biography']))
    setcookie("biography", $_POST['Biography']);
}

$errors=array(
1=>FALSE,
2=>FALSE,
3=>FALSE,
4=>FALSE,
5=>FALSE,
6=>FALSE,
)

if (empty($_POST['fio'])) {
    print('Напишите ФИО.<br/>');
    $errors[1] = TRUE;
}

if (empty($_POST['mail'])) {
    print('Напишите почту.<br/>');
    $errors[2] = TRUE;
}

if (empty($_POST['date'])) {
    print('Напишите свой день рождения.<br/>');
    $errors[3] = TRUE;
}

if ( empty($_POST['sex']) ) {
    print('Укажите пол.<br/>');
    $errors[4] = TRUE;
}

if (empty($_POST['Superpowers'])) {
    print('Укажите хоть одну суперспособность.<br/>');
    $errors[5] = TRUE;
}

if (empty($_POST['limbs'])) {
    print('Укажите количество конечностей.<br/>');
    $errors[6] = TRUE;
}

$mainerror=FALSE;
for($i=1;$i<=6 && $mainerror==FALSE;$i++)
    if ($errors[i]==TRUE)
        $mainerror=TRUE;

if ($mainerror==FALSE){
    setcookie ("FIO", "", time() - 3600);
    setcookie ("mail", "", time() - 3600);
    setcookie ("birth_date", "", time() - 3600);
    setcookie ("sex", "", time() - 3600);
    setcookie ("superpowers", "", time() - 3600);
    setcookie ("limbs", "", time() - 3600);
    setcookie ("biography", "", time() - 3600);
}*/
