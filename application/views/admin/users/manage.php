<?php init_head() ?>
                <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>

                <div class="card-content">
                    <h4 class="card-title"><?php echo lang('users') ?></h4>
                    
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                  <?php

                    render_table(
                      [
                        lang('avatar'),
                        lang('full_name'), 
                        lang('email'),
                        'disabled-sorting' => lang('control')
                      ], 
                      'datatables', 
                      "table table-striped table-no-bordered table-hover",
                      [
                        'cellspacing' => "0",
                        'width' => "100%", 
                        'style' => 'width="100%"'
                      ]
                    );
                    $this->load->view('admin/users/modals/deactive');
                  ?>           
                </div>
                <!-- end content-->
              </div>
              <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
          </div>
          <!-- end row -->
<?php init_tail() ?>
  <script>

    $(document).ready(function() {
      
      var table = $('#datatables').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo admin_url() . 'users/users_json' ?>",
        responsive: true,
        language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
        }
      });
    });
  </script>