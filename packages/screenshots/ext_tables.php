<?php

defined('TYPO3_MODE') or die();

if (\TYPO3\CMS\Core\Core\Environment::getContext()->isTesting() === false) {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Screenshots',
        'tools',
        'screenshots',
        '',
        [
            \TYPO3\CMS\Screenshots\Controller\ScreenshotsManagerController::class => 'index, make, compare, copy',
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:screenshots/Resources/Public/Icons/module-screenshots.svg',
            'labels' => 'LLL:EXT:screenshots/Resources/Private/Language/locallang_mod.xlf',
        ]
    );
}
