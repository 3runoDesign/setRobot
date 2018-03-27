require('dotenv').config();

let mix = require('laravel-mix');
const proxy_url = process.env.MIX_URL_PROXY;
const config = require('./config.json');

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
mix.setPublicPath(config.paths.build);
mix.setResourceRoot(config.paths.root);

mix.js(`${config.paths.assets}/${config.scripts}`, `${config.paths.build}/scripts/`)
    .extract(config.extract)
    .sass(`${config.paths.assets}/${config.sass}`, `${config.paths.build}/styles/`)
    .copy(`${config.paths.assets}/images/**/*.{png,jpg,jpeg,gif,svg,ico}`, `${config.paths.build}/images`, false)
    .copy(`${config.paths.assets}/fonts/**/*.{eot,svg,ttf,otf,woff,woff2}`, `${config.paths.build}/fonts`, false);


mix.options({
    // processCssUrls: false,
    vue: {
        esModule: true
    },
    // extractVueStyles: `${config.paths.build}/${config.vue_css}` // Path or boolean
    //   globalVueStyles: file, // Variables file to be imported in every component.
});

if (mix.inProduction()) {
    // Hash and version files in production.
    mix.version(); // need to add cb to theme's php page
}
else {
    mix.webpackConfig({
        devtool: 'inline-source-map',
    });
    // Source maps when not in production.
    mix.sourceMaps()
    // .browserSync(config.serve);
        .browserSync({
            proxy: proxy_url,
            files: config.serve.files
        });
}
