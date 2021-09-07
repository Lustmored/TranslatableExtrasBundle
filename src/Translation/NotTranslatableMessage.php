<?php
declare(strict_types=1);

namespace Lustmored\TranslatableExtrasBundle\Translation;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class NotTranslatableMessage implements TranslatableInterface
{
    public function __construct(private string $message)
    {
    }

    public function trans(TranslatorInterface $translator, string $locale = null): string
    {
        return $this->message;
    }
}
