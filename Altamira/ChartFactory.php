<?php

namespace Malwarebytes\AltamiraBundle\Altamira;

class ChartFactory {
    protected $library;
    private $logger;


    function __construct($library,$logger) {
        $this->logger=$logger;
        $this->setLibrary($library);
    }


    public function setLibrary($library) {
        $this->logger->debug("Altamira library set to ".$library."!");
        $this->library=$library;

        if ($library == 'flot') {
            ChartRenderer::pushRenderer( 'Malwarebytes\AltamiraBundle\Altamira\ChartRenderer\DefaultRenderer' );
            ChartRenderer::pushRenderer( 'Malwarebytes\AltamiraBundle\Altamira\ChartRenderer\TitleRenderer' );
        }
    }


    public function createChart($name) {
        return new Chart($name,$this->library);
    }


    public function getChartIterator(array $charts) {
        return new ChartIterator($charts);
    }
}
?>
