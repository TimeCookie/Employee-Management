function formRoute() {
  $('#btn-print').click(function(){
    $('#prof-edit').attr('action', '../print-template.php');
    $('#prof-edit').submit();
});
}