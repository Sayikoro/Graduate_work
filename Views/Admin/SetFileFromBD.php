<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?echo $title?></title>
  <?include ROOT.'/Views/Layouts/CSS.php';?>
</head>

<body>
<?include ROOT.'/Views/Layouts/AdminHeader.php';?>
<div class=" mt-4">
<?include ROOT.'/Views/Layouts/buttons.php';?>
<div class="table-responsive pl-1 ml-2 " > 
    <table id="dataTable"  class="table  table-lg caption-top table-striped table-bordered pt-2 pr-0" cellspacing="0" width="100%">
   <b>
    <thead class="table-dark  text-center">
        <tr>
        <th class="th-sm"><b>Ид</b>
        </th>
        <th class="th-sm" title="Дата начала расписания - Дата конца расписания"  ><b>Наименование файла</b>
        </th>
        <th class="th-sm"  title="Когда был загружен файл"  ><b>Дата загрузки</b>
        </th>
        <th class="th-sm" title="Время загрузки файла"><b>Время Загрузки</b>
        </th>
        <th class="th-sm" title="Файл будет загружен в базу данных" ><b>Утвержден</b>
        </th>
        <th class="th-sm" title="Элементы управления" ><b>Работа с файлом</b>
        </th>
        <th class="th-sm" title="Элементы управления" ><b>Редактировать строку</b>
        </th>
        </tr>
  </thead>
  <tbody class='text-center'>
  <?foreach ($fileList as  $row):?>
    <tr>
                        <td class="pl-3"><b><?echo $row['ИД_файла']?></b></td>
                        <td class="pl-3"><b><?echo $row['Имя_файла']?></b></td>
                        <td class="pl-3"><b><?echo $row['Дата_загрузки']?></b></td>
                        <td class="pl-3"><b><?echo $row['Время_Загрузки']?></b></td>
                        <td class="pl-3">
                        <div class="form-check">
                         <?if ($row['Утвержден'] == '1'):?>  <img src="../../Views/Template/img/ok.svg" alt="Утвержден" style="width:30%;height:30%"  >	 <?endif;?>
                        </td>
                        <td class="pl-3"><a href="/admin/file/<?echo $row['ИД_файла']?>" class="  media p-0 btn  mt-2 mr-2 ml-2" style="box-shadow: none !important;" title="Просмотреть"  >  <img src="../../Views/Template/img/eye.svg" alt="Просмотреть" style="width:65%;height:30%"  >	</a> 
                        <a href="/admin/insert/<?echo $row['ИД_файла']?>" class="media p-0 btn  mt-2 mr-2 ml-2" style="box-shadow: none !important;" title="Утвердить"  >  <img src="../../Views/Template/img/clip.svg" alt="Утвердить" style="width:75%;height:30%"  >	</a> 
                        </td>
                        <td class="pl-3 font-weight-bold">
                        <a href="/admin/rewrite/<?echo $link?>/<?echo $row['ИД_файла']?>" class=" media p-0 btn  mt-2 mr-2 ml-2" style="box-shadow: none !important;" title="Редактировать"  > <img src="../../Views/Template/img/rewrite.svg" alt="Очистить" style="width:100%;height:100%"  >	</a> 
                        <a href="/admin/delete/<?echo $link?>/<?echo $row['ИД_файла']?>"id="delete"  class=" media btn p-0   mt-2 mr-2 ml-2" style="box-shadow: none !important;" title="Удалить"  >   <img src="../../Views/Template/img/del.svg" alt="Очистить" style="width:100%;height:100%" ></a> </td>
                        </tr>                    
  <?endforeach;?>
  </tbody>
  </b>
</table>

</div>
</div>



  <!-- End  project -->
  <?include ROOT.'/Views/Layouts/JS.php';?>
  <script>
   $(document).ready(function() {
        
    $('#dataTable').DataTable(
         {  searching: true}
        );
      });
      
    
  </script>
</body>

</html>