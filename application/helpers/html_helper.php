<?php

function render_table($columns = [], $id = '', $classes = '', $table_attributes = [])
{
	$_table_attributes = '';
	$columns_table = '';
	foreach ($table_attributes as $key => $val) {
        $_table_attributes .= $key . '=' . '"' . $val . '" ';
    }
    foreach ($columns as $key => $column){
        $th_class = '';
        if($key == 'disabled-sorting'){
            $th_class = 'disabled-sorting';
        }
    	$columns_table .= '<th class="'.$th_class.'">' . $column . '</th>' . "\n";
	}
	echo 
    '<div class="material-datatables">
	    <table id="'. $id .'" class="'. $classes .'" '. $_table_attributes .'>
	    	<thead>
	    	    <tr>
	    	    '. $columns_table .'
                </tr>
            </thead>
            <tfoot>
                <tr>
                '. $columns_table .'
                </tr>
            </tfoot>
       </table>
	</div>';
}
function search($array, $str){
    //This array will hold the indexes of every
    //element that contains our substring.
    $indexes = array();
    foreach($array as $k => $v){
        //If stristr, add the index to our
        //$indexes array.
        if(stristr($v, $str)){
            $indexes[] = $k;
        }
    }
    return $indexes;
}
