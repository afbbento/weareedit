<div class="alumni-slider reveal-block">
    <div class="swiper-alumni">
        <div class="swiper-wrapper">
            <?php
            $seccao_alumni = get_field('seccao_alumni');
                if( $seccao_alumni ){
                    
                    $alumni = $seccao_alumni['alumni'];
                    if($alumni){
                        foreach($alumni as $story){
                            $link_story = get_permalink( $story->ID );
                            
                            if(get_field('fundo_header', $story->ID)){                                                       
                                $foto = get_field('fundo_header', $story->ID);                                                          
                            }
                            if(get_field('home_titulo', $story->ID)){                                                       
                                $name = get_field('home_titulo', $story->ID);
                            }
                            if(get_field('home_description', $story->ID)){                                                       
                                $descricao_alumni = get_field('home_description', $story->ID);
                            }
                            if(get_field('logo_empresa', $story->ID)){                                                       
                                $logo_empresa = get_field('logo_empresa', $story->ID);
                            }
                            
                           

            ?>
            <div class="swiper-slide">
                <div class="row is-flex v-center">
                    <div class="col-md-6 pad0 slider-img">
                        <div style="background-image:url(<?php echo $foto;?>)">
                        </div>
                    </div>
                    <div class="col-md-6 slider-text">
                        <h3 class="text-white">“
                        <?php 
                         if(get_field("blocos", $story->ID)){
                                
                                $blocos_stories = get_field("blocos", $story->ID);
                                    foreach($blocos_stories as $blocos_storie){
                                        $tipo_bloco =  $blocos_storie['tipo_de_bloco'];
                                            foreach($tipo_bloco as $tipos_blocos){
                                                $block_quote = $tipos_blocos['blockquote'];    
                                                    echo $block_quote;
                                            }
                                    }
                                                                                    
                            }
                        ?>”</h3>
                        <div class="name"><?php echo $name; ?></div>
                        <p><?php echo $descricao_alumni; ?></p>
                        <div>
                            <img src="<?php echo $logo_empresa;?>">
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                }                                    
            }
            ?>

        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<script>
        var swiper = new Swiper('.swiper-alumni', {
        slidesPerView: 1,
        speed: 1000,
        spaceBetween: 30,
        centeredSlides: true,
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
                spaceBetween: 20
            },
            768: {                
                spaceBetween: 30
            },
        }
        });
    </script>