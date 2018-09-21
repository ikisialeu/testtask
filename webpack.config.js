const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/build')

    .addEntry('app', './assets/js/app.js')
    .addStyleEntry('css/app', './assets/css/app.scss')

    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableSassLoader();

module.exports = Encore.getWebpackConfig();