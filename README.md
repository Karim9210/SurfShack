# SurfShack

#### Video Demo:  https://youtu.be/aey8Dx0iew4
#### Description:
SurfShack is a web application designed for surfers to give their opinions on different surfboards. Users can upload photos and indicate the characteristics of each board, such as size, width, thickness, shaper and brand. They can also leave a comment on each board to give their personal opinion. They can create, read, update and delete the surfboards.

Also there is a user profile where they can upload profile puctures, update and delete their profile.

This project was developed in PHP with the symfony framework. I chose this framework because it offers great flexibility and good organization of the code, which facilitates the development and maintenance of the application.

The project includes several files:

        The public/index.php file is the entry point of the application. It contains the code that connects to the database and loads the different pages of the application. The file 'index.php' in the Symfony framework is the main entry point for your application. It is responsible for loading all the files and libraries needed to run your application. it creates a new 'Kernel' Symfony object, which is the main class of the framework.
        The 'Kernel' is used to process the current HTTP request and generate a response. Finally, the response is sent to the client and the 'Kernel' is complete.

        The src directory contains many important subdirectories and files :

        The src/Controller directory contains the application controllers. Each controller manages a page or a feature of the application.A controller in the Symfony framework is a class that contains methods that can be called to handle an HTTP request. The controller is responsible for retrieving the necessary data, processing that data, and generating a response to send back to the client.

        In SurfShack there are 4 controllers:

                - The login controller in the Symfony framework is a class that contains methods to manage the login process of users to your application. This controller has a method 'login()' that '/login'. The method uses the object 'AuthenticationUtils' of 'security/login.html.twig'.
                It is important to note that this login controller does not actually manage the user login. This is simply the login user interface, which is handled by Symfony's security system.

                - The registration controller is a specific type of controller that is responsible for handling user registration requests.
                In SurfShack application, the registration controller  contains methods (also called "actions") that handle different types of registration requests. For example, there is a method that handles requests to display the registration form, a method that handles requests to submit the form, and a method that handles requests to confirm the registration.

                - The user controller is a type of controller that is responsible for handling requests related to user management. This include requests to display and edit user profiles, change passwords, and perform other actions related to user accounts. It contains methods that handle different types of requests. For example, there is a method that handles requests to display a user's profile, a method that handles requests to update the user's password, and a method that handles requests to delete the user's account.

                - The Surfboard controller  is a type of controller that is responsible for handling requests related to the surfboards. This include requests to display a list of surfboards, view individual surfboard details and perform other actions related to products. Like other controllers, the surfboard controller is a PHP class that contains methods that handle different types of requests. For example, there is a method that handles requests to display a list of surfboards, a method that handles requests to view the details of a specific surfboard...

        The controller typically interacts with other parts of the application. It also use other Symfony components, such as the form component, to validate and process form data.


        The src/Entity directory contains the application entity. Each entity corresponds to a database table and is used to manage the data of this table.

        In SurfShack there 2 Entitys:

                - The "User" entity is a PHP class that represents a user SurfShack. It is used to store and retrieve user data from the database in an object-oriented way.
                Each user entity class corresponds to a specific database table, and the properties of the entity correspond to the columns in the table. For example, a "User" entity have properties like "id", "pseudo", "email", "password", "pictureFile","picture" "surfboards".
                To create a "User" entity in Symfony, you can use the doctrine:generate:entity command, which will create a basic skeleton for the entity class and set up the necessary configuration in the ORM (Object-Relational Mapper) to map the entity to the database.
                Once you have created your "User" entity, you can use it to perform various database operations, such as inserting, updating, or deleting user records, using the Doctrine ORM.

                - The "surfboard" entity is a PHP class that represents a surfboard in SurfShack. It is used to store and retrieve product data from the database in an object-oriented way.
                Each surfboard entity class corresponds to a specific database table, and the properties of the entity correspond to the columns in the table. For example, a "SurfBoard" entity have properties like "id", "nickname", "review", "price", "width", "length", "thickness", "boardPicture"...
                To create a "Surfboard" entity in Surfshack, you can use the doctrine:generate:entity command, which will create a basic skeleton for the entity class and set up the necessary configuration in the ORM (Object-Relational Mapper) to map the entity to the database.
                Once you have created your "Product" entity, you can use it to perform various database operations, such as inserting, updating, or deleting product records, using the Doctrine ORM.


        The src/Form directory is used to create and process forms. It provides a set of classes and functions that make it easy to build and validate forms inSurfShack.
        The Form component is used in combination with the Twig templating engine, which is the default templating engine in Symfony. To use the Form component, it need to create a form class and a corresponding form template.
        The form class is responsible for defining the fields and validation rules for the form, while the form template is used to render the form in the browser. The form template is typically stored in the "templates/" directory of your application, while the form class is stored in the "src/" directory.

        There are 3 kind of forms in surfShack:

                - The RegistartionFormType.php is a form type class that is used to handle user registration. It is used in combination with the Symfony Security component, which provides tools for managing user authentication and authorization in SurfShack.
                The RegistrationFormType class is responsible for defining the fields and validation rules for the user registration form. It includes fields such as username, password, and email address, as well as validation rules to ensure that the data entered by the user is valid.

                - The UserType.php class is a form type class that is used to build a form for creating or editing a user. It is used in conjunction with the Symfony's form system, which provides a way to create and process HTML forms in a web application.
                The UserType class is defined as a class that extends the AbstractType class and implements the buildForm method. The buildForm method is responsible for defining the fields of the form and their corresponding options, such as the field type, label, and any validation constraints. The UserType class defines a form with four fields: pseudo, email, picture and password, as well as a submit button. The form fields are defined using form field types, such as TextType, EmailType, and PasswordType, which are provided by the Symfony form component.

                - The SurfBoardType.php  class is a form type class that is used to build a form for creating or editing a SurfBoard. It is typically used in conjunction with the Symfony's form system, which provides a way to create and process HTML forms in a web application.
                The SurfBoardType class is typically defined as a class that extends the AbstractType class and implements the buildForm method. The buildForm method is responsible for defining the fields of the form and their corresponding options, such as the field type, label, and any validation constraints. This SurfBoardType class defines a form with  fields:"nickname", "review", "price", "length", "width"... as well as a submit button. The form fields are defined using form field types, such as "TextType", "TextareaType", and "NumberType", which are provided by the Symfony form component.


        The src/Repository a repository is a custom class that extends the EntityRepository class and is used to define custom methods for querying a database table.
        The EntityRepository class is part of the Doctrine ORM (Object-Relational Mapper) library, which provides a set of classes and methods for working with databases in a web application. The EntityRepository class is used to create a custom repository for a specific entity type, such as User and surfBoard.
        A repository class typically lives in the src/Repository directory of a Symfony application, and it is typically registered as a service in the application's dependency injection container. This allows the repository to be injected as a dependency into other parts of the application, such as controllers or forms, where it can be used to retrieve and manipulate data from the corresponding database table.
        
        There are two repositorys in SurfShack :

                - The UserRepository.php 
                - The SurfBoardRepository.php


        The templates directory is where you can store your Twig templates, which are used to define the structure and layout of your application's views. Twig is a powerful and flexible template engine that allows you to write concise and expressive templates in a syntax similar to HTML, but with additional features such as variables, loops, and conditional statements.
        The templates directory is located in the src directory of Surfshack. It contains many subdirectories and templates, and organize the templates. 
        To use a template in SurfShack, you reference it by its path within the templates directory, relative to the templates root. For example, if you have a template located at templates/user/index.html.twig, you would reference it in your controller 

                There are may templates files :
                - templates/Component who contains :
                        -_footer.html.twig
                        -_navbar.html.twig
                -templates/login who contains :
                        - index.html.twig
                -templates/registration who contains :
                        - register.html.twig
                -templates/surf_board who contains :
                        - _delete.html.twig
                        - _form.html.twig
                        - edit.html.twig
                        - index.html.twig
                        - new.html.twig
                        - newSurfBoardEmail.html.twig
                        - show.html.twig
                -templates/user who contains :
                        - _delete_form.html.twig
                        - _form.html.twig
                        - edit.html.twig
                        - index.html.twig
                        - new.html.twig
                        - show.html.twig
                -templates/base.html.twig


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