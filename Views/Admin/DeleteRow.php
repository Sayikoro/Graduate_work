<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Строка удалена</title>
    
</head>
<body>
    <div class='alert alert-success'> 
        <strong>Строка <?echo $id?> удалена из таблицы <?echo $table?></strong>
       Через 2 секунды вы будете перенаправлены обратно  
        <?
        sleep(2);
       
        ?>
    </div>
</body>
</html>