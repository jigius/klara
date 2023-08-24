<?php

namespace App\Local;

use Psr\Log\LoggerInterface;

/**
 * Contract is used for the interaction with an outdoor service
 */
interface OutdoorServiceInterface
{
    /**
     * Process a request to an outdoor service
     * @param string $email
     * @param string $message
     * @return void
     */
    public function process(string $email, string $message): void;

    /**
     * Injects info about user's login
     * @param string $login
     * @return OutdoorServiceInterface
     */
    public function withLogin(string $login): OutdoorServiceInterface;

    /**
     * Injects info about user's password
     * @param string $password
     * @return OutdoorServiceInterface
     */
    public function withPassword(string $password): OutdoorServiceInterface;

    /**
     * Injects info about api's endpoint
     * @param string $url
     * @return OutdoorServiceInterface
     */
    public function withEndpoint(string $url): OutdoorServiceInterface;

    /**
     * Injects logger instance
     * @param LoggerInterface $log
     * @return OutdoorServiceInterface
     */
    public function withLog(LoggerInterface $log): OutdoorServiceInterface;
}
