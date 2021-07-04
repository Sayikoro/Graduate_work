<!DOCTYPE html>
<html lang="en">
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

        <div class="mb-2"><h3>Загрузка файла расписания</h3></div>
    <div class="p-1  w-50 ">
        <div class="m-2 ">
        <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFileLang" lang="ru">
  <label class="custom-file-label" for="customFileLang">Выберите файл</label>
</div>
                </div>
 
        

            <button type="button" class="btn btn-outline-primary "  style='color:black !important' id='load'>       <img src="<?ROOT?>/Views/Template/img/loadfile.svg"  style="width: 30px;height: 30px;"alt="Добавить" class="mr-2" ></button>      

    </div>
<div>
    <?include ROOT.'/Views/Layouts/JS.php';?>
    <script>

var files; // переменная. будет содержать данные файлов

// заполняем переменную данными, при изменении значения поля file 
$('input[type=file]').on('change', function(){
	files = this.files;
});


$('#load').click(function() {
    $(".info").empty();
    var $this = $(this);
    File = $('#customFileLang').val();
    fileextend = splitFilename(File)
    if( typeof files == 'undefined' ) {
            $this.attr('disabled', false);
            $(".info").append('<div class="alert alert-danger " role="alert"> <strong>Ошибка!</strong>Неправильный формат файла или он отсутствует<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
            return;
        };
	// создадим объект данных формы
	var data = new FormData();
	// заполняем объект данных файлами в подходящем для отправки формате
	$.each( files, function( key, value ){
		data.append( key, value );
	});
	// добавим переменную для идентификации запроса
	data.append( 'my_file_upload', 1 );
    if ( File == "" || fileextend[1] != 'dbf' )
        {
         
            $(".info").append('<div class="alert alert-danger " role="alert"> <strong>Ошибка!</strong>Неправильный формат файла или он отсутствует<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
            
           
        }
        else
        {    
            $this.attr('disabled', true);
            urlLeft = '/ajax/fileLoad';
                
                    $.ajax({
                        type: "POST",
                        url: urlLeft,
                        data        : data,
                        cache       : false,
                        // отключаем обработку передаваемых данных, пусть передаются как есть
                        processData : false,
                        // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
                        contentType : false, 
                }).done(function( respond ) {
                   $(".info").append(respond);  
            });
            setTimeout(location.reload.bind(location), 1000);
        }
        
    });
   

    function splitFilename(filename) {
    var dot = filename.lastIndexOf('.');
    if (dot === -1 || dot === 0) { // no extension
        return [filename, ''];
    }
    return [filename.substr(0, dot), filename.substr(dot + 1)];
}
     
    $(document).ready(function() {
});

</script>

</body>
</html>