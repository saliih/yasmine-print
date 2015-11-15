<?php

namespace User\UserBundle\Controller;

use Back\DashBundle\Common\Tools;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use User\UserBundle\Form\UserForm;

/**
 * Controller managing the user profile
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class DefaultController extends ContainerAware {

    /**
     * Show the user
     */
    public function showAction() {
        //$user = $this->container->get('security.context')->getToken->findAll();
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUsers();

        return $this->container->get('templating')->renderResponse('UserUserBundle:Default:show.html.twig', array('users' => $user));
    }
    public function showclientAction() {
        //$user = $this->container->get('security.context')->getToken->findAll();
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUsers();
        
        //echo "<pre>";print_r($userManager->findUsers());exit;
        return $this->container->get('templating')->renderResponse('UserUserBundle:Default:show2.html.twig', array('users' => $user));
    }

    /**
     * Edit the user
     */
    public function registerAction(Request $request) {
        $form = $this->container->get('fos_user.registration.form');
        $formHandler = $this->container->get('fos_user.registration.form.handler');
        $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');

        $process = $formHandler->process($confirmationEnabled);
        if ($process) {
            $user = $form->getData();

            /*             * ***************************************************
             * Add new functionality (e.g. log the registration) *
             * *************************************************** */
            $this->container->get('logger')->info(
                    sprintf('New user registration: %s', $user)
            );

            if ($confirmationEnabled) {
                $this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
                $route = 'fos_user_registration_check_email';
            } else {
                $this->authenticateUser($user);
                $route = 'fos_user_registration_confirmed';
            }

            $this->setFlash('fos_user_success', 'registration.flash.user_created');
            $url = $this->container->get('router')->generate($route);

            return new RedirectResponse($url);
        }

        return $this->container->get('templating')->renderResponse('UserUserBundle:Default:edit.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

}
