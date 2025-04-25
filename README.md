
# Application Web pour Hackathon: Système d'Authentification Utilisateur


### Fonctionnalités principales :

1. **Inscription** : Les nouveaux utilisateurs peuvent s'enregistrer via un formulaire.
2. **Connexion/Login** : Les utilisateurs peuvent se connecter avec leur nom d'utilisateur et mot de passe.
3. **Dashboard** : Après la connexion, les utilisateurs sont redirigés vers leur dashboard.
4. **Déconnexion** : Les utilisateurs peuvent se déconnecter en toute sécurité.

## Technologies Utilisées :
- **PHP** pour la programmation côté serveur.
- **MySQL** pour la base de données et le stockage des informations.
- **HTML/CSS** pour l'interface utilisateur.

#### Comment ça marche :

- **register.php**  
  L'utilisateur remplit un formulaire.  
  → On vérifie que les champs ne sont pas vides.  
  → On regarde si le nom est déjà utilisé.  
  → Si tout est bon, on chiffre (hash) le mot de passe avec `password_hash()`.  
  → On ajoute le nom + mot de passe chiffré dans la base de données.

- **login.php**  
  L'utilisateur entre son nom et mot de passe.  
  → On vérifie que les infos existent dans la base.  
  → On compare le mot de passe entré avec celui dans la base avec `password_verify()`.  
  → Si OK, on crée une session et on envoie vers `dashboard.php`.

- **dashboard.php**  
  Page visible seulement si l'utilisateur est connecté.  
  → Sinon, il est redirigé vers `login.php`.

- **logout.php**  
  → On détruit la session.  
  → L'utilisateur est déconnecté et redirigé vers `login.php`.

- **config.php**  
  → Connexion sécurisée à la base avec PDO.


#### Base de données :
- Nous utilisons **MySQL** pour stocker les données avec la methode PDO.
- Le nom de db est `hackathon` est La table `users` contient des champs pour `id`, `username`, et `password`.
- Vous pouvez voir "db.php" pour changer le config du connexion, db_creator.sql pour créer le BD.   

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

---

#### Mesures de sécurité :

- **Hachage des mots de passe** avec `password_hash()`
- **Vérification sécurisée** avec `password_verify()`

- **Filtrage des entrées** avec `filter_input()` pour éviter les injections

- **Requêtes préparées** avec `bindParam` pour se protéger contre les injections SQL

- **Renouvellement d'ID de session** avec `session_regenerate_id()` pour éviter le vol de session
- **Durée de session limitée** ici: 1 heure (`session.gc_maxlifetime`)
- **Cookies de session sécurisés** :
  - `HttpOnly` : empêche l'accès via JavaScript
  - `SameSite=Strict` : protège contre les attaques CSRF
    (CSRF (Cross-Site Request Forgery), c’est quand un site malveillant fait faire une action à ta place sans que tu le saches, pendant que tu es connecté à un autre site.)
  - `Secure` : activé si HTTPS est utilisé
- **Déconnexion propre** avec `session_unset()` et `session_destroy()`

---

## Conclusion

Ce système est une base pour se connecter et s’inscrire en sécurité.  
Il protège les mots de passe avec un **hachage**, utilise des **sessions sécurisées**, et vérifie bien ce que l’utilisateur entre.  
C’est simple mais assez solide pour éviter les attaques courantes.

--- 
