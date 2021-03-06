.. include:: /Includes.rst.txt
.. _field_configuration:

===================
Field configuration
===================

The field configuration is an object with the following parameters:

.. confval:: field

   :Required: true
   :type: string

   Name of the field as used in the database and TCA configuration. For
   example :json:`file_mountpoints`.

.. confval:: actions

   :Required: false
   :type: array of :ref:`action configurations <action_configuration>`

   The ref:`actions <action_configuration>` that should be executed before
   taking the screenshot. They include clicking an element, waiting for a
   defined time or selector, changing tabs, etc. The actions will be executed
   in the order as defined in this array.

   Overrides the actions defined in the :ref:`screen configuration
   <screen_configuration>`.

.. confval:: selector

   :Required: false
   :type: string

   Selector to choose the div of which a screenshot should be taken. If empty a
   screenshot of the whole page will be taken. Example: :json:`.recordlist`.

.. confval:: filename

   :Required: false
   :type: string

   The desired filename without extensions. For example :json:`MyField`.
   Overrides the actions defined in the :ref:`screen configuration
   <screen_configuration>`.

   Defaults to the field name in UpperCamelCase prefixed with the prefix
   defined in the :ref:`screen configuration <screen_configuration>` if
   one exists.

   Must be unique within the defined path. Otherwise both screenshots and
   corresponding ReST files will be silently overridden.

.. confval:: caption

   :Required: false
   :type: string

   A caption to be displayed below the screenshot. Defaults to
   :guilabel:`Screenshot of  field [field], table [table]`. A link to
   the corresponding code snippet of the tca definition will be
   automatically inserted.

.. confval:: clip

   :Required: false
   :type: object

   Clippes the screenshot to a fixed height or width:

   .. code-block:: json

      "clip": {
         "height": 400
      }

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
