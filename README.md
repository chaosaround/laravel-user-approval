### Installation

```
composer install && php artisan migrate
```

#### Seeders
To create admin user:

```
php artisan db:seed --class=AdminUserSeeder
```

You may override default login/pass pair (admin@admin.admin / approvaladmin) with ENV variables: INITIAL_ADMIN_EMAIL and INITIAL_ADMIN_PASSWORD.

To seed users table with 30 records:
```
php artisan db:seed --class=UsersTableSeeder
```