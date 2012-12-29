<?php
namespace Kaan\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Kaan\AppBundle\Entity\User;
use Kaan\AppBundle\Entity\Role;
use Kaan\AppBundle\Entity\Group;
class Load implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $roleadmin = new Role();
        $roleadmin->setName('ROLE_ADMIN');
        $manager->persist($roleadmin);
        $manager->flush();

        $roleuser = new Role();
        $roleuser->setName('ROLE_USER');
        $manager->persist($roleuser);
        $manager->flush();

        $admingroup = new Group();
        $admingroup->setName('Admin');
        $admingroup->addGroupRole($roleadmin);
        $manager->persist($admingroup);
        $manager->flush();

        $usergroup = new Group();
        $usergroup->setName('Members');
        $manager->persist($usergroup);
        $manager->flush();

        $user = new User();
        $user->setUsername('SuFFLee');
        $user->setBirthday(new \DateTime());
        $user->setEmail('ibrahimkaanerkol@gmail.com');
        $user->setFirstName('Kaan');
        $user->setLastName('Erkol');
        $user->setSalt(md5(time()));
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $user->setPassword($encoder->encodePassword('13871387', $user->getSalt()));
        $user->addUserRole($roleuser);
        $user->addUserGroup($admingroup);
        $manager->persist($user);
        $manager->flush();

        $alfa = new User();
        $alfa->setUsername('Testuser');
        $alfa->setFirstName('Test');
        $alfa->setLastName('user');
        $alfa->setEmail('test@testuser.com');
        $alfa->setSalt(md5(time()));
        $alfa->setPassword($encoder->encodePassword('13871387a', $alfa->getSalt()));
        $alfa->setBirthday(new \DateTime());
        $alfa->addUserRole($roleuser);
        $alfa->addUserGroup($usergroup);

        $manager->persist($alfa);
        $manager->flush();

    }
}