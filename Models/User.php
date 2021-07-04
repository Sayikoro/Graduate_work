<?php
class User
{
    /**
     * Регистрация пользователя 
     * @param type $name
     * @param type $email
     * @param type $password
     * @return type
     */
public static function register($name, $login, $password){
        $db = Db::getConnection();

        $sql = 'INSERT INTO Пользователь (Имя, Логин, Пароль) '
                . 'VALUES (:Имя, :Логин, :Пароль)';
        $result = $db->prepare($sql);
        $result->bindParam(':Имя', $name, PDO::PARAM_STR);
        $result->bindParam(':Логин', $login, PDO::PARAM_STR);
        $result->bindParam(':Пароль', $password, PDO::PARAM_STR);

        return $result->execute();
}
    /**
     * Редактирование данных пользователя
     * @param string $name
     * @param string $password
     */
public static function edit($id, $name, $password){
        $db = Db::getConnection();
        
        $sql = "UPDATE Пользователь 
            SET Имя = :Имя, Пароль = :Пароль 
            WHERE ИД_пользователя = :ИД_пользователя";
        
        $result = $db->prepare($sql);                                  
        $result->bindParam(':ИД_пользователя', $id, PDO::PARAM_INT);       
        $result->bindParam(':Имя', $name, PDO::PARAM_STR);    
        $result->bindParam(':Пароль', $password, PDO::PARAM_STR); 
        return $result->execute();
}
    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $email
     * @param string $password
     * @return mixed : ingeger user id or false
     */
public static function checkUserData($login, $password){
        $db = Db::getConnection();

        $sql = "SELECT * FROM `Пользователь` WHERE `Логин` = ? AND `Пароль` = ?";
        $result = $db->prepare($sql);
        
        $result->execute([$login,$password] );
        //$result = $db->query($sql);
        $user = $result->fetch();
        if ($user) {
            return $user['ИД_пользователя'];
        }

        return false;
}
    /**
     * Запоминаем пользователя
     * @param string $email
     * @param string $password
     */
public static function auth($userId){
        $_SESSION['user'] = $userId;
}
public static function checkLogged(){
        
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /admin/login");
    }

public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
}
    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
public static function checkName($name){
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
}
     /**
     * Проверяет имя: не меньше, чем 6 символов
     */
public static function checkPassword($password){
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
}
public static function checkLogin($login){
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
}
public static function checkloginExists($login){

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM Пользователь WHERE Логин = :Логин';

        $result = $db->prepare($sql);
        $result->bindParam(':Логин', $login, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
}
public static function getUserById($id){
        if ($id) {
            $db = Db::getConnection();
            
            
            
            $sql = 'SELECT * FROM Пользователь WHERE ИД_пользователя = ?';
            $result = $db->prepare($sql);
            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute([$id] );


            return $result->fetch();
        }
}
public static function getUserNameById($id){
        if ($id) {
            $db = Db::getConnection();
            
            
            
            $sql = 'SELECT Имя FROM Пользователь WHERE ИД_пользователя = ?';
            $result = $db->prepare($sql);
            // Указываем, что хотим получить данные в виде массива
            $result->execute([$id] );


            return $result->fetch();
        }
}

}
