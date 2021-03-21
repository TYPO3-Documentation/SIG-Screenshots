.. include:: /Includes.rst.txt
.. _run-puppeteer:

=============
Run puppeteer
=============

You can run the pupeteer script in your console as follows::

   ddev exec node typo3.js --suite=TYPO3CMS-Tutorial-GettingStarted

Parameters
==========

suite
   Name of the manual. The manual has to lie in public/OriginalManual
   and it has to have a file :file:`Scripts/GenerateScreenshots/Config.json`
   with the automatic screenshot :ref:`configuration`.

stopOnFirstError
   Stop when the first error is found or keep going (default)?

limitToTable
   Only take screenshots related to one table. Useful when testing.

limitToImage
   Only take screenshots Of this one image (without file ending). Useful when testing::

      ddev exec node typo3.js --suite=TYPO3CMS-Tutorial-GettingStarted --limitToImage="BeUsersModule"
