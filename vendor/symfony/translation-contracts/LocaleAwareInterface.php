<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Contracts\Translation;

interface LocaleAwareInterface
{
    /**
     * Sets the current locale.
     *
<<<<<<< HEAD
     * @param string $locale The locale
=======
<<<<<<< HEAD
=======
     * @return void
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
     *
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
     * @throws \InvalidArgumentException If the locale contains invalid characters
     */
    public function setLocale(string $locale);

    /**
     * Returns the current locale.
     *
     * @return string
     */
    public function getLocale();
}
