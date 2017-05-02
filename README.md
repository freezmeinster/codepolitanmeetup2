# Code untuk Code Politan Meetup #2 

Source Code untuk acara  Code Politan Meetup yang kedua dengan materi Rapid Application Development with Odoo. Berikut ini adalah kode yang digunakan. Kode ini terdiri dari beberapa komponen yaitu : 

  - Odoo module bernama "laundryku", untuk contoh modul odoo-nya
  - Code Igniter code sebagai contoh akses odoo lewat XMLRPC
  
Untuk menjalankan odoo dengan perintah :

```sh
odoo --addons-path=<path-modul-laundryku>
```
Contoh nya :

```sh
odoo --addons-path=/home/bram/Code/codepolitanmeetup/odoo/laundryku/
```

Untuk menjalankan php dengan perintah :
```sh
cd <direktori codeigniter>
make runserver
```

Contoh nya :
```sh
cd /home/bram/Code/codepolitanmeetup/php/
./bin/server.sh
```
