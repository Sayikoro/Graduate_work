<!-- jQuery -->
<script type="text/javascript" src="<?ROOT?>/Views/Template/js/jquery.min.js"></script>

  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?ROOT?>/Views/Template/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?ROOT?>/Views/Template/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?ROOT?>/Views/Template/js/addons/datatables.min.js"></script>
  <script type="text/javascript" src="<?ROOT?>/Views/Template/js/mdb.min.js"></script>
 
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript">
    $(document).ready(function() {
        
        $('.myCheckbox').prop('checked', true);
        dateclear();
        $('#materialUnchecked').on('click', dateclear);
        $('.mdb-select').materialSelect();
        
        $('#dtBasicExample').DataTable(
         {  searching: false,
            paging: false,}
        );
        

        


      })
    

  </script>