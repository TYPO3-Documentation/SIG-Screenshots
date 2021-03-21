.. include:: /Includes.rst.txt
.. _extension_configuration:

=======================
Extension configuration
=======================

The extension configuration is an object with the following parameters:

.. confval:: extension

   :Required: true
   :type: string

   Contains the name of the extension.


.. confval:: paths

   :Required: true
   :type: object

   **Example**

   .. code-block:: json

      {
        "imageSource": "Documentation/Includes/Images/Core/Frontend/AutomaticScreenshots/",
        "relativeImagePath": "/Includes/Images/Core/Frontend/AutomaticScreenshots/",
        "imageRst": "Documentation/Includes/Images/Core/Frontend/RstIncludes/",
        "codeRst": "Documentation/Includes/Snippets/Core/Frontend/RstIncludes/",
        "codeSource": "Documentation/Includes/Snippets/Core/Frontend/Sources/",
        "relativeCodeSource": "/Includes/Snippets/Core/Frontend/Sources/",
        "source": "typo3/sysext/frontend/Configuration/TCA/"
      },


.. confval:: overview

   :Required: false
   :type:  array of :ref:`overview configurations <overview_configuration>`

   Takes screenshots of the whole backend as an an overview.

.. confval:: modules

   :Required: false
   :type:  array of :ref:`module configurations <module_configuration>`

   Takes screenshots of backend modules.


.. confval:: tables

   :Required: false
   :type:  array of :ref:`table configurations <table_configuration>`

   Takes screenshots of TCA elements such as table lists, records, or
   single fields therein.
