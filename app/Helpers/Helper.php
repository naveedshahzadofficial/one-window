<?php
/**
 * Created by Naveed Shahzad.
 * User: naveed
 * Date: 28/05/2021
 * Time: 11:05 AM
 */

function getCollectionTitle($data, $key, $id){
    $row = $data->firstWhere('id', $id);
    return isset($row->{$key})?$row->{$key}:'';
}
