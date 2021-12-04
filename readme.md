# BackpackIntlTelInput

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![The Whole Fruit Manifesto](https://img.shields.io/badge/writing%20standard-the%20whole%20fruit-brightgreen)](https://github.com/the-whole-fruit/manifesto)

This package provides you the ability to enter and validate international telephone numbers for projects that use the [Backpack for Laravel](https://backpackforlaravel.com/) administration panel. 

More exactly, it adds the [intl-tel-input](https://intl-tel-input.com/) plugin to your Backpack CRUD interfaces as a field so you can easily input valid interational telephone numbers.


## Screenshots

![Backpack Intl Tel Input Addon](https://user-images.githubusercontent.com/1624261/144711736-7491f056-ba6d-4ca1-b78b-0aa6504fb6fb.png)


## Installation

Via Composer

``` bash
composer require mikeybelike/intl-tel-input-backpack
```

## Usage

To use the field this package provides, inside your custom CrudController do:

```php
$this->crud->addField([
    'name' => 'contact_number',
    'label' => 'Contact Number',
    'type' => 'intl-tel-input',
    'view_namespace' => 'mikeybelike.intl-tel-input-backpack::fields',

    // additional optional configuration supported
    'options' => [
        'initialCountry' => 'gb'
    ]
]);
```

Notice the ```view_namespace``` attribute - make sure that is exactly as above, to tell Backpack to load the field from this _addon package_, instead of assuming it's inside the _Backpack\CRUD package_.


## Overwriting

If you need to change the field in any way, you can easily publish the file to your app, and modify that file any way you want. But please keep in mind that you will not be getting any updates.

**Step 1.** Copy-paste the blade file to your directory:
```bash
# create the fields directory if it's not already there
mkdir -p resources/views/vendor/backpack/crud/fields

# copy the blade file inside the folder we created above
cp -i vendor/mikeybelike/intl-tel-input-backpack/src/resources/views/fields/field_name.blade.php resources/views/vendor/backpack/crud/fields/field_name.blade.php
```

**Step 2.** Remove the vendor namespace wherever you've used the field:
```diff
$this->crud->addField([
    'name' => 'contact_number',
    'type' => 'intl-tel-input',
    'label' => 'Contact Number',
-   'view_namespace' => 'mikeybelike.intl-tel-input-backpack::fields'
]);
```

**Step 3.** Uninstall this package. Since it only provides one file, and you're no longer using that file, it makes no sense to have the package installed:
```bash
composer remove mikeybelike/intl-tel-input-backpack
```

## Change log

Changes are documented here on Github. Please see the [Releases tab](https://github.com/mikeybelike/intl-tel-input-backpack/releases).

## Testing

``` bash
composer test
```

## Contributing

Please see [contributing.md](contributing.md) for a todolist and howtos.

## Security

If you discover any security related issues, please email hi@mikey.dev instead of using the issue tracker.

## Credits

- [Michael Olukoya][link-author]
- [All Contributors][link-contributors]

## License

This project was released under MIT, so you can install it on top of any Backpack & Laravel project. Please see the [license file](license.md) for more information. 

However, please note that you do need Backpack installed, so you need to also abide by its [YUMMY License](https://github.com/Laravel-Backpack/CRUD/blob/master/LICENSE.md). That means in production you'll need a Backpack license code. You can get a free one for non-commercial use (or a paid one for commercial use) on [backpackforlaravel.com](https://backpackforlaravel.com).


[ico-version]: https://img.shields.io/packagist/v/mikeybelike/intl-tel-input-backpack.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mikeybelike/intl-tel-input-backpack.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/mikeybelike/intl-tel-input-backpack
[link-downloads]: https://packagist.org/packages/mikeybelike/intl-tel-input-backpack
[link-author]: https://github.com/mikeybelike
[link-contributors]: ../../contributors
