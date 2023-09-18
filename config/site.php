<?php

return [
    'title'=>"Simagro",
    "description"=>"Site web pour simagro",
    "keys"=>"Agriculture , Elevage , Plantation , Services",
    "author"=>[
        "name"=>"Nguemoue Chuala Luc",
        'github'=>[
            ''
        ],
        'facebook'=>[
            ''
        ],
        'youtube'=>[
            ''
        ]
    ],
    /*
     * Associe le nom de la configuration au nom du client
     * */
    "parametres"=>[
        'happy_client'=>
            [
                'title'=>"happy client",
                'value'=>'100',
                'description'=>"Nombre de client content"
            ],
        "project_awards"=>[
            'title'=>"project awards",
            'value'=>200,
            "description"=>""
        ],
        "anne_experience"=>[
            'title'=>"annee experience",
            'value'=>3,
            "description"=>""
        ],
        "project_realise"=>['title'=>"projet realise",'value'=>100,'description'=>''],

        "phone_number" => ['title'=>'phone number','value'=>'','description'=>''],

        "email_contact"=>['value'=>"simagrosimagro0@gmail.com",'title'=>"email de contact","description"=>""],
        "addresse"=>['title'=>'addresse','value'=>"Yaoundé, Après les rails Ngouso lieu dit à la montée sorcière","description"=>""],
    ],
    /*
     * Contient les differents domaines de l'application
     * */
    "domaines_publications"=>[
        'Agriculture',
        'Elevage',
        'Pisciculture',
        'Electronique'
    ],
    /**
     * Balise Meta
    **/
    'og_title'=>"",
    'og_image'=>config('app.url').'/favicon.jpg',
    'og_site_name'=>"Simagro"

];
