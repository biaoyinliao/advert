<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //遍历传递过来的商品变量值$goods_infos
        $i = 1;
        foreach ($list as $_v) {
            ?>
        <tr id="product1">
            <td><?php echo $i; ?></td>
            <td><a href="#"><?php echo $_v->goods_name; ?></a></td>
            <td><?php echo $_v->goods_category; ?></td>
            <td><?php echo $_v->goods_norms; ?></td>
            <td><?php echo $_v->goods_material; ?></td>
            <td><img src="<?php echo $_v->goods_path; ?>" height="60" width="60"></td>
            <td><?php echo $_v->goods_create_time; ?></td>
            <td height="10" width="70">
                <?php
                /*
                  if(strlen($_v ->goods_introduce)<=120)
                  echo $_v ->goods_introduce;
                  else
                  echo substr($_v ->goods_introduce,0,119)."...";
                 */
                $str = new CutString();
                echo $str->g_substr($_v->goods_introduce, 100);
                ?>
            </td>
            <td><a href="./index.php?r=background/goods/update&id=<?php echo $_v->goods_id; ?>">修改</a></td>
            <td> <a onclick="if (confirm('确定要删除此信息吗？')) return true; else return false;" 
                    href="./index.php?r=background/goods/del&id=<?php echo $_v->goods_id; ?>" target=_top>删除</a></td>
        </tr>
        <?php
        $i++;
    }
    ?>
    <div id="pager">
        <?php
        $this->widget('CLinkPager', array(
            'header' => '',
            'firstPageLabel' => '首页',
            'lastPageLabel' => '末页',
            'prevPageLabel' => '上一页',
            'nextPageLabel' => '下一页',
            'pages' => $pages,
            'maxButtonCount' => 13
                )
        );
        ?></div>

</body>
</html>
