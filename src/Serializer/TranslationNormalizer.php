<?php
declare(strict_types=1);

namespace Lustmored\TranslatableExtrasBundle\Serializer;

use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class TranslationNormalizer implements ContextAwareNormalizerInterface, CacheableSupportsMethodInterface
{
    public function __construct(private TranslatorInterface $translator)
    {
    }

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof TranslatableInterface;
    }

    public function normalize($object, string $format = null, array $context = []): string
    {
        \assert($object instanceof TranslatableInterface);

        return $object->trans($this->translator, $context['locale'] ?? null);
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}
