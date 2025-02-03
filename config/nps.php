<?php

return [
    'path' => env('APP_NAME') == "Central Nutrition" ? "assets/media/nps/central-nutrition" :
             (env('APP_NAME') == "Central Farma" ? "assets/media/nps/central-farma" :
             (env('APP_NAME') == "Harmonize" ? "assets/media/nps/harmonize" : null)),
    'socials' => [
        'whatsapp' => env('APP_NAME') == "Central Nutrition" ? "https://wa.me/553136182001" :
                    (env('APP_NAME') == "Central Farma" ? "https://wa.me/553138012040" :
                    (env('APP_NAME') == "Harmonize" ? "https://api.whatsapp.com/send?phone=5531989104700" : null)),
        'facebook' => env('APP_NAME') == "Central Nutrition" ? "https://www.facebook.com/centralnutritionbrasil" :
                    (env('APP_NAME') == "Central Farma" ? "https://www.facebook.com/centralfarmabrasil" :
                    (env('APP_NAME') == "Harmonize" ? null : null)),
        'instagram' => env('APP_NAME') == "Central Nutrition" ? "https://www.instagram.com/centralnutritionbrasil/" :
                    (env('APP_NAME') == "Central Farma" ? "https://www.instagram.com/centralfarmabrasil/" :
                    (env('APP_NAME') == "Harmonize" ? "https://instagram.com/harmonizeipatinga" : null)),
        'linkedin' => env('APP_NAME') == "Central Nutrition" ? "https://www.linkedin.com/company/grupocentralbrasil/" :
                    (env('APP_NAME') == "Central Farma" ? "https://www.linkedin.com/company/grupocentralbrasil/" :
                    (env('APP_NAME') == "Harmonize" ? null : null)),
        'youtube' => env('APP_NAME') == "Central Nutrition" ? "https://www.youtube.com/@centralnutritionbrasil" :
                    (env('APP_NAME') == "Central Farma" ? "https://www.youtube.com/@centralfarmabrasil" :
                    (env('APP_NAME') == "Harmonize" ? null : null)),
    ]

];
