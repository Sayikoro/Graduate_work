<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?include ROOT.'/Views/Layouts/CSS.php';?>
    <title>Дата</title>
</head>
<body>
<div class="h-100 d-flex flex-row justify-content-between align-items-baseline">
<a href="/terminal/"> <button type="button" class="btn btn-primary btn-lg  mt-2" style="width:200px;height:50px;box-shadow: none !important;" > <b>На главную</b></button></a>

<div class="next"></div>
</div>
<div class="container mt-3 pt-3">
<h3 class='d-flex justify-content-start' >  <p class='p-o m-0' id = 'selectdate'> <?if ($date ) {echo 'Выбранная дата: '.$date;} ?></p></h3>
    <div  class="align-middle text-center">
    <li class="md-form m-0 m-3 " style="list-style-type: none !important; ">
                        <div class="    " id="date">
                        <button type="button" class="btn btn-primary btn-lg  mt-2  datepicker" data-value="<?echo date("Y-m-d")?>" style="width:330px;height:100px;box-shadow: none !important;" > <h3><b>Выберите дату</b></h3></button>
                           <input placeholder="Выберите дату"  type="hidden"  data-value='' > 
                        </div>
                    </li>
    </div>
   
</div>

<?include ROOT.'/Views/Layouts/JS.php';?>
<script>



$('.datepicker').pickadate({

    onStart:function() {
    date = this.get()
    getdate(date);

  },
 
  onClose: function() {
    date = this.get()
    getdate(date);

  },
            // Strings and translations
            monthsFull:['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
            monthsShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
            weekdaysFull: ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'],
            weekdaysShort: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
            showMonthsShort: undefined,
            showWeekdaysFull: undefined,
            format: 'yyyy-mm-dd',
                        // Date limits
     
            // Buttons
            today: 'Сегодня',
            clear: 'Очистить',
            close: 'Закрыть',

            // Accessibility labels
            labelMonthNext: 'Следующий месяц',
            labelMonthPrev: 'Предыдущий месяц'

           
            

        });
    
function getdate(date)
{
    $('#selectdate').text('Выбранная дата: '+date);
    link = '/terminal/<?echo $select;?>/<?echo $id;?>/'+date;
    $('.next').html(
        '<a href="'+link+'"> <button type="button" class="btn btn-primary btn-lg  mt-2" style="width:200px;height:50px;box-shadow: none !important;" ><b> Показать</b></button></a>')
    console.log(date);
}   
        
        </script>

</body>
</html>