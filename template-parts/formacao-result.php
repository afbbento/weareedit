<?php

$meta_key = 'home_data';
$meta_value = '';
$post_type = 'formacao';
$post_status = 'publish';

$date = date('Ymd');
if(isset($_REQUEST['areaId'])) {
    $areaId = $_REQUEST['areaId'];
}
if(isset($_REQUEST['tipoId'])) {
    $tipoId = $_REQUEST['tipoId'];
}
$meta_query = array('relation' => 'AND',
    array(
        'key'           => 'home_data',
        'compare'       => '!=',
        'value'         =>  '',
    ),
    array(
        'key'           => 'home_data',
        'compare'       => '>=',
        'value'         =>  $date,
    ),
);

array_push(
    $meta_query,
        array('relation' => 'AND',
            array(
                'key' => 'tipo_formacao', // name of custom field
                'value' => '"' . $tipoId . '"',
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'area_formacao', // name of custom field
                'value' => '"' . $areaId . '"',
                'compare' => 'LIKE'
            )
        )
            
);
$args = array(
   'order'            => $order,
   'orderby'          => $orderBy,
   'meta_key'         => $meta_key,
   'meta_query'       => $meta_query,
   'post_type'        => $post_type,
   'post_status'      => $post_status
);
?>

<section class="filter-result">
    <div class="row grid-sp-40">
        <div class="container">


<?php
$myposts = get_posts( $args );
if ($myposts){
    $i = 0;
    foreach ( $myposts as $post ){
        $i++;
        setup_postdata( $post );
        $tipoFormacao = get_field('tipo_formacao');
        $link_formacao = get_permalink();
        if( $tipoFormacao ){
            foreach( $tipoFormacao as $tipo_formacao_row ){
                $tipo_formacao_bg = get_field( 'imagem_background', $tipo_formacao_row->ID );
                $titulo_tipo_formacao = get_the_title( $tipo_formacao_row->ID );
                $tipo_formacao_icon = get_field( 'icon', $tipo_formacao_row->ID );
                $tipo_formacao_class = get_field( 'class', $tipo_formacao_row->ID );
            }

            if ($tipo_formacao_class=='curso'){
                $text_color = "text-black";
            }else{
                $text_color = "text-white";
            }
        }
       
    ?>
    <div class="col-sm-6 col-md-6">
        <a href="<?php echo $link_formacao; ?>" class="course-box reveal-block <?php echo $text_color; ?>" style="background-image:url(<?php echo $tipo_formacao_bg; ?>);">                    
            <div class="course-icon">
                <img src="<?php echo $tipo_formacao_icon; ?>">
            </div>
            <div class="course-text">
                <div class="course-time"><?php echo $titulo_tipo_formacao; ?></div>
                <div class="course-title"><?php the_field('home_titulo');?></div>
                <div class="course-date">10 de Março, Lisboa</div>
            </div>
            <div class="course-view">
                <span>Ver curso</span>
            </div>
        </a>
    </div>

    <?php
    }
    wp_reset_postdata();
}
?>
        </div>
    </div>
</section>  