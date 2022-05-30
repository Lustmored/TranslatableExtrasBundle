<?php

declare(strict_types=1);

namespace Lustmored\TranslatableExtrasBundle\Translation;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class FormattedTranslatableMessage implements TranslatableInterface
{
    use TransParamsTrait;

    public function __construct(
        private readonly string $format,
        ...$parameters
    ) {
        $this->parameters = $parameters;
    }

    public function trans(TranslatorInterface $translator, string $locale = null): string
    {
        return sprintf(
            $this->format,
            ...$this->transParameters($translator, $locale)
        );
    }
}
