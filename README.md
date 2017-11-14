# 高德地图地区编码表

> 更新日期：2017-11-14，高德地图编码表更新时间：2017-08-10

## 使用

可以直接使用 `dist` 目录下的 sql 或 xlsx。

- `高德地图API 城市编码表.xlsx`：高德地图原 Excel 表，[下载地址](http://lbs.amap.com/api/webservice/download)

- `area-schema.sql`：Mysql 表结构（可直接使用 navicat 导入数据库）

- `area-data.sql`：Mysql 表结构加最终完成的数据（可直接使用 navicat 导入数据库）

- `area-data.xlsx`：最终完成的 Excel 数据（可使用 navicat 导入向导导入数据库）

## build

1.下载项目

2.使用 composer 更新项目依赖

```php
    composer update -vvv
```

3.修改 `mysql/settings.ini.php`，修改数据库链接

4.创建或修改您自己的表结构

5.导入 `高德地图API 城市编码表.xlsx`

5.修改 `cover.php`，更改其中的逻辑代码

6.执行 `php cover.php` 来完成数据更新


