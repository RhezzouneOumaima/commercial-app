<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class MainController extends Controller
{
    function index()
    {
        return view('login2');
    }
    function checklogin(Request $request)
    {
        $this->validate($request,[
            'email' =>'required|email',
            'password' =>'required|alphaNum|min:3'
        ]);
        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
           );
      
           if(Auth::attempt($user_data))
           {
            return redirect('main/successlogin');
           }
           else
           {
            return back()->with('error', 'Email ou mot de passe incorrect');
           }
      
    }
    function successlogin()
    {
        $now = Carbon::now()->format('Y');
        $monthlyBL=DB::table('bls')
        ->select(DB::raw('month(date) as month'),DB::raw('year(date) as year'),DB::raw('count(*) as bl'))
        ->groupBy('month','year')
        ->having('year','=',$now)
        ->orderBy('month')
       ->get();  
     foreach($monthlyBL as $monthlyBL)
     {
         $data[0][]=$monthlyBL->bl;
         $data[1][]=$monthlyBL->month;
     }
     $monthlyBA=DB::table('bonavoir')
     ->select(DB::raw('month(date) as month'),DB::raw('year(date) as year'),DB::raw('count(*) as ba'))
     ->groupBy('month','year')
     ->having('year','=',$now)
     ->orderBy('month')
    ->get();  
  foreach($monthlyBA as $monthlyBA)
  {
      $data[2][]=$monthlyBA->ba;
      $data[3][]=$monthlyBA->month;
  }
  $pdt=DB::table('pdts')
  ->select(DB::raw('Cat'),DB::raw('count(RefPdt) as pdt'))
  ->groupBy('Cat')
  ->orderBy('Cat')
 ->get();  
foreach($pdt as $pdt)
{
   $data[4][]=$pdt->Cat;
   $data[5][]=$pdt->pdt;
}
$qteBL=DB::table('bls')
->select(DB::raw('month(date) as month'),DB::raw('year(date) as year'),DB::raw('sum(qt) as qte'))
->join('bldetails','bls.id', '=', 'bldetails.idBL')
->groupBy('month','year')
->having('year','=',$now)
->orderBy('month')
->get();  
foreach($qteBL as $qteBL)
{
 $data[6][]=$qteBL->month;
 $data[7][]=$qteBL->qte;
}
 
$qteBA=DB::table('bonavoir')
->select(DB::raw('month(date) as month'),DB::raw('year(date) as year'),DB::raw('sum(qte) as qte'))
->join('detailsbonavoir','bonavoir.id', '=', 'detailsbonavoir.idAvoir')
->groupBy('month','year')
->having('year','=',$now)
->orderBy('month')
->get();  
foreach($qteBA as $qteBA)
{
 $data[8][]=$qteBA->month;
 $data[9][]=$qteBA->qte;
}
$clt=DB::table('clients')->count();  
$pdt=DB::table('pdts')
->select(DB::raw('sum(stock) as stock'))
->get()->first(); 
$pdts=$pdt->stock;

$pv=DB::table('bldetails')
->select(DB::raw('Cat'),DB::raw('sum(qt) as qte'))
->join('pdts','pdts.RefPdt', '=', 'bldetails.RefPdt')
->join('bls', function($join)
{
    $nowM = Carbon::now()->format('m');
    $join->on('bls.id', '=', 'bldetails.idBL')
    ->whereRaw('extract(month from date) = ?', $nowM);
})

->groupBy('Cat')
->get();

foreach($pv as $pv)
{
 $data[10][]=$pv->Cat;
 $data[11][]=$pv->qte;
}
$BL=DB::table('bls')
->select(DB::raw('month(date) as month'),DB::raw('year(date) as year'),DB::raw('sum(total) as bl'))
->groupBy('month','year')
->having('year','=',$now)
->orderBy('month')
->get();  
foreach($BL as $BL)
{
 $data[12][]=$BL->bl;
 $data[13][]=$BL->month;
}
$BA=DB::table('bonavoir')
->select(DB::raw('month(date) as month'),DB::raw('year(date) as year'),DB::raw('sum(total) as ba'))
->groupBy('month','year')
->having('year','=',$now)
->orderBy('month')
->get();  
foreach($BA as $BA)
{
 $data[14][]=$BA->ba;
 $data[15][]=$BA->month;
}
    return view('successlogin',['data'=>$data],['clt'=>$clt,'pdts'=>$pdts]);
    }

    function logout()
    {
     Auth::logout();
     return redirect('main');
    }
}