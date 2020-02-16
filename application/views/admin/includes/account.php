
                <li class="dropdown">
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                       <i class="material-icons">person</i>
                       <p class="hidden-lg hidden-md">Profile<b class="caret"></b></p>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo admin_url('profile/edit_user/'.$this->session->userdata('user_id')) ?>">
                                <span class="sidebar-normal"> <?php echo _l('profile') ?> </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>LanguageSwitcher/switchlang/english">
                                <span class="sidebar-normal"> english </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>LanguageSwitcher/switchlang/arabic">
                                <span class="sidebar-normal"> العربية </span>
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a href="<?php echo base_url() ?>auth/logout">
                                <span class="sidebar-normal"> <?php echo _l('logout') ?> </span>
                            </a>
                        </li>
                    </ul>
                </li>