<?php

namespace App\Controller;

use App\Entity\AidantsArticle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AidantsController extends AbstractController
{
    /**
     * @Route("/aidants", name="aidants")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AidantsController.php',
        ]);
    }

    
     /**
     * @Route("/article/ajout", name="ajout_article")
     */
    public function createArticle(): Response
    {
    
        $entityManager = $this->getDoctrine()->getManager();

        $articleaidants = new AidantsArticle();      
        $articleaidants->setTitle('I\'m new');
        $articleaidants->setAuthor('lea Schmidt');
        $articleaidants->setContent('lorem');	

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($articleaidants);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new article with id '.$articleaidants->getId());
    }


    /**
 * @Route("/article/{id}", name="article_show")
 */
public function show($id)
    {
    $articleaidants = $this->getDoctrine()
        ->getRepository(AidantsArticle::class)
        ->find($id);

    if (!$articleaidants) {
        throw $this->createNotFoundException(
            'No article found for id '.$id
        );
    }
    return $this->render('article/show.html.twig', ['article' => $articleaidants]);
    }

/**
 * @Route("/article/edit/{id}")
 */
public function update($id)
{
    $entityManager = $this->getDoctrine()->getManager();
    $articleaidants = $entityManager->getRepository(AidantsArticle::class)->find($id);

    if (!$articleaidants) {
        throw $this->createNotFoundException(
            'No article found for id '.$id
        );
    }

    $articleaidants->setName('New article name!');
    $articleaidants->setAuthor('lea Schmidt');
    $articleaidants->setContent('lorem');
    $entityManager->flush();

    return $this->redirectToRoute('article', [
        'id' => $articleaidants->getId()
    ]);
}

}

