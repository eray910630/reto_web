<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search/{valor}/{valor_escondido}", name="search")
     */
    public function index($valor, $valor_escondido): Response
    {

        $inf = 0;
        $sup = 0;
        $valor_encontrado = 0;
        if ($valor == $valor_escondido) {
            $valor_encontrado = $valor;
        } else {
            while ($valor > $valor_escondido) {
                $inf = $valor;
                $sup = floor($valor / 2);
                $valor = floor($valor / 2);
            }
            while ($valor < $valor_escondido) {
                $inf = $valor;
                $sup = $valor * 2;
                $valor = $valor * 2;
            }

            while ($inf <= $sup) {
                $mitad = floor(($inf + $sup) / 2);
                if ($mitad == $valor_escondido) {
                    $valor_encontrado = $mitad;
                    break;
                } elseif ($mitad > $valor_escondido) {
                    $sup = $mitad - 1;
                } else {
                    $inf = $mitad + 1;
                }
            }
        }


        return new Response(
            '<html><title>G12</title><body>Lucky number: ' . $valor_encontrado . '</body></html>'
        );
    }
}
