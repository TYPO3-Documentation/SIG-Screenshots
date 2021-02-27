.. include:: /Includes.rst.txt
.. _select_configuration:

====================
Select configuration
====================

The select configuration is an object with the following parameters:

.. confval:: by

   :Required: true
   :type: string

   The name of the field by which should be selected or a special value
   starting with a :code:`@`.

   :code:`@first`
      select the first record found in the mappings table.


   **Examples**

   Just give me any record of that table:

   .. code-block:: json

      "selectRecord": {
         "by": "@first"
      }


.. confval:: [field name]

   :Required: false
   :type: string or select configuration

   Value the field specified in :code:`by` should have. If this parameter is
   an object the value is recursively choosen

   **Examples**

   Select a record by header:

   .. code-block:: json

      "selectRecord": {
         "by": "header",
         "header": "Deliver business value"
      }

   Select a record of a certain language by language title:

   .. code-block:: json

      "selectRecord": {
         "by": "sys_language_uid",
         "sys_language_uid": {
            "table" : "sys_language",
            "by": "title",
            "title": "styleguide demo language german"
         }
      }


.. confval:: table

   :Required: false
   :type: string

   The table used for the mapping. Defaults to the table of the current
   :ref:`table configuration <table_configuration>`.
