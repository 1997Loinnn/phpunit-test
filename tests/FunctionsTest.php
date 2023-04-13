<?php 
use PHPUnit\Framework\TestCase;

require 'functions.php';

class FunctionsTest extends TestCase
{
    public function testTest()
    {
        $this->assertTrue(true);
    }

    public function testAddNumber()
    {
        $natija = addNumbers(10,25);

        $this->assertSame(35, $natija);
    }

    public function test_sonloar_notogri_qushilsa_xato()
    {
        $this->assertNotEquals(35, addNumbers(10,23));
    }

    public function test_bir_nolga_teng_emas()
    {
        $this->assertNotSame(0,1);
    }

    public function test_bir_birga_teng()
    {
        $this->assertEquals(1,1);
    }

    public function test_array_qaytarilyapti()
    {
        $this->assertIsArray(returnCars());
    }

    /** @test */
    public function berilgan_kalit_bor()
    {
        $this->assertArrayHasKey(2, returnCars());
    }

    public function test_oltinchi_kalit_mavjud_emas()
    {
        $this->assertArrayNotHasKey(10, returnCars());
    }
}