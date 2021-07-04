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
    <h2>Предпросмотр файла <?echo $title?></h2>
<div class="table-responsive pl-1 ml-2 " > 
    <table id="dataTable"  class="table  table-lg caption-top table-striped table-bordered pt-2 pr-0" cellspacing="0" width="100%">
   <b>
    <thead class="table-dark  text-center">
        <tr>
        <th class="th-sm"><b>Ид</b>
        </th>
        <th class="th-sm" title="Дата начала расписания - Дата конца расписания"  ><b>Занятие</b>
        </th>
        <th class="th-sm"  title="Когда был загружен файл"  ><b>Группа</b>
        </th>
        <th class="th-sm" title="Время загрузки файла"><b>Аудитория</b>
        </th>
        <th class="th-sm" title="Время загрузки файла"><b>Предмет</b>
        </th>
        <th class="th-sm" title="Файл будет загружен в базу данных" ><b>Преподаватель</b>
        </th>
        <th class="th-sm" title="Элементы управления" ><b>Дата</b>
        </th>
        </tr>
  </thead>
  <tbody class='text-center'>
  <?foreach ($FileList as  $row):?>
    <tr>
                        <td class="pl-3"><b><?echo $row['ИД_строки']?></b></td>
                        <td class="pl-3"><b><?echo $row['ИД_занятия']?></b></td>
                        <td class="pl-3"><b><?echo $row['Группа']?></b></td>
                        <td class="pl-3"><b><?echo $row['Аудитория']?></b></td>
                        <td class="pl-3"><b><?echo $row['Предмет']?></b></td>
                        <td class="pl-3"><b><?echo $row['ФИО_Преподавателя']?></b></td>
                        <td class="pl-3"><b><?echo $row['Дата']?></b></td>
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