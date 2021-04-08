<?php
/*
 * Formacao Single
 * @package Weareedit
 */


get_header();

?>
<div class="head">   
    <div class="container">
        <ul class="breadcrumb reveal-block text-yellow">
            <li class="logo-formacao"><img src="<?php echo get_template_directory_uri(); ?>/img/formacao.svg"></li>
            <li><a href="#">Formação</a></li>
            <li><a href="#">Design</a></li>
        </ul>
        <h1 class="reveal-block"><?php the_field('titulo'); ?></h1>
        <div class="formacao-info ">
            <div class="row reveal-block">
                <?php 
                $bloco_info = get_field('bloco_informacao');
                
                if( $bloco_info ){
                   $duracao = $bloco_info['duracao'];
                   $investimento = $bloco_info['investimento'];
                   $horarios = $bloco_info['horarios'];
                   $info_documento = $bloco_info['info_documento'];  
                   $info_descricao = $bloco_info['info_descricao'];  
                }
                $fundo_header = get_field('fundo_header');
                ?>
                <div class="col-xs-3 col-md-2">
                    <label>local</label>
                    <div class="value">Lisboa</div>
                </div>
                <div class="col-xs-3 col-md-2">
                    <label>duração</label>
                    <div class="value"><?php echo $duracao; ?></div>
                </div>
                <div class="col-xs-3 col-md-2">
                    <label>INVESTIMENTO</label>
                    <div class="value"><?php echo $investimento; ?></div>
                </div>
                <div class="col-xs-5 col-md-3">
                    <label>HORÁRIOS</label>
                    <div class="value"><?php echo $horarios; ?></div>
                </div>
            </div>
        </div>
    </div>

    <!--INFO BAR-->
    <div id="info_bar" class="info_bar_container">
        <div class="formacao-info-bar reveal-block">
            <div class="cols drop">
                
                        <?php 
                        $rows_horarios = get_field('horario_formacao' );
                        if( $rows_horarios ){
                            $first_row = $rows_horarios[0];
                            $first_row_title = $first_row['horario'];
                            
                            foreach( $first_row_title as $related_post ){
                                echo '<div class="inner">'.get_the_title( $related_post->ID ).'</div>
                                    <div class="drop-inner" style="display:none;">
                                        <ul>';                        
                            } 
                         
                            
                            while( have_rows('horario_formacao') ) {
                            the_row();

                                $horario = get_sub_field('horario');
                                
                                foreach( $horario as $row_horario ){
                                        echo "<li>".get_the_title( $row_horario->ID )."</li>";
                                }
                            }                 
                        }
                        ?>        
                        </ul>
                    </div>                       
                </div>
                <div class="cols drop">
                    <?php 
                    $rows_horarios = get_field('horario_formacao' );
                    if( $rows_horarios ){

                        $first_date = $rows_horarios[0]['data'];

                        while( have_rows('horario_formacao') ) {
                        the_row();

                        //echo $sub_value = get_sub_field('data');
                            $horario = get_sub_field('horario');
                            
                            foreach( $horario as $row_horario ){
                                //echo get_the_title( $row_horario->ID );
                            }
                            
                        }                 
                    }
                    ?>
                    <div class="inner">10 Mar - 23 Jul</div>
                    <div class="drop-inner" style="display:none;">
                        <ul>
                            <li>10 Mar</li>
                            <li>23 Jul</li>
                        </ul>
                    </div>   
                </div>
                <div class="cols download-icon">
                    <div class="inner"><a href="<?php echo $info_documento; ?>">Descarregar programa </a></div>
                </div>
                <div class="cols col-btn">Pedir informação</div>
            </div>
        </div>   
    </div>

    <section class="banner-image" style="background-image:url(<?php echo $fundo_header; ?>);"></section>

    <!--VISAO GERAL-->
    <section class="visao-geral bg-light-grey">
            <div class="container">
                <div class="row sobre-curso reveal-block">
                    <div class="col-md-12">
                        <small class="text-muted">SOBRE O CURSO</small>
                        <h3><?php echo $info_descricao; ?></h3>
                    </div>
                </div>
                <?php
                $bloco_visao_geral = get_field('visao_geral');
                if( $bloco_visao_geral ){
                   $muted_text_visao_geral = $bloco_visao_geral['muted_text'];
                   $title_visao_geral = $bloco_visao_geral['titulo'];
                   $blocos_visao_geral = $bloco_visao_geral['blocos'];
                }
                ?>
                <div class="row">
                    <div class="col-md-4"><small class="text-muted reveal-block"><?php echo $muted_text_visao_geral; ?></small></div>
                </div>
                <div class="row">
                    <div class="col-md-4">    
                        <h2 class="intro reveal-block"><?php echo $title_visao_geral; ?></h2>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-block-container">
                                    <div class="grid reveal-block">
                                        <div class="grid-sizer"></div>
                                        <?php
                                        if( $blocos_visao_geral ) {
                                            foreach( $blocos_visao_geral as $row ) {
                                        ?>
                                        <div class="grid-item">
                                            <h4><?php echo $row['titulo']; ?></h4>
                                            <p><?php echo $row['texto']; ?></p>
                                        </div>
                                        <?php }
                                        
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>   
                
                <div class="row certificacao is-flex v-center reveal-block">
                    <div class="col-md-4 pad0">    
                        <img src="<?php echo get_template_directory_uri(); ?>/img/bitmap@2x.png">
                    </div>
                    <div class="col-md-8">
                        <h4>Curso certificado pela DGERT</h4>
                        <p>A certificação é entregue aos alunos em formato digital. Inclui a carga horária, modular e total, do curso temáticas, notas finais de cada módulo e média final do curso, certificação DGERT, carimbo e assinatura da coordenação pedagógica do programa ou administração da escola.</p>
                    </div>
                </div>   
            </div>
        </section>

        <!--PROGRAMA-->
        <section class="programa bg-black">
            <div class="container">
                <div class="row reveal-block">
                    <div class="col-md-12">
                        <h1>Programa</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-offset-right-1">
                        <?php 
                        $programa = get_field('programa');
                        if( $programa ){
                            $texto_apresentacao = $programa['texto_apresentacao'];
                        }
                        ?>    
                        <p class="reveal-block"><?php echo $texto_apresentacao; ?></p>
                    </div>
                    <div class="col-md-8">
                        <?php
                        $programa = get_field('programa');
                        if( $programa ){
                            $blocos_programa = $programa['bloco_programa']; 
                            if( $blocos_programa ) {
                                foreach( $blocos_programa as $row ) {
                                    echo '<div class="text-block-container">                            
                                            <div class="row sp-60">
                                                <div class="col-sm-12">
                                                    <h4 class="border reveal-block">'.$row['titulo'].'</h4>
                                                </div>
                                            </div>
                                            <div class="grid">
                                                <div class="grid-sizer"></div>';
                                    
                                    $items_programa = $row['item'];
                                    foreach( $items_programa as $row_item ) {
                                        
                                        echo '<div class="grid-item">
                                                <p class="list-title">'.$row_item['titulo'].'</p>
                                                '.$row_item['texto'].'                        
                                              </div> ';

                                    }

                                    echo '</div>
                                    </div>';
                                }
                            }                           
                        }
                        ?>
                    </div>
                </div>
                <div class="row ferramentas">
                    <div class="col-md-12">
                        <h3 class="reveal-block"><?php echo get_field('titulo_ferramentas'); ?></h3>
                    </div>
                    <div class="col-md-12">
                        <div class="row grid-sp-40 logos-grid reveal-block">
                            <?php
                            $ferramentas = get_field('ferramentas_de_trabalho');
                            if( $ferramentas ) {
                                foreach( $ferramentas as $row_ferramentas ) {
                        
                            ?>
                            
                            <div class="col-md-3">
                                <div class="adaptImage" style="border: 1px solid #242424;">
                                    <div class="adaptImage__inner">
                                        <div class="adaptImage__aspect" style="padding-bottom:63%;"></div>
                                        <div class="card">
                                            <div class="img-icon">
                                                <img src="<?php echo $row_ferramentas['icon']; ?>">
                                            </div>
                                            <div class="img-icon-label">
                                                <?php echo $row_ferramentas['label']; ?>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <?php 
                                } 
                            }                              
                            ?>
                        </div>
                    </div>
                </div>
                <hr class="light-grey">

                <?php
                $banner = get_field('banner');
                if( $banner ) {
                    $muted_text_banner = $banner['muted_text'];
                    $titulo_banner = $banner['titulo'];
                    $botao_banner = $banner['botao'];
                    $imagem_banner = $banner['imagem'];
                            
                    $banner_link_url = $botao_banner['url'];
                    $banner_link_title = $botao_banner['title'];
                }
                ?>
                <div class="row info-banner is-flex v-center reveal-block">
                    <div class="col-md-12" style="background-image: url(<?php echo $imagem_banner; ?>);">
                        <div class="info-form">
                            <div class="col-md-6">
                                <small class="text-muted"><?php echo $muted_text_banner; ?></small>
                                <h2><?php echo $titulo_banner; ?></h2>
                            </div>
                            <div class="col-md-6 col-center">
                                <div class="center-cell">
                                    <a href="<?php echo $banner_link_url; ?>" class="btn btn-yellow"><?php echo $banner_link_title; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>

                <?php
                $projecto_360 = get_field('projecto_360');
                    if( $projecto_360 ){
                        foreach($projecto_360 as $elemento_360){
                            $titulo_projecto = get_field('titulo', $elemento_360->ID);
                            $subtitulo_projecto = get_field('subtitulo', $elemento_360->ID);
                            $texto_projecto = get_field('texto', $elemento_360->ID);
                            $video_projecto = get_field('video', $elemento_360->ID);
                            $clientes_projecto_360 = get_field('cliente', $elemento_360->ID);
                        }        
                    }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <small class="text-muted reveal-block">PROJETO 360º - <?php echo $titulo_projecto; ?></small>
                    </div>
                    <div class="col-md-4">    
                        <h2 class="intro reveal-block"><?php echo $subtitulo_projecto; ?></h2>
                    </div>
                    <div class="col-md-8">
                        <div class="row sp-60">
                            <div class="col-md-12">
                                <p class="reveal-block"><?php echo $texto_projecto; ?></p>  
                            </div>
                        </div>
                    </div>
                </div>   
                    <div class="row grid-sp-40 logos-adapt-center">
                        <?php
                            
                        if( $clientes_projecto_360 ){
                            foreach($clientes_projecto_360 as $clientes_360){
                            $imagem_cliente_360 = get_field('imagem', $clientes_360->ID);
                        ?>
                        
                        <div class="col-md-3">
                            <div class="adaptImage">
                                <div class="adaptImage__inner">
                                    <div class="adaptImage__aspect">
                                        <img src="<?php echo $imagem_cliente_360; ?>">
                                    </div>                            
                                </div>    
                            </div>
                        </div>

                        <?php
                            }
                        }
                        ?>                              
                    </div>
                    <div class="video-vimeo">
                        <iframe src="https://player.vimeo.com/video/333126047" width="100%" height="640" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    </div>
            </div>
        </section>
        <script>
        jQuery( document ).ready(function() {
        jQuery('.grid').masonry({
        // options
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
                
        percentPosition: true
                });
                var swiper = new Swiper('.swiper-boxes', {
                slidesPerView: 4,
                speed: 1000,
                spaceBetween: 30,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
        });
        ScrollTrigger.create({
             trigger: "#info_bar",
            start: "top 60",
            endTrigger:"html",
            end:"bottom top",
            toggleClass: "sticky_info",
            onEnter: () => show_btn(),
            onLeaveBack: () => hide_btn(),
            pinSpacing: false,
            scrub: 1
            });

            function show_btn() {
                jQuery('.headerDesktop__contact').css( "opacity","0" ); 
                jQuery('.headerDesktop__inCompany').toggleClass('right');
            }
            function hide_btn() {
                jQuery('.headerDesktop__contact').css( "opacity","1" ); 
                jQuery('.headerDesktop__inCompany').toggleClass('right');
            }
        });
        </script>

        <!--tutores-->
        <?php
            $seccao_equipa = get_field('seccao_equipa');
            if( $seccao_equipa ){
                $muted_text = $seccao_equipa['muted_text'];
                $titulo = $seccao_equipa['titulo'];
                $texto = $seccao_equipa['texto'];                
            }
        ?>
        <section class="tutores">
            <div class="container">
                <div class="row reveal-block">
                    <div class="col-md-4"><small class="text-muted"><?php echo $muted_text; ?></small></div>
                </div>
                <div class="row reveal-block mb-85">
                    <div class="col-md-4">    
                        <h2 class="section-title"><?php echo $titulo; ?></h2>
                    </div>
                    <div class="col-md-8">
                        <p><?php echo $texto; ?></p>
                    </div>
                </div>
            <?php get_template_part( 'template-parts/equipa' ); ?>
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
                <div class="row reveal-block">
                    <div class="col-md-4"><small class="text-muted"><?php echo $muted_text; ?></small></div>
                </div>
                <div class="row mb-85 reveal-block">
                    <div class="col-md-4">    
                        <h2 class="section-title"><?php echo $titulo; ?></h2>
                    </div>
                    <div class="col-md-8">
                        <p><?php echo $texto; ?></p>
                    </div>
                </div>
            </div>
            <?php get_template_part( 'template-parts/alumni', 'slider' ); ?>
        </section>

        <section class="course-faq">
            <div class="container">
                <div class="row reveal-block">
                    <div class="col-md-12">
                        <h1 class="text-white">Perguntas frequentes</h1>  
                    </div>
                </div>
                <div class="row row-faq reveal-block">
                    <div class="col-md-6">
                    <?php
                        $rows_faq = get_field('faq' );
                        if( $rows_faq ){                           
                            foreach( $rows_faq as $key => $row_even ) {                                
                                if($key % 2 == 0){        
                                    if ($key==0){
                                        $open = 'open';
                                        $display = '';
                                    }else{
                                        $open = '';
                                        $display = 'style="display:none;"';
                                    }                            
                                    echo '
                                    <div id="accordion" class="accordion-container reveal-block">
                                        <h4 class="accordion-title js-accordion-title '.$open.'">'.$row_even["pergunta"].'</h4>
                                        <div class="accordion-content" '.$display.'>'.$row_even["resposta"].'</div>                            
                                    </div>';
                            
                                }      
                            }                            
                        }
                    ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $rows_faq = get_field('faq' );
                        if( $rows_faq ){                           
                            foreach( $rows_faq as $key => $row_odd ) {                                
                                if($key % 2 == 1){                                    
                                    echo '
                                    <div id="accordion" class="accordion-container reveal-block">
                                        <h4 class="accordion-title js-accordion-title">'.$row_odd["pergunta"].'</h4>
                                        <div class="accordion-content" style="display:none;">'.$row_odd["resposta"].'</div>                            
                                    </div>';
                            
                                }      
                            }                            
                        }
                    ?>
                    </div>   
                </div>
            </div>
        </section>
        
        <?php
        $contacto_informacao = get_field('contacto_informacao');
        if( $contacto_informacao ){
            foreach($contacto_informacao as $elemento_info){
                $foto_info = get_field('foto', $elemento_info->ID);
                $foto_info_url = $foto_info['url'];
            }
        }
        ?>
        <section class="course-contact">
            <div class="container">
                <div class="row is-flex v-center">
                    <div class="col-md-12">
                        <div class="contact-form inner-border reveal-block">
                            <div class="col-md-4">
                                <div class="box-circle">
                                    <div class="inner-border" style="background-image: url(<?php echo $foto_info_url; ?>)"></div>
                                </div>
                            </div>
                            <div class="col-md-8 col-center text-left">
                                <div class="center-cell">
                                    <h3>Ajudamos-te a escolher o curso certo</h3>
                                    <p>Estamos disponíveis para te orientar e ajudar-te a tomar a melhor decisão.</p>
                                    <a href="#" class="btn btn-yellow">Enviar mensagem</a>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </section>

        <!--RELACIONADOS-->
        <?php get_template_part( 'template-parts/relacionados' ); ?>


<?php get_footer(); ?>