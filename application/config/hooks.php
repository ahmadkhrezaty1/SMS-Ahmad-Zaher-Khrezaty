<?php defined('BASEPATH') OR exit('No direct script access allowed');  
  
$hook['pre_controller'] = array(  
        'class' => 'MyExm',  
        'function' => 'tut',  
        'filename' => 'MyExm.php',  
        'filepath' => 'hooks',  
        );

$hook['post_controller_constructor'] = array(
   'class'    => 'LanguageLoader',
   'function' => 'initialize',
   'filename' => 'LanguageLoader.php',
   'filepath' => 'hooks'
);