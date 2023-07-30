<?php

namespace App\Entity;

use App\Repository\ShortenerRepository;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShortenerRepository::class)]
class Shortener
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    public function __construct(array $data)
    {
        if (isset($data['code'])) {
            $this->code = $data['code'];
        }

        if (isset($data['url'])) {
            $this->url = $data['url'];
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }



}
