CREATE USER 'kochbuch_editor'@'localhost' IDENTIFIED WITH mysql_native_password BY 'ASdf123:*SDsd';
grant select, insert, update, delete on kochbuch.* to 'kochbuch_editor'@'localhost';
FLUSH PRIVILEGES;
