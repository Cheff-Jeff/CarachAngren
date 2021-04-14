<?php
function GetMenu($host, $api, $root)
{
    if(!function_exists('getData')){
        include_once($root."/src/php/functions/dataLoader.php");
    }
    $link = $api."menu";
    $menuItems = getData($link);
    $menuIds = array();
    $subMenu = array();
    $menu = array();

    foreach($menuItems as $menuItem){
        $menuIds[$menuItem['ID']] = [
            'name' => $menuItem['type_label'],
            'link' => $menuItem['object']
        ];
    }

    foreach($menuItems as $menuItem){
        $hasParent = false;
    
        if($menuItem['type'] == 'custom'){
            if($menuItem['menu_item_parent'] == 0){
                $navLink = $menuItem['url'];
            }else {
                $hasParent = true;
                $pageTile = str_replace(' ', '-', $menuItem['title']);
                $navLink = '/'.$menuIds[$menuItem['menu_item_parent']]['link'].$menuItem['url'];
            }
        }else{
            if($menuItem['menu_item_parent'] == 0){
                if($menuItem['object'] == 'home'){
                    $navLink = '/';
                }else{
                    $navLink = '/'.$menuItem['object'];
                }
            }else {
                $hasParent = true;
                $pageTile = str_replace(' ', '-', $menuItem['title']);
                $navLink = '/'.$menuIds[$menuItem['menu_item_parent']]['link'].'/'.strtolower($pageTile);
            }
        }

        if($hasParent){
            $menu[] = [
                'Name' => $menuItem['title'],
                'Link' => $navLink,
                'parent' => $menuIds[$menuItem['menu_item_parent']]['name'],
                'parentId' => $menuItem['menu_item_parent'],
                'itemId' => $menuItem['ID'],
                'object' => $menuItem['object'],
                'templateIpa' => $host.'wordpress/wp-json/wp/v2/'.$menuItem['object'].'?slug=template'
            ];
            $subMenu[] = [
                'Name' => $menuItem['title'],
                'Link' => $navLink,
                'parent' => $menuIds[$menuItem['menu_item_parent']]['name'],
                'parentId' => $menuItem['menu_item_parent'],
                'itemId' => $menuItem['ID'],
                'object' => $menuItem['object'],
                'templateIpa' => $host.'wordpress/wp-json/wp/v2/'.$menuItem['object'].'?slug=template'
            ];
        }else{
            $menu[] = [
                'Name' => $menuItem['title'],
                'Link' => $navLink,
                'parent' => null,
                'hasChild' => null,
                'itemId' => $menuItem['ID'],
                'object' => $menuItem['object'],
                'templateIpa' => $host.'wordpress/wp-json/wp/v2/'.$menuItem['object'].'?slug=template'
            ];
        }
    }

    $menuP = count($menu);
    foreach($subMenu as $sub){
        $parentId = (int)$sub['parentId'];
        for($i = 0; $i < $menuP; $i++ ){
            if($parentId == $menu[$i]['itemId']){
                $menu[$i]['hasChild'] = 1;
            }
        }
    } 
    
    $_SESSION['menu'] = $menu;
    $_SESSION['subMenu'] = $subMenu;
}