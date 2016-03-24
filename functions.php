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

function classphila_random_featured_item() {
    $html = '';
    $items = get_records('Item', array('featured' => false), 2);
    set_loop_records('items', $items);
    if (has_loop_records('items')){
        foreach (loop('items') as $item){
            $html .= '<a href="' . record_url($item, null, true) . '" class="thumbnail-link">';
            $html .= '<div class="thumbnail">';
            $image = $item->Files;
            if ($image) {
                $html .= '<div class="thumbnail-img-container" style="background-image: url(' . file_display_url($image[0], 'fullsize') . ');"></div>';
            } else {
                $html .= '<p>no image for this item</p>';
            }
    	    $html .= '<div class="thumbnail-caption">';
    	    $html .= '<h4 class="thumbnail-caption-subheading">Featured Item</h4>';
    	    $html .= '<h2 class="thumbnail-caption-featured-collection">' . metadata('item', array('Dublin Core', 'Title')) . '</h2>';
            $html .= '</div></div></a>';
    	}
    } else {
        $html .= '<h4 class="not-featured">No featured items.</h4>';
    }
    return $html;
}

function classphila_random_featured_collection() {
	$html = '';
	$collection = get_db()->getTable('Collection')->findRandomFeatured();
    if ($collection){
        set_current_record('collection', $collection);
		$html .= '<a href="' . record_url($collection, null, true) . '" class="featured">';
        $html .= '   <div class="thumbnail">';
        $items = get_records('Item', array('collection'=>$collection->id), 1);
        set_loop_records('items', $items);
        if (has_loop_records('items')){
            $image = $items[0]->Files;
            if ($image) {
                $html .= '<div class="thumbnail-img-container" style="background-image: url(' . file_display_url($image[0], 'fullsize') . ');"></div>';
            } else {
                $html .= '<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img default"></div>';
            }
        } else {
            $html .= '<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img default"></div>';
        }
	    $html .= '  <div class="thumbnail-caption">';
	    $html .= '<h4 class="thumbnail-caption-subheading">Featured Collection</h4>';
    	$html .= '<h2 class="thumbnail-caption-featured-collection">' . metadata('collection', array('Dublin Core', 'Title')) . '</h2>';
        $html .= '</div></div></a>';
	} else {
        $html .= '<h4 class="not-featured">No featured collections.</h4>';
    }
    return $html;	
}

function classphila_exhibit_builder_display_random_featured_exhibit() {
    $html = '';
    $featuredExhibit = exhibit_builder_random_featured_exhibit();
    if ($featuredExhibit) {
        $image = sckls_exhibit_builder_get_first_image_object($featuredExhibit);
    } else {
        $image = '';
    }
    if ($featuredExhibit) {
        $html .= '<a href="' . sckls_exhibit_builder_link_to_exhibit($featuredExhibit) . '" class="featured">';
        $html .= '    <div class="thumbnail">';
        if ($image) {
            $html .= '<div  class="thumbnail-img-container" style="background-image: url(' . file_display_url($image, 'fullsize') . ');" class="img"></div>';
        } else {
            $html .= '<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img default"></div>';
        }
        $html .= '  <div class="thumbnail-caption">';
	    $html .= '<h4 class="thumbnail-caption-subheading">Featured Story</h4>';
		$html .= '<h2 class="thumbnail-caption-featured-collection">' . $featuredExhibit->title . '</h2>';
        $html .= '</div></div></a>';
    } else {
        $html .= '<h4 class="not-featured">No exhibits added, yet.</h4>';
        
    }
    $html = apply_filters('exhibit_builder_display_random_featured_exhibit', $html);
    return $html;
}

function sckls_exhibit_builder_link_to_exhibit($exhibit = null, $exhibitPage = null) {
    if (!$exhibit) {
        $exhibit = get_current_record('exhibit');
    }
    $uri = exhibit_builder_exhibit_uri($exhibit, $exhibitPage);
    return html_escape($uri);
}

function sckls_exhibit_builder_get_first_image_object($exhibit) {
	$file = '';
    $count = 0;
	if (!$exhibit) {
        $exhibit = get_current_record('exhibit');
    }
    set_loop_records('exhibit_page', $exhibit->TopPages);
    
    foreach (loop('exhibit_page') as $exhibitPage) {
        $attachments = $exhibitPage->getAllAttachments();
        foreach ($attachments as $attachment):
            if ($file === ''){
                $item = $attachment->getItem();
                $file = $attachment->getFile();
            }
        endforeach;
    }
    return $file;
}
