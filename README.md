# Philomena | Hair & Nails - ALA P8

This project is intended to replace the old school method of phone and register the reservation in a book, instead both the staffs and customers can book online for easier accessibility towards both groups. The whole system that handles this will be written in **Objected-Orientated PHP** and others, such as JavaScript and MySQL to handle Database related matters.

**Note:** Additionally, both customers and staffs are able to log in to their respective dasboard and have a variety of functionalities within their control. To add on that, the customer / guest is limited in actions compared to what an employee / staff are able to do.

## Configuration ##
To start the database connection, head over to [config.php](https://github.com/junyi-xie/philomena/blob/main/config.php) and change the define params to your own settings, for example:
```php
define('HOSTNAME', '127.0.0.1');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'philomena');
```
This will autoload the [database](https://github.com/junyi-xie/philomena/blob/main/inc/class/Database.php) class, which contains the connection to the database and has the the [query](https://github.com/junyi-xie/philomena/blob/main/inc/class/Query.php) class for the CRUD functionalities. Inside there are 4 functions; Select, Update, Insert and Delete, these functions are used in combination with some other classes to basically do all the backend stuff.

**Note:** The [users](https://github.com/junyi-xie/philomena/blob/main/inc/class/Users.php) and [appointments](https://github.com/junyi-xie/philomena/blob/main/inc/class/Appointments.php) classes are still being worked on, this will get updated once I have completed them. 

## Folder Structure ##
```
📦philomena
 ┣ 📂assets
 ┃ ┣ 📂fonts
 ┃ ┃ ┣ 📜fa-brands-400.eot
 ┃ ┃ ┣ 📜fa-brands-400.svg
 ┃ ┃ ┣ 📜fa-brands-400.ttf
 ┃ ┃ ┣ 📜fa-brands-400.woff
 ┃ ┃ ┣ 📜fa-brands-400.woff2
 ┃ ┃ ┣ 📜fa-regular-400.eot
 ┃ ┃ ┣ 📜fa-regular-400.svg
 ┃ ┃ ┣ 📜fa-regular-400.ttf
 ┃ ┃ ┣ 📜fa-regular-400.woff
 ┃ ┃ ┣ 📜fa-regular-400.woff2
 ┃ ┃ ┣ 📜fa-solid-900.eot
 ┃ ┃ ┣ 📜fa-solid-900.svg
 ┃ ┃ ┣ 📜fa-solid-900.ttf
 ┃ ┃ ┣ 📜fa-solid-900.woff
 ┃ ┃ ┗ 📜fa-solid-900.woff2
 ┃ ┣ 📂images
 ┃ ┃ ┣ 📂favicon
 ┃ ┃ ┃ ┣ 📜android-chrome-192x192.png
 ┃ ┃ ┃ ┣ 📜android-chrome-512x512.png
 ┃ ┃ ┃ ┣ 📜apple-touch-icon.png
 ┃ ┃ ┃ ┣ 📜favicon-16x16.png
 ┃ ┃ ┃ ┣ 📜favicon-32x32.png
 ┃ ┃ ┃ ┣ 📜favicon.ico
 ┃ ┃ ┃ ┗ 📜site.webmanifest
 ┃ ┃ ┗ 📂layout
 ┃ ┃ ┃ ┣ 📜double_caret.png
 ┃ ┃ ┃ ┣ 📜ice_cream.jpg
 ┃ ┃ ┃ ┗ 📜logo_philemena.png
 ┃ ┣ 📂js
 ┃ ┃ ┣ 📜app.js
 ┃ ┃ ┣ 📜jquery-ui.min.js
 ┃ ┃ ┗ 📜jquery.min.js
 ┃ ┗ 📂scss
 ┃ ┃ ┣ 📜bootstrap-grid.css
 ┃ ┃ ┣ 📜fontawesome.css
 ┃ ┃ ┣ 📜jquery-ui.min.css
 ┃ ┃ ┣ 📜jquery-ui.structure.min.css
 ┃ ┃ ┣ 📜jquery-ui.theme.min.css
 ┃ ┃ ┣ 📜style.css
 ┃ ┃ ┣ 📜style.css.map
 ┃ ┃ ┣ 📜style.scss
 ┃ ┃ ┣ 📜_admin.scss
 ┃ ┃ ┣ 📜_footer.scss
 ┃ ┃ ┣ 📜_general.scss
 ┃ ┃ ┣ 📜_header.scss
 ┃ ┃ ┣ 📜_layout.scss
 ┃ ┃ ┣ 📜_mixins.scss
 ┃ ┃ ┣ 📜_reset.scss
 ┃ ┃ ┗ 📜_variables.scss
 ┣ 📂inc
 ┃ ┣ 📂class
 ┃ ┃ ┣ 📂Mollie
 ┃ ┃ ┣ 📂PHPMailer
 ┃ ┃ ┣ 📜Appointments.php
 ┃ ┃ ┣ 📜Cookie.php
 ┃ ┃ ┣ 📜Database.php
 ┃ ┃ ┣ 📜Query.php
 ┃ ┃ ┣ 📜Redirect.php
 ┃ ┃ ┣ 📜Session.php
 ┃ ┃ ┗ 📜Users.php
 ┃ ┣ 📂layout
 ┃ ┃ ┣ 📜authentication.php
 ┃ ┃ ┗ 📜registration.php
 ┃ ┣ 📜autoloader.php
 ┃ ┣ 📜connect.php
 ┃ ┣ 📜footer.php
 ┃ ┣ 📜functions.php
 ┃ ┗ 📜header.php
 ┣ 📜.gitignore
 ┣ 📜.htaccess
 ┣ 📜404.php
 ┣ 📜config.php
 ┣ 📜dashboard.php
 ┣ 📜index.php
 ┣ 📜login.php
 ┣ 📜philomena.sql
 ┣ 📜README.md
 ┗ 📜signup.php
```

## Requirements ##
- Customers must be able to log in to the customer / guest dashboard.
- Customers must be able to make an appointment for a treatment.
- Customers must be able to pay for the appointment immediately.
- Customers must be able to receive an email after they have confirmed their appointment.
- Employees must be able to log in to the employee / staff dashboard.
- Employees must be able to view appointments.
- Employees must be able to delete appointments.
- Employees must be able to change appointments.

## Access the Dashboard ##
If you wish to log in to the dashboard, you can login with admin@admin.com / admin, or if you would like to create your own account, you can use the below code to create a new account manually.

```php
$Database->Insert(table: "users", data: ['role_id' => '2', 'first_name' => 'admin', 'last_name' => 'admin', 'phone' => '0', 'email' => 'admin@admin.com', 'password' => password_hash('admin', PASSWORD_DEFAULT), 'address' => '', 'zipcode' => '', 'city' => '', 'province' => '', 'country' => 'The Netherlands', 'account_created' => date("YmdHis"), 'last_login' => '0',]);
```

**Note:** The above code is to create a guest account, if you wish to create an employee account; simply change the _role_id_ to either **3** or **4**, or take a look at the table called __*Roles*__. Aditionally, if you want to have an admin account (able to view both staffs and guests dashboard), you can just change the __*role_id*__ to **1**, this will give you the permission to change views.

## Database ##
📃 [philomena.sql](https://github.com/junyi-xie/philomena/blob/main/philomena.sql), feel free to import it into MySQL.
