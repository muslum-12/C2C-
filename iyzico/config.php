<?php

require_once('IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-cNhEexc99nAx9jIw05yxRWwFt2OTmbrl");
        $options->setSecretKey("sandbox-ZtqPMkL3uDC7eSaYU6u9m6ubcUN8BwOb");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        return $options;
    }
}