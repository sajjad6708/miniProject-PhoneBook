<?php




function accessGroupList()
{
    include_once "../database.php";

    $per_page = 2;
    $start = 0;
    $pagination_links = '';
    $query = $db->prepare("SELECT  count(*) as  list_count from persons ");
    $result = $query->execute();
    $accessGroupArray = $query->fetch();

 $accessGroupListRowCount  = $accessGroupArray ['list_count'];
    $pages = ceil($accessGroupListRowCount/$per_page);

    $pagination_links.= '<li class="pagination_li btn btn-default disabled" id="1">First</li>';
    $pagination_links.= '<li class="pagination_li btn btn-default disabled" id="previous">previous</li>';

    for($i=1; $i<$pages ; $i++){
        $pagination_links .= '<li class="pagination_li btn btn-default " id="'.$i.'">'.$i.'</li>';
    }
    $pagination_links.='<li class="pagination_li btn btn-default " id="next">next</li>';
    $pagination_links.='<li class="pagination_li btn btn-default " id="'.($i-1).'">last</li>';

    $url = '/accessGroupListPagination/';




echo $pagination_links;

}
accessGroupList();


?>













<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/my.css">
</head>

<body>
    <br> <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card border-info">
                    <h5 class="card-header bg-info">حذف مخاطب</h5>
                    <div class="card-body">
                        <div class="ajax-loading-bar"><img src="../image/fav_ajax_loading.gif" alt=""></div>
                        <div class="pagination_content"></div>
                        <ul id="pagination_link">

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    accessGroupPaginationInit('<?php $url ; ?>');
</script>
</html>