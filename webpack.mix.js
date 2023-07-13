const mix = require('laravel-mix');

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
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css', [
        //
    ])
    .sourceMaps()
    .vue({ version: 3 })
    .webpackConfig((webpack) => {
        return {
            plugins: [
                new webpack.DefinePlugin({
                    __VUE_OPTIONS_API__: true,
                    __VUE_PROD_DEVTOOLS__: false,
                }),
            ],
        };
    }).copyDirectory('resources/fonts', 'public/fonts')
    .copyDirectory('resources/media', 'public/media');


/*if (!mix.inProduction()) {
mix.browserSync('rlcos.test');
}*/


if (mix.inProduction()) {
    mix.version()
    //mix.setResourceRoot('../');
    //mix.setResourceRoot(`/${process.env.MIX_BASE_URL}/`);
    //mix.setResourceRoot('/rlcos/public/');
    //mix.setPublicPath('/rlcos/public/');
}

