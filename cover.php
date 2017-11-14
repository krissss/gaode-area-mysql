<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/mysql/Db.class.php';

use Overtrue\Pinyin\Pinyin;

// 定义层级
define('LEVEL_PROVINCE', 1);
define('LEVEL_CITY', 2);
define('LEVEL_AREA', 3);

/**
 * @param $adCode
 * @return bool
 */
function isProvince($adCode)
{
    return $adCode % 10000 == 0;
}

/**
 * @param $adCode
 * @return bool
 */
function isCity($adCode)
{
    return $adCode % 10000 != 0 && $adCode % 100 == 0;
}

/**
 * @param $adCode
 * @return bool
 */
function isArea($adCode)
{
    return $adCode % 10000 != 0 && $adCode % 100 != 0;
}

$db = new Db();
$pinyin = new Pinyin();

// 获取所有地区数据
$areas = $db->query("SELECT * FROM area");

foreach ($areas as $area) {
    // 拼音字段
    $areaPinYin = $pinyin->phrase($area['name'], '-');
    // 层级字段
    if (isProvince($area['ad_code'])) {
        $areaLevel = LEVEL_PROVINCE;
    } elseif (isCity($area['ad_code'])) {
        $areaLevel = LEVEL_CITY;
    } elseif (isArea($area['ad_code'])) {
        $areaLevel = LEVEL_AREA;
    } else {
        throw new Exception('未知的地区编号');
    }

    // 更新记录
    $update = $db->query("UPDATE area SET pinyin = :py, level = :l WHERE id = :id", [
        'id' => $area['id'],
        'py' => $areaPinYin,
        'l' => $areaLevel
    ]);

    echo 'update area:' . $area['name'] . PHP_EOL;
}

