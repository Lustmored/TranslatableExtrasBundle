<?php
declare(strict_types=1);

namespace Lustmored\TranslatableExtrasBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TranslatableExtrasBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
