General:
-----------
For handling various options under the settings column:
1. Data stored as a json object
2. Use a class (in PHP) to access the data via getter and setter functions

Specific:
-----------
For the "optout" option (wether to receive an email reminder) 
1. json object with an array of values... e,g:  {"option":[service1,service2,service3,....]}
2. If the service is NOT in the object, then the user wants to receive the reminder email for a particular service

he userSettingsDAO.php will have

2 getters/setters-- one based on user id and the other based on email

NOTE:  The settings column can either be empty or have a json object

The result of the getters is passed to a function (parseJson()) which checks if the 
option is in the JSON object.

If the option is not in the JSON object, then we add it to the (addToJson()) object
Next we use the setter in useerSettindsDAO to update the settings column in the core_user table



