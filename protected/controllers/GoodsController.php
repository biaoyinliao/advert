<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GoodsController extends Controller{
    public $pageTitle=null;
    public $location=null;
    function actionCategory(){
        $goods_model = Goods::model();
        $sql="select count(*) from goods where goods_category = ".$_GET['value']."";
        $cnt = $goods_model -> countBySql($sql);
        $per = 20;
        $page = new Pagination($cnt, $per);
        $sql="select * from goods where goods_category = ".$_GET['value']." order by goods_create_time DESC $page->limit";
        $goods_infos = $goods_model -> findAllBySql($sql);
        $page_list = $page->fpage(array(2,3,4,5,6,7,8));
        $this->pageTitle = '产品展示-杭州悦美策划公司' ;
        //print_r($goods_infos);
        //exit();
        $this->location='产品展示';
        $this ->render('category',array('goods_infos'=>$goods_infos,'page_list'=>$page_list));
    }
    //查找更多的商品
    function actionMoreGoods(){
        $goods_model = Goods::model();
        $sql="select count(*) from goods where goods_category != '成功案例' order by goods_create_time";
        $cnt = $goods_model -> countBySql($sql);
        $per = 20;
        $page = new Pagination($cnt, $per);
        $sql="select * from goods where goods_category != '成功案例' order by goods_create_time DESC $page->limit";
        $goods_infos = $goods_model -> findAllBySql($sql);
        $page_list = $page->fpage(array(2,3,4,5,6,7,8));
        $this->pageTitle = '产品展示-杭州悦美策划公司' ;
        //print_r($goods_infos);
        //exit();
        $this->location='产品展示';
        $this ->render('category',array('goods_infos'=>$goods_infos,'page_list'=>$page_list));
    }
    //查找更多的成功案例
    function actionClassic(){
        $goods_model = Goods::model();
        $sql="select count(*) from goods where goods_category = '成功案例' order by goods_create_time";
        $cnt = $goods_model -> countBySql($sql);
        $per = 12;
        $page = new Pagination($cnt, $per);
        $sql="select * from goods where goods_category = '成功案例' order by goods_create_time DESC $page->limit";
        $goods_infos = $goods_model -> findAllBySql($sql);
        $page_list = $page->fpage(array(2,3,4,5,6,7,8));
        $this->pageTitle = '成功案例展示-杭州悦美策划公司' ;
        //print_r($goods_infos);
        //exit();
        $this->location='成功案例展示';
        $this ->render('classic',array('goods_infos'=>$goods_infos,'page_list'=>$page_list));
    }
}