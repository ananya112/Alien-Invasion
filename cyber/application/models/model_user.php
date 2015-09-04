<?php
class Model_user extends CI_Model {

	public function reg($data,$username,$email){
	//	print_r($data);
		$this->db->where("(email = '$email' OR username = '$username')");
		$query=$this->db->get('registration');
		if($query->num_rows()>=1){
			return false;
		}
		else{
		$this->db->insert('registration',$data);
		return true;
	}
	}

	public function check_user($username,$value){
		$this->db->where($value,$username);
		$query=$this->db->get('registration');
		$result=$query->result_array();
		if($query->num_rows()==1)
		{
			return true;
		}
		else return false;
	}


	public function can_log_in()
	{
		// Seasoning is important for the odd md5 
		$salt = "Qx-g0Yb.g>)8457!y%AX:?,,u.j93I";

		// Compares the username and password with the db
		$this->db->where('username', $this->input->post('username'));
		//$this->db->where('password', 
		//	md5($this->input->post('password').$salt));
		$this->db->where('password',$this->input->post('password')); 
		$query = $this->db->get('registration');
		$data =$query->result_array();
		// If the query returns one row then the user exists
		if ($query->num_rows() == 1) {
			return $data[0]['id'];
		} else {
			return false;
		}
	}

	public function checkHack(){
		if($this->session->userdata('role')=='defender')
		{
			$this->db->where('game_number',$this->session->userdata('game_id'));
			$query=$this->db->get('game');
			$data=$query->result_array();
			if($query->num_rows()==1)
			{
				$vulnerability1=$data[0]['vulnerability1'];
				$vulnerability2=$data[0]['vulnerability2'];
				$vulnerability3=$data[0]['vulnerability3'];
				$v=array('v1'=>$vulnerability1,'v2'=>$vulnerability2,'v3'=>$vulnerability3);
				return $v;
			}
		}
	}

	public function bonus(){

						for($i=1;$i<4;$i++)
						{
							$vulnerability='vulnerability'.$i;
							$hacked_at='hacked_at'.$i;
							$this->db->where('game_number',$this->session->userdata('game_id'));
							$query=$this->db->get('game');
							$result=$query->result_array();
							if($query->num_rows()==1)
								{
									if($result[0][$vulnerability]=='hacker')
									{
									$time=human_to_unix($result[0][$hacked_at]);
									$time=(now()-$time)*10;
									$this->db->where('game_number',$this->session->userdata('game_id'));
									$bonus=array('bonus_hacker'=>($time+$result[0]['bonus_hacker']));
									$this->db->update('game',$bonus);	
									}
									
								}

								
								}
			}

	public function score($game_id,$role)
	{
		if($role=='hacker')
		{
			$this->db->where('competetion_number',$this->session->userdata('competetion_number'));
			$query=$this->db->get('competetion');
			$data=$query->result_array();
			if($query->num_rows()==1)
			{	$game1= $data[0]['game1'];
				$game2= $data[0]['game2'];
				$game3= $data[0]['game3'];
				$result= $data[0]['result'];
				
			}

			$this->db->where('game_number',$result);
			$queryr=$this->db->get('game');
			$datar=$queryr->result_array();
			/*if($queryr->num_rows()==1)
			{
				//$scores=array('own'=>$data[0]['score_hacker'],'opponent'=>$data[0]['score_defender']) ;
				//return $scores;
				return $data;
				
			}*/
			$this->db->where('game_number',$game1);
			$query1=$this->db->get('game');
			$data1=$query1->result_array();
			$this->db->where('game_number',$game2);
			$query2=$this->db->get('game');
			$data2=$query2->result_array();
			$this->db->where('game_number',$game3);
			$query3=$this->db->get('game');
			$data3=$query3->result_array();
			$data=array('game1'=>$data1,'game2'=>$data2,'game3'=>$data3,'result'=>$datar);
			return $data;

		}
		else{
			$this->db->where('competetion_number',$this->session->userdata('competetion_number'));
			$query=$this->db->get('competetion');
			$data=$query->result_array();
			if($query->num_rows()==1)
			{	$game1= $data[0]['game1'];
				$game2= $data[0]['game2'];
				$game3= $data[0]['game3'];
				$result= $data[0]['result'];
				
			}

			$this->db->where('game_number',$result);
			$queryr=$this->db->get('game');
			$datar=$queryr->result_array();
			/*if($queryr->num_rows()==1)
			{
				//$scores=array('own'=>$data[0]['score_hacker'],'opponent'=>$data[0]['score_defender']) ;
				//return $scores;
				return $data;
				
			}*/
			$this->db->where('game_number',$game1);
			$query1=$this->db->get('game');
			$data1=$query1->result_array();
			$this->db->where('game_number',$game2);
			$query2=$this->db->get('game');
			$data2=$query2->result_array();
			$this->db->where('game_number',$game3);
			$query3=$this->db->get('game');
			$data3=$query3->result_array();
			$data=array('game1'=>$data1,'game2'=>$data2,'game3'=>$data3,'result'=>$datar);
			return $data;

		}
	}

	public function winner(){
		$this->db->where('game_number',$this->session->userdata('game_id'));
		$query=$this->db->get('game');
		$data=$query->result_array();
		if($query->num_rows()==1)
		{
			if(($data[0]['score_hacker']+$data[0]['bonus_hacker'])>($data[0]['score_defender']+$data[0]['bonus_defender']))
			{
				$winner=array('winner'=>'hacker');
			}
			else if(($data[0]['score_hacker']+$data[0]['bonus_hacker'])<($data[0]['score_defender']+$data[0]['bonus_defender']))
			{
				$winner=array('winner'=>'defender');
			}
			else{
				$winner=array('winner'=>'No one');
			}
		}
		$this->db->where('game_number',$this->session->userdata('game_id'));
		$this->db->update('game',$winner);
	}

public function getGame(){
	$game= 'game'.$this->session->userdata('game_number');
	//$this->db->select($game);
	$this->db->where('competetion_number',$this->session->userdata('competetion_number'));
	$query=$this->db->get('competetion');
	$data=$query->result_array();
			if($query->num_rows()==1)
			{
				return $data[0][$game];
				
			}

		}

	public function showScore()	{
		$this->db->where('game_number',$this->session->userdata('game_id'));
		$query=$this->db->get('game');
		$data=$query->result_array();
		return $data;
	}

	public function addScore($score){
		
		if($this->session->userdata('role')=='hacker')
		{
			$this->db->where('game_number',$this->session->userdata('game_id'));
			$data = array(
               'score_hacker' => $score,
               
            );

			$this->db->update('game',$data);
	

			return true;
		}
		else if($this->session->userdata('role')=='defender')
		{
			$this->db->where('game_number',$this->session->userdata('game_id'));
			$data = array(
               'score_defender' => $score,
               
            );

			$this->db->update('game',$data);
			return true;
		}
		else
			return false;
	}


	public function sendCommand($command){
		$this->load->model('model_user');
		$score=$this->model_user->showScore();
		$data=array('game_id'=>$this->session->userdata('game_id'),
			'move'=>$command,
			'made_by'=>$this->session->userdata('role'),
			'time'=>unix_to_human(now(),TRUE,'eu'),
			'score_hacker'=>($score[0]['score_hacker']+$score[0]['bonus_hacker']),
			'score_defender'=>($score[0]['score_defender']+$score[0]['bonus_defender']));
		$this->db->insert('moves',$data);

		echo unix_to_human(now());

	}


	public function checkStage($stage){
		
		if($this->session->userdata('role')=='hacker')
		{
			$vulnerability='vulnerability'.$stage;
			$this->db->where('game_number',$this->session->userdata('game_id'));
			//$this->db->update($vulnerability,'hacker');
			$query=$this->db->get('game');
			$data=$query->result_array();
			if($query->num_rows()==1)
			{
				if($data[0][$vulnerability]=='')
				{
					return true;
				}

			}
		
		}else if($this->session->userdata('role')=='defender')
		{
			$vulnerability='vulnerability'.$stage;
			$this->db->where('game_number',$this->session->userdata('game_id'));
			//$this->db->update($vulnerability,'hacker');
			$query=$this->db->get('game');
			$data=$query->result_array();
			if($query->num_rows()==1)
			{
				
				return $data[0][$vulnerability];

			}
		
		}

		else
			return false;
	}
	public function addStage($stage){
		
		if($this->session->userdata('role')=='hacker')
		{
			$vulnerability='vulnerability'.$stage;
			$hacked_at='hacked_at'.$stage;
			$this->db->where('game_number',$this->session->userdata('game_id'));
			$data = array(
               $vulnerability => 'hacker',
               
            );

			$this->db->update('game',$data);
			//$this->db->where('game_number',$this->session->userdata('game_id'));
			$this->load->helper('date');
			$this->db->where('game_number',$this->session->userdata('game_id'));
			$time=array($hacked_at=>unix_to_human(now(),TRUE,'eu') );
			//print_r($time);
			$this->db->update('game',$time);
			return true;
		}
		else if($this->session->userdata('role')=='defender')
		{
			$this->load->model('Model_user');
			if($this->model_user->checkStage($stage)=='hacker'){
					$vulnerability='vulnerability'.$stage;
					$hacked_at='hacked_at'.$stage;
					$this->db->where('game_number',$this->session->userdata('game_id'));
					$data = array(
               		$vulnerability => 'hacker+defender',
               
            		);
            	//	echo "I am here!";

					$this->db->update('game',$data);
					$this->db->where('game_number',$this->session->userdata('game_id'));
					$query=$this->db->get('game');
					$result=$query->result_array();
					if($query->num_rows()==1)
						{
							//$time=unix_to_human(now(),TRUE,'eu')->diff($data[0]['hacked_at']);
							$time=human_to_unix($result[0][$hacked_at]);
							//echo $time;
							//echo now();
							$time=(now()-$time)*10;
				//			echo $time;
							//echo $time;

						}

						$this->db->where('game_number',$this->session->userdata('game_id'));
						
						$bonus=array('bonus_hacker'=>($time+$result[0]['bonus_hacker']));
						$this->db->update('game',$bonus);

				return true;
			}
			else if($this->model_user->checkStage($stage)=='hacker+defender')
			{
				//echo "already patched";
			}
			else{
			$vulnerability='vulnerability'.$stage;
			$this->db->where('game_number',$this->session->userdata('game_id'));
			$data = array(
               $vulnerability => 'defender',
               
            );

			$this->db->update('game',$data);
			//echo 'great fella';
			return true; }
		}
		else
			return false;
	}

	public function isMatched($id){
		$this->db->where($this->session->userdata('role'),$id);
		$this->db->where('status','start');
		$query=$this->db->get('matched');
		$data=$query->result_array();
		if($query->num_rows()==1)
		{
			$competetion_number=$data[0]['competetion_number'];
			$this->db->where($this->session->userdata('role'),$id);
			$this->db->where('status','start');
			$data=array('status'=>'running');
			$this->db->update('matched',$data);
			return $competetion_number;
		}
		else{
			return false;
		}
	}
	public function wait($role)
	{
		if($role=='hacker')
		{
				$this->db->where('role','defender');
				$this->db->where('status',0);
				$this->db->order_by('number','asc');
				$this->db->limit(1);
				$query=$this->db->get('wait');	
				$data=$query->result_array();
				if($query->num_rows()==1)
				{
					$value = array('hacker' => $this->session->userdata['id'],
					'defender' =>$data[0]['id']);
					//$this->db->insert('game',$value);



					$this->db->trans_start();
		   			$this->db->insert('game',$value);
		   			$insert_id1 = $this->db->insert_id();
		   			$this->db->trans_complete();
		   			$this->db->trans_start();
		   			$this->db->insert('game',$value);
		   			$insert_id2 = $this->db->insert_id();
		   			$this->db->trans_complete();
		   			$this->db->trans_start();
		   			$this->db->insert('game',$value);
		   			$insert_id3 = $this->db->insert_id();
		   			$this->db->trans_complete();
		   
		   			
		   			$result = mt_rand(1,3);
		   			if($result==1)
		   			{
		   				$result=$insert_id1;
		   			}else if($result==2)
		   			{
		   				$result=$insert_id2;
		   			}else
		   			{
		   				$result=$insert_id3;
		   			}
		   			$competetion_values=array('game1'=>$insert_id1,'game2'=>$insert_id2,'game3'=>$insert_id3,'result'=>$result);
		   			$this->db->trans_start();
		   			$this->db->insert('competetion',$competetion_values);
		   			$competetion_id=$this->db->insert_id();
		   			$this->db->trans_complete();



		   			$game = array(
						'hacker'=>$this->session->userdata('id'),
						'defender'=>$data[0]['id'],
						'competetion_number'=>$competetion_id,
						'status'=>'start'
					);
					$this->session->set_userdata($game);

					$this->db->where('id',$data[0]['id']);
					$this->db->delete('wait');
					$this->db->insert('matched',$game);
					//print_r($insert_id);
					return true;

				}
				//return $query->num_rows();
				else
				{
					$value = array('id' => $this->session->userdata['id'],
					'role'=>'hacker',
					'status'=>0 );
					$this->db->insert('wait',$value);
					return false;
				}
		}
		else{
				$this->db->where('role','hacker');
				$this->db->where('status',0);
				$this->db->order_by('number','asc');
				$this->db->limit(1);
				$query=$this->db->get('wait');	
				$data=$query->result_array();
				if($query->num_rows()==1)
				{
					$value = array('defender' => $this->session->userdata['id'],
					'hacker' =>$data[0]['id']);
					//$this->db->insert('game',$value);

					//echo "i was  here";

					$this->db->trans_start();
		   			$this->db->insert('game',$value);
		   			$insert_id1 = $this->db->insert_id();
		   			$this->db->trans_complete();
		   			$this->db->trans_start();
		   			$this->db->insert('game',$value);
		   			$insert_id2 = $this->db->insert_id();
		   			$this->db->trans_complete();
		   			$this->db->trans_start();
		   			$this->db->insert('game',$value);
		   			$insert_id3 = $this->db->insert_id();
		   			$this->db->trans_complete();
		   
		   			//echo $insert_id2;
		   			//echo $insert_id1;
		   			//echo $insert_id3;
		   			$result = mt_rand(1,3);
		   			//$result=$'insert_id'.$result;
		   			//echo $result;
		   			if($result==1)
		   			{
		   				$result=$insert_id1;
		   			}else if($result==2)
		   			{
		   				$result=$insert_id2;
		   			}else
		   			{
		   				$result=$insert_id3;
		   			}
		   			$competetion_values=array('game1'=>$insert_id1,'game2'=>$insert_id2,'game3'=>$insert_id3,'result'=>$result);
		   			$this->db->trans_start();
		   			$this->db->insert('competetion',$competetion_values);
		   			$competetion_id=$this->db->insert_id();
		   			$this->db->trans_complete();


		   			$game = array(
						'defender'=>$this->session->userdata('id'),
						'hacker'=>$data[0]['id'],
						'competetion_number'=>$competetion_id,
						'status'=>'start'
					);
					
					$this->session->set_userdata($game);
					//print_r($game);
					//print_r($this->session->all_userdata());

					$this->db->where('id',$data[0]['id']);
					$this->db->delete('wait');
					$this->db->insert('matched',$game);
					return true;

				}
				else
				{
					$value = array('id' => $this->session->userdata['id'],
					'role'=>'defender',
					'status'=>0 );
					$this->db->insert('wait',$value);
					return false;
				}
		}
		
	}

	public function add_temp_user($key)
	{
		// Seasoning is important for the odd md5 
		$salt = "Qx-g0Yb.g>)8457!y%AX:?,,u.j93I";
		$data = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password').$salt),
			'key' => $key
		);
		$query = $this->db->insert('temp_user', $data);
		// If the query runs successfully
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function is_key_valid($key)
	{
		$this->db->where('key', $key);
		$query = $this->db->get('temp_user');

		// If there is one row returned then there is a user in the db
		if ($query->num_rows() == 1){
			return true;
		} else {
			return false;
		}
	}

	public function add_user($key)
	{
		$this->db->where('key', $key);
		$temp_user = $this->db->get('temp_user');

		if ($temp_user) {
			// The amount of rows returned by the query
			$row = $temp_user->row();
			$data = array(
				'email' => $row->email,
				'password' => $row->password
			);
			$add_user =  $this->db->insert('user', $data);
		}
		// If the user was added to the db
		if ($add_user) {
			// Remove the temp user
			$this->db->where('key', $key);
			$this->db->delete('temp_user');
			// Returns the email for use with the login redirect
			return $data['email'];
		} else {
			return false;
		}

	}
}
