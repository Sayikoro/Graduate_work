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
        <th class="th-sm"><b>Номер занятия</b>
        </th>
        <th class="th-sm"><b>Начало занятия</b>
        </th>
        <th class="th-sm"><b>Конец занятия</b>
        </th>
        <th class="th-sm"><b>Редактировать</b>
        </th>
        </tr>
  </thead>
  <tbody class='text-center'>
  <?foreach ($paraList as  $row):?>
    <tr>
                        <td class="pl-3"><b><?echo $row['ИД_занятия']?></b></td>
                        <td class="pl-3"><b><?echo $row['Время_начала']?></b></td>
                        <td class="pl-3"><b><?echo $row['Время_окончания']?></b></td>
                        <td class="pl-3 font-weight-bold"><a href="/admin/rewrite/<?echo $link?>/<?echo $row['ИД_занятия']?>" class=" media p-0 btn  mt-2 mr-2 ml-2" style="box-shadow: none !important;"> <img src="../../Views/Template/img/rewrite.svg" alt="Очистить" style="width:100%;height:100%"  >	</a> 
                        <a href="admin/delete/<?echo $link?>/<?echo $row['ИД_занятия']?>"id="delete"  class=" media btn p-0   mt-2 mr-2 ml-2" style="box-shadow: none !important;" >   <img src="../../Views/Template/img/del.svg" alt="Очистить" style="width:100%;height:100%" ></a> </td>
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