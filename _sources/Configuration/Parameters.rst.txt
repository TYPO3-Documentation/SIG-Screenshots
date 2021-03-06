.. include:: /Includes.rst.txt
.. _parameters:

==========
Parameters
==========

Pupeteer
========

The pupeteer script can be called with the following parameters:

.. code-block:: bash

    :code:`ddev exec node typo3.js --suite=TYPO3CMS-Reference-TCA --limitToTable=tt_content` --stopOnFirstError=false


suite
    Name of the manual. The manual must lie at
    :file:`public/OriginalManual/[SuiteName]` and the Config.json be found at
    :file:`public/OriginalManual/[SuiteName]/Scripts/GenerateScreenshots/CreateMappings.sh`

limitToTable
    If set only this table will be traversed, useful when testing. If empty all
    tables will be traversed.

stopOnFirstError
    In case of errors should the script keep going and try to do the next
    screenshot (false) or exit (true).

