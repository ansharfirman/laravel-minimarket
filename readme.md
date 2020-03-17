<p align="center"><img src="https://www.dropbox.com/s/iem18a9c754uo7q/login.png?dl=0"></p>

## About Laravel Mini Market
Laravel Mini Market is an open source web based point of sales system built on Laravel 5.5, with a community support. It's focused on user experience, and offers precise control for designers and developers.

## Features
<ul>
    <li>Dashboard</li>
    <li>Bank</li>
    <li>Customer</li>
    <li>Stakeholder</li>
    <li>Suppliers</li>
    <li>Product Stock</li>
    <li>Product Category</li>
    <li>Product Brand</li>
    <li>Product Group</li>
    <li>Sales</li>
    <li>Purchase Order</li>
    <li>Fee Cost</li>
    <li>Reporting</li>
    <li>Audit Trail</li>
    <li>User ,Role and Permission</li>
</ul>

## System Requirements
<ul>
    <li>MySQL 5.7 or higher</li>
    <li>PHP 5.6 or 7.x</li>
    <li>Modern Web Browser</li>
    <li>Git Bash</li>
    <li>Composer 1.x</li>
</ul>

## Getting started

<p>Laravel Mini Market works with <a href="https://laravel.com/" rel="nofollow">Laravel 5</a>, on any platform.</p>
<p>To get started with Wagtail, run the following in a virtual environment:</p>

<div class="highlight highlight-source-shell">
<pre>
git clone https://github.com/sandyandryantoo/laravel-minimarket.git
<span class="pl-c1">cd</span> laravel-minimarket
composer update
cp .env.example .env 
</pre>
<p>please set up you database and environmet in file .env</p>
<pre>
php artisan key:generate
php artisan jwt:secret
php artisan config:cache
php artisan config:clear
php artisan cache:clear
php artisan db:seed
php artisan serve
</pre>
<pre>
Then open your browser with http://localhost:8000/
</pre>
<pre>
if you want to run different port 
try using php artisan serve --port=[PORT_NUMBER] 
example php artisan serve --port=7070
</pre>
</div>

## Security
<p>
    We take the security of laravel mini market, and related packages we maintain, seriously. If you have found a security issue with any of our projects please email us at sandyandryanto@gmail.com so we can work together to find and patch the issue. We appreciate responsible disclosure with any security related issues, so please contact us first before creating a Github issue.
</p>

