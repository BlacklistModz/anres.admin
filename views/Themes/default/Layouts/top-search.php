<?php


$form = new Form();
$form = $form->create()
    // set From
    ->elem('div')
    ->addClass('form-insert');

$form   ->field("type")
        ->label($this->lang->translate('Property Type') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' ); 

$form   ->field("Location")
        ->label($this->lang->translate('Location') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' ); 

$form   ->field("facilities")
        ->label($this->lang->translate('facilities') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' ); 

$form   ->field("lease")
        ->label($this->lang->translate('Lease Type') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' );

$details1 = $form->html();



$form = new Form();
$form = $form->create()
    // set From
    ->elem('div')
    ->addClass('form-insert');

$form   ->field("square_meters")
        ->label($this->lang->translate('Square Meters') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' ); 

$form   ->field("bed")
        ->label($this->lang->translate('Bed') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' ); 

$form   ->field("bath")
        ->label($this->lang->translate('Bath') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' ); 

$form   ->field("pet_friendly")
        ->label($this->lang->translate('Pet Friendly') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' ); 

$details2 = $form->html();


$form = new Form();
$form = $form->create()
    // set From
    ->elem('div')
    ->addClass('form-insert');

$form   ->field("bts")
        ->label($this->lang->translate('BTS') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' ); 

$form   ->field("mrt")
        ->label($this->lang->translate('MRT') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' ); 

$form   ->field("airport")
        ->label($this->lang->translate('Airport Rail Link') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' );

$details3 = $form->html();


$form = new Form();
$form = $form->create()
    // set From
    ->elem('div')
    ->addClass('form-insert');

$form   ->field("near_schools")
        ->label($this->lang->translate('Near Schools') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' ); 

$form   ->field("near_airport")
        ->label($this->lang->translate('Near Airport') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' ); 

$form   ->field("near_embassy")
        ->label($this->lang->translate('Near Embassy') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' );

$form   ->field("near_shopping_malls")
        ->label($this->lang->translate('Near Shopping Malls') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' );


$details4 = $form->html();


$form = new Form();
$form = $form->create()
    // set From
    ->elem('div')
    ->addClass('form-insert');

$form   ->field("budget")
        ->label($this->lang->translate('Budget THB') )
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->select( array() )
        ->value( '' ); 
$details5 = $form->html();

//---- Menu House for rent in Bangkok ----//
$_menu[1] = array('name'=>'House for rent in Bangkok', 'url'=>URL.'property/rent/houses/bangkok' ,'first'=>'House for rent');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'in Nichada Thani', 'url' => URL.'property/rent/houses/nichada');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'near United Nations', 'url' => URL.'property/rent/houses/un');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'near BTS', 'url' => '#');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'near MRT', 'url' => '#');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'near Airport Rail Link', 'url' => '#');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'near Shopping Malls', 'url' => URL.'#');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'near Park', 'url' => URL.'#');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'near Embassy', 'url' => URL.'#');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'near School', 'url' => URL.'#');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'in Sukhumvit', 'url' => URL.'property/rent/houses/sukhumvit');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'in Ploenchit', 'url' => URL.'property/rent/houses/ploenchit');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'in Sathorn', 'url' => URL.'property/rent/houses/sathorn');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'in Bangna trad', 'url' => URL.'property/rent/houses/bangna-trad');
$_menu[1]['lists'][] = array('id'=>'', 'name'=>'in Srinakarin', 'url' => URL.'property/rent/houses/srinakarin');

//---- BTS ----//
$_sub[1][2][] = array('id'=>'', 'name'=>'Bang Na BTS Station', 'url'=>URL.'property/houses/station/bang-na');
$_sub[1][2][] = array('id'=>'', 'name'=>'Onnut BTS Station', 'url'=>URL.'property/houses/station/onnut');
$_sub[1][2][] = array('id'=>'', 'name'=>'Prakanong BTS Station', 'url'=>URL.'property/houses/station/prakanong');
$_sub[1][2][] = array('id'=>'', 'name'=>'Ekkamai BTS Station', 'url'=>URL.'property/houses/station/ekkamai');
$_sub[1][2][] = array('id'=>'', 'name'=>'Thong Lo BTS Station', 'url'=>URL.'property/houses/station/thong-lo');
$_sub[1][2][] = array('id'=>'', 'name'=>'Phrom Phong BTS Station', 'url'=>URL.'property/houses/station/phrom-phong');
$_sub[1][2][] = array('id'=>'', 'name'=>'Asok BTS Station', 'url'=>URL.'property/houses/station/asok');
$_sub[1][2][] = array('id'=>'', 'name'=>'Nana BTS Station', 'url'=>URL.'property/houses/station/nana');
$_sub[1][2][] = array('id'=>'', 'name'=>'Ploenchit BTS Station', 'url'=>URL.'property/houses/station/ploenchit');
$_sub[1][2][] = array('id'=>'', 'name'=>'Phaya Thai BTS Station', 'url'=>URL.'property/houses/station/phaya-thai');
$_sub[1][2][] = array('id'=>'', 'name'=>'Ari BTS Station', 'url'=>URL.'property/houses/station/ari');

//---- MRT ----//
$_sub[1][3][] = array('id'=>'', 'name'=>'Sam Yan MRT Station', 'url' => URL.'property/houses/station/samyan');
$_sub[1][3][] = array('id'=>'', 'name'=>'Si Lom MRT Station', 'url' => URL.'property/houses/station/silom');
$_sub[1][3][] = array('id'=>'', 'name'=>'Lumphini MRT Station', 'url' => URL.'property/houses/station/lumphini');
$_sub[1][3][] = array('id'=>'', 'name'=>'Khlong Toei MRT Station', 'url' => URL.'property/houses/station/khlong-toei');
$_sub[1][3][] = array('id'=>'', 'name'=>'Queen Sirikit National Convention Centre MRT Station', 'url' => URL.'property/houses/station/qsncc');
$_sub[1][3][] = array('id'=>'', 'name'=>'Sukhumvit MRT Station', 'url' => URL.'property/houses/station/sukhumvit');
$_sub[1][3][] = array('id'=>'', 'name'=>'Phetchaburi MRT Station', 'url' => URL.'property/houses/station/phetchaburi');
$_sub[1][3][] = array('id'=>'', 'name'=>'Phra Ram 9 MRT Station', 'url' => URL.'property/houses/station/phra-ram-9');

//---- AIRPORT ----//
$_sub[1][4][] = array('id'=>'', 'name'=>'Phaya Thai Station', 'url' => URL.'property/houses/near/airport-rail-link-phaya-thai-station');
$_sub[1][4][] = array('id'=>'', 'name'=>'Ratchaprarop Station', 'url' => URL.'property/houses/near/airport-rail-link-ratchaprarop-station');
$_sub[1][4][] = array('id'=>'', 'name'=>'Makkasan Station', 'url' => URL.'property/houses/near/airport-rail-link-makkasan-station');
$_sub[1][4][] = array('id'=>'', 'name'=>'Ramkhamhaeng Station', 'url' => URL.'property/houses/near/airport-rail-link-ramkhamhaeng-station');
$_sub[1][4][] = array('id'=>'', 'name'=>'Hua Mak Station', 'url' => URL.'property/houses/near/airport-rail-link-hua-mak-station');

//---- Mall ----//
$_sub[1][5][] = array('id'=>'', 'name'=>'Central World', 'url' => URL.'property/houses/mall/centralworld');
$_sub[1][5][] = array('id'=>'', 'name'=>'Siam Paragon', 'url' => URL.'property/houses/mall/siam-paragon');
$_sub[1][5][] = array('id'=>'', 'name'=>'MBK Center', 'url' => URL.'property/houses/mall/mbk');
$_sub[1][5][] = array('id'=>'', 'name'=>'Terminal 21', 'url' => URL.'property/houses/mall/terminal-21');
$_sub[1][5][] = array('id'=>'', 'name'=>'EmQuartier', 'url' => URL.'property/houses/mall/emquartier');
$_sub[1][5][] = array('id'=>'', 'name'=>'Central Embassy', 'url' => URL.'property/houses/mall/central-embassy');
$_sub[1][5][] = array('id'=>'', 'name'=>'Central Chidlom', 'url' => URL.'property/houses/mall/central-chidlom');
$_sub[1][5][] = array('id'=>'', 'name'=>'Siam Center', 'url' => URL.'property/houses/mall/siam-center');
$_sub[1][5][] = array('id'=>'', 'name'=>'Platinum Fashion Mall', 'url' => URL.'property/houses/mall/platinum-fashion-mall');
$_sub[1][5][] = array('id'=>'', 'name'=>'Mega Bangna', 'url' => URL.'property/houses/mall/mega-bangna');
$_sub[1][5][] = array('id'=>'', 'name'=>'Gateway Ekamai', 'url' => URL.'property/houses/mall/gateway-ekamai');

//---- Park ----//
$_sub[1][6][] = array('id'=>'', 'name'=>'Benchakitti Park', 'url' => URL.'property/houses/near/benchakitti-park');
$_sub[1][6][] = array('id'=>'', 'name'=>'Benjasiri Park', 'url' => URL.'property/houses/near/benjasiri-park');
$_sub[1][6][] = array('id'=>'', 'name'=>'Chatuchak Park', 'url' => URL.'property/houses/near/chatuchak-park');
$_sub[1][6][] = array('id'=>'', 'name'=>'King Rama IX Park', 'url' => URL.'property/houses/near/king-rama-ix-park');
$_sub[1][6][] = array('id'=>'', 'name'=>'Lumpini Park', 'url' => URL.'property/houses/near/lumpini-park');
$_sub[1][6][] = array('id'=>'', 'name'=>'Queen Sirikit Park', 'url' => URL.'property/houses/near/queen-sirikit-park');
$_sub[1][6][] = array('id'=>'', 'name'=>'Rama IX Park', 'url' => URL.'property/houses/near/rama-ix-park');
$_sub[1][6][] = array('id'=>'', 'name'=>'Rot Fai Park', 'url' => URL.'property/houses/near/rot-fai-park');
$_sub[1][6][] = array('id'=>'', 'name'=>'Santiphap Park', 'url' => URL.'property/houses/near/santiphap-park');

//---- Embassy ----//
$_sub[1][7][] = array('id'=>'', 'name'=>'U.S. Embassy Bangkok', 'url' => URL.'property/houses/embassy/us-embassy');
$_sub[1][7][] = array('id'=>'', 'name'=>'United Kingdom Embassy Bangkok', 'url' => URL.'property/houses/embassy/uk-embassy');
$_sub[1][7][] = array('id'=>'', 'name'=>'German Embassy Bangkok', 'url' => URL.'property/houses/embassy/german-embassy');
$_sub[1][7][] = array('id'=>'', 'name'=>'France Embassy Bangkok', 'url' => URL.'property/houses/embassy/france-embassy');
$_sub[1][7][] = array('id'=>'', 'name'=>'Italy Embassy Bangkok', 'url' => URL.'property/houses/embassy/italy-embassy');
$_sub[1][7][] = array('id'=>'', 'name'=>'Australian Embassy Bangkok', 'url' => URL.'property/houses/embassy/australian-embassy');
$_sub[1][7][] = array('id'=>'', 'name'=>'Russian Embassy Bangkok', 'url' => URL.'property/houses/embassy/russian-embassy');
// $_sub[1][7][] = array('id'=>'', 'name'=>'Rot Fai Park', 'url' => URL.'property/houses/for/sale/sukhumvit');
$_sub[1][7][] = array('id'=>'', 'name'=>'Singapore Embassy Bangkok', 'url' => URL.'property/houses/embassy/singapore-embassy');

//---- School ----//
$_sub[1][8][] = array('id'=>'', 'name'=>'NIST International School', 'url' => URL.'property/houses/school/nist');
$_sub[1][8][] = array('id'=>'', 'name'=>'Bangkok Patana School', 'url' => URL.'property/houses/school/bps');
$_sub[1][8][] = array('id'=>'', 'name'=>'KIS International School Bangkok', 'url' => URL.'property/houses/school/kis');
$_sub[1][8][] = array('id'=>'', 'name'=>'International School Bangkok (ISB)', 'url' => URL.'property/houses/school/isb');
$_sub[1][8][] = array('id'=>'', 'name'=>'Swiss School Bangkok', 'url' => URL.'property/houses/school/ssb');
$_sub[1][8][] = array('id'=>'', 'name'=>'Lycée Français International', 'url' => URL.'property/houses/school/lycee');

//---- Menu Condo for rent in Bangkok ----//
$_menu[2] = array('name'=>'Condo for rent in Bangkok', 'url'=>URL.'property/rent/condo/bangkok', 'first'=>'Condo for rent');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'in Nichada Thani', 'url' => URL.'property/rent/condo/nichada');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'near United Nations', 'url' => URL.'property/rent/condo/un');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'near BTS', 'url' => '#');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'near MRT', 'url' => '#');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'near Airport Rail Link', 'url' => '#');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'near Shopping Malls', 'url' => URL.'#');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'near Park', 'url' => URL.'#');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'near Embassy', 'url' => URL.'#');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'near School', 'url' => URL.'#');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'in Sukhumvit', 'url' => URL.'property/rent/condo/sukhumvit');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'in Ploenchit', 'url' => URL.'property/rent/condo/ploenchit');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'in Sathorn', 'url' => URL.'property/rent/condo/sathorn');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'in Bangna trad', 'url' => URL.'property/rent/condo/bangna-trad');
$_menu[2]['lists'][] = array('id'=>'', 'name'=>'in Srinakarin', 'url' => URL.'property/rent/condo/srinakarin');

//---- BTS ----//
$_sub[2][2][] = array('id'=>'', 'name'=>'Bang Na BTS Station', 'url'=>URL.'property/condo/station/bang-na');
$_sub[2][2][] = array('id'=>'', 'name'=>'Onnut BTS Station', 'url'=>URL.'property/condo/station/onnut');
$_sub[2][2][] = array('id'=>'', 'name'=>'Prakanong BTS Station', 'url'=>URL.'property/condo/station/prakanong');
$_sub[2][2][] = array('id'=>'', 'name'=>'Ekkamai BTS Station', 'url'=>URL.'property/condo/station/ekkamai');
$_sub[2][2][] = array('id'=>'', 'name'=>'Thong Lo BTS Station', 'url'=>URL.'property/condo/station/thong-lo');
$_sub[2][2][] = array('id'=>'', 'name'=>'Phrom Phong BTS Station', 'url'=>URL.'property/condo/station/phrom-phong');
$_sub[2][2][] = array('id'=>'', 'name'=>'Asok BTS Station', 'url'=>URL.'property/condo/station/asok');
$_sub[2][2][] = array('id'=>'', 'name'=>'Nana BTS Station', 'url'=>URL.'property/condo/station/nana');
$_sub[2][2][] = array('id'=>'', 'name'=>'Ploenchit BTS Station', 'url'=>URL.'property/condo/station/ploenchit');
$_sub[2][2][] = array('id'=>'', 'name'=>'Phaya Thai BTS Station', 'url'=>URL.'property/condo/station/phaya-thai');
$_sub[2][2][] = array('id'=>'', 'name'=>'Ari BTS Station', 'url'=>URL.'property/condo/station/ari');

//---- MRT ----//
$_sub[2][3][] = array('id'=>'', 'name'=>'Sam Yan MRT Station', 'url' => URL.'property/condo/station/samyan');
$_sub[2][3][] = array('id'=>'', 'name'=>'Si Lom MRT Station', 'url' => URL.'property/condo/station/silom');
$_sub[2][3][] = array('id'=>'', 'name'=>'Lumphini MRT Station', 'url' => URL.'property/condo/station/lumphini');
$_sub[2][3][] = array('id'=>'', 'name'=>'Khlong Toei MRT Station', 'url' => URL.'property/condo/station/khlong-toei');
$_sub[2][3][] = array('id'=>'', 'name'=>'Queen Sirikit National Convention Centre MRT Station', 'url' => URL.'property/condo/station/qsncc');
$_sub[2][3][] = array('id'=>'', 'name'=>'Sukhumvit MRT Station', 'url' => URL.'property/condo/station/sukhumvit');
$_sub[2][3][] = array('id'=>'', 'name'=>'Phetchaburi MRT Station', 'url' => URL.'property/condo/station/phetchaburi');
$_sub[2][3][] = array('id'=>'', 'name'=>'Phra Ram 9 MRT Station', 'url' => URL.'property/condo/station/phra-ram-9');

//---- AIRPORT ----//
$_sub[2][4][] = array('id'=>'', 'name'=>'Phaya Thai Station', 'url' => URL.'property/condo/near/airport-rail-link-phaya-thai-station');
$_sub[2][4][] = array('id'=>'', 'name'=>'Ratchaprarop Station', 'url' => URL.'property/condo/near/airport-rail-link-ratchaprarop-station');
$_sub[2][4][] = array('id'=>'', 'name'=>'Makkasan Station', 'url' => URL.'property/condo/near/airport-rail-link-makkasan-station');
$_sub[2][4][] = array('id'=>'', 'name'=>'Ramkhamhaeng Station', 'url' => URL.'property/condo/near/airport-rail-link-ramkhamhaeng-station');
$_sub[2][4][] = array('id'=>'', 'name'=>'Hua Mak Station', 'url' => URL.'property/condo/near/airport-rail-link-hua-mak-station');

//---- Mall ----//
$_sub[2][5][] = array('id'=>'', 'name'=>'Central World', 'url' => URL.'property/condo/mall/centralworld');
$_sub[2][5][] = array('id'=>'', 'name'=>'Siam Paragon', 'url' => URL.'property/condo/mall/siam-paragon');
$_sub[2][5][] = array('id'=>'', 'name'=>'MBK Center', 'url' => URL.'property/condo/mall/mbk');
$_sub[2][5][] = array('id'=>'', 'name'=>'Terminal 21', 'url' => URL.'property/condo/mall/terminal-21');
$_sub[2][5][] = array('id'=>'', 'name'=>'EmQuartier', 'url' => URL.'property/condo/mall/emquartier');
$_sub[2][5][] = array('id'=>'', 'name'=>'Central Embassy', 'url' => URL.'property/condo/mall/central-embassy');
$_sub[2][5][] = array('id'=>'', 'name'=>'Central Chidlom', 'url' => URL.'property/condo/mall/central-chidlom');
$_sub[2][5][] = array('id'=>'', 'name'=>'Siam Center', 'url' => URL.'property/condo/mall/siam-center');
$_sub[2][5][] = array('id'=>'', 'name'=>'Platinum Fashion Mall', 'url' => URL.'property/condo/mall/platinum-fashion-mall');
$_sub[2][5][] = array('id'=>'', 'name'=>'Mega Bangna', 'url' => URL.'property/condo/mall/mega-bangna');
$_sub[2][5][] = array('id'=>'', 'name'=>'Gateway Ekamai', 'url' => URL.'property/condo/mall/gateway-ekamai');

//---- Park ----//
$_sub[2][6][] = array('id'=>'', 'name'=>'Benchakitti Park', 'url' => URL.'property/condo/near/benchakitti-park');
$_sub[2][6][] = array('id'=>'', 'name'=>'Benjasiri Park', 'url' => URL.'property/condo/near/benjasiri-park');
$_sub[2][6][] = array('id'=>'', 'name'=>'Chatuchak Park', 'url' => URL.'property/condo/near/chatuchak-park');
$_sub[2][6][] = array('id'=>'', 'name'=>'King Rama IX Park', 'url' => URL.'property/condo/near/king-rama-ix-park');
$_sub[2][6][] = array('id'=>'', 'name'=>'Lumpini Park', 'url' => URL.'property/condo/near/lumpini-park');
$_sub[2][6][] = array('id'=>'', 'name'=>'Queen Sirikit Park', 'url' => URL.'property/condo/near/queen-sirikit-park');
$_sub[2][6][] = array('id'=>'', 'name'=>'Rama IX Park', 'url' => URL.'property/condo/near/rama-ix-park');
$_sub[2][6][] = array('id'=>'', 'name'=>'Rot Fai Park', 'url' => URL.'property/condo/near/rot-fai-park');
$_sub[2][6][] = array('id'=>'', 'name'=>'Santiphap Park', 'url' => URL.'property/condo/near/santiphap-park');

//---- Embassy ----//
$_sub[2][7][] = array('id'=>'', 'name'=>'U.S. Embassy Bangkok', 'url' => URL.'property/condo/embassy/us-embassy');
$_sub[2][7][] = array('id'=>'', 'name'=>'United Kingdom Embassy Bangkok', 'url' => URL.'property/condo/embassy/uk-embassy');
$_sub[2][7][] = array('id'=>'', 'name'=>'German Embassy Bangkok', 'url' => URL.'property/condo/embassy/german-embassy');
$_sub[2][7][] = array('id'=>'', 'name'=>'France Embassy Bangkok', 'url' => URL.'property/condo/embassy/france-embassy');
$_sub[2][7][] = array('id'=>'', 'name'=>'Italy Embassy Bangkok', 'url' => URL.'property/condo/embassy/italy-embassy');
$_sub[2][7][] = array('id'=>'', 'name'=>'Australian Embassy Bangkok', 'url' => URL.'property/condo/embassy/australian-embassy');
$_sub[2][7][] = array('id'=>'', 'name'=>'Russian Embassy Bangkok', 'url' => URL.'property/condo/embassy/russian-embassy');
// $_sub[2][7][] = array('id'=>'', 'name'=>'Rot Fai Park', 'url' => URL.'property/condo/for/sale/sukhumvit');
$_sub[2][7][] = array('id'=>'', 'name'=>'Singapore Embassy Bangkok', 'url' => URL.'property/condo/embassy/singapore-embassy');

//---- School ----//
$_sub[2][8][] = array('id'=>'', 'name'=>'NIST International School', 'url' => URL.'property/condo/school/nist');
$_sub[2][8][] = array('id'=>'', 'name'=>'Bangkok Patana School', 'url' => URL.'property/condo/school/bps');
$_sub[2][8][] = array('id'=>'', 'name'=>'KIS International School Bangkok', 'url' => URL.'property/condo/school/kis');
$_sub[2][8][] = array('id'=>'', 'name'=>'International School Bangkok (ISB)', 'url' => URL.'property/condo/school/isb');
$_sub[2][8][] = array('id'=>'', 'name'=>'Swiss School Bangkok', 'url' => URL.'property/condo/school/ssb');
$_sub[2][8][] = array('id'=>'', 'name'=>'Lycée Français International', 'url' => URL.'property/condo/school/lycee');

//---- Menu Apartment for rent in Bangkok ----//
$_menu[3] = array('name'=>'Apartment for rent in Bangkok', 'url'=>URL.'property/rent/apartment/bangkok', 'first'=>'Apartment for rent');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'in Nichada Thani', 'url' => URL.'property/rent/apartment/nichada');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'near United Nations', 'url' => URL.'property/rent/apartment/un');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'near BTS', 'url' => '#');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'near MRT', 'url' => '#');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'near Airport Rail Link', 'url' => '#');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'near Shopping Malls', 'url' => URL.'#');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'near Park', 'url' => URL.'#');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'near Embassy', 'url' => URL.'#');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'near School', 'url' => URL.'#');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'in Sukhumvit', 'url' => URL.'property/rent/apartment/sukhumvit');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'in Ploenchit', 'url' => URL.'property/rent/apartment/ploenchit');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'in Sathorn', 'url' => URL.'property/rent/apartment/sathorn');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'in Bangna trad', 'url' => URL.'property/rent/apartment/bangna-trad');
$_menu[3]['lists'][] = array('id'=>'', 'name'=>'in Srinakarin', 'url' => URL.'property/rent/apartment/srinakarin');

//---- BTS ----//
$_sub[3][2][] = array('id'=>'', 'name'=>'Bang Na BTS Station', 'url'=>URL.'property/apartment/station/bang-na');
$_sub[3][2][] = array('id'=>'', 'name'=>'Onnut BTS Station', 'url'=>URL.'property/apartment/station/onnut');
$_sub[3][2][] = array('id'=>'', 'name'=>'Prakanong BTS Station', 'url'=>URL.'property/apartment/station/prakanong');
$_sub[3][2][] = array('id'=>'', 'name'=>'Ekkamai BTS Station', 'url'=>URL.'property/apartment/station/ekkamai');
$_sub[3][2][] = array('id'=>'', 'name'=>'Thong Lo BTS Station', 'url'=>URL.'property/apartment/station/thong-lo');
$_sub[3][2][] = array('id'=>'', 'name'=>'Phrom Phong BTS Station', 'url'=>URL.'property/apartment/station/phrom-phong');
$_sub[3][2][] = array('id'=>'', 'name'=>'Asok BTS Station', 'url'=>URL.'property/apartment/station/asok');
$_sub[3][2][] = array('id'=>'', 'name'=>'Nana BTS Station', 'url'=>URL.'property/apartment/station/nana');
$_sub[3][2][] = array('id'=>'', 'name'=>'Ploenchit BTS Station', 'url'=>URL.'property/apartment/station/ploenchit');
$_sub[3][2][] = array('id'=>'', 'name'=>'Phaya Thai BTS Station', 'url'=>URL.'property/apartment/station/phaya-thai');
$_sub[3][2][] = array('id'=>'', 'name'=>'Ari BTS Station', 'url'=>URL.'property/apartment/station/ari');

//---- MRT ----//
$_sub[3][3][] = array('id'=>'', 'name'=>'Sam Yan MRT Station', 'url' => URL.'property/apartment/station/samyan');
$_sub[3][3][] = array('id'=>'', 'name'=>'Si Lom MRT Station', 'url' => URL.'property/apartment/station/silom');
$_sub[3][3][] = array('id'=>'', 'name'=>'Lumphini MRT Station', 'url' => URL.'property/apartment/station/lumphini');
$_sub[3][3][] = array('id'=>'', 'name'=>'Khlong Toei MRT Station', 'url' => URL.'property/apartment/station/khlong-toei');
$_sub[3][3][] = array('id'=>'', 'name'=>'Queen Sirikit National Convention Centre MRT Station', 'url' => URL.'property/apartment/station/qsncc');
$_sub[3][3][] = array('id'=>'', 'name'=>'Sukhumvit MRT Station', 'url' => URL.'property/apartment/station/sukhumvit');
$_sub[3][3][] = array('id'=>'', 'name'=>'Phetchaburi MRT Station', 'url' => URL.'property/apartment/station/phetchaburi');
$_sub[3][3][] = array('id'=>'', 'name'=>'Phra Ram 9 MRT Station', 'url' => URL.'property/apartment/station/phra-ram-9');

//---- AIRPORT ----//
$_sub[3][4][] = array('id'=>'', 'name'=>'Phaya Thai Station', 'url' => URL.'property/apartment/near/airport-rail-link-phaya-thai-station');
$_sub[3][4][] = array('id'=>'', 'name'=>'Ratchaprarop Station', 'url' => URL.'property/apartment/near/airport-rail-link-ratchaprarop-station');
$_sub[3][4][] = array('id'=>'', 'name'=>'Makkasan Station', 'url' => URL.'property/apartment/near/airport-rail-link-makkasan-station');
$_sub[3][4][] = array('id'=>'', 'name'=>'Ramkhamhaeng Station', 'url' => URL.'property/apartment/near/airport-rail-link-ramkhamhaeng-station');
$_sub[3][4][] = array('id'=>'', 'name'=>'Hua Mak Station', 'url' => URL.'property/apartment/near/airport-rail-link-hua-mak-station');

//---- Mall ----//
$_sub[3][5][] = array('id'=>'', 'name'=>'Central World', 'url' => URL.'property/apartment/mall/centralworld');
$_sub[3][5][] = array('id'=>'', 'name'=>'Siam Paragon', 'url' => URL.'property/apartment/mall/siam-paragon');
$_sub[3][5][] = array('id'=>'', 'name'=>'MBK Center', 'url' => URL.'property/apartment/mall/mbk');
$_sub[3][5][] = array('id'=>'', 'name'=>'Terminal 21', 'url' => URL.'property/apartment/mall/terminal-21');
$_sub[3][5][] = array('id'=>'', 'name'=>'EmQuartier', 'url' => URL.'property/apartment/mall/emquartier');
$_sub[3][5][] = array('id'=>'', 'name'=>'Central Embassy', 'url' => URL.'property/apartment/mall/central-embassy');
$_sub[3][5][] = array('id'=>'', 'name'=>'Central Chidlom', 'url' => URL.'property/apartment/mall/central-chidlom');
$_sub[3][5][] = array('id'=>'', 'name'=>'Siam Center', 'url' => URL.'property/apartment/mall/siam-center');
$_sub[3][5][] = array('id'=>'', 'name'=>'Platinum Fashion Mall', 'url' => URL.'property/apartment/mall/platinum-fashion-mall');
$_sub[3][5][] = array('id'=>'', 'name'=>'Mega Bangna', 'url' => URL.'property/apartment/mall/mega-bangna');
$_sub[3][5][] = array('id'=>'', 'name'=>'Gateway Ekamai', 'url' => URL.'property/apartment/mall/gateway-ekamai');

//---- Park ----//
$_sub[3][6][] = array('id'=>'', 'name'=>'Benchakitti Park', 'url' => URL.'property/apartment/near/benchakitti-park');
$_sub[3][6][] = array('id'=>'', 'name'=>'Benjasiri Park', 'url' => URL.'property/apartment/near/benjasiri-park');
$_sub[3][6][] = array('id'=>'', 'name'=>'Chatuchak Park', 'url' => URL.'property/apartment/near/chatuchak-park');
$_sub[3][6][] = array('id'=>'', 'name'=>'King Rama IX Park', 'url' => URL.'property/apartment/near/king-rama-ix-park');
$_sub[3][6][] = array('id'=>'', 'name'=>'Lumpini Park', 'url' => URL.'property/apartment/near/lumpini-park');
$_sub[3][6][] = array('id'=>'', 'name'=>'Queen Sirikit Park', 'url' => URL.'property/apartment/near/queen-sirikit-park');
$_sub[3][6][] = array('id'=>'', 'name'=>'Rama IX Park', 'url' => URL.'property/apartment/near/rama-ix-park');
$_sub[3][6][] = array('id'=>'', 'name'=>'Rot Fai Park', 'url' => URL.'property/apartment/near/rot-fai-park');
$_sub[3][6][] = array('id'=>'', 'name'=>'Santiphap Park', 'url' => URL.'property/apartment/near/santiphap-park');

//---- Embassy ----//
$_sub[3][7][] = array('id'=>'', 'name'=>'U.S. Embassy Bangkok', 'url' => URL.'property/apartment/embassy/us-embassy');
$_sub[3][7][] = array('id'=>'', 'name'=>'United Kingdom Embassy Bangkok', 'url' => URL.'property/apartment/embassy/uk-embassy');
$_sub[3][7][] = array('id'=>'', 'name'=>'German Embassy Bangkok', 'url' => URL.'property/apartment/embassy/german-embassy');
$_sub[3][7][] = array('id'=>'', 'name'=>'France Embassy Bangkok', 'url' => URL.'property/apartment/embassy/france-embassy');
$_sub[3][7][] = array('id'=>'', 'name'=>'Italy Embassy Bangkok', 'url' => URL.'property/apartment/embassy/italy-embassy');
$_sub[3][7][] = array('id'=>'', 'name'=>'Australian Embassy Bangkok', 'url' => URL.'property/apartment/embassy/australian-embassy');
$_sub[3][7][] = array('id'=>'', 'name'=>'Russian Embassy Bangkok', 'url' => URL.'property/apartment/embassy/russian-embassy');
// $_sub[3][7][] = array('id'=>'', 'name'=>'Rot Fai Park', 'url' => URL.'property/apartment/for/sale/sukhumvit');
$_sub[3][7][] = array('id'=>'', 'name'=>'Singapore Embassy Bangkok', 'url' => URL.'property/apartment/embassy/singapore-embassy');

//---- School ----//
$_sub[3][8][] = array('id'=>'', 'name'=>'NIST International School', 'url' => URL.'property/apartment/school/nist');
$_sub[3][8][] = array('id'=>'', 'name'=>'Bangkok Patana School', 'url' => URL.'property/apartment/school/bps');
$_sub[3][8][] = array('id'=>'', 'name'=>'KIS International School Bangkok', 'url' => URL.'property/apartment/school/kis');
$_sub[3][8][] = array('id'=>'', 'name'=>'International School Bangkok (ISB)', 'url' => URL.'property/apartment/school/isb');
$_sub[3][8][] = array('id'=>'', 'name'=>'Swiss School Bangkok', 'url' => URL.'property/apartment/school/ssb');
$_sub[3][8][] = array('id'=>'', 'name'=>'Lycée Français International', 'url' => URL.'property/apartment/school/lycee');

//---- Menu House for sale in bangkok
$_menu[4] = array('name'=>'Apartment for rent in Bangkok', 'url'=>URL.'property/rent/apartment/bangkok', 'first'=>'House for sale in');
$_menu[4]['lists'][] = array('id'=>'', 'name'=>'Sukhumvit', 'url' => URL.'property/houses/for/sale/sukhumvit');
$_menu[4]['lists'][] = array('id'=>'', 'name'=>'Ploenchit', 'url' => URL.'property/houses/for/sale/ploenchit');
$_menu[4]['lists'][] = array('id'=>'', 'name'=>'Sathorn', 'url' => URL.'property/houses/for/sale/sathorn');
$_menu[4]['lists'][] = array('id'=>'', 'name'=>'Bangnatrad', 'url' => URL.'property/houses/for/sale/bangna-trad');
$_menu[4]['lists'][] = array('id'=>'', 'name'=>'Srinakarin', 'url' => URL.'property/houses/for/sale/srinakarin');
$_menu[4]['lists'][] = array('id'=>'', 'name'=>'Phaholyothin', 'url' => URL.'property/houses/for/sale/phaholyothin');
$_menu[4]['lists'][] = array('id'=>'', 'name'=>'Nichada Thani', 'url' => URL.'property/houses/for/sale/nichada');
?>
<section class="advanced-search advance-search-header">
    <div class="container">
        <form class="" action="<?=URL?>search">
            <div class="form-group search-long clearfix">
                <div class="search-btn rfloat">
                    <button class="btn btn-secondary">Go</button>
                </div>
                <div class="search">
                   
                    <div class="input-search input-icon">
                        <input class="inputtext" type="text" placeholder="Search Properties or Search By Code">
                    </div>
                    <div><select name="location" title="Location" class="selectpicker">
                        <option selected value="">Location</option>
                        <?php foreach ($this->system['property_type'] as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                        }
                        ?>
                    </select></div>
                    <div><select name="area" title="Area" class="selectpicker">
                        <option value="">Area</option>
                        <?php foreach ($this->system['property_zone'] as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                        }
                        ?>

                    </select></div>
                    <div class="advance-btn-holder">
                        <button class="advance-btn btn" type="button"><i class="icon-gear"></i> Advanced</button>
                    </div>
                </div>
                
            </div>
            <div class="advance-fields">
                <div class="row">
                    <div class="span3"><h3>Property Details</h3><?=$details1?></div>
                    <div class="span3"><h3>&nbsp;</h3><?=$details2?></div>
                    <div class="span3"><h3>Near Transport</h3><?=$details3?></div>
                    <div class="span3"><h3>Near Things</h3><?=$details4?></div>
                </div>

                <div class="row">
                    <div class="span6"><?=$details5?></div>
                </div>
            </div>

            <div class="search-guide">
                <ul>
                    <li class="head">Search Guide:</li>
                    <?php foreach ($_menu as $i => $val) { ?>
                    <li><a><?=$val['name']?></a><div class="sub-menu single-col">
                        <div class="sub-menu-col"><ul>

                            <?php 
                            if( empty($_menu[$i]) ) continue;
                            foreach ($_menu[$i]['lists'] as $key => $value) { ?>

                            <!-- Create Menu -->
                            <li class="lv3">
                                <a href="<?=$value['url']?>"><?=$val['first']?> <?=$value['name']?></a>

                                <!-- Create Sub Menu -->
                                <?php if( !empty($_sub[$i][$key]) ) { ?>
                                <ul class="sub-sub-menu">
                                    <?php foreach ($_sub[$i][$key] as $sub) { ?>
                                        <li class="lv3"><a href="<?=$sub['url']?>"><?=$sub['name']?></a></li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                                <!-- End Create Sub -->

                            </li>
                            <!-- End Create Menu -->

                            <?php } ?>

                        </ul></div>
                    </div></li>
                    <?php } ?>
                </ul>
            </div>
        </form>
    </div>
</section>