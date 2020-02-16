<?php

  function sortByPosition($a, $b) {
      return $a['position'] - $b['position'];
  }

  usort($menu, 'sortByPosition');
  $user_id = $this->ion_auth->user()->row()->id;

?>
<?php if (isset($title)) $getTitle = $title; else $getTitle = '' ?>
<?php foreach ($menu as $tag){ ?>
  <?php  
    $permission = $tag['permission'];
    if(!empty($permission)){
      $permission[] = 1;
      if (!$this->ion_auth->in_group($permission))
        continue;
    }
  ?>
  <?php if (isset($tag['collapse'])){ ?>
    <?php foreach($tag['links'] as $link){

      $permission = $link['permission'];
      if(!empty($permission)){
        $permission[] = 1;
        if (!$this->ion_auth->in_group($permission))
          continue;
      }

      if (in_array($getTitle, $link)){
        $in = 'in'; $active = 'active'; break;
      }
      else{
        $in = ''; $active = '';
      }

    } ?>
          <li class="<?php echo $active ?>">
            <a data-toggle="collapse" href="#<?php echo $tag['href'] ?>">
                <i class="material-icons"><?php echo $tag['icon'] ?></i>
                <p> <?php echo $tag['name'] ?> 
                   <b class="caret"></b>
                </p>
            </a>
            <div class="collapse <?php echo $in ?>" id="users">
                <ul class="nav">
      <?php usort($tag['links'], 'sortByPosition'); foreach ($tag['links'] as $link){ 
        $permission = $link['permission'];
        if(!empty($permission)){
          $permission[] = 1;
          if (!$this->ion_auth->in_group($permission))
            continue;
        }   
          ?>
                    <li class="nav-link <?php if ($getTitle == $link['name']) echo "active" ?>">
                        <a style="font-size: 13px" class="nav-link" href="<?php echo $link['href'] ?>">
                            <span class="sidebar-mini"> 
                    <?php if(isset($link['icon'])){ ?>
                              <i class="material-icons"><?php echo $link['icon'] ?></i> 
                    <?php }else{ ?>
                              <?php echo $link['title'] ?>
                    <?php } ?>

                            </span>
                            <span class="sidebar-normal"> <?php echo $link['name'] ?> </span>
                        </a>
                    </li>
      <?php } ?>
                </ul>
            </div>
          </li>
  <?php }else{ ?>
          <li class="nav-item <?php if ($getTitle == $tag['name']) echo "active" ?>">
            <a class="nav-link" href="<?php echo $tag['href'] ?>">
              <i class="material-icons"><?php echo $tag['icon'] ?></i>
              <p><?php echo $tag['name'] ?></p>
            </a>
          </li>
  <?php } ?>
<?php } ?>