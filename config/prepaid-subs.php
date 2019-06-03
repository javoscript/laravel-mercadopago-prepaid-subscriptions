<?php

return [
    "model" => "\App\User",

    "route_prefix" => "prepaid-subs",

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
            "name" => "",
            "details" => [
                "Me gustó, y lo quiero para siempre",
                "Plan ahorro",
            ]
        ],
    ]
];
