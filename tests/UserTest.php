<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $user->setEmail('user@user.com')
            ->setPseudo('cocobico')
            ->setPassword('password')
            ->setNom('cozette')
            ->setPrenom('anthony')
            ->setAdresse('4 rue des roses')
            ->setCodePostal('91380')
            ->setVille('chilly');

        $this->assertTrue($user->getEmail() === 'user@user.com');
        $this->assertTrue($user->getPseudo() === 'cocobico');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getNom() === 'cozette');
        $this->assertTrue($user->getPrenom() === 'anthony');
        $this->assertTrue($user->getAdresse() === '4 rue des roses');
        $this->assertTrue($user->getCodePostal() === '91380');
        $this->assertTrue($user->getVille() === 'chilly');
    }

    public function testIsFalse()
    {
        $user = new User();

        $user->setEmail('false@user.com')
            ->setPseudo('cocobico')
            ->setPassword('password')
            ->setNom('cozette')
            ->setPrenom('anthony')
            ->setAdresse('4 rue des roses')
            ->setCodePostal('91380')
            ->setVille('chilly');

        $this->assertFalse($user->getEmail() === 'false@user.com');
        $this->assertFalse($user->getPseudo() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getAdresse() === 'false');
        $this->assertFalse($user->getCodePostal() === 'false');
        $this->assertFalse($user->getVille() === 'false');
    }

    public function testIsEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPseudo());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getAdresse());
        $this->assertEmpty($user->getCodePostal());
        $this->assertEmpty($user->getVille());
    }
}
