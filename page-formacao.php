<?php
/**
* Template Name: Formação
*
* @package weareedit
* @subpackage weareedit
* @since weareedit
*/

get_header();

if(isset($_REQUEST['areaId'])) {
    $areaId = $_REQUEST['areaId'];
}
if(isset($_REQUEST['tipoId'])) {
    $tipoId = $_REQUEST['tipoId'];
}

$args = array(
	'numberposts'	=> -1,
	'post_type'     => 'formacao_tipo',
	'page_id'       =>  $tipoId
);
$tipos = get_posts( $args );
foreach($tipos as $tipo){
    $tipo_curso = $tipo->post_title; 
    $tipo_formacao_class = get_field('class', $tipo->ID);
    $tipo_formacao_icon_color = get_field( 'icon_colorido', $tipo->ID );
}

$args_area = array(
	'numberposts'	=> -1,
	'post_type'     => 'formacao_area',
	'page_id'       =>  $areaId
);
$area = get_posts( $args_area );
foreach($area as $area_row){
    $area_title = $area_row->post_title; 
}
?>
<div class="content">
        <?php include 'menu.php';?>
            <div class="filter-header">
                <div class="row">   
                    <div class="container">
                        <div class="col-md-12">
                            <ul class="breadcrumb reveal-block class-<?php echo $tipo_formacao_class;?>">
                                <li class="logo-formacao"><img src="<?php echo $tipo_formacao_icon_color['url']; ?>"></li>
                                <li><a href="#"><?php echo $tipo_curso;?></a></li>
                            </ul>    
                        </div>      
                    </div>
                </div>
                <div class="row">
                    <div class="container reveal-block">
                        <div class="col-md-12">
                            <div class="filter-select"><span class="select-course-area"><?php echo $area_title; ?>, </span><span class="unselected select-location">Local</span></div>
                        </div>
                    </div>
                </div>
            </div>
             <?php get_template_part( 'template-parts/formacao', 'result' ); ?>    
        </div>

        <div class="side-filter-container" >
            <form id="filter-locations" name="filter-locations">
                <div class="overlay-side-filter"></div>
                <div class="side-filter">
                    
                    <div class="filter-content">
                        <div class="close">
                            <img src="img/fechar.svg" />
                        </div>            
                        <div class="filter-label">Local</div>
                        <div class="filter-options">
                            <div> 
                                <input type="radio" value="Lisboa" id="location1" name="location" >
                                <label for="location1">Lisboa</label>
                            </div>
                            <div>
                                <input type="radio" value="Porto" id="location2" name="location" >
                                <label for="location2">Porto</label>    
                            </div>
                        </div>
                    </div>
                    <div class="side-bottom">
                        <div class="btn-container">
                            <a href="#" class="btn btn-black get-filter">Guardar Informação</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>


<?php get_footer(); ?>