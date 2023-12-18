<h1 align="center">Laravel E-lectronix.com</h1>

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

<p>Welcome to Laravel Shop_v2! This project is a simple e-commerce platform built using the Laravel PHP framework. It allows you to set up an online shop with user registration, admin rights, and more.</p>
<p align="center">
    <picture>
  <source
    srcset="https://github-readme-stats.vercel.app/api?username=phattran1023&show_icons=true&theme=transparent"
    media="(prefers-color-scheme: dark)"
  />
  <source
    srcset="https://github-readme-stats.vercel.app/api?username=anuraghazra&show_icons=true"
    media="(prefers-color-scheme: light), (prefers-color-scheme: no-preference)"
  />
  <img src="https://github-readme-stats.vercel.app/api?username=anuraghazra&show_icons=true" />
</picture>
</p>

<h2>Installation</h2>

<p>Follow the steps below to install and run the project:</p>

<ol>
  <li>Change to your working directory.</li>
  <li>Right-click -> open with terminal (command prompt or shell).</li>
  <li>Clone the repository:</li>
</ol>

<pre>
git clone https://github.com/phattran1023/Shop_v2.git
</pre>

<ol start="4">
  <li>Navigate to the project directory:</li>
</ol>

<pre>
cd Shop_v2
</pre>

<ol start="5">
  <li>Open the project in your preferred code editor (e.g., Visual Studio Code):</li>
</ol>

<pre>
code .
</pre>

<ol start="6">
  <li>Install project dependencies using Composer:</li>
</ol>

<pre>
composer update
</pre>
<pre>
composer require laravel/socialite
</pre>
<pre>
composer require barryvdh/laravel-dompdf
</pre>
    
<p><em>Note: If you encounter any errors during the <code>composer update</code> process, navigate to the 'bootstrap' folder and delete the 'cache' folder. Then create a new 'cache' folder with the same name and run 'composer update' again.</em></p>

<ol start="7">
  <li>Generate a unique application key:</li>
</ol>

<pre>
php artisan key:generate
</pre>

<ol start="8">
  <li>Copy the '.env.example' file and rename it to '.env':</li>
</ol>

<p><em>Windows (Command Prompt):</em></p>

<pre>
copy .env.example .env
</pre>

<p><em>Linux/macOS (Terminal):</em></p>

<pre>
cp .env.example .env
</pre>

<ol start="9">
  <li>Open the '.env' file and set the <code>DATABASE_NAME</code> to your desired database name (e.g., 'ecommerce').</li>
  <li>Import file 'ecommerce.sql' into MySQL</li>
  <li>Open MySQL, create a new Database name: 'ecommerce', then select import, then choose the file 'ecommerce.sql'</li>    
</ol>


<ol start="11">
  <li>Start the development server:</li>
</ol>

<pre>
php artisan serve
</pre>

<ol start="12">
  <li>Open <a href="http://127.0.0.1:8000/">http://127.0.0.1:8000/</a> in your web browser to access the application.</li>
  <li>Register an account. Then go to MySQL, 'users' table, and change the 'role_as' column to 1 to set admin rights.</li>
</ol>

<p>Congratulations! The installation process is complete.</p>

<h2>Updating the Code</h2>

<p>To update the code from the GitHub repository, follow these steps:</p>

<ol>
  <li>Navigate to the project folder using the terminal or command prompt.</li>
  <li>Pull the latest changes from the remote repository:</li>
</ol>

<pre>
git pull
</pre>

<h2>Contributing</h2>

<p>If you wish to contribute to this project, please follow the standard GitHub workflow:</p>

<ol>
  <li>Fork the repository.</li>
  <li>Create a new branch for your feature or bug fix.</li>
  <li>Make your changes and commit them.</li>
  <li>Push your branch to your forked repository.</li>
  <li>Open a pull request to merge your changes into the main repository.</li>
</ol>

<p>Thank you for your interest in contributing!</p>

<h2>License</h2>

<p>This project is open-source and available under the <a href="https://opensource.org/licenses/MIT">MIT License</a>.</p>
