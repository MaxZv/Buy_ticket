<?php
//var_dump($_POST);
class Reserv extends ResDb {
    public function choicePlace($post, $name, $login, $maxRes)
    {
        if (!empty($post)){
                $max_all_place = 0;
            foreach ($post as $key_post => $val_post) {//разбираем POST, получаем места по категориям
                $max_all_place += count($val_post);
                foreach (self::categ_pl() as $key_categ => $val_categ) {//Получаем категории из БД
    //                var_dump($val_categ['category_id']);
                    if ($key_post == $val_categ['category_id']) { //проверяем соответствие категории с выбраными местами
                        if (count($val_post) <= $val_categ['num_places']) {//проверяем на максимальное колличество возможных для брони мест в конкретной категории
                            $max_category_place = true;
                        } else {
                            $max_category_place = false;
                        }
                    }
                }
            }

            $log = array();
            if (!empty(self::ticket())) {
                foreach (self::ticket() as $key_resTick => $resTick) {
                    $log[] = $resTick['user_login']; //массив со всеми логинами в таблице reserv_ticket
                }
            }


            if ($max_category_place === true) {
                if ($max_all_place <= $maxRes) {
                    $categ_and_places = serialize($post);//конвертируем массив с категориями и номерами мест для хранения в бд
                    if (!in_array($_SESSION['auth']['login'], $log)) {
                        $create_reserv = "INSERT INTO reserv_ticket SET user_name='" . $name . "', user_login='" . $login . "', num_places='" . $max_all_place . "', category_and_places='" . $categ_and_places . "'";//Вносим данные резерва в базу данных
                        mysqli_query(ConDB::connect(), $create_reserv);
                    } else {
                        $update_reserv = "UPDATE reserv_ticket SET num_places='" . $max_all_place . "', category_and_places='" . $categ_and_places . "' WHERE user_login='" . $login . "'";
                        mysqli_query(ConDB::connect(), $update_reserv);
                    }

                } else {
                    $_SESSION['error_limit_places'] = 'Привышен лимит мест для бронирования';
                }
            } else {
                $_SESSION['error_limit_places_categ'] = 'Превышен лимит мест в категории';
            }
        }else{
            $_SESSION['error_choose'] = 'Пожалуйста, выберите место';
        }

    }
    public function controlReservedPlaces(){
        if(!empty(self::ticket())){
            foreach (self::ticket() as $key_resTick=>$resTick){
               $allReservedPlaces[] = unserialize($resTick['category_and_places']);
            }
            return $allReservedPlaces;
        }
    }
}
class ResDb{
    public function categ_pl(){
        $ask_categor_place = "SELECT * FROM category_places";
        $query = mysqli_query(ConDB::connect(), $ask_categor_place);
        while($res[] = mysqli_fetch_assoc($query)){
            $categ = $res;
        }
       return $categ;
    }
    public function ticket(){
        $ask_reserv_ticket = "SELECT * FROM reserv_ticket";
        $query = mysqli_query(ConDB::connect(), $ask_reserv_ticket);
        while($res[] = mysqli_fetch_assoc($query)){
            $res_tick = $res;
        }
        return $res_tick;
    }

    public function user(){
        $search_user = "SELECT * FROM user";
        $query = mysqli_query(ConDB::connect(), $search_user);
        while($res[] = mysqli_fetch_assoc($query)){
            $user = $res;
        }
        return $user;
    }
}
getHeader();
$user_reserv = new Reserv();
if(!empty($_SESSION['auth'])){ // Проверка авторизации
    $user_reserv->choicePlace($_POST, $_SESSION['auth']['name'], $_SESSION['auth']['login'], $_SESSION['auth']['max_reserv']);
}else{
   $_SESSION['error_no_auth'] = 'Для резервирования мест необходимо авторизироваться';
}
getView('main', Reserv::controlReservedPlaces()); //
unset($_SESSION['error_no_auth']);
unset($_SESSION['error_limit_places']);
unset($_SESSION['error_limit_places_categ']);
unset($_SESSION['error_choose']);



//$qw = new ResDb();
//var_dump($qw->ticket()['user_login']);
getFooter();
//$request->getView('header');



?>