<?php declare(strict_types=1);

namespace ApiClients\Foundation\ValueObjects;

final class Url implements UrlInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * Url constructor.
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getUrl();
    }
}
