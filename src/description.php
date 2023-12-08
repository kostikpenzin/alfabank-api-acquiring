<?php

return [
    'baseUrl' => 'https://alfa.rbsuat.com',
    'operations' => [
        'register' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/register.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'orderNumber' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'amount' => [
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
                'currency' => [
                    'required' => false,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
                'returnUrl' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'failUrl' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'description' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'language' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'pageView' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'clientId' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'merchantLogin' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'jsonParams' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'formParam',
                ],
                'sessionTimeoutSecs' => [
                    'required' => false,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
                'expirationDate' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'bindingId' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'features' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
        'registerPreAuth' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/registerPreAuth.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'orderNumber' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'amount' => [
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
                'currency' => [
                    'required' => false,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
                'returnUrl' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'failUrl' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'description' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'language' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'pageView' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'clientId' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'merchantLogin' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'jsonParams' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'formParam',
                ],
                'sessionTimeoutSecs' => [
                    'required' => false,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
                'expirationDate' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'bindingId' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'features' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
        'deposit' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/deposit.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'orderId' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'amount' => [
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
            ],
        ],
        'getOrderStatus' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/getOrderStatus.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'orderId' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'language' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
        'getOrderStatusExtended' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/getOrderStatusExtended.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'orderId' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'orderNumber' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'language' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
        'reverse' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/reverse.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'orderId' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'language' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
        'refund' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/refund.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'orderId' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'amount' => [
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
            ],
        ],
        'verifyEnrollment' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/verifyEnrollment.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'pan' => [
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
            ],
        ],
        'addParams' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/addParams.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'orderId' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'language' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'params' => [
                    'required' => true,
                    'type' => 'array',
                    'location' => 'formParam',
                ],
            ],
        ],
        'getLastOrdersForMerchants' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/getLastOrdersForMerchants.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'language' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'page' => [
                    'required' => false,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
                'size' => [
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
                'from' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'to' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'transactionStates' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'merchants' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'searchByCreatedDate' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
        'paymentotherway' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/paymentotherway.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'MDORDER' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'paymentWay' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'language' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
        'paymentOrderBinding' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/paymentOrderBinding.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'mdOrder' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'bindingId' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'language' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'ip' => [
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
                'cvc' => [
                    'required' => false,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
                'email' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
        'unBindCard' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/unBindCard.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'bindingId' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
        'bindCard' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/bindCard.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'bindingId' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
        'extendBinding' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/extendBinding.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'bindingId' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'newExpiry' => [
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
                'language' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
        'getBindings' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/getBindings.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'clientId' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
        'getBindingsByCardOrId' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/getBindingsByCardOrId.do',
            'responseModel' => 'Result',
            'parameters' => [
                'userName' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'pan' => [
                    'required' => false,
                    'type' => 'numeric',
                    'location' => 'formParam',
                ],
                'bindingId' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'showExpired' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
            ],
        ],
        'payment' => [
            'httpMethod' => 'POST',
            'uri' => '/payment/rest/payment.do',
            'responseModel' => 'Result',
            'parameters' => [
                'merchant' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'orderNumber' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'token' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'description' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'language' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'additionalParameters' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'formParam',
                ],
                'clientId' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'preAuth' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'paymentToken' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ],
        ],
    ],
    'models' => [
        'Result' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json'
            ]
        ]
    ]
];
