Les tests sont fait sur la branche test

Pour lancer l'application, il faut lancer les commandes suivantes :

```bash
docker compose up -d
```

Les images de ElesticSaerch de my sql et de rabbit ont était modifiées car l'image Elastic Search était imcompatible avec une version de docker desktop actuelle: un problème Ja va
un network a était créer pour que les services puissent communiquer entre eux.

L'image de départ a était modifier pour une version alpine bcp plus légère.
