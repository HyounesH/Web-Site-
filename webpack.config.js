var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    // the public path you will use in Symfony's asset() function - e.g. asset('build/some_file.js')
    .setManifestKeyPrefix('build/')

    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())

    // the following line enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    .addEntry('js/jquery','./assets/js/jquery.js')
    .addEntry('js/jquery.min','./assets/js/jquery.min.js')
   .addEntry('js/jquery.prettyPhoto','./assets/js/jquery.prettyPhoto.js')
   .addEntry('js/jquery.scrollUp.min','./assets/js/jquery.scrollUp.min.js')
   .addEntry('js/bootstrap.min','./assets/js/bootstrap.min.js')
   .addEntry('js/contact','./assets/js/contact.js')
   .addEntry('js/gmaps','./assets/js/gmaps.js')
   .addEntry('js/html5shiv','./assets/js/html5shiv.js')
   .addEntry('js/main','./assets/js/main.js')
   .addEntry('js/price-range','./assets/js/price-range.js')
   .addStyleEntry('css/app', './assets/css/app.css')
    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you use Sass/SCSS files
    //.enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
