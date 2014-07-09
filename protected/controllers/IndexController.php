<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class IndexController extends Controller{
    function actionIndex(){
         //通过数据模型获得商品的全部信息
        $goods_model = Goods::model();
        //$sql = "select top 12 goods_create_time * from goods where goods_category != '成功案例' order by goods_create_time DESC";
        $sql="select * from goods where goods_category != '成功案例' order by goods_create_time DESC limit 12";
        $goods_infos = $goods_model -> findAllBySql($sql);
        $sql="select * from goods where goods_category = '成功案例' order by goods_create_time DESC limit 4";
        $goods_classic = $goods_model -> findAllBySql($sql);
        $this ->renderPartial('index',array('goods_infos'=>$goods_infos,'goods_classic'=>$goods_classic));
    }
}

