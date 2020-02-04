<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php init_head(); ?>
 <div class="row">
        <div class="col-md-12">
<div class="card">
  <div class="card-content">

                <a class="btn btn-info" href="<?php echo admin_url("label_management")?>">English</a>
                <a class="btn btn-info" href="<?php echo admin_url() . "label_management/index/arabic"?>">Arabic</a>

                <h2 class="m-5"><?php echo ucfirst($language) ?></h2>
                <div class="row">
                  <div class="col-md-4">
                    <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New</button>
                  </div>
                  <div class="col-md-4">
                    <a class="btn <?php if ($custom == "custom_lang") echo "btn-info" ?>" href="<?php echo admin_url() . "label_management/index/".$language."/custom_lang"?>">Custom</a>
                    <a class="btn <?php if ($custom == $language."_lang") echo "btn-info" ?>" href="<?php echo admin_url() . "label_management/index/".$language."/".$language."_lang"?>">Native</a>
                  </div>
                  <div class="col-md-4">
                        
                    <div id="" class=" pull-right">
                      <label>
                        <form id="form" action="<?php echo admin_url() .'label_management/index/'.$language.'/'.$custom . '/' . $offset ?>">
                          <div class="input-group">
                            <span class="input-group-addon" id="link">
                              <a href="#" class="fa fa-search"></a>
                            </span>
                            <input type="search" name="search" class="form-control" placeholder="Search...">
                          </div>
                        </form>
                      </label>
                    </div>

                  </div>
                </div>



                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">New Label</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Label:</label>
                            <input type="text" class="form-control" id="recipient-name" name="key">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Transulation :</label>
                            <input type="text" class="form-control" id="recipient-name" name="value">
                          </div>
                          <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Label</button>
                      </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deactive">
                          Edit Label
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Label:</label>
                            <input type="text" class="form-control" id="recipient-name" name="key" readonly>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Transulation :</label>
                            <textarea type="text" class="form-control" id="recipient-name" name="value"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="save_changes" href="" class="btn btn-primary">Save changes</button>
                      </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>
                </div>
    
      <table class="table">
      <thead>

        <tr>
          <th scope="col">Label</th>
          <th scope="col"><?php echo ucfirst($language) ?></th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>

      </thead>
      <tbody>
<?php $i = 0; foreach($lang as $key => $value): $i++ ?>
    <?php if ($offset > $i)continue; ?>
        <tr>
          <td><?php echo $key ?></td>
          <td><?php echo htmlspecialchars($value) ?></td>
          <td>
<a class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-target="#EditModal" data-key="<?php echo $key ?>" data-value="<?php echo htmlspecialchars($value) ?>"><i class="material-icons">dvr</i></a>
          </td>
          <td><a class="btn btn-simple btn-danger btn-icon remove" href="<?php echo admin_url() . "label_management/delete/" . $key . "/" . $language . "/" . $custom ?>" role="button"><i class="material-icons">close</i></a></td>
        </tr>
    <?php if ($i >= $start) break; ?>
<?php endforeach; ?>        
      </tbody>
    </table>


<?php 
//<a  href="'.admin_url("profile/edit_user/").$aRow['0'].'" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>

//<a onclick="deactive_json(' . $aRow['0'] . ')" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
  $offset--;
  $count = count($lang);
  $f = round($count/$per_page);
  if ($count/$per_page > round($count/$per_page))
  $f += 1;
  // echo $offset/$per_page + 1;
?>

<ul class="pagination pagination-right pagination-large">

<?php $active = ''; if ($offset/$per_page + 1 == 1) $active = 'active' ?>
<li class="<?php echo $active ?> previous"><a href="<?php echo admin_url() . 'label_management/index/' . $language .  '/' . $custom . '/' . 0 . "/". $search ?>">&larr; First</a></li>

<?php for ($i = 1; $i <= $f ; $i++): ?>
  <?php if ($offset == $i * $per_page) $active  = 'active'; else $active = '' ?>
  <?php if (($offset/$per_page + 1 <= $i + 6) and ($offset/$per_page + 1 >= $i - 8) and ($i + 1 < $f)){ ?>
      <li class="<?php echo $active ?>"><a href="<?php echo admin_url() . 'label_management/index/' . $language .  '/' . $custom . '/' . ($i) * $per_page . "/". $search ?>"><?php echo $i + 1 ?></a></li>
  <?php } ?>
<?php endfor; ?>

<?php if ($offset/$per_page + 1 == $f) $active = 'active' ?>
<li class="<?php echo $active ?> next"><a href="<?php echo admin_url() . 'label_management/index/' . $language .  '/' . $custom . '/' . ($i - 2) * $per_page . "/". $search ?>">Last &rarr;</a></li>
</ul>
 
</div>
</div>
</div>
</div>

<?php init_tail(); ?>
<script type="text/javascript">
$('#EditModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var key = button.data('key') // Extract info from data-* attributes
  var value = button.data('value');
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body input').val(key);
  modal.find('.modal-body textarea').val(value);
})
document.getElementById("link").onclick = function() {
    document.getElementById("form").submit();
}
</script>
  </body>
</html>