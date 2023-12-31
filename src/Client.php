<?php

namespace kostikpenzin\AlfabankApiAcquiring;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;


/**
 * Class Client
 * @package kostikpenzin\AlfabankApiAcquiring
 * @method register(array $params)
 * @method registerPreAuth(array $params)
 * @method deposit(array $params)
 * @method getOrderStatus(array $params)
 * @method getOrderStatusExtended(array $params)
 * @method reverse(array $params)
 * @method refund(array $params)
 * @method verifyEnrollment(array $params)
 * @method addParams(array $params)
 * @method getLastOrdersForMerchants(array $params)
 * @method paymentotherway(array $params)
 * @method paymentOrderBinding(array $params)
 * @method unBindCard(array $params)
 * @method bindCard(array $params)
 * @method extendBinding(array $params)
 * @method getBindings(array $params)
 * @method getBindingsByCardOrId(array $params)
 * @method payment(array $params)
 */
class Client extends GuzzleClient
{

    /**
     * Constructs a new instance of the class.
     *
     * @param array $config An optional array of configuration options.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return void
     */
    public function __construct(array $config = [])
    {

        if (isset($config['baseUrl'])) {
            $config['baseUrl'] = $config['baseUrl'];
        } else {
            $config['baseUrl'] = 'https://alfa.rbsuat.com';
        }

        $description = new Description(
            (new Setting())->init($config['baseUrl'])
        );

        parent::__construct(
            new HttpClient(),
            $description,
            //new Description($config),
            null,
            null,
            null,
            $config
        );

        $this->setDefaults($config);
    }

    /**
     * Sets the default values for the configuration.
     *
     * @param array $config The configuration array.
     * @throws \InvalidArgumentException If the configuration is invalid.
     * @return void
     */
    private function setDefaults(array $config)
    {
        // Initialize an empty array for defaults
        $defaults = [];

        // Check if 'token' key exists in the config array
        if (isset($config['token'])) {
            // If 'token' key exists, set the value in defaults array
            $defaults['token'] = $config['token'];
        } else {
            // If 'token' key does not exist, check if 'userName' and 'password' keys exist
            if (!isset($config['userName'])) {
                // If 'userName' key does not exist, throw an exception
                throw new \InvalidArgumentException(
                    'You must provide a userName.'
                );
            }
            if (!isset($config['password'])) {
                // If 'password' key does not exist, throw an exception
                throw new \InvalidArgumentException(
                    'You must provide a password.'
                );
            }

            // Set the values of 'userName' and 'password' keys in defaults array
            $defaults['userName'] = $config['userName'];
            $defaults['password'] = $config['password'];
        }



        // Set the 'defaults' key in the configuration using setConfig method
        $this->setConfig('defaults', $defaults);
    }
}
