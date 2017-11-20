<?php
namespace App\Presenters;
use Auth;

class MenuPresenter
{
    public function getMenu($menus)
    {
        if ($menus) {
            $resoult = '<option value="0">顶级菜单</option>';
            foreach ($menus as $key => $value) {
                    $resoult .= '<option value="'.$value->id.'">'.$value->name.'</option>';
            }
            return $resoult;
        } else {
             return '<option value="0">顶级菜单</option>';
        }
    }


    public function getMenuList($menus)
    {
        if($menus) {
            $item = '';
            foreach ($menus as $key => $v) {
                if( !empty($v->chlid)){
                    $item .= "<li class='dd-item dd3-item' data-id='".$v->id."'>
                            <div class='dd-handle dd3-handle'> </div>
                            <div class='dd3-content'>".$v->name.$this->getActionButton($v->id,true)."</div>
                            ";
                    $item .= '<ol class="dd-list">';
                    foreach ($v->chlid as $k => $va) {
                        $item .= '<li class="dd-item dd3-item" data-id="'.$va["id"].'">
                            <div class="dd-handle dd3-handle"> </div>
                            <div class="dd3-content"> '.$va["name"].$this->getActionButton($va['id'],false).' </div>
                        </li>';
                    }

                    $item .=   "</ol></li>";
                }else {
                    $item .= "<li class='dd-item dd3-item' data-id='".$v->id."'>
                              <div class='dd-handle dd3-handle'> </div>
                              <div class='dd3-content'>".$v->name.$this->getActionButton($v->id,true)."</div></li>";
                }
            }

            return $item;
        } else {
            return '战无数据';
        }
    }

    public function getActionButton($id,$status)
    {
        $html = '<div class="pull-right action-buttons">';
        if($status == true){
            if( Auth::user()->can('admin.menu.add')){
                $html .= "<a href='javascript:;' data-pid='".$id."' class='btn-xs createMenu'><i class='fa fa-plus'></i></a>";
            }
        }


        if( Auth::user()->can('admin.menu.edit')){
            $html .= "<a href='javascript:;' data-pid='".$id."' class='btn-xs editMenu' data-toggle='tooltip' data-original-title='#' data-path='".route('admin.menu_update')."'  data-placement='top'><i class='fa fa-pencil'></i></a>";
        }
        $html .= '</div>';
        return $html;
    }

    public function sidebarMenus($menus)
    {
        if($menus){

            $html = '';
            foreach ($menus as $k => $v) {
                if( Auth()->user()->can($v->power)){
                    $html .= '<li><a><i class="fa fa-home"></i> '.$v->name.' <span class="fa fa-chevron-down"></span></a>';
                    if( !empty($v->chlid)){
                        $html .=  $this->getSidebarChlidMenus($v->chlid);
                    }
                }
                $html .= '</li>';
            }

        }

        return $html;
    }

    public function getSidebarChlidMenus($chlid)
    {
        if($chlid){
            $html = '<ul class="nav child_menu">';
            foreach ($chlid as $k => $v) {
                if( Auth()->user()->can($v['power'])){
                    $html .=  '<li><a href="'.$v['url'].'">'.$v['name'].'</a></li>';
                }
            }
             $html .= '</ul>';
        }
        return $html;
    }
}