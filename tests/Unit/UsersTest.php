<?php

namespace App\Tests\Unit;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class UsersTest extends KernelTestCase
{
    public function getEntity(): Users{
        return (new Users())
        ->setFirstname('firstname')
        ->setLastname('lastname')
        ->setEmail('test@test.fr');


    }
    public function testInvalidFirstname(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $users = $this->getEntity();
        $users->setEmail('');
        $error = $container->get('validator')->validate($users);
        $this->assertCount(1, $error);
    }
    public function testSamePassword()
    {
        
        $users = $this->getEntity();
        $user = static::getContainer()->get('doctrine.orm.entity_manager')->find(Users::class, 1);
        $users->setPassword('azerty');
        return assertTrue($user->getPassword() === $users->getPassword());
        
    }
}
