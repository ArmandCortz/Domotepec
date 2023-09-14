<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Dumper;

use Symfony\Component\Translation\MessageCatalogue;

/**
 * IniFileDumper generates an ini formatted string representation of a message catalogue.
 *
 * @author Stealth35
 */
class IniFileDumper extends FileDumper
{
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function formatCatalogue(MessageCatalogue $messages, string $domain, array $options = [])
=======
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
    public function formatCatalogue(MessageCatalogue $messages, string $domain, array $options = []): string
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    {
        $output = '';

        foreach ($messages->all($domain) as $source => $target) {
            $escapeTarget = str_replace('"', '\"', $target);
            $output .= $source.'="'.$escapeTarget."\"\n";
        }

        return $output;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    protected function getExtension()
=======
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
    protected function getExtension(): string
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    {
        return 'ini';
    }
}
