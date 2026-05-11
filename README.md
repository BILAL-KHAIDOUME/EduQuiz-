# EduQuiz — Application de Quiz

> Plateforme web interne permettant aux formateurs de créer des évaluations rapides et aux apprenants de connaître leur score instantanément.

---

## Contexte

À CodeAcademy, les formateurs perdent énormément de temps à corriger des QCM sur papier après chaque module (HTML, CSS, PHP). EduQuiz est une plateforme web interne qui leur permet d'organiser des évaluations rapides. Les étudiants, de leur côté, souhaitent connaître leur score immédiatement pour savoir s'ils ont validé leurs acquis avant de passer au module suivant.

---

## Personas (Acteurs)

- **Formateur** — Créateur de contenu pédagogique.
- **Apprenant** — Utilisateur qui passe l'évaluation.

---

## Fonctionnalités (User Stories)

### Axe 1 · Authentification & Accès
- Inscription et connexion avec un rôle spécifique (Prof ou Étudiant) et accès à un espace personnel sécurisé.

### Axe 2 · Gestion des Quiz (Côté Formateur)
- Créer un nouveau quiz (titre, description) pour évaluer un module spécifique.
- Ajouter des questions avec plusieurs choix de réponses en indiquant la bonne réponse.
- Modifier ou supprimer une question.
- Générer un code d'accès unique pour chaque quiz afin de ne le partager qu'aux étudiants concernés.

### Axe 3 · Passage du Quiz (Côté Étudiant)
- Utiliser un code pour accéder aux questions d'une évaluation spécifique.
- Voir une interface claire affichant une question à la fois (toutes sur une page) avec les options de réponse.
- Soumettre ses réponses en une seule fois à la fin du temps imparti ou quand le quiz est terminé.

### Axe 4 · Correction & Statistiques
- Voir son score final (ex : 15/20) immédiatement après soumission.
- Voir, après soumission, quelles questions étaient fausses avec la correction associée.
- Accéder à un tableau de bord des résultats affichant les scores de tous les étudiants pour un quiz donné, afin d'identifier ceux qui sont en difficulté.



## Technologies utilisées

| Couche | Technologie |
|--------|-------------|
| Backend | PHP avec **typage strict** |
| Base de données | MySQL (via PDO) |
| Frontend | HTML / **Tailwind CSS** |

---

## Structure du projet

```
EduQuiz/
├── config/
│   └── database.php          # Singleton PDO
├── public/
│   └── index.php             # Point d'entrée & assets / Router / Contrôleur frontal / Tailwind output
├── src/
│   ├── Entities/             # Objets Métier (Pure POO, encapsulation)
│   ├── Repositories/         # Persistance (Requêtes SQL, Hydratation)
│   └── Services/             # Logique métier complète (calcul score)
├── views/                    # Templates HTML (Tailwind) & Assets web
├── .env
├── .gitignore
└── tailwind.config.js
```

---

## Installation

```bash
# 1. Cloner le dépôt
git clone <url-du-repo>
cd EduQuiz

# 2. Configurer l'environnement
cp .env.example .env
# Remplir les variables DB_HOST, DB_NAME, DB_USER, DB_PASS

# 3. Importer la base de données
mysql -u root -p < database/schema.sql


# 5. Démarrer le serveur PHP local
php -S localhost:8000 -t public/
```

---


## Diagrammes UML






---








*Projet réalisé dans le cadre de la formation **Développement Backend avec Programmation Orientée Objet** — WebWizards*