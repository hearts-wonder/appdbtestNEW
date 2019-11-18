<?php

namespace App\Controller;

use App\Entity\PatientsArticle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class PatientsController extends AbstractController
{
    /**
     * @Route("/patients", name="patients")
     */
    public function index()
    {
        return $this->render('patients/articles.html.twig' ,[
            'theme' => $theme,
            'img' => $img,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ]);
    }

     /**
     * @Route("/article/ajout", name="ajout_article")
     */
    public function createArticle(): Response
    {
    
        $entityManager = $this->getDoctrine()->getManager();

        $articlepatient = new PatientsArticle();      
        $articlepatient->setTitle('I\'m new');
        $articlepatient->setAuthor('lea Schmidt');
        $articlepatient->setContent('lorem');	

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($articlepatient);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new article with id '.$articlepatient->getId());
    }


    /**
 * @Route("/article/{id}", name="article_show")
 */
public function show($id)
    {
    $articlepatient = $this->getDoctrine()
        ->getRepository(PatientsArticle::class)
        ->find($id);

    if (!$articlepatient) {
        throw $this->createNotFoundException(
            'No article found for id '.$id
        );
    }
    return $this->render('article/show.html.twig', ['article' => $articlepatient]);
    }

/**
 * @Route("/article/edit/{id}")
 */
public function update($id)
{
    $entityManager = $this->getDoctrine()->getManager();
    $articlepatient = $entityManager->getRepository(PatientsArticle::class)->find($id);

    if (!$articlepatient) {
        throw $this->createNotFoundException(
            'No article found for id '.$id
        );
    }

    $articlepatient->setName('New article name!');
    $articlepatient->setAuthor('');
    $articlepatient->setContent('');
    $entityManager->flush();

    return $this->redirectToRoute('article', [
        'id' => $articlepatient->getId()
    ]);
}

}