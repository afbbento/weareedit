<?php
/**
* Template Name: Eventos
*
* @package weareedit
* @subpackage weareedit
* @since weareedit
*/

get_header();

if(isset($_REQUEST['catId'])) {
    $catId = $_REQUEST['catId'];
}
?>

<div class="content formacao-area-template">
            <div class="filter-header">
                <div class="row">   
                    <div class="container">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><h2><a href="#">Eventos</a></h2></li>
                            </ul>    
                        </div>      
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="col-md-12">
                            <h1 class="filter-select"><span class="select-course-area">Design, </span><span class="unselected select-location">Local</span></h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="filter-result result-events">
                <div class="row grid-sp-40">
                    <div class="container">
                    <?php
                    $posts = get_posts(array(
                        'posts_per_page'	=> 6,
                        'post_type'			=> 'eventos'
                    ));
                    if( $posts ){
                        $i=1;
                        foreach( $posts as $post ){
                            $i++;
                            setup_postdata( $post );
                            $link_evento = get_permalink();
                            $titulo_evento = get_field('titulo'); 
                            $evento_inicio = get_field('data_inicio');
                            $imagem = get_field('home_image');
                            $localizacao_evento = get_field('localizacao');
                            if( $localizacao_evento ){
                                foreach( $localizacao_evento as $localizacao_evento_row ){
                                    $localizacao = get_the_title( $localizacao_evento_row->ID );                                    
                                }
                            }
                            $evento_inicio_format = DateTime::createFromFormat('Ymd', $evento_inicio); 
                            $dia_evento = $evento_inicio_format->format('d');
                            $mes_evento = $evento_inicio_format->format('m');

                            $mes_texto = getMes($mes_evento);

                        if ($i%2==0){
                            echo '</div></div><div class="row grid-sp-40"><div class="container">';
                        }
                        ?>
                    
                            <div class="col-sm-6 col-md-6">
                                <a href="<?php echo $link_evento; ?>" class="course-box" style="background-image:url(<?php echo $imagem['url']; ?>"></a>    
                                <div class="course-text">
                                    <h3 class="course-time">Evento</h3>
                                    <h2 class="course-title"><a href="<?php echo $link_evento; ?>"><?php echo $titulo_evento; ?></a></h2>
                                    <div class="course-date"><?php echo $dia_evento; ?> de <?php echo $mes_texto; ?>, <?php echo $localizacao;?></div>
                                </div>
                            </div>                                        
                        

                    <?php
                    }
                    
                wp_reset_postdata();
                }
                ?>
                    </div>
                </div>                
            </section>      
        </div>

        <div class="side-filter-container" >
            <form id="filter-locations" name="filter-locations">
                <div class="overlay-side-filter"></div>
                <div class="side-filter">
                    
                    <div class="filter-content">
                        <div class="close">
                            <img src="img/fechar.svg" />
                        </div>            
                        <div class="filter-label">Local</div>
                        <div class="filter-options">
                            <div> 
                                <input type="radio" value="Lisboa" id="location1" name="location" >
                                <label for="location1">Lisboa</label>
                            </div>
                            <div>
                                <input type="radio" value="Porto" id="location2" name="location" >
                                <label for="location2">Porto</label>    
                            </div>
                        </div>
                    </div>
                    <div class="side-bottom">
                        <div class="btn-container">
                            <a href="#" class="btn btn-black get-filter">Guardar Informação</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
<?php get_footer(); ?>