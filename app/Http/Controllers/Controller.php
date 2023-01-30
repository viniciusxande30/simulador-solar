<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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


      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $state = $_POST['state'];
      
      $emailenviar = "rsfreelas@gmail.com";
      $destino = $emailenviar;
      $assunto = "Contato pelo Site";

      $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
          $headers .= "Olá " . $_POST["name"] . " email: " . $_POST["email"] . $_POST["state"] . $_POST["phone"] . ")<br><br>"."Mensagem para Você: ";;
      //$headers .= "Bcc: $EmailPadrao\r\n";

      $enviaremail = mail($destino, $assunto, $headers);
      if($enviaremail){
        return view('result',$data);
      } else {
      $mgm = "ERRO AO ENVIAR E-MAIL!";
      echo "";
      }





    }
    public function cotacao(){
            //Variáveis

$name = $_POST['name'];
$email = $_POST['email'];
$state = $_POST['state'];
$msg = $_POST['msg'];
  
  $emailenviar = "rsfreelas@gmail.com";
  $destino = $emailenviar;
  $assunto = "Contato pelo Site";

  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= "Olá " . $_POST["name"] . " email: " . $_POST["email"] . $_POST["state"] . ")<br><br>"."Mensagem para Você: " . $_POST["msg"];;
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
}
