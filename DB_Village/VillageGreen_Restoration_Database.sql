Sauvegarde
Ouvrez un terminal

Pour effectuer la sauvegarde (ou « dump »), saisir la commande :

mysqldump --user=xxx --password=xxx VillageGreen > backup_VillageGreen.sql

Restauration
Pour restaurer, on va utiliser la commande mysql (et non plus mysqldump).

Par précaution, on va restaurer la base VillageGreen sous un autre nom.

Pour la restauration, on va utiliser la commande mysql .

Exécutez la commande suivante :

cat backup_hotel.sql | mysql --user=xxx --password=xxx new_VillageGreen

Dans cet exemple nous vidons le script backup_VillageGreen.sql dans la commande mysql. Toutes les commandes du fichier backup_VillageGreen.sql sont éxécutées...

La base new_Nom_base_de_donnée est utilisée comme base de restauration, il faut qu'elle existe.
