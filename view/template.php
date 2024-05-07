<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public\template.css">
 

  <title>Document</title>
</head>
<body>
  
  <header class="first">
      <section >
          <div class="flex">
            <a href="./index.php?action=home">
              <figure><img class="logo" src="public\pictemplate\logo.webp" alt="logofilm"></figure>
              <h1>MOMOCINÉ</h1>
            </a>  
          </div>
          <nav>
              <ul class="flex menu">
                  <li><a href="./index.php?action=listeFilms">FILM</a></li>
                  <li><a href="./index.php?action=listeActeurs">ACTEUR</a></li>
                  <li><a href="./index.php?action=listeRealisateurs">RÉALISATEUR</a></li>
                  <li><a href="./index.php?action=acheter">ACHETER</a></li>
              </ul>
          </nav>
          
      </section>
  </header>

  

  <div>
    <form class="recherche" action="index.php" method="GET">
      <input class="recherche" type="text" name="query" placeholder="Rechercher un acteur ou un film" required>
      <input class="recherche" type="hidden" name="action" value="rechercher">
      <input  class="bouton" type="submit" value="Rechercher">
    </form>
   
  </div>

  
  <main>
    <?= $content?>
  </main>
  
  
  
  <section>
    <h2>Newsletters</h2>
    <form  method="post" action="index.php?action=lesnouvelles" >
      <p class="newsletters titreNewsletters">Inscrivez-vous à notre Newsletter !</p> 
      <br/>
      <input class="newsletters" type="text" name="mail" placeholder="Votre email" />
      
      <input class="bouton2" type="submit" value="S'inscrire" />
   </form>
    
  </section>

  <footer >
        <section>
            <div>
                <h2>Service VOD</h2>
            </div>
            <div class="vod flex" >
                <figure><a href="https://www.netflix.com/fr/"><img src="public\pictemplate\netflix-mobile-application-logo-free-png.webp" alt="netflix"></a></figure>
                <figure><a href="https://www.canalplus.com/"></a> <img src="public\pictemplate\R.jpg" alt="canal+"></figure>
                <figure><a href="https://www.disneyplus.com/fr-fr?cid=DSS-Search-Google-71700000064847220-&s_kwcid=AL!8468!3!540449701174!e!!g!!disney&&cid=DSS-Search-Google-71700000064847220-&s_kwcid=AL!8468!3!540449701174!e!!g!!disney&gad_source=1&gclid=CjwKCAjw88yxBhBWEiwA7cm6pX80N6LIl2M4Un9n1DYM9Q413Hcx78nGmeM3a8Bj9yHpk-v4DlHjVxoCikAQAvD_BwE&gclsrc=aw.ds"> <img class="disney" src="public\pictemplate\disney.png" alt="disney"></a></figure>
                <figure><a href="https://www.primevideo.com/offers/nonprimehomepage/ref=dvm_pds_amz_FR_lb_s_g_mkw_su7lOMrFr-dc_pcrid_620140177114?gclid=CjwKCAjw88yxBhBWEiwA7cm6pd8qfqWi0X26-CUB4b12JtA3FjiRv43QvfJu2t3TdHwX96CT7708_hoCTXQQAvD_BwE&mrntrk=slid__pgrid_85154948059_pgeo_9049395_x__adext__ptid_kwd-297838409925"><img src="public\pictemplate\prime.png" alt="prime"></a></figure>
                <figure><a href="https://www.paramountplus.com/fr/?&ftag=IPP-02-10afb0c&gad_source=1&gclid=CjwKCAjw88yxBhBWEiwA7cm6pc9bt9lPUPiVyfMFKsuFm9BBg200vx115qH8xApL4UzBl0UlRYJzkBoC0HUQAvD_BwE&gclsrc=aw.ds"> <img src="public\pictemplate\Paramount-logo1.png" alt="paramout"></a></figure>
                <figure><a href="https://tv.apple.com/fr?mttn3pid=Google%20AdWords&mttnagencyid=a5e&mttncc=FR&mttnsiteid=143238&mttnsubad=OFR2019801_1-678611159238-c&mttnsubkw=151338284383__JINI2tUV_&mttnsubplmnt=_adext_"><img src="public\pictemplate\AppleTVLogo.svg.png" alt="appletv"></a></figure>
                
            </div>
        </section>
        <figure>
          <a href="./index.php?action=LoginFormulaireAdmin"  ><img class="logoadmin" src="public\pictemplate\admin.png" alt="logoadmin"> </a>
        </figure>
    <small>Mohamed &#169 2024</small>

  </footer> 
  
  
</body>
</html>



    
    
