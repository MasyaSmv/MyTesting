<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function index(Request $request): Response
    {
        $companies = [
            'Apple' => 'tgergerge'
        ];

        return $this->render('list/index.html.twig', [
            'companies' => $companies,
        ]);
    }
}
