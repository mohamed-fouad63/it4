<?php
namespace App\Controllers;

use Core\Http\Request;
use Core\Http\Controller;

 class TestController extends Controller {
     
    public function test1(Request $request){
    $request->validate([
      "office_name" => [""],
      "dvice_name" => ["int"],
      "dvice_sn" => [""],
  ]);
    }
 }
?>