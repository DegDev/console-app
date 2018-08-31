# console-app
Console-app on Lumen, import shops database from csv to mysql

<h1> Installation </h1>

1. Clone repository
2. Run: Composer Install
3. Setup your database login information in .env file
4. Run:  php artisan migrate

<h1> Console Commands </h1>
<strong>./shop.php Import</strong>  open ./storage/shop.csv file by default, process it and write to MySQL Database <br><br>
**./shop.php Import "/path/to/file.csv"** as param you can select any path to csv file <br><br>
**./shop.php Show [number]** Show in console all records if no parameter given, with parameter show last records.<br>Praremeter value can't be more than 20.<br>
