.. include:: /Includes.rst.txt
.. _extension_configuration:

===================
Login configuration
===================

The login configuration is an object with the following parameters:

.. confval:: screens

   :Required: true
   :type:  array of :ref:`screen configurations <screen_configuration>`

   Each screen is used for one or more screenshots.


.. confval:: type

   :Required: false
   :type:  string

   default
      A screenshot of the login box

   fullpage
      A screenshot of the full page

   boundingbox
      A screenshot of the login box with some additional bounding


Example: Take screenshots of the login
======================================

.. include:: /Includes/Images/RstIncludes/LoginPage.rst.txt

.. code-block:: json

    "login": [
        {
            "screens": [
                {
                    "filename": "LoginPage",
                    "caption": "Login page for the TYPO3 CMS backend",
                    "actions": [
                        {
                            "action": "wait",
                            "timeout": 1000
                        }
                    ]
                }
            ]
        }
    ]

Example: Take a fullpage screenshot of the login
================================================


.. include:: /Includes/Images/RstIncludes/LoginFullscreen.rst.txt

.. code-block:: json

    "login": [
        {
            "type": "fullpage",
            "screens": [
                {
                    "filename": "LoginFullscreen",
                    "caption": "Login page for the TYPO3 CMS backend",
                    "actions": [
                        {
                            "action": "wait",
                            "timeout": 1000
                        }
                    ]
                }
            ]
        }
    ]
