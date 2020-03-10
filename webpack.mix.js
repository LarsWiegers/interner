const mix = require('laravel-mix');
const path = require('path');

require('laravel-mix-tailwind');

mix.js('resources/js/app.js', 'public/js')
   .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
   .sass('resources/sass/app.scss', 'public/css')
   .webpackConfig({
     output: { chunkFilename: 'js/[name].js?id=[chunkhash]' },
     resolve: {
       alias: {
         'vue$': 'vue/dist/vue.runtime.esm.js',
         '@': path.resolve('resources/js'),
       },
     },
   })
   .babelConfig({
       plugins: ['@babel/plugin-syntax-dynamic-import']
   })
   .version()
    .tailwind();

