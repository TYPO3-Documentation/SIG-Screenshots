.. include:: /Includes.rst.txt
.. _table_configuration:

=========================
Table level configuration
=========================

The table configuration is an object with the following parameters:

.. confval:: table

   :Required: true
   :type: string

   Contains the name of the table as it is used in SQL, for example
   :json:`"table": "tt_content"`.

.. confval:: screens

   :Required: true
   :type:  array of :ref:`screen configurations <screen_configuration>`

   Each screen is used for one or more screenshots.


.. confval:: fields

   :Required: false
   :type:  array of strings or :ref:`field configurations <field_configuration>`

   If there is a :ref:`screen configuration <screen_configuration>` with the
   view :json:`fields` this array must contain either the database names of
   fields in this table, for example :sql:`"file_mountpoints"` or
   :ref:`field configurations <field_configuration>`. Both can be mixed.

   **Example**

   .. code-block:: json

      "fields": [
         {
            "field": "sys_language_uid",
            "caption": "A typical sys_language_uid field"
         },
         "input_1",
         "input_2",
         {
            "field": "input_28",
            "actions": [
               {
                  "action": "wait",
                  "timeout": "500"
               }
            ]
         },
         "input_30",
      ]

.. confval:: tableConvert

   :Required: false
   :type: string

   One of the following strings:

   ignore
      The TCA source should not be copied and therefore be ignored

   parse-as-text
      The TCA source contains values that cannot be automatically parsed
      such as calls to Core functions. It should therefore be copied into
      the manual as-is.

   no-comments
      Don't generate automatic comments.

   default:
      Include and parse the TCA file and generate automatic comments such that
      the TCA configuration of sections and fields can be automatically
      included in code snippets.

