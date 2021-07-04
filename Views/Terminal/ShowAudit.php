<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Преподаватель</title>
    <?include ROOT.'/Views/Layouts/CSS.php';?>
</head>
<body>
<div class="h-100 d-flex flex-row justify-content-start align-items-baseline">
<a href="/terminal/"> <button type="button" class="btn btn-primary btn-lg  mt-2" style="box-shadow: none !important;" > <b>На главную</b></button></a>

</div>

<div class="">

<?
foreach($name_list as $key => $value):?>
           
             <div class="m-2">
            <hr>
             <details class="ml-3 text-center"  style=" box-shadow:none; border:none;">
            <summary class="  card-header z-depth-1 text-uppercase mb-0 py-1 " style="background-color: transparent !important; box-shadow:none !important;   list-style: none;  border:none !important;"> <p class=" m-0 blue-text font-weight-bold" >Аудитория <?echo $key?></p></summary> 
             <div class="mt-3">
        </div> 
        <div class="table-responsive pl-1 ml-2 text-center" > 
            <table id="dtBasicExample" class="table  table-lg caption-top table-striped table-bordered pt-2 pr-0" cellspacing="0" width="100%">

        <thead class="table-dark ">
            <tr>
            <th class="th-sm">Время
            </th>
            <th class="th-sm">Предмет
            </th>
            <th class="th-sm">Преподаватель
            </th>
            <th class="th-sm">Группа
            </th>
            

            </tr>
        </thead>
        <tbody>
          <? foreach ($value as $iKey => $iValue):?>
                
       <tr>
        <td class="pl-3"><?echo $iValue['ИД_занятия'].'.'.$iValue['Время_начала'].' - '.$iValue['Время_окончания']?></td>
        <td class="pl-3"><?echo $iValue['Наименование_дисциплины']?></td>
        <td class="pl-3"><?echo $iValue['Фамилия_Инициалы_Преподавателя']?></td>
        <td class="pl-3"><?echo $iValue['Наименование_Группы']?></td>
        </tr>
            <?endforeach;?>
             
            </tbody>

             </table>

             </div>
             </details> </div>
             
              

        <?endforeach;?>


</div>

<?include ROOT.'/Views/Layouts/JS.php';?>
</body>
</html>




