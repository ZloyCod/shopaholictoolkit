<?php

return [
    'plugin' => [
        'name'    => 'Shopaholictoolkit',
        'tagline' => 'Дополнительные инструменты для Shopaholic'
    ],
    'settings' => [
        'label'       => 'Дополнительные настройки Shopaholic',
        'description' => 'Предоставляет дополнительные функции для плагина Shopaholic'
    ],
    'tabs' => [
        'reduce_price'   => 'Уменьшение цен',
        'increase_price' => 'Увеличение цен',
        'create_offer' => 'Создание предложений',
        'remove_offer' => 'Удаление предложений'
    ],
    'fields' => [
        'reduce_price_section' => [
            'label'   => 'Уменьшение цен',
            'comment' => 'Укажите процент и нажмите - Запустить',
        ],
        'reduce_price_percent' => [
            'label'   => 'Процент уменьшения',
        ],

        'increase_price_section' => [
            'label'   => 'Увеличение цен',
            'comment' => 'Укажите процент и нажмите - Запустить',
        ],
        'increase_price_percent' => [
            'label'   => 'Процент уменьшения',
        ],

        'create_offer_section' => [
            'label'   => 'Массовое создание предложений',
            'comment' => 'Заполните repeater поле и нажмите на кнопку - Запустить',
        ],
        'create_offer_list' => [
            'label' => 'Список предложений',
            'image' => [
                'label' => 'Фото предложения (пока не работает)'
            ],
            'name' => [
                'label' => 'Название предложения'
            ],
            'code' => [
                'label' => 'Код (артикул)'
            ],
            'get_product_code' => [
                'label' => 'Если активно, будет взят код (артикул) из товара'
            ],
            'price' => [
                'label' => 'Цена'
            ],
            'old_price' => [
                'label' => 'Старая цена'
            ]
        ],

        'remove_offer_section' => [
            'label'   => 'Удаление предложений',
            'comment' => 'Запустите скрипт для очистки предложений товаров категории',
        ],
    ]
];
