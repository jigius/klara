<?php

namespace App\Local;

use Psr\Log;
use InvalidArgumentException;
use Exception;

/**
 * Faked implementation of an outdoor service
 */
final class FakedService implements OutdoorServiceInterface
{
    /**
     * @var array{log: ?Log\LoggerInterface, login: ?string, password: ?string, endpoint: ?string}
     */
    private array $i;

    /**
     * Cntr
     */
    public function __construct()
    {
        $this->i = [];
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException|Exception
     */
    public function process(string $email, string $message): void
    {
        if (
            !isset($this->i["log"]) ||
            !isset($this->i["login"]) ||
            !isset($this->i["password"]) ||
            !isset($this->i["endpoint"])
        ) {
            throw new InvalidArgumentException();
        }
        sleep(random_int(2, 10));
        $this
            ->i["log"]
            ->info(
                implode(
                    ", ",
                    [
                        "url=`{$this->i["endpoint"]}`",
                        "login=`{$this->i["login"]}`",
                        "password=`{$this->i["password"]}`",
                        "email=`$email`",
                        "message(base64_encoded)=`" . base64_encode($message) . "`"
                    ]
                )
            );
    }

    /**
     * @inheritDoc
     */
    public function withLogin(string $login): self
    {
        $that = $this->blueprinted();
        $that->i["login"] = $login;
        return $that;
    }

    /**
     * @inheritDoc
     */
    public function withPassword(string $password): self
    {
        $that = $this->blueprinted();
        $that->i["password"] = $password;
        return $that;
    }

    /**
     * @inheritDoc
     */
    public function withEndpoint(string $url): self
    {
        $that = $this->blueprinted();
        $that->i["endpoint"] = $url;
        return $that;
    }

    /**
     * @inheritDoc
     */
    public function withLog(Log\LoggerInterface $log): self
    {
        $that = $this->blueprinted();
        $that->i["log"] = $log;
        return $that;
    }

    /**
     * Clones the instance
     * @return self
     */
    public function blueprinted(): self
    {
        $that = new self();
        $that->i = $this->i;
        return $that;
    }
}
