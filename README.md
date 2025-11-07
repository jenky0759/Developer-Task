# developer-task

This project is a simple Customer and Contacts listing page with associated summary tables and detail forms

## Setup

### Database
Make sure you have installed Docker installed

To start your MySQL instance you can run the following:
```
docker run --name developer-task -e MYSQL_ROOT_PASSWORD=<your_password> -p 3306:3306 -d mysql:9.0
```
Replace `<your_password>` with your desired password.

Once executed you should see, if using Docker Desktop your new MySQL container. If using CLI run `docker ps`

### Laravel

To run Laravel you will need PHP, Composer and Node on your local machine.

Download node version 24.11.0 from https://nodejs.org/en/download or use https://www.nvmnode.com/

Execute the following based on OS

**Mac**
```
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"
```

**Windows**

In a terminal with administrator privileges run:
```
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```

**Linux**
```
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
```

See https://laravel.com/docs/11.x/installation#creating-a-laravel-project for further details

Once installed go to the project directory and run:
```
composer install
npm i && npm run build
```

Update the .env file with the correct database connection details before executing the following:

```
php artisan migrate
```

Type **yes** to creating the database

To get both vite and laravel running you will need to execute separately:

```
php artisan serve
```
and
```
npm run dev
```
