<?php declare(strict_types=1);

namespace TheCodingMachine\PHPStan\Rules\TypeHints;

use PHPStan\Testing\RuleTestCase;

class MissingTypeHintRuleInMethodTest extends RuleTestCase
{
    protected function getRule(): \PHPStan\Rules\Rule
    {
        return new MissingTypeHintInMethodRule(
            $this->createBroker()
        );
    }

    public function testCheckCatchedException()
    {
        require_once __DIR__.'/data/typehints_in_methods.php';

        $this->analyse([__DIR__ . '/data/typehints_in_methods.php'], [
            [
                'In method "TheCodingMachine\PHPStan\Rules\TypeHints\data\Foo::test", parameter $no_type_hint has no type-hint and no @param annotation.',
                9,
            ],
            [
                'In method "TheCodingMachine\PHPStan\Rules\TypeHints\data\BazClass::notInherited", parameter $no_type_hint has no type-hint and no @param annotation.',
                37,
            ],

        ]);
    }
}
