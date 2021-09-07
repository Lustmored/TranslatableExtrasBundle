<?php
declare(strict_types=1);

namespace Lustmored\TranslatableExtrasBundle\Translation;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class ImplodedTranslatableMessage implements TranslatableInterface
{
    use TransParamsTrait;

    public function __construct(
        private string $glue = '',
        array $parameters = []
    ) {
        $this->parameters = $parameters;
    }

    public function trans(TranslatorInterface $translator, string $locale = null): string
    {
        return implode($this->glue, $this->transParameters($translator, $locale));
    }
}
