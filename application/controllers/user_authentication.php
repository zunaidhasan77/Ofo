<?php

session_start(); 

Class User_Authentication extends CI_Controller {

public function __construct() {
parent::__construct();

$this->load->helper('form');

$this->load->helper('url');

$this->load->library('form_validation');

$this->load->library('session');
$this->load->library('cart');

$this->load->model('login_database');

$this->load->helper('html');
$this->load->model('fooddb');
$this->load->model('commentdb');
}

public function index() {
$this->load->view('login_form');
}

/*public function user_registration_show() {
}
	$this->load->view('register');
*/
public function home() {

	$this->load->view('home');
}
public function order($resid=0) {
	//echo $resid;
	if($resid==0)
	{
		$data = array( 
		'foods' => $this->fooddb->all(),
		'restaurant' => $this->fooddb->resall()
		);

	}
	else
	{
		$data = array( 
		'foods' => $this->fooddb->get($resid),
		'restaurant' => $this->fooddb->resall()
		);
		
		
	}
	//$data['restaurant']=$this->fooddb->resall();
	$this->load->view('order', $data);

		
	


}

public function reviews(){

	$data = array( 
		//'Username' => $this->commentdb->get($username),
		'Comments' => $this->commentdb->all()
		);

	$this->load->view('reviews');
}

public function addtocart() {
	$flag = TRUE;
    $dataTmp = $this->cart->contents();

    foreach ($dataTmp as $item) {
        if ($item['id'] == $this->input->post('id')) {
            //echo "Found Id so updatig quantity";
            $qtyn = $item['qty'] + 1;
            $this->updatecart($item['rowid'], $qtyn);
            $flag = FALSE;
            break;
        }
    }
    if ($flag) {
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => 1,
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name')
        );
        $this->cart->insert($data);
        //echo "Inserting as not found in the cart";
    }
    $foodid=$this->input->post('id');
    //echo $foodid;
    $resid=$this->fooddb->getrestaurant($foodid);

	redirect('user_authentication/order/'.$resid->resid);
}

public function updatecart($rowid=0,$qtyn=0){

// Recieve post values,calcute them and update
if($rowid==0 && $qtyn==0)
{
	$cart_info = $_POST['cart'] ;
	foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];

			$data = array(
			'rowid' => $rowid,
			'price' => $price,
			'amount' => $amount,
			'qty' => $qty
			);

			$this->cart->update($data);
		}
	redirect('user_authentication/cart');
}
else
{
	$data = array(
			'rowid' => $rowid,
			
			'qty' => $qtyn
			);
	$this->cart->update($data);
	//redirect('user_authentication/order');
}
}
public function cart() {
	$this->load->view('cart');
}

public function clearcart()
{
	$this->cart->destroy();
	redirect('user_authentication/cart');
}

public function remove($rowid) 
{
$data = array(
	'rowid' => $rowid,
	'qty' => 0
	);
$this->cart->update($data);
redirect('user_authentication/cart');
}


public function new_user_registration() {

$this->form_validation->set_rules('name', 'Username', 'required');
$this->form_validation->set_rules('emailaddress', 'Email', 'required');
$this->form_validation->set_rules('contact', 'Contact', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('confirm', 'Passwrod Confirmation', 'required');
$this->form_validation->set_rules('roadno', 'Area/Road number', 'required');

if ($this->form_validation->run() == FALSE) 
{
	$data['message_display'] = 'Fill up all the boxes!';
	$this->load->view('register',$data);
} 
else 
{
	$data = array(
		'name' => $this->input->post('name'),
		'password' => $this->input->post('password'),
		'emailaddress' => $this->input->post('emailaddress'),
		'contact' => $this->input->post('contact'),
		'area' => $this->input->post('area'),
		'roadno' => $this->input->post('roadno')

	);
	
	$result = $this->login_database->registration_insert($data);
	if ($result == TRUE) 
	{
		$data['message_display'] = 'Registration Successfully !';
		$this->load->view('login_form', $data);
	}
	else 
	{
		$data['message_display'] = 'Username already exist!';
		$this->load->view('register', $data);
	}
}
}

public function user_login_process() {

$this->form_validation->set_rules('username', 'Username', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');

if ($this->form_validation->run() == FALSE) {

	if(isset($this->session->userdata['logged_in'])){
		$this->load->view('home');
	}
	else{
		$this->load->view('login_form');
		echo "login page e jaite chile header theke ashtese ekhane";
	}
} 
else {
	$data = array(
		'name' => $this->input->post('username'),
		'password' => $this->input->post('password')
	);
	$result = $this->login_database->login($data);
	if ($result == TRUE) {

		$username = $this->input->post('username');
		$result = $this->login_database->read_user_information($username);
		if ($result != false) {
			$session_data = array(
			'username' => $result[0]->name,
			//'email' => $result[0]->user_email,
			);
			//echo "bbbbbbbbbbbbbb";
			$this->session->set_userdata('logged_in', $session_data);
			$this->load->view('home');
		}
	}
	else {
		$data = array(
		'error_message' => 'Invalid Username or Password'
		);
		$this->load->view('login_form', $data);
		}
	}
}

public function logout() {

	$this->cart->destroy();
	$sess_array = array(
		'username' => ''
	);
	$this->session->unset_userdata('logged_in', $sess_array);
	$data['message_display'] = 'Successfully Logout';
	$this->load->view('login_form', $data);
}

}

?>