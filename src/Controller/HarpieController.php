<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HarpieController extends AbstractController
{
    /**
     * @Route("/", name="app_harpie")
     */
    public function index(): Response
    {
        return $this->render('harpie/index.html.twig', [
            'controller_name' => 'HarpieController',
        ]);
    }
}
