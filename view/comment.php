
<script src="../lib/sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="../lib/sweetalert-master/dist/sweetalert.css">
<link rel="stylesheet" type="text/css" href="../css/style_com.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<?php
include ("header.php");

function minDiff($strTime1,$strTime2)
{
    if($strTime1>=$strTime2){
        return $strTime1-$strTime2;
    }
    else{
        return (60-$strTime2)+$strTime1;
    }
}
function TimeDiff($strTime1,$strTime2)
{
    return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
}
function DateTimeDiff($strDateTime1,$strDateTime2)
{
    return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
}
function echo_date_time($com){
    $dt = DateTimeDiff($com,date("Y-m-d H:i:s",strtotime('+5 hours')))/24;
    if($dt<1){
        $dt = TimeDiff(date("H:i",strtotime($com)),date("H:i",strtotime('+5 hours')));
        if($dt<1){
            $dt = minDiff(date("i"),date("i",strtotime($com)));
            if($dt<1){
                return "เมื่อสักครู่";
            }
            else{
                $dt = floor($dt);
                return $dt." นาที";
            }
        }
        else{
            $dt = floor($dt);
            return $dt." ชั่วโมง";
        }
    }
    else{
        if($dt<30){
            $dt = floor($dt);
            return $dt." วัน";
        }
        else{
            $dt = floor($dt/30);
            return $dt." เดือน";
        }
    }
}
?>

<script>

	$(document).ready(function(){
		$(".call_back").click(function(){
			var idcomment = $(this).parent().parent().parent().data("idcomment");
			var idsubject = $(this).parent().parent().parent().data("idsubject");
            var user = "<?=$userlogin?>";
            var p_img = "<?=$p_img?>";
			var com = "<form action='../model/insert.php' method='post'><div class='reply'>";
			com = com + "<ul class='comments-list' data-idsubject = '" + idsubject + "' data-idparent = '" + idcomment+ "'>";
			com = com + "<li class='comment'>";
			com = com + "<a class='pull-left' href='#'>";
			com = com + "<img class='avatar' src='"+p_img+"' alt='avatar'>";
			com = com + "</a>";
			com = com + "<div class='comment-body'>";
			com = com + "<div class='comment-heading'>";
			com = com + "<h4 class='user' style='color: #365899;'>" + user + "</h4>";
			com = com + "<input type='hidden' name='idsubject' value='"+idsubject+"'/>";
			com = com + "<input type='hidden' name='idcomment' value='"+idcomment+"'/>";
			com = com + "<input type='text' name='txt' class='input'/>";
			com = com + "<input type='submit' value='โพสต์'/>";
			com = com + "</div>";
			com = com + "</div>";
			com = com + "</li> ";
			com = com + "</ul>";
			com = com + "</div></form>";
			$(this).parent().parent().append(com);
		});
		$(".delete").click(function(){
			var idcomment = $(this).parent().parent().parent().data("idcomment");
			alert(idcomment);
			swal({
				title: "Are you sure to delete?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Yes, delete it!',
				closeOnConfirm: false
			},
			function(){
				$.post("../model/delete_comment.php",
				{
					idcomment:idcomment
				},
				function(data){
					if(data == "success")
						location.reload();
				});
			});
			
		});
	});
	
</script>
<style>
    p{
		font-size: 16px;
		word-wrap: break-word;
	}
	.time_com{
		font-size: 12px;
	    color: #aaa;
        margin-top: 0;
	    display: inline;
	}
	a{
		text-decoration:none;
		cursor:pointer;
	}
	a:hover{
		text-decoration:underline;
	}
	.reply{
		margin: 20px 0 0 50px;
	}
	i{
		float:right;
		cursor:pointer;
	}
	.input-group{
		width:100%;
	}
</style>

        <div class="panel panel-white post panel-shadow">
            <div class="post-heading">
                <div class="pull-left image">
                    <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                </div>
                <div class="pull-left meta">
                    <div class="title h5">
                        <a href="#"><b><?=$resultArray[0]['name']?> <?=$resultArray[0]['surname']?></b></a>
                        made a post.
                    </div>
                    <!--<h6 class="text-muted time"></h6>-->
                </div>
            </div> 
            <div class="post-description"> 
                <p><?=$resultArray[0]['description']?></p>
            </div>
            <div class="post-footer">
                <?php
                if(isset($_SESSION["user"])) {
                    ?>
                    <div class="input-group">
                        <form action="../model/insert_0.php" method="post">
                            <input type="hidden" name="idsubject" value="<?= $resultArray[0]['id_subject'] ?>"/>
                            <input class="form-control" placeholder="Add a comment" type="text" name="txt2">
                            <input type="submit" value="โพสต์" style="float: right"/>
                        </form>
                    </div>
                    <?php
                }
                ?>
				<?php
				for($i=0;$i<count($resultArray2);$i++){
					if($resultArray2[$i]['id_subject'] == $resultArray[0]['id_subject']){
						?>
							<div>
								<ul class="comments-list" data-idsubject="<?=$resultArray2[$i]['id_subject']?>" data-idcomment="<?=$resultArray2[$i]['id_comment']?>">
									<li class="comment">
											<a class="pull-left" href="#">
												<img class="avatar" src="<?=$resultArray2[$i]['path_img']?>" alt="avatar">
											</a>
											<div class="comment-body">
                                            <?php
                                            if(isset($_SESSION["user"])) {
                                                if($resultArray2[$i]['id_user'] == $_SESSION["user"]->getId() || $_SESSION["user"]->getTypeUser() == "ADMIN") {
                                                    ?>
                                                    <i class="fa fa-times delete" aria-hidden="true"></i>
                                                    <?php
                                                }
                                            }
                                            ?>
												<div class="comment-heading">
													<h4 class="user" style="color: #365899;"><?=$resultArray2[$i]['name']?> <?=$resultArray2[$i]['surname']?></h4> 
													<p style="display: inline;"><?=$resultArray2[$i]['txt_comment']?></p>
												</div>
                                                <?php
                                                    if(isset($_SESSION["user"])) {
                                                ?>
                                                    <a class="call_back" style="display: inline;font-size:14px">ตอบกลับ</a>

                                                <?php
                                                    }
                                                ?>
                                                <h5 class="time_com"><?=echo_date_time($resultArray2[$i]['date_time'])?></h5>
											</div>
										<?php

										$resultArray3 = sub_comment($resultArray2[$i]['id_subject'],$resultArray2[$i]['id_comment']);
										for($j=0;$j<count($resultArray3);$j++){
										?>
									
												<ul class="comments-list" data-idsubject="<?=$resultArray2[$i]['id_subject']?>" data-idparent = "<?=$resultArray3[$j]['id_comment_parent']?>" data-idcomment="<?=$resultArray3[$j]['id_comment']?>">
													<li class="comment">
														<a class="pull-left" href="#">
															<img class="avatar" src="<?=$resultArray3[$j]['path_img']?>" alt="avatar">
														</a>
														<div class="comment-body">
                                                            <?php
                                                            if(isset($_SESSION["user"])) {
                                                                if($resultArray3[$j]['id_user'] == $_SESSION["user"]->getId() || $_SESSION["user"]->getTypeUser() == "ADMIN") {
                                                                    ?>
                                                                    <i class="fa fa-times delete"
                                                                       aria-hidden="true"></i>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
															<div class="comment-heading">
																<h4 class="user" style="color: #365899;"><?=$resultArray3[$j]['name']?> <?=$resultArray3[$j]['surname']?></h4>
																<p style="display: inline;"><?=$resultArray3[$j]['txt_comment']?></p>
															</div>
															<h5 class="time_com"><?=echo_date_time($resultArray3[$j]['date_time'])?></h5>
														</div>
													</li> 
												</ul>
										
										<?php
										}
										?>
									</li>
								</ul>
							</div>
				<?php
					}
				}
				?>
            </div>
        </div>
<?php
include ("footer.php");
?>
