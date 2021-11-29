const mix = require('laravel-mix');

mix.js(['resources/js/app.js', 'resources/js/uploader.js'], 'public/js')
  .vue()
  .css('resources/css/uploader.css', 'public/css')
  .sass('resources/sass/app.scss', 'public/css')

mix.disableNotifications()

mix.options({
    terser: {
        extractComments: false
    }
})
