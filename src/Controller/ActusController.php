<?php

namespace App\Controller;

use Symfony\Flex\Response;
use App\Entity\ActusArticle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActusController extends AbstractController
{
    /**
     * @Route("/actus", name="actus")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ActusController.php',
        ]);
    }

    
     /**
     * @Route("/article/ajout", name="ajout_article")
     */
    public function createArticle(): Response
    {
    
        $entityManager = $this->getDoctrine()->getManager();

        $articleactus = new ActusArticle();      
        $articleactus->setTitle('I\'m new');
        $articleactus->setAuthor('lea Schmidt');
        $articleactus->setContent('lorem');	

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($articleactus);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new article with id '.$articleactus->getId());
    }


    /**
 * @Route("/article/{id}", name="article_show")
 */
public function show($id)
    {
    $articleactus = $this->getDoctrine()
        ->getRepository(ActusArticle::class)
        ->find($id);

    if (!$articleactus) {
        throw $this->createNotFoundException(
            'No article found for id '.$id
        );
    }
    return $this->render('article/show.html.twig', ['article' => $articleactus]);
    }

/**
 * @Route("/article/edit/{id}")
 */
public function update($id)
{
    $entityManager = $this->getDoctrine()->getManager();
    $articleactus = $entityManager->getRepository(ActusArticle::class)->find($id);

    if (!$articleactus) {
        throw $this->createNotFoundException(
            'No article found for id '.$id
        );
    }

    $articleactus->setName('New article name!');
    $articleactus->setAuthor('lea Schmidt');
    $articleactus->setContent('lorem');
    $entityManager->flush();

    return $this->redirectToRoute('article', [
        'id' => $articleactus->getId()
    ]);
}

}

