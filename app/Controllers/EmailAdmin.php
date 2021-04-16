<?php namespace App\Controllers;
//https://www.petanikode.com/codeigniter4-crud/

use \App\Models\ModelEmail;
use CodeIgniter\Exceptions\PageNotFoundException;

use \App\Libraries\xmlapi;
//require APPPATH.'/Libraries/xmlapi.php';

helper('api_simasneg');

class EmailAdmin extends BaseController
{
	public function index()
	{

        $news = new ModelEmail();
        $opd=session()->get("id");
        $json=pegawaiPerSKPD($opd);
        $json=json_decode($json,true);
        $panjang=count($json);
        $arr=array();
        for($i=0; $i<$panjang; $i++){
            array_push($arr, $json[$i]['nip']);
        }
        
        $nip=$arr;

        print_r($nip);
        //https://codeigniter4.github.io/userguide/database/query_builder.html
        //$nip = ['197711212006041005'];
        $data['newses'] = $news->whereIn('nip', $nip )->findAll(); //ini namanya query builder

        if(!$data['newses']){
            throw PageNotFoundException::forPageNotFound();
        }

		echo view('admin_list_email', $data);
    }

    //--------------------------------------------------------------------------
    
    public function lihat($id)
	{
		$news = new ModelEmail();
		$data['news'] = $news->where('id', $id)->first();
		
		if(!$data['news']){
			throw PageNotFoundException::forPageNotFound();
		}
		echo view('detail_Email', $data);
    }

    //--------------------------------------------------------------------------
    
    public function buat()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(['nip' => 'required', 
                               'email' => 'required', 
                               'pass_awal' => 'required']);

        
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if($isDataValid){
            $news = new ModelEmail();
            $news->insert([
                "nip" => $this->request->getPost('nip'),
                "email" => $this->request->getPost('email'),
                "pass_awal" => $this->request->getPost('pass_awal'),
                /*"slug" => url_title($this->request->getPost('title'), '-', TRUE)*/
            ]);
            return redirect('ngatmin/email');
        }
		
        // tampilkan form create
        echo view('admin_create_email');
    }

    //--------------------------------------------------------------------------

    public function edit($id)
    {
        // ambil artikel yang akan diedit
        $news = new ModelEmail();
        $data['news'] = $news->where('id', $id)->first();
        
        // lakukan validasi data artikel
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'pass_awal' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $news->update($id, [
                "nip" => $this->request->getPost('nip'),
                "email" => $this->request->getPost('email'),
                "pass_awal" => $this->request->getPost('pass_awal')
            ]);
            return redirect('ngatmin/email');
        }

        // tampilkan form edit
        echo view('admin_edit_email', $data);
    }

    //--------------------------------------------------------------------------

	public function hapus($id){
        $news = new ModelEmail();
        $news->delete($id);
        return redirect('ngatmin/email');
    }

    //--------------------------------------------------------------------------

     public function reset($id)
   {
        // ambil artikel yang akan diedit
        $news = new ModelEmail();
        $data['news'] = $news->where('id', $id)->first();
        
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
      
        if($isDataValid){
            $ip = '103.135.180.242'; // Need to Change.
            $account = "kulonpro"; // Need to Change.
            $domain = "kulonprogokab.go.id"; // Need to Change.
            $account_pass = "entahapayangmerasukimu"; // Need to Change.

            $email = $this->request->getPost('email');
            $pecah = explode('@', $email);
            $email_account = $pecah[0];
            $email_new_pass = $this->request->getPost('pass_awal');
        
            $xmlapi = new xmlapi($ip);
            $xmlapi->password_auth($account, $account_pass);
            $xmlapi->set_output('json');
            $xmlapi->set_port('2083'); // Need to Change.
            $xmlapi->set_debug(1);
        
      
            $results = json_decode($xmlapi->api2_query("serverusername", "Email", "passwdpop", array('domain' => $domain, 'email' => $email_account, 'password' => $email_new_pass)), true);

            if($results['cpanelresult']['data'][0]['result']){
                session()->setFlashData('success', 'Password email <b>'.$email.'</b> sukses direset ke password awal ');
                return redirect('ngatmin/email');
                //echo "Success<br>".$results['cpanelresult']['data'][0]['result'];
            } else {
                session()->setFlashData('danger',  'Gagal reset password email <b>'.$email.'</b>:<br>'.$results['cpanelresult']['data'][0]['reason']);
                return redirect('ngatmin/email');
                //echo "Error creating email account:\n".$addEmail['cpanelresult']['data'][0]['reason'];
            }
           // return redirect('ngatmin/email');
        }

        echo view('admin_reset_email', $data);

     

       
    }
}