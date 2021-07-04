<?require ROOT.'/Models/Table.php';
class TerminalController

{
    public function actionIndex(){
        include_once (ROOT.'/Views/Terminal/index.php');
        return true; 
}

    public function actionDate($select,$id)
    {
        if ($select == 'group')
        {
      
            include_once (ROOT.'/Views/Terminal/date.php');
        }
        if ($select == 'teacher')
        {
           
            include_once (ROOT.'/Views/Terminal/date.php');
        }
        if ($select == 'audit')
        {
            include_once (ROOT.'/Views/Terminal/date.php');
        }
    }
    public function actionShowlist($select)
    {
        if ($select == 'group')
        {
            $GroupList = Table::getGroupList();
            include_once (ROOT.'/Views/Terminal/group.php');
        }
        if ($select == 'teacher')
        {
            $TeacherList = Table::getTeacherList();
            include_once (ROOT.'/Views/Terminal/teacher.php');
        }
        if ($select == 'audit')
        {
            $CorpList = Table::getCorpList();
            include_once (ROOT.'/Views/Terminal/audit.php');
        }
    }

    public function actionShow($select,$id,$date)
    {
        if ($select == 'group')
        {
           $Group = Table::getGroupTable($date,$id);
           include_once (ROOT.'/Views/Terminal/ShowGroup.php');
        }
        if ($select == 'teacher')
        {
            $teacherTable = Table::getTeacherTable($date,$id);
            include_once (ROOT.'/Views/Terminal/ShowTeacher.php');
        }
        if ($select == 'audit')
        {
            $name_list = array();
            $AuditList = Table::getAuditListbyCorpId($id);
            $name_list= Table::getAuditTable($date,$AuditList);
            include_once (ROOT.'/Views/Terminal/ShowAudit.php');
        }
    }
    public function actionTest()
    {
        include_once (ROOT.'/Views/Terminal/test.php');
    }

}

?>