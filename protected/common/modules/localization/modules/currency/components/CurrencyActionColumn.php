<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl.html
 */
namespace common\modules\localization\modules\currency\components;

use usni\library\extensions\bootstrap\widgets\UiActionColumn;
use usni\UsniAdaptor;
use usni\library\components\UiHtml;
use usni\fontawesome\FA;
use common\modules\localization\modules\currency\utils\CurrencyUtil;
/**
 * CurrencyActionColumn class file.
 *
 * @package common\modules\localization\modules\language\components
 */
class CurrencyActionColumn extends UiActionColumn
{
    /**
     * @inheritdoc
     */
    protected function renderDeleteActionLink($url, $model, $key)
    {
        $isAllowed = CurrencyUtil::checkIfAllowedToDelete($model);
        if($isAllowed)
        {
            if($this->checkAccess($model, 'delete'))
            {
                $shortName = strtolower(UsniAdaptor::getObjectClassName($this->grid->owner->model));
                $icon = FA::icon('trash-o');
                return UiHtml::a($icon, $url, [
                            'title' => \Yii::t('yii', 'Delete'),
                            'id'    => 'delete-' . $shortName . '-' . $model['id'],
                            'data-confirm' => \Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ]);
            }
            return null;
        }
        return null;
    }
}