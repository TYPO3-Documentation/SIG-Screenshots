.. include:: /Includes.rst.txt
.. _screen_configuration:

====================
Screen configuration
====================

The screen configuration is an object with the following parameters:

.. confval:: view

   :Required: true
   :type: string

   Must contain one of the following:

   table
      Take a screenshot of the table overview in list view on a certain
      page. This page is defined by pid or selectRecord configuration.

   record
      Take an overview screenshot of one record. The record is defined by
      uid or selectRecord configuration. Tabs can be switched by actions.

   fields
      Take screenshots of (multiple) fields as defined in the property
      :json:`fields` of the corresponding :ref:`table configuration
      <table_configuration>`. The record is defined by
      uid or selectRecord configuration. Tabs can be switched by actions.

.. confval:: pid

   :Required: false
   :type: integer

   Defines the uid of the page on which a screenshot of the table overview
   should be taken. Only used in view :json:`table`, overrides a
   :json:`selectRecord` configuration.

.. confval:: uid

   :Required: false
   :type: integer

   Uid of the record whose screenshot should be taken. Only used in view
   :json:`record` and :json:`fields`, overrides a :json:`selectRecord`
   configuration.

.. confval:: selectRecord

   :Required: false
   :type:  :ref:`select configuration <select_configuration>`

   Defines the uid of the page on which the screenshots should be taken (view
   :json:`table`) or the record (view :json:`record` and :json:`fields`).

   **Example**

   .. code-block:: json

      "selectRecord": {
         "by": "header",
         "header": "Playground"
      }

.. confval:: actions

   :Required: false
   :type: array of :ref:`action configurations <action_configuration>`

   The ref:`actions <action_configuration>` that should be executed before
   taking the screenshot. They include clicking an element, waiting for a
   defined time or selector, changing tabs, etc. The actions will be executed
   in the order as defined in this array.

   In the view :json:`fields` it can be overridden by the actions defined in the
   field.

.. confval:: selector

   :Required: false
   :type: string

   Selector to choose the div of which a screenshot should be taken. If empty a
   screenshot of the whole page will be taken. Example: :json:`.recordlist`.

.. confval:: prefix

   :Required: false
   :type: string (in lower_case_with_underlines)

   A prefix used for all filenames and links. For example :code:`inline_mn_`.
   Should end on a underline

.. confval:: filename

   :Required: false
   :type: string

   The desired filename without extensions. For example :json:`CtrlType`. In
   the view :json:`fields` it is overridden by the filename defined in the
   field.

   Defaults to the table name in UpperCamelCase for views :json:`record` and
   :json:`table`.

   Must be unique within the defined path. Otherwise both screenshots and
   corresponding ReST files will be silently overridden.

.. confval:: caption

   :Required: false
   :type: string

   A caption to be displayed below the screenshot. In
   the view :json:`fields` it is overridden by the caption defined in the
   field.

.. confval:: screenshot

   :Required: false
   :type: string

   ignore
      Don't attempt to take a screenshot. This can be used to comment out a
      screenshot that isn't working right now or to only generate the code
      snippet.

   ignoreOnError
      Try to take the screenshot but ignore an error. Can be used in development
      to ignore screenshots that temporary fail. Shouldn't be used in
      production.

   default
      Take the screenshot.

.. confval:: snippet

   :Required: false
   :type: string

   ignore
      Don't attempt to create a code snippet.

   default
      Try to create a code snippet if possible.
