<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Расписание</title>
    <?include ROOT.'/Views/Layouts/CSS.php';?>
    <link rel = "manifest" href = "<?include ROOT.'/Views/Layouts/manifest.json';?> "> 
    <meta http-equiv="Refresh" content="180" />

</head>
<body>
<header class='m-0 p-0'>
<!--Navbar -->
<nav class="mb-1 p-3 navbar navbar-expand-lg navbar-dark blue darken-3">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarSupportedContent-333">
    <ul class="navbar-nav ">
   
      <li class="nav-item ">
                <ul class="nav nav-tabs nav-justified md-tabs blue darken-3 ml-0 pl-0" id="myTabJust" role="tablist" style="box-shadow:none !important;">
                    <li class="nav-item">
                        <a class="nav-link active media" id="home-tab-just" data-toggle="tab" href="#group" role="tab" aria-controls="home-just"
                        aria-selected="true" style="padding-right: 1.2rem !important;
    padding-left: 1.2rem !important;"><b>Группа</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link media" id="profile-tab-just mr-2" data-toggle="tab" href="#teacher" role="tab" aria-controls="profile-just"
                        aria-selected="false" style="padding-right: 3.5rem !important;
    padding-left: .2rem !important;"><b>Преподаватель</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link media" id="contact-tab-just" data-toggle="tab" href="#audit" role="tab" aria-controls="contact-just"
                        aria-selected="false" style="padding-right: 1.2rem !important;
    padding-left: 1.2rem !important;"><b>Аудитория</b></a>
                    </li>
                    </ul>
                    
      </li>
      <li class="nav-item ">
      <div class="tab-content p-0 " id="myTabContentJust">
            <div class="tab-pane fade show active" id="group" role="tabpanel">
            <!-- блок Группа -->
                <ul class="navbar-nav mr-auto ml-3 ">
                    <li class="media md-form m-0 m-3 ">
                        <div class="    " id="date">
                            <input placeholder="Выберите дату" type="text" data-value='<?if ($date ) {echo $date;}?>' id="date-picker-example" class="datepicker  group_date" >
                        </div>
                    </li>
                    <li class="media md-form   m-0 pl-3 p-1">
                        
                    <select class="mdb-select colorful-select dropdown-primary" searchable="Поиск.." id='group_select'>
                    <option class='text-white' value="" disabled selected>Выберите группу</option>
                    <?foreach ( $GroupList as  $GroupList):?>
                    <option value='<?echo $GroupList['id'];?>'><?echo $GroupList['name'];?></option>
                    <? endforeach;?>

                    </select>
                    </li>
                    <li class="media  m-0 ml-2 ">
                
                        <button type="button" class="btn  btn-primary btn-lg p-2" style="box-shadow:none !important; width:150px;" id='group_button'>Показать</button>
                   
                    </li>

                </ul>
               
                    <!-- конец блока Группа -->
                    </div>
                    <div class="tab-pane fade" id="teacher" role="tabpanel" >
                    <!-- блок Преподаватель -->
                    <ul class="navbar-nav mr-auto ml-3 ">
                    <li class="media md-form m-0 m-3 ">
                        <div class="    " id="date">
                            <input placeholder="Выберите дату" type="text" data-value='<?if ($date ) {echo $date;}?>' id="date-picker-example" class="datepicker  teacher_date" >
                        </div>
                    </li>
                    <li class="media md-form   m-0 pl-3 p-1">
                        
                    <select class="mdb-select colorful-select dropdown-primary" searchable="Поиск.." id='teacher_select'>
                    <option class='text-white' value="" disabled selected>Выберите преподавателя</option>
                    <?foreach ( $teacherList as  $teacherList):?>
                    <option class='text-white'  value='<?echo $teacherList['ИД_преподавателя'];?>'><?echo $teacherList['Фамилия_Инициалы_Преподавателя'];?></option>
                    <? endforeach;?>

                    </select>
                    </li>
                    <li class="media  m-0 ml-2 ">
                
                        <button type="button" class="btn  btn-primary btn-lg p-2" style="box-shadow:none !important; width:150px;"  id='teacher_button'>Показать</button>
                   
                    </li>

                </ul>
                    <!-- конец блока Преподаватель -->
                    </div>
                    <div class="tab-pane fade" id="audit" role="tabpanel" >
                    <!-- блок Аудитория -->
                    <ul class="navbar-nav mr-auto ml-3 ">
                    <li class="media md-form m-0 m-3 ">
                        <div class="    " id="date">
                            <input placeholder="Выберите дату" type="text" data-value='<?if ($date ) {echo $date;}?>' id="date-picker-example" class="datepicker  audit_date" >
                        </div>
                    </li>
                    <li class="media md-form   m-0 pl-3 p-1 ">

                    <select class="mdb-select colorful-select dropdown-primary" searchable="Поиск.." id='audit_select'>
                    <option class='text-white' value="" disabled selected>Выберите корпус</option>
                    <?foreach ( $CorpList as  $CorpList):?>
                    <option value='<?echo $CorpList['ИД_корпуса'];?>'><?echo $CorpList['Наименование_корпуса'];?></option>
                    <? endforeach;?>

                    </select>
                    </li>
                    <li class="media  m-0 ml-2 ">
                
                        <button type="button" class="btn  btn-primary btn-lg p-2" style="box-shadow:none !important; width:150px;" id='audit_button'>Показать</button>
                   
                    </li>

                </ul>
                    <!-- конец блока Аудитория -->
                    </div>
                    </div>
        
      </li>
    </ul>
   
  </div>
</nav>
<!--/.Navbar -->
  </header>
  <section class="dark-grey-text h-100 w-100" id="data_table">
<?if (isset($lesson)):?>
<h2 class='p-2'>Расписание звонков</h2>
                     
            <div class=" media   pl-1 ml-2 text-center" > 
                <table id="dtBasicExample" class=" table  table-lg caption-top table-striped table-bordered pt-2 pr-0" cellspacing="0" width="100%">

            <thead class="table-dark  ">
                <tr>
                <th class="th-sm ">Пара
                </th>
                <th class="th-sm">Начало 
                </th>
                <th class="th-sm "> Окончание
                </th>
                <th class="th-sm"> Перерыв
                </th>
                </tr>
            </thead>
            <tbody>

            
            <?foreach ($lesson as  $row):?>
            <?$id  =   $row['ИД_занятия'];?>
        <tr class=''>
                            
                            <td class=" pl-3"><b><? echo $row['ИД_занятия'] ?></b></td>
                            
                            <td class=" pl-3"><b><?echo $row['Время_начала']?></b></td>
                            <td class="pl-3"><b><?echo $row['Время_окончания']?></b></td>
                            <td class="pl-3" title="Перерыв после пары" ><b>
                            <?if ($row['ИД_занятия']  == '2' or $row['ИД_занятия']  == '5' ):?>
                                30 минут
                            <?elseif($row['ИД_занятия']  == '7'):?>
                                    
                            <?else:?>
                                10 минут                        
                            <?endif?>
                            </b></td>
                            
        </tr>          
    <?endforeach;?>


            </tbody>
            </table>

            </div>
        </section>
<?endif?>

  <?include ROOT.'/Views/Layouts/JS.php';?>
  <script>
  
$('#group_button').click(function() {
    $("#data_table").empty();
        date = $('.group_date').val();
        group = $('#group_select').val();
        console.log( group,date);

        if ( date == '' || group == null )
        {
            $("#data_table").append('<div class="alert alert-danger " role="alert"> <strong>Ошибка!</strong> Одно из полей пустое.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
        }
        else
        {
                urlLeft = 'ajax/group/'+date+'/'+group;
                console.log(urlLeft);

                $.post( urlLeft)
                    .done(function( data ) {
                        $("#data_table").append(data);
                    });
                
            }
        });

$('#teacher_button').click(function() {
        $("#data_table").empty();
        date = $('.teacher_date').val();
        teacher = $('#teacher_select').val();
        console.log( teacher,date);

        if ( date == '' || teacher == null )
        {
            $("#data_table").append('<div class="alert alert-danger " role="alert"> <strong>Ошибка!</strong> Одно из полей пустое.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
        }
        else
        {
                urlLeft = 'ajax/teacher/'+date+'/'+teacher;
                console.log(urlLeft);

                $.post( urlLeft)
                    .done(function( data ) {
                        $("#data_table").append(data);
                    });
                
            }
        });

$('#audit_button').click(function() {
        $("#data_table").empty();
        date = $('.audit_date').val();
        audit = $('#audit_select').val();
        console.log( audit,date);

        if ( date == '' || audit == null )
        {
            $("#data_table").append('<div class="alert alert-danger " role="alert"> <strong>Ошибка!</strong> Одно из полей пустое.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
        }
        else
        {
                urlLeft = 'ajax/audit/'+date+'/'+audit;
                console.log(urlLeft);

                $.post( urlLeft)
                    .done(function( data ) {
                        $("#data_table").append(data);
                    });
                
            }
        });




$(document).ready(function() {
      min_date = [<?if ($mindate ) {echo  $Min_day .','.$Min_month.','.$Min_year;}?>];
      max_date = [<?if ($maxdate ) {echo  $Max_day.','.$Max_month.','.$Max_year ;}?>];
    test = <?echo $mindate["MIN(`Дата_занятия`)"] ;?>;
      console.log(test);
      console.log(max_date);
    $('.datepicker').pickadate({
            // Strings and translations
            monthsFull:['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
            monthsShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
            weekdaysFull: ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'],
            weekdaysShort: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
            showMonthsShort: undefined,
            showWeekdaysFull: undefined,
            format: 'yyyy-mm-dd',
                        // Date limits
                    
            min: min_date,
            max: max_date,
            // Buttons
            today: 'Сегодня',
            clear: 'Очистить',
            close: 'Закрыть',

            // Accessibility labels
            labelMonthNext: 'Следующий месяц',
            labelMonthPrev: 'Предыдущий месяц'

           
            

        });
    
    $('.picker__select').removeClass('text-white');

$('.mdb-select').materialSelect();

$('input[type="text"]').addClass('text-white');
$('.search').removeClass('text-white');

});
  </script>
</body>
</html>
