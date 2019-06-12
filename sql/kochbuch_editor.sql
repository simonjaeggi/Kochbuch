CREATE USER 'kochbuch_editor'@'localhost' identified by 'ASdf123:*SDsd';
grant select, insert, update, delete on kochbuch.* to 'kochbuch_editor'@'localhost';
FLUSH PRIVILEGES;

