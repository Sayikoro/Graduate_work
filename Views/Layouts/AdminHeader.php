<header>
<!--Navbar -->
<nav class="mb-1  navbar navbar-expand-lg navbar-dark blue darken-3">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav ml-2 mr-auto">

      <li class="nav-item dropdown">
     <!-- Split button -->
        <div class="btn-group">
        <a href="/admin/" class='text-decoration-none p-0 m-0 text-white' style="    display: block;"> <button type="button" class="btn btn-outline-blue " style="color: white !important; box-shadow: none !important;"><b>Расписание</b></button></a>
          <button type="button" class="btn btn-blue dropdown-toggle p-2" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" style="box-shadow: none !important;">
            <span class="sr-only"></span>
          </button>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="/admin/para"><b>Занятие</b></a>
            <a class="dropdown-item" href="/admin/group"><b>Группа</b></a>
            <a class="dropdown-item" href="/admin/teacher"><b>Преподаватель</b></a>
            <a class="dropdown-item" href="/admin/audit"><b>Аудитория</b></a>
            <a class="dropdown-item" href="/admin/subj"><b>Предмет</b></a>
            <a class="dropdown-item" href="/admin/corp"><b>Корпус</b></a>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
         <!-- Split button -->
         <div class="btn-group">
         <a href="/admin/file/" class='text-decoration-none p-0 m-0 text-white' style="display: block;"><button type="button" class="btn btn-outline-blue" style="color: white !important; box-shadow: none !important;"><b>Файл</b></button></a>
          <button type="button" class="btn btn-blue dropdown-toggle px-3" style="box-shadow: none !important;" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <span class="sr-only"></span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/admin/setfile"><b>Утвердить</b></a>
          </div>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
    <!-- Split button -->
    <div class="btn-group">
         <button type="button" class="btn btn-outline-blue " style="color: white !important; box-shadow: none !important;" disabled> <b><?echo $user["Имя"]?></b></button>
          <button type="button" class="btn btn-blue dropdown-toggle p-2" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" style="box-shadow: none !important;">
            <span class="sr-only"></span>
          </button>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="/user/logout"><b>Выйти</b></a>
 
          </div>
        </div>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
  </header>