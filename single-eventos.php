<?php
/*
 * Eventos Single
 * @package Weareedit
 */


get_header();

?>
<div class="head">
    <div class="container">

        <?php
            $area = get_field('area');
            if( $area ) {
                foreach( $area as $row_area ) {
                    $titulo_area = get_the_title( $row_area->ID );
                }
            }
        ?>

        <div class="col-md-12 col-sm-10 col-sm-offset-1">
            <ul class="breadcrumb reveal-block text-yellow">
                <li class="logo-formacao"><img src="<?php echo get_template_directory_uri(); ?>/img/formacao.svg"></li>
                <li><a href="/eventos/">Eventos</a></li>
                <li><a href="#"><?php echo $titulo_area; ?></a></li>
            </ul>
            <h1 class="reveal-block"><?php the_field('titulo'); ?></h1>
        </div>

        <div class="col-md-12 col-sm-10 col-sm-offset-1">
            <div class="formacao-info ">
                <div class="row reveal-block">
                    <?php 
                $duracao = get_field('duracao');
                $preco = get_field('preco');
                $horarios = get_field('horarios');
                
                $fundo_header = get_field('fundo_header');
                ?>
                    <?php
                        $localizacao = get_field('localizacao');
                        if( $localizacao ) {
                            foreach( $localizacao as $row_localizacao ) {
                                $titulo_localizacao = get_the_title( $row_localizacao->ID );
                            }
                        }
                    ?>
                    <div class="col-xs-3 col-md-2">
                        <label>local</label>
                        <div class="value"><?php echo $titulo_localizacao;?></div>
                    </div>
                    <div class="col-xs-3 col-md-2">
                        <label>duração</label>
                        <div class="value"><?php echo $duracao; ?></div>
                    </div>
                    <div class="col-xs-3 col-md-2">
                        <label>INVESTIMENTO</label>
                        <div class="value"><?php echo $preco; ?></div>
                    </div>
                    <div class="col-xs-5 col-md-3">
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
            <div class="cols vagas">
                <?php
                    $vagas_totais = get_field('vagas_totais');
                    $vagas_ocupadas = get_field('vagas_ocupadas');
                    $programa_download = get_field('programa_download');
                    $fundo_header = get_field('fundo_header');
                ?>
                <div class="inner"><?php echo $vagas_ocupadas; ?> / <span><?php echo $vagas_totais; ?></span> Vagas</div>    
            </div>

            <?php
                if( get_field('tipo_de_datas') == 'inicio_fim' ) {
                    $evento_inicio = get_field('data_inicio');
                    $evento_inicio_format = DateTime::createFromFormat('Ymd', $evento_inicio);
                    $evento_fim = get_field('data_fim');
                    $evento_fim_format = DateTime::createFromFormat('Ymd', $evento_fim); 
                    
                    $dia_evento_ini = $evento_inicio_format->format('d');
                    $mes_evento_ini = $evento_inicio_format->format('m');
                    $dia_evento_fim = $evento_fim_format->format('d');
                    $mes_evento_fim = $evento_fim_format->format('m');

                    $mes_ini_texto = substr(getMes($mes_evento_ini), 0, 3);

                    if ($evento_inicio_format==$evento_fim_format){
                        //DATA UNICA
                        $data_evento =  $dia_evento_ini." ".getMes($mes_evento_ini);
                    }else{
                        //RANGE ex: 10 Mar - 23 Jul
                        $mes_fim_texto = substr(getMes($mes_evento_fim), 0, 3);
                        $data_evento = $dia_evento_ini.' '.$mes_ini_texto.' - '.$dia_evento_fim.' '.$mes_fim_texto;

                    }

                    echo '<div class="cols">                           
                            <div class="inner">'.$data_evento.'</div>                            
                        </div>';
                }
                if( get_field('tipo_de_datas') == 'multiplas' ) {
                    echo '<div class="cols drop">                           
                        <div class="inner">10 Mar - 23 Jul</div>
                        <div class="drop-inner" style="display:none;">                    
                            <ul>
                                <li>10 Mar</li>
                                <li>23 Jul</li>
                            </ul>
                        </div>
                    </div>';
                }
                
                ?>
           
            <div class="cols download-icon">
                <div class="inner"><a href="<?php echo $programa_download['url']; ?>">Descarregar programa </a></div>
            </div>
            <div class="cols col-btn">Participar</div>
        </div>
    </div>
</div>

<div class="hero">   
        <div class="about-image" style="background-image:url(<?php echo $fundo_header; ?>)"></div>
        </div>
        <section class="about">
            <div class="bleeded grey">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4"><small class="text-muted ">SOBRE O EVENTO</small></div>
                    </div>
                    <div class="row reveal-block">
                        <div class="col-md-4">    
                            <h2 class="section-title">Como uma estratégia criativa pode impulsionar a tua marca</h2>
                        </div>
                        <div class="col-md-8">
                            <div class="row sp-60">
                                <div class="col-sm-6"><p>A EDIT. foi fundada por profissionais da indústria interativa/digital, e aplica um modelo de formação inovador e dinâmico, pensado para acompanhar a rápida evolução do setor. Localizada em Lisboa, Porto e Madrid, promove a cooperação entre os alunos e as agências interativas e digitais nacionais e internacionais. </p></div>
                                <div class="col-sm-6"><p>Estes parceiros participam na adequação dos conteúdos programáticos dos cursos da EDIT. às necessidades reais do mercado, sendo esta a melhor forma de conceder aos alunos uma educação moderna e competitiva.</p></div>
                            </div>
                            <hr class="light-grey">
                            <div class="row counting-numbers-row">
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <div class="counting-numbers"><span class="Count">1000</span>+</div>
                                    <p class="text-white">Alunos em formação</p>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <div class="counting-numbers"><span class="Count">200</span>+</div>
                                    <p class="text-white">Tutores ativos</p>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <div class="counting-numbers"><span class="Count">10</span>+</div>
                                    <p class="text-white">Agências parceiras</p>
                                </div>
                            </div>                           
                        </div>
                    </div>                       
                </div>
            </div>
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
            <div class="row reveal-block">
                <div class="col-md-4 col-sm-offset-1 col-md-offset-0 col-xs-offset-1"><small
                        class="text-muted"><?php echo $muted_text; ?></small></div>
            </div>
            <div class="row reveal-block mb-85">
                <div class="col-md-4 col-sm-offset-1 col-md-offset-0 col-xs-offset-1">
                    <h2 class="section-title"><?php echo $titulo; ?></h2>
                </div>
                <div class="col-sm-11 col-md-8 col-sm-offset-1 col-md-offset-0 col-xs-offset-1">
                    <p><?php echo $texto; ?></p>
                </div>
            </div>
            <?php get_template_part( 'template-parts/equipa' ); ?>
        </div>
    </section>


<!--PROGRAMA-->
<section class="programa bg-black">
    <div class="container">
        <div class="row reveal-block">
            <div class="col-md-12 col-sm-11 col-sm-offset-1">
                <h1>Programa</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-11 col-sm-offset-1 col-offset-right-1">
                <?php 
                    $texto_programa_evento = get_field('texto_programa_evento');            
                ?>
                <p class="reveal-block"><?php echo $texto_programa_evento; ?></p>
            </div>
            <div class="col-md-8 col-sm-11 col-sm-offset-1">
                <?php
                $bloco_horario = get_field('bloco_horario');
                if( $bloco_horario ){
                    foreach( $bloco_horario as $row_bloco_horario ) {
                        
                    echo '<div class="text-block-container reveal-block event-time-block">
                            <div class="row sp-60">
                                <div class="col-sm-12">
                                    <h4 class="border"><span class="event-time">'.$row_bloco_horario["hora"].'</span>'.$row_bloco_horario["titulo"].'</h4>';

                                    $bloco_programa_detalhe = $row_bloco_horario['bloco_programa_detalhe'];
                                    foreach( $bloco_programa_detalhe as $row_horario_detalhe ) {
                                        echo '<span class="event-detail-label">'.$row_horario_detalhe["label_item"].'</span>';
                                        echo '<span class="event-detail-text">'.$row_horario_detalhe["texto_detalhe"].'</span>';
                                    }
                    echo '</div>                         
                        </div>
                    </div>';
                
                    
                    }
                }
                ?>
            </div>
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


<!--RELACIONADOS-->
<?php get_template_part( 'template-parts/relacionados' ); ?>


<?php get_footer(); ?>