<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace products\components;

use usni\library\extensions\bootstrap\widgets\UiActionColumn;
use usni\UsniAdaptor;
use usni\library\components\UiHtml;
use usni\fontawesome\FA;
/**
 * CompareActionColumn class file.
 *
 * @package products\components
 */
class CompareActionColumn extends UiActionColumn
{
    /**
     * @inheritdoc
     */
    protected function initDefaultButtons()
    {
        parent::initDefaultButtons();
        if (!isset($this->buttons['addToCart']))
        {
            $this->buttons['addToCart'] = array($this, 'renderAddToCartActionLink');
        }
        if (!isset($this->buttons['remove']))
        {
            $this->buttons['remove'] = array($this, 'renderRemoveActionLink');
        }
    }
    
    /**
     * Renders add to cart action link.
     * @param string $url
     * @param Model $model
     * @param string $key
     * @return string
     */
    public function renderAddToCartActionLink($url, $model, $key)
    {
        $icon   = FA::icon('shopping-cart');
        $url    = '#';
        return UiHtml::a($icon, $url, [
                    'title' => UsniAdaptor::t('cart', 'Add To Cart'),
                    'data-productid' => $model->id,
                    'class'     => "btn btn-success btn-sm add-cart"
                ]);
    }
    
    /**
     * Renders remove action link.
     * @param string $url
     * @param Model $model
     * @param string $key
     * @return string
     */
    public function renderRemoveActionLink($url, $model, $key)
    {
        $icon   = FA::icon('times');
        $url    = '#';
        return UiHtml::a($icon, $url, [
                    'title' => UsniAdaptor::t('products', 'Remove'),
                    'data-pjax' => '0',
                    'data-productid' => $model->id,
                    'class'     => "btn btn-danger btn-sm productcompare-remove"
                ]);
    }
}
?>