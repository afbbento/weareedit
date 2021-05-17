<div class="row persons-grid">

    <?php
    $seccao_equipa = get_field('seccao_equipa');
        if( $seccao_equipa ){
            $equipa = $seccao_equipa['elemento'];
            $num_elementos = count($equipa);
            if($equipa){
                $i = 0;
                foreach($equipa as $elemento){
                $i++;
                    $link_elemento = get_permalink( $elemento->ID );
                    
                    $nome = get_field('nome', $elemento->ID);
                    $sobrenome = get_field('sobrenome', $elemento->ID);
                    $cargo = get_field('cargo', $elemento->ID);
                    $empresa = get_field('descricao_elemento', $elemento->ID);
                    $foto = get_field('foto', $elemento->ID);
                    
                    ?>

    <div class="col-md-3 col-sm-6 col-sm-offset-0 col-xs-12 col-xs-offset-0">
        <a href=" <?php echo $link_elemento; ?>">
            <div class="adaptImage reveal-block">
                <div class="adaptImage__inner">
                    <div class="adaptImage__aspect" style="padding-bottom:145%;">
                        <img class="adaptImage__image" src="<?php echo $foto['url']; ?>">
                    </div>

                    <div class="person-card">
                        <div class="person-card-content">
                            <div class="text">
                                <div class="name"><?php echo $nome." ".$sobrenome; ?></div>
                                <div class="job"><?php echo $cargo; ?></div>
                                <div class="company"><?php echo $empresa; ?></div>
                            </div>
                        </div>
                        <div class="link">Ver entrevista</div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php
                    if (($i==5 || $i==7 ) && $num_elementos<5){
                        echo '<div class="col-md-3 col-sm-5"></div>';
                    }
                    if (($i==9 ) && $num_elementos>5){
                        echo '<div class="col-md-3 col-sm-5"></div>';
                    }
                    }
                }
            }
?>

</div>