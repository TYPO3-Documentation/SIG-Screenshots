.. include:: /Includes.rst.txt
.. _source_file_configuration:

=========================
Source file configuration
=========================

Copies source files of an extension to provide snippets

.. confval:: paths

   :Required: true
   :type:  object containing the paths



.. confval:: copy

   :Required: true
   :type:  array of the file configurations


Example: copy a Userfunction file
=================================

.. code-block:: json

    "sourceFiles": [
        {
          "paths": {
            "codeSource": "Documentation/Includes/Snippets/Styleguide/Sources/UserFunctions/",
            "relativeCodeSource": "/Includes/Snippets/Styleguide/Sources/UserFunctions/",
            "source": "typo3conf/ext/styleguide/Classes/UserFunctions/FormEngine/"
          },
          "copy": [
            {
              "from": "SelectItemSorter.php",
              "removes": [
                {
                  "remove": "comments"
                }
              ]
            }
          ]
        }
    ],


