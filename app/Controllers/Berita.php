<?php namespace App\Controllers;
// https://www.petanikode.com/codeigniter4-view-layout/ 

//https://www.petanikode.com/codeigniter4-crud/
use App\Models\ModelBerita;
use CodeIgniter\Exceptions\PageNotFoundException;

class Berita extends BaseController
{
	public function index()
	{
		 // buat object model $news
		   $news = new ModelBerita();
        
		 /*
		  siapkan data untuk dikirim ke view dengan nama $newses
		  dan isi datanya dengan news yang sudah terbit
		 */
		 $data['newses'] = $news->where('status', 'published')->findAll();
 
		 // kirim data ke view
		 echo view('berita', $data);
		//echo view('berita');
	}
    

	public function lihatBerita($slug)
	{
		$news = new ModelBerita();
		$data['news'] = $news->where([
			'slug' => $slug,
			'status' => 'published'
		])->first();

        // tampilkan 404 error jika data tidak ditemukan
		if (!$data['news']) {
			throw PageNotFoundException::forPageNotFound();
		}

		echo view('detail_berita', $data);
	}
	//----------------------------------------------------

}