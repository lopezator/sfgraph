Database
========
Downloaded from Veekun:

https://veekun.com

Database URL:

https://veekun.com/static/pokedex/downloads/veekun-pokedex.sqlite.gz

Python convert script gist:

https://gist.github.com/nitinhayaran/1517128

How to import database:

1.- Gunzip it.
2.- Convert to MySQL using the following command:

$ sqlite3 .sqlite3 .dump | python ~/scripts/dump_for_mysql.py > dumped_data.sql

3.- Remove/comment first line "PRAGMA ...."
4.- Import mysql