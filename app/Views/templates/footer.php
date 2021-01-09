<script src=""></script>
<script src="<?php echo base_url('js/main.js');?>"> </script>

<script src="<?php echo base_url('js/bootstrap.min.js');?>"> </script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


</script>
</body>
</html>
