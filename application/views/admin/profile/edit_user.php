<?php init_head() ?>
          <div class="row">
            <?php echo form_open_multipart(uri_string(), ['id' => "edit_user"]);?>
            <div class="col-md-12">
              <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                      <h4 class="card-title"><?php echo _l('update_profile') ?></h4>
                        <div class="row">
                          <div class="col-md-9">
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo render_input('username',_l('username') . " <small class='text-danger'>*</small>", $user->username, 'username', ['required' => 'true']); ?>
                              </div>
                              <div class="col-md-6">
                                <?php echo render_input('email', _l('email') . " <small class='text-danger'>*</small>", $user->email, 'email', ['required' => 'true']); ?>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo render_input('first_name',_l('first_name'), $user->first_name, 'first_name'); ?>
                              </div>
                              <div class="col-md-6">
                                <?php echo render_input('last_name',_l('last_name'), $user->last_name, 'last_name'); ?>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo render_input('phone',_l('phone'), $user->phone, 'phone'); ?>
                              </div>
                              <div class="col-md-6">
                                <?php echo render_input('company',_l('company'), $user->company, 'company'); ?>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <?php echo render_input('city',_l('city'), $user->city, 'city'); ?>
                              </div>
                              <div class="col-md-4">
                                <?php echo render_input('country',_l('country'), $user->country, 'country'); ?>
                              </div>
                              <div class="col-md-4">
                                <?php echo render_input('address',_l('address'), $user->address, 'address'); ?>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="user_type" id="user_type"><?php echo _l('user_type') ?></label>
                                  <select name="user_type" id="user_type" class="selectpicker" data-style="select-with-transition" title="user_type" data-size="7">
                                      <option disabled selected>Choose <?php echo _l("user_type") ?></option>
                                    <?php foreach($this->ion_auth->groups()->result() as $group){ ?>
                                      <?php if($group->id == 1) continue; ?>
                                      <option <?php if($group->id == $group_id) echo "selected='selected'" ?> value="<?php echo $group->id ?>"><?php echo $group->name ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="lable-dir" for="dir">Dir</label>
                                  
                                  <select name="dir" id="dir" class="selectpicker" data-style="select-with-transition" title="dir" data-size="7">
                                    <option disabled selected>dir</option>
                                    <option value="rtl" <?php if($user->dir == "rtl") echo 'selected' ?>>rtl</option>
                                    <option value="ltr" <?php if($user->dir == "ltr") echo 'selected' ?>>ltr</option>
                                  </select>
                                </div>

                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="language" for="language"><?php echo _l('default_language') ?></label>
                                  
                                  <select name="default_language" id="language" class="selectpicker" data-style="select-with-transition" title="language" data-size="7">
                                    <option disabled selected>Choose Default Language</option>
                                    <option value="arabic" <?php if($user->default_language == "arabic") echo 'selected' ?>>العربية</option>
                                    <option value="english" <?php if($user->default_language == "english") echo 'selected' ?>>English</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <?php 
                              foreach($this->ion_auth->get_users_groups($user->id)->result() as $user_group){
                                if($user_group->id == 1) continue;
                                $group_id = $user_group->id;
                              }
                            ?>


                            <div class="row">

                              <div class="col-md-6">
                                <?php echo render_input('password',_l('password') . '*', '', 'password'); ?>
                              </div>
                              <div class="col-md-6">
                                <?php echo render_input('password_confirm',_l('password_confirm') . '*', '', 'password'); ?>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <h4 class="title">Avatar</h4>
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail img-circle">
                                <?php $photo = ($user->avatar != '')? base_url() . $user->avatar : base_url().'assets1/img/faces/default-avatar.jpg' ?>
                                <img src="<?php echo $photo ?>" alt="Avatar">
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                              <div>
                                <span class="btn btn-round btn-rose btn-file">
                                  <span class="fileinput-new">Change Photo</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input class="valid" type="file" aria-invalid="false" name="avatar">
                                </span>
                                <br>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                            </div>
                            <div class="checkbox form-horizontal-checkbox">
                              <label>
                                <input type="checkbox" value="yes" name="without_photo"><span class="checkbox-material"></span>
                                <?php echo _l('without_photo') ?>
                              </label>
                            </div>
                            <?php
                              $checked = '';
                              if($this->ion_auth->in_group(1, $user->id)){
                                $checked = 'checked="checked"';
                              }
                            ?>
                            <div class="checkbox form-horizontal-checkbox">
                              <label>
                                <input <?php echo $checked ?> type="checkbox" value="1" name="is_admin"><span class="checkbox-material"></span>
                                <?php echo _l('is_admin') ?>
                              </label>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-rose pull-right"><?php echo _l('update_profile') ?></button>
                        <div class="clearfix"></div>
                        <?php echo form_hidden('id', $user->id);?>
                  
                    </div>
              </div>
            </div>
            <?php echo form_hidden($csrf); ?>
                  </form>
          </div>

<?php init_tail() ?>
<script type="text/javascript">

    function setFormValidation(id){
      $(id).validate({
        errorPlacement: function(error, element) {
          $(element).closest('div').addClass('has-error');
            }
      });
    }

    $(document).ready(function(){
      setFormValidation('#edit_user');
    });
</script>
 </body>
 </html>
