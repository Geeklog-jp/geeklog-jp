<?php

/**
  * This is an example of an error handler override. This will be used in
  * place of COM_handleError if the user is not in the Root group. Really,
  * this should only be used to display some nice pretty "site error" html.
  * Though you could try and notify the sysadmin, and log the error, as this
  * example will show. The function is commented out for saftey.
  */
/*
function CUSTOM_handleError($errno, $errstr, $errfile, $errline, $errcontext)
{
    global $_CONF;
    if( is_array($_CONF) && function_exists('COM_mail'))
    {
        COM_mail($_CONF['site_mail'], $_CONF['site_name'].' Error Handler',
                "An error has occurred: $errno $errstr @ $errline of $errfile");
        COM_errorLog("Error Handler: $errno $errstr @ $errline of $errfile");
    }
    echo("
        <html>
            <head>
                <title>{$_CONF['site_name']} - An error occurred.</title>
                <style type=\"text/css\">
                    body,html {height: 100%; width: 100%;}
                    body{ border: 0px; padding: 0px;
                        background-color: white;
                        color: black;
                        }
                   div { margin-left: auto; margin-right: auto;
                            margin-top: auto; margin-bottom: auto;
                            border: solid thin blue; width: 400px;
                            padding: 5px; text-align: center;
                            }
                   h1 { color: blue;}
               </style>
            </head>
            <body>
                <div>
                    <h1>An Error Has Occurred.</h1>
                    <p>Unfortunatley, the action you performed has caused an
                    error. The site administrator has been informed. If you
                    try again later, the issue may have been fixed.</p>
                </div>
            </body>
        </html>
        ");
    exit;
}
*/

?>