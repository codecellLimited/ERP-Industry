<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/** ------------ Auth Routes
 * ======================================*/
Route::view('/', 'auth.login')->name('login.view');
// user login
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// user logout
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');




/**-------------    Protected Route for user panel
 * ========================================================*/
Route::middleware('auth')
->group(function(){

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    /**-------------    Route for Suppliers
     * ========================================================*/
    Route::controller(App\Http\Controllers\SupplierController::class)
    ->group(function(){

        Route::get('suppliers-list', 'show')->name('suppliers');
        Route::get('suppliers/create', 'create')->name('suppliers.create');
        Route::post('suppliers/store', 'store')->name('suppliers.store');
        Route::get('suppliers/{key}', 'edit')->name('suppliers.edit');
        Route::post('suppliers/update', 'update')->name('suppliers.update');
        Route::get('suppliers/delete/{key}', 'destroy')->name('suppliers.delete');
        Route:: get('suppliers/profile/{key}','profile')->name('Supplier.profile');

    });


    /**-------------    Route for material Purchase
     * ========================================================*/
    Route::controller(App\Http\Controllers\PurchaseController::class)
    ->group(function(){

        Route::get('purchase-list', 'show')->name('purchase');
        Route::get('purchase/create', 'create')->name('purchase.create');
        Route::post('purchase/store', 'store')->name('purchase.store');
       Route::get('purchase/invoice/{key}', 'view')->name('purchase.view');
        Route::get('purchase/{key}', 'edit')->name('purchase.edit');
        Route::post('purchase/update', 'update')->name('purchase.update');
        Route::get('purchase/delete/{key}', 'destroy')->name('purchase.delete');
        Route::get('purchase/status/{key}/{status}', 'updateStatus')->name('purchase.status');

    });
    
    
    /**-------------    Route for party
     * ========================================================*/
    Route::controller(App\Http\Controllers\partyController::class)
    ->group(function(){

        Route::get('party-list', 'show')->name('party');
        Route::get('party/create', 'create')->name('party.create');
        Route::post('party/store', 'store')->name('party.store');
        Route::get('party/{key}', 'edit')->name('party.edit');
        Route::post('party/update', 'update')->name('party.update');
        Route::get('party/delete/{key}', 'destroy')->name('party.delete');
        Route:: get('party/profile/{key}','profile')->name('party.profile');

    });

    /**-------------    Route for party-order
     * ========================================================*/
    Route::controller(App\Http\Controllers\orderController::class)
    ->group(function(){
       Route::get('order-list','show')->name('order');
       Route::get('order/create', 'create')->name('order.create');
       Route::post('order/store', 'store')->name('order.store');
       Route::get('order/invoice/{key}', 'view')->name('order.view');
       Route::get('order/{key}', 'edit')->name('order.edit');
       Route::post('order/update', 'update')->name('order.update');
       Route::get('order/delete/{key}', 'destroy')->name('order.delete');
       Route::get('order/status/{key}/{status}', 'orderStatus')->name('order.status');
    });


    /**-------------    Route for Brands
     * ========================================================*/
    
    Route::controller(App\Http\Controllers\BrandController::class)
    ->group(function(){
       Route::get('Brand-list','show')->name('Brand');
       Route::get('Brand/create', 'create')->name('Brand.create');
       Route::post('Brand/store', 'store')->name('Brand.store');
       Route::get('Brand/{key}', 'edit')->name('Brand.edit');
       Route::post('Brand/update', 'update')->name('Brand.update');
       Route::get('Brand/delete/{key}', 'destroy')->name('Brand.delete');
    });
    
    /**-------------    Route for Unit
     * ========================================================*/
    
    Route::controller(App\Http\Controllers\UnitController::class)
    ->group(function(){
       Route::get('Unit-list','show')->name('Unit');
       Route::get('Unit/create', 'create')->name('Unit.create');
       Route::post('Unit/store', 'store')->name('Unit.store');
       Route::get('Unit/{key}', 'edit')->name('Unit.edit');
       Route::post('Unit/update', 'update')->name('Unit.update');
       Route::get('Unit/delete/{key}', 'destroy')->name('Unit.delete');
    });
        
    /**-------------    Route for catagory
     * ========================================================*/
    
    Route::controller(App\Http\Controllers\CatagoryController::class)
    ->group(function(){
       Route::get('catagory-list','show')->name('catagory');
       Route::get('catagory/create', 'create')->name('catagory.create');
       Route::post('catagory/store', 'store')->name('catagory.store');
       Route::get('catagory/{key}', 'edit')->name('catagory.edit');
       Route::post('catagory/update', 'update')->name('catagory.update');
       Route::get('catagory/delete/{key}', 'destroy')->name('catagory.delete');
    });

     /**-------------    Route for products
     * ========================================================*/
    
    Route::controller(App\Http\Controllers\ProductController::class)
    ->group(function(){
       Route::get('product-list','show')->name('product');
       Route::get('product/create', 'create')->name('product.create');
       Route::post('product/store', 'store')->name('product.store');
       Route::get('product/{key}', 'edit')->name('product.edit');
       Route::post('product/update', 'update')->name('product.update');
       Route::get('product/delete/{key}', 'destroy')->name('product.delete');


      //  ajax request
      Route::get('product/get/unit', 'getProductUnit')->name('product.unit');
      Route::get('product/get/price', 'getProductPrice')->name('product.price');
    });

     /**-------------    Route for sanction
     * ========================================================*/
    
    
     Route::controller(App\Http\Controllers\sanctionController::class)
     ->group(function(){
        Route::get('sanction-list','show')->name('sanction');
        Route::get('account-sanction-list','showaccount')->name('sanctionaccount');
        Route::get('sanction/create', 'create')->name('sanction.create');
        Route::post('sanction/store', 'store')->name('sanction.store');
        Route::get('sanction/{key}', 'edit')->name('sanction.edit');
        Route::post('sanction/update', 'update')->name('sanction.update');
        Route::get('sanction/delete/{key}', 'destroy')->name('sanction.delete');
        Route::get('sanction/status/{key}/{status}', 'sanctionStatus')->name('sanction.status');
     });

     
     
     /**-------------    Route for completed Order
     * ========================================================*/
    
    
    Route::controller(App\Http\Controllers\completedController::class)
    ->group(function(){
       Route::get('Completed Order-list','show')->name('completed');
       Route::get('completed/delete/{key}', 'destroy')->name('completed.delete');
    });


     /**-------------    Route for Quotation
     * ========================================================*/
    
    Route::controller(App\Http\Controllers\quotationController::class)
    ->group(function(){
       Route::get('quotation-list','show')->name('quotation');
       Route::get('quotation/create', 'create')->name('quotation.create');
       Route::post('quotation/store', 'store')->name('quotation.store');
       Route::get('quotation/{key}', 'edit')->name('quotation.edit');
       Route::post('quotation/update', 'update')->name('quotation.update');
       Route::get('quotation/delete/{key}', 'destroy')->name('quotation.delete');
    });


    /**-------------    Route for departments
     * ========================================================*/
    
   Route::controller(App\Http\Controllers\departmentController::class)
   ->group(function(){
      Route::get('department-list','show')->name('department');
      Route::get('department/create', 'create')->name('department.create');
      Route::post('department/store', 'store')->name('department.store');
      Route::get('department/{key}', 'edit')->name('department.edit');
      Route::post('department/update', 'update')->name('department.update');
      Route::get('department/delete/{key}', 'destroy')->name('department.delete');
   });

    
   /**-------------    Route for designations
    * ========================================================*/
   
   Route::controller(App\Http\Controllers\designationController::class)
   ->group(function(){
      Route::get('designation-list','show')->name('designation');
      Route::get('designation/create', 'create')->name('designation.create');
      Route::post('designation/store', 'store')->name('designation.store');
      Route::get('designation/{key}', 'edit')->name('designation.edit');
      Route::post('designation/update', 'update')->name('designation.update');
      Route::get('designation/delete/{key}', 'destroy')->name('designation.delete');
   });

   /**-------------    Route for employees
    * ========================================================*/
   
   Route::controller(App\Http\Controllers\employeeController::class)
   ->group(function(){
      Route::get('employee-list','show')->name('employee');
      Route::get('employee/create', 'create')->name('employee.create');
      Route::post('employee/store', 'store')->name('employee.store');
      Route::get('employee/{key}', 'edit')->name('employee.edit');
      Route::post('employee/update', 'update')->name('employee.update');
      Route::get('employee/delete/{key}', 'destroy')->name('employee.delete');
   
      //ajax request
      Route::get('ajax/employee/name', 'getemployeename')->name('employee.name');

   });


   /**-------------    Route for employees Salarys
    * ========================================================*/    

   Route::controller(App\Http\Controllers\salaryController::class)
   ->group(function(){
   Route::get('Salary-list','show')->name('salary');

   });


      /**-------------    Route for employees Attendance
     * ========================================================*/    
    
    Route::controller(App\Http\Controllers\attendanceController::class)
    ->group(function(){
       Route::get('attendance-list','show')->name('attendance');
       Route::get('attendance/create', 'create')->name('attendance.create');
       Route::post('attendance/store', 'store')->name('attendance.store');
      //  Route::get('attendance/{key}', 'searchid')->name('attendance.searchid');
       
       
    });


    /**-------------    Route for bank add
     * ========================================================*/    
    
    Route::controller(App\Http\Controllers\bankaddController::class)
    ->group(function(){
       Route::get('bankadd-list','show')->name('bankadd');
       Route::get('bankadd/create', 'create')->name('bankadd.create');
       Route::post('bankadd/store', 'store')->name('bankadd.store');
       Route::get('bankadd/{key}', 'edit')->name('bankadd.edit');
       Route::post('bankadd/update', 'update')->name('bankadd.update');
       Route::get('bankadd/delete/{key}', 'destroy')->name('bankadd.delete');
    });

    /**-------------    Route for debit bank
     * ========================================================*/    
    
    Route::controller(App\Http\Controllers\debitController::class)
    ->group(function(){
        Route::get('debit-list','show')->name('debit');
        Route::get('debit/create', 'create')->name('debit.create');
       Route::post('debit/store', 'store')->name('debit.store');
       Route::get('debit/{key}', 'edit')->name('debit.edit');
       Route::post('debit/update', 'update')->name('debit.update');
       Route::get('debit/delete/{key}', 'destroy')->name('debit.delete');
    });


    /**-------------    Route for credit bank
     * ========================================================*/   
    
    Route::controller(App\Http\Controllers\creditController::class)
    ->group(function(){
        Route::get('credit-list','show')->name('credit');
        Route::get('credit/create', 'create')->name('credit.create');
       Route::post('credit/store', 'store')->name('credit.store');
       Route::get('credit/{key}', 'edit')->name('credit.edit');
       Route::post('credit/update', 'update')->name('credit.update');
       Route::get('credit/delete/{key}', 'destroy')->name('credit.delete');
    });



    /**-------------    Route for expense 
     * ========================================================*/    
    
     Route::controller(App\Http\Controllers\expenseController::class)
     ->group(function(){
         Route::get('expense-list','show')->name('expense');
         Route::get('expense/create', 'create')->name('expense.create');
        Route::post('expense/store', 'store')->name('expense.store');
        Route::get('expense/{key}', 'edit')->name('expense.edit');
        Route::post('expense/update', 'update')->name('expense.update');
        Route::get('expense/delete/{key}', 'destroy')->name('expense.delete');
     });
 


    /**-------------    Route for expense 
     * ========================================================*/    
    
     Route::controller(App\Http\Controllers\transectionController::class)
     ->group(function(){
         Route::get('transection-list','show')->name('transection');
         Route::get('transection/create', 'create')->name('transection.create');
        Route::post('transection/store', 'store')->name('transection.store');
        Route::get('transection/{key}', 'edit')->name('transection.edit');
        Route::post('transection/update', 'update')->name('transection.update');
        Route::get('transection/delete/{key}', 'destroy')->name('transection.delete');
     });
 
  

    /**-------------    Route for partyreceive
     * ========================================================*/    
    
    Route::controller(App\Http\Controllers\partyreceiveController::class)
    ->group(function(){
        Route::get('partyreceive-list','show')->name('partyreceive');
        Route::get('partyreceive/create', 'create')->name('partyreceive.create');
       Route::post('partyreceive/store', 'store')->name('partyreceive.store');
       Route::get('partyreceive/{key}', 'edit')->name('partyreceive.edit');
       Route::post('partyreceive/update', 'update')->name('partyreceive.update');
       Route::get('partyreceive/delete/{key}', 'destroy')->name('partyreceive.delete');
    });

    /**-------------    Route for supplierpayment
     * ========================================================*/    
    
    Route::controller(App\Http\Controllers\supplierpaymentController::class)
    ->group(function(){
        Route::get('supplierpayment-list','show')->name('supplierpayment');
        Route::get('supplierpayment/create', 'create')->name('supplierpayment.create');
       Route::post('supplierpayment/store', 'store')->name('supplierpayment.store');
       Route::get('supplierpayment/{key}', 'edit')->name('supplierpayment.edit');
       Route::post('supplierpayment/update', 'update')->name('supplierpayment.update');
       Route::get('supplierpayment/delete/{key}', 'destroy')->name('supplierpayment.delete');
    });

    /**-------------    Route for lc
     * ========================================================*/    
    
    Route::controller(App\Http\Controllers\LcController::class)
    ->group(function(){
         Route::get('lc-list','show')->name('lc');
         Route::get('lc/create', 'create')->name('lc.create');
         Route::post('lc/store', 'store')->name('lc.store');
         Route::get('lc/{key}', 'edit')->name('lc.edit');
         Route::post('lc/update', 'update')->name('lc.update');
         Route::get('lc/delete/{key}', 'destroy')->name('lc.delete');
    });

    
    /**-------------    Route for Leave management
     * ========================================================*/

    Route:: controller(App\Http\Controllers\leaveController::class)
    ->group(function(){
        Route::get('Leave-application-list','show')->name('leave');
        Route::get('leave/create','create')->name('leave.create');
        Route::post('leave/store','store')->name('leave.store');
        Route::get('leave/edit/{key}','edit')->name('leave.edit');
        Route::post('leave/update','update')->name('leave.update');
        route::get('leave.delete/delete/{key}','delete')->name('leave.delete');
    });

    
    /**-------------    Route for loan Application
     * ========================================================*/

    Route:: controller(App\Http\Controllers\loanController::class)
    ->group(function(){
        Route::get('loan-application-list','show')->name('loan');
        Route::get('loan/create','create')->name('loan.create');
        Route::post('loan/store','store')->name('loan.store');
        Route::get('loan/edit/{key}','edit')->name('loan.edit');
        Route::post('loan/update','update')->name('loan.update');
        Route::get('loan/delete/{key}', 'destroy')->name('loan.delete');
    });

    /**-------------    Route for assets
     * ========================================================*/

    Route:: controller(App\Http\Controllers\assetController::class)
    ->group(function(){
       Route::get('asset/list','show')->name('asset');
       Route::get('asset/create','create')->name('asset.create');
       Route::post('asset/store','store')->name('asset.store');
       Route::get('asset/edit/{key}','edit')->name('asset.edit');
       Route::post('asset/update','update')->name('asset.update');
       Route::get('asset/delete/{key}', 'destroy')->name('asset.delete');
    });

    /**-------------    Route for Material Application
     * ========================================================*/

    Route:: controller(App\Http\Controllers\MaterialController::class)
    ->group(function(){
       Route::get('Material/list','show')->name('Material');
       Route::get('Material/create','create')->name('Material.create');
       Route::post('Material/store','store')->name('Material.store');
       Route::get('Material/edit/{key}','edit')->name('Material.edit');
       Route::post('Material/update','update')->name('Material.update');
       Route::get('Material/delete/{key}', 'destroy')->name('Material.delete');
    });

     /**-------------    Route for MaterialProduction Application
     * ========================================================*/

    Route:: controller(App\Http\Controllers\MaterialProductionController::class)
    ->group(function(){
       Route::get('MaterialProduction/list','show')->name('MaterialProduction');
       Route::get('MaterialProduction/create','create')->name('MaterialProduction.create');
       Route::post('MaterialProduction/store','store')->name('MaterialProduction.store');
       Route::get('MaterialProduction/edit/{key}','edit')->name('MaterialProduction.edit');
       Route::post('MaterialProduction/update','update')->name('Materialedit.update');
       Route::get('MaterialProduction/delete/{key}', 'destroy')->name('MaterialProduction.delete');
       Route::post('MaterialProdiction/findID/','search')->name('inventory.find.Material');
    });

    /**-------------    Route for ProductionPerDay Application
     * ========================================================*/

    Route:: controller(App\Http\Controllers\ProductionPerDayController::class)
    ->group(function(){
       Route::get('ProductionPerDay/list','show')->name('ProductionPerDay');
       Route::get('ProductionPerDay/create','create')->name('ProductionPerDay.create');
       Route::post('ProductionPerDay/store','store')->name('ProductionPerDay.store');
       Route::get('ProductionPerDay/edit/{key}','edit')->name('ProductionPerDay.edit');
       Route::post('ProductionPerDay/update','update')->name('ProductionPerDay.update');
       Route::get('ProductionPerDay/delete/{key}', 'destroy')->name('ProductionPerDay.delete');
       Route::post('order/findID/','search')->name('inventory.find.Order');
    });


    /**-------------    Route for ProductionPerParty Application
     * ========================================================*/

    Route:: controller(App\Http\Controllers\ProductionPerPartyController::class)
    ->group(function(){
       Route::get('ProductionPerParty/list','show')->name('ProductionPerParty');
       Route::get('ProductionPerParty/delete/{key}', 'destroy')->name('ProductionPerParty.delete');
      
    });

    /**-------------    Route for totalProduction Application
     * ========================================================*/

    Route:: controller(App\Http\Controllers\totalProductionController::class)
    ->group(function(){
       Route::get('totalProduction/list','show')->name('totalProduction');
       Route::get('totalProduction/delete/{key}', 'destroy')->name('totalProduction.delete');
       Route::POST('totalproduction/between-dates','fixedDate')->name('search');
      
    });

    
    /**-------------    Route for materialForSupplier
     * ========================================================*/

    Route::controller(App\Http\Controllers\materialForSupplierController::class)
    ->group(function(){
       Route::get('materialForSupplier-list','show')->name('materialForSupplier');
       Route::get('materialForSupplier/create', 'create')->name('materialForSupplier.create');
       Route::post('materialForSupplier/store', 'store')->name('materialForSupplier.store');
       Route::get('materialForSupplier/{key}', 'edit')->name('materialForSupplier.edit');
       Route::post('materialForSupplier/update', 'update')->name('materialForSupplier.update');
       Route::get('materialForSupplier/delete/{key}', 'destroy')->name('materialForSupplier.delete');
    });

});


// Route::domain("{subdomain}." . config('app.short_url'))
// ->group(function(){
//    Route::get('/', function($subdomain){
//       return $subdomain;
//    });
// });

