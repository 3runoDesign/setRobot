let mix = require('laravel-mix');

const rootPath = '';
const resources = 'resources';
const assets = `${resources}/assets`;
const dist = 'dist';

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your WP theme. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */
mix.setPublicPath(dist);
mix.setResourceRoot(rootPath);

mix.webpackConfig({
    output: {
        publicPath: `${dist}/`,
    }})
    .options({
        // processCssUrls: false,
        vue: {
            esModule: true
        },
        extractVueStyles: `${dist}/styles/vue-css.css` // Path or boolean
        //   globalVueStyles: file, // Variables file to be imported in every component.
    })
    .js(`${assets}/scripts/app.js`, `${dist}/scripts/`)
    .extract([
        'babel-polyfill',
        'vue'
    ])
    .sass(`${assets}/styles/app.scss`, `${dist}/styles/`)
    .copy(`${assets}/images/**/*.{png,jpg,jpeg,gif,svg,ico}`, `${dist}/images`, false)
    .copy(`${assets}/fonts/**/*.{eot,svg,ttf,otf,woff,woff2}`, `${dist}/fonts`, false);


if (mix.inProduction()) {
    // Hash and version files in production.
    mix.version(); // need to add cb to theme's php page
}
else {
    // Source maps when not in production.
    mix.sourceMaps()
        .browserSync({
            proxy: 'setrobot.dev',
            files: ['**/*.{blade.php, php}', 'dist/css/**/*.css', 'dist/js/**/*.js'] // no touch me!
        });
}
