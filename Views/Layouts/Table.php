<div class="mt-3">
     <h2 class="p2 ml-2">Расписание для группы: <? echo $TableList[1]['Group'];?> <br> На:  <?echo  $TableList[1]['Date'];?></h2>
   
  </div> 
<div class="table-responsive pl-1 ml-2 text-center" > 
    <table id="dtBasicExample" class="table  table-lg caption-top table-striped table-bordered pt-2 pr-0" cellspacing="0" width="100%">
   
  <thead class="table-dark ">
    <tr>
    <th class="th-sm">Время
      </th>
      <th class="th-sm">Предмет
      </th>
      <th class="th-sm">Аудитория
      </th>
      <th class="th-sm">Преподаватель
      </th>
    

    </tr>
  </thead>
  <tbody>
  <?foreach ( $TableList as  $value):?>
    <tr>
    <td class="pl-3"><?echo  $value ['Para'];?>. <?echo  $value ['Start'];?>-<?echo  $value ['End'];?></td>
    <td class="pl-3"><?echo  $value ['Subject'];?></td>
      <td class="pl-3"><?echo  $value ['Audit'];?></td>
      <td class="pl-3"><?echo  $value ['Teacher'];?></td>
      
    </tr>
    <? endforeach;?>
  </tbody>
 
</table>

</div>