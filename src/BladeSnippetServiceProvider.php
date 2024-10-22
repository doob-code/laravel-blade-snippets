<?php

namespace DoobCode\BladeSnippets;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeSnippetServiceProvider extends ServiceProvider
{
    private $variableName;

    public function boot()
    {

        // Define the custom Blade directive @snip
        Blade::directive('snip', function ($variableName) {
            $variableName = trim($variableName, "\'\""); //trim the extra single quotes
            $this->variableName = "{$variableName}";
            return '<?php ob_start(); ?>';
        });

        // Define the custom Blade directive @endsnip
        Blade::directive('endsnip', function () {

            if (empty($this->variableName)) {
                throw new InvalidArgumentException('Cannot end a snip without first starting one.');
            }

            return '<?php echo $'.$this->variableName.' = ob_get_clean(); ?>';
        });
    }

}


