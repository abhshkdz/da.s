<VirtualHost *:80>
  ServerName da.s
  ServerAdmin das.abhshk@gmail.com
  DocumentRoot /home/abhshkdz/projects/personal/da.s
  <Directory /home/abhshkdz/projects/personal/da.s>
    #Do not show indexes
    #Do not follow symlinks
    Options -Indexes -MultiViews
    Order allow,deny
    allow from all
    # Turn on the rewrite engine
    RewriteEngine On

    # Don't rewrite any directory or file that exists: 
    RewriteCond %{REQUEST_URI} !-f
    RewriteCond %{REQUEST_URI} !-d

    # Rewrite!
    RewriteRule ^([a-zA-Z0-9_\-\+]+)$ redirect.php?id=$1
  </Directory>
  ErrorLog /var/log/apache2/das.error.log

  # Possible values include: debug, info, notice, warn, error, crit,
  # alert, emerg.
  LogLevel warn
  CustomLog /var/log/apache2/das.access.log combined
</VirtualHost>