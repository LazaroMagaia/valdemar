<?php

use App\Http\Controllers\{
    UserProfileController,AdminController,FrontEndController,ClientController,CompanyController,
    CategoriesController,VagasController};
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontEndController::class, 'home'])->name('frontend.home');
Route::get('/about', [FrontEndController::class, 'about'])->name('frontend.about');
Route::get('/contact', [FrontEndController::class, 'contact'])->name('frontend.contact');
Route::get('/403', [FrontEndController::class, 'notPermited'])->name('frontend.notPermited');
/**
 * VAGAS
 */
Route::get('/vaga/show/{id}', [FrontEndController::class, 'show'])->name('frontend.vaga.show');
Route::post('/vaga/showVagas', [FrontEndController::class, 'showVagas'])->name('frontend.vaga.showVagas');
Route::get('/vaga/store/{id}', [VagasController::class, 'store'])->name('frontend.vaga.store');

Route::group(['middleware' => ['role:admin,user,company']], function (){
    Route::get('/admin/panel', [AdminController::class, 'painelControle'])->name('admin.painel.index');
});


Route::group(['middleware' => ['role:admin']], function (){
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/user', [AdminController::class, 'userIndex'])->name('admin.user.index');
        Route::post('/user/create', [AdminController::class, 'userStore'])->name('admin.userStore');
        Route::put('/user/update{id}', [AdminController::class, 'userUpdate'])->name('admin.userUpdate');
        Route::delete('/user/destroy/{id}', [AdminController::class, 'userDestroy'])->name('admin.userDestroy');
        /**
         * Categories
         */
        Route::get('/category', [CategoriesController::class, 'index'])->name('admin.category.index');
        Route::post('/category/create', [CategoriesController::class, 'store'])->name('admin.category.store');
        Route::put('/category/update/{id}', [CategoriesController::class, 'update'])->name('admin.category.update');
        Route::delete('/category/destroy/{id}', [CategoriesController::class, 'destroy'])->name('admin.category.destroy');
    });
});


Route::group(['middleware' => ['role:admin,user']], function (){
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    /**
     * Perfil
     */
    Route::get('/client/perfil', [ClientController::class, 'perfil'])->name('client.perfil');
    Route::put('/client/perfil/store', [UserProfileController::class, 'userUpdate'])
    ->name('client.perfil.Update');
    Route::get('/client/applied_candidates', [ClientController::class, 'applied_candidates'])
    ->name('client.applied_candidates');
    
});
Route::group(['middleware' => ['role:admin,company']], function (){
    Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/vagas', [CompanyController::class, 'vagas'])->name('company.vagas.index');
    Route::post('/company/vagas/store', [CompanyController::class, 'store'])->name('company.vagas.store');
    Route::put('/company/vagas/update/{id}', [CompanyController::class, 'update'])->name('company.vagas.update');
    Route::delete('/company/vagas/destroy/{id}', [CompanyController::class, 'destroy'])
    ->name('company.vagas.destroy');
    Route::get('/company/vagas/show/{id}', [CompanyController::class, 'show'])->name('company.vagas.show');

    Route::post('/company/vagas/funcao/store', [CompanyController::class, 'funcaoStore'])
    ->name('company.vagas.funcaoStore');
    Route::put('/company/vagas/funcao/update', [CompanyController::class, 'funcaoUpdate'])
    ->name('company.vagas.funcaoUpdate');
    Route::delete('/company/vagas/funcao/destroy/{id}', [CompanyController::class, 'funcaoDestroy'])
    ->name('company.vagas.funcaoDestroy');

    Route::post('/company/vagas/requisito/store', [CompanyController::class, 'RequirementStore'])
    ->name('company.vagas.RequirementStore');
    Route::put('/company/vagas/requisito/update', [CompanyController::class, 'RequirementUpdate'])
    ->name('company.vagas.RequirementUpdate');
    Route::delete('/company/vagas/requisito/destroy/{id}', [CompanyController::class, 'RequirementDestroy'])
    ->name('company.vagas.RequirementDestroy');

    /**
     * Candidatos
     */
    Route::get('/company/vagas/candidates/{id}', [CompanyController::class, 'candidates'])
    ->name('company.candidates');
    Route::post('/company/vagas/candidates/status/{id}', [CompanyController::class, 'candidateStatus'])
    ->name('company.candidates.status');
});


require __DIR__.'/auth.php';
