<html>
<head>
    <title>Задание 6</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width initial-scale=1">
</head>
<body>

<?php
// Если есть сообщения об ошибках или "Спасибо, результаты сохранены"
// print() выдаст HTML-код, который будет обработан браузером
if (!empty($messages)) {
    print('<div id="messages">');
    // Выводим все сообщения
    foreach ($messages as $message) {
        print($message);
    }
    print('</div>');
}

// Далее выводим форму отмечая элементы с ошибками классом error
// и задавая начальные значения элементов ранее сохраненными
?>
<a href="./login.php">Форма авторизации</a>
<form action="" method="POST">
    <label>
        Имя:<br>
        <!-- конкатенация производится с помощью '.' -->
        <!-- если errors['name'] = true, т.е. произошла ошибка с именем, то пометим его классом error (подстветка красным) -->
        <!-- при этом значением будет либо пустая строка, либо последнее валидное значение -->
        <input name="name"
               placeholder="Имя" required <?php print('value="' . $values['name'] . '"'); if ($errors['name']) print(' class="error"'); ?>>
    </label><br>

    <label>
        E-mail:<br>
        <input name="email"
               type="email"
               placeholder="e-mail" required <?php print('value="' . $values['email'] . '"'); if ($errors['email']) print(' class="error"'); ?>>
    </label><br>

    <label>
        Год рождения:<br>
        <select name="year" <?php  if ($errors['year']) print('class="error"'); ?>>
            <?php
            for ($i = 1923; $i <= 2023; $i++) {
                printf('<option value="%d"'. (intval($values['year'])==$i ? 'selected' : '') .'>%d год</option>', $i, $i);
            }
            ?>
        </select>
    </label><br>

    Пол: <br>
    <label><input type="radio"
                  name="gender" value="0" required <?php if(intval($values['gender'])==0) print ("checked");  if ($errors['gender']) print(' class="error"');?>>
        Мужской</label>
    <label><input type="radio"
                  name="gender" value="1" required <?php if(intval($values['gender'])==1) print ("checked"); if ($errors['gender']) print(' class="error"');?>>
        Женский</label><br>

    Количество: <br>
    <label>
        <!-- !$values['limbs'] - отрицаем int, получаем ноль -->
        <!-- и сравниваем с пустой строкой (проверка с приведением типов), -->
        <!-- т.е. проверяем, есть ли там что-то -->
        <input type="radio"
                  name="limbs" value="1" required <?php if(!$values['limbs']=='' && intval($values['limbs'])==1) print ("checked"); if ($errors['limbs']) print(' class="error"');?>>
        1</label>
    <label><input type="radio"
                  name="limbs" value="2" required <?php if(!$values['limbs']=='' && intval($values['limbs'])==2) print ("checked"); if ($errors['limbs']) print(' class="error"');?>>
        2</label>
    <label><input type="radio"
                  name="limbs" value="3" required <?php if(!$values['limbs']=='' && intval($values['limbs'])==3) print ("checked"); if ($errors['limbs']) print(' class="error"');?>>
        3</label>
    <label><input type="radio"
                  name="limbs" value="4" required <?php if(!$values['limbs']=='' && intval($values['limbs'])==4) print ("checked"); if ($errors['limbs']) print(' class="error"');?>>
        4</label><br>

    <label>
        Суперсилы:
        <br>
        <select name="powers[]"
                multiple="multiple">
            <option value="Invincibility" <?php if(intval($values['invincibility'])==1) print ("selected") ?>>Бессмертие</option>
            <option value="Noclip" <?php if(intval($values['noclip'])==1) print ("selected") ?>>Хождение сквозь стены</option>
            <option value="Levitation" <?php if(intval($values['levitation'])==1) print ("selected") ?>>Левитация</option>
        </select>
    </label><br>

    <label>
        Биография:<br>
        <textarea name="biography"><?php print($values['biography']); ?></textarea>
    </label><br>

    Согласие c лицензионным соглашением:<br>
    <label><input type="checkbox"
                  name="check" required <?php if(intval($values['check'])==1) print ("checked"); if ($errors['check']) print(' class="error"'); ?>>
        Да</label><br>

    <input type="submit" value="Отправить">
    <!-- При нажатии на кнопку будет отправлен POST-запрос на index.php -->
</form>
</body>
</html>
