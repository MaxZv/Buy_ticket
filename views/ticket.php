<div class="content">
<?php
if(!empty($data)) {
    $ticket = 'Персональный номер заказов: ' . $data['ID'] . '<br/>' . 'Имя: ' . $data['Name'] . '<br/>' . 'Количество забронированных мест: ' . $data['Num_places'] . '<br/>';
    echo $ticket;
    foreach ($data['Category_and_places'] as $category => $places) {
        foreach ($data['Categories'] as $value) {
            if ($category == $value['category_id']) {
                echo $value['label'] . ': ';
                foreach ($places as $place) {
                    echo $place . ' ';
                }
                echo '<br/>';
            }
//        var_dump($value['category_id']);
        }
    }
    echo 'Общая стоимость: ' . $data['Price'];
//var_dump($data['Category_and_places']);
//var_dump($data['Categories']);
}else{
    echo '<span style="color: yellow"><h1>У Вас пока нет резервов</h1></span>';
}
?>
</div>
