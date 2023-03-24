<?php

$blogdata = array (
    array (
        'titel' => 'Willkommen im PHP Kurs',
        'datum' => '2023-03-14',
        'kategorie' => 'PHP Blog',
        'text' => 'PHP ist server side...'
    ),
    array (
        'titel' => 'Neuer Kurs...',
        'datum' => '2022-09-02',
        'kategorie' => 'PHP Blog',
        'text' => 'Wir befassen uns mit den Möglichkeiten von PHP / SQL'
    ),
    array (
        'titel' => 'Noch ein Eintrag',
        'datum' => '2022-07-31',
        'kategorie' => 'PHP Blog',
        'text' => 'Noch ein Text'
    )
);

?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">
   <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <meta name="author" content="Terry Harker">
      <title>PHP Blog</title>
      <link href="theme/css/fontawesome.min.css?2.6.0" rel="stylesheet" as="style" onload="this.onload=null;this.rel='stylesheet'" />
      <link href="theme/css/theme.12.css" rel="stylesheet" id="theme-style" />
      <script src="theme/js/uikit/uikit.min.js?2.6.0"></script>
      <script src="theme/js/uikit/uikit-icons-balou.min.js?2.6.0"></script>
      <script src="theme/js/theme.js?2.6.0"></script>
   </head>
   <body class="">
      <div>
         <div class="tm-header-mobile uk-hidden@m">
            <div class="uk-navbar-container">
               <nav uk-navbar="container: .tm-header-mobile">
               </nav>
            </div>
         </div>
         <div class="tm-header uk-visible@m" uk-header>
            <div class="uk-navbar-container">
               <div class="uk-container">
                  <nav class="uk-navbar" uk-navbar="{&quot;align&quot;:&quot;left&quot;,&quot;boundary&quot;:&quot;.tm-header .uk-navbar-container&quot;,&quot;container&quot;:&quot;.tm-header&quot;}">
                  </nav>
               </div>
            </div>
         </div>
		 
         <div id="system-message-container" aria-live="polite"></div>
         <!-- #header -->
         <div class="uk-section-primary">
            <div uk-img class="uk-background-norepeat uk-background-cover uk-background-center-center uk-section" style="background-image:url(images/header-lime.png);">
               <div class="uk-container">
                  <div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin" uk-grid>
                     <div>
                        <h1 class="uk-text-right" data-id="page#0-0-0-0">        PHP Blog    </h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 
         <!-- #content -->
         <div class="uk-section-default uk-section">
            <div class="uk-container">
               <div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin" uk-grid>
                  <div>
                     <div data-id="page#1-0-0-0" class="uk-margin">
                        <div class="uk-child-width-1-1 uk-grid-divider uk-grid-match" uk-grid>
                           
									<?php foreach(  $blogdata as $blogentry ){ ?>														
							      <div>
                              <div class="el-item uk-panel uk-margin-remove-first-child">
                                 <h3 class="el-title uk-margin-top uk-margin-remove-bottom"><?php echo $blogentry['titel'] ?></h3>
                                 <div class="el-meta uk-text-meta uk-margin-top"><time><?php echo $blogentry['datum'] ?></time> | Terry | <?php echo $blogentry['kategorie'] ?></div>
                                 <div class="el-content uk-panel uk-margin-top">
                                    <p><?php echo $blogentry['text'] ?></p>
                                 </div>
                                 <div class="uk-margin-top"><a href="post.php?article=20:willkommen-im-php-sql-kurs" class="el-link uk-button uk-button-default">Lesen</a></div>
                              </div>
                           </div>
									<?php } ?>
						  
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
		 
		 
		 	<!-- #footer -->
         <div class="uk-section-primary uk-section">
            <div class="uk-container">
               <div class="tm-grid-expand uk-grid-margin" uk-grid>
                  <div class="uk-grid-item-match uk-flex-bottom uk-width-1-3@m">
                     <div class="uk-panel uk-width-1-1">
                        <h3 class="uk-text-left@s uk-text-center uk-margin-remove-bottom">PHP Blog</h3>
                        <div class="uk-panel uk-text-left@s uk-text-center">
                           <p>Ein Beispiel-Blog für den Unterricht</p>
                        </div>
                     </div>
                  </div>
                  <div class="uk-grid-item-match uk-flex-bottom uk-width-1-3@m">
                     <div class="uk-panel uk-width-1-1">
						 <div class="uk-panel uk-margin uk-text-center">
							<nav>
								<ul class="uk-subnav">
									<li><a href="index.php">Home</a></li>
									<li><a href="admin/login.php">Admin</a></li>
																											<li><a href="register.php">Registrieren</a></li>
																	</ul>
							</nav>
                        </div>
                     </div>
                  </div>
                  <div class="uk-grid-item-match uk-flex-bottom uk-width-1-3@m">
                     <div class="uk-panel uk-width-1-1">
                        <div class="uk-panel uk-margin uk-text-right@s uk-text-center">
                           <p>© 2021 Terry Harker</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>      </div>
   </body>
</html>