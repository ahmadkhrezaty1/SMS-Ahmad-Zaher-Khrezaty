<div class="modal fade" id="deactive" tabindex="-1" role="dialog" aria-labelledby="deactive" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deactive">
          Deactivate User
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Are you sure you want to deactivate the user 'administrator'</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save_changes" href="" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
    function deactive_json(id){

        save_method = 'update';
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string


        //Ajax Load data from ajax
                $('[id="save_changes"]').prop('href', "<?php echo admin_url('departments/deactivate/') ?>" + id);
                $('#deactive').modal('show'); // show bootstrap modal when complete loaded
    }
</script>