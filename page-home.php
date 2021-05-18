<?php
/**
* Template Name: Homepage
*
* @package weareedit
* @subpackage weareedit
* @since weareedit
*/

get_header();

?>

<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-offset-1 col-xs-offset-0 ">
                <h1 class=""><?php echo get_field( "titulo_header" );?></h1>
                <p class=""><?php echo get_field( "texto_header" );?></p>
            </div>
        </div>
    </div>

    <?php get_template_part( 'template-parts/couses-boxes', 'home' ); ?>

    <!--about section-->
    <section class="about text-image-block">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 col-md-offset-0 col-sm-offset-1 col-xs-offset-0"><small
                        class="text-muted"><?php echo get_field('muted_text_sobre');?></small>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-offset-0">
                    <h2 class="section-title"><?php echo get_field('titulo_sobre');?></h2>
                </div>
                <div class="col-md-8 col-md-offset-0 col-sm-offset-1 col-xs-offset-0">
                    <div class="row sp-60">
                        <?php 
                                $bloco_textos = get_field('texto_sobre');
                                if( $bloco_textos ){
                                    $texto_1 = $bloco_textos['bloco1'];
                                    $texto_2 = $bloco_textos['bloco2'];
                                }
                                 
                            ?>
                        <div class="col-sm-6"><?php echo $texto_1; ?></div>
                        <div class="col-sm-6"><?php echo $texto_2; ?></div>
                    </div>
                    <hr class="light-grey">
                    <div class="row counting-numbers-row">
                        <?php 
                            if( have_rows('numeros') ){
                                while( have_rows('numeros') ) {
                                    the_row();
                                    $label = get_sub_field('label');
                                    $numero = get_sub_field('numero');
                        ?>
                        <div class="col-xs-6 col-sm-6 col-md-4">
                            <div class="counting-numbers"><span class="Count"><?php echo $numero; ?></span>+</div>
                            <p class="text-white"><?php echo $label; ?></p>
                        </div>
                        <?php   
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!--In Company-->
            <?php
                    $bloco_imagem_texto = get_field('bloco_imagem_texto');
                        if( $bloco_imagem_texto ){
                            $imagem = $bloco_imagem_texto['imagem'];
                            $mute_text = $bloco_imagem_texto['mute_text'];
                            $titulo = $bloco_imagem_texto['titulo'];
                            $texto = $bloco_imagem_texto['texto'];
                            $btn = $bloco_imagem_texto['btn'];
                            
                            $link_url = $btn['url'];
                            $link_title = $btn['title'];
                        }
                ?>
            <div class="row is-flex v-center row-in_company">
                <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-offset-0 col-md-6">
                    <div class="img__wipe__container active">
                        <div class="img__transition__wipe"></div>
                        <div class="img__transition__inner">
                            <img src="<?php echo $imagem; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-offset-0 col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 ">
                    <div class="box-center">
                        <div class="box-center-inner">
                            <small class="text-muted"><?php echo $mute_text;?></small>
                            <h2><?php echo $titulo;?></h2>
                            <?php echo $texto;?>
                            <div class="btn btn-slide">
                                <a href="<?php echo $link_url; ?>"
                                    class="btn btn-transparent"><?php echo $link_title; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--parceiros-->
    <?php
            $bloco_logos = get_field('bloco_logos');
            if( $bloco_logos ){
                $titulo = $bloco_logos['titulo'];
                $logos = $bloco_logos['logos'];
            }
        ?>
    <section class="parceiros bleeded">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 col-sm-offset-1 col-md-offset-0 col-xs-offset-0">
                    <h3><?php echo $titulo;?></h3>
                </div>
            </div>
            <div class="row grid-sp-40 logos-grid ">
                <?php
                    if( $logos ) {
                        foreach( $logos as $row ) {
                                
                    ?>
                <div class="col-md-3 col-sm-5 col-xs-6">
                    <div class="grid-box">
                        <a href="<?php echo $row['link'];?>" target="_blank">
                            <img src="<?php echo $row['imagem'];?>">
                        </a>
                    </div>
                </div>

                <?php
                        }
                    }
                    ?>
            </div>
        </div>
    </section>


    <!--alumni-->
    <?php
            $seccao_alumni = get_field('seccao_alumni');
            if( $seccao_alumni ){
                $muted_text = $seccao_alumni['muted_text'];
                $titulo = $seccao_alumni['titulo'];
                $texto = $seccao_alumni['texto'];                
            }
        ?>
    <section class="alumni">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 col-sm-offset-1 col-md-offset-0 col-xs-offset-0"><small
                        class="text-muted"><?php echo $muted_text; ?></small></div>
            </div>
            <div class="row mb-85 ">
                <div class="col-md-4 col-sm-offset-1 col-md-offset-0 col-xs-offset-0">
                    <h2 class="section-title"><?php echo $titulo; ?></h2>
                </div>
                <div class="col-sm-11 col-md-8 col-sm-offset-1 col-md-offset-0 col-xs-offset-0">
                    <p><?php echo $texto; ?></p>
                </div>
            </div>
        </div>
        <?php get_template_part( 'template-parts/alumni', 'slider' ); ?>
    </section>

    <!--tutores-->
    <?php
            $seccao_equipa = get_field('seccao_equipa');
            if( $seccao_equipa ){
                $muted_text = $seccao_equipa['muted_text'];
                $titulo = $seccao_equipa['titulo'];                
            }
        ?>
    <section class="tutores">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 col-sm-offset-1 col-md-offset-0 col-xs-offset-0"><small
                        class="text-muted"><?php echo $muted_text; ?></small></div>
            </div>
            <div class="row  mb-85">
                <div class="col-md-4 col-sm-offset-1 col-md-offset-0 col-xs-offset-0">
                    <h2 class="section-title"><?php echo $titulo; ?></h2>
                </div>
                <div class="col-sm-11 col-md-8 col-sm-offset-1 col-md-offset-0 col-xs-offset-0">
                    <p><?php echo $texto; ?></p>
                </div>
            </div>
            <?php get_template_part( 'template-parts/equipa' ); ?>
        </div>
    </section>

    <!--faq banner-->
    <?php get_template_part( 'template-parts/faq', 'banner' ); ?>

    <?php get_footer(); ?>