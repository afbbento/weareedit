<?php
$seccao_banner_faq = get_field('seccao_banner_faq');
    if( $seccao_banner_faq ){
        $titulo = $seccao_banner_faq['titulo'];
        $texto = $seccao_banner_faq['texto'];
        $link = $seccao_banner_faq['link'];    
        
        $link_url = $link['url'];
        $link_title = $link['title'];            
    }
?>
<section class="faq">
    <div class="container">
        <div class="row reveal-block">
            <div class="col-md-12 col-md-offset-0 col-sm-offset-1  col-xs-offset-1"">
                <h1><?php echo $titulo; ?></h1>
                <p><?php echo $texto; ?></p>
                <a href=" <?php echo $link_url; ?>" class="btn btn-yellow"><?php echo $link_title; ?></a>
            </div>
        </div>
    </div>
</section>