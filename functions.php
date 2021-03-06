<?php

declare(strict_types=1);

namespace Lustmored\TranslatableExtrasBundle\Translation;

use JetBrains\PhpStorm\Pure;

if (!function_exists('Lustmored\TranslatableExtrasBundle\Translation\\ft')) {
    #[Pure]
    function ft(string $format, ...$params): FormattedTranslatableMessage
    {
        return new FormattedTranslatableMessage($format, ...$params);
    }
}
if (!function_exists('Lustmored\TranslatableExtrasBundle\Translation\\nt')) {
    #[Pure]
    function nt(string $message): NotTranslatableMessage
    {
        return new NotTranslatableMessage($message);
    }
}
if (!function_exists('Lustmored\TranslatableExtrasBundle\Translation\\it')) {
    #[Pure]
    function it(string $glue = '', array $params = []): ImplodedTranslatableMessage
    {
        return new ImplodedTranslatableMessage($glue, $params);
    }
}
