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
<p>:✌️: fork into your new project</p>
<p>:✨: create a new site with Local</p>
<p>:👯: clone LC3 from your site's app/public directory</p>
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
<li>Do all your editing in the public folder. This folder gets shared into the Vagrant VM.</li>
<li>You'll know the installation is done and watching your code when you see something similar to this:
<img src="https://res.cloudinary.com/dgmk5xxwf/image/upload/v1563147557/Capture_dfahij.png" width="300" style="width: 300px; height: auto; display: block"></li>
<li>LaunchCore will watch your SCSS and JS for changes, then bundle it all together. This applies to both the LaunchCore child theme and the LaunchCore parent theme (which you shouldn't be editing unless adding a new core component).</li>
<li>You won't have to worry about vendor prefixes in your SCSS. LaunchCore incorporates autoprefixer! :)</li>
<li>Be sure to follow the naming conventions and directory structure outlined in the Wiki. This is important for other developers to be able to navigate your work efficiently.</li>
<li>If you build new core components, add them to the Launchcore parent theme and make a pull request on the master repo. Be sure to update this readme with the new competencies, version, and date.</li>
<li>To stop your server, run `vagrant halt`. To start again, `vagrant provision`. To delete it completely, run `vagrant destroy`.</li>
<li>phpmyadmin is available at 55.5.5.5/phpmyadmin (username: root, pass: root)</li>
<li>To import a database, just export as SQL (You'll need it with Add DROP TABLE / VIEW / PROCEDURE / FUNCTION / EVENT / TRIGGER statement). Rename the file 'export.sql' and place it in your public folder. Run `vagrant provision` and follow the prompts.</li>
<li>Being that the public folder is shared between your host and guest machines, you don't have to worry about your code being stuck inside a virtual machine. You can safely plug it into any preferred stack.</li>
<li>To access the WP admin panel, use the username and password as defined in the wpdistillery config.yml</li>
</ul>

## Deployment
- On your server, set up a database and database user.
- Edit the config.yml to include your server and database details. NB - make sure line endings are set to Unix in your editor.
- Run `bash deploy.sh` from the command line and follow the prompts.
- Configure your server's Apache or Nginx to direct the domain to the new installation.
- Currently it deploys the entire thing from the root. We'll soon have a version that deploys just the public folder to make things neater.

## Important notes
ALWAYS follow the coding standards outlined in the LaunchCore project Wiki. Primarily:
- Code with the next developer in mind
- Write decoupled, modular components
- Comment and document thoroughly

## Troubleshooting
- If you're not using launch.bat and get hit with errors on vagrant up, try running the commands that are in launch.bat.
- Is vagrant ssh asking for a password? It's 'vagrant'.
- Make sure you have enabled VT-X.
- Already installed WP? Delete everything in public except wp-content, then vagrant provision.
- `npm install` failing? You may have an old version of node. For Windows users, follow these steps: https://github.com/felixrieseberg/npm-windows-upgrade. Mac users, just bang in this command: `brew update && brew upgrade node && npm update -g npm`.
- If you're a mac user, 'launch' won't work as a command. Just run `vagrant plugin install vagrant-hostmanager && vagrant plugin install vagrant-winnfsd && vagrant up` (it does the same thing).
- If all else fails, ask the LaunchCore slack channel.
- Remember to be patient during installation. It can take a while initially.

## More
Visit the LaunchCore project Wiki for more details.