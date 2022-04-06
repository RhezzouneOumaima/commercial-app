<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdt;
use Illuminate\Support\Facades\DB;
use PDF;
class StockController extends Controller
{
    //liste de stock
    function listStockPage()
    {
        $data=Pdt::all();
        return view('stock.listStock',['Pdts'=>$data]);
    }

    function addProductPage()
    {
        $items = DB::table('Pdts')->select('Cat')->distinct()->get();
        return view('stock.addProduct',['Cat'=>$items]);
    }
    function addProduct(Request $request)
    {
        $request->validate([
            'ref' => 'required',
            'example' => 'required',
            'rem' => 'required',
            'sa' => 'required',
            'pa' => 'required',
            'si' => 'required',
            'pv' => 'required',
            'pvg' => 'required',
          ]);
        
          $query= DB::table('pdts')->insert([
              'RefPdt'=>$request->input('ref'),
              'Cat'=>$request->input('example'),
              'SM'=>$request->input('sa'),
              'PA'=>$request->input('pa'),
              'stock'=>$request->input('si'),
              'PV'=>$request->input('pv'),
              'PVG'=>$request->input('pvg'),
              'Remarque'=>$request->input('rem')
          ]);
          if($query)
          {
              return back()->with('success','produit inséré avec succès');
          }
          else
          {
            return back()->with('error','quelque chose incorrect s il vous plaît vérifier vos entrées');
          }
    }
    function delete($id)
    {
        $data=Pdt::find($id);
        $data->delete();
        return redirect('listStock');
    }
    function showData($id)
    {
        $data=Pdt::find($id);
        $items = DB::table('Pdts')->select('Cat')->distinct()->get();
        return view('stock.editProduct',['data'=>$data],['Cat'=>$items]);
    }
    function update(Request $request)
    {
        $data=Pdt::find($request->id); 
        $data->RefPdt=$request->input('ref');
        $data->Cat=$request->input('example');
        $data->SM=$request->input('sa');
        $data->PA=$request->input('pa');
        $data->stock=$request->input('si');
        $data->PV=$request->input('pv');
        $data->PVG=$request->input('pvg');
        $data->Remarque=$request->input('rem');
        $data->save();
        return redirect('listStock');
    }
    public function getPdts()
    {
        $pdts=Pdt::all();
        return view('stock.pdts',compact('pdts'));
    }
    public function downloadListStock()
    {
        $pdts=Pdt::all();
        $pdf=PDF::loadView('stock.pdts',compact('pdts'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('pdts.pdf');
    }
    public function showPics($id)
    {
        $data=Pdt::find($id);
        $pdt=DB::table('pdts_img')->where('idPdt',$id)->get();
        return view('stock.pdtPictures',['data'=>$data],['pdt'=>$pdt]);
    }
    public function uploadImg(Request $req)
    {
        $req->validate([
            "image"=>"required|mimes:jpg,png,jpeg|max:5048"
        ]);

        $newImageName=$req->image->getClientOriginalName();
        $test=$req->image->move(public_path('images'),$newImageName);
        $query=DB::table('pdts_img')->insert(
            array(
                   'idPdt'   =>   $req->id,
                   'img_path'   =>   $newImageName
            )
       );
       if($query)
       {
           return back()->with('success','image insérée avec succès');
       }
       else
       {
         return back()->with('error','quelque chose incorrect s il vous plaît vérifier vos entrées');
       }
    }
    function deletePIC($id)
    {
        DB::table('pdts_img')->where('id', $id)->delete();
        return redirect('listStock');
    }

    /**---------------------------------------------------- */

    //fiche de stock
    function ficheStockPage()
    {
        $data=Pdt::all();
        return view('stock.ficheStock',['Pdts'=>$data]);
    }
    function addMovPageEntree($id)
    {
        $data=Pdt::find($id);
        return view('stock.addMovEntree',['data'=>$data]);
    }
    function addMovPageSortie($id)
    {
        $data=Pdt::find($id);
        return view('stock.addMovSortie',['data'=>$data]);
    }
    function addMovEntree(Request $request)
    {
        $request->validate([
            "libelle"=>"required",
            "qte"=>"required"
        ]);

        $query=DB::table('fichestock')->insert(
            array(
                   'idPdt'   =>   $request->id,
                   'libelle'   =>   $request->input('libelle'),
                   'type'   =>   'Entree',
                   'qte'   =>   $request->input('qte'),
                   'date'   =>   date('Y-m-d')
            )
       ); 
       $data=Pdt::find($request->id); 
       $data->stock+=$request->input('qte');
       
       if($query && $data->save())
       {
           return back()->with('success','mouvement inséré avec succès');
       }
       else
       {
         return back()->with('error','quelque chose incorrect s il vous plaît vérifier vos entrées');
       }
    }
    function addMovSortie(Request $request)
    {
        $request->validate([
            "libelle"=>"required",
            "qte"=>"required"
        ]);

        $query=DB::table('fichestock')->insert(
            array(
                   'idPdt'   =>   $request->id,
                   'libelle'   =>   $request->input('libelle'),
                   'type'   =>   'Sortie',
                   'qte'   =>   $request->input('qte'),
                   'date'   =>   date('Y-m-d')
            )
       ); 
       $data=Pdt::find($request->id); 
       $data->stock-=$request->input('qte');
       
       if($query && $data->save())
       {
           return back()->with('success','mouvement inséré avec succès');
       }
       else
       {
         return back()->with('error','quelque chose incorrect s il vous plaît vérifier vos entrées');
       }
    }
    public function listMov($id)
    {
        $data=Pdt::find($id);
        $pdt=DB::table('fichestock')->where('idPdt',$id)->get();
        return view('stock.listMov',['data'=>$data],['pdt'=>$pdt]);
    }
    function deleteMOV($id)
    {
        $mov=DB::table('fichestock')->where('id', $id)->get();
        $data=Pdt::find($mov[0]->idPdt);
        if($mov[0]->type=="Entree")
        {
            $data->stock-=$mov[0]->qte;
            $data->save();
        }
        else{
            $data->stock+=$mov[0]->qte;
            $data->save();
        } 
      
        DB::table('fichestock')->where('id', $id)->delete();
        return back();
    }

    //alerte stock

    function alertStock()
    {
        $data=DB::table('pdts')->whereRaw('stock<SM')->get();
        return view('stock.alertStock',['Pdts'=>$data]);
    }
    public function downloadListAlert()
    {
        $pdts=DB::table('pdts')->whereRaw('stock<SM')->get();
        $pdf=PDF::loadView('stock.alert',compact('pdts'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('alert.pdf');
    }
    public function getAlert()
    {
        $pdts=DB::table('pdts')->whereRaw('stock<SM')->get();
        return view('stock.alert',compact('pdts'));
    }

}
