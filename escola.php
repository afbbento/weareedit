<?php
/**
* Template Name: Escola
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
            <div class="col-md-12 col-md-offset-0 col-sm-11 col-sm-offset-1">
                <h1><?php echo get_field( "titulo_header" );?></h1>
                <h2><?php echo get_field( "texto_header" );?></h2>
            </div>
        </div>
        <div class="row grid-sp-40 hero-menu">
            <?php get_template_part( 'template-parts/menu', 'escola' ); ?>
        </div>
    </div>
    <div class="about-image"
        style="background-image:url(<?php echo get_field( "imagem_header" );?>)"></div>
</div>
<section class="about bg-dark-grey">
    <div class="bleeded grey">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-0 col-sm-11 col-sm-offset-1">
                    <h2 class="text-muted "><?php echo get_field('muted_text_sobre');?></h2></div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-0 col-sm-11 col-sm-offset-1">
                    <h3 class="section-title"><?php echo get_field('titulo_sobre');?></h3>
                </div>
                <div class="col-md-8 col-md-offset-0 col-sm-11 col-sm-offset-1">
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
                            if( have_rows('numeros', 25794) ){
                                while( have_rows('numeros', 25794) ) {
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
                    <hr class="light-grey">
                    <div class="text-block-container blocos-destaque">
                        
                            <?php 
                            if( have_rows('blocos_texto_destaque') ){
                                while( have_rows('blocos_texto_destaque') ) {
                                    the_row();

                                    $titulo_destaque = get_sub_field('titulo');
                                    
                                    $bloco_destaque = get_sub_field('texto_destaque');
                                    if( $bloco_destaque ){
                                        $bloco1 = $bloco_destaque['bloco_1'];
                                        $bloco2 = $bloco_destaque['bloco_2'];
                                    }

                                    
                            ?>
                            <div class="row sp-60">
                                <div class="col-md-12">
                                    <h3 class="text-white border"><?php echo $titulo_destaque; ?></h3>
                                </div>
                                <div class="col-sm-6 highlight">
                                    <?php echo $bloco1; ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $bloco2; ?>
                                </div>
                            </div>
                            <?php   
                                }//end while
                            }//end if
                            ?>                            
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="split-bg grey-black">
    <div class="container">
        <div class="full-container-img">
            <img src="<?php echo get_field( "seccao_imagem" );?>">
        </div>
    </div>
</section>

<?php
    $bloco_logos = get_field('bloco_logos');
        if( $bloco_logos ){
            $titulo = $bloco_logos['titulo'];
            $logos = $bloco_logos['logos'];
        }
        ?>
<section class="parceiros bg-black">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-11 col-sm-offset-1">
                <h3><?php echo $titulo;?></h3>
            </div>
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

<section class="block-main-content bg-light-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-0 col-sm-11 col-sm-offset-1"><h2 class="text-muted "><?php echo get_field( "muted_text_bloco_conteudo" );?></h2></div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-0 col-sm-11 col-sm-offset-1">
                <h3 class="section-title"><?php echo get_field( "titulo_bloco_conteudo" );?></h3>
            </div>
            <div class="col-md-8 col-md-offset-0 col-sm-11 col-sm-offset-1">
                <?php
                    if( have_rows('blocos_texto') ){
                        while( have_rows('blocos_texto') ) {
                        the_row();
                        echo '<div class="text-block-container">
                                <div class="row sp-60">';
                    
                            // Bloco texto
                            if( have_rows('conteudo') ):

                                //1 ou 2 colunas
                                while ( have_rows('conteudo') ) : the_row();
                                    
                                    //1 coluna
                                    if( get_row_layout() == '1_coluna' ){
                                        echo '<div class="col-sm-12">';                                        
                                        if( have_rows('coluna') ){
                                            
                                            while ( have_rows('coluna') ) {
                                                the_row();

                                                if( get_row_layout() == 'titulo' ){
                                                    
                                                    $titulo = get_sub_field('titulo');
                                                    echo '<h3 class="text-white border border-grey">'.$titulo.'</h3>';
                                                }

                                                if( get_row_layout() == 'texto' ){
                                                    
                                                    $texto = get_sub_field('texto');
                                                    echo $texto;
                                                }
                                            } 
                
                                        }
                                        echo '</div>';
                                    }
                                    //TODO 2 colunas
                                    if( get_row_layout() == '2_colunas' ){ 
                                        echo '<div class="col-md-6 col-sm-12">';
                                        if( have_rows('coluna1') ){
                                            
                                            while ( have_rows('coluna1') ) {
                                                the_row();

                                                if( get_row_layout() == 'titulo' ){
                                                    
                                                    $titulo = get_sub_field('titulo');
                                                    echo '<h3 class="text-white border border-grey">'.$titulo.'</h3>';
                                                }

                                                if( get_row_layout() == 'texto' ){
                                                    
                                                    $texto = get_sub_field('texto');
                                                    echo $texto;
                                                }
                                            } 
                
                                        }
                                        echo '</div>';

                                         echo '<div class="col-md-6 col-sm-12">';
                                        if( have_rows('coluna2') ){
                                            
                                            while ( have_rows('coluna2') ) {
                                                the_row();

                                                if( get_row_layout() == 'titulo' ){
                                                    
                                                    $titulo = get_sub_field('titulo');
                                                    echo '<h3 class="text-white border border-grey">'.$titulo.'</h3>';
                                                }

                                                if( get_row_layout() == 'texto' ){
                                                    
                                                    $texto = get_sub_field('texto');
                                                    echo $texto;
                                                }
                                            } 
                
                                        }
                                        echo '</div>';
                                    }                                    

                                // End loop.
                                endwhile;

                            // No value.
                            else :
                                // Do something...
                            endif;
                            echo '</div></div>';
                        }
                    }
                ?>
               
            </div>
        </div>
    </div>
</section>



<!--TUTORES SECTION-->
<?php include 'equipa.php' ?>

<?php get_footer(); ?>