## installation

<hr/>

-   git clone https://github.com/fihriaziz/test_inosoft.git
-   cd test_inosoft
-   cp .env.example .env
-   change DB CONNECTION, PORT, DATABASE, and USERNAME according to you own database
-   composer install
-   php artisan key:generate
-   php artisan migrate:fresh --seed
-   php artisan jwt:secret
-   php artisan serve
