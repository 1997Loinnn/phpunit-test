<?php 

use Learning\Box;
use PHPUnit\Framework\TestCase;


class BoxTest extends TestCase 
{
    private Box $box;

    protected function setUp(): void 
    {
        $this->box = new Box(['Qalam', 'Ruchka', 'Qaychi']);
    }

    public function test_qutini_ichida_element_bor()
    {

        $this->assertTrue($this->box->has('Qalam'));
        $this->assertFalse($this->box->has('Igna'));
    }

    public function test_qutidan_elementni_olish()
    {
        $this->assertEquals('Qalam', $this->box->takeOne());
        $this->assertNotContains('Qalam', $this->box->items);
    } 

    public function test_bosh_harfli_elementlar_kelyapti()
    {
        $natija = $this->box->startsWith('Q');

        $this->assertCount(2, $natija);
        $this->assertContains('Qalam', $natija);
        $this->assertContains('Qaychi', $natija);

        $this->assertEmpty($this->box->startsWith('P'));
    }

    public function test_qutiga_element_qoshsa_bolyapti()
    {
        $ish = $this->box->addItem('Non');

        $this->assertTrue($ish);
        $this->assertContains('Non', $this->box->items);
    }

    public function test_qutidan_nomi_berilgan_elementni_olib_tashlasa_bolyapdi()
    {
        $ish = $this->box->removeItem('Qaychi');

        $this->assertTrue($ish);
        $this->assertNotContains('Qaychi', $this->box->items);
    }
}