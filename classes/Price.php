<?php namespace Catdesign\ShopaholicToolkit\Classes;

use Lovata\Shopaholic\Models\Offer;

/**
 * Class Price
 * @package Catdesign\ShopaholicToolkit\Classes
 * Класс для работы с ценами, наследует Core
 */
Class Price extends Core {

    /**
     * Увеличивает цены на X процент
     */
    public function increasePercent()
    {
        $percent  = $this->settings->increase_price_percent;
        $products = $this->getProductsByIncludeCategory();

        foreach ($products as $product) :
            $offers = Offer::where('product_id', $product->id)->get();

            if ($offers->count() < 1) {
                echo 'Нет активных предложений!';
                exit;
            }

            foreach ($offers as $offer) :
                $prices = $this->getOfferPrices($offer->id);

                foreach ($prices as $price) :
                    if ($price->price > 0) {
                        $price->price = $price->price + $this->calcPercentSum($price->price, $percent);
                        $price->save();
                    }
                    if ($price->old_price > 0) {
                        $price->old_price = $price->old_price + $this->calcPercentSum($price->old_price, $percent);
                        $price->save();
                    }
                endforeach;
            endforeach;
        endforeach;

        echo "Цены увеличены на $percent%";
    }


    /**
     * Уменьшает цены на X процент
     */
    public function reducePercent()
    {
        $percent  = $this->settings->reduce_price_percent;
        $products = $this->getProductsByIncludeCategory();

        foreach ($products as $product) :
            $offers = Offer::where('product_id', $product->id)->get();

            if ($offers->count() < 1) {
                echo 'Нет активных предложений!';
                exit;
            }

            foreach ($offers as $offer) :
                $prices = $this->getOfferPrices($offer->id);

                foreach ($prices as $price) :
                    if ($price->price > 0) :
                        $price->price = $price->price - $this->calcPercentSum($price->price, $percent);
                        $price->save();
                    endif;
                    if ($price->old_price > 0) :
                        $price->old_price = $price->old_price - $this->calcPercentSum($price->old_price, $percent);
                        $price->save();
                    endif;
                endforeach;
            endforeach;
        endforeach;

        echo "Цены уменьшены на $percent%";
    }
}
