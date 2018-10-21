<?php
getHeader();

class Ticket{
    public function getInfoReserv(){
        $ask_reserv_ticket = "SELECT * FROM reserv_ticket WHERE user_login='".$_SESSION['auth']['login']."'";
        $query = mysqli_query(ConDB::connect(), $ask_reserv_ticket);
        while($res[] = mysqli_fetch_assoc($query)){
            $res_tick = $res;
        }
        return $res_tick;
    }

    public function getInfoCategory(){
        $askInfoCateg = "SELECT * FROM category_places";
        $query = mysqli_query(ConDB::connect(), $askInfoCateg);
        while($res[] = mysqli_fetch_assoc($query)){
            $infoCateg = $res;
        }
        return $infoCateg;
    }

    public function getPrice(){
        $price = 0;
        foreach (self::getInfoReserv() as $reserv){
            $category_and_places = unserialize($reserv['category_and_places']);
            foreach ($category_and_places as $category=>$places){
                foreach (self::getInfoCategory()as $value){
                    if($value['category_id'] == $category){
                        $price += $value['price'] * count($places);
                    }
                }
            }
        }
        return $price;
    }

    public function getTicket()
    {
        if (!empty(self::getInfoReserv())) {
            foreach (self::getInfoReserv() as $reserv) {
                $category_and_places = unserialize($reserv['category_and_places']);
                $ticket = array(
                    'ID' => $reserv['id'],
                    'Name' => $reserv['user_name'],
                    'Num_places' => $reserv['num_places'],
                    'Category_and_places' => $category_and_places,
                    'Price' => self::getPrice(),
                    'Categories' => self::getInfoCategory()
                );
            }
            return $ticket;
        }
    }
}
if(!empty($_SESSION['auth'])){
    getView('ticket', Ticket::getTicket());
}else{
   getView('404');
}

?>