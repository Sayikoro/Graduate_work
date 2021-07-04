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

        <div class="mb-2"><h3><?if ($rewRite != ''){  echo "Редактирование строки в таблице Занятие";}else{echo "Добавление строки в таблицу Занятие";}?></h3></div>
    <div class="p-1  w-50 ">
        <div class="m-2 ">
        <div class=" md-form   mb-1  " id="date">
            <!-- <label class="mdb-main-label">Выберите время начала занятия</label> -->
                    <input placeholder="Выберите время начала занятия"   type="text" id="date-picker-example " class="form-control timepicker timepicker1 date" > 
            </div>
                </div>
                <div class="m-2 ">
        
                <div class=" md-form   mb-1 " id="date">
            <!-- <label class="mdb-main-label">Выберите время окончания занятия</label> -->
                    <input  placeholder="Выберите время окончания занятия" type="text" id="date-picker-example " class="form-control timepicker  timepicker2 date" > 
            </div>
                </div>
        

            <button type="button" class="mt-3  btn btn-outline-primary btn-lg"  style='color:black !important'<?if ($rewRite!= ''):?>id='rewrite'<?else:?>id='edit'  <?endif?> ><?if ($rewRite != ''):?>      <img src="<?ROOT?>/Views/Template/img/rewrite.svg" alt="Добавить" class="mr-2" >Редактировать <?else:?>  <img src="<?ROOT?>/Views/Template/img/add2.svg"  style="width: 20px;height: 20px;"alt="Добавить" class="mr-2" >Записать <?endif?> </button>      

    </div>
<div>
    <?include ROOT.'/Views/Layouts/JS.php';?>
    <script>
$('#edit').click(function() {
    timepicker1 = $('.timepicker1').val();
    timepicker2 = $('.timepicker2').val();
    
        if ( timepicker1 == "" || timepicker2 == '' )
        {
            $(".info").append('<div class="alert alert-danger " role="alert"> <strong>Ошибка!</strong> Одно из полей пустое.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
        }
        else
        {    urlLeft = '/ajax/addto<?echo $table?>/'+timepicker1+'/'+timepicker2;
                console.log(urlLeft);
                    $.ajax({
                        type: "POST",
                        url: urlLeft,
                        data: '',
                    
                }).done(function( msg ) {
                    $(".info").append(msg);  
            });
            setTimeout(location.reload.bind(location), 1000);
        }
    });
   


     
    $(document).ready(function() {
        $('.timepicker1').pickatime(
        
        )
        $('.timepicker2').pickatime()

});

</script>

</body>
</html>