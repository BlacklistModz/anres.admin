<?php
//print_r($this->results['lists']); die;
$tr = "";
$tr_total = "";

if( !empty($this->results['lists']) ){ 
    //print_r($this->results); die;

    $seq = 0;
    foreach ($this->results['lists'] as $i => $item) { 
        // $item = $item;
        $cls = $i%2 ? 'even' : "odd";
        // set Name

        $tr .= '<tr class="'.$cls.'" data-id="'.$item['uid'].'">'.

            // '<td class="check-box"><label class="checkbox"><input id="toggle_checkbox" type="checkbox" value="'.$item['id'].'"></label></td>'.

            '<td class="email">'.$item['presentation_type'].'</td>'.

            '<td class="name">'.

                '<div class="anchor clearfix">'.

                    '<div class="content"><div class="spacer"></div><div class="massages">'.

                        '<div class="fullname"><a class="fwb" href="'.URL .'persentation/'.$item['uid'].'">'.$item['fullname'].'</a></div>'.

                        '<div class="subname fsm fcg meta"></div>'.

                    '</div>'.
                '</div></div>'.

            '</td>'.

            '<td class="email"></td>'.

            '<td class="status"></td>'.

            '<td class="status"></td>'.

            '<td class="status"></td>'.

            '<td class="status"></td>'.

            '<td class="actions"></td>'.

        '</tr>';
        
    }
  
}

$table = '<table><tbody>'. $tr. '</tbody>'.$tr_total.'</table>';