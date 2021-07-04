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
<div class="ml-2 mt-4 media d-flex justify-content-center">
        
        <div class="p-1 ">
        <div class="mb-2"><h3><?if ($rewRite != ''){  echo "Редактирование строки в таблице Расписание";}else{echo "Добавление строки в таблицу Расписание";}?></h3></div>
        <div class="m-2"><?if ($rewRite['ИД_строки']):?>
                <input type="hidden" value='<?echo $rewRite['ИД_строки']?>'>
            <?endif?></div>
        <div class="m-2">
        <select class="mdb-select md-form"  id = 'select' searchable="Поиск..">
            <option value="" disabled selected>Выберите пару</option>
            <?foreach ( $paraList as  $paraList):?>
                <option value="<?echo $paraList['ИД_занятия']?>" <?if ($paraList['ИД_занятия'] == $rewRite['ИД_Занятия']) {echo 'selected';}?>><?echo$paraList['Время_начала']."-".$paraList['Время_окончания']?></option>
            <? endforeach;?>
            </select>
            <label class="mdb-main-label">Выберите пару</label>
            </div>

            <div class="m-2">
        <select class="mdb-select md-form"  id = 'select1' searchable="Поиск..">
            <option value="" disabled selected>Выберите группу</option>
            <?foreach ( $groupList as  $groupList):?>
                <option value="<?echo $groupList['id']?>" <?if ($groupList['id'] == $rewRite['ИД_группы']) {echo 'selected';}?>><?echo $groupList['name']?></option>
                <? endforeach;?>
            </select>
            <label class="mdb-main-label">Выберите группу</label>
            </div>

            <div class="m-2">
        <select class="mdb-select md-form"  id = 'select2' searchable="Поиск..">
            <option value="" disabled selected>Выберите дисциплину</option>
            <?foreach ( $subgectList as  $subgectList):?>
                <option value="<?echo $subgectList['ИД_дисциплины']?>" <?if ($subgectList['ИД_дисциплины'] == $rewRite['ИД_дисциплины']) {echo 'selected';}?>><?echo $subgectList['Наименование_дисциплины']?></option>
                <? endforeach;?>
            </select>
            <label class="mdb-main-label">Выберите дисциплину</label>
            </div>
            
            <div class="m-2">
            <div>
                
                <select class="mdb-select md-form" id = 'select3' searchable="Поиск..">
                <option value="" disabled selected>Выберите аудиторию</option>
                <?foreach ( $corpList  as $corpList ):
                    $auditList = Table::getAuditList();?>
                    
                    <optgroup label="<?echo $corpList['Наименование_корпуса']?>">
                    <?foreach ( $auditList  as $auditList ):?>
                        <?if ($auditList['ИД_корпуса'] == $corpList['ИД_корпуса'] ):?>
                        <option  value="<?echo $auditList['ИД_аудитории']?>" <?if ($auditList['ИД_аудитории'] == $rewRite['ИД_аудитории']) {echo 'selected';}?>><?echo $auditList['Наименование_аудитории']?></option>
                    <?endif;?>
                    <? endforeach;?>
                    </optgroup>
                <? endforeach;?>
                
                </select>
                <label class="mdb-main-label">Выберите аудиторию</label>
                
                </div>
            </div>
            
            <div class="m-2">
        <select class="mdb-select md-form"  id = 'select4' searchable="Поиск..">
            <option value="" disabled selected>Выберите преподавателя</option>
            <?foreach ( $teacherList as  $teacherList):?>
                <option value="<?echo $teacherList['ИД_преподавателя']?>" <?//if ($teacherList['id'] == $rewRite['ИД_преподавателя']) {echo 'selected';}?>><?echo$teacherList['Фамилия_Инициалы_Преподавателя']?></option>
                <? endforeach;?>
            </select>
            <label class="mdb-main-label">Выберите преподавателя</label>
            </div>
            
            <div class="m-2">
            <div class=" md-form   mb-1 " id="date">
            <label class="mdb-main-label">Выберите дату</label>
                    <input placeholder="Выберите дату"  data-value='<?if ($rewrite['Дата_занятия']){echo $rewrite['date'];}else{echo date("Y.m.d");}?>' type="text" id="date-picker-example  " class="form-control datepicker date" > 
            </div>
                
        </div>

        <button type="button" class="mt-3  btn btn-outline-primary btn-lg"  style='color:black !important'<?if ($rewRite!= ''):?>id='rewrite'<?else:?>id='edit'  <?endif?> ><?if ($rewRite != ''):?>      <img src="<?ROOT?>/Views/Template/img/rewrite.svg" alt="Добавить" class="mr-2" >Редактировать <?else:?>  <img src="<?ROOT?>/Views/Template/img/add2.svg"  style="width: 20px;height: 20px;"alt="Добавить" class="mr-2" >Записать <?endif?> </button>      

    </div>
<div>
    <?include ROOT.'/Views/Layouts/JS.php';?>
    <script>
$('#edit').click(function() {
        para  = $('#select').val();
        group = $('#select1').val();
        subgect = $('#select2').val();
        audit = $('#select3').val();
        teacher = $('#select4').val();
        date = $('.date').val();
      console.log('пара № '+para+" Группа №"+group+' предмет № '+subgect+" аудитория № "+audit+' Преподаватель № '+teacher+" На дату: "+date);

        if ( para  === null || group === null || subgect === null || audit  === null || teacher === null || date === '' )
        {
            $(".info").append('<div class="alert alert-danger " role="alert"> <strong>Ошибка!</strong> Одно из полей пустое.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
        }
        else
        {
                urlLeft = '/ajax/addto<?echo $table?>';
                console.log(urlLeft);
                    $.ajax({
                        type: "POST",
                        url: urlLeft,
                        data:{
                            'para':para,
                            'group':group,
                            'subgect':subgect,
                            'audit':audit,
                            'teacher':teacher,
                            'date':date,
                        },
                    
                }).done(function( msg ) {
                    $(".info").append(msg);
                
            });
            setTimeout(location.reload.bind(location), 1000);
        }

    });
   


     
    $(document).ready(function() {

        $('.datepicker').pickadate({
            max: 7,
            // Strings and translations
            monthsFull:['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
            monthsShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
            weekdaysFull: ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'],
            weekdaysShort: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
            showMonthsShort: undefined,
            showWeekdaysFull: undefined,
            format: 'yyyy.mm.dd',

            // Buttons
            today: 'Сегодня',
            clear: 'Очистить',
            close: 'Закрыть',

            // Accessibility labels
            labelMonthNext: 'Следующий месяц',
            labelMonthPrev: 'Предыдущий месяц',
           
            

        });




    $('#select').materialSelect();
    $('#select1').materialSelect();
    $('#select2').materialSelect();
    $('#select3').materialSelect();
    $('#select4').materialSelect();
});

</script>

</body>
</html>