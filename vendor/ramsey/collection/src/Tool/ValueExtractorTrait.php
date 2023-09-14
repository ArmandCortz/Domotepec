<?php

/**
 * This file is part of the ramsey/collection library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace Ramsey\Collection\Tool;

use Ramsey\Collection\Exception\ValueExtractionException;

<<<<<<< HEAD
use function get_class;
=======
<<<<<<< HEAD
use function get_class;
=======
use function is_array;
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
use function is_object;
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
use function method_exists;
use function property_exists;
use function sprintf;

/**
 * Provides functionality to extract the value of a property or method from an object.
 */
trait ValueExtractorTrait
{
    /**
     * Extracts the value of the given property or method from the object.
     *
     * @param mixed $object The object to extract the value from.
     * @param string $propertyOrMethod The property or method for which the
     *     value should be extracted.
     *
     * @return mixed the value extracted from the specified property or method.
     *
     * @throws ValueExtractionException if the method or property is not defined.
     */
<<<<<<< HEAD
    protected function extractValue($object, string $propertyOrMethod)
=======
<<<<<<< HEAD
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
    protected function extractValue($object, string $propertyOrMethod)
=======
    protected function extractValue(mixed $element, ?string $propertyOrMethod): mixed
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    {
        if (!is_object($object)) {
            throw new ValueExtractionException('Unable to extract a value from a non-object');
        }

        if (property_exists($object, $propertyOrMethod)) {
            return $object->$propertyOrMethod;
        }

        if (method_exists($object, $propertyOrMethod)) {
            return $object->{$propertyOrMethod}();
        }

<<<<<<< HEAD
        throw new ValueExtractionException(
            sprintf('Method or property "%s" not defined in %s', $propertyOrMethod, get_class($object))
        );
=======
<<<<<<< HEAD
        throw new ValueExtractionException(
            // phpcs:ignore SlevomatCodingStandard.Classes.ModernClassNameReference.ClassNameReferencedViaFunctionCall
            sprintf('Method or property "%s" not defined in %s', $propertyOrMethod, get_class($object)),
        );
=======
        if (property_exists($element, $propertyOrMethod)) {
            return $element->$propertyOrMethod;
        }

        if (method_exists($element, $propertyOrMethod)) {
            return $element->{$propertyOrMethod}();
        }

        throw new InvalidPropertyOrMethod(sprintf(
            'Method or property "%s" not defined in %s',
            $propertyOrMethod,
            $element::class,
        ));
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    }
}
