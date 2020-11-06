<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/register/admin", name="app_register_one_admin")
     * @param UserRepository $repository
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param EntityManagerInterface $manager
     * @param LoginFormAuthenticator $authenticator
     * @param GuardAuthenticatorHandler $handler
     * @return Response
     */
    public function registerOneAdmin(UserRepository $repository, Request $request,
                                     UserPasswordEncoderInterface $encoder,
                                     EntityManagerInterface $manager,
                                     LoginFormAuthenticator $authenticator,
                                     GuardAuthenticatorHandler $handler)
    {
        $admin = $repository->findByRole('ROLE_ADMIN');
        if (sizeof($admin) > 0) {
            $this->addFlash('error', 'An admin user already exist');
            return $this->redirectToRoute('app_login');
        }
        if ($request->getMethod() == 'POST') {
            $email = $request->request->get('email');
            $password = $request->request->get('password');
            if($email == null || $password == null){
                $this->addFlash('error','Please enter a email and password');
                return $this->redirectToRoute('app_register_one_admin');
            }
            $admin = new User();
            $admin->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
            $admin->setEmail($email);
            $admin->setPassword($password);
            $password = $encoder->encodePassword($admin, $password);
            $admin->setPassword($password);
            $manager->persist($admin);
            $manager->flush();
            return $handler->authenticateUserAndHandleSuccess(
                    $admin,
                    $request,
                    $authenticator,
                    'main'
                );
        }
        return $this->render('security/register.html.twig');
    }
}
