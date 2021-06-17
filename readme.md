![Nova Inline Select banner](https://raw.githubusercontent.com/kirschbaum-development/nova-inline-select/master/screenshots/banner.jpg)

# An inline select field for Nova apps

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kirschbaum-development/nova-inline-select.svg)](https://packagist.org/packages/kirschbaum-development/nova-inline-select)
[![Total Downloads](https://img.shields.io/packagist/dt/kirschbaum-development/nova-inline-select.svg)](https://packagist.org/packages/kirschbaum-development/nova-inline-select)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/024838dcc31d4b3889d1d885fa0cc20d)](https://app.codacy.com/app/Kirschbaum/nova-inline-select?utm_source=github.com&utm_medium=referral&utm_content=kirschbaum-development/nova-inline-select&utm_campaign=Badge_Grade_Dashboard)
[![Actions Status](https://github.com/kirschbaum-development/nova-inline-select/workflows/CI/badge.svg)](https://github.com/kirschbaum-development/nova-inline-select/actions)

This package contains a Nova select field that can update field values inline from the index and detail views.

![screenshot of the inline select field](https://raw.githubusercontent.com/kirschbaum-development/nova-inline-select/master/screenshots/pending.png)
![screenshot of the inline select field ready for submitting](https://raw.githubusercontent.com/kirschbaum-development/nova-inline-select/master/screenshots/approved.png)

## Requirements

This Nova field requires Nova 1.0 or higher.

## Installation

You can install this package in a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require kirschbaum-development/nova-inline-select
```

## Usage

Next you can use the `KirschbaumDevelopment\Nova\InlineSelect` field in your Nova resource:

```php
namespace App\Nova;

use KirschbaumDevelopment\Nova\InlineSelect;

class User extends Resource
{
    // ...

    public function fields(Request $request)
    {
        return [
            // ...

            InlineSelect::make('Status'),

            // ...
        ];
    }
}
```

Now you can use the `InlineSelect` field just like Nova's `Select` field. Now for the magic...

### Inline editing

By default, the inline select field works just like a normal select field. To enable the inline editing capabilities we can use the `inlineOnIndex()` and `inlineOnDetail()` methods.

```php
InlineSelect::make('Status')->options($options)
    ->inlineOnIndex()
    ->inlineOnDetail(),
```

Now the above inline select field will show up on both the index and detail views. When making a change to the select field, a button will display next to the field allowing you to commit the change. If you would prefer the field to auto-submit the change, just add `disableTwoStepOnIndex()` or `disableTwoStepOnDetail()`.

```php
InlineSelect::make('Status')->options($options)
    ->inlineOnIndex()
    ->disableTwoStepOnIndex(),
```

Now changing the select field on the index view will auto-submit the changed value.

You can also add the inline select to Lenses. Use the `inlineOnLens()` method. Auto-submitting works the same as well with `disableTwoStepOnLens()`.

```php
InlineSelect::make('Status')->options($options)
    ->inlineOnLens()
    ->disableTwoStepOnLens(),
```

### Display using labels

This method works just like Nova's select field. It will display the option value rather than the option key.

```php
InlineSelect::make('Status')->options($options)
    ->displayUsingLabels(),
```

### Using closures as  `options()` argument

You may pass a closure to the options method. It must return a key value pair array.

```php
InlineSelect::make('Status')
    ->options(function () {
        return [
            'one' => 'foo',
            'two' => 'bar',
        ];
    }),
```


### Validation caveats

In the case where fields on a model are `required`, which is likely, an extra step needs to be taken to ensure the inline select update persists and doesn't throw an error. The validation rule `sometimes` needs to be added to the `updateRules()` method on any field that is `required`.

```php
Text::make('Email')
    ->rules('required', 'email')
    ->updateRules('sometimes'),
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email brandon@kirschbaumdevelopment.com or nathan@kirschbaumdevelopment.com instead of using the issue tracker.

## Credits

- [Brandon Ferens](https://github.com/brandonferens)

## Sponsorship

Development of this package is sponsored by Kirschbaum Development Group, a developer driven company focused on problem solving, team building, and community. Learn more [about us](https://kirschbaumdevelopment.com) or [join us](https://careers.kirschbaumdevelopment.com)!

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
