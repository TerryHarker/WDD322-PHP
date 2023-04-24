<?php
/**
 * Functions für mein Projekt
*/

function createNavitems ( $navArray, $liClass='nav-item' ) {

    // print_r($navArray);
    $aktuelle_datei = basename( $_SERVER['PHP_SELF'] );
    // echo 'aktuelle_datei: '.$aktuelle_datei;

    $navItems = '';
    foreach( $navArray as $main ){
        
        if($aktuelle_datei == $main['link']){ 
            $activeClass = 'active'; 
        }else{
            $activeClass = '';
        }

        $navItems .= '<li class="'.$liClass.' col-6 col-md-auto">';
        $navItems .= '<a class="nav-link p-2 '.$activeClass.'" href="'.$main['link'].'">'.$main['title'].'</a>';
		$navItems .= '</li>';
	}
    
    return $navItems;
}
?>