<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;



class PageInicialTest extends TestCase{

    public function testPageInicial(){

        $host = 'http://localhost:4444/wd/hub';
        $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

        $driver->navigate()->to('http://localhost:8000/eixos');

        self::assertStringContainsString('Eixos', $driver->getPageSource());
    }

}


?>