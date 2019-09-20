const { mix } = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/cxl_assets/js/app.js', 'js/frontend.js')
    .sass( __dirname + '/Resources/cxl_assets/sass/app.scss', 'css/frontend.css');

if (mix.inProduction()) {
    mix.version();
}
