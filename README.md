# Philomena | Hair & Nails - ALA P8

This project is intended to replace the old school method of phone and register the reservation in a book, instead both the staffs and customers can book online for easier accessibility towards both groups. The whole system that handles this will be written in **Objected-Orientated PHP** and others, such as JavaScript and MySQL to handle Database related matters.

**Note:** Additionally, both customers and staffs are able to log in to their respective dasboard and have a variety of functionalities within their control. To add on that, the customer / guest is limited in actions compared to what an employee / staff are able to do.

## Folder Structure ##
```
📦philomena
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
$Database = new Philomena\Database('127.0.0.1', 'root', '', 'philomena');
$Database->insertQuery("INSERT INTO users SET id = NULL, role_id = 2, first_name = 'admin', last_name = 'admin', phone = 0, email = 'admin@admin.com', password = password_hash('admin', PASSWORD_DEFAULT), address = '', zipcode = '', city = '', province = '', country = 'The Netherlands', account_created = date("YmdHis"), last_login = 0");
```

**Note:** The above code is to create a guest account, if you wish to create an employee account; simply change the _role_id_ to either **3** or **4**, or take a look at the table called __*Roles*__. Aditionally, if you want to have an admin account (able to view both staffs and guests dashboard), you can just change the __*role_id*__ to **1**, this will give you the permission to change views.

## Database ##
w.i.p
