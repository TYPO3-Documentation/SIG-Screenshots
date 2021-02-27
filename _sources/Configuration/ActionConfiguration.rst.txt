.. include:: /Includes.rst.txt
.. _action_configuration:

====================
Action configuration
====================

The action configuration is an object with the following parameters:

.. confval:: action

   :Required: true
   :type: string

   One of the following:

   click
      Click something

   change
      Change the value of a selector.

   open
      Open something, used with :ref:`accordion <action_accordion>`.

   wait
      Wait for something. Either used with a :code:`selector` to wait for
      or a :code:`timeout` in ms.


Action click
============

This action clicks something. Is has the following properties:

.. confval:: button

   :Required: false
   :type: string

   Contains the text on the button to be clicked.

   Change the record type, wait for the expected modal dialog, then click :guilabel:`OK`:

   .. code-block:: json

      "actions": [
         {
            "action": "change",
            "select": "record_type",
            "value": "0"
         },
         {
            "action": "wait",
            "selector": ".modal-dialog",
            "options": {
               "visible": true
            }
         },
         {
            "action": "click",
            "button": "OK"
         },
      ]

.. confval:: select

   :Required: false
   :type: string

   Click a select field to reveal its content without changing it. Contains
   the name of the field.

   Open the select box of the Ctype field:

   .. code-block:: json

      "actions": [
         {
            "action": "click",
            "select": "CType"
         }
      ]

.. confval:: tab

   :Required: false
   :type: string

   Click a tab in a record to take a screen of another tab. Contains
   the name of the field

   Switch to the tab :guilabel:`Access` by clicking it:

   .. code-block:: json

      "actions": [
         {
            "action": "click",
            "tab": "Access"
         }
      ]

Action change
=============

This action changes something. Is has the following properties:

.. confval:: select

   :Required: false
   :type: string

   Change a select box by selecting a different value. Contains
   the name of the field.

   Open the select box of the Ctype field:

   .. code-block:: json

      {
         "action": "change",
         "select": "record_type",
         "value": "0"
      }

Action open
===========

This action opens something. Is has the following properties:

.. confval:: accordion

   :Required: false
   :type: string

   Opens an accordion. In opposite to action :code:`click` it only opens
   the accordion if it is closed and doesn't click it when its already
   opened. This prevents togglingh

   Contains a special value starting with :code:`@` or
   a selector.

   Special values:

   :code:`@first`
      open the first accordion you can find if it is closed.

   **Example**

   Open the first accordion you can find. Then recursively open an
   accordion that is inside the first accordion:

   .. code-block:: json

      "actions": [
         {
            "action": "open",
            "accordion": "@first"
         },
         {
            "action": "open",
            "accordion": ".form-irre-object .panel-collapse .form-irre-header-button"
         }
      ]


Action wait
===========

.. confval:: timeout

   :Required: false
   :type: integer

   Wait for a timeout. Time in milli seconds. 1000 would be one second.

.. confval:: selector

   :Required: false
   :type: string

   Wait for a selector. :code:`options` specify exactly what to wait for.
   Contains the selector

.. confval:: options

   :Required: false
   :type: object

   Wait for the modal dialog to be visible:

   .. code-block:: json

      {
         "action": "wait",
         "selector": ".modal-dialog",
         "options": {
            "visible": true
         }
      },
