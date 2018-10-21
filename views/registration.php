<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='views/style/style.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="head">
<div class="auth">
    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-2">
<form method="post">
    <input class="form-control" type="text" name="reg_name" placeholder="Your name"><br/>
    <input class="form-control" type="text" name="reg_login" placeholder="Your login"><span style="color: red"><?php echo !empty($_SESSION['error_registr_log']) ? $_SESSION['error_registr_log'] . '<br/>' : '';?></span><br/>
    <input class="form-control" type="text" name="reg_password" placeholder="Your password"><br/>
    <span style="color: red"><?php echo !empty($_SESSION['error_registr_log_pass']) ? $_SESSION['error_registr_log_pass'] . '<br/>' : '';?></span><span style="color: red"><?php echo !empty($_SESSION['error_registr_empty']) ? $_SESSION['error_registr_empty'] . '<br/>' : '';?></span><br/>
    <button type="submit" class="btn btn-success" name="send">Отправить</button>
</form>
        </div>
        <div class="col-sm-5"></div>
    </div>
</div>
