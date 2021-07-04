<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
 
  <?include ROOT.'/Views/Layouts/CSS.php';?>
</head>
<body class='d-flex align-items-center flex-column mt-4'>
<div class="">
<?php if (isset($errors) && is_array($errors)): ?>
                        <?php foreach ($errors as $error): ?>
                        <br>
                            <div class=" media alert alert-warning alert-dismissible fade show" role="alert"><?php echo $error; ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
                        <?php endforeach; ?>
                        </div>
                <?php endif; ?></div>
                
<div class="  mt-4  ">

<div class="card">

<h5 class="card-header info-color white-text text-center py-4">
    <strong>Панель администратора</strong>
</h5>

<div class="card-body ">

    <form action="#" method="post" class="md-form" style="color: #757575;">

        <input type="text" id="login" name="login" class="form-control" placeholder="Логин">
       


        <input type="password"  name="password" id="password" class="form-control" placeholder="Пароль">
        


        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="submit">Войти</button>

    </form>
</div>
</div>

</div>

  <!-- End  project -->
  <?include ROOT.'/Views/Layouts/JS.php';?>
</body>
</html>