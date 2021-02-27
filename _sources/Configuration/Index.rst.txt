.. include:: /Includes.rst.txt
.. _configuration:

=============
Configuration
=============

The configuration of automatic screenshot can be done in the folder
:file:`Scripts/GenerateScreenshots/` from the root path of the manual (Outside
Documentation!).

The file :file:`CreateMappings.sh` contains the configurations of all mapping
file generations. These are used such that you can call records by title or
another desired filed instead of by uid. As uids might change in different
installations on different machines.

The file :file:`Config.json` contains the configuration of the automatic
screenshots and all other files that are generated automatically.

.. toctree::
   :titlesonly:

   ConfigFile
   ExtensionConfiguration
   TableConfiguration
   ScreenConfiguration
   SelectConfiguration
   ActionConfiguration
   FieldConfiguration
