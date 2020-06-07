# 🛡️ Lokalna Tarcza 🛡️


Nowadays, when many of small businesses lost their source of income, they are facing bankruptcy. This project strives to help them in keeping steady income.
Our application helps entrepreneurs to easily offer vouchers on services they provide. Those vouchers can be used in future, when world will return to "normal".
Additionally, customers can be offered discounts, which can further motive them to support endangered, local businesses.

More details on how application works can be found at:
https://lokalnatarcza.pl/

## Prerequsites
* Node
* PHP 7.3+
* PostgreSQL

## Installation

Execute following steps
- Fill out a .env file in the project root using the .env.example file as a template
- Install composer dependencies using `composer install`
- Run `php artisan key:generate` `php artisan migrate` `php artisan passport:install` and `php artisan storage:link`
- Install NPM dependencies using `npm install`
- Make sure to create two databases, one main and one for running the tests, then run `php artisan migrate`
- If you want to use the webpack dev server, make sure that the proxy entry in the weback.dev.js points to the server that's running your Laravel installation.

## Development

Two start the project, un two terminals, run following commands

```
npm run start-server
```

```
npm run hot
```

## Building

If you want to build application you can do this using following commands

```
npm run dev
```

Or if you are doing production build

```
npm run production
```

## Important note about development

Since this application takes advantage of webpack hashes to bust caches in production, the asset() and mix() helpers are used when loading front end assets. This means that it is important to set a correct value for `ASSET_URL` in your `.env` file. Otherwise Laravel will load assets from the wrong place.

If you are developing using `npm run hot` - make sure to set `ASSET_URL` to `http://localhost:9000`, otherwise for development set it to the root URL of your app.

In production you will need to set this value to the public root, that will usually be the same as your domain name.
