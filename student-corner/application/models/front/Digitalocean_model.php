<?php defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'/third_party/vendor/autoload.php';
use Aws\S3\S3Client;
class Digitalocean_model extends CI_Model {
	function upload_photo($filename,$path){
		$temp = explode(".", $_FILES["$filename"]["name"]);
		$newfilename = round(microtime(true)) . '.' . end($temp);

		$filepath = $_FILES["$filename"]["tmp_name"];
		if($filepath !=''){
			$client = new Aws\S3\S3Client([
				'version' => 'latest',
				'region'  => 'blr1',
				'endpoint' => 'https://blr1.digitaloceanspaces.com/',
				'use_path_style_endpoint' => false, // Configures to use subdomain/virtual calling format.
				'credentials' => [
						'key'    => 'DO006VZKTYZZV9C9HNGQ',
						'secret' => 'Qy9s7bVGEatIH7CvP9QGyOVp0TbIt5neRBvbetAb8hQ',
					],
			]); 
			$client->putObject([
				 'Bucket' => 'tgu-filer',
				 'Key'    => $path.$newfilename,
				 'Body'   => file_get_contents($filepath),
				 'ACL'    => 'private',
				 'Metadata'   => array(
					 'x-amz-meta-my-key' => $newfilename
				 )
			]);
			 
			return $newfilename; 
		}
	}
	function upload_photo_multiple($filename,$path){
		$fileName = "";
		if(!empty($_FILES["$filename"]['name'][0])){
			$files = $_FILES;
			$cpt = count($_FILES["$filename"]['name']);
			for($i=0; $i<$cpt; $i++){
				$_FILES["$filename"]['name']= $files["$filename"]['name'][$i];
				$_FILES["$filename"]['type']= $files["$filename"]['type'][$i];
				$_FILES["$filename"]['tmp_name']= $files["$filename"]['tmp_name'][$i];
				$_FILES["$filename"]['error']= $files["$filename"]['error'][$i];
				$_FILES["$filename"]['size']= $files["$filename"]['size'][$i];
				
				$temp = explode(".", $_FILES["$filename"]['name']);
				$newfilename = round(microtime(true)) . '.' . end($temp);

				$filepath = $_FILES["$filename"]["tmp_name"];

				$client = new Aws\S3\S3Client([
				'version' => 'latest',
				'region'  => 'blr1',
				'endpoint' => 'https://blr1.digitaloceanspaces.com/',
				'use_path_style_endpoint' => false, // Configures to use subdomain/virtual calling format.
				'credentials' => [
						'key'    => 'DO006VZKTYZZV9C9HNGQ',
						'secret' => 'Qy9s7bVGEatIH7CvP9QGyOVp0TbIt5neRBvbetAb8hQ',
					],
			]); 
			$client->putObject([
				 'Bucket' => 'tgu-filer',
				 'Key'    => $path.$newfilename,
				 'Body'   => file_get_contents($filepath),
				 'ACL'    => 'private',
				 'Metadata'   => array(
					 'x-amz-meta-my-key' => $newfilename
				 )
			]);
				$fileName = $fileName.$newfilename.",";	
			} 
		}else{
			$fileName = '';
		} 			 
		return $fileName; 
	}
	function get_photo($loc_of_file){
		$client = new Aws\S3\S3Client([
				'version' => 'latest',
				'region'  => 'blr1',
				'endpoint' => 'https://blr1.digitaloceanspaces.com/',
				'use_path_style_endpoint' => false, // Configures to use subdomain/virtual calling format.
				'credentials' => [
						'key'    => 'DO006VZKTYZZV9C9HNGQ',
						'secret' => 'Qy9s7bVGEatIH7CvP9QGyOVp0TbIt5neRBvbetAb8hQ',
					],
			]);
			
	 
			$cmd = $client->getCommand('GetObject', [
				'Bucket' => 'tgu-filer',
				'Key'    => $loc_of_file
			]);
			$request = $client->createPresignedRequest($cmd, '+120 minutes');
			$presignedUrl = (string) $request->getUri();
			return $presignedUrl;
			/*?>
			<img src="<?=$presignedUrl?>">
			<?php exit;*/
	}
	
	/*---------------------------------------------------------------*/
		/*           for calling photo display
		$this->load->model('web/Digitalocean_model'); 
		$loc_of_file ="images/career/loc_first.jpg";
		$this->Digitalocean_model->get_photo($loc_of_file);*/
		/*----------------uploading photo
		$this->load->model('web/Digitalocean_model');
		$this->Digitalocean_model->upload_photo($filename="userfile"); 
		*/
}
?>