<section class="relacionados">
    <div class="container">
        <div class="row reveal-block">
            <div class="col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1">
                <h2>Relacionados</h2>
            </div>
        </div>
        <div class="row reveal-block">
            <div class="col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1">
                <div class="related-header">
                    <h3>Formação</h3>
                    <a href="#">Ver todas</a>
                </div>
            </div>
        </div>
        <div class="row row-related related-formacao reveal-block">
            <?php
                    $formacao_relacionada = get_field('formacao_relacionada');
                    if( $formacao_relacionada ){
                        foreach($formacao_relacionada as $formacao_row){
                            
                            $link_relacionado_formacao = get_permalink( $formacao_row->ID );
                            $titulo_relacionado_formacao = get_field('titulo', $formacao_row->ID);
                            $tipo_formacao = get_field('tipo_formacao', $formacao_row->ID);

                            if( $tipo_formacao ){
                                foreach( $tipo_formacao as $tipo_formacao_row ){
                                    $link_tipo_formacao = get_permalink( $tipo_formacao_row->ID );
                                    $titulo_tipo_formacao = get_the_title( $tipo_formacao_row->ID );
                                    $tipo_formacao_bg = get_field( 'imagem_background', $tipo_formacao_row->ID );
                                    $tipo_formacao_icon = get_field( 'icon', $tipo_formacao_row->ID );
                                    
                                }
                                
                            }
                            if ($titulo_tipo_formacao=='curso'){
                                $text_color = "curso-geral";
                            }else{
                                $text_color = "";
                            }
                    
                    ?>
            <div class="col-md-3 col-sm-6 <?php echo $text_color; ?>">
                <div class="course-icon">
                    <img src="<?php echo $tipo_formacao_icon; ?>">
                </div>
                <div class="course-text">
                    <div class="course-category"><a href="#"><?php echo $titulo_tipo_formacao; ?></a></div>
                    <div class="course-title"><a
                            href="<?php echo $link_relacionado_formacao; ?>"><?php echo $titulo_relacionado_formacao; ?></a>
                    </div>
                </div>
                <img src="<?php echo $tipo_formacao_bg; ?>">
            </div>

            <?php
                        }
                    }
                    ?>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1">
                <div class="row row-related reveal-block">
                    <div class="col-md-6 ">
                        <div class="related-header">
                            <h3>Profissões</h3>
                            <a href="#">Ver todas</a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php 
                                            $profissoes_relacionadas = get_field('profissoes_relacionadas');
                                                if( $profissoes_relacionadas ){
                                                    foreach($profissoes_relacionadas as $profissao_row){
                                                        $link_relacionado_profissao = get_permalink( $profissao_row->ID );
                                                        $titulo_relacionado_profissao = get_the_title( $profissao_row->ID );
                                                        $imagem_relacionado_profissao = get_field( 'home_image_small', $profissao_row->ID );
                                            ?>
                                    <div class="col-sm-6">
                                        <div class="related-card">
                                            <div class="related-card-image-wrap">
                                                <img class="related-card-img"
                                                    src="<?php echo $imagem_relacionado_profissao['url'];?>">
                                            </div>
                                            <div class="related-card-inner">
                                                <div class="title"><a
                                                        href="<?php echo $link_relacionado_profissao; ?>"><?php echo $titulo_relacionado_profissao; ?></a>
                                                </div>
                                                <a class="view-more"
                                                    href="<?php echo $link_relacionado_profissao; ?>">Ver</a>
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
                    </div>
                    <div class="col-md-6">
                        <div class="related-header">
                            <h3>Entrevistas</h3>
                            <a href="#">Ver todas</a>
                        </div>
                        <div class="row reveal-block">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php 
                                            $entrevistas_relacionadas = get_field('entrevistas_relacionadas');
                                                if( $entrevistas_relacionadas ){
                                                    foreach($entrevistas_relacionadas as $entrevistas_row){
                                                        $link_relacionado_entrevista = get_permalink( $entrevistas_row->ID );
                                                        $titulo_relacionado_entrevista = get_the_title( $entrevistas_row->ID );
                                                        $imagem_relacionado_entrevista = get_field( 'home_image_small', $entrevistas_row->ID );
                                        ?>
                                    <div class="col-sm-6">
                                        <div class="related-card">
                                            <div class="related-card-image-wrap">
                                                <img class="related-card-img"
                                                    src="<?php echo $imagem_relacionado_entrevista['url'];?>">
                                            </div>
                                            <div class="related-card-inner">
                                                <div class="title"><a
                                                        href="<?php echo $link_relacionado_entrevista; ?>"><?php echo $titulo_relacionado_entrevista; ?></a>
                                                </div>
                                                <a class="view-more"
                                                    href="<?php echo $link_relacionado_entrevista; ?>">Ver</a>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1">
                <div class="row row-related reveal-block">
                    <div class="col-md-12">
                        <div class="related-header">
                            <h3>Videos</h3>
                            <a href="#">Ver todos</a>
                        </div>
                        <div class="row reveal-block">
                            <div class="col-md-3 col-sm-6">
                                <div class="related-card">
                                    <div class="related-card-image-wrap">
                                        <img class="related-card-img"
                                            src="<?php echo get_template_directory_uri(); ?>/img/related@2x.jpg">
                                    </div>
                                    <div class="related-card-inner">
                                        <div class="title"><a href="#">Inspire Others: Product Designer/Manager @
                                                Uniplaces</a></div>
                                        <a class="view-more play" href="#">Ver <span class="video-time">03:13</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="related-card">
                                    <div class="related-card-image-wrap">
                                        <img class="related-card-img"
                                            src="<?php echo get_template_directory_uri(); ?>/img/related@2x.jpg">
                                    </div>
                                    <div class="related-card-inner">
                                        <div class="title"><a href="#">Inspire Others: Product Designer/Manager @
                                                Uniplaces</a></div>
                                        <a class="view-more play" href="#">Ver <span class="video-time">03:13</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="related-card">
                                    <div class="related-card-image-wrap">
                                        <img class="related-card-img"
                                            src="<?php echo get_template_directory_uri(); ?>/img/related@2x.jpg">
                                    </div>
                                    <div class="related-card-inner">
                                        <div class="title"><a href="#">Inspire Others: Product Designer/Manager @
                                                Uniplaces</a></div>
                                        <a class="view-more play" href="#">Ver <span class="video-time">03:13</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="related-card">
                                    <div class="related-card-image-wrap">
                                        <img class="related-card-img"
                                            src="<?php echo get_template_directory_uri(); ?>/img/related@2x.jpg">
                                    </div>
                                    <div class="related-card-inner">
                                        <div class="title"><a href="#">Inspire Others: Product Designer/Manager @
                                                Uniplaces</a></div>
                                        <a class="view-more play" href="#">Ver <span class="video-time">03:13</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1">
                <div class="row row-related reveal-block">
                    <div class="col-md-6">
                        <div class="related-header">
                            <h3>Notícias</h3>
                            <a href="#">Ver todas</a>
                        </div>
                        <div class="row reveal-block">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php 
                                                $noticias_relacionadas = get_field('noticias_relacionadas');
                                                    if( $noticias_relacionadas ){
                                                        foreach($noticias_relacionadas as $noticias_row){
                                                            $link_relacionado_noticia = get_permalink( $noticias_row->ID );
                                                            $titulo_relacionado_noticia = get_the_title( $noticias_row->ID );
                                                            $imagem_relacionado_noticia = get_field( 'home_image_small', $noticias_row->ID );
                                            ?>
                                    <div class="col-sm-6">
                                        <div class="related-card">
                                            <div class="related-card-image-wrap">
                                                <img class="related-card-img"
                                                    src="<?php echo $imagem_relacionado_noticia['url'];?>">
                                            </div>
                                            <div class="related-card-inner">
                                                <div class="title"><a
                                                        href="<?php echo $link_relacionado_noticia;?>"><?php echo $titulo_relacionado_noticia;?></a>
                                                </div>
                                                <a class="view-more"
                                                    href="<?php echo $link_relacionado_noticia;?>">Ver</a>
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
                    </div>
                    <div class="col-md-6">
                        <div class="related-header">
                            <h3>Blog</h3>
                            <a href="#">Ver todos</a>
                        </div>
                        <div class="row reveal-block">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php 
                                                $blog_posts_relacionados = get_field('blog_posts_relacionados');
                                                    if( $blog_posts_relacionados ){
                                                        foreach($blog_posts_relacionados as $blog_posts_row){
                                                            $link_relacionado_blog_post = get_permalink( $blog_posts_row->ID );
                                                            $titulo_relacionado_blog_post = get_the_title( $blog_posts_row->ID );
                                                            $imagem_relacionado_blog_post = get_field( 'home_image_small', $blog_posts_row->ID );
                                            ?>

                                    <div class="col-sm-6">
                                        <div class="related-card">
                                            <div class="related-card-image-wrap">
                                                <img class="related-card-img"
                                                    src="<?php echo $imagem_relacionado_blog_post['url'];?>">
                                            </div>
                                            <div class="related-card-inner">
                                                <div class="title"><a
                                                        href="<?php echo $link_relacionado_blog_post;?>"><?php echo $titulo_relacionado_blog_post;?></a>
                                                </div>
                                                <a class="view-more"
                                                    href="<?php echo $link_relacionado_blog_post;?>">Ver</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>