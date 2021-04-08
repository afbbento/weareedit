<div class="courses-container split-bg black-dark-grey">
                <div class="row">
                    <div class="col-md-12">
                <!--SLIDER ALUMNI-->
                
                <div class="swiper-boxes">
                    <div class="swiper-wrapper">
                        
                    <?php
                    
                    if(get_field('slider_cursos')){
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
                        //$posts_slider = $the_query->get_posts();
                        
                         
                        if ( $the_query->have_posts() ) { 
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post(); 
                                 
                                $tipo_formacao_array = get_field('tipo_formacao');
                                $tipo_formacao_array[0]->post_title;
                                $tipoFormacao = get_field('tipo_formacao');
                                $icon = get_field('icon',$tipoFormacao[0]);
                                $cssClassType = get_field('class',$tipoFormacao[0]);
                                echo $tipo_formacao_array[0]->post_title; 
                
                           
                    ?>
                        <div class="swiper-slide tipo-curso">
                            <a href="<?php echo get_permalink(); ?>">
                            <div class="slide-bg">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/bg-curso.svg">
                            </div>
                            <div class="slide-inner">
                                <div class="course-icon"><img src="<?php echo get_template_directory_uri(); ?>/img/curso.svg"></div>
                                <div class="course-text">
                                    <div class="course-category"><?php echo $tipo_formacao_array[0]->post_title; ?></div>
                                    <div class="course-title text-black"><?php the_field('home_titulo');?></div>
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
                    }
                    ?>
                        <div class="swiper-slide text-white">
                            <div class="slide-bg">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/bg-curso-intensivo.svg">
                            </div>
                            <div class="slide-inner">
                                <div class="course-icon"><img src="<?php echo get_template_directory_uri(); ?>/img/curso-intensivo.svg"></div>
                                <div class="course-text">
                                    <div class="course-category">Curso Intensivo</div>
                                    <div class="course-title">Ecommerce Marketing Strategy & Growth</div>
                                </div>
                                <div class="course-view">
                                    <span>Ver curso</span>
                                </div>
                            </div>                            
                        </div>
                        <div class="swiper-slide tipo-remote text-white">
                            <div class="slide-bg">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/bg-remote.svg">
                            </div>
                            <div class="slide-inner">
                                <div class="course-icon"><img src="<?php echo get_template_directory_uri(); ?>/img/remote-learning.svg"></div>
                                <div class="course-text">
                                    <div class="course-category">Curso</div>
                                    <div class="course-title">Front-End Development</div>
                                </div>
                                <div class="course-view">
                                    <span>Ver curso</span>
                                </div>
                            </div>                            
                        </div>
                        <div class="swiper-slide tipo-curso">
                            <div class="slide-bg">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/bg-curso.svg">
                            </div>
                            <div class="slide-inner">
                                <div class="course-icon"><img src="<?php echo get_template_directory_uri(); ?>/img/curso.svg"></div>
                                <div class="course-text">
                                    <div class="course-category">Curso</div>
                                    <div class="course-title text-black">Front-End Development</div>
                                </div>
                                <div class="course-view">
                                    <span>Ver curso</span>
                                </div>
                            </div>                            
                        </div>
                        <div class="swiper-slide tipo-curso-intensivo text-white">
                            <div class="slide-bg">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/bg-curso-intensivo.svg">
                            </div>
                            <div class="slide-inner">
                                <div class="course-icon"><img src="<?php echo get_template_directory_uri(); ?>/img/curso-intensivo.svg"></div>
                                <div class="course-text">
                                    <div class="course-category">Curso Intensivo</div>
                                    <div class="course-title">Ecommerce Marketing Strategy & Growth</div>
                                </div>
                                <div class="course-view">
                                    <span>Ver curso</span>
                                </div>
                            </div>                            
                        </div>
                        <div class="swiper-slide tipo-remote text-white">
                            <div class="slide-bg">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/bg-remote.svg">
                            </div>
                            <div class="slide-inner">
                                <div class="course-icon"><img src="<?php echo get_template_directory_uri(); ?>/img/remote-learning.svg"></div>
                                <div class="course-text">
                                    <div class="course-category">Curso</div>
                                    <div class="course-title">Front-End Development</div>
                                </div>
                                <div class="course-view">
                                    <span>Ver curso</span>
                                </div>
                            </div>                            
                        </div>
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
                slidesPerView:'auto',
                spaceBetween: 35
            },
            1024: {
                slidesPerGroup: 2,
                slidesPerView:'auto'
            },
            1200: {
                slidesPerGroup: 2,
                slidesPerView: 4,
                spaceBetween: 20
            }
        }
        });
    </script>