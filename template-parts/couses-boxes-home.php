<div class="courses-container split-bg black-dark-grey">
    <div class="row">
        <div class="col-md-12 col-md-offset-0 col-sm-offset-1 col-xs-offset-1 ">
            <div class="swiper-boxes">
                <div class="swiper-wrapper">

                    <?php
                    
                        $formacao_destaque = get_field('formacao_destaque');
                        
                        if( $formacao_destaque ){
                            foreach($formacao_destaque as $destaque_row){
                                        
                                $link_formacao = get_permalink( $destaque_row->ID );
                                $titulo_formacao = get_field('titulo', $destaque_row->ID);
                                $tipo_formacao = get_field('tipo_formacao', $destaque_row->ID);
                                
                                $data_formacao ='';
                                $data_formacao = get_field('home_data', $destaque_row->ID);
                                if ($data_formacao){
                                    $formacao_data_format = DateTime::createFromFormat('d/m/Y', $data_formacao);
                                    $dia_formacao_ini = $formacao_data_format->format('j');
                                    $mes_formacao = getMes($formacao_data_format->format('m'));
                                }
                                
                                
                                $localizacao_formacao = get_field('localizacao', $destaque_row->ID);
                                if( $localizacao_formacao ){     
                                    foreach($localizacao_formacao as $localizacao_row){
                                        $localizacao_formacao = get_the_title( $localizacao_row->ID );
                                        $localizacao_id = $localizacao_row->ID;
                                    }
                                }

                                if( $tipo_formacao ){
                                    foreach( $tipo_formacao as $tipo_formacao_row ){
                                        $titulo_tipo_formacao = get_the_title( $tipo_formacao_row->ID );
                                        $tipo_formacao_bg = get_field( 'imagem_background', $tipo_formacao_row->ID );
                                        $tipo_formacao_icon = get_field( 'icon', $tipo_formacao_row->ID );
                                    }
                                    
                                }
                              
                    ?>
                    <div class="swiper-slide">
                        <a href="<?php echo $link_formacao; ?>">
                            <div class="slide-bg">
                                <img src="<?php echo $tipo_formacao_bg; ?>">
                            </div>
                            <div class="slide-inner">
                                <div class="course-icon"><img
                                        src="<?php echo $tipo_formacao_icon; ?>"></div>
                                <div class="course-text">
                                    <div class="course-category"><?php echo $titulo_tipo_formacao; ?>
                                    </div>
                                    <div class="course-title"><?php echo $titulo_formacao; ?></div>
                                </div>
                                <div class="course-view">
                                    <span><?php echo $dia_formacao_ini." de ".$mes_formacao.", ".$localizacao_formacao; ?></span>
                                    <span>Ver curso</span>
                                </div>
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
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
</div>
<script>
var swiper = new Swiper('.swiper-boxes', {
    slidesPerView: 4,
    slidesPerGroup: 2,
    speed: 500,
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
            slidesPerGroup: 1
        },
        768: {
            slidesPerView: 2,
            slidesPerGroup: 1,
            slidesPerView: 'auto',
            spaceBetween: 35
        },
        1024: {
            slidesPerGroup: 2,
            slidesPerView: 'auto'
        },
        1200: {
            slidesPerGroup: 2,
            slidesPerView: 4,
            spaceBetween: 20
        }
    }
});
</script>