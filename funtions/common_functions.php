<?php

function selectAllFrom($tablename){
    global $con;
    $sql="select * from $tablename";
    $result=mysqli_query($con,$sql);
    return $result;

}
function selectAllFromWhere($tablename,$column,$condition){
    global $con;
    $sql="select * from $tablename where $column='$condition'";
    $result=mysqli_query($con,$sql);
    return $result;
}
function deleteFrom($tablename,$column,$condition){
    global $con;
    $sql="delete from $tablename where $column='$condition'";
    $result=mysqli_query($con,$sql);
    return $result;

}
function rowCount($tablename){
    global $con;
    $result=selectAllFrom("cart");
    $rowCount=mysqli_num_rows($result);
    return $rowCount;
}

?>