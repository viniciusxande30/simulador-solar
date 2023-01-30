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
      $data_envio = date('d/m/Y');
      $hora_envio = date('H:i:s');


      $arquivo = "
      <style type='text/css'>
      body {
      margin:0px;
      font-family:Verdane;
      font-size:12px;
      color: #666666;
      }
      a{
      color: #666666;
      text-decoration: none;
      }
      a:hover {
      color: #FF0000;
      text-decoration: none;
      }
      </style>
        <html>
            <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
                <tr>
                  <td>
      <tr>
                     <td width='500'>Nome:$name</td>
                    </tr>
                    <tr>
                      <td width='320'>E-mail:<b>$email</b></td>
         </tr>
          <tr>
                      <td width='320'>Telefone:<b>$phone</b></td>
                    </tr>
         <tr>
                      <td width='320'>Opções:$state</td>
                    </tr>
                    
                </td>
              </tr>
              <tr>
                <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
              </tr>
            </table>
        </html>
      ";


      $emailenviar = "rsfreelas@gmail.com";
      $destino = $emailenviar;
      $assunto = "Lead Simulador Solar";

      // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: $nome <$email>';

      $enviaremail = mail($destino, $assunto, $arquivo, $headers);
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
