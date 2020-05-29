<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ROUTE FOR TESTING CODING

//Route::get('testGet/{id}', 'TestController@getTest');
//Route::get('test/{id}', 'TestController@testGet');
//Route::post('/test/post',  function (\Illuminate\Http\Request $request){
//    $request->validate([
//        'addmore.*.idPPC' => 'required',
//        'addmore.*.namaMaterial' => 'required',
//        'addmore.*.satuan' => 'required',
//        'addmore.*.jumlahMaterial' => 'required',
//        'addmore.*.satuanHarga' => 'required',
//        'addmore.*.jumlahHarga' => 'required'
//    ]);
//
//    ddd($request);
//});
//Url::signedRoute('test.test');
//Route::get('/test', 'SignatureController@test');
//Route::get('test/{2}', function () {
//    return view('test2');
//});
//Route::get('/pdf', 'LogManController@testPDF');
//Route::get('/test', function () {
//    return view('testi');
//});
//Route::get('/testi', function () {
//    $total = DB::table('ppcisis')
//        ->select('jumlahHarga')
//        ->where('idPO', '=', 1)
//        ->sum('jumlahHarga');
//
//    ddd($total);
//});
Route::get('/asd/{id}', 'PpcManController@unduhPPMJ');

// END ROUTE FOR TESTING

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::post('signature/simpan',  'SignatureController@upload')->name('pcc.plod');

// ROUTE UNTUK PPC START
Route::group(['middleware' => ['auth', 'checkPpc']], function () {
    Route::get('/ppc/dashboard', 'DashboardController@dashPPC')->name('ppc.dashboard');
});

Route::group(['middleware' => ['auth', 'can:ppcMan']], function () {
    //ROUTE UNTUK TANDA TANGAN
    Route::get('/ppc/signature', 'SignatureController@signatureUser')->name('ppc.sigview');
    //ROUTE HAS BEEN REJECTED PPMJ
    Route::get('/ppc/hbrej/data' ,'PpcManController@dataHbrej')->name('nyapp.dataHbrej');
    Route::get('/ppc/hbrej', 'PpcManController@hasbeenRej')->name('nyapp.hbrej');
    //ROUTE HAS BEEN APPROVED PPMJ
    Route::get('/ppc/hbapp/{id}/unduh', 'PpcManController@unduhPPMJ')->name('nyapp.unduh');
    Route::get('/ppc/hbapp/data' ,'PpcManController@dataHbapp')->name('nyapp.dataHbapp');
    Route::get('/ppc/hbapp', 'PpcManController@hasbeenApp')->name('nyapp.hbapp');
    //ROUTE DATA DAN SIMPAN NOT YET APPROVED PPMJ
    Route::post('/ppc/{id}/nyapp/simpan', 'PpcManController@updateNyapp')->name('nyapp.update');
    Route::get('/ppc/{id}/nyapp', 'PpcManController@findNyapp')->name('nyapp.show');
    Route::get('/ppc/nyapp/data' ,'PpcManController@dataNyapp')->name('nyapp.dataNyapp');
    Route::get('/ppc/nyapp', 'PpcManController@notyetApp')->name('nyapp.dex');
});

Route::group(['middleware' => ['auth', 'can:ppc']], function () {
//    Route::get('/ppc/{id}/draft')
//    Route::get('/ppc/draft/data', 'PpcController@getDraft')->name('ppc.draftGet');
//    Route::get('/ppc/draft', 'PpcController@draftIndex')->name('ppc.draftDex');
    Route::post('/ppc/isi/simpan', 'PpcisiController@store')->name('ppcisi.store');
    Route::get('/ppc/{id}/isi', 'PpcisiController@create')->name('ppcisi.create')->middleware('signed');
    Route::get('/ppc/get-ppc', 'PpcController@getIndex')->name('ppc.dex');
    Route::resource('ppc', 'PpcController');
});
// ROUTE UNTUK PPC END

// ROUTE UNTUK LOGISTIK START
Route::group(['middleware' => ['auth', 'checkLogistik']], function () {
    Route::prefix('logistik')->group( function () {
        Route::get('/dashboard', 'DashboardController@dashLog')->name('logman.dash');
    });
});

Route::group(['middleware' => ['auth', 'can:logMan']], function () {
    Route::prefix('logistik')->group( function () {
        //ROUTE TANDA TANGAN
        Route::get('/signature', 'SignatureController@signatureUser')->name('log.sigview');
        //ROUTE UPDATE PPMJ
        Route::put('/ppmj/{id}/detail/update', 'LogManController@PPMJUpdate')->name('logman.ppmjUP');
        Route::get('/ppmj/{id}/detail', 'LogManController@PPMJShow')->name('logman.isiPpmjShow');
        //ROUTE DATA PMT
        Route::get('/ppmj/pmt/data', 'LogManController@dataPMTDex')->name('logman.pmtData');
        Route::get('/ppmj/pmt', 'LogManController@PMTDex')->name('logman.pmt');
        //ROUTE DATA SPK
        Route::get('/ppmj/spk/data', 'LogManController@dataSPKDex')->name('logman.spkData');
        Route::get('/ppmj/spk', 'LogManController@SPKDex')->name('logman.spk');
        //ROUTE DATA SJAN
        Route::get('/ppmj/sjan/data', 'LogManController@dataSJANDex')->name('logman.sjanData');
        Route::get('/ppmj/sjan', 'LogManController@SJANDex')->name('logman.sjan');
        //ROUTE DATA PPMJ BELUM APPROVE
        Route::post('/{id}/ppmj/update', 'LogManController@updatePpmj')->name('logman.Ppmjapp');
        Route::get('/{id}/ppmjapp','LogManController@PpmjAppShow');
        Route::get('/ppmjapp/data', 'LogManController@dataPpmjApp')->name('logman.ppmjinData');
        Route::get('/ppmjapp', 'LogManController@PpmjApp')->name('logman.Ppmjin');
        //ROUTE PPMJ PDF
        Route::get('/ppmjapp/pdf', 'LogManController@PpmjPdf')->name('logman.seePdf');
    });
});

Route::group(['middlewate' => ['auth', 'can:logUudp']], function () {
   Route::prefix('logistik')->group( function () {
       Route::get('uudp/buat', 'UudpController@buatUUDP')->name('logUudp.UudpBuat');
       Route::get('uudp/data', 'UudpController@getUUDP')->name('logUudp.UudpData');
       Route::get('uudp', 'UudpController@index')->name('logUudp.uudp');
   });
});

Route::group(['middleware' => ['auth', 'can:logStaff']], function () {
   Route::prefix('logistik')->group( function () {
       Route::get('staff/{vendor}/unduh/{idPO}/po/{id}/unduh', 'LogStaffController@unduhPO');
       Route::post('staff/po/save', 'LogStaffController@pmtPOSave')->name('logstaff.pmtPOSave');
       Route::get('staff/{vendor}/detailed/{id}/po', 'LogStaffController@pmtPODetailed');
       Route::get('staff/{vendor}/{id}/po', 'LogStaffController@pmtPOCreate');
       Route::get('staff/{id}/po', 'LogStaffController@pmtPOShow')->name('logstaff.pmtPOShow');
       Route::get('staff/po/data', 'LogStaffController@pmtPOData')->name('logstaff.pmtPOData');
       Route::get('staff/po', 'LogStaffController@pmtPO')->name('logstaff.pmtPO');
       Route::get('staff/{id}/vendor', 'VendorController@vendorShow')->name('logstaff.vendorShow');
       Route::post('staff/vendor/save', 'VendorController@vendorSave')->name('logstaff.vendorSave');
       Route::get('staff/vendor/buat', 'VendorController@vendorCreate')->name('logstaff.vendorCre');
       Route::get('staff/vendor/data', 'VendorController@dataVendor')->name('logstaff.vendorData');
       Route::get('staff/vendor', 'VendorController@index')->name('logstaff.vendorDex');
   });
});
// ROUTE UNTUK LOGISTIK END

//ROUTE UNTUK GUDANG START
Route::group(['middleware' => ['auth', 'checkGudang']], function () {
    Route::prefix('gudang')->group( function () {
        Route::get('/dashboard', 'DashboardController@dashGud')->name('gudMan.dash');
    });
});

Route::group(['middleware' => ['auth', 'can:gudStaff']], function () {
    Route::prefix('gudang')->group( function () {
        Route::get('/staff/ppmj/{id}/detailed', 'GudStaffController@StaffPPMJDetailed')->name('gudstaff.dataPpmjAdd');
        Route::post('/staff/ppmj/details/add', 'GudStaffController@StaffPPMJAdd')->name('gudstaff.isiPpmjAdd');
        Route::get('/staff/ppmj/{id}/details', 'GudStaffController@StaffPPMJShow')->name('gudstaff.isiPpmjShow');
        //ROUTE DATA PMT
        Route::get('/staff/ppmj/pmt/data', 'GudStaffController@dataPMTDex')->name('gudstaff.pmtData');
        Route::get('/staff/ppmj/pmt', 'GudStaffController@staffPMTDex')->name('gudstaff.pmt');
        //ROUTE DATA SPK
        Route::get('/staff/ppmj/spk/data', 'GudStaffController@dataSPKDex')->name('gudstaff.spkData');
        Route::get('/staff/ppmj/spk', 'GudStaffController@staffSPKDex')->name('gudstaff.spk');
        //ROUTE DATA SJAN
        Route::get('/staff/ppmj/sjan/data', 'GudStaffController@dataSJANDex')->name('gudstaff.sjanData');
        Route::get('/staff/ppmj/sjan', 'GudStaffController@staffSJANDex')->name('gudstaff.sjan');
    });
});
//ROUTE UNTUK GUDANG END

Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::post('user/add/simpan', 'UserController@regUser')->name('user.simpan');
    Route::get('user/add', 'UserController@formReg');
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

