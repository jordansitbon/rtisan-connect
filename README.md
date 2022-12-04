# Rtisan Connect

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jordansitbon/rtisan-connect.svg?style=flat-square)](https://packagist.org/packages/jordansitbon/rtisan-connect)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/jordansitbon/rtisan-connect/run-tests?label=tests)](https://github.com/jordansitbon/rtisan-connect/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/jordansitbon/rtisan-connect/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/jordansitbon/rtisan-connect/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jordansitbon/rtisan-connect.svg?style=flat-square)](https://packagist.org/packages/jordansitbon/rtisan-connect)
<!--delete-->

---

This repo can be used to connect Rtisan to your Laravel application.
<!--delete-->

---

## Installation

For use Rtisan Connect you need to sign up for a Rtisan account and create a new project.
After project creation, you can generate the Connect Token with clicking on the " ⚡️ " button.

You can install the package via composer:

```bash
composer require jordansitbon/rtisan-connect
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="rtisan-connect-config"
```

This is the contents of the published config file:

```php
return [
    'token' => env('RTISAN_CONNECT_TOKEN'),
];
```

## Usage

To upload your language files to Rtisan, you can use the `rtisan:upload` command:

```bash
php artisan rtisan:upload
```

To download the language files from Rtisan to your app, you can use the `rtisan:download` command:

```bash
php artisan rtisan:download
```

[//]: # (## Changelog)

[//]: # (Please see [CHANGELOG]&#40;CHANGELOG.md&#41; for more information on what has changed recently.)

[//]: # (## Contributing)

[//]: # (Please see [CONTRIBUTING]&#40;CONTRIBUTING.md&#41; for details.)

[//]: # (## Security Vulnerabilities)

[//]: # (Please review [our security policy]&#40;../../security/policy&#41; on how to report security vulnerabilities.)

## Credits

- [Jordan Sitbon](https://github.com/jordansitbon)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
