<?php
if(!empty($_POST['exit'])){
    unset($_SESSION['auth']);
    header('Location: http://myprogress/project2/index.php?route=main');
}
getView('header');
?>
