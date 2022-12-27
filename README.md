# SurfShack

#### Video Demo:  https://youtu.be/aey8Dx0iew4
#### Description:
SurfShack is a web application designed for surfers to give their opinions on different surfboards. Users can upload photos and indicate the characteristics of each board, such as size, width, thickness, shaper and brand. They can also leave a comment on each board to give their personal opinion. They can create, read, update and delete the surfboards.

Also there is a user profile where they can upload profile puctures, update and delete their profile.

This project was developed in PHP with the symfony framework. I chose this framework because it offers great flexibility and good organization of the code, which facilitates the development and maintenance of the application.

The project includes several files:

The public/index.php file is the entry point of the application. It contains the code that connects to the database and loads the different pages of the application.
The src/Controller directory contains the application controllers. Each controller manages a page or a feature of the application.
The src/Entity directory contains the application entity. Each entity corresponds to a database table and is used to manage the data of this table.
The templates directory contains the views of the application. Each view is an HTML file that displays the content of an application page.

This project was developed in PHP with the symfony framework. To launch the application, follow the instructions below:

Make sure you have a web server and database manager installed on your computer.

Download or clone this Git repository to your computer.

Open a terminal and navigate to the project directory.

Install the project dependencies using the following command:

Copy code
composer install
Create a database and configure connection parameters in the .env file

Create the database structure using the following command:

Copy code
php bin/console doctrine:migrations:migrate
Launch the development server with the following command:

Copy code
php bin/console server:run

Open your browser and navigate to the URL given in the terminal to access the application.


We hope you enjoy SurfShack! Do not hesitate to send any comments or suggestions.