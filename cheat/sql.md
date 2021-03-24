Duplicating a MySQL table

create table {new_table} select * from {old_table};

create table {new_table} like {old_table};


Rename column name in SQL

ALTER TABLE TableName RENAME COLUMN OldColumnName TO NewColumnName;

ALTER TABLE TableName CHANGE COLUMN OldColumnName NewColumnName Data Type;


Merubah Urutan Field Tabel di Mysql

ALTER TABLE nama_tabel MODIFY COLUMN nama_field tipe_field AFTER nama_field


Cara Menambah Kolom / Field Baru 

ALTER TABLE   nama_tabel   ADD   nama_kolom varchar (50);

