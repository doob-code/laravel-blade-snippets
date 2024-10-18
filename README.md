
# Laravel Blade Snippets

A simple Blade directive for Laravel that allows you to render components and HTML directly to a PHP variable from within a Blade view. This is particularly useful for passing dynamic content to Livewire components or other parts of your application.

## Installation

You can install the package via Composer:

```bash
composer require doob-code/laravel-blade-snippets
```

### Service Provider

This package will automatically register its service provider, but if you need to do it manually, add the service provider to your `config/app.php` file:

```php
'providers' => [
    // ...
    DoobCode\BladeSnippets\BladeSnippetServiceProvider::class,
],
```

## Usage

### Defining Snippets

Use the `@snip` and `@endsnip` directives to capture Blade components or HTML into a variable.

#### Example:

```blade
@snip('popoverContent')
    <x-popover>Dynamic section content here</x-popover>
@endsnip

<!-- Pass the $popoverContent variable to a Livewire component -->
@livewire('valuation.next-page-button', [
    'disabled_popover' => $popoverContent,
])
```

### Note on Variables

When using the directives, make sure to provide a variable name without extra quotes. The directive automatically trims surrounding quotes.

## License

This package is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue for any bugs or enhancements.

## Acknowledgments

- Laravel framework
- Blade templating engine

