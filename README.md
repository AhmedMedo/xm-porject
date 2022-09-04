# XM dashboard to search for open/close prices using yahoo finance
## After downloading the project:
- run this command to install project dependencies 
``
composer install
``
- them copy .env.example file
``
cp .env.example .env
``
- migrate the database (i used sqlite database here) 
``
php artisan migrate
``
- for better performance , company symbols are saved in database instead of calling the nasdaq api each time , so run this command to upadate company list
``
php artisan fill:company-symbol
``
- run the project to see search form 
``
php artisan serve
``

## main features
- front end form validations befor submit
- using apex chart to see search result 
- using datatable to search in result
- dark / light mood for in theme

## screenshoots

1- Home page
![homepage](https://i.postimg.cc/qBxxg8R8/Screenshot-from-2022-09-04-01-36-19.png)

2- validations
![validations](https://i.postimg.cc/qqwsYdYm/Screenshot-from-2022-09-04-01-36-24.png)

3- Final result
![Final result](https://i.postimg.cc/0jVSn0MF/final-result.png)
