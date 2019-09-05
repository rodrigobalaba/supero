<?php
class MyUserClass
{
	public static function getUserList($filter, $pagina = '', $limite = '',$order = 'name')
	{
		$dbconn = new DatabaseConnection('localhost','supero','password');
		$order = " ORDER BY ".$order;
		$sqlParam = array();
		$where = " WHERE 1=1 ";
		foreach($filter as $key => $value) 
		{
            $sqlParam[] = $value;
            $where .= " AND ".$key." ? ";
        }
		$sql = 'select name from user'.$where.$order;
		if($limite){
            $sql = $sql." LIMIT ".$limite;
        }
        if($pagina){
            $sql = $sql." OFFSET ".(($pagina*10)-10);
        }
		$results = $dbconn->query($sql);
		return $results;
	}
}   