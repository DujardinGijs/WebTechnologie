you can enter the site over https.
When you browse for the site only you will be redirected to the index page witch asks your username.
This will lead you to the main application page.
When the connection with the socket is opend on this place it draws every drawing from the db.
The moment you start to draw it will broadcast this drawing to other useres and saves it in db.
After you can start drawing.
To clear the canvas browse to https://draw.local/ClearCanvas this will require login from the admin with basic authentication.
(usr:admin pwd:admin)

Link to UX: https://xd.adobe.com/view/de5f2c52-9557-4056-76e1-f977c9a1c7a2-a86e/


I've encounterd an error with my socket when serverd over https. before with http everything worked.
Because of this it also wont load the drawings from the db to the canvas.
For testing perposes i sugest you disable https.
By enabeling 'laravel.conf' and altering the endpoint in js socket connector to 'ws://draw.local:8080'
Problems with basic authentication also ocourd, It sometimes skips the auth and redirects imedietly.
