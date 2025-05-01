<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Arthurkaikoi;
use App\Http\Controllers\C_ArthurkaikoiAdmin;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\KoiController;
use App\Enums\PostType;



//FITUR CLEAR
Route::get('/clear', function () {
    $exitcode = Artisan::call('optimize:clear');
    return 'DONE';
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/enum-test', function () {
    return PostType::News->value;
});

Route::get('/path-test', function () {
    dd(public_path());
});

Route::get('/', [C_Arthurkaikoi::class, 'index'])->name('homepage')->withoutMiddleware('auth');
Route::get('our', [C_Arthurkaikoi::class, 'our'])->name('our')->withoutMiddleware('auth');
Route::get('our/detail/{id}', [C_Arthurkaikoi::class, 'our_detail'])->name('ourdetail')->withoutMiddleware('auth');
Route::get('news', [C_Arthurkaikoi::class, 'news'])->name('news')->withoutMiddleware('auth');
Route::get('news/{slug}', [C_Arthurkaikoi::class, 'news_details'])->name('news.detail')->withoutMiddleware('auth');
Route::get('aboutus', [C_Arthurkaikoi::class, 'aboutus'])->name('aboutus')->withoutMiddleware('auth');
Route::get('contactus', [C_Arthurkaikoi::class, 'contactus'])->name('contactus')->withoutMiddleware('auth');

Auth::routes();


Route::middleware(['auth', 'layout'])->group(function () {
    Route::get('CMS/koi', [C_ArthurkaikoiAdmin::class, 'koi'])->name('cmskoi');
    Route::get('CMS/koi/data', [C_ArthurkaikoiAdmin::class, 'getDataKoi'])->name('getDataKoi');
    Route::get('CMS/koi/data/za', [C_ArthurkaikoiAdmin::class, 'getDataKoiZA'])->name('getDataKoiZA');
    Route::get('CMS/koi/data/1-9', [C_ArthurkaikoiAdmin::class, 'getDataKoi19'])->name('getDataKoi19');
    Route::get('CMS/koi/data/9-1', [C_ArthurkaikoiAdmin::class, 'getDataKoi91'])->name('getDataKoi91');
    Route::get('CMS/koi/data/high', [C_ArthurkaikoiAdmin::class, 'getDataKoihigh'])->name('getDataKoihigh');
    Route::get('CMS/koi/data/low', [C_ArthurkaikoiAdmin::class, 'getDataKoilow'])->name('getDataKoilow');
    Route::get('CMS/koi/add', [C_ArthurkaikoiAdmin::class, 'koiadd'])->name('cmskoiAdd');
    Route::post('CMS/koi/store', [C_ArthurkaikoiAdmin::class, 'koistore'])->name('cmskoistore');
    Route::get('CMS/koi/edit/{id}', [C_ArthurkaikoiAdmin::class, 'koiedit'])->name('cmskoiEdit');
    Route::post('CMS/koi/update', [C_ArthurkaikoiAdmin::class, 'koiupdate'])->name('cmskoiUpdate');
    Route::get('CMS/koi/retweet/{id}', [C_ArthurkaikoiAdmin::class, 'koiretweet'])->name('cmskoiRetweet');
    Route::get('CMS/koi/detailyear/{year}', [C_ArthurkaikoiAdmin::class, 'koifilter_year'])->name('cmskoiyear');
    Route::get('CMS/koi/delete/{id}', [C_ArthurkaikoiAdmin::class, 'koidelete'])->name('cmskoiDelete');
    Route::get('CMS/koi/detail/{id}', [C_ArthurkaikoiAdmin::class, 'koidetail'])->name('cmskoidetail');
});
// ## ADMIN Arthurkai-koi ______________#
Route::get('CMS', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('CMS/dashboard', [C_ArthurkaikoiAdmin::class, 'dashboard'])->name('dashboard')->middleware('auth');

// # Koi


// Get Year
Route::get('CMS/koi/getyear', [C_ArthurkaikoiAdmin::class, 'getyear'])->name('cmsgetyear')->middleware('auth');
Route::get('CMS/koi/grid', [C_ArthurkaikoiAdmin::class, 'koigrid'])->name('cmskoigrid')->middleware('auth');
Route::get('CMS/koi/grid/add', [C_ArthurkaikoiAdmin::class, 'koigadd'])->name('cmskoigAdd')->middleware('auth');
Route::post('CMS/koi/grid/store', [C_ArthurkaikoiAdmin::class, 'koigstore'])->name('cmskoigstore')->middleware('auth');
Route::get('CMS/koi/grid/edit/{id}', [C_ArthurkaikoiAdmin::class, 'koigedit'])->name('cmskoigEdit')->middleware('auth');
Route::post('CMS/koi/grid/update', [C_ArthurkaikoiAdmin::class, 'koigupdate'])->name('cmskoigUpdate')->middleware('auth');
Route::post('CMS/koi/grid/search', [C_ArthurkaikoiAdmin::class, 'koigridsearch'])->name('cmskoigridsearch')->middleware('auth');
Route::get('CMS/koi/detail/grid/{id}', [C_ArthurkaikoiAdmin::class, 'koidetailgrid'])->name('cmskoidetailgrid')->middleware('auth');
Route::delete('CMS/koi/delete/grid/{id}', [C_ArthurkaikoiAdmin::class, 'koigriddelete'])->name('cmskoigridDelete')->middleware('auth');

// # KOI FILTER TABLE
Route::get('CMS/koi/az', [C_ArthurkaikoiAdmin::class, 'koifilter_az'])->name('cmskoifilteraz')->middleware('auth');
Route::get('CMS/koi/za', [C_ArthurkaikoiAdmin::class, 'koifilter_za'])->name('cmskoifilterza')->middleware('auth');
Route::get('CMS/koi/1-9', [C_ArthurkaikoiAdmin::class, 'koifilter_19'])->name('cmskoifilter19')->middleware('auth');
Route::get('CMS/koi/9-1', [C_ArthurkaikoiAdmin::class, 'koifilter_91'])->name('cmskoifilter91')->middleware('auth');
Route::get('CMS/koi/pricebuyhigh', [C_ArthurkaikoiAdmin::class, 'koifilter_pricebuyhigh'])->name('cmskoifilterpricebuyhigh')->middleware('auth');
Route::get('CMS/koi/pricebuylow', [C_ArthurkaikoiAdmin::class, 'koifilter_pricebuylow'])->name('cmskoifilterpricebuylow')->middleware('auth');

// # KOI FILTER GRID
Route::get('CMS/koi/grid/az', [C_ArthurkaikoiAdmin::class, 'koigfilter_az'])->name('cmskoigfilteraz')->middleware('auth');
Route::get('CMS/koi/grid/za', [C_ArthurkaikoiAdmin::class, 'koigfilter_za'])->name('cmskoigfilterza')->middleware('auth');
Route::get('CMS/koi/grid/1-9', [C_ArthurkaikoiAdmin::class, 'koigfilter_19'])->name('cmskoigfilter19')->middleware('auth');
Route::get('CMS/koi/grid/9-1', [C_ArthurkaikoiAdmin::class, 'koigfilter_91'])->name('cmskoigfilter91')->middleware('auth');
Route::get('CMS/koi/grid/pricebuyhigh', [C_ArthurkaikoiAdmin::class, 'koigfilter_pricebuyhigh'])->name('cmskoigfilterpricebuyhigh')->middleware('auth');
Route::get('CMS/koi/grid/pricebuylow', [C_ArthurkaikoiAdmin::class, 'koigfilter_pricebuylow'])->name('cmskoigfilterpricebuylow')->middleware('auth');

// # KOI Update Status
Route::post('CMS/koi/Status', [C_ArthurkaikoiAdmin::class, 'statusupdate'])->name('cmsstatusupdate')->middleware('auth');

// # Koi History
// Route::get('CMS/koi/history', [C_ArthurkaikoiAdmin::class, 'koihistory'])->name('cmskoihistory')->middleware('auth');

// variety
Route::get('CMS/variety', [C_ArthurkaikoiAdmin::class, 'variety'])->name('cmsvariety')->middleware('auth');
Route::get('CMS/variety/add', [C_ArthurkaikoiAdmin::class, 'varietyadd'])->name('cmsvarietyAdd')->middleware('auth');
Route::post('CMS/variety/store', [C_ArthurkaikoiAdmin::class, 'varietystore'])->name('cmsvarietyStore')->middleware('auth');
Route::get('CMS/variety/edit/{id}', [C_ArthurkaikoiAdmin::class, 'varietyedit'])->name('cmsvarietyEdit')->middleware('auth');
Route::post('CMS/variety/update', [C_ArthurkaikoiAdmin::class, 'varietyupdate'])->name('cmsvarietyUpdate')->middleware('auth');
Route::get('CMS/variety/delete/{id}', [C_ArthurkaikoiAdmin::class, 'varietydelete'])->name('cmsvarietyDelete')->middleware('auth');

// Bloodline
Route::get('CMS/bloodline', [C_ArthurkaikoiAdmin::class, 'bloodline'])->name('cmsbloodline')->middleware('auth');
Route::get('CMS/bloodline/add', [C_ArthurkaikoiAdmin::class, 'bloodlineadd'])->name('cmsbloodlineAdd')->middleware('auth');
Route::post('CMS/bloodline/store', [C_ArthurkaikoiAdmin::class, 'bloodlinestore'])->name('cmsbloodlineStore')->middleware('auth');
Route::get('CMS/bloodline/edit/{id}', [C_ArthurkaikoiAdmin::class, 'bloodlineedit'])->name('cmsbloodlineEdit')->middleware('auth');
Route::post('CMS/bloodline/update', [C_ArthurkaikoiAdmin::class, 'bloodlineupdate'])->name('cmsbloodlineUpdate')->middleware('auth');
Route::get('CMS/bloodline/delete/{id}', [C_ArthurkaikoiAdmin::class, 'bloodlinedelete'])->name('cmsbloodlineDelete')->middleware('auth');

// breeder
Route::get('CMS/breeder', [C_ArthurkaikoiAdmin::class, 'breeder'])->name('cmsbreeder')->middleware('auth');
Route::get('CMS/breeder/add', [C_ArthurkaikoiAdmin::class, 'breederadd'])->name('cmsbreederAdd')->middleware('auth');
Route::post('CMS/breeder/store', [C_ArthurkaikoiAdmin::class, 'breederstore'])->name('cmsbreederStore')->middleware('auth');
Route::get('CMS/breeder/edit/{id}', [C_ArthurkaikoiAdmin::class, 'breederedit'])->name('cmsbreederEdit')->middleware('auth');
Route::post('CMS/breeder/update', [C_ArthurkaikoiAdmin::class, 'breederupdate'])->name('cmsbreederUpdate')->middleware('auth');
Route::get('CMS/breeder/delete/{id}', [C_ArthurkaikoiAdmin::class, 'breederdelete'])->name('cmsbreederDelete')->middleware('auth');

// Agent
Route::get('CMS/agent', [C_ArthurkaikoiAdmin::class, 'agent'])->name('cmsagent')->middleware('auth');
Route::get('CMS/agent/add', [C_ArthurkaikoiAdmin::class, 'agentadd'])->name('cmsagentAdd')->middleware('auth');
Route::post('CMS/agent/store', [C_ArthurkaikoiAdmin::class, 'agentstore'])->name('cmsagentStore')->middleware('auth');
Route::get('CMS/agent/edit/{id}', [C_ArthurkaikoiAdmin::class, 'agentedit'])->name('cmsagentEdit')->middleware('auth');
Route::post('CMS/agent/update', [C_ArthurkaikoiAdmin::class, 'agentupdate'])->name('cmsagentUpdate')->middleware('auth');
Route::get('CMS/agent/delete/{id}', [C_ArthurkaikoiAdmin::class, 'agentdelete'])->name('cmsagentDelete')->middleware('auth');

// Handling Agent
Route::get('CMS/handlingagent', [C_ArthurkaikoiAdmin::class, 'handlingagent'])->name('cmshandlingagent')->middleware('auth');
Route::get('CMS/handlingagent/add', [C_ArthurkaikoiAdmin::class, 'handlingagentadd'])->name('cmshandlingagentAdd')->middleware('auth');
Route::post('CMS/handlingagent/store', [C_ArthurkaikoiAdmin::class, 'handlingagentstore'])->name('cmshandlingagentStore')->middleware('auth');
Route::get('CMS/handlingagent/edit/{id}', [C_ArthurkaikoiAdmin::class, 'handlingagentedit'])->name('cmshandlingagentEdit')->middleware('auth');
Route::post('CMS/handlingagent/update', [C_ArthurkaikoiAdmin::class, 'handlingagentupdate'])->name('cmshandlingagentUpdate')->middleware('auth');
Route::get('CMS/handlingagent/delete/{id}', [C_ArthurkaikoiAdmin::class, 'handlingagentdelete'])->name('cmshandlingagentDelete')->middleware('auth');


##$ page Website $$$

/// # Web Uur Collection # ///
Route::get('CMS/ourcollection', [C_ArthurkaikoiAdmin::class, 'ourcollection'])->name('cmsourcollection')->middleware('auth');
Route::get('CMS/ourcollection/add', [C_ArthurkaikoiAdmin::class, 'ourcollectionadd'])->name('cmsourcollectionAdd')->middleware('auth');
Route::post('CMS/ourcollection/store', [C_ArthurkaikoiAdmin::class, 'ourcollectionstore'])->name('cmsourcollectionStore')->middleware('auth');
Route::get('CMS/ourcollection/edit/{id}', [C_ArthurkaikoiAdmin::class, 'ourcollectionedit'])->name('cmsourcollectionEdit')->middleware('auth');
Route::post('CMS/ourcollection/update', [C_ArthurkaikoiAdmin::class, 'ourcollectionupdate'])->name('cmsourcollectionUpdate')->middleware('auth');
Route::get('CMS/ourcollection/delete/{id}', [C_ArthurkaikoiAdmin::class, 'ourcollectiondelete'])->name('cmsourcollectionDelete')->middleware('auth');

/// # Web News # ///
Route::get('CMS/news', [C_ArthurkaikoiAdmin::class, 'news'])->name('cmsnews')->middleware('auth');
Route::get('CMS/news/add', [C_ArthurkaikoiAdmin::class, 'newsadd'])->name('cmsnewsAdd')->middleware('auth');
Route::post('CMS/news/store', [C_ArthurkaikoiAdmin::class, 'newsstore'])->name('cmsnewsStore')->middleware('auth');
Route::get('CMS/news/edit/{id}', [C_ArthurkaikoiAdmin::class, 'newsedit'])->name('cmsnewsEdit')->middleware('auth');
Route::post('CMS/news/update', [C_ArthurkaikoiAdmin::class, 'newsupdate'])->name('cmsnewsUpdate')->middleware('auth');
Route::get('CMS/news/delete/{id}', [C_ArthurkaikoiAdmin::class, 'newsdelete'])->name('cmsnewsDelete')->middleware('auth');

/// # Web About US # ///
Route::get('CMS/aboutus', [C_ArthurkaikoiAdmin::class, 'aboutus'])->name('cmsaboutus')->middleware('auth');
Route::get('CMS/aboutus/add', [C_ArthurkaikoiAdmin::class, 'aboutusadd'])->name('cmsaboutusAdd')->middleware('auth');
Route::post('CMS/aboutus/store', [C_ArthurkaikoiAdmin::class, 'aboutusstore'])->name('cmsaboutusStore')->middleware('auth');
Route::get('CMS/aboutus/edit/{id}', [C_ArthurkaikoiAdmin::class, 'aboutusedit'])->name('cmsaboutusEdit')->middleware('auth');
Route::post('CMS/aboutus/update', [C_ArthurkaikoiAdmin::class, 'aboutusupdate'])->name('cmsaboutusUpdate')->middleware('auth');
Route::get('CMS/aboutus/delete/{id}', [C_ArthurkaikoiAdmin::class, 'aboutusdelete'])->name('cmsaboutusDelete')->middleware('auth');

/// # Web Contact US # ///
Route::get('CMS/contactus', [C_ArthurkaikoiAdmin::class, 'contactus'])->name('cmscontactus')->middleware('auth');
Route::get('CMS/contactus/add', [C_ArthurkaikoiAdmin::class, 'contactusadd'])->name('cmscontactusAdd')->middleware('auth');
Route::post('CMS/contactus/store', [C_ArthurkaikoiAdmin::class, 'contactusstore'])->name('cmscontactusStore')->middleware('auth');
Route::get('CMS/contactus/edit/{id}', [C_ArthurkaikoiAdmin::class, 'contactusedit'])->name('cmscontactusEdit')->middleware('auth');
Route::post('CMS/contactus/update', [C_ArthurkaikoiAdmin::class, 'contactusupdate'])->name('cmscontactusUpdate')->middleware('auth');
Route::get('CMS/contactus/delete/{id}', [C_ArthurkaikoiAdmin::class, 'contactusdelete'])->name('cmscontactusDelete')->middleware('auth');

// API (JSON) Stuff
Route::post('/api/koi/history', [KoiController::class, 'storeHistory'])->name('history.store');
Route::get('/api/koi', [KoiController::class, 'index'])->name('api_koi');
Route::get('/api/koi/search', [KoiController::class, 'searchKoi'])->name('api.koi_search');
Route::get('/api/koi/{id}', [KoiController::class, 'getKoi'])->name('api_koi_id');

Route::get('/api/koi/history/{koi_id}/', [KoiController::class, 'getKoiHistory'])->name('history.get');
Route::get('/api/koi/history/{koi_id}/{date}', [KoiController::class, 'getHistoryByYear'])->name('history.getByYear');
Route::delete('/api/koi/history/{koi_id}/{date}', [KoiController::class, 'deleteHistory'])->name('history.delete');
