# Dynamic data table component with Laravel 8 & React JS with Hooks, Bootstrap 5

### Installation Setup Laravel + InertiaJS + React, Install Admin Panel - https://voyager.devdojo.com/

-   git clone `git@github.com:futuresea-dev/Laravel_React_DataTable-`
-   `cd Laravel_React_DataTable-`
-   `cp .env.example .env` and update database credentials `php artisan key:generate`
-   Install the dependencies: `composer install`
-   Install frontend dependencies: `yarn`
-   Compile the code: `yarn dev` or `yarn watch`
-   Boot the server: `php artisan serve`
-   Access: `http://localhost:8000`

### Created 3 Models with migrations:
- Hero [name, health]
- Weapon [name, damage, is_range]
- HeroWeapons

### In Voyager create BREAD for Hero and Weapon Models to manage them (after should be visible in admin menu). Fill some data (5 heroes, 10 weapons). Add weapons to heroes.

![alt text](https://github.com/futuresea-dev/Laravel_React_DataTable-/blob/main/image/admin-hero.png?raw=true)

![alt text](https://github.com/futuresea-dev/Laravel_React_DataTable-/blob/main/image/admin-weapon.png?raw=true)

### Create pages for users in REACT part of app. Use https://react-bootstrap.github.io/getting-started/introduction for UI.

/heroes - bootstrap table with off all heroes + their sum damage (implement method for Hero : getDamage)
/weapons - bootstrap table of weapons and how many are used by heroes


![alt text](https://github.com/futuresea-dev/Laravel_React_DataTable-/blob/main/image/heroes.png?raw=true)

![alt text](https://github.com/futuresea-dev/Laravel_React_DataTable-/blob/main/image/weapons.png?raw=true)
