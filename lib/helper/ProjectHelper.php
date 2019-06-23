<?php

function include_pager($pager, $url = false) {
    if (!$url) {
        $url = sfContext::getInstance()->getRouting()->getCurrentInternalUri();
    }
    if ($pager->haveToPaginate()) {
        include_partial('global/pager', array(
            'pager' => $pager,
            'url' => url_for($url)
        ));
    }
}

function project_date($date) {
    return format_date($date, 'p');
}

function project_time($date) {
    return ProjectHelper::time($date);
}

function project_datetime($date) {
    return format_date($date, 'EEE, FF MMMM в HH:mm');
}

function project_price($val) {
    return ProjectHelper::price($val);
}

function include_config($name, $default = '', $replacements = array()) {
    echo get_config($name, $default, $replacements);
}

function get_config($name, $default = '', $replacements = array()) {
    return MyConfig::get($name, $default, $replacements);
}

function menu_link_to($menu_item, $template = false, $params = array()) {
    if($menu_item->getIsAuth()){
        if(!sfContext::getInstance()->getUser()->isAuthenticated()){
            return '';
        }
    }
    if (!$template) {
        $template = "<a href='%url%' class='%class%' %params%>%name%</a>";
    }
    $class = '';

    $url = '#';
    switch ($menu_item->getType()) {
        case 'page':
            if ($menu_item->getPageId()) {
                if (ProjectHelper::isPageActive($menu_item->getPage())) {
                    $class = 'active';
                }
                $url = url_for('page_show', $menu_item->getPage());
            }
            break;
        case 'module':
            $module_name = $menu_item->getCmsModule()->getName();
            if (ProjectHelper::isModActive($module_name)) {
                $class = 'active';
            }
            $url = url_for("$module_name/index");
            break;
        case 'route':
            $url = url_for("@" . $menu_item->getRoute());
            if (sfContext::getInstance()->getRouting()->getCurrentRouteName() == $menu_item->getRoute()) {
                $class = 'active';
            }
            break;
        case 'external':
            $url = $menu_item->getExternal();
            $params['target'] = '_blank';
            break;
    }
    $params_flat = array();
    foreach ($params as $key => $value) {
        $params_flat[] = "$key='$value'";
    }
    $params = join(' ', $params_flat);
    $icon = $menu_item->getIconClass() ? "<i class='icon-large {$menu_item->getIconClass()}'></i>&nbsp;&nbsp;" : '';
    return strtr($template, array(
            '%name%' => $menu_item->getName(),
            '%url%' => $url,
            '%class%' => $class,
            '%params%' => $params,
            '%icon%' => $icon
        ));
}

function main_menu() {
    $str = '';
    $template = "<div class='item %class%'>
            <a href='%url%'>
                                    <span>%name%</span> 
            </a>
            %submenu%
    </div>";
    $menu = ProjectHelper::getMenu('main');
    foreach ($menu as $item) {
        if ($item->getLevel() == 1) {
            $str_item = menu_link_to($item, $template);
            $submenu = '';
            if ($item->getNode()->hasChildren()) {
                $submenu = '<div class="drop_down">%items%</div>';
                $str_items = '';
                foreach ($item->getNode()->getChildren() as $child) {
                    $str_items .= menu_link_to($child);
                }
                $submenu = str_replace('%items%', $str_items, $submenu);
            }
            $str .= str_replace('%submenu%', $submenu, $str_item);
        }
    }
    return $str;
}

function include_breadcrumbs() {		
    $crumbs = Breadcrumbs::get();
    $len = count($crumbs);
    $str = '';
    foreach ($crumbs as $i => $item) {
		$icon = !$i ? "<i class='fa fa-dashboard'></i>" : '';
        if ($i + 1 == $len) {
            $str .= "<li class='active'>{$icon} {$item[0]}</li>";
        } else {
            $url = url_for($item[1]);
            $str .= "<li>$icon <a href='$url'>{$item[0]}</a></li>";
        }
    }
    echo $str;
}

function page_header($header, $object = null) {
    if(is_object($header)){
        $page = $header;
        $header = $object ? $page->getReplaced('name', $object) : $page->getName();
    }
    return "<h1>$header</h1>";
}

function page_well($page, $object = null)
{
    if($page->getContent())
        return "<div class='page_content well'>" . page_content($page, $object) . '</div>';
    else
        return '';
}

function page_content($page, $object = null)
{
    if($object){
        $cont = sfOutputEscaper::unescape($page->getReplaced('content', $object));
    }else{
        $cont = $page->getRaw('content');
    }
    if($page->getIsRedirect()){
        $cont .= "            <script type='text/javascript'>

            setTimeout(function(){
                document.location.href='{$page->getRedirectRoute()}';
            }, {$page->getRedirectTimeout()} * 1000);
        </script>";
    }    
    return $cont;
}

function cut($str, $len = 100) {
    $str = strip_tags($str);
    $arr = explode(' ', $str);
    $str2 = '';
    foreach ($arr as $i => $s) {
        $str2 .= ($i ? ' ' : '') . $s;
        if (strlen($str2) >= $len) {
            return $str2 . '...';
        }
    }
    return $str;
}

function protocolize($str, $protocol = 'http://') {
    if (strpos($str, $protocol) !== 0) {
        $str = $protocol . $str;
    }
    return $str;
}

function get_banner($banner_place_name) {
    return ProjectHelper::getBanner($banner_place_name);
}

function include_banner($banner_place_name) {
    echo "<div class='banner'>" .
    get_banner($banner_place_name)
    . "</div>";
}

function url_for_system_page($special_mark) {
    $page = PageTable::findOneBySpecialMark($special_mark);
    if (!$page) {
        return '#';
    }
    return url_for('page_show', $page);
}


function star_rating($value, $url = '', $max = 5) {
    $str = "";
    for ($i = 0; $i < $max; $i++) {
        $index = $i + 1;
        $link = $url ? "<a href='{$url}?val=$index'></a>" : '';
        if ($i < round($value)) {
            $str .= "<span class='one' index='$index'>$link</span>";
        } else {
            /*
            if ($i < $value) {
                $str .= "<span class='half'></span>";
            } else {
                $str .= "<span class='zero'></span>";
            } */
            $str .= "<span class='zero' index='$index'>$link</span>";
        }
    }
    return $str;
}

function product_rating($product)
{
    $active = sfContext::getInstance()->getUser()->productIsVoted($product) ? '' : ' active';
    $url = $active ? url_for('catalog/productVote?id=' . $product->getId()) : '';
    $rating = star_rating($product->getRating(), $url);
    
    return "<div class='rating{$active}'>
                            $rating
                        </div>";
}

/**************************
function product_add_to_cart($product){
    $url = $product->isInCart() ? url_for('shop/cart') : url_for('shop/cartAddAjax?id=' . $product->getId());
    $class = $product->isInCart() ? 'button unactive' : 'button yellow';
    $text = $product->isInCart() ? 'В корзине' : 'Купить';
 return "
            <a href='$url' class='$class'>$text</a>
        ";    
}
 * 
 */

function form_choice_dependency($name, $fields, $form, $row_finder = 'def', $visualization = 'simple')
{
        $deps = array();
        $id = $form[$name]->renderId();
        $deps[$id] = array('__all' => array());
        foreach ($fields as $val => $field_set) {
            $deps[$id][$val] = array();
        }
        foreach ($fields as $val => $field_set) {
            foreach($field_set as $field){
                $deps[$id][$val][] = $form[$field]->renderId();
                $deps[$id]['__all'][] = $form[$field]->renderId();
            }
        }
        
        
        $deps = json_encode($deps);
        $str = "<script type='text/javascript'>\n$(function(){
            sfForm.initChoiceDependencies($deps, '$row_finder', '$visualization')});</script>";
        return $str;    
}

function form_toggle_dependency($name, $fields, $form, $row_finder = 'def', $visualization = 'simple')
{
        $str = "<script type='text/javascript'>\n
            $(function(){
                var toggle_dependencies = {};
            ";
            $id = $form[$name]->renderId();
            $id_fields = array();
            foreach ($fields as $field) {
                $id_fields[] = '"' . $form[$field]->renderId() . '"';
            }
            $js_fields = '[' . join(',', $id_fields) . ']';
            $str .= "toggle_dependencies['{$id}'] = {$js_fields};";
        
        $str .= "\n
            sfForm.initToggleDependencies(toggle_dependencies, '$row_finder', '$visualization')});</script>";
        return $str;    
}

function embed_gmap($geo_object, $style = '')
{
   $html = "
       <div id='map_{$geo_object->getId()}' style='$style'></div>
       <script type='text/javascript'>
   $(function(){
       var id = 'map_{$geo_object->getId()}';
       var center = new google.maps.LatLng({$geo_object->getLatLng()});
        var myOptions = {
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById(id),
            myOptions);

        map.setCenter(center);
        marker = new google.maps.Marker({
            map:map,
            draggable:false,
            animation: google.maps.Animation.DROP,
            position: center
        });
        
    });
    
    </script>";    
       echo $html;
}

function include_global_header() {
	echo  sfContext::getInstance()->has('global_header') ? sfContext::getInstance()->get('global_header') : '';
}