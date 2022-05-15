<?php
    namespace admin;
    use models\basedao;

    class News extends Admin{
        function index(){
            $db = new BaseDao();
            $db->query("set names utf8");

            $news = $db->select("news",["title","article","id"]);
            
            $title = "新闻管理";
            $this->assign('title',$title);
            $this->assign('news',$news);

            $this->assign('name','cjs');

            $this->display("news/news");
        }

        function add_news(){
            $title = "新闻管理";
            $this->assign('title',$title);

            $this->display("news/add_news");
        }


        function up_news(){

            $db = new BaseDao();
            $db->query("set names utf8");
            $title = @$_POST["title"];
            $date = @$_POST["date"];
            $article = @$_POST["article"];
            $note = @$_POST["note"];


            if($title && $date && $article){
                $db->insert('news',["title"=>$title,"date"=>$date,"article"=>$article,'spare'=>$note,'readtimes'=>0]);
                   $this->success('/admin/news',"文章添加成功！");
                //    $brands = $db->insert("model",["pid"=>$id,"name"=>$name,"ord"=>0]);
                    // success('brand/index',"添加成功");
                    // echo "<script>";
                    // echo "alert('添加成功');";
                    // //添加完毕后跳转到指定页面
                    // echo "location.href='http://lianxi.com/admin/add_news';";
                    // echo "</script>";
                }else{
                    $this->error("/admin/add_news","文章添加失败！");
                    // echo "<script>";
                    // echo "alert('您未添加任何东西');";
                    // //添加失败后跳转到指定页面
                    // echo "location.href='http://lianxi.com/admin/add_news';";
                    // echo "</script>";
                }
        }

        function del_news($id){
            $db = new BaseDao();
            $db->query("set names utf8");

            if($db->delete("news",["id"=>$id])){
                $this->success("/admin/news","文章删除成功！");
                // echo "<script>";
                // echo "alert('删除成功');";
                // //添加完毕后跳转到指定页面
                // echo "location.href='http://lianxi.com/admin/news';";
                // echo "</script>";
            }else{
                $this->error("/admin/news","文章删除失败！");

                // echo "<script>";
                // echo "alert('删除失败');";
                // //添加完毕后跳转到指定页面
                // echo "location.href='http://lianxi.com/admin/news';";
                // echo "</script>";
            }
        }

    }