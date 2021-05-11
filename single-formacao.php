<?php
/*
 * Formacao Single
 * @package Weareedit
 */


get_header();
$tipoFormacao = get_field('tipo_formacao');
if( $tipoFormacao ){
    foreach( $tipoFormacao as $tipo_formacao_row ){
        $link_tipo_formacao = get_permalink( $tipo_formacao_row->ID );
        $titulo_tipo_formacao = get_the_title( $tipo_formacao_row->ID );
        $tipo_formacao_bg = get_field( 'imagem_background', $tipo_formacao_row->ID );
        $tipo_formacao_icon = get_field( 'icon', $tipo_formacao_row->ID );
        $tipo_formacao_class = get_field( 'class', $tipo_formacao_row->ID );
        $tipo_formacao_icon_color = get_field( 'icon_colorido', $tipo_formacao_row->ID );
        $tipo_formacao_certificado = get_field( 'imagem_certificado', $tipo_formacao_row->ID );
        $contacto_informacao = get_field( 'contacto_informacao', $tipo_formacao_row->ID );
        $tipo_formacao_ID = $tipo_formacao_row->ID;
    }
}
$area_formacao = get_field('area_formacao');
    if( $area_formacao ){     
        foreach($area_formacao as $area_row){
            $titulo_area = get_the_title( $area_row->ID );
            $area_id = $area_row->ID;
        }
    }

$localizacao_formacao = get_field('localizacao');
    if( $localizacao_formacao ){     
        foreach($localizacao_formacao as $localizacao_row){
            $localizacao_formacao = get_the_title( $localizacao_row->ID );
            $localizacao_id = $localizacao_row->ID;
        }
    }
?>
<div class="head">
    <div class="container">
        <div class="col-md-12 col-sm-10 col-sm-offset-1 col-md-offset-0">
            <ul class="breadcrumb reveal-block class-<?php echo $tipo_formacao_class;?>">
                <li class="logo-formacao"><img src="<?php echo $tipo_formacao_icon_color['url']; ?>"></li>
                <li><a
                        href="/tipo-formacao/?tipoId=<?php echo $tipo_formacao_ID; ?>"><?php echo $titulo_tipo_formacao; ?></a>
                </li>
                <li><a
                        href="/formacao/?tipoId=<?php echo $tipo_formacao_ID; ?>&areaId=<?php echo $area_id; ?>"><?php echo $titulo_area; ?></a>
                </li>
            </ul>
            <h1 class="reveal-block"><?php the_field('titulo'); ?></h1>
        </div>

        <div class="col-md-12 col-sm-10 col-sm-offset-1">
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
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <label>local</label>
                        <div class="value"><?php echo $localizacao_formacao; ?></div>
                    </div>
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <label>duração</label>
                        <div class="value"><?php echo $duracao; ?></div>
                    </div>
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <label>INVESTIMENTO</label>
                        <div class="value"><?php echo $investimento; ?></div>
                    </div>
                    <div class="col-xs-9 col-sm-5 col-md-3">
                        <label>HORÁRIOS</label>
                        <div class="value"><?php echo $horarios; ?></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--INFO BAR-->
    <div id="info_bar" class="info_bar_container">
        <div class="formacao-info-bar reveal-block">
            <?php
                $rows_horarios = get_field('horario_formacao' );
                $horarios_count = count(get_field('horario_formacao'));
                if ($horarios_count>1){
                    $col_drop = 'drop';
                }else{
                    $col_drop = '';
                }
            ?>
            <div class="cols <?php echo $col_drop; ?>">
                <?php         
                    if( $rows_horarios ){
                        
                        $first_row = $rows_horarios[0];
                        $first_row_title = $first_row['horario'];
                        
                        $data_ini = $first_row['data'];
                        $data_fim = $first_row['data_fim'];
                        
                        if ($data_ini!=''){
                           
                            $formacao_format_ini = DateTime::createFromFormat('d/m/Y', $data_ini);
                            $dia_formacao_ini = $formacao_format_ini->format('d');                            
                            $mes_ini_texto = substr(getMes($formacao_format_ini->format('m')), 0, 3);
                            
                        }
                        if ($data_fim!=''){
                            $formacao_format_fim = DateTime::createFromFormat('d/m/Y', $data_fim);
                            $dia_formacao_fim = $formacao_format_fim->format('d');
                            $mes_fim_texto = substr(getMes($formacao_format_fim->format('m')), 0, 3);
                        }

                        foreach( $first_row_title as $row_data_post ){                            
                            echo '<div class="inner">'.get_the_title( $row_data_post->ID ).'</div>';                  
                        } 
                        
                        $datas_formacao = array();
                        echo '<div class="drop-inner" style="display:none;">';
                        echo '<ul>';
                        while( have_rows('horario_formacao') ) {
                            the_row();
                            $horario = get_sub_field('horario');
                            
                            if (get_sub_field('data')!=''){
                                array_push($datas_formacao, get_sub_field('data'));    
                            }
                            
                            
                            
                            foreach( $horario as $row_horario ){
                                
                                    echo "<li>".get_the_title( $row_horario->ID )."</li>";
                            }
                        }                 
                        echo '</ul>';
                        echo '</div>';
                    }
                ?>
            </div>

            <div class="cols <?php echo $col_drop; ?>">
                <?php
                if( $rows_horarios && ($data_ini!='')){
                    if ($data_fim==''){
                        $mes_ini_texto = getMes($formacao_format_ini->format('m'));
                        echo '<div class="inner">'.$dia_formacao_ini.' '.$mes_ini_texto.'</div>';
                    }else{
                        echo '<div class="inner">'.$dia_formacao_ini.' '.$mes_ini_texto.' - '.$dia_formacao_fim.' '.$mes_fim_texto.'</div>';
                    }
                }
                ?>
                <div class="drop-inner" style="display:none;">
                    <ul>
                        <?php                         
                            foreach( $datas_formacao as $row_datas ){
                                
                                $data_formacao = DateTime::createFromFormat('d/m/Y', $row_datas);
                                $dia_formacao_drop = $data_formacao->format('d');
                                $mes_formacao_texto = getMes($data_formacao->format('m'));
                                
                                echo '<li>'.$dia_formacao_drop.' '.$mes_formacao_texto.'</li>';
                            }                        
                        ?>

                    </ul>
                </div>
            </div>
            <div class="cols download-icon">
                <div class="inner"><a href="<?php echo $info_documento; ?>">Descarregar programa </a></div>
            </div>
            <div class="cols col-btn class-<?php echo $tipo_formacao_class;?>">Pedir informação</div>
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
            <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1"><small
                    class="text-muted reveal-block"><?php echo $muted_text_visao_geral; ?></small>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1">
                <h2 class="intro reveal-block"><?php echo $title_visao_geral; ?></h2>
            </div>
            <div class="col-md-8 col-md-offset-0 col-sm-10 col-sm-offset-1">
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
            <div class="col-md-4 col-md-offset-0 pad0 col-sm-5 col-sm-offset-1">
                <div class="intro img-wrapper">
                    <img src="<?php echo $tipo_formacao_certificado; ?>">
                </div>
            </div>
            <div class="col-md-8 col-sm-5 col-sm-offset-0">
                <h4>Curso certificado pela DGERT</h4>
                <p>A certificação é entregue aos alunos em formato digital. Inclui a carga horária, modular e total, do
                    curso temáticas, notas finais de cada módulo e média final do curso, certificação DGERT, carimbo e
                    assinatura da coordenação pedagógica do programa ou administração da escola.</p>
            </div>
        </div>
    </div>
</section>

<!--PROGRAMA-->
<section class="programa bg-black">
    <div class="container">
        <div class="row reveal-block">
            <div class="col-md-12 col-md-offset-0  col-sm-10 col-sm-offset-1">
                <h1>Programa</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-offset-0 col-sm-10 col-sm-offset-1 col-offset-right-1">
                <?php 
                        $programa = get_field('programa');
                        if( $programa ){
                            $texto_apresentacao = $programa['texto_apresentacao'];
                        }
                        ?>
                <p class="reveal-block"><?php echo $texto_apresentacao; ?></p>
            </div>
            <div class="col-md-8 col-md-offset-0  col-sm-10 col-sm-offset-1">
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
                                            </div>';
                                    
                                    $items_programa = $row['item'];
                                    $j = 1;
                                    
                                    echo '<div class="row sp-60">';
                                    foreach( $items_programa as $row_item ) {
                                    $j++;
                                    
                                    echo '<div class="col-sm-6">
                                            <p class="list-title">'.$row_item['titulo'].'</p>
                                                '.$row_item['texto'].'                        
                                            </div>';
                                        
                                        $muliplo = $j % 2;
                                        if ($muliplo !== 0){
                                            echo '</div><div class="row sp-60">';
                                        }
                                    }
                                    echo '<!--end row item-->';
                                    echo '</div>';
                                
                                echo '<!--end text-block-->';
                                echo '</div>';
                                }
                            }                           
                        }
                        ?>
            </div>
        </div>
        <div class="row ferramentas">
            <div class="col-md-12 col-md-offset-0  col-sm-10 col-sm-offset-1">
                <h3 class="reveal-block"><?php echo get_field('titulo_ferramentas'); ?></h3>
            </div>
            <div class="col-md-12 col-md-offset-0   col-sm-10 col-sm-offset-1">
                <div class="row grid-sp-40 logos-grid reveal-block">
                    <?php
                            $ferramentas = get_field('ferramentas_de_trabalho');
                            if( $ferramentas ) {
                                foreach( $ferramentas as $row_ferramentas ) {
                        
                            ?>

                    <div class="col-md-3 col-sm-6 col-xs-6">
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
                            <a href="<?php echo $banner_link_url; ?>"
                                class="btn btn-<?php echo $tipo_formacao_class;?>"><?php echo $banner_link_title; ?></a>
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
            <div class="col-md-12 col-md-offset-0   col-sm-10 col-sm-offset-1">
                <small class="text-muted reveal-block">PROJETO 360º - <?php echo $titulo_projecto; ?></small>
            </div>
            <div class="col-md-4 col-md-offset-0   col-sm-10 col-sm-offset-1">
                <h2 class="intro reveal-block"><?php echo $subtitulo_projecto; ?></h2>
            </div>
            <div class="col-md-8 col-md-offset-0  col-sm-10 col-sm-offset-1">
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
                            $link_cliente_360 = get_field('link', $clientes_360->ID);
                        ?>

            <div class="col-md-3 col-sm-6 col-xs-6">
                <a href="<?php echo $link_cliente_360; ?>" target="_blank">
                    <img src="<?php echo $imagem_cliente_360; ?>">
                </a>
                <!-- <div class="adaptImage">
                    <div class="adaptImage__inner">
                        <div class="adaptImage__aspect">
                        </div>
                    </div>
                </div> -->
            </div>

            <?php
                            }
                        }
                        ?>
        </div>
        <div class="video-vimeo">
            <iframe src="<?php echo $video_projecto;?>" width="100%" height="640" frameborder="0"
                allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</section>
<script>
jQuery(document).ready(function() {
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
        endTrigger: "html",
        end: "bottom top",
        toggleClass: "sticky_info",
        onEnter: () => show_btn(),
        onLeaveBack: () => hide_btn(),
        pinSpacing: false,
        scrub: 1
    });

    function show_btn() {
        jQuery('.headerDesktop__contact').css("opacity", "0");
        jQuery('.headerDesktop__inCompany').toggleClass('right');
    }

    function hide_btn() {
        jQuery('.headerDesktop__contact').css("opacity", "1");
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
            <div class="col-md-4 col-md-offset-0  col-sm-10 col-sm-offset-1"><small
                    class="text-muted"><?php echo $muted_text; ?></small></div>
        </div>
        <div class="row reveal-block mb-85">
            <div class="col-md-4 col-md-offset-0  col-sm-10 col-sm-offset-1">
                <h2 class="section-title"><?php echo $titulo; ?></h2>
            </div>
            <div class="col-md-8 col-md-offset-0  col-sm-10 col-sm-offset-1">
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
            <div class="col-md-4 col-md-offset-0  col-sm-10 col-sm-offset-1"><small
                    class="text-muted"><?php echo $muted_text; ?></small></div>
        </div>
        <div class="row mb-85 reveal-block">
            <div class="col-md-4 col-md-offset-0  col-sm-10 col-sm-offset-1">
                <h2 class="section-title"><?php echo $titulo; ?></h2>
            </div>
            <div class="col-md-8 col-md-offset-0  col-sm-10 col-sm-offset-1">
                <p><?php echo $texto; ?></p>
            </div>
        </div>
    </div>
    <?php get_template_part( 'template-parts/alumni', 'slider' ); ?>
</section>

<section class="course-faq">
    <div class="container">
        <div class="row reveal-block">
            <div class="col-md-12 col-md-offset-0  col-sm-10 col-sm-offset-1">
                <h1 class="text-white">Perguntas frequentes</h1>
            </div>
        </div>
        <div class="row row-faq reveal-block">
            <div class="col-md-6 col-md-offset-0  col-sm-10 col-sm-offset-1">
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
            <div class="col-md-6 col-md-offset-0  col-sm-10 col-sm-offset-1">
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
        if( $contacto_informacao ){
            foreach($contacto_informacao as $elemento_info){
            
                if ($elemento_info['localizacao'][0]->ID==$localizacao_id){
                   
                   
                   $id_elemento =  $elemento_info['elemento'][0]->ID; 
                   ///echo $nome = get_field('nome', $id_elemento);
                   $foto_contacto = get_field('foto', $id_elemento);
                   
                }
                
            }
        }

        if($tipo_formacao_class!='remote-learning'){
            $tipo_formacao_class = 'curso';
        }
        ?>
<section class="course-contact">
    <div class="container">
        <div class="row is-flex v-center">
            <div class="col-md-12">
                <div class="contact-form inner-border reveal-block">
                    <div class="col-md-4">
                        <div class="box-circle">
                            <div class="inner-border"
                                style="background-image: url(<?php echo $foto_contacto['url']; ?>)">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-center text-left">
                        <div class="center-cell">
                            <h3>Ajudamos-te a escolher o curso certo</h3>
                            <p>Estamos disponíveis para te orientar e ajudar-te a tomar a melhor decisão.</p>
                            <a href="#" class="btn btn-<?php echo $tipo_formacao_class;?>">Enviar mensagem</a>
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