<?php

namespace Tweakers\Test\MockableService;

use ProxyManager\Generator\MethodGenerator;
use Zend\Code\Generator\PropertyGenerator;

/**
 * Generator for a restore-method that restores the original service as 'the service to use' within the proxy.
 *
 * It generates this method:
 *
 * public function restoreOriginalServices(object $original) : void
 * {
 *   $this->originalService = $original;
 *   $this->valueHolder = $original;
 * }
 *
 * @author Arjen van der Meijden <acm@tweakers.net>
 */
class RestoreOriginalsGenerator extends MethodGenerator
{
    public function __construct(PropertyGenerator $original, PropertyGenerator $valueHolder)
    {
        parent::__construct('restoreOriginalServices');

        $this->setDocBlock('{@inheritDoc}');
        $this->setReturnType('void');

        $this->setBody('$this->' . $valueHolder->getName() . ' = $this->' . $original->getName() . ';');
    }
}
