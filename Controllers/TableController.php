<?
require ROOT.'/Models/Table.php';
class TableController
{
    
public function actionIndex(){
        $teacherList = Table::getTeacherList();
        $GroupList = Table::getGroupList();
        $CorpList = Table::getCorpList();
        $lesson = Table::getParaList();
        $mindate = Table::getMinDate();
        $maxdate = Table::getMaxDate();
      
        list($Min_day , $Min_month,$Min_year ) = explode("-", $mindate['MIN(`Дата_занятия`)']); 
        $Min_month = trim($Min_month, "0") - 1;
        list($Max_day, $Max_month,$Max_year) = explode("-", $maxdate['MAX(`Дата_занятия`)']); 
        $Max_month = trim($Max_month, "0") - 1;
        //$date = date("d-m-Y");
        $title = "Главная";
        include_once (ROOT.'/Views/Table/index.php');
        return true; 
 
}

 
public function actionTeacher($date,$selectTeacher){ 
        if ($date == '0.0.0' || $selectTeacher == 0 )
        {
            $teacherTable = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка!</strong> Дата или преподаватель не выбраны.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';   
        }
        
        else
        {
            $teacherTable = Table::getTeacherTable($date,$selectTeacher);
        }
       
        echo $teacherTable;
}
public function actionGroup($date,$selectGroup){ 

        if ($date == '0.0.0' || $selectGroup == 0 )
        {
            $GroupTable = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка!</strong> Дата или группа не выбраны.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';   
        }
        
        else
        {
            $GroupTable = Table::getGroupTable($date,$selectGroup);
        }
       
        echo $GroupTable;
}
public function  actionAudit($date,$selectAudit)
{

  if ($date == '0.0.0' || $selectAudit == 0 )
        {
            $AuditTable = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка!</strong> Дата или группа не выбраны.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';   
        }
        

        
        else
        {
            $table = '';
            $name_list = array();
            $AuditList = Table::getAuditListbyCorpId($selectAudit);
            $i = 0;
            $name_list= Table::getAuditTable($date,$AuditList);
          
        
           echo '<br><h2>Загруженность аудиторий на: '. $date.'</h2>';
  
           foreach($name_list as $key => $value)
           {
             echo '<div class="m-2">';
             echo '<hr>';
            echo ' <details class="ml-3"  style=" box-shadow:none; border:none;">';
            echo '<summary class="  card-header z-depth-1 text-uppercase mb-0 py-1 " style="background-color: transparent !important; box-shadow:none !important;   list-style: none;  border:none !important;"> <p class=" m-0 blue-text font-weight-bold" >Аудитория '.$key.'</p></summary> ';
            echo '  <div class="mt-3">
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
        <tbody>';
            foreach ($value as $iKey => $iValue) {
                
        echo '<tr>
        <td class="pl-3">'.$iValue['ИД_занятия'].'.'.$iValue['Время_начала'].' - '.$iValue['Время_окончания'].'</td>
        <td class="pl-3">'.$iValue['Наименование_дисциплины'].'</td>
        <td class="pl-3">'.$iValue['Фамилия_Инициалы_Преподавателя'].'</td>
        <td class="pl-3">'.$iValue['Наименование_Группы'].'</td>
        </tr>';
             }
             
             echo ' </tbody>

             </table>

             </div>';
             echo '</details> </div>';
             
              

            }
          }
    //print_r($name_list) ;

}
public function actionAddRowToRaspisanie(){ 
  if (isset($_POST['date']))
   { 
     
    $response = Table::addRowRaspisanie($_POST['para'],$_POST['group'],$_POST['subgect'],$_POST['audit'],$_POST['teacher'],$_POST['date']);
    if ($response == 1)
      {
          $response  =   '<div class="alert alert-success " role="alert">
          <strong>Успешно!</strong> Ваш запрос успешно обработался. Страница автоматически перезагрузится.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      }
      else
      {
          $response =    '<div class="alert alert-danger " role="alert">
          <strong>Ошибка1!</strong> Ваш запрос не выполнен.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>';  
      }
    }
    else
      {
        $response =   '<div class="alert alert-danger " role="alert">
          <strong>Ошибка2!</strong> Ваш запрос не выполнен.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>';  
      }
      echo $response;
  }
public function actionAddRowToPara($start,$end)
  {
    $response = Table::AddRowToPara($start,$end);
      if ($response == 1)
        {
            $response  = '<div class="alert alert-success " role="alert">
            <strong>Успешно!</strong> Ваш запрос успешно обработался. Страница автоматически перезагрузится.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else
        {
            $response = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка!</strong> Ваш запрос не выполнен.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';  
        }
        echo $response;
  }
public function actionAddRowTogroup()
  {
    if(isset($_POST['group']))
    {
    
    
    $response = Table::AddRowTogroup($_POST['group']);
      if ($response == 1)
        {
            $response  = '<div class="alert alert-success " role="alert">
            <strong>Успешно!</strong> Ваш запрос успешно обработался. Страница автоматически перезагрузится.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else
        {
            $response = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка!</strong> Ваш запрос не выполнен.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';  
        }
      }
      else {
        $response = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка!</strong> Ваш запрос не выполнен.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>'; 

      }
        echo $response; 
  }

public function actionAddRowTosubj()
  {
    if(isset($_POST['subj']))
    {
    
    
    $response = Table::AddRowTosubj($_POST['subj']);
      if ($response == 1)
        {
            $response  = '<div class="alert alert-success " role="alert">
            <strong>Успешно!</strong> Ваш запрос успешно обработался. Страница автоматически перезагрузится.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else
        {
            $response = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка!</strong> Ваш запрос не выполнен.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';  
        }
      }
      else {
        $response = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка!</strong> Ваш запрос не выполнен.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>'; 

      }
        echo $response; 
  }

public function actionAddRowTocorp()
  {
    if(isset($_POST['corp']))
    {
    
    
    $response = Table::AddRowTocorp($_POST['corp']);
      if ($response == 1)
        {
            $response  = '<div class="alert alert-success " role="alert">
            <strong>Успешно!</strong> Ваш запрос успешно обработался. Страница автоматически перезагрузится.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else
        {
            $response = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка!</strong> Ваш запрос не выполнен.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';  
        }
      }
      else {
        $response = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка!</strong> Ваш запрос не выполнен.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>'; 

      }
        echo $response; 
  }
public function actionAddRowToaudit()
  {
    if(isset($_POST['Audit']))
    {
    
    
    $response = Table::AddRowToaudit($_POST['Audit'],$_POST['corpforaudit']);//$_POST['Audit'].$_POST['corpforaudit']; 
      if ($response == 1)
        {
            $response  = '<div class="alert alert-success " role="alert">
            <strong>Успешно!</strong> Ваш запрос успешно обработался. Страница автоматически перезагрузится.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else
        {
            $response = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка1!</strong> Ваш запрос не выполнен.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';  
        }
      }
      else {
        $response = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка2!</strong> Ваш запрос не выполнен.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>'; 

      }
        echo $response; 
  }

public function actionAddRowToteacher()
  {
    if(isset($_POST['teacher']))
    {
    
    
    $response =  Table::AddRowToteacher($_POST['teacher']);
    
      if ($response == 1)
        {
            $response  = '<div class="alert alert-success " role="alert">
            <strong>Успешно!</strong> Ваш запрос успешно обработался. Страница автоматически перезагрузится.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else
        {
            $response = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка1!</strong> Ваш запрос не выполнен.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';  
        }
      }
      else {
        $response = '<div class="alert alert-danger " role="alert">
            <strong>Ошибка2!</strong> Ваш запрос не выполнен.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>'; 

      }
        echo $response; 
  }

public function actionTest()
  {

  }

}