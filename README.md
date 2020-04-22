# Serpstack Laravel API Client

PHP package for the [Serpstack](https://serpstack.com/documentation) API.

## Getting Started

Run the following command to install this package into your project.

```
composer require wdevs/laravel-serpstack
```

### Prerequisites

You will need Composer to install this package.

### Installing

After installing this package with Composer, create a new Serpstack instance. And set the your Serpstack API key in your env file. 

Something like this:

```
$client = new LaravelSerpstack();
```

And call the desired endpoint

```
$client->search()->searchFor('mcdonalds');
```

The current implemented endpoints are: 

* GET   /search
* GET   /locations

Documentation for the available parameters can be found here: [https://serpstack.com/documentation](https://serpstack.com/documentation)

## Running the tests

Copy the phpunit.xml.dist and rename it to phpunit.xml. Set the env variables in the phpunit.xml files.

PLEASE NOTE: running the tests will cost you credits!!!!

* SERPSTACK_API_KEY:  A valid Serpstack access key
* SERPSTACK_SECURE :  True for calling the API over HTTPS

Please see the phpunit.xml.dist for the template.

Run the tests in the Tests directory with PHPUnit.


## Built With

* [Serpstack](https://serpstack.com) - For the API
* [PHPUnit](https://github.com/sebastianbergmann/phpunit/) - Test Framework
* [Laravel](https://github.com/laravel/framework) - Package framework
* [Laravel Package Boilerplate](https://laravelpackageboilerplate.com) - For boiler template this package

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please help us to develop this package. Every input and/or feedback is really appreciated! Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email us instead of using the issue tracker.

## Credits

- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
