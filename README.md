# Code_Test

# A readme with:   Your thoughts about the code. What makes it amazing code. Or what makes it ok code. Or what makes it terrible code. How would you have done it. Thoughts on formatting, structure, logic.. The more details that you can provide about the code (what's terrible about it or/and what is good about it) the easier for us to assess your coding style, mentality etc

## My Thought about the code will be based on the following:

### Formatting

**The formatting part of this code is cool and some part that looks amazing to me are** :

1. The naming of the method parameter and varaibles used are clear and well understood, only the comment part needs to be improved on , although there are comments in the codes but it could be better. Also the code formatting in terms of the namespace and use-declaration etc obeys standard psr rules.

2. THe PHP magica method __construct is well injected and declared in the both BookingRepository  and BookingController class.

### Structure;

The structure of this codes is also amazing as it make use of repository pattern, the BaseRepository interact with the database layer while the BookingRepository houses the whole business logic of the application which interact with the controller. Repository pattern make it more easy when changing backend database to use a different technology without having to change the controller.


### Logic

The logic of this code is also good.  I could see that Eager loading with nested relationship in line 1937, 1721 etc was used to fetch data from database, this laravel database query features optimise the loading and performance of database.

I notice that the BookingRepository follows the standard rule by only interacting with the data, it actions and return data to controller without attempting any web request which should be done by the controller.

 I also admire the fact that all fields were checked for null value before been parse for further actions in the BookingRepository

**However**;

1. I could see jobs dispatched and notification/email sent on the main thread, this shouldn't be. Best practices is that things like these should be queued and processed synchronously. Public function sendNotificationTranslator($job, $data = [], $exclude_user_id) can also be optimised by not fetching all users and then do some checks/filter inside the foreach loop. Instead these checks/filter could have been applied at DB level. I understand laravel uses lazy loading by default which make time of query to be N+1 . For the solution to be well optimised, the mail, sms other notification helpers are expected to queue their requests. Although the implementation of these helpers are not known, if they are, as our solution do not have control on external services that these helpers depends on, we are putting our solution's performance at the hand of external resource which could fail, experiencing delays etc

2. I ccould also notice laravel query builder was used in some couple of line e.g 1727, 1729 etc without been decleared in the use decalaration, this could break the application.

3. Laravel request and validation class for each model and features: Data type validation and checks should be on *store method* in line 67 BookingController and some other places. There is always a need to validate input data with their data types each time data will be inserted or updated from ui to database. Although we might not be able to have that here because we are not expose to the application database schema.

4. I noticed that there is no unified api response in the controller, we could create a Helper folder in app/path and create Reply.php file, by doing this we could have a resusable response for success status, fail status etc in the controller return statement as an instances.

5. There is a need to check the $user_id parse in line 61,102 BookingRepository file to be sure the id actually exit in the table before further action
