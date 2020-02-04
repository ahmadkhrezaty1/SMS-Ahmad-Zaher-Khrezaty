<body <?php if(user()->dir == 'rtl') echo "class='rtl-active'" ?>>
    <div class="wrapper">

      <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?php echo base_url() ?>assets/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->

     <div class="logo">
        <a href="<?php echo admin_url() ?>" class="simple-text logo-mini">
          ET
        </a>
        <a href="<?php echo admin_url() ?>" class="simple-text logo-normal">
          Ebla Team
        </a>
      </div>

    <div class="sidebar-wrapper">
      <div class="user">
            <div class="photo">
                <?php $photo = (user()->avatar != '')? base_url() . user()->avatar : base_url().'assets1/img/faces/default-avatar.jpg' ?>
                <img src="<?php echo $photo ?>" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                         <?php echo user()->first_name . ' ' . user()->last_name ?>
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="<?php echo admin_url('profile/edit_user/'.$this->session->userdata('user_id')) ?>">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> <?php echo _l('profile') ?> </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>LanguageSwitcher/switchlang/english">
                                <span class="sidebar-mini"> EN </span>
                                <span class="sidebar-normal"> english </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>LanguageSwitcher/switchlang/arabic">
                                <span class="sidebar-mini"> AR </span>
                                <span class="sidebar-normal"> العربية </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      <ul class="nav">
        <?php $this->load->view('admin/includes/setup_menu') ?>
      </ul>
    </div>
  </div>
