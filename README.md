<!-- PROJECT LOGO -->
<br />
<p align="center">
   <!-- logoo -->

   <!-- title -->
  <h3 align="center">Notification Task</h3>

  <!-- <p align="center">
    <br />
    <a href="">user api docs</a>
    ·
    <a href="">provider api docs</a>
  </p> -->
</p>

### Info & Description

```
Laravel Version :  11.36.1

```

### Requirements

```
PHP VERSION  8.2.4
NODEJS VERSION 18.*

```

<!-- ### Notes

```
please make sure that the document root of the domaine points to /public directory for security reason
/etc/apache2/sites-available
do not forget to set this settings in both, https and http
``` -->
<!--
### Thank you

| Packagage            | source                                         |
| -------------------- | ---------------------------------------------- |
| Laravel Settings     | https://github.com/anlutro/laravel-settings    |
| Laravel-API-Debugger | https://github.com/mlanin/laravel-api-debugger |
| PayPal-PHP-SDK       | https://github.com/paypal/PayPal-PHP-SDK       | -->

### 1. clone the Package & install the packages and set the project folder name

```
git clone https://github.com/rajabrajab/notification-task.git project
```

```
composer install
```

### 1. setup env file & testing env file

Run this commands from the Terminal:

```
cp .env.example .env
```

```
cp .env.example .env.testing
```

### 2. Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

### 3. setup the database & add some dummy data

Run this commands from the Terminal:

```
php artisan migrate
```

```
php artisan db:seed
```

### 4. Install node_modules

```
npm install

```

### 5. run vite

```
npm run dev

```

### 6. run the server

```
php artisan serv

```

### 7. Create admin account

```
http://localhost:8000/create-admin

```

### 8. add the pusher config

Configure Pusher for Broadcasting
In order to use real-time broadcasting with Pusher, you will need to configure the Pusher credentials in your .env file.
add these lines to the .env

```

BROADCAST_DRIVER=pusher
PUSHER_APP_ID=1919421
PUSHER_APP_KEY=14281d88e744fb263600
PUSHER_APP_SECRET=0b4fed17160cccf7c966
PUSHER_APP_CLUSTER=ap1

VITE_PUSHER_APP_KEY=14281d88e744fb263600
VITE_PUSHER_APP_CLUSTER=ap1


```

## Testing the Notification System

### 1. Run the Queue Worker

To ensure that your notification is processed in the background, you need to start the queue worker. Run the following command in your terminal:

```
php artisan queue:work
```

### 2. Log in as Admin

To test the notification system, you need to log in as the **admin**. The admin dashboard is accessible via the following URL:

```
http://localhost:8000/log/1
```

### 3. Update Vehicle Mileage

1. Navigate to the **vehicles page** by going to this link on another tap:

    ```
    http://localhost:8000/vehicles
    ```

2. On this page, update the **mileage** of a vehicle. Ensure that the mileage is updated to a value that is **close to the maintenance limit** (within 15,000 miles of the maintenance interval).

### 4. Receive the Alert Notification

Once the vehicle mileage is updated and reaches the threshold (15k miles close to maintenance), an **alert notification** will appear for the **admin** on the admin dashboard.

-   **Alert Message**: The admin will see a pop-up alert or a real-time notification that says something like:

    ```
    "Vehicle with license plate ABC1234 is nearing maintenance!"
    ```

```
## Contact

```

ABD ALWAHED RAJAB
email : abdalwahedrajabb@gmail.com
wtsp : +963959011404

```

```
