# Avtonet
Fake Avtonet

## Vsebina
+ [O Projektu](#about)
+ [Začetki](#getting_started)
+ [Delovanje](#usage)
+ [Contributing](../CONTRIBUTING.md)

 
## O Projektu <a name = "about"></a>
Ime mojega projekta je Fake Avtonet, saj je v bistvu kopija najbolj popularne slovenske spletne strani za iskanje avtomobilov in na splošno vseh motornih vozil. V svojem 
projektu sem poskušal čim bolj natančno posnemati funkcije, ki jih ponuja originalna spletna stran.

## Začetki <a name = "getting_started"></a>
Na začetku je bilo potrebno seveda narediti nov projekt v orodju VS Code, za katerega sem se odločil. Vedel sem, da bom v prihodnje potreboval tudi ostala orodja, ki sem 
si jih moral namestiti.
Namestil sem si Composer s to kodo:
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
Namestil sem si tudi knjižnici za Google in Facebook login, ki sem ju kasneje potreboval.
Knjižnica za Google Login:
```
composer require google/apiclient
```
In še knjižnica za Facebook Login:
```
composer require facebook/graph-sdk --ignore-platform-reqs
```

Pred tem sem si še moral ustvariti račun na spletni strani Google Cloud in na spletni strani Meta for Developers
Google Cloud: https://cloud.google.com/
Meta for Developers: https://developers.facebook.com/

Delo sem začel z E-r diagramom, v katerem sem naredil vse tabele, ki bodo v bazi in jih med seboj pravilno povezal.
Kasneje sem datoteko uvozil v bazo in baza je bila pripravljena.


