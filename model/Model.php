<?php
namespace model;
use \PDO;

class Model{
	public $db;

	public function __construct($host_db,$user,$pass){
		// $url = parse_url(getenv($host_user_pass_db));
		// try{
		// $this->db = new PDO("pgsql:" . sprintf(
		//     "host=%s;port=%s;user=%s;password=%s;dbname=%s",
		//     $url["host"],
		//     $url["port"],
		//     $url["user"],
		//     $url["pass"],
		//     ltrim($url["path"], "/")
		// ));
		// } catch (PDOException $e) {
		//     echo 'Подключение не удалось: ' . $e->getMessage();
		// }

		try{
		$this->db = new PDO($host_db,$user,$pass);
		} catch (PDOException $e) {
		    echo 'Подключение не удалось: ' . $e->getMessage();
		}
		return $this->db;
	}

	public function getRazd(){
		$sql = "SELECT * FROM razd";
		$res = $this->db->query($sql);
		return $res;
	}

	public function getCategories(){
		$sql = "SELECT * FROM categories";
		$res = $this->db->query($sql);

		foreach($res as $row){
			$return .= "<strong><li>{$row['n_categories']}</li></strong>
    						<ul>";
			$sqli = "SELECT * FROM zmi_categories 
							WHERE  parent_id  = {$row['id']}";
			$resi = $this->db->query($sqli);
			foreach ($resi as $key) {
				$return.="<li><a href='?controller=categories&amp;id={$key["id"]}'>{$key['name_categories']}</a></li>";
			}
			$return.="</ul>";
		}
		return $return;
	}

	public function getCategoriesAddMess(){
		$sql = "SELECT * FROM categories";
		$res = $this->db->query($sql);

		foreach($res as $row){
			$return .= "<optgroup label=".$row['n_categories'].">";
			$sqli = "SELECT * FROM zmi_categories 
							WHERE  parent_id  = {$row['id']}";
			$resi = $this->db->query($sqli);
			foreach ($resi as $key) {
				$return.="<option value='".$key['id']."'>".$key['name_categories']."</option>
				";
			}
			$return.="</optgroup>";
		}
		return $return;
	}

	public function funcAdd_mess($post){
		$title = $post['title'];
		$text = $post['text'];
		$id_categories = $post['id_categories'];
		$id_razd = $post['id_razd'];
		$town = $post['town'];
		$time = $post['time'];
		// $date = time();
		// $date = date('Y-m-d');
		$price = $post['price'];
		$sql = "INSERT INTO post(title,text,id_categories,id_razd,town,time,price) 
						VALUES ('$title','$text',$id_categories,$id_razd,'$town',$time,$price)";
		
		if($this->db->exec($sql) > 0){
			return "Ваш post сохранен";
		}else{
			return "Ошибка сохранения post";
		}
	}

	public function getMainMessage($page,$id_r){
		$start = ($page-1)*2;
		$sql = "SELECT
	post.id,
	post.title,
	post.text,
	post.id_categories,
	post.id_razd,
	post.town,
	post.price,
	post.time,
	post.date,
	zmi_categories.name_categories,
	razd.name_razd
	From post JOIN zmi_categories ON zmi_categories.id = post.id_categories
	JOIN razd ON razd.id = post.id_razd ";
		if($id_r){
			$sql .=" WHERE id_razd = {$id_r} ";
		}
		$sql .=" ORDER BY post.date DESC ";
		$sql.= " LIMIT 2 OFFSET {$start}";
		$return = $this->db->query($sql);
		return $return;
	}

	public function deletPost($post){
		$id_post = $post['id_post'];
		$sql = "DELETE FROM post WHERE id = $id_post";
		if($this->db->exec($sql) > 0){
			return "Post id:{$id_post} удален.";
		}else{
			return "Ошибка удаления Post id:{$id_post}";
		}
	}
	public function countPost($id_r){

		$sql= "SELECT COUNT(id) AS coun FROM post";
		if($id_r){
			$sql.= " WHERE id_razd = $id_r";
		}
		$res = $this->db->query($sql);
		foreach ($res as $row) {
				$return = $row['coun'];
		}
		$return = round($return/2);
		
		return $return;
	}

	public function getSearch($get){
		$search = $get['search'];
		$sql = "
		SELECT
			post.id,
			post.title,
			post.text,
			post.id_categories,
			post.id_razd,
			post.town,
			post.price,
			post.time,
			post.date,
			zmi_categories.name_categories,
			razd.name_razd
	From post JOIN zmi_categories ON zmi_categories.id = post.id_categories
	JOIN razd ON razd.id = post.id_razd 
	WHERE MATCH(title,text) AGAINST('$search' IN BOOLEAN MODE)
	";
	$res = $this->db->query($sql);

	return $res;
	}



}