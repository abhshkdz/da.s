#da.s

##A simple URL Shortener

###Features

* Shortens any url to a single character id (random or by choice).
* Customizable domain, via config file.
* Stores URL hits as well.
* Really easy to set up.

###Installation

* Set up the db from `schema/structure.sql`.
* Copy over `config.example.php` to `config.php`, and update DB connection details and root domain.
* Add virtual host entry by copying `vhost/da.s` to `/etc/apache2/sites-available/`, edit it to your liking and link it to `/etc/apache2/sites-enabled/`. Also, add a line in `/etc/hosts`
* Restart apache and everything should be fine.

###Todo

* Update the encoding functions to allow more URLs.
* Work on analytics.
* Make a better UI.