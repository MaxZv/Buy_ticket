<form method="post">
    <div class="content">
        <span style="color: darkred"><?php echo $_SESSION['error_no_auth'];?></span>
        <span style="color: darkred"><?php echo $_SESSION['error_limit_places'];?></span>
        <span style="color: darkred"><?php echo $_SESSION['error_limit_places_categ'];?></span>
        <span style="color: darkred"><?php echo $_SESSION['error_choose'];?></span>

<div class="places">
<?php

if(!empty($data)) { //проверяем на пустоту массив со всеми зарезервированными местами
    foreach ($data as $val) { //перебираем эот массив
        foreach ($val as $categ => $places) { //разбиваем каждый подмассив на key=>категория и $value=>места
            if($categ == 1){ // проверяем совпадение категории
                foreach ($places as $place)  {
                    $places1[] += $place; //создаем массив с зарезервированними местами только по первой категории
                }
            }elseif($categ == 2){
                foreach ($places as $place)  {
                    $places2[] += $place; //создаем массив с зарезервированними местами только по первой категории
                }
            }elseif ($categ == 3){
                foreach ($places as $place)  {
                    $places3[] += $place; //создаем массив с зарезервированними местами только по первой категории
                }
            }
        }
    }
    for ($i = 1; $i < 31; $i++) { // создаем отображение мест путем создания чекбоксов с помощью цикла
        ?>
        <div class="form-check form-check-inline">
                    <input class="first_group form-check-input" type="checkbox" name="1[]"
                           value="<?php echo $i; ?>" <?php if(!empty($places1)){ echo in_array($i, $places1) ? 'disabled' : '';} else{ echo '';} ?> >
        </div>
                     <?php //Условие: если массив с зарезервированными местами по данной категории не пустой, то мы ищем совпадение номера места с номерами мест в массиве, если совпадение найдено то чекбоксу присваевается статус disabled, если же совпадений нет, то чекбокс остается активным. в случае если массив с зарезервированными местами по данной категории пуст, то чекбокс также остается активным
    }
    echo '<br/>';
    for ($y = 1; $y < 29; $y++) {
        ?>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="2[]"
               value="<?php echo $y; ?>" <?php if(!empty($places2)){ echo in_array($y, $places2) ? 'disabled' : '';} else{ echo '';} ?> >
    </div>
        <?php
    }
    echo '<br/>';
    for ($z = 1; $z < 27; $z++) {
        ?>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="3[]"
               value="<?php echo $z; ?>" <?php if(!empty($places3)){ echo in_array($z, $places3) ? 'disabled' : '';} else{ echo '';} ?> >
    </div>
        <?php
    }
}else{ // если массив со всеми зарезервированными местами пуст, то мы также создаем места путем активных чекбоксов, без каких либо условий
    for ($i = 1; $i < 31; $i++) {?>
        <input class="form-check-input" type="checkbox" name="1[]" value="<?php echo $i; ?>">
 <?php
    }
    echo '<br/>';
    for($y = 1; $y < 29; $y++){?>
        <input class="form-check-input" type="checkbox" name="2[]" value="<?php echo $y; ?>">
 <?php
    }
    echo '<br/>';
    for($z = 1; $z < 27; $z++){?>
        <input class="form-check-input" type="checkbox" name="3[]" value="<?php echo $z; ?>">
        <?php
    }
}
?>
</div>
<!--<div class="second_group">-->
<!--<input type="checkbox" name="2[]" value="1">-->
<!--<input type="checkbox" name="2[]" value="2">-->
<!--<input type="checkbox" name="2[]" value="3">-->
<!--<input type="checkbox" name="2[]" value="4">-->
<!--<input type="checkbox" name="2[]" value="5">-->
<!--<input type="checkbox" name="2[]" value="6">-->
<!--<input type="checkbox" name="2[]" value="7">-->
<!--<input type="checkbox" name="2[]" value="8">-->
<!--</div>-->
<div class="third_group">
<!--<input type="checkbox" name="3[]" value="1">-->
<!--<input type="checkbox" name="3[]" value="2">-->
<!--<input type="checkbox" name="3[]" value="3">-->
<!--<input type="checkbox" name="3[]" value="4">-->
<!--<input type="checkbox" name="3[]" value="5">-->
<!--<input type="checkbox" name="3[]" value="6">-->
</div>
        <div class="screen">
            ___________________
            <br/>
            <h2>Сцена</h2>
        </div>
        <?php if(!empty($_SESSION['auth'])){?>
            <button type="submit" class="btn btn-success">Забронировать</button>
        <?php }?>
    </div>

</form>

<!--<input type="checkbox" name="1[]" value="1">-->
<!--<input type="checkbox" name="1[]" value="2">-->
<!--<input type="checkbox" name="1[]" value="3">-->
<!--<input type="checkbox" name="1[]" value="4">-->
<!--<input type="checkbox" name="1[]" value="5">-->
<!--<input type="checkbox" name="1[]" value="6">-->
<!--<input type="checkbox" name="1[]" value="7">-->
<!--<input type="checkbox" name="1[]" value="8">-->
<!--<input type="checkbox" name="1[]" value="9">-->
<!--<input type="checkbox" name="1[]" value="10">-->
