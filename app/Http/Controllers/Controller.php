<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function home(){
        return view('home');
    }
    // public function result(){
    //   return view('result');
    // }
    public function result(){
      $data  = [
        'name'=>$_POST['name'],
        'phone'=>$_POST['phone'],
        'email'=>$_POST['email'],
        'state'=>$_POST['state'],
        'network_type'=>$_POST['network_type'],
        'local'=>$_POST['local'],
        'price'=>$_POST['price'],
      ];

    //   Mail::raw('Hello world', function ($message) {
    //     $message->to('rsfreelas@gmail.com')
    //         ->from('rsfreelas@gmail.com')
    //         ->subject('Teste de Email');
    // });

    $html = '<b>Nova Simulação de Energia Solar</b><br>'.'Nome: '.$_POST['name'].'<br>Telefone: '.$_POST['phone'].'<br>E-mail : '.$_POST['email'].'<br>Estado : '.$_POST['state'].'<br>Tipo de Rede : '.$_POST['network_type'].'<br>Local : '.$_POST['local'].'<br>Preço : '.$_POST['price'];
    Mail::send([], [], function (Message $message) use ($html) {
            $message->to($_POST['email_origin'])
        ->subject('Nova Simulação')
        ->from('comercial@rsweb.com.br')
        ->setBody($html, 'text/html');
    });

      return view('result',$data);












    }
    public function cotacao(){
            //Variáveis

  $name = $_POST['name'];
  $email = $_POST['email'];
  $state = $_POST['state'];
  $aquisition = $_POST['aquisition'];
  $average_value = $_POST['average_value'];
  $terms = $_POST['terms'];
  
  $emailenviar = "rsfreelas@gmail.com";
  $destino = $emailenviar;
  $assunto = "Contato pelo Site";

  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= "Olá " . $_POST["name"] . " E-mail: " . $_POST["email"] . "Estado: " . $_POST["state"] . "Aquisição: " . $_POST['aquisition']. "Valor Médio: " . $_POST['average_value'] .")<br><br>"."Política de Privacidade: " . $_POST["terms"];;
  //$headers .= "Bcc: $EmailPadrao\r\n";

  $enviaremail = mail($destino, $assunto, $headers);
  if($enviaremail){
          echo "Enviado com Sucesso";
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo "";
  }
    return redirect()->route('quotationSend');
    }

    
  public function quotationSend(){
    return view('quotation-send');
  }
  public function dash(){
    return view('dash');
  }
  public function dashEnvio(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                   
        function get_data() {
            $name = $_POST['name'];
            $file_name='json_archives'. '.json';
       
            if(file_exists("$file_name")) { 
                $current_data=file_get_contents("$file_name");
                unset($file_name);
                $array_data=json_decode($current_data, true);
                                   
                $extra=array(
                    'Name' => $_POST['name'],
                    'Email' => $_POST['email'],
                    'Phone' => $_POST['phone'],
                    'Color' => $_POST['color'],
                );
                $array_data[]=$extra;
                echo "file exist<br/>";
                return json_encode($array_data);
            }
            else {
                $datae=array();
                $datae[]=array(
                    'Name' => $_POST['name'],
                    'Email' => $_POST['email'],
                    'Phone' => $_POST['phone']
                );
                echo "file not exist<br/>";
                return json_encode($datae);   
            }
        }
      
        $file_name='json_archives'. '.json';
          
        if(file_put_contents("$file_name", get_data())) {
            echo 'success';
        }                
        else {
            echo 'There is some error';                
        }
    }

//echo $_SERVER["DOCUMENT_ROOT"].'\SIMULADOR_SOLAR\SIMULADOR_SOLAR\public\images_full\logotipo';
//echo url('/');


        if(isset($_FILES['logo'])){
            $ext = strtolower(substr($_FILES['logo']['name'],-4)); //Pegando extensão do arquivo
            $new_name = 'logotipo'. $ext; //Definindo um novo nome para o arquivo
            $dir = $_SERVER['DOCUMENT_ROOT'].'/public/images_full/logotipo/'; //Diretório para uploads 
            //$dir = $_SERVER['DOCUMENT_ROOT'].'/SIMULADOR_SOLAR/SIMULADOR_SOLAR/public/images_full/logotipo/'; //Diretório para uploads 
            move_uploaded_file($_FILES['logo']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
            echo("Imagen enviada com sucesso!");
        }else{
            echo 'Erro';
        }

        //diretório para salvar as imagens

        //$diretorio = $_SERVER['DOCUMENT_ROOT'].'/SIMULADOR_SOLAR/SIMULADOR_SOLAR/public/images_full/servicos/';
        $diretorio = $_SERVER['DOCUMENT_ROOT'].'/public/images_full/servicos/';
        //Verificar a existência do diretório para salvar as imagens e informa se o caminho é um diretório
        if(!is_dir($diretorio)){ 
            echo "Pasta $diretorio nao existe";
        }else{    
            $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
        
            //loop para ler as imagens
            for ($controle = 0; $controle < count($arquivo['name']); $controle++){      
                $destino = $diretorio."/".$controle.strtolower(substr($arquivo['name'][$controle],-4));
                //realizar o upload da imagem em php
                //move_uploaded_file — Move um arquivo enviado para uma nova localização
                if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
                    echo "Upload realizado com sucesso<br>"; 
                }else{
                    echo "Erro ao realizar upload";
                }        
            }
        }

    }


    public function deleteServices(){
        try{
            $pasta = $_SERVER['DOCUMENT_ROOT'].'/public/images_full/servicos/';
            $arquivos = glob("$pasta{*.jpg,*.JPG,*.png,*.gif,*.bmp,*.webp}", GLOB_BRACE);

            foreach($arquivos as $img){

            $parte = explode("/", $img);
            echo $parte[7].' Serviços Deletados com Sucesso';
            unlink($pasta.$parte[7]);
        }
                
        }catch(Exception $e){
            echo"Arquivos Não Deletados";


        }
}
public function deleteLogo(){
    try{
        $pasta = $_SERVER['DOCUMENT_ROOT'].'/public/images_full/logotipo/';
        $arquivos = glob("$pasta{*.jpg,*.JPG,*.png,*.gif,*.bmp,*.webp}", GLOB_BRACE);

        foreach($arquivos as $img){

        $parte = explode("/", $img);
        echo $pasta.$parte[7].'Logotipo Deletado com Sucesso';
        unlink($pasta.$parte[7]);
    }
            
    }catch(Exception $e){
        echo"Arquivos Não Deletados";


    }
    return redirect()->route('home');

}
public function kw(){
    return view('kw');
}
public function kwEdit(){

  
    $json = file_get_contents(url('/').'/json_kw.json');
    $data = json_decode($json, true);
    //$data[0]['activity_name'] = "TENNIS";

// or if you want to change all entries with activity_code "1"
foreach ($data as $key => $entry) {
    if ($entry['estado'] == $_POST['state']) {
        $data[$key]['kw'] = floatval($_POST['kw']);
    }
}
$json = json_encode($data);
file_put_contents('json_kw.json', $json);




}


}
