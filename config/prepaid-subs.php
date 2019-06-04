<?php

return [
    "model" => "\App\User",

    "route_prefix" => "prepaid-subs",

    "free_trial" => "7 days", // a string that \Carbon\Carbon is able to add to Carbon\Carbon::now()

    "sandbox_mode" => true,
    "mp_public_key" => env('MP_PUBLIC_KEY', ''),
    "mp_access_token" => env('MP_ACCESS_TOKEN', ''),
    "mp_sandbox_public_key" => env('MP_SANDBOX_PUBLIC_KEY', ''),
    "mp_sandbox_access_token" => env('MP_SANDBOX_ACCESS_TOKEN', ''),

    "plans" => [
        [
            "time_value" => 1,
            "time_unit" => "month",
            "price" => 99,
            "old_price" => null,
            "name" => "1 mes",
            "details" => [
                "El más básico, sólo un mes",
                "Sin ahorros",
                "Sin riesgos",
                "Para probar el producto"
            ]
        ],
        [
            "time_value" => 3,
            "time_unit" => "month",
            "price" => 199,
            "old_price" => 300,
            "name" => "3 meses",
            "details" => [
                "Para quien piensa a mediano plazo, tres meses",
                "Quiero probarlo, y quiero ahorrar",
            ]
        ],
        [
            "time_value" => 12,
            "time_unit" => "month",
            "price" => 999,
            "old_price" => 1200,
            "name" => "12 meses",
            "details" => [
                "Me gustó, y lo quiero para siempre",
                "Plan ahorro",
            ]
        ],
    ]
];
