<?php if($source == 'types'): ?>
<?php 
	$main_tbl = 'type';
	$query = $this->db->get($main_tbl);

	if($query->num_rows() > 0){
		$select = isset($selected) ? $selected : FALSE;

		foreach($query->result() as $row){
			$id = $row->id;
			$name = $row->name;
			if($select){
				if($select == $id){
					echo "<option value=\"".$id."\" selected>".$name."</option>";
				}else{
					echo "<option value=\"".$id."\">".$name."</option>";
				}
			}else{
				echo "<option value=\"".$id."\">".$name."</option>";
			}
			
		}
	}
?>
<?php elseif($source == 'status'): ?>
<?php 
	$main_tbl = 'status';
	$query = $this->db->get($main_tbl);

	if($query->num_rows() > 0){
		$select = isset($selected) ? $selected : FALSE;

		foreach($query->result() as $row){
			$id = $row->id;
			$name = $row->name;
			if($select){
				if($select == $id){
					echo "<option value=\"".$id."\" selected>".$name."</option>";
				}else{
					echo "<option value=\"".$id."\">".$name."</option>";
				}
			}else{
				echo "<option value=\"".$id."\">".$name."</option>";
			}
			
		}
	}
?>
<?php endif; ?>