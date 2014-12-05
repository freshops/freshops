# Freshops

More info coming soon.

## Development notes

The following is just an outline of how one might go about developing WordPress locally.

### Download and setup WP

Get a local copy of WordPress installed. Put it wherever you want (your `~/Sites` folder is a good spot).

### Clone this repo

Next, clone this repo. I use [GitHub for Mac](https://mac.github.com/) and I put all of my repositories here: `~/github/mhulse/`

### Symlink this repo

Navigate to your WordPress’ `wp-content/themes` folder and run (modify path to match your setup):

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

Now, it’s just a matter of editing your theme. Push changes to GitHub and then pull them to production when you’re ready.

More on that coming soon …

## Tips

Useful bits to know …

### Tail the log

To see php errors and warnings, `ssh` to the server, and:

```bash
$ tail -f content/debug.log
```

I like to keep one Terminal tab open just to watch for errors/warnings.
