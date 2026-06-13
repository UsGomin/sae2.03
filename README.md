### SAE 2.03

##### fic sae203.conf
```
le fichier sae203.conf est a mettre dans le dossier : /etc/apache2/sites-availables/
Une fois le fichier mis il faut faire la commande 'a2ensite' pour activer le site
```

##### fics htmls/css/js
```
les fichiers html/css/js sont a mettre dans un dossier nommé précisement 'sae203',
ce dossier est a mettre dans le dossier: /var/www/
```

##### fic index
```
il y'a 4 variables dans la balise php pour se connecter a la database.
> Elle sont a changer en fonction des valeurs que vous devez mettre pour que ca fonctione
```
##### fic sql
```
Pour le script sql il faut deja voir creer la database sae.
Pour utiliser le script il faut faire: mysql -u 'utilisateur' -p 'password' sae < script.sql
```
