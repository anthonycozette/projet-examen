# projet-examen

ce site et un site sur l'organisation des jeux de role grandeur nature


### Ajouter des données de tests
symfony console doctrine:fixtures:load

## Production
### Envoie des mails de contacts

Les mails de prise de contact sont stockes en BDD, pour les envoyer a l'admin par mail, il faut mettre en place un cron sur :

symfony console app:send-contact