<?php

declare(strict_types=1);
namespace TYPO3\CMS\Screenshots\Tests\Unit\Util;

/*
 * This file is part of the TYPO3 project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use Typo3\CMS\Screenshots\Tests\Unit\Fixtures\ClassWithComments;
use Typo3\CMS\Screenshots\Tests\Unit\Fixtures\ClassWithNoComments;
use TYPO3\CMS\Screenshots\Util\ClassHelper;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class ClassHelperTest extends UnitTestCase
{
    /**
     * @test
     */
    public function extractMembersFromClassPrintsCodeAsIsInFile(): void
    {
        $class = ClassWithComments::class;
        $members = [
            'CONSTANT_ONE',
            'CONSTANT_ONE_ONE',
            'propertyOne',
            'propertyOneOne',
            'getPropertyOne',
            'getPropertyOneOne'
        ];
        $expected = <<<'NOWDOC'
class ClassWithComments
{
    protected const CONSTANT_ONE = 'CONSTANT_ONE';
    protected const CONSTANT_ONE_ONE = 'CONSTANT_ONE_ONE';

    protected string $propertyOne;

    protected string $propertyOneOne;

    public function getPropertyOne(): string
    {
        return $this->propertyOne;
    }

    public function getPropertyOneOne(): string
    {
        return $this->propertyOneOne;
    }
}
NOWDOC;
        self::assertEquals($expected, rtrim(ClassHelper::extractMembersFromClass($class, $members)));
    }

    /**
     * @test
     */
    public function extractMembersFromClassCanIncludeComments(): void
    {
        $class = ClassWithComments::class;
        $members = [
            'CONSTANT_ONE',
            'propertyOne',
            'getPropertyOne',
        ];
        $withComment = true;
        $expected = <<<'NOWDOC'
/**
 * The class with comments.
 */
class ClassWithComments
{
    protected const CONSTANT_ONE = 'CONSTANT_ONE';

    /**
     * @var string Property One
     */
    protected string $propertyOne;

    /**
     * @return string
     */
    public function getPropertyOne(): string
    {
        return $this->propertyOne;
    }
}
NOWDOC;
        self::assertEquals($expected, rtrim(ClassHelper::extractMembersFromClass($class, $members, $withComment)));
    }

    /**
     * @test
     */
    public function extractMembersFromClassThrowsReflectionExceptionIfMemberDoesNotExist(): void
    {
        $class = ClassWithComments::class;
        $members = ['member-does-not-exist'];
        $this->expectException(\ReflectionException::class);
        ClassHelper::extractMembersFromClass($class, $members);
    }

    /**
     * @test
     * @dataProvider getClassSignaturePrintsSignatureAsIsInFileDataProvider
     */
    public function getClassSignaturePrintsSignatureAsIsInFile(string $class, string $expected): void
    {
        self::assertEquals($expected, rtrim(ClassHelper::getClassSignature($class)));
    }

    public function getClassSignaturePrintsSignatureAsIsInFileDataProvider(): array
    {
        return [
            [
                'class' => ClassWithComments::class,
                'expected' => <<<'NOWDOC'
class ClassWithComments
{
%s
}
NOWDOC
            ],
            [
                'class' => ClassWithNoComments::class,
                'expected' => <<<'NOWDOC'
class ClassWithNoComments
{
%s
}
NOWDOC
            ]
        ];
    }

    /**
     * @test
     */
    public function getClassSignatureCanIncludeComment(): void
    {
        $class = ClassWithComments::class;
        $withComment = true;
        $expected = <<<'NOWDOC'
/**
 * The class with comments.
 */
class ClassWithComments
{
%s
}
NOWDOC;
        self::assertEquals($expected, rtrim(ClassHelper::getClassSignature($class, $withComment)));
    }

    /**
     * @test
     */
    public function getClassSignatureThrowsReflectionExceptionIfClassDoesNotExist(): void
    {
        $class = 'ClassDoesNotExist';
        $this->expectException(\ReflectionException::class);
        ClassHelper::getClassSignature($class);
    }

    /**
     * @test
     * @dataProvider getMethodCodePrintsCodeAsIsInFileDataProvider
     */
    public function getMethodCodePrintsCodeAsIsInFile(string $class, string $method, string $expected): void
    {
        self::assertEquals($expected, rtrim(ClassHelper::getMethodCode($class, $method)));
    }

    public function getMethodCodePrintsCodeAsIsInFileDataProvider(): array
    {
        return [
            [
                'class' => ClassWithComments::class,
                'method' => 'getPropertyOne',
                'expected' => <<<'NOWDOC'
    public function getPropertyOne(): string
    {
        return $this->propertyOne;
    }
NOWDOC
            ],
            [
                'class' => ClassWithNoComments::class,
                'method' => 'getPropertyOne',
                'expected' => <<<'NOWDOC'
    public function getPropertyOne(): string
    {
        return $this->propertyOne;
    }
NOWDOC
            ]
        ];
    }

    /**
     * @test
     */
    public function getMethodCodeCanIncludeComment(): void
    {
        $class = ClassWithComments::class;
        $method = 'getPropertyOne';
        $withComment = true;
        $expected = <<<'NOWDOC'
    /**
     * @return string
     */
    public function getPropertyOne(): string
    {
        return $this->propertyOne;
    }
NOWDOC;
        self::assertEquals($expected, rtrim(ClassHelper::getMethodCode($class, $method, $withComment)));
    }

    /**
     * @test
     */
    public function getMethodCodeThrowsReflectionExceptionIfMethodDoesNotExist(): void
    {
        $class = ClassWithComments::class;
        $method = 'methodDoesNotExist';
        $this->expectException(\ReflectionException::class);
        ClassHelper::getMethodCode($class, $method);
    }

    /**
     * @test
     * @dataProvider getPropertyCodePrintsCodeAsIsInFileDataProvider
     */
    public function getPropertyCodePrintsCodeAsIsInFile(string $class, string $property, string $expected): void
    {
        self::assertEquals($expected, rtrim(ClassHelper::getPropertyCode($class, $property)));
    }

    public function getPropertyCodePrintsCodeAsIsInFileDataProvider(): array
    {
        return [
            [
                'class' => ClassWithComments::class,
                'property' => 'propertyOne',
                'expected' => <<<'NOWDOC'
    protected string $propertyOne;
NOWDOC
            ],
            [
                'class' => ClassWithComments::class,
                'property' => 'propertyWithDefaultValue',
                'expected' => <<<'NOWDOC'
    protected string $propertyWithDefaultValue = 'DefaultValue';
NOWDOC
            ],
            [
                'class' => ClassWithNoComments::class,
                'property' => 'propertyOne',
                'expected' => <<<'NOWDOC'
    protected string $propertyOne;
NOWDOC
            ]
        ];
    }

    /**
     * @test
     */
    public function getPropertyCodeCanIncludeComment(): void
    {
        $class = ClassWithComments::class;
        $property = 'propertyOne';
        $withComment = true;
        $expected = <<<'NOWDOC'
    /**
     * @var string Property One
     */
    protected string $propertyOne;
NOWDOC;
        self::assertEquals($expected, rtrim(ClassHelper::getPropertyCode($class, $property, $withComment)));
    }

    /**
     * @test
     */
    public function getPropertyCodeThrowsReflectionExceptionIfPropertyDoesNotExist(): void
    {
        $class = ClassWithComments::class;
        $property = 'propertyDoesNotExist';
        $this->expectException(\ReflectionException::class);
        ClassHelper::getMethodCode($class, $property);
    }

    /**
     * @dataProvider getConstantCodePrintsCodeAsIsInFileDataProvider
     */
    public function getConstantCodePrintsCodeAsIsInFile(string $class, string $constant, string $expected): void
    {
        self::assertEquals($expected, rtrim(ClassHelper::getConstantCode($class, $constant)));
    }

    public function getConstantCodePrintsCodeAsIsInFileDataProvider(): array
    {
        return [
            [
                'class' => ClassWithComments::class,
                'constant' => 'CONSTANT_ONE',
                'expected' => <<<'NOWDOC'
    protected const CONSTANT_ONE = 'CONSTANT_ONE';
NOWDOC
            ],
            [
                'class' => ClassWithNoComments::class,
                'constant' => 'CONSTANT_ONE',
                'expected' => <<<'NOWDOC'
    protected const CONSTANT_ONE = 'CONSTANT_ONE';
NOWDOC
            ]
        ];
    }

    /**
     * @test
     */
    public function getConstantCodeThrowsReflectionExceptionIfConstantDoesNotExist(): void
    {
        $class = ClassWithComments::class;
        $constant = 'CONSTANT_DOES_NOT_EXIST';
        $this->expectException(\ReflectionException::class);
        ClassHelper::getConstantCode($class, $constant);
    }
}
