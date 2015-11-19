<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace DAM\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdvertController extends Controller
{

    public function indexAction($page)
    {
    	$url = $this->generateUrl(
    		'dam_platform_view',//  1er argument -> Nom de la route comme dans le fichier routing
    		array('id' => 666)    //  2eme Argument -> Tableau avec les valeurs des paramètres attendus
    	);
    	if ($page == null) {
    		$page = 1;
    	}
    	$content = $this
    		->get('templating')
    		->render('DAMPlatformBundle:Advert:index.html.twig', array(
    			'url' => $url,
    			'page' => $page
    		)
    	);

    	return new Response($content);
    }

    //Page avec un paramètre
    public function viewAction($id)
    {
    	return new Response("Le numéro de l'annonce est le :".$id);
    }

    // Exemple de page passant plusieur paramètres
    public function viewSlugAction($slug, $year, $format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '".$slug."', créée en ".$year." et au format ".$format."."
        );
    }
}