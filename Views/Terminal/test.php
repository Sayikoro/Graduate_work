<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui-datepicker.min.js"></script>
<?include ROOT.'/Views/Layouts/CSS.php';?>

</head>
<body>
<div class="h-100 d-flex flex-row justify-content-between align-items-baseline">
<a href="/terminal/"> <button type="button" class="btn btn-primary btn-lg  mt-2" style="width:200px;height:70px;box-shadow: none !important;" > <b>На главную</b></button></a>
<h2>Расписание для группы: ГРУППА</h2>
<a href="/terminal/group/"> <button type="button" class="btn btn-primary btn-lg  mt-2" style="width:200px;height:70px;box-shadow: none !important;" > <b>Изменить группу</b></button></a>

</div>
<div class="h-100 d-flex flex-row justify-content-center  m-1 ">
    <div class=" align-self-center  ">
    <div id="datepicker"></div>
<input type="hidden" id="datepicker_value" value="">
    </div>
 
<div class=" flex-fill me-auto" style="  background:white;">
<div class="">
                <div class="table-responsive pl-1 ml-2 text-center"> 
                <table id="dtBasicExample" class="table  table-lg caption-top table-striped table-bordered pt-2 pr-0" cellspacing="0" width="100%">

                <thead class="table-dark ">
                <tr>
                <th class="th-sm">Время
                </th>
                <th class="th-sm">Предмет
                </th>
                <th class="th-sm">Аудитория
                </th>
                <th class="th-sm">Преподаватель
                </th>
                

                    </tr>
                </thead>
                <tbody>
                <tr>
                            <td class="pl-3">3.12:10 - 13:40</td>
                            <td class="pl-3">МДК 01.01 Проектирование зданий и сооружений                                                        </td>
                            <td class="pl-3">20м</td>
                            <td class="pl-3">Прамзелева В.В.                         </td>
                            </tr><tr>
                            <td class="pl-3">4.13:50 - 15:20</td>
                            <td class="pl-3">Диф.зачет Системы автоматизированного проетирования и обработки информации                          </td>
                            <td class="pl-3">20</td>
                            <td class="pl-3">Прамзелева В.В.                         </td>
                            </tr><tr>
                            <td class="pl-3">5.15:50 - 17:20</td>
                            <td class="pl-3">Экономика отрасли                                                                                   </td>
                            <td class="pl-3">18</td>
                            <td class="pl-3">Рацюк Т.М.                              </td>
                            </tr><tr>
                            <td class="pl-3">6.17:50 - 19:20</td>
                            <td class="pl-3">Экономика отрасли                                                                                   </td>
                            <td class="pl-3">18</td>
                            <td class="pl-3">Рацюк Т.М.                              </td>
                            </tr>
                </tbody>

                </table>

                </div></div>
</div>








<style>
    .ui-datepicker,
    .ui-datepicker table,
    .ui-datepicker tr,
    .ui-datepicker td,
    .ui-datepicker th {
    margin: 0 !important;
    padding: 0!important;
    border: none!important;
    border-spacing: 0!important;
    }
    .ui-datepicker {
        height: 100% !important;
    width: 450px!important;
    padding: 35px!important;
    cursor: default!important;

    text-transform: uppercase !important;
    font-family: Roboto !important;
    font-size: 12px !important;

    border-radius: 0px ;
    }
    .ui-datepicker-header {

    border-bottom: 1px solid #d6d6d6 !important;
    }

    .ui-datepicker-title { text-align: center !important; }

    .ui-datepicker-month {
    position: relative !important;
    padding-right: 15px !important;
    }

    .ui-datepicker-year {
    padding-left: 8px !important;

    }

    .ui-datepicker-month:before {
    display: block ;
    position: absolute;
    top: 5px;
    right: 0;
    width: 5px;
    height: 5px;
    content: '';

    background: #a5cd4e;

    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    }

    /* .ui-datepicker-prev,
    .ui-datepicker-next {
    position: absolute;
    top: -2px;
    padding: 5px;
    cursor: pointer;
    } */

    .ui-datepicker-prev {
    left: 0;
    padding-left: 0;
    }

    .ui-datepicker-next {
    right: 0;
    padding-right: 0;
    }

    /* .ui-datepicker-prev span,
    .ui-datepicker-next span{
    display: block;
    width: 5px;
    height: 10px;
    text-indent: -9999px;

    background-image: url('../views/Template/img/arrows.png');
    } */


    .ui-datepicker-calendar th {
    padding-top: 15px !important;
    padding-bottom: 10px !important;

    text-align: center !important;
    font-weight: normal !important;
    
    }

    .ui-datepicker-calendar td {

    text-align: center!important;
    line-height: 26px !important;
    }

    a {
        padding:1px 10px  1px 1px  !important;
    }


    .ui-datepicker-calendar .ui-state-default {
    display: block !important;
    height: 30px;
    width: 50px !important;
    outline: none !important;
    text-decoration: none !important;
    border: 1px solid white !important;
    }

    .ui-datepicker-calendar .ui-state-active .ui-state-default {
    color: #b0bfc6  !important;
    border: 1px solid #b0bfc6 !important;
    }

    .ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
        border: 1px solid #b0bfc6 !important;
        background: #b0bfc6 !important;
    }



    .ui-datepicker-other-month .ui-state-default { color: #b0bfc6 !important; }

</style>

<script>
/* Локализация datepicker */



$(function(){
	$("#datepicker").datepicker({
		onSelect: function(date){
			$('#datepicker_value').val(date);
            console.log( $('#datepicker_value').val())
		},
        closeText: 'Закрыть',
	prevText: 'Предыдущий',
	nextText: 'Следующий',
	currentText: 'Сегодня',
	monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
	monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
	dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
	dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
	dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
	weekHeader: 'Не',
	dateFormat: 'dd.mm.yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
	});
	$("#datepicker").datepicker("setDate", $('#datepicker_value').val());
});
</script>


 <?include ROOT.'/Views/Layouts/JS.php';?>


 <script>
 
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>