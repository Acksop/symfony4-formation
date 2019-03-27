<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 3/26/19
 * Time: 2:40 PM
 */

namespace App\Controller;


use App\Form\ContactType;
use App\Model\Contact;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class ContactController
{
    /**
     * @var EngineInterface
     */
    private $templating;
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(EngineInterface $templating, FormFactoryInterface $formFactory, RouterInterface $router)
    {
        $this->templating = $templating;
        $this->formFactory = $formFactory;
        $this->router = $router;
    }

    /**
     * @Route(path="/contact", name="app_contact_newcontact")
     */
    public function newContact(Request $request): Response
    {
        $contact = new Contact();
        $contactForm = $this->formFactory->create(ContactType::class,$contact);
        $contactForm->handleRequest($request);

        if($contactForm->isSubmitted() && $contactForm->isValid()){
            $path = $this->router->generate('app_contact_submitsuccess');
            return new RedirectResponse($path);
        }

        $pageContent = $this->templating->render('contact/new.html.twig',
            [
                'contactForm' => $contactForm->createView()
            ]
        );
        return new Response($pageContent);
    }

    /**
     * @Route(path="/contact-success", name="app_contact_submitsuccess")
     */
    public function submitSuccess(): Response
    {
            return new Response('Success !');
    }
}