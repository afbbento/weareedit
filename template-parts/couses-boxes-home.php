<div class="courses-container split-bg black-dark-grey">
    <div class="row">
        <div class="col-md-12 col-md-offset-0 col-sm-offset-1 col-xs-offset-1 ">
            <div class="swiper-boxes">
                <div class="swiper-wrapper">

                    <?php
                    
                        $date = date('Ymd');
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
                        $ids = get_field('slider_cursos', false, false);
                        
                        $the_query = new WP_Query(array(
                            'post_type'         => array('formacao'),
                            'post__in'          => $ids,
                            'post_status'       => 'publish',
                            'orderby'           => 'meta_value',
                            'meta_query'        => $meta_query,
                            'meta_key'          => 'home_data',
                            'order'             => 'ASC'
                        ));
                       
                       if ( $the_query->have_posts() ) { 
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post(); 
                                 
                                $tipo_formacao_array = get_field('tipo_formacao');
                                $tipo_formacao_array[0]->post_title;
                                $tipoFormacao = get_field('tipo_formacao');
                                $icon = get_field('icon',$tipoFormacao[0]);
                                $cssClassType = get_field('class',$tipoFormacao[0]);
             

                                if( $tipoFormacao ){
                                    foreach( $tipoFormacao as $tipo_formacao_row ){
                                        $link_tipo_formacao = get_permalink( $tipo_formacao_row->ID );
                                        $titulo_tipo_formacao = get_the_title( $tipo_formacao_row->ID );
                                        $tipo_formacao_bg = get_field( 'imagem_background', $tipo_formacao_row->ID );
                                        $tipo_formacao_icon = get_field( 'icon', $tipo_formacao_row->ID );
                                        $tipo_formacao_class = get_field( 'class', $tipo_formacao_row->ID );
                                        
                                    }
                                    
                                }
                              
                    ?>
                    <div class="swiper-slide">
                        <a href="<?php echo get_permalink(); ?>">
                            <div class="slide-bg">
                                <img src="<?php echo $tipo_formacao_bg; ?>">
                            </div>
                            <div class="slide-inner">
                                <div class="course-icon"><img
                                        src="<?php echo $tipo_formacao_icon; ?>"></div>
                                <div class="course-text">
                                    <div class="course-category"><?php echo $tipo_formacao_array[0]->post_title; ?>
                                    </div>
                                    <div class="course-title"><?php the_field('home_titulo');?></div>
                                </div>
                                <div class="course-view">
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