<?php

return [
    'path' => env('APP_NAME') != "Central Nutrition" ? "assets/media/nps/central-farma" : "assets/media/nps/central-nutrition",
    'socials' => [
        'whatsapp' => env('APP_NAME') != "Central Nutrition" ? "https://api.whatsapp.com/send?phone=553138012040" : "https://wa.me/553136182001",
        'facebook' => env('APP_NAME') != "Central Nutrition" ? "https://www.facebook.com/centralfarmabrasil" : "https://www.facebook.com/centralnutritionbrasil",
        'instagram' => env('APP_NAME') != "Central Nutrition" ? "https://www.instagram.com/centralfarmabrasil/" : "https://www.instagram.com/centralnutritionbrasil/",
        'linkedin' => "https://www.linkedin.com/company/grupocentralbrasil/",
        'youtube' => env('APP_NAME') != "Central Nutrition" ? "https://www.youtube.com/@centralfarmabrasil" : "https://www.youtube.com/@centralnutritionbrasil",
    ]

];
