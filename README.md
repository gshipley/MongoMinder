MongoMinder
===========

A voice based reminder application using Twilio, MongoDB, PHP, and OpenShift.

This git repository helps you get up and running quickly with the MongoMinder sample application.  The backend database is MongoDB and the database name is the
same as your application name (using $_ENV['OPENSHIFT_APP_NAME']).  You can call
your application by whatever name you want (the name of the database will always
match the application).


Running on OpenShift
----------------------------

Create an account at http://openshift.redhat.com/

Create a php-5.3 application (you can call your application whatever you want)

    rhc app create -a mongominder -t php-5.3

Add MongoDB support to your application

    rhc app cartridge add -a mongominder -c mongodb-2.0

Add this upstream MongoMinder repo

    cd mongominder
    git remote add upstream -m master git://github.com/gshipley/MongoMinder.git
    git pull -s recursive -X theirs upstream master
    # note that the git pull above can be used later to pull updates to MongoMinder
    
Then push the repo upstream

    git push

That's it, your application is now live at:

    http://mongominder-$yournamespace.rhcloud.com


NOTES:

In order for this application to work, you will need to modify the config.php file in the config directory and add your Twilio API and Token.  You can sign up for a free account at their website.