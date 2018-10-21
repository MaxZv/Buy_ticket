<?php
class Registration{
    public function valRegForm($name = '', $login = '', $password = '')
    {
        $name = trim($name);
        $login = trim($login);
        $password = trim($password);
        foreach (self::searchInDb() as $us) {
            $logins[] = $us['login'];
        }
        if (isset($_POST['send'])) {
            if (!empty($name) && !empty($login) && !empty($password)) {
                if ((strlen($login) <= 10) && (strlen($password) <= 8) && (strpos($login, ' ') === false) && (strpos($password, ' ') === false) && (strpos($name, ' ') === false)) {
                    if (!in_array($login, $logins)) {
                        self::addInfoToDb($name, $login, $password);
                    } else {
                        $_SESSION['error_registr_log'] = 'Такой логин уже сущесвует';
                    }
                } else {
                    $_SESSION['error_registr_log_pass'] = 'Логин или пароль не соответсвует требованиям';
                }
            } else {
                $_SESSION['error_registr_empty'] = 'Все поля обязательны для заполнения';
            }
        }
    }
    public function addInfoToDb($name, $login, $password){
        $add_reg_info = "INSERT INTO user SET name='".$name."', login='".$login."', password='".$password."'";
        $reg_query = mysqli_query(ConDB::connect(), $add_reg_info);
    }

    public function searchInDb(){
        $search_user = "SELECT * FROM user";
        $query = mysqli_query(ConDB::connect(), $search_user);
        while($res[] = mysqli_fetch_assoc($query)){
            $user = $res;
        }
        return $user;
    }
}

$usReg = new Registration();
$usReg->valRegForm($_POST['reg_name'], $_POST['reg_login'], $_POST['reg_password']);
if(isset($_POST['send']) && empty($_SESSION['error_registr_log']) && empty($_SESSION['error_registr_log_pass']) && empty($_SESSION['error_registr_empty'])){
    header('Location: http://myprogress/project2/index.php?route=auth');
}
getView('registration');
unset($_SESSION['error_registr_log']);
unset($_SESSION['error_registr_log_pass']);
unset($_SESSION['error_registr_empty']);

?>