<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?include ROOT.'/Views/Layouts/CSS.php';?>
    <title>Терминал</title>
</head>
<body>

<div class=" mt-3 pt-3">

<div class="">

<div class="h-100 d-flex flex-row justify-content-between align-items-baseline">
<h3 class=''>  <p class='p-o m-0' id = 'selectdate'>Выберите преподавателя</p></h3>
<a href="/terminal/"> <button type="button" class="btn btn-primary btn-lg  mt-2" style="box-shadow: none !important;" > <b>На главную</b></button></a>

</div>
</div>

    <div  class="">
<?foreach ($TeacherList as $T ) :?>

    <a href="/terminal/<?echo $select?>/<?echo $T['ИД_преподавателя']?>"><button type="button" class="btn blue-grey lighten-3 text-dark btn-lg mt-2" style="width:330px; height:112px;box-shadow: none !important;"><h3><b><?echo $T['Фамилия_Инициалы_Преподавателя']?></b></h3></button></a>
 

<?endforeach?>

<br>
  </div>
  
</div> 
</div>  
  

  <?include ROOT.'/Views/Layouts/JS.php';?>
</body>
</html>