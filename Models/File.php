<?
class File {
    public static function OpenFIle($file)
        {
            $db = dbase_open($file, 0)
            or die("Ошибка! Не получается открыть файл '.$file.'.");
            return $db;
        }
    public static function GetAudit($record_numbers,$db)
        {
            for ($a = 1; $a <= $record_numbers; $a++) {
                $row = dbase_get_record_with_names($db, $a) ;
                $row =  mb_convert_encoding($row, "utf-8", "CP866");
                $AuditList[$a] = mb_strtolower( str_replace(" ", '',str_replace(".", ' ',$row['AUD'])));
            }
            return $AuditList;
        }
    public static function GetTeacher($record_numbers,$db)
        {
            for ($t = 1; $t <= $record_numbers; $t++) {
                $row = dbase_get_record_with_names($db, $t) ;
                $row =  mb_convert_encoding($row, "utf-8", "CP866");
                $TeacherList[$t] = $row['NAME'];
            }
            return $TeacherList;
        }
    public static function GetGroup($record_numbers,$db)
        {
            for ($g = 1; $g <= $record_numbers; $g++) {
                $row = dbase_get_record_with_names($db, $g) ;
                $row =  mb_convert_encoding($row, "utf-8", "CP866");
                $GroupList[$g] = $row['GROUP'];
            }
            return $GroupList;
        }
    public static function GetSubj($record_numbers,$db)
        {
            for ($s = 1; $s <= $record_numbers; $s++) {
                $row = dbase_get_record_with_names($db, $s) ;
                $row =  mb_convert_encoding($row, "utf-8", "CP866");
                $SubjList[$s]= $row['SUBJECT'];
            }
            return $SubjList; 
        }
    

    public static function AddToFullTables($TeacherList,$GroupList,$SubjList,$AuditList)
            {
                    
                            //Внесение данных в базу данных
                    foreach($TeacherList as  $row)
                    {
                        Table::AddRowToteacher($row);
                    }
                    foreach($GroupList as  $row)
                    {
                        Table::AddRowTogroup($row);
                    }
                    foreach($SubjList as  $row)
                    {
                        Table::AddRowTosubj($row);
                    }
                    $corp =  Table::getCorpList();
                    $gla =  $corp[0]['Наименование_корпуса'];
                    $id = $corp[0]['ИД_корпуса'];
                    
                    foreach($AuditList as  $row)
                    {
                        $corp =  Table::getCorpList();
                        $audit_o = $row;
                        list($audit, $subm) = explode("/", $row); 
                        foreach($corp as  $row)
                    {
                        if ( $subm == NULL)
                        {
                            $corp_name = '';
                        }
                        else{
                            if ($row['Идентификационный_символ'] == $subm )
                        {
                            $corp_name = $row['Наименование_корпуса'];
                            $id_corp = $row['ИД_корпуса'];
                        }
                        }   
                    }
                    if ($corp_name == ''){

                        Table::AddRowToaudit($audit_o,$id);
                    }
                    else
                    {
                        Table::AddRowToaudit($audit_o,$id_corp);
                        
                    }
                }
                return true;
            }    
    public static function getIdByNameFromGroup($name)
        {
            $db = Db::getConnection();
            $sql = (" SELECT `ИД_группы` FROM `Группа` WHERE  `Наименование_Группы` =  ?");
            $result = $db->prepare($sql);
            $result->execute([$name] );
            $GroupId = $result->fetch(PDO::FETCH_ASSOC);
            return $GroupId; 
        
        }
    public static function getIdByNameFromTeacher($name)
        {
            $db = Db::getConnection();
            $sql = (" SELECT `ИД_преподавателя` FROM `Преподаватель` WHERE `Фамилия_Инициалы_Преподавателя` =  ?");
            $result = $db->prepare($sql);
            $result->execute([$name] );
            $TeacherId = $result->fetch(PDO::FETCH_ASSOC);
            return $TeacherId; 
        
        }
    public static function getIdByNameFromSubj($name)
        {
            $db = Db::getConnection();
            $sql = (" SELECT `ИД_дисциплины` FROM `Дисциплина` WHERE `Наименование_дисциплины` =  ?");
            $result = $db->prepare($sql);
            $result->execute([$name] );
            $SubjId = $result->fetch(PDO::FETCH_ASSOC);
            return $SubjId; 
        
        }
    public static function getIdByNameFromAudit($name)
        {
            $db = Db::getConnection();
            $sql = ("SELECT `ИД_аудитории` FROM `Аудитория` WHERE `Наименование_аудитории` =   ?");
            $result = $db->prepare($sql);
            $result->execute([$name] );
            $AuditId = $result->fetch(PDO::FETCH_ASSOC);
            return $AuditId; 
        
        }

        }






?>