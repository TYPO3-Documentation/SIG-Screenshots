<?php

declare(strict_types=1);
namespace TYPO3\CMS\Screenshots\Tests\Acceptance\Styleguide;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Screenshots\Tests\Acceptance\AbstractBaseCest;
use TYPO3\CMS\Screenshots\Tests\Acceptance\Support\BackendTester;

/**
 * Tests the screenshots backend module can be loaded
 */
class StyleguideCest extends AbstractBaseCest
{
    /**
     * @param BackendTester $I
     */
    public function _before(BackendTester $I): void
    {
        $I->useExistingSession('admin');
    }

    /**
     * @param BackendTester $I
     */
    public function makeScreenshots(BackendTester $I): void
    {
        parent::makeScreenshotsOfSuite($I, 'Styleguide');
    }
}
