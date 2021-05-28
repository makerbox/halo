=== Geolocator ===
Contributors: masikonis
Tags: geolocator, ip based location, ip location, user country, show for country, hide for country
Requires at least: 4.1.1
Tested up to: 4.9
Stable tag: 1.1
License: GPLv2 or later

Get website visitor's location based on IP address and show/hide specific content depending on country.

== Description ==

Get website visitor's location based on IP address and show/hide specific content depending on country.

= Meta box =

You can hide post for particular country by filling "Hide for" field in custom meta box in post's edit screen. That way the post will not be included to the loop and other parts of the website.

= Shortcodes =

*Country*

The most basic shortcode of the plugin is [geolocator] which displays country of the visitor.

*Show*

You can show some specific content for particular country by using [geolocator_show] shortcode. See example below.

`[geolocator_show for="US"]This information is being shown to visitors from United States only.[/geolocator_show]`

The shortcode accepts "for" attribute. It should be a 2-letter ISO code of the country you want to show the content for.

*Hide*

You can hide some specific content for particular country by using [geolocator_hide] shortcode. See example below.

`[geolocator_hide for="US"]This information is NOT being shown to visitors from United States.[/geolocator_hide]`

The shortcode accepts "for" attribute. It should be a 2-letter ISO code of the country you want to hide the content for.

= Widget =

You can display country of the visitor by using Geolocator's widget. It allows you to choose a custom text.

= Credits =

This plugin includes GeoLite2 data created by MaxMind, available from [http://www.maxmind.com](http://www.maxmind.com).

== Screenshots ==

1. Shortcodes of the plugin in post's edit screen.
2. Shortcodes displayed in the listing of theme.
3. Custom meta box that allows to hide post for country.
4. Simple widget that displays country of the visitor.
5. Plugin settings, it allows to set fallback IP.

== Changelog ==

= 1.1 =
* Refactored framework of the plugin, it's now more future-proof;
* Changed data source to GeoLite-Country database by MaxMind;
* Created shortcodes, widget and custom post meta box.

= 1.0.1 =
* Depreciated Telize API provider since it does not work anymore;
* Improved the code style to match more the one defined in Codex.