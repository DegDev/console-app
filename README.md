# console-app
Console-app on Lumen, import shops database from csv to mysql

<h1> Installation </h1>

1. Clone repository
2. Run: Composer Install
3. Setup your database login information in .env file
4. Run:  php artisan migrate

<h1> Console Commands </h1>
<code><b>./shop.php Import</b></code>  open ./storage/shop.csv file by default, process it and write to MySQL Database <br><br>
<code><b>./shop.php Import "/path/to/file.csv"</b></code> as param you can select any path to csv file <br><br>
<code><b>./shop.php Show [number]</b></code> Show in console all records if no parameter given, with parameter show last records.<br>Praremeter value can't be more than 20.<br>
