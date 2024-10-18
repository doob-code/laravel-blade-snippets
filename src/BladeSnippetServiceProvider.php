<?php

namespace DoobCode\BladeSnippets;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeSnippetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Define the custom Blade directive @snip
        Blade::directive('snip', function ($variableName) {
            return "<?php ob_start(); ?>";
        });

        // Define the custom Blade directive @endsnip
        Blade::directive('endsnip', function ($variableName) {
            return "<?php 
                \$${$variableName} = Blade::render(ob_get_clean()); 
            ?>";
        });
    }

}

