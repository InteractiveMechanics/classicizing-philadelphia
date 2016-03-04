<?php

function public_nav_main_bootstrap() {
    $partial = array('common/menu-partial.phtml', 'default');
    $nav = public_nav_main();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}

function sckls_exhibit_builder_get_first_image_html($exhibit) {
	$html = '';
    $count = 0;
	if (!$exhibit) {
        $exhibit = get_current_record('exhibit');
    }
    set_loop_records('exhibit_page', $exhibit->TopPages);
    
    foreach (loop('exhibit_page') as $exhibitPage) {
        $attachments = $exhibitPage->getAllAttachments();
        foreach ($attachments as $attachment):
            if ($count === 0){
                $item = $attachment->getItem();
                $file = $attachment->getFile();
    
                $html .= file_display_url($file, 'fullsize');
            }
            $count++;
        endforeach;
    }
    return $html;
}