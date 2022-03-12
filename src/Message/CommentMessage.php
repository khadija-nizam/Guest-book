<?php
namespace App\Message;

class CommentMessage
{
    private int $id;
    private array $context;
    private string $reviewUrl;

    /**
     * @param int $id
     * @param string $reviewUrl
     * @param array $context
     */
    public function __construct(int $id, string $reviewUrl, array $context = [])
    {
        $this->id = $id;
        $this->reviewUrl = $reviewUrl;
        $this->context = $context;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContext(): array
    {
        return $this->context;
    }

    public function getReviewUrl(): string
    {
        return $this->reviewUrl;
    }
}