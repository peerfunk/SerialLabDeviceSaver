<?php

require_once("lib/database.php");
class Labor extends DatabaseObject{
	public function __construct(){}
	public function nextLabs(int $count, int $current){
		$current++;
		$next = $current+$count;	
		$sql =  "Set @num = 0;
				select b.id as cid, b.labid as id, b.data, b.time , b.picture, b.name , b.aname, b.plast, b.pfirst from ( 
						select @num := @num + 1 as id, a.id as labid, a.data, a.time , a.picture , a.name, a.aname, a.plast, a.pfirst from ( 
							select labor.id, labor.time, labor.data, labor.ip, geraete.name, geraete.picture, patients.Animal.name as aname , patients.Patient.Name as plast, patients.Patient.FirstName as pfirst  from 
									labor left join geraete using (ip)
									left join patients.Animal on(labor.AnimalId = patients.Animal.id)
									left join patients.Patient on (patients.Animal.HolderId = patients.Patient.id)
									order by labor.id desc ) as a 
							) as b 
						where b.id BETWEEN 	$current and $next;";
					//	echo $sql;
		$ret = $this->multipleQuery($sql);
		return $ret;
	}

}