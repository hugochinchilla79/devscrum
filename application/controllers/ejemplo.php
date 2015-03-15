 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ejemplo extends CI_Controller {
 
 function index(){
// Set SMTP Configuration
$emailConfig = array(
   'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'karloz.quinta@gmail.com',
    'smtp_pass' => 'carlosernesto',
    'smtp_timeout' => 2,
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1'
);
 
// Set your email information
$from = array('email' => 'karloz.quinta@gmail.com', 'name' => 'Carlos');
$to = array('carlos.quintanilla1@aol.com');
$subject = 'Your gmail subject here';
 
$message = 'Type your gmail message here';
// Load CodeIgniter Email library
$this->load->library('email', $emailConfig);
 
// Sometimes you have to set the new line character for better result
$this->email->set_newline("rn");
// Set email preferences
$this->email->from($from['email'], $from['name']);
$this->email->to($to);
 
$this->email->subject($subject);
$this->email->message($message);
// Ready to send email and check whether the email was successfully sent
 
if (!$this->email->send()) {
    // Raise error message
    show_error($this->email->print_debugger());
}
else {
    // Show success notification or other things here
    echo 'Success to send email';
}
$data['mensaje']="Hizo algo";
$this->load->view('ejemplo',$data);
}
}