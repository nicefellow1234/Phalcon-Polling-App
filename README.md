# Phalcon Polling App
A simple app created in BootStrap with help of using Phalcon Framework for basic idea to learn that how easy it is to create a CRUD App in Phalcon.

# Important Notes :
**REMEMBER :** Before doing anything make sure that you already installed Phalcon Framework or otherwise the project wouldn't work. For that headover to following link as : https://docs.phalconphp.com/en/3.2/installation

**NOTE :** Remember to import the Database Backup file namely as `polling-app-db-backup.sql` to your Database.

**NOTE :** If you are using nginx, setup a vhost using the sample vhost config file provided in the project root directory.

After that navigate to http://yourvhost/yourprojectfolder/

And you will be set.

# Default Admin Credentials
**Username :** admin
**Password :** test007

# Features :

- [x] Added Cookies feature which will keep track of the polls voted so that it can avoid user from voting the same poll again.
- [x] Added Flash messages so that user can see flash messages (errors) when doing actions or on revoting again if he already voted.
- [x] Added jQuery Flash Message Removal with .fadeout() Effect
