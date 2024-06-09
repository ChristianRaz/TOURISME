<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    
    /**
     * @Route("/blog", name="blog_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    /**
     * @Route("/", name="home_home")
     */
    public function home(){
        return $this-> render('blog/home.html.twig', [
            'title' => 'Bienvenue dans ce blog !',
            'age' => 31
        ]);
    }

    /**
     * @Route("/blog/12", name="blog__show")
     */
    public function show(){
        return $this-> render('blog/show.html.twig');
    }

    /**
     * @Route("/blog/news", name="news__new")
     */
    public function new(){
        return $this-> render('blog/news/new.html.twig');
    }
}
