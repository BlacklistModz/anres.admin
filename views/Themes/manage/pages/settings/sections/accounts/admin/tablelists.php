<?php

$tr = "";
$tr_total = "";
$url = URL .'users/';
if( !empty($this->results['lists']) ){

    $seq = 0;
    foreach ($this->results['lists'] as $i => $item) {

        // $item = $item;
        $cls = $i%2 ? 'even' : "odd";
        // set Name

        $disabled = '';
        if( $item['id'] == $this->me['id'] ){
            $disabled = 'disabled';
        }

        $tr .= '<tr class="'.$cls.'" data-id="'.$item['id'].'">'.

            '<td class="name">'.

                '<div class="anchor clearfix">'.

                    '<div class="content"><div class="spacer"></div><div class="massages">'.

                        '<div class="fullname"><a class="fwb">'. $item['firstname'].'</a></div>'.
                        '<div class="fsm fcg whitespace">Username : '.$item['username'].'</div>'.
                    '</div>'.
                '</div></div>'.

            '</td>'.

            '<td class="status">'.ucfirst($item['permission']).'</td>'.

            '<td class="actions">'.

                '<div class="group-btn whitespace">'.
                '<span class="gbtn">'.
                    '<a data-plugins="dialog" href="'.$url.'password/'.$item['id'].'" class="btn btn-no-padding btn-blue"><i class="icon-key"></i></a>'.
                '</span>'.
                '<span class="gbtn">'.
                    '<a data-plugins="dialog" href="'.$url.'edit/'.$item['id'].'" class="btn btn-no-padding btn-orange"><i class="icon-pencil"></i></a>'.
                '</span>'.
                '<span class="gbtn">'.
                    '<a data-plugins="dialog" href="'.$url.'del/'.$item['id'].'" class="btn btn-no-padding btn-red '.$disabled.'"><i class="icon-trash"></i></a>'.
                    '</div>'.
                '</span>'.
            '</td>'.

        '</tr>';

    }
}

$table = '<table class="settings-table"><tbody>'. $tr. '</tbody>'.$tr_total.'</table>';
