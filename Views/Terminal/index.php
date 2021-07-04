<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?include ROOT.'/Views/Layouts/CSS.php';?>
    <title>Терминал</title>
</head>
<body>
    <div class="container mt-3 pt-3">
    <div  class="align-middle text-center">
    <a href="/terminal/group"><button type="button" class="btn btn-primary btn-lg mt-2" style="width:330px; height:150px;box-shadow: none !important;"><h3><b>Группа</b></h3></button>
    </a>
    <br>
    <a href="/terminal/teacher"><button type="button" class="btn btn-primary btn-lg  mt-2" style="width:330px;height:150px;box-shadow: none !important;" > <h3><b>Преподаватель</b></h3></button>
</a>
<br>
<a href="/terminal/audit"><button type="button" class="btn btn-primary btn-lg mt-2" style="width:330px;height:150px;box-shadow: none !important;" > <h3><b>Аудитория</b></h3></button>
  </a>
  </div>
  
</div>

<div class="h-100 d-flex justify-content-between align-items-end">

</div>
<footer class="page-footer font-small fixed-bottom">

<div class="h-100 d-flex justify-content-end align-items-stretch">
<button type="button" class="btn btn-primary btn-lg mt-2" style="box-shadow: none !important;" aria-hidden="true" data-toggle="modal" data-target="#centralModalSm" > <h3><b>?</b></h3></button>
 
</div>
</footer>






<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->





    
  <?include ROOT.'/Views/Layouts/JS.php';?>
</body>
</html>