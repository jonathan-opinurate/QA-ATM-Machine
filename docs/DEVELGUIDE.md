DEVELOPMENT GUIDE
--------------------


Requirements
=================
* Composer
* PHP
* Symfony 2
* Internet Connectivity (To connect to SQL Database)
* User Login Details
* Intellij IDEA

--------------------------------------------------------------------------------------------------------------------

Design
=================
This application is designed to replicate the services you would find at a public ATM (Automatic Teller Machine).
This application is written in PHP, SQL, YAML, HTML + CSS.
The reason for this application's development is to provide evidence that I Jonathan Yaniv Ben Avraham, understand the process and logic behind 
Event Driven Programming and can implement my own Event Driven Software.

----------------------------------------------------------------------------------------------------------------------

User Validation
=================
The program uses the Symfony Framework, which has a built in security bundle, this bundle allows the program to check
the user input from the login form against the credentials in the Database. If the credentials are correct then the user
is passed on to the options page. The Event Controller which manages this is the `SecurityController`.

However, if the user does not input the correct credentials, the program (unseen-action) is redirected to the `AuthenticationFailureHandler`
This is an `Event Listener`. The event listener checks to see how many attempts have been made, and if the number of attempts are below three
the user is automatically redirected to the login page. Each time the `AuthenticationFailureHandler` is loaded it adds another attempt which
is stored in a session variable. Sessions are controlled differently in Symfony than other applications, meaning that the session global variable
files have to be `injected` into the Event Listener to be `accessed` and `manipulated`. If event listener records the third attempt, the user
is then redirected to the user-error page.

------------------------------------------------------------------------------------------------------------------------

User Options View
=====================
Once a user has passed the validation, they are directed to an options view, the view is setup from the `OptionController`.
In the `OptionController` the template is `rendered` using Symfony's `templating engine`, Symfony has two engines you can use, `twig` and `php`.
I specifically chose to use PHP as opposed to twig because although twig is simpler, I was advised to write the program in PHP and makes the program
much less complicated to mark without having multiple file-types to check and mark.

here is an example of the code used to render the template:
    
    <?php
    namespace AppBundle\Controller;
    
    
    use AppBundle\Entity\AccountHolder;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    
    class OptionController extends Controller
    {

        public function selectionAction()
        {
            return $this->render('AppBundle:Machine:options.html.php');
        }


    }

On the options page the user has the following options:

* Withdraw Cash
* Cash With Receipt
* Display Balance
* Deposit Cash

The program upon an option being clicked will be redirected to one of the following controllers:

1) `FormBuildController` (for Withdraw Cash, and Cash With Receipt).
2) `Balance Controller` (For the Display Balance option).
3) `Deposit Controller` (For the Deposit option).

Each controller renders the following:

`FormBuildController` not just a form, but also the withdraw cash page and also the receipt page after the form is submitted
if the receipt was the option selected.

`Balance Controller` renders the balance page. This pulls user data from the database such as their name and their balance.

`Deposit Controller` This renders a page with a form for data entry, you can put money into your account.

--------------------------------------------------------------------------------------------------------------------

User Balance
==============
The user balance view, is a simple template displaying a Hello `$user` message and the `$user`'s balance below.

--------------------------------------------------------------------------------------------------------------------

User Withdrawal
================
This view gives the user a list of Radio Buttons:
The user could select either from a list incrementing in 10's until 50, where the increments are increased to 50, should
the user wish for a specific alternative amount, the user can input their own amount.

Doctrine is used to feed information to and from the database, this is how when the user selects an amount, it subtracts
the amount from the database, the balance changes as does the withdrawn table row.

--------------------------------------------------------------------------------------------------------------------

User Withdrawal Results
=====================
If a user successfully withdraws an amount without exceeding their limit, they are redirected back to the options page,
if they selected cash with receipt, they will be redirected to the receipt page, with the correct amount withdrawn.


If a user attempts to withdraw an amount of either 0 or an amount `> 250` the user will be redirected to an amount-error page.

--------------------------------------------------------------------------------------------------------------------

#Running the Application

running the application on linux

open your terminal and go to the atm_machine directory, once in the directory, type into your terminal:
`$ php app/console server:run`
you should see:
1) `> Server running pm http://127.0.0.1:8000` 

or if connected to my personal Database it should look more like:
2) `> Server running on localhost:8000`

direct your browser to either 127.0.0.1:8000 or localhost:8000 and the application should be up and running.

#Note

If using my personal database, please contact me.
You will have to configure the paramaters.yml file:

upon downloading or cloning this git repo, you should be able to find `paramaters.yml.dist` under `app/config/*`

if it is not there, create a file under `app/config` called paramaters.yml that looks like this:

    parameters:

        database_host: xxxxxx.xxx.xxx
    
        database_port: null
   
        database_name: xxx
    
        database_user: xxx
    
        database_password: xxxxxx
    
        mailer_transport: smtp
    
        mailer_host: 127.0.0.1
    
        mailer_user: null
    
        mailer_password: null
    
        secret: xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    

So That's it for linux!

On Windows:

Run Intellij IDEA:
in the Terminal run the command:

`C:/path/to/atm_machine php app/console server:run`

you should receive the same response as linux:

`> Server running at 127.0.0.1:8000`

or

`> Server running at localhost:8000`

go to your browser and run either `127.0.0.1:8000` or `localhost:8000` either should work.