# DESCRIPTION
This repository is designed to import zip-codes via excel and show them via API

# INSTALLATION

Clone the repo

```
git clone https://github.com/ccssmania/zip-codes
cd zip-codes
```

run
```
composer install
npm install
```

First you need to import the zip-code go to the route

```
APP_URL/import-codes
```

After that you can use the API

```
APP_URL/api/zip-codes/{zipCode}
```

# NOTES
The project is using laravel 8 and php 7.4, I am using ```Laravel-Excel``` for importing the zip-codes