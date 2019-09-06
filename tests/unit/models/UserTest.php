<?php

namespace tests\unit\models;

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        expect_that($user = User::findIdentity(69));
        expect($user->username)->equals('bandit');

        expect_not(User::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($user = User::findIdentityByAccessToken('bandit-authkey'));
        expect($user->username)->equals('bandit');

        expect_not(User::findIdentityByAccessToken('non-existing'));        
    }

    public function testFindUserByUsername()
    {
        expect_that($user = User::findByUsername('bandit'));
        expect_not(User::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = User::findByUsername('bandit');
        expect_that($user->validateAuthKey('bandit-authkey'));
        expect_not($user->validateAuthKey('test102key'));

        expect_that($user->validatePassword('123456'));
        expect_not($user->validatePassword('admin'));
    }

}
