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
π¦philomena
 β£ πassets
 β β£ πfonts
 β β β£ πfa-brands-400.eot
 β β β£ πfa-brands-400.svg
 β β β£ πfa-brands-400.ttf
 β β β£ πfa-brands-400.woff
 β β β£ πfa-brands-400.woff2
 β β β£ πfa-regular-400.eot
 β β β£ πfa-regular-400.svg
 β β β£ πfa-regular-400.ttf
 β β β£ πfa-regular-400.woff
 β β β£ πfa-regular-400.woff2
 β β β£ πfa-solid-900.eot
 β β β£ πfa-solid-900.svg
 β β β£ πfa-solid-900.ttf
 β β β£ πfa-solid-900.woff
 β β β πfa-solid-900.woff2
 β β£ πimages
 β β β£ πfavicon
 β β β β£ πandroid-chrome-192x192.png
 β β β β£ πandroid-chrome-512x512.png
 β β β β£ πapple-touch-icon.png
 β β β β£ πfavicon-16x16.png
 β β β β£ πfavicon-32x32.png
 β β β β£ πfavicon.ico
 β β β β πsite.webmanifest
 β β β πlayout
 β β β β£ πdouble_caret.png
 β β β β£ πhair.jpg
 β β β β£ πhero.jpg
 β β β β£ πice_cream.jpg
 β β β β£ πlogo_philemena.png
 β β β β£ πmassage.jpg
 β β β β£ πnail.jpg
 β β β β£ πnails.jpg
 β β β β πpattern.jpg
 β β£ πjs
 β β β£ πapp.js
 β β β£ πjquery-ui.min.js
 β β β πjquery.min.js
 β β πscss
 β β β£ πbootstrap-grid.css
 β β β£ πfontawesome.css
 β β β£ πjquery-ui.min.css
 β β β£ πjquery-ui.structure.min.css
 β β β£ πjquery-ui.theme.min.css
 β β β£ πstyle.css
 β β β£ πstyle.css.map
 β β β£ πstyle.scss
 β β β£ π_admin.scss
 β β β£ π_footer.scss
 β β β£ π_general.scss
 β β β£ π_header.scss
 β β β£ π_hero.scss
 β β β£ π_layout.scss
 β β β£ π_mixins.scss
 β β β£ π_modal.scss
 β β β£ π_reset.scss
 β β β π_variables.scss
 β β π.htaccess
 β£ πinc
 β β£ πclass
 β β β£ πMollie
 β β β£ πPHPMailer
 β β β£ πAppointments.php
 β β β£ πCookie.php
 β β β£ πDatabase.php
 β β β£ πQuery.php
 β β β£ πRedirect.php
 β β β£ πSession.php
 β β β πUsers.php
 β β£ πlayout
 β β β£ πadmin.php
 β β β£ πauthentication.php
 β β β£ πhome.php
 β β β£ πregister.php
 β β β πreservation.php
 β β£ π.htaccess
 β β£ πactions.php
 β β£ πautoloader.php
 β β£ πconnect.php
 β β£ πfooter.php
 β β£ πfunctions.php
 β β πheader.php
 β£ π.gitignore
 β£ π.htaccess
 β£ π404.html
 β£ πconfig.php
 β£ πdashboard.php
 β£ πindex.php
 β£ πlogin.php
 β£ πphilomena.sql
 β£ πREADME.md
 β πsignup.php
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
π [philomena.sql](https://github.com/junyi-xie/philomena/blob/main/philomena.sql), feel free to import it into MySQL.
