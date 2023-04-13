<?php 

use Learning\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    private $sardor;

    protected function setUp(): void 
    {
        $this->sardor = new User(20, 'Sardor');
    }

    protected function tearDown(): void 
    {
        //
    }

    public function test_user_yaratsa_bolyapti()
    {
        $sardor = $this->sardor;

        $this->assertSame('Sardor', $sardor->name);
        $this->assertSame(20, $sardor->age);
        $this->assertEmpty($sardor->favorite_movies);
    }
    
    public function test_user_ismini_aytayapdi()
    {
        $sardor = $this->sardor;

        $this->assertIsString($sardor->tellName());
        $this->assertStringContainsString('Sardor', $sardor->tellName());
    }


    public function test_user_yoshini_aytayati()
    {
        $sardor = $this->sardor;
        $this->assertIsString($sardor->tellAge());
        $this->assertStringContainsString('20', $sardor->tellAge());
    }

    public function test_yaxshi_kurgan_kinoni_qoshish_bolyapti()
    {
        $sardor = $this->sardor;
        $ish = $sardor->addFavoriteMovie('IronMan');
        $this->assertTrue($ish);
        $this->assertContains('IronMan', $sardor->favorite_movies);
        $this->assertCount(1, $sardor->favorite_movies);
    }

    public function test_yashi_korgan_kinosini_olib_tashlash()
    {
        
        $sardor = $this->sardor;
        $sardor->addFavoriteMovie('SpriderMan');
        $sardor->addFavoriteMovie('Venom');
        
        $act = $sardor->removeFavoriteMovie('Venom');

        $this->assertTrue($act);
        $this->assertNotContains('Venom', $sardor->favorite_movies);
        $this->assertCount(1, $sardor->favorite_movies);
    }
}