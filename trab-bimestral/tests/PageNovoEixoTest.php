<?php 

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverKeys;

class PageNovoEixoTest extends PHPUnit\Framework\TestCase
{
    
    public function testPreencherEixo() {

        $host = 'http://localhost:4444/wd/hub';
        $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
        $driver->get('http://localhost:8000/eixos/create');

        $inputEixo = $driver->findElement(WebDriverBy::name('nome'));

        $inputEixo->sendKeys('Eixo Novoo');

        $inputEixo->sendKeys(WebDriverKeys::ENTER);

        self::assertSame('http://localhost:8000/eixos', $driver->getCurrentURL());
         
    }

}
?>



