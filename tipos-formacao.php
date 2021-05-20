<?php
/**
* Template Name: Tipo Formação
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

<div class="row head">   
                <div class="container">
                    <div class="col-md-12">
                        <h2><?php echo $area_title;?></h2>
                    </div>
                </div>
            </div>
            <div class="row">   
                <div class="container tipos-formacao">
                    <div class="col-md-4">
                        <a href="#">
                            <div class="content-box">
                                <h2 class="tipo-title">Design</h2>
                                <h3>User Experience, User Interface, Digital Product Design e Design Thinking.</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="content-box">
                                <h2 class="tipo-title">Programação</h2>
                                <h3>Front-End Development, Back-End Development e React.</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="content-box">
                                <h2 class="tipo-title">Business</h2>
                                <h3>Data Science, Analytics, Design Thinking, Marketing Strategy e Gestão.</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="content-box">
                                <h2 class="tipo-title">Marketing Digital</h2>
                                <h3>Copywriting, SEO, SEA, Email Marketing, Digital Media e eCommerce.</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="content-box">
                                <h2 class="tipo-title">Redes Sociais</h2>
                                <h3>Social Media Marketing, Digital Contente Digital Branded Content.</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

<?php get_footer(); ?>