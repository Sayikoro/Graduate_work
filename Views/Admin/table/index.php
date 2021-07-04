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
   
    <thead class="table-dark  text-center">
        <tr>
        <th class="th-sm">Время
        </th>
        <th class="th-sm">Группа
        </th>
        <th class="th-sm">Предмет
        </th>
        <th class="th-sm">Аудитория
        </th>
        <th class="th-sm">Преподаватель
        </th>
        <th class="th-sm">Дата занятия
        </th>
        <th class="th-sm">Редактировать
        </th>
        

        </tr>
  </thead>
  <tbody class='text-center'>
  <?echo $table;?>
  </tbody>
 
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