<link rel="stylesheet" href="public\home.css">
<?php 
ob_start()
?>

        <section  >
            
            <div>
                <h2> Top Film</h2>
            </div>
            <div class="picfilm flex">
                
                <figure>
                    <a href="index.php?action=detailsFilm&titre=The Wolf of Wall Street">
                        <img src="public/pichome/thewolf.jpg" alt="film1">
                    </a>
                </figure>
                
                <figure>
                    <a href="index.php?action=detailsFilm&titre=The Shining">
                        <img src="public/pichome/shining.jpg" alt="film2">
                    </a>
                </figure>
                
                <figure>
                    <a href="index.php?action=detailsFilm&titre=Men in Black 3">
                        <img src="public\pichome\mib.jpg" alt="film3">
                    </a>
                </figure>
                
                <figure>
                    <a href="index.php?action=detailsFilm&titre=Inception">
                        <img src="public/pichome/inception-11.jpg" alt="film4">
                    </a>
                </figure>
                
                <figure>
                    <a href="index.php?action=detailsFilm&titre=Avatar">
                        <img src="public/pichome/avatar.jpg" alt="film5">
                    </a>
                </figure>
            </div>
            

            <div class="slider-contaner slider-1">
                <h2> Top Acteurs</h2>
                <div class="slider">
                    
                    <p><a href="index.php?action=detailsActeur&prenom=robert">
                                    <img src="public\picactor\deniro.jpg" alt="acteur1">
                                </a></p>
                    <p><a href="index.php?action=detailsActeur&prenom=emma">
                                    <img src="public\picactor\emma-stone-maniac-premiere-in-new-york-09-20-2018-12.jpg" alt="film4">
                                </a></p>
                    <p><a href="index.php?action=detailsActeur&prenom=jennifer">
                                    <img src="public\picactor\jennifer-lawrence.webp" alt="acteur2">
                                </a></p>
                    <p><a href="index.php?action=detailsActeur&prenom=will">
                                    <img src="public\picactor\willsmith.webp" alt="acteur3">
                                </a></p>
                    <p><a href="index.php?action=detailsActeur&prenom=leonardo">
                                    <img src="public\picactor\leonardo.webp" alt="acteur4">
                                </a></p> 
                    <p><a href="index.php?action=detailsActeur&prenom=robert">
                                    <img src="public\picactor\deniro.jpg" alt="acteur5">
                                </a></p> 
                    
                </div>
    
            </div>


        </section>
        
</div>



    <?php

    $titre = "home";
    $titre_secondaire="home";
    $content = ob_get_clean();
    require "template.php";
    
    
    ?>
