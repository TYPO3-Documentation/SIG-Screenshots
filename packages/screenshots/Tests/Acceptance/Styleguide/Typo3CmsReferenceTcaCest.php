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

use TYPO3\CMS\Screenshots\Tests\Acceptance\Support\BackendTester;

/**
 * Tests the screenshots backend module can be loaded
 */
class Typo3CmsReferenceTcaCest
{
    /**
     * @param BackendTester $I
     */
    public function _before(BackendTester $I)
    {
        $I->useExistingSession('admin');
    }

    /**
     * @param BackendTester $I
     */
    public function screenshotOfTypo3Backend(BackendTester $I)
    {
//        $I->makeScreenshot('typo3_backend_w_styleguide');
//        $I->makeHtmlSnapshot('typo3_backend_w_styleguide');
//        $I->makeElementScreenshot('.topbar-header-site', 'typo3_backend_w_styleguide_toolbar');
        $I->amOnPage(sprintf('/typo3/module/web/list?token=1&table==%s', 'tt_content'));
        $I->wait(5);
        $I->switchToContentFrame();
        $I->makeScreenshot('page');
        $I->makeHtmlSnapshot('page');
        $I->makeElementScreenshot('.recordlist', 'tt_content');
    }
}
