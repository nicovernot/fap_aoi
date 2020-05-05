<?php

// src/Mercure/CookieGenerator.php
namespace App\Mercure;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key;
use Symfony\Component\HttpFoundation\Cookie;
use Psr\Log\LoggerInterface;

class CookieGenerator
{
    private $secret;
    private $logger;

    public function __construct(string $secret,LoggerInterface $logger)
    {
        $this->secret = $secret;
        $this->logger = $logger;
    }

    public function generate(): Cookie
    {
        $token = (new Builder())
            ->withClaim('mercure', ['subscribe' => ['*']])
            ->getToken(new Sha256(), new Key($this->secret));
            $this->logger->notice($token );
        return Cookie::create('mercureAuthorization', $token, 0, '/.well-known/mercure');
    }
}