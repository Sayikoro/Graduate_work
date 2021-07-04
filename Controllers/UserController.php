<?
require ROOT.'/Models/User.php';
class UserController
{
    public function actionindex()
    {
        $login = '';
        $password = '';
        if (isset($_POST['submit']))
        {
            $login =$_POST['login'];
            $password = $_POST['password'];
            $errors = false;
            
            if (!User::checkPassword($password))
            {
                $errors[] = 'Проль не должен быть менее 6 символов';
            }
            $userId = User::checkUserData($login,$password);
                if ($userId == false)
                {
                    $errors[] = 'Не верные данные для входа';
                }
                    else
                    {
                    User::auth($userId);

                    header("Location: /admin");
                    }
        }

       require_once(ROOT.'/Views/Admin/Login.php'); 

        return true;
    }
    public function actionLogout()
    {
        unset($_SESSION["user"]);
        header("Location: /admin/");
    }

}


?>