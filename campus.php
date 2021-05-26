<?php
/**
* Template Name: Campus
*
* @package weareedit
* @subpackage weareedit
* @since weareedit
*/

get_header();

?>
<div class="hero">   
            <div class="container">
                <ul class="breadcrumb">
                    <li><h2><a href="/escola">Sobre nós</a></h2></li>
                </ul>
                <div class="row">
                    <div class="col-md-12">    
                        <h1><?php echo get_field( "titulo_header" );?></h1>
                        <h2><?php echo get_field( "texto_header" );?></h2>
                    </div>
                </div>
                <div class="row grid-sp-40 hero-menu">
                    <?php get_template_part( 'template-parts/menu', 'escola' ); ?>
                </div>
            </div>
        </div>
        <?php
            $posts = get_posts(array(
                'posts_per_page'	=> -1,
                'post_type'			=> 'localizacoes',
                'orderby'           => 'title',
                'order'             => 'ASC',
            ));
            $i = 0;
            if( $posts ){
                foreach( $posts as $post ){ 
                    setup_postdata( $post );
            $i++;
            if ($i==1){
                $first = 'split-bg split-black-grey';
            }else{
                $first ='';
            }                                                        
        ?>
        <section class="<?php echo $first;?> campus-locations">
            <div class="container">
                <div class="location-container">
                    <h1 class="title"><?php echo get_the_title();?></h1>
                    <h2 class="address">
                        <?php echo get_field('morada_rua');?><br>
                        <?php echo get_field('morada');?> <br>
                        <?php echo get_field('telefone');?><br>
                        <?php echo get_field('email');?>
                    </h2>
                    <a href="#" class="btn btn-yellow">Google Maps</a>
                </div>
            </div>
        </section>
        <?php 
            }//end foreach
        }//end if
        ?>
        
        <?php
        $bloco_logos = get_field('bloco_logos');
        if( $bloco_logos ){
            $titulo = $bloco_logos['titulo'];
            $logos = $bloco_logos['logos'];
        }
        ?>
        <section class="parceiros">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><h3><?php echo $titulo;?></h3></div>
                </div>
                <div class="row grid-sp-40 logos-grid">
                    <?php
                        if( $logos ) {
                            foreach( $logos as $row ) {                    
                        ?>
                        <div class="col-xs-6 col-md-3 col-sm-6">
                            <div class="grid-box">
                                <a href="<?php echo $row['link'];?>" target="_blank">
                                    <img src="<?php echo $row['imagem'];?>">
                                </a>
                            </div>
                        </div>
                        <?php
                            }//end foreach
                        }//end if
                    ?>                   
                </div>
                
            </div>
        </section>

<?php get_footer(); ?>