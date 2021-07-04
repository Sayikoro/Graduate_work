<?
require ROOT.'/Models/Table.php';
require ROOT.'/Models/User.php';
class AdminController
{

    public static function getTableIdentify($identify)
        {
                switch($identify)
                {
                    case 'raspisanie':
                        $TableInfo['table'] = 'Расписание';
                        $TableInfo['idStr'] = 'ИД_строки';
                        break;
                    case 'para':
                        $TableInfo['table'] = 'Занятие';
                        $TableInfo['idStr'] = 'ИД_занятия';
                        break;
                    case 'group':
                        $TableInfo['table'] = 'Группа';
                        $TableInfo['idStr'] = 'ИД_Группы';
                        break;
                    case 'setfile':
                        $TableInfo['table'] = 'Файлы';
                        $TableInfo['idStr'] = 'ИД_файла';
                        break;
                    case 'audit':
                        $TableInfo['table'] = 'Аудитория';
                        $TableInfo['idStr'] = 'ИД_аудитории';
                        break;
                    case 'teacher':
                        $TableInfo['table'] = 'Преподаватель';
                        $TableInfo['idStr'] = 'ИД_Преподавателя';
                        break;
                    case 'subj':
                        $TableInfo['table'] = 'Дисциплина';
                        $TableInfo['idStr'] = 'ИД_Дисциплины';
                        break;
                }
                return  $TableInfo;
        }
    public function actionIndex()
        {   
                $link = 'raspisanie';
                $userID = User::checkLogged();  
                $user = User::getUserNameById($userID) ; 
                $table = Table::getTable(); 
                $title = "Панель администратора";
                include_once (ROOT.'/Views/Admin/table/index.php');
                return true; 
        }
    public function actionFile()
        {   
            $userID = User::checkLogged();  
            $user = User::getUserNameById($userID) ; 
            $title = "Загрузить файл";
            include_once (ROOT.'/Views/Admin/File.php');
            return true; 
        }
    public function actionSetfile()
        {   
            $userID = User::checkLogged();  
            $user = User::getUserNameById($userID) ;
            $fileList = Table::getFileList();
            $link = 'setfile'; 
            $title = "Утвердить файл ";
            include_once (ROOT.'/Views/Admin/SetFileFromBD.php');
            return true; 
        }
    public function actionDeliteRow($table,$id)
        {
            $url = $table;
            $userID = User::checkLogged();  
            $user = User::getUserNameById($userID) ; 
            $TableInfo =  AdminController::getTableIdentify($table);
            if ($TableInfo['table'] == 'Файлы')
            {   
                $Filename = Table::getFileListById($id);
                File::DeliteFile($Filename);
            }
            $table = Table::deliteRowFromTable($TableInfo['table'],$id,$TableInfo['idStr']);
            header("Location: /admin/".$url );
        }
    public function actionTruncateTable($table)
        {
            $url = $table;
            $userID = User::checkLogged();  
            $user = User::getUserNameById($userID) ; 
            $TableInfo =  AdminController::getTableIdentify($table);
            $table = Table::TruncateTable($TableInfo['table']);
            header("Location: /admin/".$url);
        }
    public function actionAddRow($table)
        {
            $userID = User::checkLogged();  
            $user = User::getUserNameById($userID) ;
            switch($table)
            {
                case 'test':
                    echo "Я работаю";
                    break;
                case 'raspisanie':
                    $paraList = Table::getParaList();
                    $groupList = Table::getGroupList();
                    $teacherList = Table::getTeacherList();
                    $subgectList = Table::getSubgectList();
                    $corpList = Table::getCorpList();
                    $rewRite = '';  
                    include_once (ROOT.'/Views/Admin/addrow/AddRowToRaspisanie.php');
                    break;
                case 'para':
                    $paraList = Table::getParaList();
                    $rewRite = '';  
                    include_once (ROOT.'/Views/Admin/addrow/AddRowToPara.php');
                    break;
                case 'group':
                    $groupList = Table::getGroupList();
                    $rewRite = '';  
                    include_once (ROOT.'/Views/Admin/addrow/AddRowToGroup.php');
                    break;
                case 'teacher':
                    $teacherList = Table::getTeacherList();
                    $rewRite = '';  
                    include_once (ROOT.'/Views/Admin/addrow/AddRowTоTeacher.php');
                    break;
                case 'audit':
                    $corpList = Table::getCorpList();;
                    $rewRite = '';  
                    include_once (ROOT.'/Views/Admin/addrow/AddRowToAudit.php');
                    break;
                case 'corp':
                    $corpList = Table::getCorpList();
                    $rewRite = '';  
                    include_once (ROOT.'/Views/Admin/addrow/AddRowToCorp.php');
                    break;
                case 'subj':
                    $SubgectList = Table::getSubgectList();
                    $rewRite = '';  
                    include_once (ROOT.'/Views/Admin/addrow/AddRowToSubj.php');
                    break;
            }
            return true;
        }
    public function actionRewrite($table,$id_str)
        {
            $userID = User::checkLogged();  
            $user = User::getUserNameById($userID) ;
            $echo = array();
            switch($table)
                    {
                    case 'raspisanie':
                    $paraList = Table::getParaList();
                    $groupList = Table::getGroupList();
                    $teacherList = Table::getTeacherList();
                    $subgectList = Table::getSubgectList();
                    $corpList = Table::getCorpList();
                    $rewRite =  Table::getTableListById($id_str);
                    $rewRite['rewrite'] = 'rewrite';
                    include_once (ROOT.'/Views/Admin/AddRowToRaspisanie.php');
                    break;
                    }
        return true ;
        }
    public function actionHandler($link)
        {   $userID = User::checkLogged();  
            $user = User::getUserNameById($userID) ;    
            switch($link)
                    {
                    case 'para':
                        $title = 'Занятие';
                        $paraList = Table::getParaList();
                        include_once (ROOT.'/Views/Admin/table/Para.php');
                        break;
                    case 'group':
                        $title = 'Группа';
                        $groupList = Table::getGroupList();
                        include_once (ROOT.'/Views/Admin/table/group.php');
                        break;
                    case 'teacher':
                        $title = 'Преподаватель';
                        $teacherList = Table::getTeacherList();
                        include_once (ROOT.'/Views/Admin/table/teacher.php');
                        break;
                    case 'audit':
                        $title = 'Аудитория';
                        $auditList = Table::getAuditListWhithCorp();
                        include_once (ROOT.'/Views/Admin/table/audit.php');
                        break;           
                    case 'corp':
                        $title = 'Корпус';
                        $CorpList = Table::getCorpList();
                        include_once (ROOT.'/Views/Admin/table/corp.php');
                        break;
                    case 'subj':
                        $title = 'Дисциплина';
                        $SubgectList = Table::getSubgectList();
                        include_once (ROOT.'/Views/Admin/table/subj.php');
                        break;
                    }
        }

    

}
