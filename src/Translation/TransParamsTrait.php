<?php
declare(strict_types=1);

namespace Lustmored\TranslatableExtrasBundle\Translation;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

trait TransParamsTrait
{
    private array $parameters = [];

    public function transParameters(
        TranslatorInterface $translator,
        ?string $locale
    ): array
    {
        return array_map(
            static fn ($param) => $param instanceof TranslatableInterface
                ? $param->trans(
                    $translator,
                    $locale
                )
                : $param,
            $this->parameters
        );
    }
}
