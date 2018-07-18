let mix = require('laravel-mix');
let StyleLintPlugin = require('stylelint-webpack-plugin');

mix.webpackConfig(webpack => {
    return {
        plugins: [
            new StyleLintPlugin({
                configFile: './.stylelintrc.json',
                files: './resources/assets/sass/**/*.s?(a|c)ss',
                syntax: 'scss'
            }),
        ]
    }
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sourceMaps()
    .version();