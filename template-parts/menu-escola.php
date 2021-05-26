<?php 

$array_menu = wp_get_nav_menu_items('Escola');
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            
            $menu_id       =   $m->object_id;
            $menu_title = $m->title;
            $menu_url   =  $m->url;
            
            $page_id = get_the_ID();

            if ($page_id==$menu_id){
                $active = 'active';
            }else{
                $active = '';
            }

            echo '<div class="col-md-3 col-sm-10 col-md-offset-0 col-sm-offset-1">
                        <div class="btn btn-slide '.$active.'">
                            <a href="'.$menu_url.'">'.$menu_title.'</a>
                            <span class="icon-edit-arrow-right"></span>
                        </div>
                    </div>';
        }
    }

    ?>
