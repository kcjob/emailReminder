For optout branch...
The settings column will hold a JSON object... The JSON object in turn will contain a key/value pairs for various options 
(one of which is opting out of receiving an email reminder) 

Steps:
-- Fetch the JSON object and parse the optout key/value pair
   -- check wether optout value is a 1; if so do not send reminder email
-- If the opt out key/value pair does not exist and user wants to opt out, then update the value to 1 
