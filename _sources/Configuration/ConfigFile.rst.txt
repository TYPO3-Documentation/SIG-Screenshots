.. include:: /Includes.rst.txt
.. _configuration:

================
Config.json file
================

This is a json object with the following two keys:

.. confval:: comments

   :Required: true
   :type: object

   These comments are used for the corresponding files in the first line. The
   comment can be removed by Editors to protect files against being
   automatically overridden.

   .. code-block:: json

      {
         "php": "// Automatic screenshot: Remove this comment if you want to manually change this file",
         "rst.txt": ".. Automatic screenshot: Remove this line if you want to manually change this file",
         "general": "Automatic screenshot:"
      }

.. confval:: extensions

   :Required: true
   :type: array of :ref:`extension configurations <extension_configuration>`

   All actions are stored into the corresponding :ref:`extension configurations
   <extension configuration>`, usually named after the extension (Core or third
   party) which was is used to create the screenshots.
