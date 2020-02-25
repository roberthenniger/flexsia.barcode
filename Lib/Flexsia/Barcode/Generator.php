<?php
namespace Flexsia\Barcode;

use chillerlan\QRCode\QRCode;
use Picqer\Barcode\BarcodeGeneratorSVG;

final class Generator {


    const TYPE_CODE_39 = 'C39';
    const TYPE_CODE_39_CHECKSUM = 'C39+';
    const TYPE_CODE_39E = 'C39E'; // CODE 39 EXTENDED
    const TYPE_CODE_39E_CHECKSUM = 'C39E+'; // CODE 39 EXTENDED + CHECKSUM
    const TYPE_CODE_93 = 'C93';
    const TYPE_STANDARD_2_5 = 'S25';
    const TYPE_STANDARD_2_5_CHECKSUM = 'S25+';
    const TYPE_INTERLEAVED_2_5 = 'I25';
    const TYPE_INTERLEAVED_2_5_CHECKSUM = 'I25+';
    const TYPE_CODE_128 = 'C128';
    const TYPE_CODE_128_A = 'C128A';
    const TYPE_CODE_128_B = 'C128B';
    const TYPE_CODE_128_C = 'C128C';
    const TYPE_EAN_2 = 'EAN2'; // 2-Digits UPC-Based Extention
    const TYPE_EAN_5 = 'EAN5'; // 5-Digits UPC-Based Extention
    const TYPE_EAN_8 = 'EAN8';
    const TYPE_EAN_13 = 'EAN13';
    const TYPE_UPC_A = 'UPCA';
    const TYPE_UPC_E = 'UPCE';
    const TYPE_MSI = 'MSI'; // MSI (Variation of Plessey code)
    const TYPE_MSI_CHECKSUM = 'MSI+'; // MSI + CHECKSUM (modulo 11)
    const TYPE_POSTNET = 'POSTNET';
    const TYPE_PLANET = 'PLANET';
    const TYPE_RMS4CC = 'RMS4CC'; // RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)
    const TYPE_KIX = 'KIX'; // KIX (Klant index - Customer index)
    const TYPE_IMB = 'IMB'; // IMB - Intelligent Mail Barcode - Onecode - USPS-B-3200
    const TYPE_CODABAR = 'CODABAR';
    const TYPE_CODE_11 = 'CODE11';
    const TYPE_PHARMA_CODE = 'PHARMA';
    const TYPE_PHARMA_CODE_TWO_TRACKS = 'PHARMA2T';


    const TYPE_QR           = 'QR';

    /*
    const TYPE_QR_VARIANT_1 = 'QRVARIANT1';
    const TYPE_QR_VARIANT_2 = 'QRVARIANT2';
    const TYPE_QR_VARIANT_3 = 'QRVARIANT3';
    const TYPE_QR_VARIANT_4 = 'QRVARIANT4';
    const TYPE_QR_VARIANT_5 = 'QRVARIANT5';
    const TYPE_QR_VARIANT_6 = 'QRVARIANT6';
    const TYPE_QR_VARIANT_7 = 'QRVARIANT7';
    const TYPE_QR_VARIANT_8 = 'QRVARIANT8';
    const TYPE_QR_VARIANT_9 = 'QRVARIANT9';
    const TYPE_QR_VARIANT_10 = 'QRVARIANT10';
    const TYPE_QR_VARIANT_11 = 'QRVARIANT11';
    const TYPE_QR_VARIANT_12 = 'QRVARIANT12';
    const TYPE_QR_VARIANT_13 = 'QRVARIANT13';
    const TYPE_QR_VARIANT_14 = 'QRVARIANT14';
    const TYPE_QR_VARIANT_15 = 'QRVARIANT15';
    const TYPE_QR_VARIANT_16 = 'QRVARIANT16';
    const TYPE_QR_VARIANT_17 = 'QRVARIANT17';
    const TYPE_QR_VARIANT_18 = 'QRVARIANT18';
    const TYPE_QR_VARIANT_19 = 'QRVARIANT19';
    const TYPE_QR_VARIANT_20 = 'QRVARIANT20';
    const TYPE_QR_VARIANT_21 = 'QRVARIANT21';
    const TYPE_QR_VARIANT_22 = 'QRVARIANT22';
    const TYPE_QR_VARIANT_23 = 'QRVARIANT23';
    const TYPE_QR_VARIANT_24 = 'QRVARIANT24';
    const TYPE_QR_VARIANT_25 = 'QRVARIANT25';
    const TYPE_QR_VARIANT_26 = 'QRVARIANT26';
    const TYPE_QR_VARIANT_27 = 'QRVARIANT27';
    const TYPE_QR_VARIANT_28 = 'QRVARIANT28';
    const TYPE_QR_VARIANT_29 = 'QRVARIANT29';
    const TYPE_QR_VARIANT_30 = 'QRVARIANT30';
    const TYPE_QR_VARIANT_31 = 'QRVARIANT31';
    const TYPE_QR_VARIANT_32 = 'QRVARIANT32';
    const TYPE_QR_VARIANT_33 = 'QRVARIANT33';
    const TYPE_QR_VARIANT_34 = 'QRVARIANT34';
    const TYPE_QR_VARIANT_35 = 'QRVARIANT35';
    const TYPE_QR_VARIANT_36 = 'QRVARIANT36';
    const TYPE_QR_VARIANT_37 = 'QRVARIANT37';
    const TYPE_QR_VARIANT_38 = 'QRVARIANT38';
    const TYPE_QR_VARIANT_39 = 'QRVARIANT39';
    const TYPE_QR_VARIANT_40 = 'QRVARIANT40';



    const TYPE_QR_VARIANT_MAX_1 = 'QRVARIANTMAX1';
    const TYPE_QR_VARIANT_MAX_2 = 'QRVARIANTMAX2';
    const TYPE_QR_VARIANT_MAX_3 = 'QRVARIANTMAX3';
    const TYPE_QR_VARIANT_MAX_4 = 'QRVARIANTMAX4';
    const TYPE_QR_VARIANT_MAX_5 = 'QRVARIANTMAX5';
    const TYPE_QR_VARIANT_MAX_6 = 'QRVARIANTMAX6';
    const TYPE_QR_VARIANT_MAX_7 = 'QRVARIANTMAX7';
    const TYPE_QR_VARIANT_MAX_8 = 'QRVARIANTMAX8';
    const TYPE_QR_VARIANT_MAX_9 = 'QRVARIANTMAX9';
    const TYPE_QR_VARIANT_MAX_10 = 'QRVARIANTMAX10';
    const TYPE_QR_VARIANT_MAX_11 = 'QRVARIANTMAX11';
    const TYPE_QR_VARIANT_MAX_12 = 'QRVARIANTMAX12';
    const TYPE_QR_VARIANT_MAX_13 = 'QRVARIANTMAX13';
    const TYPE_QR_VARIANT_MAX_14 = 'QRVARIANTMAX14';
    const TYPE_QR_VARIANT_MAX_15 = 'QRVARIANTMAX15';
    const TYPE_QR_VARIANT_MAX_16 = 'QRVARIANTMAX16';
    const TYPE_QR_VARIANT_MAX_17 = 'QRVARIANTMAX17';
    const TYPE_QR_VARIANT_MAX_18 = 'QRVARIANTMAX18';
    const TYPE_QR_VARIANT_MAX_19 = 'QRVARIANTMAX19';
    const TYPE_QR_VARIANT_MAX_20 = 'QRVARIANTMAX20';
    const TYPE_QR_VARIANT_MAX_21 = 'QRVARIANTMAX21';
    const TYPE_QR_VARIANT_MAX_22 = 'QRVARIANTMAX22';
    const TYPE_QR_VARIANT_MAX_23 = 'QRVARIANTMAX23';
    const TYPE_QR_VARIANT_MAX_24 = 'QRVARIANTMAX24';
    const TYPE_QR_VARIANT_MAX_25 = 'QRVARIANTMAX25';
    const TYPE_QR_VARIANT_MAX_26 = 'QRVARIANTMAX26';
    const TYPE_QR_VARIANT_MAX_27 = 'QRVARIANTMAX27';
    const TYPE_QR_VARIANT_MAX_28 = 'QRVARIANTMAX28';
    const TYPE_QR_VARIANT_MAX_29 = 'QRVARIANTMAX29';
    const TYPE_QR_VARIANT_MAX_30 = 'QRVARIANTMAX30';
    const TYPE_QR_VARIANT_MAX_31 = 'QRVARIANTMAX31';
    const TYPE_QR_VARIANT_MAX_32 = 'QRVARIANTMAX32';
    const TYPE_QR_VARIANT_MAX_33 = 'QRVARIANTMAX33';
    const TYPE_QR_VARIANT_MAX_34 = 'QRVARIANTMAX34';
    const TYPE_QR_VARIANT_MAX_35 = 'QRVARIANTMAX35';
    const TYPE_QR_VARIANT_MAX_36 = 'QRVARIANTMAX36';
    const TYPE_QR_VARIANT_MAX_37 = 'QRVARIANTMAX37';
    const TYPE_QR_VARIANT_MAX_38 = 'QRVARIANTMAX38';
    const TYPE_QR_VARIANT_MAX_39 = 'QRVARIANTMAX39';
    const TYPE_QR_VARIANT_MAX_40 = 'QRVARIANTMAX40';
    */


    /**
     * @var string[]
     */
    private $AVAILABLE_CONSTANTS = array();
    private $AVAILABLE_CONSTANT_VALUES = array();

    final public function __construct(array $options=null){
        $constants = self::getConstants();
        $this->AVAILABLE_CONSTANTS = $constants;
        foreach($constants as $type => $value){
            $this->AVAILABLE_CONSTANT_VALUES[$value] = $type;
        }
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    static function getConstants() {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }


    /**
     * @param string     $content
     * @param string     $type
     * @param null       $color
     * @param array|null $options
     */
    /**
     * @param string     $data
     * @param string     $type
     * @param null       $color
     * @param array|null $options
     * @return string
     * @throws \Exception
     */
    final public function getSvg($data, $type, $color=null, array $options=null){
        // Check if type is really defined
        if(key_exists($type, $this->AVAILABLE_CONSTANTS)){
            $type = $this->AVAILABLE_CONSTANTS[$type];
        }elseif(!key_exists($type, $this->AVAILABLE_CONSTANT_VALUES)){
            throw new \Exception('Given barcode type is unknown');
        }

        if(in_array($type, array('QR'))){
            $qrcode = new QRCode(new \chillerlan\QRCode\QROptions([
                'outputType' => \chillerlan\QRCode\QRCode::OUTPUT_MARKUP_SVG,
                'eccLevel'   => \chillerlan\QRCode\QRCode::ECC_L,
                'markupDark'    =>  $color,
                'markupLight'   =>  'transparent',
                'quietzoneSize'=>   0
            ]));
            return $qrcode->render($data);
        }else{
            return (new BarcodeGeneratorSVG())->getBarcode('98befbaf-4a93-45e4-ba40-ff8d2ed66f11', $type, 2, 30, $color);
        }

    }

}