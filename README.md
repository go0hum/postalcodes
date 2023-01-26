# API for Postal Code in Mexico tools

- Mysql
- Laravel 8

## Installation


docker-compose up -d --build

step 1 .- you need run or in the interface run the command 

run the command

php artisan migrate:refresh --seed

later you can see the test

vendor/bin/phpunit 

you can see in the next url the result:

localhost:8000/api/zip-codes/77519

and you can see without locations results 

localhost:8000/api/zip-codes/77519
