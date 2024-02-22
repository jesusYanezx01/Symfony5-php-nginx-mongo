<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceController extends AbstractController
{
    #[Route('/hello/{name}', name: 'app_conference')]
    public function index(string $name ): Response
    {
        $greet = '';

        if($name){
            $greet = sprintf('<h1>Hello %s! </h1>', htmlspecialchars($name));
        }
        //return $this->render('conference/index.html.twig');
        return new  Response(<<<EOF
<html>
    <body>
    $greet
        <h1>Hola mundo desde Symfony</h1>
    </body>
</html> 
EOF
        );
    }
}
