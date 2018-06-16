1. You are expected to have installed git, virtualbox and Vagrant.

2. Install Homestead using instructions on official site

    ! IMPORTANT !
        1. You must add "php: '5.6'" after 'map' configurations when you go through 'Configuring Nginx Sites' section
        2. You should stop before 'Per Project Installation'
    ! IMPORTANT !

    'https://laravel.com/docs/5.5/homestead'

3. Clone project from github using following command into your 'code' folder:
    'git clone https://github.com/ITAAcademy/RobotaMolodi.git'

4. Create file .env in the root directory of the project and copy following text :
        APP_NAME=Laravel
        APP_ENV=local
        APP_KEY='Your app key'
        APP_DEBUG=true
        APP_LOG_LEVEL=debug
        APP_URL=http://localhost

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=%your_database_name%       //expected to be something like Robota_Molodi, rm, etc.
        DB_USERNAME=homestead
        DB_PASSWORD=secret

        BROADCAST_DRIVER=log
        CACHE_DRIVER=file
        SESSION_DRIVER=file
        QUEUE_DRIVER=sync

        REDIS_HOST=127.0.0.1
        REDIS_PASSWORD=null
        REDIS_PORT=6379

        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=null
        MAIL_PASSWORD=null
        MAIL_ENCRYPTION=null

        PUSHER_APP_ID=
        PUSHER_APP_KEY=
        PUSHER_APP_SECRET=

5. Find the file 'robotamolodidb2.sql',
   go to http://redmine.intita.com/projects/robotamolodi/files , it is expected to be there...
   Download it and copy to your project's root folder.

6. Go to the Homestead folder and run the command:
    'vagrant ssh'

9. To fix mcript exeption run:
    sudo apt-get install mcrypt php7.1-mcrypt
    sudo /etc/init.d/nginx restart
y
8. Go to your project's directory and run commands:
    'composer update'
    'php artisan key:generate'

9. Next you should make some mystical manipulations with database using following commands:
    'mysql'
    'DROP DATABASE %your_database_name%;'
    'CREATE DATABASE %your_database_name%;'
    'USE %your_database_name%;'
    'SET GLOBAL sql_mode = '';
    'source ~/path/to/file/robotamolodidb2.sql'
10. Close mysql using command
    'quit'

11  .Run :
    'php artisan migrate'