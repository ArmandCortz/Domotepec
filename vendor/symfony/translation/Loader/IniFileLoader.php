<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

/**
 * IniFileLoader loads translations from an ini file.
 *
 * @author stealth35
 */
class IniFileLoader extends FileLoader
{
<<<<<<< HEAD
=======
    /**
     * {@inheritdoc}
     */
>>>>>>> 6f111f94ea227f79697cd9b5057e32b9b3fc8ddf
    protected function loadResource(string $resource): array
    {
        return parse_ini_file($resource, true);
    }
}
