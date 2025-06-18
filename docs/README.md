<p align="center">
  <img src="./docs/laravel-clevertap.png" width="500" height="auto" alt="Laravel CleverTap">
</p>

# Laravel CleverTap

A Laravel package for seamless CleverTap API integration.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bilalbaraz/laravel-clevertap.svg?style=flat-square)](https://packagist.org/packages/bilalbaraz/laravel-clevertap)
[![Total Downloads](https://img.shields.io/packagist/dt/bilalbaraz/laravel-clevertap.svg?style=flat-square)](https://packagist.org/packages/bilalbaraz/laravel-clevertap)
![GitHub License](https://img.shields.io/github/license/bilalbaraz/laravel-clevertap?style=flat-square)
![Coveralls](https://img.shields.io/coverallsCoverage/github/bilalbaraz/laravel-clevertap?style=flat-square)

## Installation

You can install the package via composer:

```bash
composer require bilalbaraz/laravel-clevertap
```

## Configuration

After installing the package, publish the configuration file using:

```bash
php artisan vendor:publish --provider="BilalBaraz\LaravelCleverTap\CleverTapServiceProvider"
```

This will create a `config/clevertap.php` file in your application. Configure your CleverTap credentials in this file:

```php
return [
    'account_id' => env('CLEVERTAP_ACCOUNT_ID'),
    'passcode' => env('CLEVERTAP_PASSCODE'),
];
```

Then, add your CleverTap credentials to your `.env` file:

```
CLEVERTAP_ACCOUNT_ID=your-account-id
CLEVERTAP_PASSCODE=your-passcode
```

## Basic Usage

T.B.D.

## Advanced Usage

T.B.D.

## Features

T.B.D.

## API Implementation Roadmap

The following CleverTap APIs will be implemented in this package:

- [ ] Settings API
- [ ] Campaign APIs
  - [x] Create Campaign
  - [ ] Stop Scheduled Campaign
  - [ ] Get Campaign Reports
  - [x] Get Campaigns
- [ ] Catalog API
- [ ] Custom List API
- [ ] Event APIs
- [ ] Profile APIs
  - [ ] Get User Profiles
  - [ ] Upload User Profiles
  - [ ] Upload Device Tokens
  - [ ] Get Profile Count
  - [ ] Delete User Profile
  - [ ] Demerge User Profile
  - [ ] Subscribe
  - [ ] Disassociate a Phone Number
- [ ] Remote Config API
  - [ ] Create/Define Variables
  - [ ] Delete Variables
  - [ ] Get Variables
- [ ] Report APIs
- [ ] Bulletins API

## License

The MIT License (MIT). Please see [License](LICENSE.md) for more information.