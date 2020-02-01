<script>
<?php if (!empty($warning)){ ?>
  swal({
    title: "Something went wrong!",
    
    type: "warning",
    buttonsStyling: false, 
    confirmButtonClass: "btn btn-success",
    html: <?php echo str_replace('\n', "<br><br>", json_encode("<span class='text-danger'>".strip_tags($warning)."</span>")) ?>
  });
<?php } ?>

<?php if (!empty($success)){ ?>
  swal({ title:"Good job!", html: <?php echo str_replace('\n', "<br><br>", json_encode("<span class='text-success'>".strip_tags($success)."</span>")) ?>, type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
<?php } ?>
    
  </script>