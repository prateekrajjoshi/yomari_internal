All the files seen above need to be inside the folder codeigniter on your system.

## Simple Installation

1. Download all the files above and put it in a folder named 'codeigniter'.
2. Copy the folder to path /var/www/html/
3. Go to your browser and type the url "http://localhost/codeigniter/index.php/Yomari_controller"
4. You need to configure your database.php file before this, which is discussed somewhere below.

## Manual Installation

1. If you have codeigniter already installed in your system, you need to make changes or replace a couple of files.
2. Every changes to be made is inside the application folder of codeigniter.
2. Download and copy /application/controllers/Yomari_controller.php to /var/www/html/codeigniter/application/controllers.
3. Download and copy /application/models/Yomari_model.php to /var/www/html/codeigniter/application/models.
4. Download and copy /application/view/Yomari_view.php to /var/www/html/codeigniter/application/views.
5. You need to install PHPExcel before this which is discussed somewhere below.
6. Also copy the yom_temp.xls file inside "codeigniter" folder in your system. 

## Changes in database.php

1. You need to make some changes in /var/www/html/codeigniter/application/config/database.php before this could access and retrieve anything from database.
2. Just copying and replacing database.php from this repository to your local location will not work since my(Prateek's) local database's username, password  might not be same as yours.
3. So you need to make some changes in /var/www/html/codeigniter/application/config/database.php.
4. Open /var/www/html/codeigniter/application/config/database.php.
	$db['default'] = array(
	'dsn'	=> '',
	'hostname' => Ip Address of your local host or just type 'localhost' with the inverted commas,
	'username' => 'root', (By default)
	'password' => Password of your local phpMyAdmin database,
	'database' => 'yomari_internal',
	'dbdriver' => 'mysqli', (mysql is not currently supported)
	.
	.	
	.
	.
	);

## Installing PHPExcel (Only for Manual Installation)

1. Download and copy /application/third_party/PHPExcel-1.8 folder to /var/www/html/codeigniter/application/third_party.

## Running the program

1. Go to url "http://localhost/codeigniter/index.php/Yomari_controller" and you are done.
