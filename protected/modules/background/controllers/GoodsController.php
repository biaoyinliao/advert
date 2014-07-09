<?php


date_default_timezone_set('PRC');
/**
 * 后台商品管理控制器 
 */
class GoodsController extends Controller {
    /*
     * 全部商品展示
     */
    function actionShow(){
        //通过数据模型获得商品的全部信息
        $goods_model = Goods::model();
        // 执行sql语句获得每页数据
         //1.获得商品总的记录数目
        $sql = "select count(*) from goods where goods_category != '成功案例'";
        $cnt = $goods_model -> countBySql($sql);
        
        //$cnt = $goods_model -> count();
        $per = 6;
        
        //2. 实例化分页类对象
        $page = new Pagination($cnt, $per);
        
        //3. 重新按照分页的样式拼装sql语句进行查询
        $sql = "select * from goods where goods_category != '成功案例'  order by goods_create_time DESC $page->limit";
        $goods_infos = $goods_model -> findAllBySql($sql);
        
        //4. 获得分页页面列表(需要传递到视图模板里边显示)
        $page_list = $page->fpage(array(2,3,4,5,6,7,8));
         $pageNum=($page->page-1)*$per;
         $this ->renderPartial('show',array('goods_infos'=>$goods_infos,'page_list'=>$page_list,'pageNum'=>$pageNum));
    }
    /*
     * 获取最新的12个商品即首页上显示的12 商品
     *      */
    function actionNewGoods(){
        $goods_model = Goods::model();
        $cnt = 12;
        $per = 6;
        $page = new Pagination($cnt, $per);
        $sql="select * from goods where goods_category != '成功案例' order by goods_create_time DESC $page->limit";
        $goods_infos = $goods_model -> findAllBySql($sql);
        $page_list = $page->fpage(array(2,3,4,5,6,7,8));
        $pageNum=($page->page-1)*$per;
        $this ->renderPartial('show',array('goods_infos'=>$goods_infos,'page_list'=>$page_list,'pageNum'=>$pageNum));
    }
   
    /**
    * 相应类别的物品展示
    */
     function actionCategory(){
        $goods_model = Goods::model();
        $sql="select count(*) from goods where goods_category = '".$_GET['value']."'";
        //$sql="select count(*) from goods where goods_category = '楼宇亮化工程'";
        $cnt = $goods_model -> countBySql($sql);
        $per = 6;
        $page = new Pagination($cnt, $per);
        $sql="select * from goods where goods_category = '".$_GET['value']."' order by goods_create_time DESC $page->limit";      
        $goods_infos = $goods_model -> findAllBySql($sql);
        $page_list = $page->fpage(array(2,3,4,5,6,7,8));
        $pageNum=($page->page-1)*$per;
        $this ->renderPartial('show',array('goods_infos'=>$goods_infos,'page_list'=>$page_list,'pageNum'=>$pageNum));
    }
     /**
     * 展示成功案例，与最新的成功案例
     */
    function actionClassic(){
       $goods_model = Goods::model();
       if($_GET['id']==2){
            $cnt = 4;
            $per = 4;
            
       }  else {
            $sql = "select count(*) from goods where goods_category = '成功案例'";
            $cnt = $goods_model -> countBySql($sql);
            $per = 6;
       }
        $page = new Pagination($cnt, $per);
        $sql="select * from goods where goods_category = '成功案例' order by goods_create_time DESC $page->limit";
        $goods_infos = $goods_model -> findAllBySql($sql);
        $page_list = $page->fpage(array(2,3,4,5,6,7,8));
        $pageNum=($page->page-1)*$per;
        $this ->renderPartial('show',array('goods_infos'=>$goods_infos,'page_list'=>$page_list,'pageNum'=>$pageNum)); 
    }
    
    /*
     * 添加商品
     */
    function actionAdd(){
        $goods_model = new Goods();
        //定义分类
        $category[1] = "-请选择-";
        $category["led发光字制作"] = "led发光字制作";
        $category["广告牌制作"] = "广告牌制作";
        $category["广告灯箱制作"] = "广告灯箱制作";
        $category["LED显示屏制作"] = "LED显示屏制作";
        $category["楼宇亮化工程"] = "楼宇亮化工程";
        $category["标识标牌制作"] = "标识标牌制作";
        $category["门头店招制作"] = "门头店招制作";
        $category[ "铜字铜牌制作"] = "铜字铜牌制作";
        $category["不锈钢金属字制作"] = "不锈钢金属字制作";
        $category["有机雕刻制品"] = "有机雕刻制品";
        $category["会议/活动/庆典"] = "会议/活动/庆典";
        $category["广告印刷制作"] = "广告印刷制作";
        $category["品牌包装设计"] = "品牌包装设计";
        $category["标志商标设计"] = "标志商标设计";
        $category["样本画册设计"] = "样本画册设计";
        $category["平面广告设计"] = "平面广告设计";
        $category["企业CI/VI设计"] = "企业CI/VI设计";
        $category["海报/广告设计"] = "海报/广告设计";
        $category["墙体/幕墙广告玻璃贴膜"] = "墙体/幕墙广告玻璃贴膜";
        $category["成功案例"] = "成功案例";
        
        //如果商品有注册表单
        if(isset($_POST['Goods'])){
            $goods_model -> attributes = $_POST['Goods'];
            //$goods_model -> goods_category =$category[ $_POST['Goods']['goods_category']];
            $goods_model -> goods_create_time =date('Y-m-d H:i:s');
            $file = CUploadedFile::getInstance($goods_model,'goods_path');   //获得一个CUploadedFile的实例
            if(is_object($file)&&get_class($file) === 'CUploadedFile'){
               $filename=$file->getName();
               $goods_model->goods_path = './assets/default/img/file_'.date('YmdHis').'_'.rand(0,9999).'.'.$file->extensionName;   //定义文件保存的名称                   
            }
             if ($goods_model->save()) //实现信息存储
                if(is_object($file)&&get_class($file) === 'CUploadedFile'){  
                     $file->saveAs($goods_model->goods_path);    // 上传图片 
                      Yii::app()->user->setFlash('success','添加商品成功');
                     $this->redirect('./index.php?r=background/goods/show');  //重定向到首页
                }                  
        }        
        $this ->renderPartial('add',array('goods_model'=> $goods_model,'category'=>$category));
    }
    //查询商品信息
     /* 
     */
     function actionFindBySql(){
        $goods_model = Goods::model();
        $cnt = $goods_model -> count();
        $per = 6;
        $page = new Pagination($cnt, $per);
        //3. 重新按照分页的样式拼装sql语句进行查询
        if(($_GET['attribute']===NULL)||!($_GET['attribute'])||($_GET['value']===NULL)){
            $sql = "select * from goods order by goods_create_time DESC $page->limit"; 
            $goods_infos = $goods_model -> findAllBySql($sql);
        }else {
            $sql = "select * from goods where ".$_GET['attribute']." LIKE "."'%".$_GET['value']."%'"."order by goods_create_time DESC $page->limit";        
            $goods_infos = $goods_model -> findAllBySql($sql);
            $sql ="select count(*) from goods where ".$_GET['attribute']." LIKE "."'%".$_GET['value']."%'";
            $cnt = $goods_model -> countBySql($sql);
            //$per = 6;
            $page = new Pagination($cnt, $per);
        }
       // $sql = "select * from goods where goods_category = '楼宇亮化工程'";
         $page_list = $page->fpage(array(2,3,4,5,6,7,8));
         $pageNum=($page->page-1)*$per;
        $this ->renderPartial('show',array('goods_infos'=>$goods_infos,'page_list'=>$page_list ,'pageNum'=>$pageNum));
    }
    function actionUpdate($id) {
        $goods_model = Goods::model();
        //定义分类
        $category[1] = "-请选择-";
        $category["led发光字制作"] = "led发光字制作";
        $category["广告牌制作"] = "广告牌制作";
        $category["广告灯箱制作"] = "广告灯箱制作";
        $category["LED显示屏制作"] = "LED显示屏制作";
        $category["楼宇亮化工程"] = "楼宇亮化工程";
        $category["标识标牌制作"] = "标识标牌制作";
        $category["门头店招制作"] = "门头店招制作";
        $category[ "铜字铜牌制作"] = "铜字铜牌制作";
        $category["不锈钢金属字制作"] = "不锈钢金属字制作";
        $category["有机雕刻制品"] = "有机雕刻制品";
        $category["会议/活动/庆典"] = "会议/活动/庆典";
        $category["广告印刷制作"] = "广告印刷制作";
        $category["品牌包装设计"] = "品牌包装设计";
        $category["标志商标设计"] = "标志商标设计";
        $category["样本画册设计"] = "样本画册设计";
        $category["平面广告设计"] = "平面广告设计";
        $category["企业CI/VI设计"] = "企业CI/VI设计";
        $category["海报/广告设计"] = "海报/广告设计";
        $category["墙体/幕墙广告玻璃贴膜"] = "墙体/幕墙广告玻璃贴膜";
        $category["成功案例"] = "成功案例";
        
        $goods_model = $goods_model -> findByPk($id);
        //如果商品有注册表单
        if(isset($_POST['Goods'])){
            $goods_model -> attributes = $_POST['Goods'];
            $goods_model -> goods_create_time =date('Y-m-d H:i:s');
            //$goods_model->goods_path=$goods_model->goods_priority;
            $file = CUploadedFile::getInstance($goods_model,'goods_image');   //获得一个CUploadedFile的实例
            $goods_model->goods_image='';
            if(is_object($file)&&get_class($file) === 'CUploadedFile'){
               $imageurl=$goods_model->goods_path;
               $filename=$file->getName();
               $goods_model->goods_path = './assets/default/img/file_'.time().'_'.rand(0,9999).'.'.$file->extensionName;   //定义文件保存的名称                   
               $file->saveAs($goods_model->goods_path);    // 上传图片
               unlink($imageurl);
            }
            //$sql="Insert into goods (goods_name) values （".$goods_model ->goods_name."）";
             if ($goods_model->save()){  
                     $this->redirect('./index.php?r=background/goods/show');  //重定向到首页
                }                  
        }        
        $this ->renderPartial('update',array('goods_model'=> $goods_model,'category'=>$category));
    }
    function actionDel($id) {
        $goods_model = Goods::model();
        $goods_info = $goods_model -> findByPk($id); 
        $imageurl=$goods_info->goods_path;
        if($goods_info->delete()){
            $this -> redirect('./index.php?r=background/goods/show');
        }
    }
    /*
     * 为了显示分页效果此处使用了重定向，真正的查询由FindBySql()完成
     */
    function actionFindGoods(){
        $this -> redirect(array('goods/FindBySql','attribute'=>$_POST['attribute'],'value'=>$_POST['value']));
    }

    public function actionTest() {
        $criteria = new CDbCriteria;
        $criteria->order = 'goods_create_time DESC';

        $count = Goods::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 10;
        $pager->applyLimit($criteria);
        $userList = Goods::model()->findAll($criteria);

        $this->renderPartial('test', array('list' => $userList, 'pages' => $pager));
    }

}