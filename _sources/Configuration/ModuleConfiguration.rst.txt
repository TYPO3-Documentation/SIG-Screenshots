.. include:: /Includes.rst.txt
.. _extension_configuration:

====================
Module configuration
====================

The module configuration is an object with the following parameters:


.. confval:: module

   :Required: true
   :type:  string

   Path to the backend module.

.. confval:: screens

   :Required: true
   :type:  array of :ref:`screen configurations <screen_configuration>`

   Each screen is used for one or more screenshots. Each screen has to have
   parameters definition addionally

.. confval:: screen.parameters

   :Required: true
   :type:  array of parameter

.. confval:: parameter

   :Required: true
   :type:  object

   An object with key (parameter name) and value.

   Example::

      {
         "key": "tx_beuser_system_beusertxbeuser[action]",
         "value": "index"
      }

Example: Take screenshots of the user module
============================================

.. include:: /Includes/Images/RstIncludes/Module.rst.txt


.. code-block:: json

   "modules": [
      {
       "module": "/module/system/BeuserTxBeuser",
       "screens": [
         {
           "filename": "BeUserGroups",
           "caption": "Viewing groups in the Backend Users module",
           "viewport": {
             "width": 960,
             "height": 640
           },
           "parameters": [
             {
               "key": "tx_beuser_system_beusertxbeuser[action]",
               "value": "index"
             },
             {
               "key": "tx_beuser_system_beusertxbeuser[controller]",
               "value": "BackendUserGroup"
             }
           ],
           "actions": [
             {
               "action": "click",
               "select": "selector",
               "selector": "select"
             },
             {
               "action": "wait",
               "timeout": 100
             }
           ]
         }
       ]
      }
   ]
