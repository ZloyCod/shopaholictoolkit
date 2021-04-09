<?php namespace Catdesign\ShopaholicToolkit\Classes;

use Catdesign\ShopaholicToolkit\Models\Settings;
use Lovata\Shopaholic\Classes\Collection\ProductCollection;
use Lovata\Shopaholic\Models\Offer;
use Lovata\Shopaholic\Models\Price;
use Lovata\Shopaholic\Models\Product;
use phpDocumentor\Reflection\Types\Integer;
use Cache;


/**
 * Class Core
 * @package Catdesign\ShopaholicToolkit\Classes
 * Класс содержит вспомогательные функции, другие классы,
 * которые работают непосредственно с моделями должны его наследовать
 */
class Core
{
    /**
     * @var
     * Настройки плагина
     */
    public $settings;

    public function __construct()
    {
        $this->settings = Settings::instance();
    }

    /**
     * @param $offer_id
     * @return object
     * Получить список цен предложения
     * Возвращает список моделей цен
     */
    public function getOfferPrices($offer_id)
    {
        return Price::where('item_id', $offer_id)->get();
    }


    /**
     * @param $price
     * @param $percent
     * @return float | int
     * Рассчитать сумму процента
     */
    public function calcPercentSum($price, $percent)
    {
        if (isset($price) and isset($percent)) :
            return ($price / 100) * $percent;
        endif;
    }


    /**
     * @return object
     * Получить коллекцию товара по включенной категории из кеша
     */
    public function getProductsByIncludeCategory(): ProductCollection
    {
        return ProductCollection::make()->active()->category($this->settings->include_category, 1);
    }


    /**
     * @param $product_id
     * @return object
     * Получить модель продукта по ID
     */
    public function getProduct($product_id) : Product
    {
        return Product::find($product_id);
    }


    /**
     * @param $offer_id
     * @return object
     * Получить модель предложения по ID
     */
    public function getOffer($offer_id) : Offer
    {
        return Offer::find($offer_id);
    }


    public function __destruct()
    {
        Cache::flush();
    }
}
