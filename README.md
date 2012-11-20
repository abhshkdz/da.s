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

###Todo

* Update the encoding functions to allow more URLs.
* Work on analytics.
* Make a better UI.