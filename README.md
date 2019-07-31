email => admin@gmail.com
pass => 12345

###silahkan buat fila .htaccess
###isi .htaccess

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
