# Laravel-custom-multi-guard-auth-with-UI

# 1.configure database in .env file
 # as
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=multiauth
DB_USERNAME=root
DB_PASSWORD=
 
# 2.Install dependencies
 using @composer install

 # 3. upload migrations 

 @ php artisan migrate

 # 4. Add admin detail Because Admin not register using user side.

@ adding Admin password hash used so that Add password with hash encoded.

 # 5. now run server
  @php artisan serve

  # If you have any question you can contact me on my email address tag with this repository and question