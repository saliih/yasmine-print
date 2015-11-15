<?php

namespace User\UserBundle\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Validator\Constraints\DateTime;
use User\UserBundle\Form\ResettingFormType;
use User\UserBundle\Entity\User;
use Btob\HotelBundle\Entity\Hotelmarge;
use Back\DashBundle\Common\Tools;

class RegistrationController extends BaseController
{

    public function deleteAction($id)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $om = $this->container->get('doctrine.orm.entity_manager');
        $user = $userManager->findUserBy(array('id' => $id));
        $om->remove($user);
        $om->flush();
        $url = $this->container->get('router')->generate('show_users');
        $response = new RedirectResponse($url);
        return $response;
    }

    public function editAction(Request $request, $id)
    {
        //Tools::dump($request->request, true);
        $userManager = $this->container->get('fos_user.user_manager');
//$user = new User();
        $om = $this->container->get('doctrine.orm.entity_manager');
        $user = $userManager->findUserBy(array('id' => $id));
        //$file = $user->getLogo();
        $formFactory = $this->container->get('fos_user.registration.form.factory');
        $form = $formFactory->createForm();
        $form->setData($user);
        if ('POST' === $request->getMethod()) {
            $form->bind($request);

            if ($form->isValid()) {
                $user->setDmj(new \DateTime());
                //$user->setLogo($request->request->get('file'));
                $userManager->updateUser($user);

                $om->flush();

                $url = $this->container->get('router')->generate('show_users');
                $response = new RedirectResponse($url);
                return $response;
            }
        }

        return $this->container->get('templating')->renderResponse(
            'UserUserBundle:Registration:edit.html.twig', array('form' => $form->createView(), 'id' => $id, "user" => $user)
        );
    }

    public function edit2Action(Request $request)
    {

        $userManager = $this->container->get('fos_user.user_manager');
//$user = new User();
        $om = $this->container->get('doctrine.orm.entity_manager');
        //$user = $userManager->findUserBy(array('id' => $id));
        $user = $this->get('security.context')->getToken()->getUser();

        $valid=$user->isEnabled();
        $username=$user->getUsername();
        $usernameCanonical=$user->getUsernameCanonical();
        $roles=$user->getRoles();
        $formFactory = $this->container->get('fos_user.registration.form.factory');
        $form = $formFactory->createForm();
        $form->setData($user);
        if ('POST' == $request->getMethod()) {
            $form->bind($request);


                //Tools::dump($request->request,true);
                $user->setEnabled(true);
                $user->setUsername($user->getEmail());
                $user->setUsernameCanonical($user->getEmail());
                $user->setRoles($roles);
                $userManager->updateUser($user);

                $om->persist($user);
                $om->flush();
                return $this->redirect($this->generateUrl('back_dash_homepage'));

        }

        return $this->container->get('templating')->renderResponse(
            'UserUserBundle:Registration:edit2.html.twig', array('form' => $form->createView(), 'id' => $user->getId())
        );
    }

    public function registerAction(Request $request)
    {

        $user = new User();

        $formFactory = $this->container->get('fos_user.registration.form.factory');
        $form = $formFactory->createForm();
        $form->setData($user);
        if ('POST' === $request->getMethod()) {

            $form->bind($request);
            //Tools::dump($form,true);
            $om = $this->container->get('doctrine.orm.entity_manager');

            if ($form->isValid()) {
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);

                // get default devise

                //$user->setDevise($devise);

                $login = $user->getUsername();
                $password = $user->getPlainPassword();
                $userManager->createUser($user);
                
                $om->persist($user);
                $om->flush();
                $url = $this->container->get('router')->generate('show_users');
                $response = new RedirectResponse($url);
                return $response;
            }
        }

        return $this->container->get('templating')->renderResponse(
            'UserUserBundle:Registration:edit.html.twig', array('form' => $form->createView(), 'file' => '')
        );
    }

}
