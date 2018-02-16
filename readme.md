## Steps to run this project:

1. Create a new **.env** file using **.env.example** file as example. Configure your database on this file.
2. Run **composer install** to install all PHP libs and the Laravel Framework
3. Run **npm install** to install all Javascript libs
4. Run **npm run dev** to compile the Javascript assets
5. Run **php artisan key:generate** to generate the application key
6. Run **php artisan storage:link** to craete the symbolic link for file uploads on the public folder
7. Run **php artisan migrate:fresh --seed** to generate the application key
8. And finally, run **php artisan serve** to run the application
9. You can access using the user **admin@admin.com**, with password **admin**, created with the migrations using the --seed option above.

## License

The code base is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
