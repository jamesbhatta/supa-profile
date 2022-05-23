##  Sifaris - Business Registration App
Dedicated for managing the registration process of businesses.

### Installation
```bash
git clone https:/github.com/jamesbhatta/sifaris.git
```

```bash
cd sifaris
```

```bash
composer install
```

```bash
cp .env.example .env
```

Now, set the environment variables in ``` .env ``` file .

Generate application keys:
```bash
php artisan key:generate
```

Make sure you have configured database details.

Additionally add the ***google drive credentials*** and ***slack webhook url***.


Now migrate  database using:

```bash
php artisan migrate 
```

Seed the database with some defaults values:
```bash
php artisan db:seed
```
Optionally you can migrate and seed in single command: ```php artisan migrate --seed``` . This command will first migrate the database and then run the `DatabaseSeeder` class , which will be used to call other seed classes. 

If you are using google drive backup option, you only need to add the following Cron entry to your server:
```php
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```
This Cron will call the Laravel command scheduler every minute. When the `schedule:run` command is executed, Laravel will evaluate your scheduled tasks and run the tasks that are due.

Since this project is using livewire, you need to make sure the routes for livewire are configured properly. This will work fine most of the times but when your app is running in subdomains then you must set the url of you application in .env file with the key of ``LIVEWIRE_ASSET_URL``