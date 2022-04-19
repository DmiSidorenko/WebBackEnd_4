<html>
<head>
    <link rel="stylesheet" type="text/css" href="StyleForForm.css">
</head>

  <body>
<?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}
?>

    <form action="ForForm.php" method="POST" class="row mx-5 my-2 gy-1 popup-form">
                        <div class="form_item form-group">
                            <label for="formName" style="color: purple;">Имя:</label>
                            <input type="text" <?php if ($errors['fio']) {print 'class="error"';} ?> value="<?php print $values['fio']; ?>" class="form_input _req form-control w-75 shadow bg-white rounded" name = "FIO" id="formName">
                            <small class="form-text text-muted">Введите ваши ФИО</small>
                            </div>

                         <div class="form_item form-group">
                             <label for="formEmail" style="color: purple;">E-mail:</label>
                             <input type="email" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>" class="form_input _req _email form-control w-75 shadow bg-white rounded" id="formEmail" name = "email" >
                             <small class="form-text text-muted">Введите один из следующих email: mail.ru, gmail.com, yandex.ru и т.п.</small>
                             </div>

      		     <div class="form_item form-group">
                              <label for="formDate" style="color: purple;">Дата рождения:</label>
                              <input type="date" <?php if ($errors['date']) {print 'class="error"';} ?> value="<?php print $values['date']; ?>" class="form_input _req form-control w-50 shadow bg-white rounded" name="date" min="1900-01-01" max="2004-01-01">
    			  <small class="form-text text-muted"> Введите вашу дату рождения. </small>
                              </div>

    		     <div class="form_item form-group">
                		<label for="formSex" style="color: purple;">Пол:</label></br>
                		<div class="form-check1 form-check-inline">
                    	<input <?php if ($errors['sex']) {print 'class="error"';} ?> value="<?php print $values['sex']; ?>" class="form-check-input" type="radio" name="sex" id="SexOne" value="male">
                    	<label class="form-check-label" for="RadioOne">Мужской</label>
               		 </div>
                		<div class="form-check1 form-check-inline">
                  	        <input class="form-check-input" type="radio" name="sex" id="SexTwo" value="female">
                    	<label class="form-check-label" for="RadioTwo">Женский</label>
                		</div>
    			<div><small class="form-text text-muted"> Укажите ваш пол. </small></div>
           		      </div>

    		    <div class="form_item form-group">
               	 	<label for="formLimbs" style="color: purple;">Количество конечностей:</label></br>
                		<div class="form-check form-check-inline">
                    	<input <?php if ($errors['limbs']) {print 'class="error"';} ?> value="<?php print $values['limbs']; ?>" class="form-check-input" type="radio" name="limbs" id="RadioKeyOne" value="1">
                    	<label class="form-check-label" for="RadioKeyOne">1</label>
                	       </div>
                		<div class="form-check form-check-inline">
                    	<input class="form-check-input" type="radio" name="limbs" id="RadioKeyTwo" value="2">
                    	<label class="form-check-label" for="RadioKeyTwo">2</label>
                	       </div>
                		<div class="form-check form-check-inline">
                    	<input class="form-check-input" type="radio" name="limbs" id="RadioKeyThree" value="3">
                    	<label class="form-check-label" for="RadioKeyThree">3</label>
                	       </div>
                		<div class="form-check form-check-inline">
                    	<input class="form-check-input" type="radio" name="limbs" id="RadioKeyFour" value="4">
                    	<label class="form-check-label" for="RadioKeyFour">4</label>
                	       </div>
    			<div class="form-check form-check-inline">
                    	<input class="form-check-input" type="radio" name="limbs" id="RadioKeyFive" value="more than 4">
                    	<label class="form-check-label" for="RadioKeyFive">Больше</label>
                	       </div>
    			<div><small class="form-text text-muted"> Укажите количество конечностей (указывайте честно, не стесняйтесь &#128513) </small></div>
            	    </div>

    		    <div class="form_item form-group">
                		<label for="Superpower" style="color: purple;">Сверхспособности:</label>
                		<select <?php if ($errors['superpowers']) {print 'class="error"';} ?> value="<?php print $values['superpowers']; ?>" multiple class="form_input _req form-control w-50 shadow bg-white rounded" id="multipleSuper"
                    	name="Superpowers[]">
                    	<option value="1">Бессмертие</option>
                    	<option value="2">Прохожление сквозь стены</option>
                    	<option value="3">Левитация</option>
    			<option value="4">Невидимость</option>
    			<option value="5">Другие</option>
    			<option value="6">Отсутствуют</option>
                		</select>
           		    </div>


      			<div class="form_item form-group w-75">
                             <label for="formBiography" style="color: purple;">Биография:</label>
                             <textarea id="formBiography" id="formBiography" name="Biography" class="form_input _req form-control shadow bg-white rounded"  id="form">
                             </textarea>
                             <small class="form-text text-muted">Необязательное поле</small>
                             </div>

                                    <div class="form-check">
                                        <label id="accept " class="checkbox_label form-check-label">С контрактом ознакомлен(а)  </label>
                                        <input for="accept" checked type="checkbox" name="accept" class="checkbox_input form-check-input" style="color: purple;" required>
                                        </div>

                      <label class = "col-12"><input type = "submit" name = "submit" class = "submit"></label>
                      </form>
                      </div>
               </div>
    </body>
</html>