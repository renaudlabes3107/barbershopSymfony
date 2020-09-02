<?php
// le controller va retourner quelque chose dans un fichier twig pour l'afficher. Les templates dans le meme temps ont été 
// crée... Il faut ensuite aller dans index.html.twig qui m'a été créé par la même occasion
//Ce que l'on va voir en dessous ===> il s'agit d'une toute qui  va diriger,rediriger, vers une URL
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/x", name="index") 
     */

     
    public function index()
    {
        
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
