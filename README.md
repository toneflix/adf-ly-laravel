# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/toneflix-code/adf-ly-laravel.svg?style=flat-square)](https://packagist.org/packages/toneflix-code/adf-ly-laravel)
[![Total Downloads](https://img.shields.io/packagist/dt/toneflix-code/adf-ly-laravel.svg?style=flat-square)](https://packagist.org/packages/toneflix-code/adf-ly-laravel)
![GitHub Actions](https://github.com/toneflix-code/adf-ly-laravel/actions/workflows/main.yml/badge.svg)

[![Laravel8|9](https://img.shields.io/badge/Laravel-8|9-orange.svg)](http://laravel.com)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/toneflix/adf-ly-laravel/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/toneflix/adf-ly-laravel/?branch=master)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/toneflix-code/adf-ly-laravel)

This library is a simple laravel package that wraps around Adf.ly API implementations.

Please refere to [Adf.ly API Documentation](https://login.adf.ly/static/other/adfly_api_v1_documentation.pdf?v=20191108) for detailed api use description.

## Requirements

-   [PHP >= 7.41](http://php.net/)
-   [Laravel 8|9](https://github.com/laravel/framework)

## Installation

You can install the package via composer:

```bash
composer require toneflix-code/adf-ly-laravel
```

#### Service Provider & Facade (Optional on Laravel 5.5+)

Register provider and facade on your `config/app.php` file.

```php
'providers' => [
    ...,
    ToneflixCode\AdfLy\AdfLyServiceProvider::class,
]

'aliases' => [
    ...,
    'AdfLy' => ToneflixCode\AdfLy\AdfLyFacade::class,
]
```

#### Configuration (Optional)

```bash
php artisan vendor:publish --provider="ToneflixCode\AdfLy\AdfLyServiceProvider"
```

## API Keys

To start using this library you are required to configure your API keys in your .env file with these variables

```
ADFLY_SECRET_KEY=your-adf.ly secret key
ADFLY_PUBLIC_KEY=your-adf.ly public key
ADFLY_USER_ID=your-adf.ly user ID
```

## Usage

### Shorten Url

```php
use ToneflixCode\AdfLy\AdfLy;
$adfly = new AdfLy;
$res = $adfly->shorten(array('http://stackoverflow.com/users'), 'q.gs');

$shortenedUrl1 = $res['data'][0];
$hash1 = substr($shortenedUrl1['short_url'],strrpos($shortenedUrl1['short_url'],'/')+1);
echo 'First URL shortened (' . $hash1 . '): ' . print_r($res);

$res = $adfly->shorten(array('http://www.reddit.com'), 'q.gs');
$shortenedUrl2 = $res['data'][0];
$hash2 = substr($shortenedUrl2['short_url'],strrpos($shortenedUrl2['short_url'],'/')+1);
echo 'Another URL shortened (' . $hash2 . '): ' . print_r($res);

$res = $adfly->shorten(array('www.youtube.com'), 'q.gs', 'banner');
$shortenedUrl3 = $res['data'][0];
echo 'Another URL shortened: ' . print_r($res);

$res = $adfly->shorten(array('http://www.len10.com/videos/'), 'q.gs', 'int', 13);
$shortenedUrl4 = $res['data'][0];
echo 'Another URL shortened: ' . print_r($res);
```

#### Parameters

```php
function shorten(
    array $urls,
    $domain = false,
    $advertType = false,
    $groupId = false,
    $title = false,
    $customName = false
)
```

## Expand.

```php
print_r($adfly->expand(array($shortenedUrl3['short_url'],$shortenedUrl4['short_url']),array($hash1,$hash2)));
```

## LISTING

```php
// List Urls
$urlList = $adfly->getUrls();
print_r($urlList);

// Update Url
$adfly->updateUrl($shortenedUrl1['id'], 'http://modifiedurlaaaa.cat', "int", "The  updated URL", 13, false, false);
print_r($adfly->expand(array(),array($hash1)));

foreach($urlList['data'] as $url){
    $adfly->deleteUrl($url['id']);
}

//List Urls again
$urlList = $adfly->getUrls();
print_r($urlList);
```

## GROUPS

```php
$g = $adfly->createGroup('API Group');
print_r($g);

$g = $adfly->getGroups(1);
print_r($g);
```

## REFERRERS GET

```php
$res = $adfly->getReferrers();
print_r($res);
```

## COUNTRIES GET

```php
$res = $adfly->getCountries();
print_r($res);
```

## ANNOUNCEMENTS GET

```php
$res = $adfly->getAnnouncements();
print_r($res);
```

## publisherReferralStats GET

```php
$res = $adfly->getPublisherReferrals();
print_r($res);
```

## advertiserReferralStats GET

```php
$res = $adfly->getAdvertiserReferrals();
print_r($res,1);
```

## withdrawalTransactions GET

```php
$res = $adfly->getWithdrawalTransactions();
print_r($res,1);
```

## withdraw GET

```php
$res = $adfly->getWithdraw();
print_r($res,1);
```

## withdraw request GET

```php
$res = $adfly->withdrawRequestInitiate();
print_r($res,1);
```

## withdraw request DELETE

```php
$res = $adfly->withdrawRequestCancel();
print_r($res,1);
```

## publisher Stats GET

```php
$res = $adfly->getPublisherStats();
print_r($res,1);
```

## user Profile GET

```php
$res = $adfly->getProfile();
print_r($res,1);
```

## advertiser Campaigns GET

```php
$res = $adfly->getAdvertiserCampaigns();
print_r($res,1);
```

## advertiser Graph GET

```php
$res = $adfly->getAdvertiserGraph(null,156);
print_r($res,1);
```

## advertisers Campaign parts GET

```php
$res = $adfly->getAdvertiserCampaignParts(739026);
print_r($res,1);
```

## auth POST

```php
$res = $adfly->auth('1', '2');
print_r($res,1);
```

## account publisher referrals

```php
$res = $adfly->getAccountPubReferrals('', '', 1);
print_r($res);
```

## account advertiser referrals

```php
$res = $adfly->getAccountAdvReferrals('', '', 1);
print_r($res);
```

## account popad referrals

```php
$res = $adfly->getAccountPopReferrals('', '', 1);
print_r($res);
```

## account total referrals

```php
$res = $adfly->getAccountTotalReferrals();
print_r($res);
```

## Domains

```php
$res = $adfly->getDomains();
print_r($res);
```

## update account details

```php
$res = $adfly->updateAccountDetails([]);
print_r($res);
```

## update account password

```php
$res = $adfly->updatePassword('oldpassword', 'newpassword', 'newpassword');
print_r($res);
```

## get account countries

```php
$res = $adfly->getAccountCountries();
print_r($res);
```

## get account details

```php
$res = $adfly->getAccountDetails();
print_r($res);
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email code@toneflix.com.ng instead of using the issue tracker.

## Credits

-   [Toneflix Code](https://github.com/toneflix)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
