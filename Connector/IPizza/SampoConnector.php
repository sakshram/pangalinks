<?php
namespace TFox\PangalinkBundle\Connector\IPizza;

use Symfony\Component\HttpFoundation\Request;
use TFox\PangalinkBundle\Exception\UnsupportedServiceIdException;
use TFox\PangalinkBundle\Connector\IPizza\AbstractIPizzaConnector;
use TFox\PangalinkBundle\TFoxPangalinkBundle;

/**
 * Connector for Sampo Bank (Danske)
 *
 */
class SampoConnector extends AbstractIPizzaConnector
{

	public function __construct($pangalinkService, $accountId, $configuration)
	{
		$this->configuration = array(
			'service_id' => '1001',
			'version' => '008',
			'charset' => 'utf-8',
			'private_key_password' => null,
			'service_url' => 'https://www2.danskebank.ee/ibank/pizza/pizza',
			'currency' => 'EUR',
			'reference_number' => '',
			'language' => 'EST'	
		);		
		
		$this->buttonImages = array(
			'88x31' => $this->assetImagesPrefix.'danske_1.gif',
			'88x31_anim' => $this->assetImagesPrefix.'danske_2.gif',
			'120x60_1' => $this->assetImagesPrefix.'danske_3.gif',
            '120x60_2' => $this->assetImagesPrefix.'danske_5.png',
			'180x70' => $this->assetImagesPrefix.'danske_4.gif'
		);
		
		parent::__construct($pangalinkService, $accountId, $configuration);
	}
	
	public function processPayment(Request $request)
	{
		parent::processPayment($request);
		$this->bankResponse->setCharset('ISO-8859-1');
	}
	
	public function getBankName()
	{
		return TFoxPangalinkBundle::BANK_DANSKE;
	}
}
