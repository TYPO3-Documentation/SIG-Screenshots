.. include:: /Includes.rst.txt
.. _settings:

========
Settings
========

These are the standard settings:

.. code-block:: javascript

   var settings = {
     baseUrl: 'http://localhost',
     suite: 'TYPO3CMS-Reference-TCA',
     viewPort: {
       width: 640,
       height: 640
     },
     errorPath: 'public/Output/Errors/',
     mappingsPath: './public/Output/json/',
     limitToTable: '',
     stopOnFirstError: true,
     standardTimeoutTime: 500,
     snippet: 'include'
   };

The settings can be overridden by :ref:`parameters <parameters>` to the calls or
by adding the settings to the root array in the :ref:`Config.json file
<configuration>`.
