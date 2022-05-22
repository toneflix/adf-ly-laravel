# Adf.ly Laravel API wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/toneflix-code/adf-ly-laravel.svg?style=flat-square)](https://packagist.org/packages/toneflix-code/adf-ly-laravel)
[![Total Downloads](https://img.shields.io/packagist/dt/toneflix-code/adf-ly-laravel.svg?style=flat-square)](https://packagist.org/packages/toneflix-code/adf-ly-laravel)

[![Laravel8|9](https://img.shields.io/badge/Laravel-8|9-orange.svg)](http://laravel.com)
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
echo 'First URL shortened (' . $hash1 . '): ' . print_r($res,1);

$res = $adfly->shorten(array('http://www.reddit.com'), 'q.gs');
$shortenedUrl2 = $res['data'][0];
$hash2 = substr($shortenedUrl2['short_url'],strrpos($shortenedUrl2['short_url'],'/')+1);
echo 'Another URL shortened (' . $hash2 . '): ' . print_r($res,1);

$res = $adfly->shorten(array('www.youtube.com'), 'q.gs', 'banner');
$shortenedUrl3 = $res['data'][0];
echo 'Another URL shortened: ' . print_r($res,1);

$res = $adfly->shorten(array('http://www.len10.com/videos/'), 'q.gs', 'int', 13);
$shortenedUrl4 = $res['data'][0];
echo 'Another URL shortened: ' . print_r($res,1);
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
echo 'Shortened URLS just created: ' . print_r($adfly->expand(array($shortenedUrl3['short_url'],$shortenedUrl4['short_url']),array($hash1,$hash2)),1);
```

## LISTING

```php
// List Urls
$urlList = $adfly->getUrls();
echo 'Listing page 1 URLS...: ' . print_r($urlList,1);

// Update Url
$adfly->updateUrl($shortenedUrl1['id'], 'http://modifiedurlaaaa.cat', "int", "The  updated URL", 13, false, false);
echo 'Modified URL: ' . print_r($adfly->expand(array(),array($hash1)),1);

foreach($urlList['data'] as $url){
    echo 'Deleting URL ID: ' . $url['id'];
    $adfly->deleteUrl($url['id']);
}

//List Urls again
$urlList = $adfly->getUrls();
echo 'Listing page 1 URLS...: ' . print_r($urlList,1);
```

## GROUPS

```php
$g = $adfly->createGroup('API Group');
echo 'Created group: ' . print_r($g,1);

$g = $adfly->getGroups(1);
echo 'Listing page 1 GROUPS...: ' . print_r($g,1);
```

## REFERRERS GET

```php
$res = $adfly->getReferrers();
echo 'URL Referrers: ' . print_r($res,1);
```

## COUNTRIES GET

```php
$res = $adfly->getCountries();
echo 'URL Countries: ' . print_r($res,1);
```

## ANNOUNCEMENTS GET

```php
$res = $adfly->getAnnouncements();
echo 'Announcements: ' . print_r($res,1);
```

## publisherReferralStats GET

```php
$res = $adfly->getPublisherReferrals();
echo 'Stats: ' . print_r($res,1);
```

## advertiserReferralStats GET

```php
$res = $adfly->getAdvertiserReferrals();
echo 'Stats: ' . print_r($res,1);
```

## withdrawalTransactions GET

```php
$res = $adfly->getWithdrawalTransactions();
echo 'Transactions: ' . print_r($res,1);
```

## withdraw GET

```php
$res = $adfly->getWithdraw();
echo 'Data: ' . print_r($res,1);
```

## withdraw request GET

```php
$res = $adfly->withdrawRequestInitiate();
echo 'Data: ' . print_r($res,1);
```

## withdraw request DELETE

```php
$res = $adfly->withdrawRequestCancel();
echo 'Data: ' . print_r($res,1);
```

## publisher Stats GET

```php
$res = $adfly->getPublisherStats();
echo 'Stats: ' . print_r($res,1);
```

## user Profile GET

```php
$res = $adfly->getProfile();
echo 'User: ' . print_r($res,1);
```

## advertiser Campaigns GET

```php
$res = $adfly->getAdvertiserCampaigns();
echo 'Stats: ' . print_r($res,1);
```

## advertiser Graph GET

```php
$res = $adfly->getAdvertiserGraph(null,156);
echo 'Stats: ' . print_r($res,1);
```

## advertisers Campaign parts GET

```php
$res = $adfly->getAdvertiserCampaignParts(739026);
echo 'Stats: ' . print_r($res,1);
```

## auth POST

```php
$res = $adfly->auth('1', '2');
echo 'Auth: ' . print_r($res,1);
```

## account publisher referrals

```php
$res = $adfly->getAccountPubReferrals('', '', 1, 1);
echo 'Referrals: ' . print_r($res, 1);
```

## account advertiser referrals

```php
    $res = $adfly->getAccountAdvReferrals('', '', 1, 1);
echo 'Referrals: ' . print_r($res, 1);
```

## account popad referrals

```php
$res = $adfly->getAccountPopReferrals('', '', 1, 1);
echo 'Referrals: ' . print_r($res, 1);
```

## account total referrals

```php
    $res = $adfly->getAccountTotalReferrals();
echo 'Referrals: ' . print_r($res, 1);
```

## Domains

```php
    $res = $adfly->getDomains();
echo 'Domains: ' . print_r($res, 1);
```

## update account details

```php
$res = $adfly->updateAccountDetails([]);
echo 'Result: ' . print_r($res, 1);
```

## update account password

```php
$res = $adfly->updatePassword('oldpassword', 'newpassword', 'newpassword');
echo 'Result: ' . print_r($res, 1);
```

## get account countries

```php
    $res = $adfly->getAccountCountries();
    echo 'Result: ' . print_r($res, 1);
```

## get account details

```php
    $res = $adfly->getAccountDetails();
    echo 'Result: ' . print_r($res, 1);
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
