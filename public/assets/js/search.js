$(function(){
   $('#search').keyup(function() {
      var table = $('.table').DataTable();
      table.search($(this).val()).draw();
  });
});
   
