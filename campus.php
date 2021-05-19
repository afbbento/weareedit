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
                    <li><h2><a href="#">Sobre nós</a></h2></li>
                </ul>
                <div class="row">
                    <div class="col-md-12">    
                        <h1>Campus</h1>
                        <h2>A EDIT. tem como constante preocupação a empregabilidade dos seus alunos. </h2>
                    </div>
                </div>
                <div class="row grid-sp-40 hero-menu">
                    <?php get_template_part( 'template-parts/menu', 'escola' ); ?>
                </div>
            </div>
        </div>
        <section class="split-bg split-black-grey campus-locations">
            <div class="container">
                <div class="location-container">
                    <h1 class="title">Lisboa</h1>
                    <h2 class="address">
                        Alameda D. Afonso Henriques, 7A<br>
                        1900-178, Lisboa <br>
                        +351 210 182 455<br>
                        geral@edit.com
                    </h2>
                    <a href="#" class="btn btn-yellow">Google Maps</a>
                </div>
            </div>
        </section>

        <section class="campus-locations">
            <div class="container">
                <div class="location-container">
                    <h1 class="title">Porto</h1>
                    <h2 class="address">
                        Rua Alferes Malheiro, 226<br>
                        4000-057, Porto <br>
                        +351 224 960 345 <br>
                        geral@edit.com
                    </h2>
                    <a href="#" class="btn btn-yellow">Google Maps</a>
                </div>
            </div>
        </section>
        
        <section class="parceiros">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><h3>Parceiros e clientes</h3></div>
                </div>
                <div class="row grid-sp-40 logos-grid">
                    <div class="col-xs-6  col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/burocratik-transp.png">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/burocratik-transp.png">
                        </div>
                    </div>
                   <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/burocratik-transp.png">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/burocratik-transp.png">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/burocratik-transp.png">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/burocratik-transp.png">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/burocratik-transp.png">
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-sm-6">
                        <div class="grid-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/burocratik-transp.png">
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

<?php get_footer(); ?>