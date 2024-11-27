# Resources Used in this project
  
PHP  
Laravel / breeze    
Node  
Composer  
Vscode  
Hardik Savani Tutorials : https://www.youtube.com/watch?v=pcKZLhnjKOo | https://www.itsolutionstuff.com/post/laravel-11-breeze-multi-auth-tutorialexample.html  
dealsbe : https://dealsbe.com/?fbclid=IwY2xjawGn8MNleHRuA2FlbQIxMAABHV0UU3WuRQBi4w_uBqT-3fKkOdRojN3yf-j_geYQ80OJzoo5S7kkx12blA_aem_lKc6Q58t_PJ8-BeHpcJuYA  


---------------------
# PLEASE READ ALL OF IT BEFORE CLONING! ! !
## How to Install necessary resources before running

   Laravel Guide : https://laravel.com/docs/11.x/installation  
   Youtube Guide for laravel installation : https://www.youtube.com/watch?v=2qgS_MCvDfk  
   Youtube Guide for Laravel/breeze installation : https://www.youtube.com/watch?v=Et068bVFstY  

1. Make sure to install PHP, XAMPP, Composer, Node.js :  
   installation links :  
   XAMPP - https://www.apachefriends.org/download.html  
   PHP - https://www.php.net/downloads.php  
   Composer - https://getcomposer.org/download/  
   Node.js - https://nodejs.org/en  

   - in XAMPP, php.ini file un-comment or remove ';' symbol in the following :  
     extension=pdo_mysql  
     extension=mbstring  
     extension=gettext  
     extension=fileinfo  
     extension=exif  
     ![image](https://github.com/user-attachments/assets/f9596953-e979-4f34-9a65-811a32ea909d)  
     *Or you can just copy the image.  
     *DO note that extension=mongodb is an addition and not available in the normal php.ini ; don't mind it!  

   - after running and installing composer go to your PATH and add the bin file path to it, it may look like this  
            C:\Users\user\AppData\Roaming\Composer\vendor\bin  
     ![image](https://github.com/user-attachments/assets/9b25d5bc-0eb8-4eaa-9f22-f6091d919659)  
     *If you installed Node, the is an option to automatically add it to the path. If not added, manual add it! just copy the image if you want  
  
   - to know if PHP is successfully installed, type in the CMD "php -v"*  
   - to know if Node or npm is installed, type in the CMD "node -v" and "npm -v"*  
  
*It is successfully installed if you just see a number like "10.0.0", it should look like this :  
![image](https://github.com/user-attachments/assets/2c64b994-222b-418e-8b34-27bbbee85dfc)  


2. Assuming you already clone this repository, do this steps to run the existing project into your Vscode :   
   
   These steps is for running the dependencies.
   - create database named " enrollment_sys " in XAMPP
     ![image](https://github.com/user-attachments/assets/25c28ce6-86e7-444e-b99a-74f7ef36470d)  

   
   - " npm run dev "  
     *Always do this first to initialize the node  
     ![image](https://github.com/user-attachments/assets/685d0378-f38d-4a46-9ba3-5f3950a3781f)  
     *Your project file should generate the following  
     ![Screenshot 2024-11-19 232550](https://github.com/user-attachments/assets/81b76f94-d57a-4165-8183-f691f773c44d)
     If it doesnt, RUN the following " npm run build " to generate the manifest.json

   - " php artisan migrate "  
     *This is to upload the tables for the database server  
     *There is this step to seed(fill value) after migrating, preferably do this once,  
     if you already migrated do not do it again! " php artisan migrate --seed "  
     
   - " php artisan serve "
     *This is to initialize the actual project into the browser
     ![image](https://github.com/user-attachments/assets/5904e90a-2db6-422e-9425-565299fe6f4a)  
     *Just click the link to show the running server, CTRL+C if you want to end it.  

     
   The following step/s is crucial for the project :
   
   Databse seeder (This is just a set of values that will automatically fill up the table) :  
   - " php artisan db:seed --class=UserSeeder "  
     *This will fill out the basic credentials that will be used for testing, preferrably do this step after you install Laravel/breeze,  
     and before running 'npm run dev' and 'php artisan serve'  

------------------
In the event of error in installing  NPM, type the folowing in administrator power shell :   
1. ' Get-ExecutionPolicy '  
2. ' Set-ExecutionPolicy RemoteSigned '  
3. ' Y '  
*please do not type 'A' as it will make your computer un-safe to automatic script running.  

------------------
.env files is uploaded since we are just using local database, use .gitignore in the future!  
