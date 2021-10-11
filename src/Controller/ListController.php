<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Organization;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function update(Request $request): Response
    {

        $em = $this -> getDoctrine() -> getManager();
        $user = $em -> getRepository(User::class) -> findAll();



            return $this -> redirectToRoute('list', [
                'form' => $form -> createView(),
            ]);

    }
}
