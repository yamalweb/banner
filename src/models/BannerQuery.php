<?php

namespace yamalweb\banner\models;

/**
 * This is the ActiveQuery class for [[Banner]].
 *
 * @see Banner
 */
class BannerQuery extends \yii\db\ActiveQuery
{

    /**
     * {@inheritdoc}
     * @return Banner[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Banner|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
