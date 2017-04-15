<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 8/4/2560
 * Time: 15:12
 */
include ("../model/getData.php");
?>

<?php
include ("header.php");

?>
<link rel="stylesheet" type="text/css" href="../css_pagination/style.css">
<script src="../js_pagination/jquery.js"></script>
<script src="../js_pagination/paginate.js"></script>
<script src="../js_pagination/custom.js"></script>
<style>
    .main-subject,.sub-subject,.more{
        display: block;
        padding: 5px 5px 5px 5px;
    }
    .subject{
        border: 1px solid #cccccc;
        height: auto;
        margin: 15px 10px 15px 10px;
    }
    .more{
        text-align: right;
    }
    .sub-subject{
        height: 65px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<?php
$resultArray = getAllSubject();
for ($i=0;$i<count($resultArray);$i++) {
    ?>
    <div class="subject post">
        <div class="main-subject">
            <span><b><?=$resultArray[$i]['code']?></b></span>
            <span><b><?=$resultArray[$i]['name_th']?></b></span>
        </div>
        <div class="sub-subject">
            <p class="detail"><?=$resultArray[$i]['description']?></p>
        </div>
        <div class="more"><a href="../controller/detail.php?idsub=<?=$resultArray[$i]['id_subject']?>" >more</a></div>
    </div>

    <?php
}
?>
    <ul class="pagination">
        <!-- Page Subject -->
    </ul>


<?php
include ("footer.php");
?>
