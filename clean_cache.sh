#!/bin/sh
php artisan clear-compiled;
php artisan cache:clear;
php artisan view:clear;

#echo Press Enter...
#read