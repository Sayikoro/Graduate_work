<?
require ROOT.'/Models/Table.php';
require ROOT.'/Models/User.php';
require ROOT.'/Models/File.php';
class FileController
{
   
    public function actionLoadFile()
        {
            if( isset( $_POST['my_file_upload'] ) ){  

                // $file      = $_FILES;
                // var_dump( $file);
                
                // // Каталог, в который мы будем принимать файл:
                $uploaddir = 'Uploads/';
                if( ! is_dir( $uploaddir ) ) mkdir( $uploaddir, 0777 );
                $uploadfile = 'Расписание('.date("Y.m.d").'-'.date('H:i').').dbf';
                $uploadTo = $uploaddir.$uploadfile ;
                //echo $uploadTo;

                // Копируем файл из каталога для временного хранения файлов:
                if (move_uploaded_file($_FILES[0]['tmp_name'], $uploadTo))
                {
                    $data = '
                    <div class="alert alert-success " role="alert">
                        <strong>Успешно!</strong> Файл загружен успешно.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                    $AddRowToFile = Table::AddRowTofile($uploadfile,date("Y-m-d "),date('H:i'),$uploadTo);
                }
                else { $data = '
            
                    <div class="alert alert-danger " role="alert">
                    <strong>Ошибка!</strong> Файл не был загружен.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                }


            echo $data;
        
            }
        }
    public function actionShowfile($id)
        {
            try {
            $FileInfo =   Table::getFileListById($id);
                // Путь к файлу БД
            $db_path = $FileInfo['Ссылка'];
            $db = File::OpenFIle($db_path);
            $record_numbers = dbase_numrecords($db);
            for ($i = 1; $i <= $record_numbers; $i++) {
                $row = dbase_get_record_with_names($db, $i) ;
                $row =  mb_convert_encoding($row, "utf-8", "CP866");
                //var_dump( $row);
                $FileList[$i]['ИД_строки'] = $i;
                $FileList[$i]['Группа'] = $row['GROUP'];
                $FileList[$i]['Предмет'] = $row['SUBJECT'];
                $FileList[$i]['ФИО_Преподавателя'] = $row['NAME'];
                $FileList[$i]['Дата'] = $row['DATE'];
                $FileList[$i]['Аудитория'] = $row['AUD'];
                $FileList[$i]['ИД_занятия'] = $row['LES'];
            

            }
            $title = $FileInfo['Имя_файла'];
            include_once (ROOT.'/Views/Admin/ShowFile.php');
            return true; 
            
            } catch (Exception $e) {
                echo 'Выброшено исключение: ',  $e->getMessage(), "<br>";
            }
        }

        public function actionInsertIntoDB($file_Id)
    {
        
        try {
             //открытие и обработка файла
            $FileInfo =   Table::getFileListById($file_Id);
            //$title = $FileInfo['Имя_файла'].' успешно утвержден';
            $db_path = $FileInfo['Ссылка'];
            $db = File::OpenFIle($db_path);
            $record_numbers = dbase_numrecords($db);  
            //обработка данных и приведение в унифицированный вид
            $GroupList = array_unique(File::GetGroup($record_numbers,$db));
            $SubjList  = array_unique(File::GetSubj($record_numbers,$db));
            $TeacherList = array_unique(File::GetTeacher($record_numbers,$db));
            $AuditList = array_unique(File::GetAudit($record_numbers,$db));
            sort($TeacherList);
            sort($GroupList);
            sort($SubjList);
            sort($AuditList);
            $result = File::AddToFullTables($TeacherList,$GroupList,$SubjList,$AuditList);

            if ($result == true)
            {
                for ($t = 1; $t <= $record_numbers; $t++) {
                    $row = dbase_get_record_with_names($db, $t) ;
                    $row =  mb_convert_encoding($row, "utf-8", "CP866");
                    $TeacherId = File::getIdByNameFromTeacher($row['NAME']); 
                    $GroupId = File::getIdByNameFromGroup($row['GROUP']);
                    $SubjId= File::getIdByNameFromSubj($row['SUBJECT']);
                    $Auditid = File::getIdByNameFromAudit(mb_strtolower( str_replace(" ", '',str_replace(".", ' ',$row['AUD']))));
                    $date = new DateTime($row['DATE']);
                    $date = $date->format('Y.m.d');
                    echo $date;
                    $count = Table::addRowRaspisanie($row['LES'],$GroupId['ИД_группы'],$SubjId['ИД_дисциплины'],$Auditid['ИД_аудитории'],$TeacherId['ИД_преподавателя'], $date);
               

                }
            echo 'Все сделано';
            }
            else
            {
                echo 'Нихуя не работает давай по новой';
            }

        
            
            } catch (Exception $e) {
                echo 'Выброшено исключение: ',  $e->getMessage(), "<br>";
            }

    }
}


?>