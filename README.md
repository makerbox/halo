# LAUNCHCORE
WordPress development framework for Five By Five Global

Version 3.0.0
200202
(using Local for local development)

## Features
- WordPress
- Webpack
- Autoprefixer
- Xdebug
- PhpMyAdmin
- Green Sock
- Scroll Magic
- Slick
- Babel
- Modernizr
- Jest
- SASS
- jQuery
- CSS and JS linting
+ more to come in future versions

## Requirements
- Node https://nodejs.org/en/download/

## Installation
<p>:point_up: get all the requirements</p>
<p>✌️ fork into your new project</p>
<p>✨ create a new site with Local</p>
<p>👯 clone LC3 from your site's app/public directory</p>
<p>:ok_hand: run `npm install`</p>

## Core competencies
- As we build more components etc, this list will grow.

## Preferred plugins
- Check this list before using a plugin.
- Add / edit this list when using a new or better plugin.
- Avoid plugins altogether wherever possible - preferably write new plugins to avoid 3rd party code.

## Use
<ul>
	<li><b>Please read the LaunchCore Wiki before use</b></li>
<li>Fork into a new project before using. Never work with the master repo.</li>
<li>You'll know you're ready to go when you see something similar to this:
<img src="https://res.cloudinary.com/dgmk5xxwf/image/upload/v1563147557/Capture_dfahij.png" width="300" style="width: 300px; height: auto; display: block"> it indicates wepback is watching your code for changes</li>
<li>LaunchCore will watch your SCSS and JS for changes, then bundle it all together. This applies to both the LaunchCore child theme and the LaunchCore parent theme (which you shouldn't be editing unless adding a new core component).</li>
<li>You won't have to worry about vendor prefixes in your SCSS. LaunchCore incorporates autoprefixer! :)</li>
<li>Be sure to follow the naming conventions and directory structure outlined in the Wiki. This is important for other developers to be able to navigate your work efficiently.</li>
<li>If you build new core components, add them to the Launchcore parent theme and make a pull request on the master repo. Be sure to update this readme with the new competencies, version, and date.</li>
</ul>

## Deployment


## Important notes
ALWAYS follow the coding standards outlined in the LaunchCore project Wiki. Primarily:
- Code with the next developer in mind
- Write decoupled, modular components
- Comment and document thoroughly

## Troubleshooting
- `npm install` failing? You may have an old version of node. For Windows users, follow these steps: https://github.com/felixrieseberg/npm-windows-upgrade. Mac users, just bang in this command: `brew update && brew upgrade node && npm update -g npm`.
- If all else fails, ask the LaunchCore slack channel.

## More
Visit the LaunchCore project Wiki for more details.