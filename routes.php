<?php
use Catdesign\ShopaholicToolkit\Classes\Price;
use Catdesign\ShopaholicToolkit\Classes\Offer;

/**
 * Роут увеличение цены
 */
Route::match(['get', 'post'], '/backend/catdesign/shopaholic-tools/increase-price', function () {
    $price_module = new Price();
    $price_module->increasePercent();
});

/**
 * Роут уменьшение цены
 */
Route::match(['get', 'post'], '/backend/catdesign/shopaholic-tools/reduce-price', function () {
    $price_module = new Price();
    $price_module->reducePercent();
});

/**
 * Роут создание предложений
 */
Route::match(['get', 'post'], '/backend/catdesign/shopaholic-tools/create_offers', function () {
    $offer_module = new Offer();
    $offer_module->create();
});

/**
 * Роут удаление предложений
 */
Route::match(['get', 'post'], '/backend/catdesign/shopaholic-tools/remove_offers', function () {
    $offer_module = new Offer();
    $offer_module->remove();
});
