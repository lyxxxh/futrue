<?php $__env->startSection("content"); ?>
    <div class="box-body blog">
        <div class="row-fluid">

            <div class="span8">
                <div class="posts">

                    <!-- Each posts should be enclosed inside "entry" class" -->
                    <!-- Post one -->
                    <div class="entry">
                        <h2><a href="#"><?php echo e($article->title); ?></a></h2>
                        <!-- Meta details -->
                        <div class="meta">
                            <a href="<?php echo e(route('user.index',['user_id'=>$article->user->id])); ?>">
                                <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($article->user->info->avatar)); ?>" class="futrue-avatar"
                                     title="点击查看<?php echo e($article->user->info->nick); ?>的资料">

                                <i class="fa fa-user" title="点击查看<?php echo e($article->user->info->nick); ?>的资料"></i> <?php echo e($article->user->info->nick); ?></a>
                            <?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route("tag.show",$tag->id)); ?>"><i class="fa fa-tag"></i><?php echo e($tag->name); ?></a>
                                <!--加个标签链接-->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <i class="icon-calendar" title="发布于<?php echo e($article->created_at->diffForHumans()); ?>"></i>
                            <?php echo e($article->created_at->diffForHumans()); ?>

                            <span class="pull-right">
                            <i class="fa fa-eye" title="<?php echo e($article->view); ?>"></i> <?php echo e($article->view); ?>

                                <a href="#"><i class="fa fa-comment"></i> <?php echo e($article->answer); ?></a>
                                <a href="#"><i class="fa fa-star"></i> <?php echo e($article->collection); ?></a>

                        </div>
                        <!-- Thumbnail -->
                        <div class="bthumb">

                            <?php echo $article->content; ?>                        </div>
                    </div>
                    <span style="display: none"><?php echo e($result=\App\Models\Collection::all()->whereIn('user_id',\Illuminate\Support\Facades\Auth::id())->whereIn('question_id',$article->id)); ?>

                    </span>

                    <form action="<?php echo e(route('user.collection',['article'=>$article])); ?>" method="post">
                        <?php echo e(csrf_field()); ?>


                    <?php if($result->first()!=null): ?>
                            <button class="futrue-collection" title="感谢你的收藏 有<?php echo e($article->collection); ?>

                                    人和你一样明智的收藏了">
                                <img src="<?php echo e(asset('/futrue/img/ico/22.gif')); ?>" class="futrue-collection-ico">
                            </button>

<?php else: ?>
                            <button class="futrue-collection">
                                <img src="<?php echo e(asset('/futrue/img/ico/33.gif')); ?>" class="futrue-collection-ico" title="为什么你还不点收藏 快点我">

                            </button>
                        <?php endif; ?>
                    </form>
                    <div class="post-foot well">
                        <!-- Social media icons -->
                        <div class="social">
                            <div class="bshare-custom"><div class="bsPromo bsPromo2"></div><a title="分享到QQ空间" class="bshare-qzone" href="javascript:void(0);"></a><a title="分享到QQ好友" class="bshare-qqim" href="javascript:void(0);"></a><a title="分享到微分享" class="bshare-mweibo" href="javascript:void(0);"></a><a title="分享到微信" class="bshare-weixin" href="javascript:void(0);"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count" style="float: none;">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
                        </div>
                    </div>

                    <hr />

                    <!-- Comment section -->

                    <div class="comments">

                        <div class="title"><h5><?php echo e($article->answer); ?>回答</h5></div>

                        <ul class="comment-list">
                            <!--回答内容-->
                            <?php $__currentLoopData = $article->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">

                                    <ul class="comment">
                                        <a class="pull-left" href="#">
                                            <a href="<?php echo e(route('user.index',['user_id'=>$answer->user->id])); ?>">
                                            <img class="avatar" src="<?php echo e(Storage::url($answer->user->info->avatar)); ?>"
                                           style="border:solid 2px grey;height: 3em;width: 3em;text-decoration : none;cursor:url('http://127.0.0.1/futrue/public/futrue/ico/avatar.png'),auto;" title="<?php echo e($answer->user->info->nick); ?>">
                                            </a>
                                            <?php if($answer->user->id==$article->user->id): ?><span class="commentuser" title="这是作者 ">(作者)</span>  <?php endif; ?>


                                        </a>
                                        <a href="<?php echo e(route('user.index',['user_id'=>$answer->user->id])); ?>"  title="<?php echo e($answer->user->info->nick); ?>">
                                        <div class="comment-author"><?php echo e($answer->user->info->nick); ?></div>
                                        </a>

                                        <div class="cmeta" title="发布于<?php echo e($answer->created_at->diffForHumans()); ?>"><?php echo e($answer->created_at->diffForHumans()); ?></div>
                                        <p  >
                                           <div data-answer-id="<?php echo e($answer->id); ?>" data-answer-id=<?php echo e($answer->id); ?> data-typearticle="comment"  data-belog="1" onclick="msgbox(1,this)">
                                            <?php if($article->status==0&&Auth::id()==$article->user_id): ?>
                                                <form action="<?php echo e(route('answer.accept',['question_id'=>$article->id,'answer_id'=>$answer->id])); ?>" method="post">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="submit" class="btn btn-warning" value="采纳" title="我觉得不错">
                                                </form>
                                            <?php endif; ?>

                                            <!--回答的--><?php echo $answer-> content; ?>

                 </div>
                                        <?php if($answer->accept==1): ?>
                                            <span style="color:red">已采纳</span>
                                        <?php endif; ?>

                                        <div class="goodandbad">
<?php if(\App\Models\Answergoodandbad::all()->whereIn('user_id',Auth::id())->whereIn('answer_id',$answer->id)->first()!=null): ?>
                                        <i class="fa fa-thumbs-up" id="futrue-thumbs<?php echo e($answer->id); ?>" data-answer-id="<?php echo e($answer->id); ?>"  onclick="good(this);" title="感觉牛皮 已经给他赞了">
                                            <?php echo e($answer->good); ?></i>
                                            <?php else: ?>
    
                                                <i class="fa fa-thumbs-o-up"  data-answer-id="<?php echo e($answer->id); ?>"  onclick="good(this);" id="futrue-thumbs<?php echo e($answer->id); ?>" title="感觉牛皮 别拦我 我要点赞<?php echo e($answer->user->info->nick); ?>">
                                                    <?php echo e($answer->good); ?></i>
                                            <?php endif; ?>


    <?php if(\App\Models\Bad::all()->whereIn('user_id',Auth::id())->whereIn('answer_id',$answer->id)->first()!=null): ?>

                                            <i class="fa fa-thumbs-down" id="futrue-bad<?php echo e($answer->id); ?>" data-answer-id="<?php echo e($answer->id); ?>" onclick="bad(this);"
                                            title="好像错怪了  取消踩">
                                                <?php echo e($answer->bad); ?>

                                            </i>
<?php else: ?>
        <i class="fa fa-thumbs-o-down" id="futrue-bad<?php echo e($answer->id); ?>" data-answer-id="<?php echo e($answer->id); ?>" onclick="bad(this);"
        title="渣渣 什么鬼回答 踩">
            <?php echo e($answer->bad); ?>

        </i>
    <?php endif; ?>
                                        </div>
                                            </p>
                                    </ul>
                                    </ul>

                                        <div class="clearfix"></div>


                                    </ul>
                                    <!--评论者-->
                                <?php $__currentLoopData = $answer->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="comment reply">
                                        <a class="pull-left" href="#">
                                            <a href="<?php echo e(route('user.index',['user_id'=>$comment->user->id])); ?>">
                                                <img class="avatar" src="<?php echo e(Storage::url($comment->user->info->avatar)); ?>" content="futrue-avatar"
                                            style="border:solid 2px grey;height: 3em;width: 3em;text-decoration : none;cursor:url('http://127.0.0.1/futrue/public/futrue/ico/avatar.png'),auto;">
                                            </a>
                                        </a>
                                        <div class="comment-author"><a href="#"><?php echo e($comment->user->info->nick); ?>

                                            </a>        <?php if($comment->user->id==$article->user->id): ?><span class="commentuser">(作者)</span>  <?php endif; ?>
                                        </div>
                                        <div class="cmeta"><?php echo e($comment->create); ?></div>
                                        <div data-comment-id="<?php echo e($comment->id); ?>" data-answer-id=<?php echo e($answer->id); ?>  data-typearticle="reply" data-belog="0" onclick="msgbox(1,this)">

                                         <?php if($comment->belog==1): ?>
   <?php echo $comment->comment; ?></div>

                                    <?php else: ?>
                                        <!--评论的-->
                                            <?php echo "<span style='color:gren'>回复</span>".'<span class="user-comment">'.$comment->fathercomment->user->info->nick; ?></span>

                            <?php echo $comment->comment; ?></div>

                                    <?php endif; ?>
                                    </li>

                                        <div class="clearfix"></div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        </ul>
                    </div>
                <?php if(Auth::guest()): ?><!--如果没有登陆-->
                    <div class="respond well">
                        <div class="title"><h5>你未登录 无法
                                <span class="futrueout">回答/评论/回复</span>
                                <a href="<?php echo e(route('login')); ?>" class="futruelogin">登录</a>或
                                <a href="<?php echo e(route('register')); ?>" class="futruelogin">注册</a></h5>


                        </div>
                    </div>
                    <?php else: ?>
                        <hr/>
                        <h3>回答</h3>



                        <form action="<?php echo e(route('answer.store')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="question_id" value="<?php echo e($article->id); ?>">
                            <script id="container" name="content" type="text/plain">
                            </script>
                            <button class="btn btn-primary">回答</button>
                        </form>



                <?php endif; ?>



                <!---回复的表单提交-->

                    <form id="futrue_comment" action="<?php echo e(route('comment.store')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div id='futrue-commentinput' class="futrue-box" >
                            <a class='futrue-x' href=''; onclick="msgbox(0,this); return false;">关闭</a>
                            <input type="hidden" id="belog" name="belog" value="">
                            <input type="hidden" id="type_article" name="type_article" value="">
                            <input type="hidden" id="answer_id" name="answer_id" value="">
                            <input type="hidden" id="comment_id" name="comment_id" value="">
                            <script id="reply" name="comment" type="text/plain">
                            </script>
                            <button class="btn btn-info" >回复</button>

                        </div>

                    </form>
                    <!-- Navigation -->



                    <div class="clearfix"></div>

                </div>
            </div>
            <div class="span4">
                <!-- Sidebar 2 -->

                <div class="blog-sidebar">
                    <!-- Widget -->
                    <div class="widget">
                        <h4>公告</h4>
                        <?php if($announcement!=null): ?>
                            <span class="announcement">
                        <?php echo $announcement->content; ?>

                      </span>
                        <?php else: ?>
                            暂无公告
                        <?php endif; ?>
                    </div>


                    <div class="widget">
                        <h4>热门榜</h4>
                        <ul>
                            <?php $__currentLoopData = $questionhots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questionhot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <i class="fa fa-paper-plane-o"></i>
                                    <a href="<?php echo e(route('article.show',$questionhot->id)); ?>">
                                        <?php echo e($questionhot->title); ?>

                                    </a>
                                </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>


                    <div class="widget">
                        <h4>提示</h4>
                        <ul>
                                <li>
                                    <i class="fa fa-paper-plane-o"></i>
                                点击用户发送的内容  可以回复/评论
                                 </li>

                        </ul>
                    </div>



                </div>
            </div>



        </div></div>

    </div>
    </div>

        </div>


    </div>
    <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1" charset="utf-8"></script>

    <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.config.js')); ?>"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.all.js')); ?>"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript" src="<?php echo e(asset('futrue/js/futrue.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>