# WordPress Geolocator

[![Latest Release](https://img.shields.io/github/release/masikonis/wordpress-geolocator.svg)](https://github.com/masikonis/wordpress-geolocator/releases)

Geolocator plugin for WordPress.

Official page: [https://wordpress.org/plugins/geolocator/](https://wordpress.org/plugins/geolocator/)

## Meta box

You can hide post for particular country by filling "Hide for" field in custom meta box in post's edit screen. That way the post will not be included to the loop and other parts of the website.

## Shortcodes

### Country

The most basic shortcode of the plugin is [geolocator] which displays country of the visitor.

### Show

You can show some specific content for particular country by using [geolocator_show] shortcode. See example below.

`[geolocator_show for="US"]This information is being shown to visitors from United States only.[/geolocator_show]`

The shortcode accepts "for" attribute. It should be a 2-letter ISO code of the country you want to show the content for.

### Hide

You can hide some specific content for particular country by using [geolocator_hide] shortcode. See example below.

`[geolocator_hide for="US"]This information is NOT being shown to visitors from United States.[/geolocator_hide]`

The shortcode accepts "for" attribute. It should be a 2-letter ISO code of the country you want to hide the content for.

## Widget

You can display country of the visitor by using Geolocator's widget. It allows you to choose a custom text.

## Credits

This plugin includes GeoLite2 data created by MaxMind, available from [http://www.maxmind.com](http://www.maxmind.com).