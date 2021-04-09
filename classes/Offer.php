<?php namespace Catdesign\ShopaholicToolkit\Classes;

use Lovata\Shopaholic\Models\Offer as OfferModel;

/**
 * Class Price
 * @package Catdesign\ShopaholicToolkit\Classes
 * Класс для работы с предложениями
 */
Class Offer extends Core {

    /**
     * Создает предложения для массива товаров включенной категории
     */
    public function create()
    {
        $products   = $this->getProductsByIncludeCategory();
        $new_offers = $this->settings->create_offer_list;

        foreach ($products as $product) :
            foreach ($new_offers as $offer) :
                $offer_model             = new OfferModel();
                $offer_model->product_id = $product->id;
                $offer_model->name       = $offer['name'];
                $offer_model->price      = $offer['price'];
                $offer_model->old_price  = $offer['old_price'];

                if ($offer['get_product_code']) :
                    $offer_model->code = $product->code;
                else :
                    $offer_model->code = $offer['code'];
                endif;

                $offer_model->save();
            endforeach;
        endforeach;

        echo 'Предложения успешно созданы!';
    }


    /**
     * Удаляет предложения из массива товаров включенной категории
     */
    public function remove()
    {
        $products = $this->getProductsByIncludeCategory();

        foreach ($products as $product) :
            $product_model = $this->getProduct($product->id);
            foreach ($product_model->offer as $offer) :
                $offer->delete();
            endforeach;
        endforeach;

        echo 'Предложения успешно удалены!';
    }
}
