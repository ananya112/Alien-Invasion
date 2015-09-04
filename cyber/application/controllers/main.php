<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$this->load->view('login');
	}
	public function check_username(){
		$username=$this->input->post('username');
		$this->load->model('model_user');
		$result=$this->model_user->check_user($username,'username');
		if($result)
		{
			echo 'This username is not available';
		}
	}
	public function check_email(){
		$email=$this->input->post('email');
		$this->load->model('model_user');
		$result=$this->model_user->check_user($email,'email');
		if($result)
		{
			echo 'This email is already registered';
		}
	}
	public function signup()
	{
		$this->load->view('signup');
	}
	public function checkGame(){
		if ($this->session->userdata('is_logged_in')){
		$action=$this->input->post('action');
		if($action=='checkGame')
		{
			echo 'Game : '.$this->session->userdata('game_number');
		}
	}
	}

	public function sendCommand(){
	if ($this->session->userdata('is_logged_in'))
	{	$action=$this->input->post('action');
		$command=$this->input->post('command');
		if($action=='sendCommand')
		{
			$this->load->model('model_user');
			$this->model_user->sendCommand($command);
		}
	}
	}
	public function checkHack(){
		if ($this->session->userdata('is_logged_in')){
		$action = $this->input->post('action');
		$this->load->model('model_user');
		$v=$this->model_user->checkHack();
		//echo $v['v1'];
		if($v['v1']=='hacker')
		{
			echo 'ftp service running on port 21 has been compromised !';
		}
		else if($v['v2']=='hacker')
		{
			echo 'iss-realsecure service running on port 902 has been compromised !';
		}
		else if($v['v3']=='hacker')
		{
			echo 'postgresql service running on port 5432 has been compromised !';
		}else if($v['v1']=='defender'||$v['v1']=='hacker+defender')
		{
			echo 'ftp service running on port 21 has been patched!';
		}
		else if($v['v2']=='defender'||$v['v2']=='hacker+defender')
		{
			echo 'iss-realsecure service running on port 902 has been patched !';
		}
		else if($v['v3']=='defender'||$v['v3']=='hacker+defender')
		{
			echo 'postgresql service running on port 5432 has been patched !';
		}
	}
	}

	public function hacker_point(){
		{
		$action = $this->input->post('action');

		if($action=='addscore')
		{
			$score = $this->input->post('score');
			$this->load->model('model_user');
			if($this->model_user->addScore($score))
			{
				//echo "Your Score is: ".$score;
			}
		}
		if($action=='showscore')
		{
			//$score = $this->input->post('score');
			$this->load->model('model_user');
			if($data=$this->model_user->showScore())
			{
				if($this->session->userdata('role')=='hacker')
				{
					echo "Your Score: ".(($data[0]['score_hacker']+$data[0]['bonus_hacker'])?($data[0]['score_hacker']+$data[0]['bonus_hacker']):0)." Opponent's Score : ".(($data[0]['score_defender']+$data[0]['bonus_defender'])?($data[0]['score_defender']+$data[0]['bonus_defender']):0);
				}
				else{
					//echo "Your Score: ".($data[0]['score_defender']+$data[0]['bonus_defender']);
					echo "Your Score: ".(($data[0]['score_defender']+$data[0]['bonus_defender'])?($data[0]['score_defender']+$data[0]['bonus_defender']):0)." Opponent's Score : ".(($data[0]['score_hacker']+$data[0]['bonus_hacker'])?($data[0]['score_hacker']+$data[0]['bonus_hacker']):0);
				}

				//echo "Your Score is: ".$score;
			}
		}
		else if($action=='addstage')
		{
			$stage = $this->input->post('stage');
			$this->load->model('model_user');
			if($this->model_user->addStage($stage))
			{
				if($this->session->userdata('role')=='hacker')
				{
					if($stage==1)
					{
						echo 'ftp service running on port 21 has been hacked ';
					}
					else if($stage==2)
					{
						echo 'iss-realsecure service running on port 902 has been hacked';
					}
					else {
						echo 'postgresql service running on port 5432 has been hacked';
					}
				}
				//echo $stage;
			}
		}
		else if($action=='checkstage')
		{
			$stage=$this->input->post('stage');
			$this->load->model('model_user');
			if($this->model_user->checkStage($stage))
			{
				echo "success";
			}
		}
	}
	}
	public function restricted()
	{
		$this->load->view('restricted');
	}

	public function hacker()
	{
		if ($this->session->userdata('is_logged_in')){
			$data = array(
				'role' => 'hacker'
				
			);
				// Go to the members page
			$this->session->set_userdata($data);
			$this->load->view('welcome_hacker');
			//redirect('main/wait');

		} else {
			//$this->load->view('hacker');
			redirect('main/restricted');
		}
	}
	public function testing(){
		if ($this->session->userdata('is_logged_in')){
		if($this->session->userdata('role')=='hacker')
		{
			$this->load->model('model_user');
			$game_id=$this->model_user->getGame();
			$data=array('game_id'=>$game_id);
			$this->session->set_userdata($data);
			//print_r($this->session->all_userdata());
			$this->load->view('hacking');
		}
		else{
			$this->load->model('model_user');
			$game_id=$this->model_user->getGame();
			$data=array('game_id'=>$game_id);
			$this->session->set_userdata($data);
			//print_r($this->session->all_userdata());
		$this->load->view('defending');
	}
}else redirect('main/restricted');
	}

	public function score(){
		if ($this->session->userdata('is_logged_in')){
		if($this->session->userdata('game_number')<3)
		{
			$this->load->model('model_user');
			$this->model_user->bonus();
			$this->model_user->winner();
			$data=array('game_number'=>$this->session->userdata('game_number')+1);
			$this->session->set_userdata($data);
			redirect('main/testing');
		}
		$this->load->model('model_user');
		$this->model_user->bonus();
		$this->model_user->winner();
		$scores=$this->model_user->score($this->session->userdata('game_id'),$this->session->userdata('role'));
		//print_r($scores);
		if($this->session->userdata('role')=='hacker')
		{	echo "<br>You played as a hacker !<br>";
			echo '<br>Game 1: <br>';
			echo '<br>Your Score : '.($scores['game1'][0]['score_hacker']+$scores['game1'][0]['bonus_hacker']);
			echo '<br>Your Opponent\'s Score : '.($scores['game1'][0]['score_defender']+$scores['game1'][0]['bonus_defender']);
			echo "<br>Winner of Game 1: ".$scores['game1'][0]['winner']."<br>";


			echo '<br>Game 2: <br>';
			echo '<br>Your Score : '.($scores['game2'][0]['score_hacker']+$scores['game2'][0]['bonus_hacker']);
			echo '<br>Your Opponent\'s Score : '.($scores['game2'][0]['score_defender']+$scores['game2'][0]['bonus_defender']);
			echo "<br>Winner of Game 2: ".$scores['game2'][0]['winner']."<br>";

			echo '<br>Game 3: <br>';
			echo '<br>Your Score : '.($scores['game3'][0]['score_hacker']+$scores['game3'][0]['bonus_hacker']);
			echo '<br>Your Opponent\'s Score : '.($scores['game3'][0]['score_defender']+$scores['game3'][0]['bonus_defender']);
			echo "<br>Winner of Game 3: ".$scores['game3'][0]['winner']."<br>";

			echo '<br>Result Based on Randomly Chosem Game: <br>';
			echo '<br>Your Score : '.($scores['result'][0]['score_hacker']+$scores['result'][0]['bonus_hacker']);
			echo '<br>Your Opponent\'s Score : '.($scores['result'][0]['score_defender']+$scores['result'][0]['bonus_defender']);
			echo "<br>Winner: ".$scores['result'][0]['winner']."<br>";


		}
		else{
			echo "<br>You played as a Defender !<br>";
			echo '<br>Game 1: <br>';
			echo '<br>Your Score : '.($scores['game1'][0]['score_hacker']+$scores['game1'][0]['bonus_hacker']);
			echo '<br>Your Opponent\'s Score : '.($scores['game1'][0]['score_defender']+$scores['game1'][0]['bonus_defender']);
			echo "<br>Winner of Game 1: ".$scores['game1'][0]['winner']."<br>";


			echo '<br>Game 2: <br>';
			echo '<br>Your Score : '.($scores['game2'][0]['score_hacker']+$scores['game2'][0]['bonus_hacker']);
			echo '<br>Your Opponent\'s Score : '.($scores['game2'][0]['score_defender']+$scores['game2'][0]['bonus_defender']);
			echo "<br>Winner of Game 2: ".$scores['game2'][0]['winner']."<br>";

			echo '<br>Game 3: <br>';
			echo '<br>Your Score : '.($scores['game3'][0]['score_hacker']+$scores['game3'][0]['bonus_hacker']);
			echo '<br>Your Opponent\'s Score : '.($scores['game3'][0]['score_defender']+$scores['game3'][0]['bonus_defender']);
			echo "<br>Winner of Game 3: ".$scores['game3'][0]['winner']."<br>";

			echo '<br>Result Based on Randomly Chosem Game: <br>';
			echo '<br>Your Score : '.($scores['result'][0]['score_hacker']+$scores['result'][0]['bonus_hacker']);
			echo '<br>Your Opponent\'s Score : '.($scores['result'][0]['score_defender']+$scores['result'][0]['bonus_defender']);
			echo "<br>Winner: ".$scores['result'][0]['winner']."<br>";


		
		}
		$this->load->view('score');
	}
	else redirect('main/restricted');
	}

	public function defender()
	{
		if ($this->session->userdata('is_logged_in')){
			$data = array(
				'role' => 'defender'
				
			);
			$this->session->set_userdata($data);
			$this->load->view('welcome_defender');
			//redirect('main/wait');

		} else {
			redirect('main/restricted');
		}
	}

	public function isMatched(){
		if ($this->session->userdata('is_logged_in')){
		$this->load->model('model_user');
		if ($competetion_number=$this->model_user->isMatched($this->session->userdata('id'))) 
			{
			$data=array('competetion_number'=>$competetion_number);
			$this->session->set_userdata($data);
			redirect('main/testing');
		//	$this->load->view('testing');
		} 

		else{
			$this->load->view($this->session->userdata('role'));
		}
	}

	else redirect('main/restricted');
	}
	public function role()
	{
		if ($this->session->userdata('is_logged_in')){
			$this->load->view('role');
		} else {
			redirect('main/restricted');
		}
	}
	public function wait()
	{
		if ($this->session->userdata('is_logged_in')){
		$this->load->model('model_user');
		if ($this->model_user->wait($this->session->userdata('role'))) {
			//$this->load->view($this->session->userdata('role'));
			$data=array('game_number'=>1);
			$this->session->set_userdata($data);
//			print_r($this->session->all_userdata());
		//	$this->load->view('jack');
			redirect('main/testing');
		//	$this->load->view('testing');
		} 
		$data=array('game_number'=>1);
		$this->session->set_userdata($data);
//		print_r($this->session->all_userdata());
		//$this->load->view('jack');
		$this->load->view($this->session->userdata('role'));
	}
	else redirect('main/restricted');
	}

	

	public function signUp_valid(){
		
		$password_confirm=$this->input->post('password_confirm');
		$data=array('username'=>$this->input->post('username'),
		'email'=>$this->input->post('email'),
		'age'=>$this->input->post('age'),
		'time'=>$this->input->post('time'),
		'country'=>$this->input->post('country'),
		'gender'=>$this->input->post('gender'),
		'password'=>$this->input->post('password'),
		);
		if($data['password']==$password_confirm)
		{
			$this->load->model('model_user');
			if($this->model_user->reg($data,$this->input->post('username'),$this->input->post('email')))
			{
				echo '<p style="color: red">registration successfull Please Login</p>';
			$this->load->view('login');}
			else{
				echo '<p style="color: red">registration failure</p>';
				$this->load->view('signup');
			}
		}
		else{
			//echo 'passwords don\'t match';

			$this->load->view('signup');
		}

		
	}

	public function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Email', 
			'required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password', 
			'Password', 'required|trim');
		if ($this->form_validation->run()) {
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => 1,
			);
			$this->session->set_userdata($data);
			redirect('main/role');
		} else {
			// Return to login
			$this->load->view('login');
		}
	}

	public function signup_validation()
	{
		$this->load->library('form_validation');
		$this->load->model('model_user');

		$this->form_validation->set_rules('email', 'Email', 
			'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 
			'required|trim');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 
			'required|trim|matches[password]');
		// Changes the duplicate email message
		$this->form_validation->set_message('is_unique',
			'That email address is already in use.');

		if ($this->form_validation->run()) {
			// Generate a random key
			$key = md5(uniqid());

			$config=Array('protocol'=>'smtp',
				'smtp_host'=>'ssl://smtp.googlemail.com',
				'smtp_port'=>465,
				'smtp_user'=>'Email Address of the sender',
				'smtp_pass'=>'Password of the sender',
				'mailtype'=>'html');
			// Send an email to the user
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			$this->email->from('1308js@gmail.com', 'jack sparrow');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Sparrow - Confirm your account');

			$message = "<p>Thank you for signing up.</p>
				<p><a href='".base_url()."main/register_user/$key'
				>Click Here</a> to confirm your email address.</p>";

			$this->email->message($message);

			// If the temp user is successfully added to the db
			if ($this->model_users->add_temp_user($key)) {
				// If the email sends successfully
				if ($this->email->send()) {
					echo "The email has been sent to Your email Plese confirm <a href='http://gmail.com'> Click Here</a>";
				} else {
					echo "Could not send the email";
				}
			} else {
				echo "Error: User was not added to database.";
			}
			//add them to the temp user database

		} else {
			$this->load->view('signup');
		}
	}

	public function register_user($key)
	{
		$this->load->model('model_user');

		// If the key is valid
		if ($this->model_users->is_key_valid($key)) {
			// If the user is added properly
			// $new_email is set here for use with the login redirect
			if ($new_email = $this->model_user->add_user($key)) {
				$data = array (
					'email' => $new_email,
					'is_logged_in' => 1
				);
				$this->session->set_userdata($data);
				redirect ('main/members');
			} else {
				echo "Error: Failed to add user";
			}
		} else {
			echo "Invalid Key";
		}
	}

	public function validate_credentials()
	{
		$this->load->model('model_user');
		
		// If you can log in
		if ($id=$this->model_user->can_log_in()) {
			//echo "yes it's".$id."lkd fhf";
			$data = array(
				'id'=>$id
			
			);
			$this->session->set_userdata($data);

		} else {
			$this->form_validation->set_message('validate_credentials',
				'Incorrect username / password');
			return false;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('main/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
