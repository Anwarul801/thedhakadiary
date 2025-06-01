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

// mix
//   .js("resources/js/app.js", "public/js")
//   .postCss("resources/css/app.css", "public/css", [
//     require("@tailwindcss/postcss"),
//   ]);
mix
  .js("resources/js/app.js", "public/js")
  .postCss("public/frontend/assets/css/tailwind_css/tailwind_input.css", "public/frontend/assets/css/tailwind_css/tailwind_output.css", [
    require("@tailwindcss/postcss"),
  ]);