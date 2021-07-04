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

        <div class="mb-2"><h3><?if ($rewRite != ''){  echo "Редактирование строки в таблице Корпус";}else{echo "Добавление строки в таблицу Корпус";}?></h3></div>
    <div class="p-1   w-50">
    <!-- <form action="/ajax/add/rowtogroup" method="POST" > -->
        <div class="m-2">
        <div class="md-form mt-2">
            <input type="text" id="corp" name="corp" class="form-control">
            <label for="corp">Корпус</label>
        </div>
                </div>
        

            <button  type="submit"  class="mt-3  btn btn-outline-primary btn-lg"  style='color:black !important'<?if ($rewRite!= ''):?> name='rewrite' id='rewrite'<?else:?>id='edit' name='edit'  <?endif?> ><?if ($rewRite != ''):?>      <img src="<?ROOT?>/Views/Template/img/rewrite.svg" alt="Добавить" class="mr-2" >Редактировать <?else:?>  <img src="<?ROOT?>/Views/Template/img/add2.svg"  style="width: 20px;height: 20px;"alt="Добавить" class="mr-2" >Записать <?endif?> </button>      
<!-- </form> -->
    </div>
<div>
    <?include ROOT.'/Views/Layouts/JS.php';?>
    <script>
    $('#edit').click(function() {
        corp = $('#corp').val();
        if ( corp == '' )
        {
            $(".info").append('<div class="alert alert-danger " role="alert"> <strong>Ошибка!</strong> Одно из полей пустое.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
        }
        else
        {
                urlLeft = '/ajax/addrowto<?echo $table?>';
                console.log(urlLeft);

                $.post( urlLeft, { 'corp': corp})
                    .done(function( data ) {
                        $(".info").append(data);
                    });
                
            }
            setTimeout(location.reload.bind(location), 1000);
        });
   


     
    $(document).ready(function() {

});

</script>

</body>
</html>