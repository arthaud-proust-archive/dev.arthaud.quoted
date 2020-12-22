<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Content Language Lines
    |--------------------------------------------------------------------------
    */
    'header' => [
        'home' => 'Accueil',
        'quotes' => 'Les citations',
        'new' => 'Ajouter',
        'about' => 'À propos',
        'back' => 'Retour',
        'search' => 'Chercher une citation',
        'contribute' => 'Contribuer'
    ],

    'home' => [
        'subtitle' => 'Une phrase hors-contexte est une citation.',
        'me' => [
            'title' => 'Profil et actions',
            'logout'=>'Se déconnecter',
            'profil' => 'Mon profil',
            'new' => 'Ajouter une citation',
            'quotes' => 'Mes citations',
            'edit' => 'Modifier mon profil',
            'users' => 'Liste des utilisateurs'
        ],
        'toverif' => [
            'title' => 'Citations à vérifier',
        ],
        'philo' => [
            'title' => 'Philo',
            'more' => 'En voir plus'
        ],
        'latest' => [
            'title' => 'Derniers ajouts',
            'more' => 'Tout voir'

        ],
        'popular' => [
            'title' => 'Populaires',
            'more' => 'En voir plus'
        ],
    ],
    
    'results' => [
        'title' => '{0} Aucun résultat|{1} Résultat de recherche|[2,*] Résultats de recherche',
    ],

    'auth' => [
        'title' => [
            'register' => 'Créer un compte',
            'login' => 'Se connecter',
            'update' => 'Changer le mot de passe',
            'reset' => 'Mot de passe oublié',
            'edit' => 'Modifier le profil'
        ],
        'fields' => [
            'name' => 'Nom d\'utilisateur',
            'email' => 'Adresse email',
            'password' => 'Mot de passe',
            'rpassword' => 'Confirmer le mot de passe',
            'remember' => 'Rester connecté'
        ],
        'links' => [
            'forget' => 'Mot de passe oublié',
            'login' => "J'ai déjà un compte",
            'register' => "Je n'ai pas de compte",
            'cancel' => "Annuler",
            'passwordchange' => "Changer le mot de passe"
        ],
        'register' => 'Inscription',
        'login' => 'Connexion',
        'save' => 'Mettre à jour',
        'reset' => 'Réinitialier le mot de passe'
    ],
    
    'add' => [
        'title' => 'Ajouter une citation',
        'labels' => [
            'group' => 'Groupe',
            'content' => 'Citation',
            'author' => 'Auteur'
        ],
        'inputs' => [
            'none' => 'Aucun',
            'content' => 'I have a quote',
            'author' => 'Martin Luther King',
            'submit' => 'Ajouter'
        ]
    ],

    'edit' => [
        'title' => 'Éditer la citation',
        'labels' => [
            'group' => 'Groupe',
            'content' => 'Citation',
            'author' => 'Auteur'
        ],
        'inputs' => [
            'none' => 'Aucun',
            'content' => 'C\'est vide!',
            'author' => 'C\'est vide!',
            'submit' => 'Enregistrer',
            'delete' => 'Supprimer'
        ]
    ],

    'show' => [
        'edit' => 'Éditer la citation'
    ],

    'index' => [
        'title' => 'Toutes les citations, sans exception.',
        'orderby' => [
            'label'=>'Lister par',
            'items'=>[
                ['Date', 'creation'],
                ['Popularité', 'popularity']
            ]
        ],
        'group' => [
            'label'=>'Groupe',
            'items'=> [
                ['Tous','all'],
                ['Aucun', 'none']
            ]
        ]
    ],

    'about' => [
        'title' => 'Pourquoi, quoi donc?',
        'why' => [
            'title' => 'Pourquoi?',
            'content' => [
                "Pour regrouper des citations, philosophiques et de tout autre type, parce qu'une citation n'est pas nécessairement une phrase philosophique sacrée."
            ]
        ],
        'how' => [
            'title' => 'Comment?',
            'content' => [
                'Pour contribuer il faut se créer un compte, puis rajouter ses citations dans la catégorie souhaitée. Certaines catégories comme "Philo" nécessitent une vérification de la citation pour qu\'elle soit affichée, le temps qu\'on vérifie qu\'elle soit exacte.'
            ]
        ],
        'what' => [
            'title' => 'C\'est quoi?',
            'content' => [
                "\"Quoted.\" est un site ou sont regroupées de nombreuses citations philosophiques mais aussi celles de tout le monde. Comme n'importe qui peut y rajouter sa citation, le site et son propriétaire, ne peuvent pas contrôler tout le contenu publié: si un contenu s'avère être inapproprié merci de nous le signaler à contact@arthaud.dev.",
                "Vous verrez peut-être du contenu politque, limite ou controversé, des paroles d'humour noir, des citations philosophiques et officielles. Gardez toutefois à l'esprit que le site ne supporte aucun contenu raciste, sexiste ou haineux.",
                "Lorsque la tendance actuelle est à la polémique de tout sujet, il faut laisser une place à la liberté d'expression et rester ouvert d'esprit. Évidemment, si vous pensez un contenu inapproprié, vous pouvez contacter contact@proust.dev, ou supprimer par vous même le contenu - qui ne serait pas une phrase hors contexte borderline - réellement haineux, raciste ou sexiste."
            ]
        ],
    ],

    'contribute' => [
        'title' => 'Rejoignez Quoted.',
        'join' => [
            'register' => 'Créer un compte',
            'login' => 'Ou se connecter'
        ],
        'why' => [
            'title' => 'Pourquoi?',
            'content' => [
                "Pour apporter vos connaissances, vos recherches et mêmes vos citations au site: devenez rédacteur, partagez votre vision des choses avec vos propres citations, ou en publiant celles de vos philosophe préférés.",
                "Attention cependant, on vous demande un minimum de sérieux."
            ]
        ],
        'how' => [
            'title' => 'Comment?',
            'content' => [
                'Pour contribuer il faut se créer un compte, puis rajouter ses citations dans la catégorie souhaitée. Certaines catégories comme "Philo" nécessitent une vérification de la citation pour qu\'elle soit affichée, le temps qu\'on vérifie qu\'elle soit exacte.',
                "Dans le cas où vous seriez un contributeur actif et sérieux, nous vous ferons confiance: pas de vérification nécessaire pour poster une citation dans n'importe quelle catégorie.",
                "Attention, nous nous réservons le droit de rétablir la vérification s'il y a des problèmes."
            ]
        ]
    ],

    'user' => [
        'profil' => [
            'title' => [
                'me'=>'Mon profil',
                'other'=>'Profil de'
            ],
            'actions' => [
                'title'=>'Actions',
                'new'=>'Ajouter une citation',
                'logout'=>'Se déconnecter',
                'role'=>[
                    'label'=>"Niveau de rôle de l'utilisateur",
                    'confirm'=>'Changer le rôle'
                ]
            ]
        ],
        'quotes' => [
            'title' => [
                'other'=>'{0} Aucune citation publiée par|{1} Citation publiée par |[2,*] Citations publiées par ',
                'me'=> "{0} Aucune citation publiée|{1} Votre citation |[2,*] Vos citations"
            ]
        ],
        'index' => [
            'title' => 'Liste des utilisateurs',
        ]

    ],

    'legal' => [
        'title' => 'Documents légaux',
        'intro' => [
            'title' => 'Liste des documents légaux',
            'mentions' => 'Mentions légales',
            'rgpd' => 'Politique RGPD',
            'conditions' => 'Conditions d\'utilisation',
        ]
    ],

    'footer' => [
        'credit' => 'Développé avec passion par Arthaud Proust',
        'right' => 'Tous droits réservés',
        'more' => 'À propos et plus',
        'legal' => 'Document légaux'
    ]
];
