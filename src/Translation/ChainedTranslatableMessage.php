<?php
declare(strict_types=1);

namespace Lustmored\TranslatableExtrasBundle\Translation;

use Symfony\Component\Translation\TranslatableMessage;
use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use function Symfony\Component\Translation\t;

class ChainedTranslatableMessage implements TranslatableInterface
{
    use TransParamsTrait;

    public function __construct(
        private TranslatableMessage $message,
        array $parameters = [],
        private ?string $domain = null
    ) {
        $this->parameters = $parameters;
    }

    public function trans(TranslatorInterface $translator, string $locale = null): string
    {
        return t(
            $this->message->getMessage(),
            $this->transParameters($translator, $locale),
            $this->domain
        )->trans($translator);
    }
}
