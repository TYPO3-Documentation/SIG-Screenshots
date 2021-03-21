.. include:: /Includes.rst.txt
.. _extension_configuration:

======================
Overview configuration
======================

.. note::

   Overview Screenshots should have a viewport width from at least 990px. Otherwise
   TYPO3 Backend jumps into mobile view and has a black overlay.

The overview configuration is an object with the following parameters:

.. confval:: screens

   :Required: true
   :type:  array of :ref:`screen configurations <screen_configuration>`

   Each screen is used for one or more screenshots.

Example: Take screenshots of the user module in overview
========================================================

.. figure:: /Images/BeUsersModule.png
   :alt: Take screenshots of the user module in overview
   :class: with-shadow

   Take screenshots of the user module in overview


.. code-block:: json

   "overview": [
        {
          "screens": [
            {
              "filename": "BeUsersModule",
              "caption": "SYSTEM > Backend users",
              "viewport": {
                "width": 1024,
                "height": 640
              },
              "actions": [
                {
                  "action": "click",
                  "button": "Backend Users"
                },
                {
                  "action": "wait",
                  "timeout": 1000
                },
                {
                  "action": "draw",
                  "item": "label",
                  "selector": ".modulemenu-action-active",
                  "content": "1"
                },
                {
                  "action": "draw",
                  "item": "box",
                  "selector": ".module-docheader-bar-navigation .module-docheader-bar-column-left select",
                  "iframe": "iframe#typo3-contentIframe"
                },
                {
                  "action": "draw",
                  "item": "label",
                  "selector": ".module-docheader-bar-navigation .module-docheader-bar-column-left",
                  "content": "2",
                  "iframe": "iframe#typo3-contentIframe"
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


