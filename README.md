### Party Pokhara
#### Config

1. use composer to install all vendor
```
composer install
```

2. there is no media file in storage: create this folder in project
```
storage/app/public/images
```

3. do not forgot to link media
```
php artisan storage:link
```

4. Lastly use auto load to use custom facades & class
```
composer dump-autoload
```