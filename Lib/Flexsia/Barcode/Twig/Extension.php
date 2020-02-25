<?php
namespace Flexsia\Barcode\Twig;

use Flexsia\Barcode\Generator;

class Extension extends \Flexsia\Render\Extension {




    final public function init(){
        $this->registerFunction('svg_barcode_markup', array($this, 'generateBarcode'));
        $this->registerFunction('svg_barcode_datauri', array($this, 'generateBarcodeDataUri'));
    }


    /**
     * @param string     $data
     * @param string     $type
     * @param null       $color
     * @param array|null $options
     * @return string
     * @throws \Exception
     */
    final public function generateBarcode($data, $type, $color=null, array $options=null){
        return $this->getBarcodeFactory()->getSvg($data, $type, $color, $options);
    }


    /**
     * @param string     $data
     * @param string     $type
     * @param null       $color
     * @param array|null $options
     * @return string
     * @throws \Exception
     */
    final public function generateBarcodeDataUri($data, $type, $color=null, array $options=null){
        $svgCode = $this->generateBarcode($data, $type, $color, $options);
        return sprintf('data:image/svg+xml;base64,%s', base64_encode($svgCode));
    }


    /**
     * @var Generator
     */
    protected $barcodeFactory;

    protected function getBarcodeFactory(){
        if(!$this->barcodeFactory){
            $this->barcodeFactory = new Generator();
        }
        return $this->barcodeFactory;
    }

}