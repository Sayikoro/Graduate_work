<?php

class Table
{
    public static function getTeacherList()
        {
                $db = Db::getConnection();
                $TeacherList = array();
                $result = $db->query('SELECT * FROM `Преподаватель`');
                $i = 0;
                
                while ($row = $result->fetch())
                {
                        $TeacherList[$i]['ИД_преподавателя'] = $row['ИД_преподавателя'];
                        $TeacherList[$i]['Фамилия_Инициалы_Преподавателя'] = $row['Фамилия_Инициалы_Преподавателя'];
                        $i++;
                    }
            return $TeacherList;

        }
    public static function getSubgectList()
        {
                $db = Db::getConnection();
                $TeacherList = array();
                $result = $db->query('SELECT * FROM `Дисциплина`');
                $i = 0;
                
                while ($row = $result->fetch())
                {
                        $TeacherList[$i]['ИД_дисциплины'] = $row['ИД_дисциплины'];
                        $TeacherList[$i]['Наименование_дисциплины'] = $row['Наименование_дисциплины'];
                        $i++;
                    }
            return $TeacherList;

        }
    public static function getGroupList()
        {
                $db = Db::getConnection();
                $TeacherList = array();
                $result = $db->query('SELECT * FROM `Группа`');
                $i = 0;
                
                while ($row = $result->fetch())
                {
                        $TeacherList[$i]['id'] = $row['ИД_группы'];
                        $TeacherList[$i]['name'] = $row['Наименование_Группы'];
                        $i++;
                    }
            return $TeacherList;

        }
    public static function getCorpList()
        {
                $db = Db::getConnection();
                $CorpList = array();
                $result = $db->query('SELECT * FROM `Корпус` ');
                $i = 0;
                
                while ($row = $result->fetch())
                {
                        $CorpList[$i]['ИД_корпуса'] = $row['ИД_корпуса'];
                        $CorpList[$i]['Идентификационный_символ'] = $row['Идентификационный_символ'];
                        $CorpList[$i]['Наименование_корпуса'] = $row['Наименование_корпуса'];
                        $i++;
                    }
            return $CorpList; 
        }
public static function getAuditTable($date,$AuditList)
    { 
            $db = Db::getConnection();
            $tableListFromAudit = array();
            $arrayinsert = array();
            $i = 1;
            foreach( $AuditList as $row) 
                { 
                    $auditid = $row['ИД_аудитории'];
                    $result = $db->prepare("SELECT
                    *
                FROM
                    `Расписание`
                JOIN `Группа` ON `Расписание`.`ИД_группы` = `Группа`.`ИД_группы`
                JOIN `Аудитория` ON `Расписание`.`ИД_аудитории` = `Аудитория`.`ИД_аудитории`
                JOIN `Преподаватель` ON `Преподаватель`.`ИД_Преподавателя` = `Расписание`.`ИД_преподавателя`
                JOIN `Занятие` ON `Расписание`.`ИД_занятия` = `Занятие`.`ИД_занятия`
                JOIN `Дисциплина` ON `Расписание`.`ИД_дисциплины` = `Дисциплина`.`ИД_дисциплины`
                WHERE
                    `Расписание`.`ИД_аудитории` = ? AND `Дата_занятия` = ?");

                $result->execute(array($auditid,$date));

                while ($row1 = $result->fetch())
                    { 
                        $arrayinsert[$i]['ИД_занятия'] = $row1['ИД_занятия'];
                        $arrayinsert[$i]['Время_начала'] = $row1['Время_начала'];
                        $arrayinsert[$i]['Время_окончания'] = $row1['Время_окончания'];
                        $arrayinsert[$i]['Фамилия_Инициалы_Преподавателя'] = $row1['Фамилия_Инициалы_Преподавателя'];
                        $arrayinsert[$i]['Наименование_дисциплины'] = $row1['Наименование_дисциплины'];
                        $arrayinsert[$i]['Наименование_Группы'] = $row1['Наименование_Группы'];
                        $i++;
                }
                    if( !isset( $tableListFromAudit[$row['Наименование_аудитории']] ) ){ 
                        $tableListFromAudit[$row['Наименование_аудитории']] = $arrayinsert; 
                        $i=1;
                        $arrayinsert = array();
                     }    
                }
            return $tableListFromAudit;
        }



    public static function getAuditListbyCorpId($id)
    {
            $db = Db::getConnection();
            $CorpList = array();
            $result = $db->prepare(' SELECT * FROM `Аудитория` WHERE ИД_Корпуса = ?');
            $result->execute(array($id));
            $i = 0;
            while ($row = $result->fetch())
                {
                        $CorpList[$i]['ИД_аудитории'] = $row['ИД_аудитории'];
                        $CorpList[$i]['Наименование_аудитории'] = $row['Наименование_аудитории'];
                        $i++;
                    }
            
        return $CorpList; 
    }



    public static function getAuditList()
        {
            $db = Db::getConnection();
            $AuditList = array();
            $result = $db->query('SELECT * FROM `Аудитория` ORDER BY `Аудитория`.`ИД_корпуса` DESC');
            $i = 0;
            
            while ($row = $result->fetch())
            {
                    $AuditList[$i]['ИД_аудитории'] = $row['ИД_аудитории'];
                    $AuditList[$i]['Наименование_аудитории'] = $row['Наименование_аудитории'];
                    $AuditList[$i]['ИД_корпуса'] = $row['ИД_корпуса'];
                    $i++;
                }
            return $AuditList; 
        }
    public static function getParaList()
        {
                $db = Db::getConnection();
                $ParaList = array();
                $result = $db->query('SELECT * FROM `Занятие` ');
                $i = 0;
                while ($row = $result->fetch())
                {
                        $ParaList[$i]['ИД_занятия'] = $row['ИД_занятия'];
                        $ParaList[$i]['Время_начала'] = $row['Время_начала'];
                        $ParaList[$i]['Время_окончания'] = $row['Время_окончания'];
                        $i++;
                    }
            return $ParaList; 
        }
    public static function getTeacherTable($date,$selectTeacher)
        {
            
                    $db = Db::getConnection();
                    $result = $db->prepare('SELECT `Фамилия_Инициалы_Преподавателя` FROM `Преподаватель` where `ИД_Преподавателя` = ?');
                    $result->execute(array($selectTeacher));
                    $value = $result->fetch(PDO::FETCH_COLUMN);
                    $name = $value;
                    $tBody = Table::getTableFromTeacher($selectTeacher,$date);
                if ($tBody != '')
                {
                    $echo =   '   <div class="mt-3">
                    <h2 class="p2 ml-2">Расписание для преподавателя: '. $name.' <br> На:  '.$date.'</h2>
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
                <th class="th-sm">Группа
                </th>
                

                </tr>
            </thead>
            <tbody>
        '.$tBody.'
            </tbody>

            </table>

            </div>';
                }
                else{
                    $echo = '<div class="alert alert-danger " role="alert">
                    <strong>Ошибка!</strong> Расписания не существует.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                }
                return  $echo;

        }
    public static function getGroupTable($date,$selectGroup)
        {
            
                
                $db = Db::getConnection();
                $result = $db->prepare('SELECT `Наименование_Группы` FROM `Группа` where `ИД_группы` = ?');
                $result->execute(array($selectGroup));
                $value = $result->fetch(PDO::FETCH_COLUMN);
                $name = $value;
                $tBody = Table::getTableFromGroup($selectGroup,$date);
                if ($tBody != '')
                {
                    $echo =   '  <div class="mt-3">
                <h2 class="p2 ml-2">Расписание для группы: '. $name.' <br> На:  '.$date.'</h2>

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
                '.$tBody.'
                </tbody>

                </table>

                </div>';
                }
                else{
                    $echo = '<div class="alert alert-danger " role="alert">
                    <strong>Ошибка!</strong> Расписания не существует.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                }
                return  $echo;
        }
    public static function deliteRowFromTable($table,$Id,$identify)
        {
                if ($Id) {
                    $db = Db::getConnection(); 
                    $sql = 'DELETE FROM '.$table.' WHERE '.$identify.' = ?';
                    $result = $db->prepare($sql);
                    $result->execute([$Id] );
                    return true;
                }
                
        } 
    public static function getTableFromGroup ($name, $date)
        {
            $db = Db::getConnection();
            $TableListFromGroup = '';
            $result = $db->query("SELECT
            *
        FROM
            `Расписание`
        JOIN `Преподаватель` ON `Преподаватель`.`ИД_Преподавателя` = `Расписание`.`ИД_преподавателя`
        JOIN `Занятие` ON `Расписание`.`ИД_занятия` = `Занятие`.`ИД_занятия`
        JOIN `Аудитория` ON `Расписание`.`ИД_аудитории` = `Аудитория`.`ИД_аудитории`
        JOIN `Дисциплина` ON `Расписание`.`ИД_дисциплины` = `Дисциплина`.`ИД_дисциплины`
        WHERE
            `ИД_группы` = '$name' AND `Дата_занятия` = '$date' ");
                    while ($row = $result->fetch() )
                    {
                        $TableListFromGroup .= '<tr>
                            <td class="pl-3">'.$row['ИД_занятия'].'.'.$row['Время_начала'].' - '.$row['Время_окончания'].'</td>
                            <td class="pl-3">'.$row['Наименование_дисциплины'].'</td>
                            <td class="pl-3">'.$row['Наименование_аудитории'].'</td>
                            <td class="pl-3">'.$row['Фамилия_Инициалы_Преподавателя'].'</td>
                            </tr>';
                    }
            



            return $TableListFromGroup;
        }
    public static function getTableFromTeacher ($name, $date)
        {
                $db = Db::getConnection();
                $TableListFromGroup = '';
                $result = $db->query("SELECT
                *
                FROM
                    `Расписание`
                JOIN `Группа` ON `Расписание`.`ИД_группы` =  `Группа`.`ИД_группы`
                JOIN `Занятие` ON `Расписание`.`ИД_занятия` = `Занятие`.`ИД_занятия`
                JOIN `Аудитория` ON `Расписание`.`ИД_аудитории` = `Аудитория`.`ИД_аудитории`
                JOIN `Дисциплина` ON `Расписание`.`ИД_дисциплины` = `Дисциплина`.`ИД_дисциплины`
                WHERE
                `ИД_Преподавателя` = '$name' AND `Дата_занятия` = '$date' ");
                            while ($row = $result->fetch() )
                            {
                                $TableListFromGroup .= '<tr>
                                    <td class="pl-3">'.$row['ИД_занятия'].'.'.$row['Время_начала'].' - '.$row['Время_окончания'].'</td>
                                    <td class="pl-3">'.$row['Наименование_дисциплины'].'</td>
                                    <td class="pl-3">'.$row['Наименование_аудитории'].'</td>
                                    <td class="pl-3">'.$row['Наименование_Группы'].'</td>
                                    </tr>';
                            }
                



                return $TableListFromGroup;
        }
    public static function getTable()
        {
            $db = Db::getConnection();
            $TableList = '';
            $result = $db->query("SELECT
            *
            FROM
                `Расписание`
            JOIN `Преподаватель` ON `Преподаватель`.`ИД_Преподавателя` = `Расписание`.`ИД_преподавателя`
            JOIN `Группа` ON `Расписание`.`ИД_группы` =  `Группа`.`ИД_группы`
            JOIN `Занятие` ON `Расписание`.`ИД_занятия` = `Занятие`.`ИД_занятия`
            JOIN `Аудитория` ON `Расписание`.`ИД_аудитории` = `Аудитория`.`ИД_аудитории`
            JOIN `Дисциплина` ON `Расписание`.`ИД_дисциплины` = `Дисциплина`.`ИД_дисциплины` ");
                        while ($row = $result->fetch() )
                        {
                            $TableList .= '<tr>
                                <td class="pl-3 font-weight-bold">'.$row['ИД_занятия'].'.'.$row['Время_начала'].' - '.$row['Время_окончания'].'</td>
                                <td class="pl-3 font-weight-bold">'.$row['Наименование_Группы'].'</td>
                                <td class="pl-3 font-weight-bold">'.$row['Наименование_дисциплины'].'</td>
                                <td class="pl-3 font-weight-bold">'.$row['Наименование_аудитории'].'</td>
                                <td class="pl-3 font-weight-bold">'.$row['Фамилия_Инициалы_Преподавателя'].'</td>
                                <td class="pl-3 font-weight-bold">'.$row['Дата_занятия'].'</td>
                                <td class="pl-3 font-weight-bold"><a href="/admin/rewrite/raspisanie/'.$row['ИД_строки'].'" class=" media p-0 btn  mt-2 mr-2 ml-2" style="box-shadow: none !important;"> <img src="../../Views/Template/img/rewrite.svg" alt="Очистить" style="width:100%;height:100%"  >	</a> 
                                <a href="admin/delete/raspisanie/'.$row['ИД_строки'].'" id="delete"  class=" media btn p-0   mt-2 mr-2 ml-2" style="box-shadow: none !important;" >   <img src="../../Views/Template/img/del.svg" alt="Очистить" style="width:100%;height:100%" ></a> </td>
                                </tr>';
                        }

                return $TableList;
                
        }
    public static function TruncateTable($table)
        { 
            $db = Db::getConnection(); 
            $sql = 'TRUNCATE TABLE '.$table;
            $db->query($sql);
            return true;
        }
    public static function addRowRaspisanie($para,$group,$subgect,$audit,$teacher,$date)
        {
            $db = Db::getConnection();
                $result = $db->prepare('INSERT INTO `Расписание`( `ИД_Занятия`, `ИД_группы`, `ИД_дисциплины`, `ИД_преподавателя`, `ИД_аудитории`, `Дата_занятия`) VALUES (?,?,?,?,?,?)');
                $result->execute(array($para,$group,$subgect,$teacher,$audit,$date));
            $count =  $result->rowCount();
            return  $count;
        }
    public static function AddRowToPara($start,$end)
        {
            $db = Db::getConnection();
                $result = $db->prepare('INSERT INTO `Занятие`(`Время_начала`, `Время_окончания`) VALUES (?,?)');
                $result->execute(array($start,$end));
            $count =  $result->rowCount();
            return  $count;
        }
    public static function getTableListById($id)
        {
            $db = Db::getConnection();
            $TableList = array();
            $sql = ("SELECT * FROM `Расписание` WHERE `ИД_строки` =  ? ");
            $result = $db->prepare($sql);
            $result->execute([$id] );
            $TableList = $result->fetch(PDO::FETCH_ASSOC);
            return $TableList; 
        }
    public static function AddRowTogroup($group)
        {
            $db = Db::getConnection();
                $result = $db->prepare('INSERT INTO `Группа`(`Наименование_Группы`) VALUES (?)');
                $result->execute(array($group));
            $count =  $result->rowCount();
            return  $count;
            
        }

    public static function AddRowTosubj($subj)
        {
            $db = Db::getConnection();
                $result = $db->prepare('INSERT INTO `Дисциплина`(`Наименование_дисциплины`) VALUES (?)');
                $result->execute(array($subj));
            $count =  $result->rowCount();
            return  $count;
            
        } 
    public static function AddRowTocorp($corp,$sumb)
        {
            $db = Db::getConnection();
                $result = $db->prepare('INSERT INTO `Корпус`(`Наименование_корпуса`,`Идентификационный_символ`) VALUES (?,?)');
                $result->execute(array($corp,$sumb));
            $count =  $result->rowCount();
            return  $count;
            
        }

    public static function AddRowToaudit($audit,$corp)
        {
            $db = Db::getConnection();
                $result = $db->prepare('INSERT INTO `Аудитория`(`Наименование_аудитории`, `ИД_корпуса`) VALUES (?,?)');
                $result->execute(array($audit,$corp));
            $count =  $result->rowCount();
            return  $count;
            
        }

    public static function AddRowToteacher($teacher)
        {
            $db = Db::getConnection();
            $result = $db->prepare('INSERT INTO `Преподаватель`( `Фамилия_Инициалы_Преподавателя`)  VALUES (?)');
            $result->execute(array($teacher));
            $count =  $result->rowCount();
            // $count = $teacher;
            return  $count;
            
        }

    public static function getAuditListWhithCorp()
        {
            $db = Db::getConnection();
            $AuditList = array();
            $result = $db->query('SELECT * FROM `Аудитория`,`Корпус` where `Аудитория`.`ИД_корпуса`= `Корпус`.`ИД_корпуса`');
            $i = 0;
            
            while ($row = $result->fetch())
            {
                    $AuditList[$i]['ИД_аудитории'] = $row['ИД_аудитории'];
                    $AuditList[$i]['ИД_корпуса'] = $row['ИД_корпуса'];
                    $AuditList[$i]['Наименование_аудитории'] = $row['Наименование_аудитории'];
                    $AuditList[$i]['Наименование_корпуса'] = $row['Наименование_корпуса'];
                    $i++;
                }
            return $AuditList;  
        }
    public static function AddRowTofile($file_name,$date,$time,$link)
        {
            $db = Db::getConnection();
            $result = $db->prepare('INSERT INTO `Файлы`(`Имя_файла`, `Дата_загрузки`, `Время_Загрузки`,`Утвержден`, `Ссылка`) VALUES (?,?,?,?,?)');
            $result->execute(array($file_name,$date,$time,'0',$link));
            $count =  $result->rowCount();
            // $count = $teacher;
            return  $count;
            
        }
    public static function getFileList()
        {
            {
                $db = Db::getConnection();
                $FileList = array();
                $result = $db->query('SELECT * FROM `Файлы`');
                $i = 0;
                
                while ($row = $result->fetch())
                {
                        $FileList[$i]['ИД_файла'] = $row['ИД_файла'];
                        $FileList[$i]['Имя_файла'] = $row['Имя_файла'];
                        $FileList[$i]['Дата_загрузки'] = $row['Дата_загрузки'];
                        $FileList[$i]['Время_Загрузки'] = $row['Время_Загрузки'];
                        $FileList[$i]['Утвержден'] = $row['Утвержден'];
                        $FileList[$i]['Ссылка'] = $row['Ссылка'];
                        $i++;
                    }
            return $FileList; 
        }
    

        }
    public static function getFileListById($id)
        {
            
                $db = Db::getConnection();
                $FileList = array();
                $sql = ("SELECT * FROM `Файлы` where ИД_файла = ?");
                $result = $db->prepare($sql);
                $result->execute([$id] );
                $FileList = $result->fetch(PDO::FETCH_ASSOC);
                return $FileList; 
           
    }
    public static function getMinDate()
        {
            
            $db = Db::getConnection();
            $result = $db->query('SELECT MIN(`Дата_занятия`) FROM `Расписание`');
            $mindate = $result->fetch(PDO::FETCH_ASSOC);
            return $mindate;
        
        }
    public static function getMaxDate()
        {
            
            $db = Db::getConnection();
            $result = $db->query('SELECT MAX(`Дата_занятия`) FROM `Расписание`');
            $maxdate = $result->fetch(PDO::FETCH_ASSOC);
            return $maxdate;
        
        }
}




    