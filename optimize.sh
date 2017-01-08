#!/bin/sh
php artisan clear-compiled;
php artisan cache:clear;
php artisan view:clear;
php artisan optimize;

#echo Press Enter...
#read