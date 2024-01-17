<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request,EntityManagerInterface $em): Response
    {
           dump($request->getMethod());
           if($request->getMethod()==='POST'){
            if($request->get('email')!==""){
                $this->addFlash('success','votre message a ete envoye avec succes ');
            }
            else
                $this->addFlash('error','email est manquant');

                $name=$request->get('name');
                $email=$request->get('email');
                $subject=$request->get('subject');
                $message=$request->get('message');
        
                $contact = new Contact();
                $contact->setName($name);
                $contact->setEmail($email);
                $contact->setSubject($subject);
                $contact->setMessage($message);
                $contact->setCreatedAt(new \DateTimeImmutable());

                $em->persist($contact);
                $em->flush();
        }

        return $this->render('contact/index.html.twig', [
            
        ]);
    }

    #[Route('/list-contact', name: 'list-contact')]
    public function home(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAll();
        return $this->render('contact/list.html.twig', [
            'contacts' => $contacts
        ]);
    }


}
