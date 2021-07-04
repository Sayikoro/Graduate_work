<!DOCTYPE html>
<html lang="en">
<head>
    <?include ROOT.'/Views/Layouts/CSS.php';?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить строку</title>
  
</head>
<body>
<?include ROOT.'/Views/Layouts/AdminHeader.php';
;?>
<div class="info" ></div>
<div class="ml-2 mt-4  d-flex align-items-center flex-column">

        <div class="mb-2"><h3><?if ($rewRite != ''){  echo "Редактирование строки в таблице Аудитоия";}else{echo "Добавление строки в таблицу Аудитоия";}?></h3></div>
    <div class="p-1  w-50">
    <!-- <form action="/ajax/add/rowtogroup" method="POST" > -->
        <div class="m-2">
        <div class="md-form mt-2">
            <input type="text" id="Audit" name="Audit" class="form-control">
            <label for="Audit">Аудитория</label>
        </div>
            </div>
            <div class="m-2">
            <div>
                
                <select class="mdb-select md-form" id = 'select3' searchable="Поиск..">
                <option value="" disabled selected>Выберите Корпус</option>
                <?foreach ( $corpList  as $corpList ):?>
                    <option  value="<?echo $corpList['ИД_корпуса']?>"> <?echo $corpList['Наименование_корпуса']?> </option>
                <? endforeach;?>
                
                </select>
                <label class="mdb-main-label">Выберите Корпус</label>
                
                </div>
            </div>
        

            <button  type="submit"  class="mt-3  btn btn-outline-primary btn-lg"  style='color:black !important'<?if ($rewRite!= ''):?> name='rewrite' id='rewrite'<?else:?>id='edit' name='edit'  <?endif?> ><?if ($rewRite != ''):?>      <img src="<?ROOT?>/Views/Template/img/rewrite.svg" alt="Добавить" class="mr-2" >Редактировать <?else:?>  <img src="<?ROOT?>/Views/Template/img/add2.svg"  style="width: 20px;height: 20px;"alt="Добавить" class="mr-2" >Записать <?endif?> </button>      
<!-- </form> -->
    </div>
<div>
    <?include ROOT.'/Views/Layouts/JS.php';?>
    <script>
    $('#edit').click(function() {
        Audit = $('#Audit').val();
        Corp = $('#select3').val();
        if ( Audit == '' )
        {
            $(".info").append('<div class="alert alert-danger " role="alert"> <strong>Ошибка!</strong> Одно из полей пустое.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
        }
        else
        {
                urlLeft = '/ajax/addrowto<?echo $table?>';
                console.log(urlLeft);
                $.post( urlLeft, { 'Audit': Audit,'corpforaudit':Corp})
                    .done(function( data ) {
                        $(".info").append(data);
                    });
                
            }
            //setTimeout(location.reload.bind(location), 1000);
        });
   


     
    $(document).ready(function() {
        $('#select3').materialSelect();

});

</script>

</body>
</html>