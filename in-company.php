<?php
/**
* Template Name: In-Compay
*
* @package weareedit
* @subpackage weareedit
* @since weareedit
*/

get_header();

?>
<div class="hero">   
    <div class="container">
        <div class="row reveal-block">
            <div class="col-md-12">    
                <h1>In-Company</h1>
                <p>Formação ajustada à realidade das empresas, das suas necessidades e destinada a melhorar a performance profissional da sua equipa.</p>
                <a href="#" class="btn btn-yellow">Perguntas Frequentes</a>
            </div>
        </div>                
    </div>
    <div class="about-image" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/banner-sobre-nos@2x.jpg)"></div>
</div>
        <section class="about">
            <div class="bleeded grey">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4"><small class="text-muted ">FORMAÇÃO IN-COMPANY</small></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">    
                            <h2 class="reveal-block section-title">Formação à medida para empresas nacionais e estrangeiras </h2>
                        </div>
                        <div class="col-md-8">
                            <div class="text-block-container">
                                <div class="row sp-60">
                                    <div class="col-sm-6">
                                        <p>A formação é concebida de acordo com as necessidades específicas diagnosticadas e ministradas exclusivamente aos colaboradores das empresas, em grupos e podendo ainda ser one-to-one.</p>                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <p>A empresa pode optar entre frequentar a formação em horário laboral ou pós laboral nas suas próprias instalações, nas instalações da EDIT. ou em instalações contratadas. Prestamos os serviços de formação à medida em todo o país e no estrangeiro.</p>                                        
                                    </div> 
                                </div>
                            </div>
                            
                            <div class="text-block-container">
                                <div class="row sp-60">
                                    <div class="col-md-12">
                                        <h4 class="text-white border">Sobre a EDIT.</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="highlight">A EDIT. – Disruptive Digital Education, é uma escola dedicada às áreas do Design Digital, Criatividade, Desenvolvimento Tecnológico & Mobile e Marketing Digital, localizada em Lisboa, Porto e Madrid.</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>As aulas têm um foco assente na componente prática, com a realização de projetos individuais e em grupo, análise de case studies, workshops temáticos e inside knowledge dos tutores e oradores convidados, profissionais de renome na indústria web e digital.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-block-container">
                                <div class="row sp-60">
                                    <div class="col-md-12">
                                        <h4 class="text-white border">Sobre a EDIT.</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="highlight">A EDIT. – Disruptive Digital Education, é uma escola dedicada às áreas do Design Digital, Criatividade, Desenvolvimento Tecnológico & Mobile e Marketing Digital, localizada em Lisboa, Porto e Madrid.</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>As aulas têm um foco assente na componente prática, com a realização de projetos individuais e em grupo, análise de case studies, workshops temáticos e inside knowledge dos tutores e oradores convidados, profissionais de renome na indústria web e digital.</p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p><a href="#" class="btn full-width">Perguntas Frequentes</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                       
                </div>
            </div>
        </section>
       

        

        <div class="split-bg black-grey">
        <section class="parceiros bleeded">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><h3>Parceiros de formação</h3></div>
                </div>
                <div class="row grid-sp-40 logos-grid">
                    <div class="col-xs-6  col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo_burok.jpg">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo_burok.jpg">
                        </div>
                    </div>
                   <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo_burok.jpg">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo_burok.jpg">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo_burok.jpg">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo_burok.jpg">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo_burok.jpg">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo_burok.jpg">
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        </div> 
        <section class="block-main-content bg-light-grey">
            <div class="grey">
                <div class="container">
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
                                            class="btn btn-yellow"><?php echo $banner_link_title; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><small class="text-muted ">PORQUÊ A DEN?</small></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">    
                            <h2 class="reveal-block section-title">Estar a par da atualidade e das verdadeiras tendências da indústria digital.</h2>
                        </div>
                        <div class="col-md-8">
                            
                            <div class="text-block-container">
                                <div class="row sp-60">
                                    <div class="col-sm-12">
                                        <p>Promovemos o envolvimento direto das agências interativas e de marketing digital nacionais, que são nossas parceiras, na consultoria e adequação dos conteúdos dos nossos programas, o que nos permite estar a par da atualidade e das verdadeiras tendências da indústria digital.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-block-container">
                                <div class="row sp-60">
                                    <div class="col-md-12">
                                        <h4 class="text-white border">Evento anual</h4>
                                    </div>
                                    <div class="col-sm-12">
                                        <p>Um evento anual organizado pela EDIT., que permite colocar os participantes a a falar da atualidade e das tendências da indústria digital. Aqui, serão abordados sob dois prismas essenciais:</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>
                                            <span class="highlight">Recrutamento</span><br>
                                                Ao saber o que procuram as marcas e
                                                agências no mercado, qual a seleção
                                                efetuada e perfis ideais de candidatos, que
                                                dificuldades encontram e quais as principais
                                                áreas de recrutamento.
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><span class="highlight">Pedagogia e ensino</span><br>                                    
Foco principal é a aproximação ao mercado e às diferentes áreas de ensino dentro da escola, a abordagem de novas metodologias para as práticas educativas e a exposição de tendências e novos paradigmas.</p>
                                    </div>         
                                    <div class="col-sm-12">
                                        <p>Deste modo será promovida uma sinergia educação-indústria única, com a garantia de que as formações estão atualizadas e vão efetivamente de encontro ao mercado nos dias de hoje.</p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>                       
                </div>
            </div>
        </section>

        
        
        <!--TUTORES SECTION-->
        <?php include 'equipa.php' ?>

<?php get_footer(); ?>