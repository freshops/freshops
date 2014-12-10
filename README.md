# Freshops

More info coming soon.

## Development notes

The following is just an outline of how one might go about developing WordPress locally.

### Download and setup WP

Get a local copy of WordPress installed. Put it wherever you want (your `~/Sites` directory is a good spot).

### Clone this repo

Next, clone this repo. I use [GitHub for Mac](https://mac.github.com/) and I put all of my repositories here: `~/github/mhulse/`

### Symlink this repo

Navigate to your WordPress’ `wp-content/themes` directory and run (modify path to match your setup):

```bash
$ ln -s ~/github/freshops/freshops
```

Now you can use this theme in your WordPress install.

Depending on your setup, you may need to enable this theme.

### Create a `hosts` file entry

We’re going to spoof the local domain `freshops.local`.

For this task, I like to use [Hosts for Mac](http://www.macupdate.com/app/mac/40003/hosts).

Visual instructions:

![hosts](https://cloud.githubusercontent.com/assets/218624/5311699/d495cee2-7bff-11e4-897e-f60ac39a2594.gif)

**Note:** Don’t forget to click the lock button, otherwise the spoof won’t work.

### Make an Apache `VirtualHost`

Next, crack open your Apache vhosts `conf` file and add something like:

```apache
<VirtualHost *:80>
	DocumentRoot "/Users/mhulse/Sites/freshops"
	ServerName freshops.local
	ServerAlias www.freshops.local
	ErrorLog "logs/freshops.local-error.log"
	CustomLog "logs/freshops.local-access.log" combined
	DirectoryIndex index.php index.html
	<Directory "/Users/mhulse/Sites/freshops">
		Options -Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Order allow,deny
		Allow from all
		Require all granted
	</Directory>
</VirtualHost>
```

### Start your server

Turn on your local server/mysql and visit: <http://freshops.local>

You should see your site load with this theme showing.

### What next?

Now, it’s just a matter of editing your theme.

### GitHub

I like to use [GitHub for Mac](https://mac.github.com/).

When you’re ready, push changes to GitHub and then skip to **[updating repo](#updating-repo)**.

I reccomend one follows the workflow of:

1. Via the repo’s issue tracker, create an issue for every problem you need to solve.
1. Locally, make commits and [close said issues via commit messages](https://help.github.com/articles/closing-issues-via-commit-messages/).
1. When you’re day is done (or it feels right), sync your changes.

## Production machine

Setting up repo on production machine …

### Folder hierarchy

I like to use a setup [similar to this](https://github.com/mhulse/bueller); here’s a visual:

![screen shot 2014-12-04 at 11 50 29 pm](https://cloud.githubusercontent.com/assets/218624/5312526/5dd83be4-7c10-11e4-8f04-4e3135f6fa76.png)

### Clone

Navigate to the `content/themes/` directory and:

```bash
$ git clone https://github.com/freshops/freshops.git
```

The above command will clone the `freshops` repo into a `themes/freshops` directory.

**Read:** [Which remote URL should I use?](https://help.github.com/articles/which-remote-url-should-i-use/)

### Updating repo

When you’re ready to update the live theme repository, do this:

```bash
$ cd content/themes/freshops/
$ git remote update && git status
```

If everything from above command looks good, then run:

```bash
$ git pull
```

Next, check the live site to make sure nothing broke. :laughing:

## Tips

Useful bits to know …

### Tail the log

To see php errors and warnings, 

`ssh freshops@web400.webfaction.com`

then

```bash
$ tail -f webapps/beta2/content/debug.log
```

I like to keep one Terminal tab open just to watch for errors/warnings.

### Change permissions

```bash
# Files:
$ find freshops/ -type f -print0 | xargs -0 chmod 644
# Folders:
$ find freshops/ -type d -print0 | xargs -0 chmod 755
```
