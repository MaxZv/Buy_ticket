<?php
    class ValidAuth{
        public function validForm($login = '', $password = '')
        {
            unset($_SESSION['auth']);
            $login = trim($login);
            $password = trim($password);
            if (isset($_POST['enter'])) {
                if (!empty($login) && !empty($password)) {
                    if ((strlen($login) <= 10) && (strlen($password) <= 8) && (strpos($login, ' ') === false) && (strpos($password, ' ') === false)) {
                        unset($_SESSION['error_log_pass']);
                        foreach (self::searchInDb() as $key => $us) {

                            if ($login == $us['login']) {
                                if ($password == $us['password']) {
                                    $_SESSION['auth']['name'] = $us['name'];
                                    $_SESSION['auth']['login'] = $us['login'];
                                    $_SESSION['auth']['max_reserv'] = $us['max_reserv'];
                                    $_SESSION['auth'];
                                }
                            }

                        }

                        if (empty($_SESSION['auth'])) {
                            $_SESSION['error_log'] = 'Неправильный логин или пароль';
                        }

                    } else {

                        $_SESSION['error_log_pass'] = 'Логин или пароль не соответсвует требованиям';
                    }
                } else {

                    $_SESSION['error_empty'] = 'Поля не могут быть пустыми';
                }
            }
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


    $val = new ValidAuth();
   $val->validForm($_POST['login'], $_POST['password']);
if(isset($_POST['registration'])){
    header('Location: http://myprogress/project2/index.php?route=registration');
}
if(isset($_POST['enter']) && empty($_SESSION['error_log']) && empty($_SESSION['error_log_pass']) && empty($_SESSION['error_empty'])){
    header('Location: http://myprogress/project2/index.php?route=main');
}
getView('auth');
unset($_SESSION['error_empty']);
unset($_SESSION['error_pass']);
unset($_SESSION['error_log']);
unset($_SESSION['error_log_pass']);

//var_dump($_SESSION);

?>