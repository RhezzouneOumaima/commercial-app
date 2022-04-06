<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\BL;
use Illuminate\Support\Facades\DB;
use App\Models\Pdt;
use PDF;

class ClientController extends Controller
{
    function listClient()
    {
        $data=Client::all();
        return view('client.listClient',['Clients'=>$data]);
    }
    function addClientPage()
    {
        return view('client.addClt');
    }
    function addclient(Request $request)
    {
          $request->validate([
            'c' => 'required',
            'con' => 'required',
            'v' => 'required',
            'Fix' => 'required',
            'Portable' => 'required',
            'f' => 'required',
            'rem' => 'required',
            't' => 'required',
            'pla' => 'required',
            'enUne' => 'required',
            'com' => 'required',
          ]); 
         
          $query= DB::table('clients')->insert([
            'Clt'=>$request->input('c'),
            'Contact'=>$request->input('con'),
            'Ville'=>$request->input('v'),
            'TelFix'=>$request->input('Fix'),
            'TelPortable'=>$request->input('Portable'),
            'Fax'=>$request->input('f'),
            'Remarque'=>$request->input('rem'),
            'Type'=>$request->input('t'),
            'Plafond'=>$request->input('pla'),
            'EnUneVente'=>$request->input('enUne'), 
            'Commercial'=>$request->input('com')
          ]);
        if($query)
          {
              return back()->with('success','Client inséré avec succès');
          }
          else
          {
            return back()->with('error','quelque chose incorrect s il vous plaît vérifier vos entrées');
          } 
    }

    function delete($id)
    {
        $data=Client::find($id);
        $data->delete();
        return redirect('listClient');
    }
    function showData($id)
    {
        $data=Client::find($id);
        return view('client.editClient',['data'=>$data]);
    }
    function update(Request $request)
    {
        $data=Client::find($request->id); 
        $data->Clt=$request->input('c');
        $data->Contact=$request->input('con');
        $data->Ville=$request->input('v');
        $data->TelFix=$request->input('Fix');
        $data->TelPortable=$request->input('Portable');
        $data->Fax=$request->input('f');
        $data->Remarque=$request->input('rem');
        $data->Type=$request->input('t');
        $data->Plafond=$request->input('pla');
        $data->EnUneVente=$request->input('enUne'); 
        $data->Commercial=$request->input('com');
        $data->save();
        return redirect('listClient');
    }

    function listBL()
    {
        $data=DB::table('bls')->get();

        return view('client.listBL',['BL'=>$data]);
    }
    function addBLPage()
    {
      $data=DB::table('clients')->get('Clt');
        return view('client.addBL',['clt'=>$data]);
    }
    function addBL(Request $request)
    {
          $request->validate([
            'c' => 'required',
            'rep' => 'required',
            'mode' => 'required',
            'rem' => 'required',
          ]); 
          $current_date = date('Y-m-d H:i:s');
          $query= DB::table('bls')->insert([
            'Clt'=>$request->input('c'),
            'Representant'=>$request->input('rep'),
            'ModeReg'=>$request->input('mode'),
            'Remarque'=>$request->input('rem'),
            'date'=>$current_date,
            'total'=>'0'
          ]);
        if($query)
          {
              return back()->with('success','BL inséré avec succès');
          }
          else
          {
            return back()->with('error','quelque chose incorrect s il vous plaît vérifier vos entrées');
          } 
    }
    function deleteBL($id)
    {
      DB::table('bldetails')->where('idBL', $id)->delete();
      DB::table('bls')->where('id', $id)->delete();
        return redirect('listBL');
    }
    function showDataBL($id)
    {
      $data2=DB::table('clients')->get('Clt');
        $data=DB::table('bls')->where('id',$id)->get()->first();
        return view('client.editBL',['data'=>$data],['clt'=>$data2]);
    }
    function updateBL(Request $request)
    {
        $data=DB::table('bls')->where('id',$request->id)->update(['Clt' => $request->input('c')]);
        $data2=DB::table('bls')->where('id',$request->id)->update(['Representant' => $request->input('rep')]);
        $data3=DB::table('bls')->where('id',$request->id)->update(['ModeReg' => $request->input('mode')]);
        $data4=DB::table('bls')->where('id',$request->id)->update(['Remarque' => $request->input('rem')]);

        return redirect('listBL');
    }
    function detailsBL($id)
    {
        $data=DB::table('bldetails')->where('idBL',$id)->get();
        return view('client.detailsBL',['data'=>$data],['id'=>$id]);
    }
    function getAddDetailsBL($id)
    {
        $data=Pdt::all();;
        return view('client.addDetailsBL',['data'=>$data],['id'=>$id]);
    }
    function addDetailsBLForm(Request $request)
    {
      $stock=DB::table('pdts')->where('RefPdt', $request->input('ref'))->get()->first();
      $qty=$stock->stock;
          $request->validate([
            'qte' => 'required|numeric|min:1|max:'.$qty,
            'prix' => 'required',
            'rem' => 'required',
          ]); 
      $data=DB::table('pdts')->where('RefPdt', $request->input('ref'))->update(['stock' => $qty-$request->input('qte')]);
      $montant=($request->input('prix')*$request->input('qte'));
      $montant-=($montant*($request->input('rem')/100));
      $bl=DB::table('bls')->where('id', $request->input('id'))->get()->first();
      $tot=$bl->total+$montant;
      $bl=DB::table('bls')->where('id', $request->input('id'))->update(['total' => $tot]);
      $query= DB::table('bldetails')->insert([
        'idBL'=>$request->input('id'),
        'RefPdt'=>$request->input('ref'),
        'qt'=>$request->input('qte'),
        'remise'=>$request->input('rem'),
        'pu'=>$request->input('prix'),
        'montant'=>$montant
        ]);
    if($query)
      {
          return back()->with('success','Données insérées avec succès');
      }
      else
      {
        return back()->with('error','quelque chose incorrect s il vous plaît vérifier vos entrées');
      } 
    }
    function deletedetailsBL($id)
    {
      $data=DB::table('bldetails')->where('id',$id)->get()->first();
      $pdt=DB::table('pdts')->where('RefPdt',$data->RefPdt)->get()->first();
      $stock=$pdt->stock;
      $pdtnew=DB::table('pdts')->where('RefPdt',$data->RefPdt)->update(['stock' => $stock+$data->qt]);
      $bl=DB::table('bls')->where('id',$data->idBL)->get()->first();
      $tot=$bl->total;
      $tot-=$data->montant;
      $bl=DB::table('bls')->where('id',$data->idBL)->update(['total' => $tot]);
      DB::table('bldetails')->where('id', $id)->delete();
        return redirect('detailsBL/'.$data->idBL);
    }
    public function printBL($id)
    {
      $bl=DB::table('bls')->where('id',$id)->get()->first();
      $data=DB::table('bldetails')->where('idBL',$id)->get();
        //$pdf=PDF::loadView('client.printBL',compact('bl'),compact('data'))->setOptions(['defaultFont' => 'sans-serif']);
        return view('client.printBL',['data'=>$data],['bl'=>$bl]);
    }

    function avoirClt()
    {
        $data=DB::table('bonavoir')->get();

        return view('client.avoirClt',['bonavoir'=>$data]);
    }
    function addBAPage()
    {
      $data=DB::table('clients')->get('Clt');
        return view('client.addBA',['clt'=>$data]);
    }
    function addBA(Request $request)
    {
          $request->validate([
            'c' => 'required',
          ]); 
          $current_date = date('Y-m-d');
          $query= DB::table('bonavoir')->insert([
            'Clt'=>$request->input('c'),
            'date'=>$current_date,
            'total'=>'0'
          ]);
        if($query)
          {
              return back()->with('success','BA inséré avec succès');
          }
          else
          {
            return back()->with('error','quelque chose incorrect s il vous plaît vérifier vos entrées');
          } 
    }
    function deleteBA($id)
    {
      DB::table('detailsbonavoir')->where('idAvoir', $id)->delete();
      DB::table('bonavoir')->where('id', $id)->delete();
        return redirect('avoirClt');
    }
    function showDataBA($id)
    {
      $data2=DB::table('clients')->get('Clt');
        $data=DB::table('bonavoir')->where('id',$id)->get()->first();
        return view('client.editBA',['data'=>$data],['clt'=>$data2]);
    }
    function updateBA(Request $request)
    {
        $data=DB::table('bonavoir')->where('id',$request->id)->update(['Clt' => $request->input('c')]);
        return redirect('avoirClt');
    }
    function detailsBA($id)
    {
        $data=DB::table('detailsbonavoir')->where('idAvoir',$id)->get();
        $data2=DB::table('bonavoir')->where('id',$id)->get()->first();
        return view('client.detailsBA',['data'=>$data],['data2'=>$data2]);
    }
    function getAddDetailsBA($id)
    {
      $data2=DB::table('bonavoir')->where('id',$id)->get()->first();
      $clt=$data2->Clt;
      $data=DB::table('bls')
      ->join('bldetails', function ($join) use ($clt){
          $join->on('bls.id', '=', 'bldetails.idBL')
               ->where('bls.Clt', '=', $clt);
      })
      ->select('bls.id as idBL','bldetails.id as id','RefPdt','qt')
      ->get();
              return view('client.addDetailsBA',['data'=>$data],['id'=>$id]);
    }
    function addDetailsBAForm(Request $request)
    {
      $qte=DB::table('bldetails')->where('id', $request->input('ref'))->get()->first();
      $qty=$qte->qt;
          $request->validate([
            'qte' => 'required|numeric|min:1|max:'.$qty,
          ]); 
      $pdt=DB::table('pdts')->where('RefPdt', $qte->RefPdt)->get()->first();
      $data=DB::table('pdts')->where('RefPdt', $qte->RefPdt)->update(['stock' => $pdt->stock+$request->input('qte')]);
      $montant=($qte->pu*$request->input('qte'));
      $montant-=($montant*($qte->remise/100));
      $ba=DB::table('bonavoir')->where('id', $request->input('id'))->get()->first();
      $tot=$ba->total+$montant;
      $ba=DB::table('bonavoir')->where('id', $request->input('id'))->update(['total' => $tot]);


      $query= DB::table('detailsbonavoir')->insert([
        'idAvoir'=>$request->input('id'),
        'idBL'=>$qte->idBL,
        'pdt'=>$qte->RefPdt,
        'pu'=>$qte->pu,
        'qte'=>$request->input('qte'),
        'montant'=>$montant
        ]);
    if($query)
      {
          return back()->with('success','Données insérées avec succès');
      }
      else
      {
        return back()->with('error','quelque chose incorrect s il vous plaît vérifier vos entrées');
      }  
    }
    function deletedetailsBA($id)
    {
      $data=DB::table('detailsbonavoir')->where('id',$id)->get()->first();
      $pdt=DB::table('pdts')->where('RefPdt',$data->pdt)->get()->first();
      $stock=$pdt->stock;
      $pdtnew=DB::table('pdts')->where('RefPdt',$data->pdt)->update(['stock' => $stock-$data->qte]);
      $ba=DB::table('bonavoir')->where('id',$data->idAvoir)->get()->first();
      $tot=$ba->total;
      $tot-=$data->montant;
      $ba=DB::table('bonavoir')->where('id',$data->idAvoir)->update(['total' => $tot]);
      DB::table('detailsbonavoir')->where('id', $id)->delete();
        return redirect('detailsBA/'.$data->idAvoir);
    }
    public function printBA($id)
    {
      $bl=DB::table('bonavoir')->where('id',$id)->get()->first();
      $data=DB::table('detailsbonavoir')->where('idAvoir',$id)->get();
        return view('client.printBA',['data'=>$data],['bl'=>$bl]);
    }


}
