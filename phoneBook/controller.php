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